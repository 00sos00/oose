<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class User
{
    private $firstName;
    private $lastName;
    private $countryCode;
    private $phoneNumber;
    private $userId;

    protected function __construct($result)
    {
        // Parse the result from the database
        $this->firstName = $result["FIRST_NAME"];
        $this->lastName = $result["LAST_NAME"];
        $this->countryCode = $result["COUNTRY_CODE"];
        $this->phoneNumber = $result["PHONE_NUMBER"];
        $this->userId = $result["USER_ID"];
    }

    protected static function parseResult($result): User
    {
        return new User($result);
    }

    // Getters for User Class
    public function getFirstName()
    {
        return $this->firstName;
    }
    public function getLastName()
    {
        return $this->lastName;
    }
    public function getCountryCode()
    {
        return $this->countryCode;
    }
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
    public function getUserId()
    {
        return $this->userId;
    }
}

class System_User extends User
{
    private $email;
    private $password;
    private $role_id;

    protected function __construct($result)
    {
        parent::__construct($result);
        // Parse the result from the database
        $this->email = $result["EMAIL"];
        $this->password = $result["PASSWORD"];
        $this->role_id = $result["ROLE_ID"];
    }

    public static function parseResult($result): System_User
    {
        return new System_User($result);
    }

    // Getters for System_User Class
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }

    public function getRole(){
        return $this->role_id;
    }
}

class External_User extends User
{
    private $rating;

    protected function __construct($result)
    {
        parent::__construct($result);
        // Parse the result from the database
        $this->rating = $result["RATING"];
    }

    protected static function parseResult($result): External_User
    {
        return new External_User($result);
    }

    // Getters for External_User Class
    public function getRating()
    {
        return $this->rating;
    }
}

class Client extends External_User
{
    private $needPropertyFeatures;
    private $providePropertyFeatures;

    protected function __construct($result)
    {
        parent::__construct($result);
        // Parse the result from the database
        $this->needPropertyFeatures = $result["NEED_PROPERTY_FEATURES"];
        $this->providePropertyFeatures = $result["PROVIDE_PROPERTY_FEATURES"];
    }

    public static function parseResult($result): Client
    {
        return new Client($result);
    }

    // Getters for Client Class
    public function getNeedPropertyFeatures()
    {
        if(isset($this->needPropertyFeatures)){
            return $this->needPropertyFeatures;
        }
        return "None";
    }
    public function getProvidePropertyFeatures()
    {
        if(isset($this->providePropertyFeatures)){
            return $this->providePropertyFeatures;
        }
        return "None";
    }
}
class Buyer extends External_User
{
    private $area;

    protected function __construct($result)
    {
        parent::__construct($result);
        // Parse the result from the database
        $this->area = $result["BUYER_AREA"];
    }

    public static function parseResult($result): Buyer
    {
        return new Buyer($result);
    }

    // Getters for Buyer Class
    public function getArea()
    {
        return $this->area;
    }
}
class Seller extends External_User
{
    private $area;

    protected function __construct($result)
    {
        parent::__construct($result);
        // Parse the result from the database
        $this->area = $result["SELLER_AREA"];
    }

    public static function parseResult($result): Seller
    {
        return new Seller($result);
    }

    // Getters for Seller Class
    public function getArea()
    {
        return $this->area;
    }
}
class Owner extends External_User
{
    protected function __construct($result)
    {
        parent::__construct($result);
        // Parse the result from the database
    }

    public static function parseResult($result): Owner
    {
        return new Owner($result);
    }

}

function LoadUser($className){
    require_once "Database.php";

    // Check if the class exists
    if (!class_exists($className)) {
        return null;
    }
    $object = [];
    $db = DataBase::getInstance();

    // Query the database for the class name
    $sql;
    
    // Transform the class name to uppercase
    $className = strtoupper($className);
    if($className == "SYSTEM_USER") {
        $sql = "SELECT * FROM " . $className . ", USER, ROLE WHERE " . $className . ".USER_ID = USER.USER_ID AND ROLE.ROLE_ID = SYSTEM_USER.ROLE_ID";
    }else {
        $sql = "SELECT * FROM " . $className . ", EXTERNAL_USER, USER WHERE " . $className . ".USER_ID = EXTERNAL_USER.USER_ID AND EXTERNAL_USER.USER_ID = USER.USER_ID";
    }
    $result = $db->query($sql);

    // Check if the query was successful
    if (!isset($result)) {
        exit();
    }

    $i = 0;

    // Parse the result and create an object of the class
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $object[$i] = $className::parseResult($row);
            $i++;
        }
    }

    // Return user objects
    return $object;
}

function Load($email, $password)
{
    require_once "Database.php";
    $db = DataBase::getInstance();

    // Query the database for the class name
    $sql = "SELECT * FROM SYSTEM_USER, USER, ROLE WHERE EMAIL =  '$email' AND PASSWORD = '$password' AND SYSTEM_USER.USER_ID = USER.USER_ID AND ROLE.ROLE_ID = SYSTEM_USER.ROLE_ID";
    $result = $db->query($sql);

    // Check if the query was successful
    if (!isset($result)) {
        return null;
    }

    // Parse the result and create an object of the class
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            return System_User::parseResult($row);
        }
    }

    // Return null if no user is found
    return null;
}