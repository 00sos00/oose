<?php
class Transaction{
    private $transactionId;

    protected function __construct($result)
    {
        // Constructor is private to prevent direct instantiation
        // Parse the result from the database
        $this->transactionId = $result["TRANSACTION_ID"];
    }

    public static function parseResult($result): Transaction
    {
        return new Transaction($result);
    }

    // Getters for Transaction Class
    public function getTransactionId()
    {
        return $this->transactionId;
    }
    public function getRevenueId()
    {
        return $this->revenueId;
    }
    public function getExpenseId()
    {
        return $this->expenseId;
    }
}
class Revenue extends Transaction
{
    private $revenueId;
    private $description;
    private $amount;
    private $recordedAt;
    private $dealId;

    protected function __construct($result)
    {
        // Constructor is private to prevent direct instantiation
        // Parse the result from the database
        parent::__construct($result);
        $this->revenueId = $result["REVENUE_ID"];
        $this->description = $result["DESCRIPTION"];
        $this->amount = (float)$result["AMOUNT"];
        $this->recordedAt = new DateTime($result["RECORDED_AT"]);
        $this->dealId = (int)$result["DEAL_ID"];
    }
    public static function parseResult($result): Revenue
    {
        return new Revenue($result);
    }
    // Getters for Revenue Class
    public function getRevenueId()
    {
        return $this->revenueId;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getAmount()
    {
        return $this->amount;
    }
    public function getRecordedAt()
    {
        return $this->recordedAt;
    }
    public function getDealId()
    {
        return $this->dealId;
    }
}
class Expense extends Transaction
{
    private $expenseId;
    private $description;
    private $amount;
    private $userId;

    protected function __construct($result)
    {
        // Constructor is private to prevent direct instantiation
        // Parse the result from the database
        parent::__construct($result);
        $this->expenseId = $result["EXPENSE_ID"];
        $this->description = $result["DESCRIPTION"];
        $this->amount = (float)$result["AMOUNT"];
        $this->userId = (int)$result["USER_ID"];
    }
    public static function parseResult($result): Expense
    {
        return new Expense($result);
    }
    // Getters for Expense Class
    public function getExpenseId()
    {
        return $this->expenseId;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getAmount()
    {
        return $this->amount;
    }
}

function LoadTransaction($className)
{
    require_once "Database.php";

    // Check if the class name is valid
    if(!class_exists($className)) {
        return null;
    }

    $object = [];
    $db = DataBase::getInstance();

    // Query the database for the class name
    $query = "SELECT * FROM " . $className . ", TRANSACTION WHERE " . $className . ".TRANSACTION_ID = TRANSACTION.TRANSACTION_ID";
    $result = $db->query($query);
    
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