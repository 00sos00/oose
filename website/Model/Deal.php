<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class Deal{
    private $dealId;
    private $dealDate;
    private $buyerId;
    private $sellerId;
    private $agentId;

    protected function __construct($result)
    {
        // Constructor is private to prevent direct instantiation
        // Parse the result from the database
        $this->dealId = $result["DEAL_ID"];
        $this->dealDate = $result["DEAL_DATE"];
        $this->buyerId = $result["BUYER_ID"];
        $this->sellerId = $result["SELLER_ID"];
        $this->agentId = $result["AGENT_ID"];
    }
    protected static function parseResult($result): Deal
    {
        return new Deal($result);
    }

    // Getters for Deal Class
    public function getDealId()
    {
        return $this->dealId;
    }
    public function getDealDate()
    {
        return $this->dealDate;
    }
    public function getBuyerId()
    {
        return $this->buyerId;
    }
    public function getSellerId()
    {
        return $this->sellerId;
    }
    public function getAgentId()
    {
        return $this->agentId;
    }
}

class Selling_Deal extends Deal
{
    private $paymentType;
    private $negotiable;
    private $ownershipType;
    private $propertyTitleDeed;
    private $legalClearance;
    private $finalPrice;
    private $askingPrice;
    private $paidAmount;
    private $commissionRate;

    protected function __construct($result)
    {
        parent::__construct($result);
        // Parse the result from the database
        $this->paymentType = $result["PAYMENT_TYPE"];
        $this->negotiable = $result["NEGOTIABLE"];
        $this->ownershipType = $result["OWNERSHIP_TYPE"];
        $this->propertyTitleDeed = $result["PROPERTY_TITLE_DEED"];
        $this->legalClearance = $result["LEGAL_CLEARANCE"];
        $this->finalPrice = $result["FINAL_PRICE"];
        $this->askingPrice = $result["ASKING_PRICE"];
        $this->paidAmount = $result["PAID_AMOUNT"];
        $this->commissionRate = $result["COMMISSION_RATE"];
    }
    public static function parseResult($result): Selling_Deal
    {
        return new Selling_Deal($result);
    }

    // Getters for Selling_Deal Class
    public function getPaymentType()
    {
        return $this->paymentType;
    }
    public function getNegotiable()
    {
        return $this->negotiable;
    }
    public function getOwnershipType()
    {
        return $this->ownershipType;
    }
    public function getPropertyTitleDeed()
    {
        return $this->propertyTitleDeed;
    }
    public function getLegalClearance()
    {
        return $this->legalClearance;
    }
    public function getFinalPrice()
    {
        return $this->finalPrice;
    }
    public function getAskingPrice()
    {
        return $this->askingPrice;
    }
    public function getPaidAmount()
    {
        return $this->paidAmount;
    }
    public function getCommissionRate()
    {
        return $this->commissionRate;
    }
}

class Renting_Deal extends Deal
{
    private $startDate;
    private $securityAmount;
    private $monthlyRent;
    private $paymentFrequency;
    private $leaseDuration;
    private $utilitiesIncluded;
    private $rentalConditions;

    protected function __construct($result)
    {
        parent::__construct($result);
        // Parse the result from the database
        $this->startDate = $result["START_DATE"];
        $this->securityAmount = $result["SECURITY_AMOUNT"];
        $this->monthlyRent = $result["MONTHLY_RENT"];
        $this->paymentFrequency = $result["PAYMENT_FREQUENCY"];
        $this->leaseDuration = $result["LEASE_DURATION"];
        $this->utilitiesIncluded = $result["UTILITIES_INCLUDED"];
        $this->rentalConditions = $result["RENTAL_CONDITIONS"];
    }
    public static function parseResult($result): Renting_Deal
    {
        return new Renting_Deal($result);
    }

    // Getters for Renting_Deal Class
    public function getStartDate()
    {
        return $this->startDate;
    }
    public function getSecurityAmount()
    {
        return $this->securityAmount;
    }
    public function getMonthlyRent()
    {
        return $this->monthlyRent;
    }
    public function getPaymentFrequency()
    {
        return $this->paymentFrequency;
    }
    public function getLeaseDuration()
    {
        return $this->leaseDuration;
    }
    public function getUtilitiesIncluded()
    {
        return $this->utilitiesIncluded;
    }
    public function getRentalConditions()
    {
        return $this->rentalConditions;
    }
}

function LoadDeal($className){
    require_once "Database.php";

    // Check if class exists
    if (!class_exists($className)){
        return null;
    }

    $object = [];
    $db = DataBase::getInstance();

    // Query the database for the class name
    $sql = "SELECT * FROM " . $className . ", DEAL WHERE " . $className . ".DEAL_ID = DEAL.DEAL_ID";
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

    // Return the array of objects
    return $object;
}