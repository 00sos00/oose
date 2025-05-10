<?php
class DataBase
{

    private static $instance = null; //data type: DataBase
    private $servername;
    private $user;
    private $password;
    private $dbName;
    private $conn;  //data type: mysqli     connection object

    private function __construct($srvr, $usr, $pass, $db)
    {
        $this->servername = $srvr;
        $this->user = $usr;
        $this->password = $pass;
        $this->dbName = $db;
    }

    private function connect()
    {
        $timeout = 5;
        // Keep trying to connect until successful or timeout
        while($conn->connect_error) {
            if ($timeout > 5) {
                echo "Trying again in " . $timeout . " seconds...\n";
                sleep($timeout);
            }
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbName);
            $timeout *= 2;

            // Timeout after 60 seconds
            if ($timeout > 60) {
                return;
            }
        }
    }

    public static function getInstance(): DataBase
    {
        // Check if the instance already exists
        // If it does, return it
        // If it doesn't, create a new instance
        // and return it
        $currentInstance = self::$instance;
        if (!isset($currentInstance)) {
            self::$instance = $currentInstance = new DataBase('localhost', 'root', '', 'Luxville');
        }

        // Check if the connection is already established
        // If it is, return the instance
        // If it isn't, create a new connection
        // and return the instance
        if (!isset($currentInstance->conn)) {
            $currentInstance->connect();
        }
        if ($currentInstance->conn->connect_error) {
            echo "Connection failed: " . $currentInstance->conn->connect_error;
            return null;
        }
        echo "Connected successfully\n";

        // Return the Database instance
        return $currentInstance;
    }
}
?>