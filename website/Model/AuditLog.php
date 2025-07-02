<?php
class Auditlog
{
    private $action;
    private $auditLogId;
    private $userId;
    private $firstName;
    private $lastName;

    private function __construct($result)
    {
        $this->action = $result["ACTION"];
        $this->auditLogId = $result["AUDITLOG_ID"];
        $this->userId = $result["USER_ID"];
        $this->firstName = $result["FIRST_NAME"];
        $this->lastName = $result["LAST_NAME"];
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
    public function getFirstName()
    {
        return $this->firstName;
    }
    public function getLastName()
    {
        return $this->lastName;
    }
}

function LoadAuditlog(){
    require_once "Database.php";

    $objects = [];
    $db = DataBase::getInstance();

    // Query the database for audit logs
    $sql = "SELECT * FROM AUDITLOG, USER WHERE AUDITLOG.USER_ID = USER.USER_ID";
    $result = $db->query($sql);

    // Check if the query was successful
    if (!isset($result)) {
        return null;
    }

    $i = 0;

    // Parse the result and create an object of the class
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $objects[$i] = AuditLog::parseResult($row);
            $i++;
        }
    }
    return $objects;
}