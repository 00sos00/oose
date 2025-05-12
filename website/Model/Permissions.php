<?php
class Permissions
{
    private $id;
    private $canView;
    private $canEdit;
    private $canCreate;
    private $canDelete;
    private $canImport;
    private $canExport;
    private $type;
    protected function __construct($result)
    {
        $this->id = $result["PERMISSION_ID"];
        $this->canView = $result["CAN_VIEW"];
        $this->canEdit = $result["CAN_EDIT"];
        $this->canCreate = $result["CAN_CREATE"];
        $this->canDelete = $result["CAN_DELETE"];
        $this->canImport = $result["CAN_IMPORT"];
        $this->canExport = $result["CAN_EXPORT"];
        $this->type = $result["TYPE"];
    }
    public static function parseResult($result): Permissions
    {
        return new Permissions($result);
    }
    public function getId() { return $this->id; }
    public function canView() { return $this->canView; }
    public function canEdit() { return $this->canEdit; }
    public function canCreate() { return $this->canCreate; }
    public function canDelete() { return $this->canDelete; }
    public function canImport() { return $this->canImport; }
    public function canExport() { return $this->canExport; }
    public function getType() { return $this->type; }
}


