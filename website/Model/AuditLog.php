<?php
require_once 'SystemUser';
class AuditLog
{
    private $time;
    private $user; 
    private $action;

    protected function __construct($result)
    {
        $this->time = $result["LOG_TIME"];
        $this->user = System_User::parseResult($result); 
        $this->action = $result["ACTION"];
    }
    public static function parseResult($result): AuditLog
    {
        return new AuditLog($result);
    }
    public function getTime() { return $this->time; }
    public function getUser() { return $this->user; }
    public function getAction() { return $this->action; }
}
