<?php
class Role
{
    private $id;
    private $name;
    private $permissions; 
    protected function __construct($result)
    {
        $this->id = $result["ROLE_ID"];
        $this->name = $result["ROLE_NAME"];
        $this->permissions = []; 
    }
    public static function parseResult($result): Role
    {
        return new Role($result);
    }

    public function setPermissions(array $permissions)
    {
        $this->permissions = $permissions;
    }
    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getPermissions() { return $this->permissions; }
}

