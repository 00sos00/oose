<?php
class Role{
    private $roleId;
    public $canImportExportTransactions;
    public $canViewTransactions;
    public $canEditTransactions;
    public $canDeleteUser;
    public $canCreateTransactions;
    public $canEditAuditLog;
    public $canExportAuditLog;
    public $canManageRoles;
    public $canDeleteTransactions;
    public $canCreateUser;
    public $canEditUsers;
    public $canViewAuditLog;
    public $roleName;

    protected function __construct($result)
    {
        // Constructor is private to prevent direct instantiation
        // Parse the result from the database
        $this->roleId = $result["ROLE_ID"];
        $this->canImportExportTransactions = (bool)$result["CAN_IMPORT_EXPORT_TRANSACTIONS"];
        $this->canViewTransactions = (bool)$result["CAN_VIEW_TRANSACTIONS"];
        $this->canEditTransactions = (bool)$result["CAN_EDIT_TRANSACTIONS"];
        $this->canDeleteUser = (bool)$result["CAN_DELETE_USER"];
        $this->canCreateTransactions = (bool)$result["CAN_CREATE_TRANSACTIONS"];
        $this->canEditAuditLog = (bool)$result["CAN_EDIT_AUDIT_LOG"];
        $this->canExportAuditLog = (bool)$result["CAN_EXPORT_AUDIT_LOG"];
        $this->canManageRoles = (bool)$result["CAN_MANAGE_ROLES"];
        $this->canDeleteTransactions = (bool)$result["CAN_DELETE_TRANSACTIONS"];
        $this->canCreateUser = (bool)$result["CAN_CREATE_USER"];
        $this->canEditUsers = (bool)$result["CAN_EDIT_USERS"];
        $this->canViewAuditLog = (bool)$result["CAN_VIEW_AUDIT_LOG"];
        $this->roleName = $result["ROLE_NAME"];
    }

    public static function parseResult($result): Role
    {
        return new Role($result);
    }

    // Getters for Role Class
    public function getRoleId()
    {
        return $this->roleId;
    }
    
    public function getCanImportExportTransactions()
    {
        return $this->canImportExportTransactions;
    }
    public function getCanViewTransactions()
    {
        return $this->canViewTransactions;
    }
    public function getCanEditTransactions()
    {
        return $this->canEditTransactions;
    }
    public function getCanDeleteUser()
    {
        return $this->canDeleteUser;
    }
    public function getCanCreateTransactions()
    {
        return $this->canCreateTransactions;
    }
    public function getCanEditAuditLog()
    {
        return $this->canEditAuditLog;
    }
    public function getCanExportAuditLog()
    {
        return $this->canExportAuditLog;
    }
    public function getCanManageRoles()
    {
        return $this->canManageRoles;
    }
    public function getCanDeleteTransactions()
    {
        return $this->canDeleteTransactions;
    }
    public function getCanCreateUser()
    {
        return $this->canCreateUser;
    }
    public function getCanEditUsers()
    {
        return $this->canEditUsers;
    }
    public function getCanViewAuditLog()
    {
        return $this->canViewAuditLog;
    }
    public function getRoleName()
    {
        return $this->roleName;
    }
    public function setRoleId($roleId)
    {
        $this->roleId = $roleId;
    }
    public function setCanImportExportTransactions($canImportExportTransactions)
    {
        $this->canImportExportTransactions = $canImportExportTransactions;
    }
    public function setCanViewTransactions($canViewTransactions)
    {
        $this->canViewTransactions = $canViewTransactions;
    }
    public function setCanEditTransactions($canEditTransactions)
    {
        $this->canEditTransactions = $canEditTransactions;
    }
    public function setCanDeleteUser($canDeleteUser)
    {
        $this->canDeleteUser = $canDeleteUser;
    }
    public function setCanCreateTransactions($canCreateTransactions)
    {
        $this->canCreateTransactions = $canCreateTransactions;
    }
    public function setCanEditAuditLog($canEditAuditLog)
    {
        $this->canEditAuditLog = $canEditAuditLog;
    }
    
}

function LoadRole(){
    require_once "Database.php";

    $object = [];
    $db = DataBase::getInstance();

    // Query the database for the class name
    $sql = "SELECT * FROM ROLE";
    $result = $db->query($sql);

    // Check if the query was successful
    if (!isset($result)) {
        exit();
    }

    $i = 0;

    // Parse the result and create an object of the class
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $object[$i] = Role::parseResult($row);
            $i++;
        }
    }
    return $object;
}

function getRoleName($roleId)
{
    $roles = LoadRole();
    foreach ($roles as $role) {
        if ($role->getRoleId() == $roleId) {
            return $role->roleName;
        }
    }
    return null;
}