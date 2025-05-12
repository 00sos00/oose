<?php
class Report{
    private $reportId;
    private $reportTitle;
    private $reportDescription;
    private $reportType;
    private $reportFormat;
    private $filePath;
    private $status;
    private $generatedAt;
    private $reviewedAt;
    private $userId;

    protected function __construct($result)
    {
        // Constructor is private to prevent direct instantiation
        // Parse the result from the database
        $this->reportId = $result["REPORT_ID"];
        $this->reportTitle = $result["REPORT_TITLE"];
        $this->reportDescription = $result["REPORT_DESCRIPTION"];
        $this->reportType = $result["REPORT_TYPE"];
        $this->reportFormat = $result["REPORT_FORMAT"];
        $this->filePath = $result["FILE_PATH"];
        $this->status = $result["STATUS"];
        $this->generatedAt = new DateTime($result["GENERATED_AT"]);
        if ($result["REVIEWED_AT"] != null) {
            $this->reviewedAt = new DateTime($result["REVIEWED_AT"]);
        }
        else{
            $this->reviewedAt = null;
        }
        $this->userId = $result["USER_ID"];
    }

    public static function parseResult($result): Report
    {
        return new Report($result);
    }

    // Getters for Report Class
    public function getReportId()
    {
        return $this->reportId;
    }
    public function getReportTitle()
    {
        return $this->reportTitle;
    }
    public function getReportDescription()
    {
        return $this->reportDescription;
    }
    public function getReportType()
    {
        return $this->reportType;
    }
    public function getReportFormat()
    {
        return $this->reportFormat;
    }
    public function getFilePath()
    {
        return $this->filePath;
    }
    public function getStatus()
    {
        return $this->status;
    }
    public function getGeneratedAt()
    {
        return $this->generatedAt;
    }
    public function getReviewedAt()
    {
        return $this->reviewedAt;
    }
}

function LoadReport(){
    require_once "Database.php";
    $db = DataBase::getInstance();

    // Query the database for all reports
    $result = $db->query("SELECT * FROM REPORT");

    // Check if the query was successful
    if ($result == null) {
        return null;
    }

    // Parse the result into an array of Report objects
    $reports = [];
    while ($row = $result->fetch_assoc()) {
        $reports[] = Report::parseResult($row);
    }
    
    return $reports;
}