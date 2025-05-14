<?php
class Auditlog
{
    private $action;
    private $auditLogId;
    private $userId;

    private function __construct($result)
    {
        $this->action = $result["ACTION"];
        $this->auditLogId = $result["AUDITLOG_ID"];
        $this->userId = $result["USER_ID"];
    }

    public static function parseResult($result): AuditLog
    {
        return new AuditLog($result);
    }

    // Getters for AuditLog Class
    public function getAction()
    {
        return $this->action;
    }
    public function getAuditLogId()
    {
        return $this->auditLogId;
    }
    public function getUserId()
    {
        return $this->userId;
    }
}

function LoadAuditlog(){
    require_once "Database.php";

    $object = [];
    $db = DataBase::getInstance();

    // Query the database for the class name
    $sql = "SELECT * FROM AUDITLOG";
    $result = $db->query($sql);

    // Check if the query was successful
    if (!isset($result)) {
        exit();
    }

    $i = 0;

    // Parse the result and create an object of the class
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $object[$i] = Auditlog::parseResult($row);
            $i++;
        }
    }

    // Return the array of objects
    return $object;
}