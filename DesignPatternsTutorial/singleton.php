<?php

class DataBase
{

    private static $instance = null; //data type: DataBase
    private $connection;
    private $user;
    private $password;
    private $dbName;

    private function __construct($c, $u, $p, $db)
    {
        $this->connection = $c;
        $this->user = $u;
        $this->password = $p;
        $this->dbName = $db;
    }

    public static function getInstance(): DataBase
    {
        $currentInstance = self::$instance;
        if (!isset($currentInstance)) {
            self::$instance = $currentInstance = new DataBase('localhost', 'root', '', 'test');
        }

        return $currentInstance;
    }

}


function main()
{
    $db1 = DataBase::getInstance();
    $db2 = DataBase::getInstance();
    if ($db1 === $db2) {
        echo "Singleton works, both variables contain the same instance.";
    } else {
        echo "Singleton failed, variables contain different instances.";
    }
}

main();