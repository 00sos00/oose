<?php
class Appointment{
    private $appointmentId;
    private $propertyId;
    private $scheduledTime;
    private $status;
    private $initiatedAt;
    private $clientId;
    private $agentId;

    protected function __construct($result)
    {
        // Constructor is private to prevent direct instantiation
        // Parse the result from the database
        $this->appointmentId = $result["APPOINTMENT_ID"];
        $this->propertyId = $result["PROPERTY_ID"];
        $this->scheduledTime = new DateTime($result["SCHEDULED_TIME"]);
        $this->status = (int)$result["STATUS"];
        if ($result["INITIATED_AT"] != null) {
            $this->initiatedAt = new DateTime($result["INITIATED_AT"]);
        }
        else{
            $this->initiatedAt = null;
        }
        $this->clientId = (int)$result["CLIENT_ID"];
        $this->agentId = (int)$result["AGENT_ID"];
    }

    public static function parseResult($result): Appointment
    {
        return new Appointment($result);
    }

    // Getters for Appointment Class
    public function getAppointmentId()
    {
        return $this->appointmentId;
    }
    public function getPropertyId()
    {
        return $this->propertyId;
    }
    public function getScheduledTime()
    {
        return $this->scheduledTime;
    }
    public function getStatus()
    {
        return $this->status;
    }
    public function getInitiatedAt()
    {
        return $this->initiatedAt;
    }
}

function LoadAppointment(){
    require_once "Database.php";

    $object = [];
    $db = DataBase::getInstance();

    // Query the database for the class name
    $sql = "SELECT * FROM APPOINTMENT";
    $result = $db->query($sql);

    // Check if the query was successful
    if (!isset($result)) {
        exit();
    }

    $i = 0;

    // Parse the result and create an object of the class
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $object[$i] = Appointment::parseResult($row);
            $i++;
        }
    }

    // Return the array of objects
    return $object;
}
