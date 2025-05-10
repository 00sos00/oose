<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class Property
{
    public $propertyId;
    private $forRent;
    private $forSale;
    private $price;
    private $paidAmount;
    private $myCut;
    private $status;
    private $area;
    private $listingDate;
    private $mediaLink;
    private $isInstallmentAvailable;
    private $installmentDurationMonths;
    private $downPayment;
    private $monthlyPayment;
    private $interestRate;
    private $paymentStartDate;
    private $latitude;
    private $longitude;
    private $addressLink;

    protected function __construct($result)
    {
      // Constructor is private to prevent direct instantiation
      // Parse the result from the database
        $this->propertyId = $result["PROPERTY_ID"];
        $this->forRent = $result["FOR_RENT"];
        $this->forSale = $result["FOR_SALE"];
        $this->price = $result["PRICE"];
        $this->paidAmount = $result["PAID_AMOUNT"];
        $this->myCut = $result["MY_CUT"];
        $this->status = $result["STATUS"];
        $this->area = $result["AREA"];
        $this->listingDate = $result["LISTING_DATE"];
        $this->mediaLink = $result["MEDIA_LINK"];
        $this->isInstallmentAvailable = $result["IS_INSTALLMENT_AVAILABLE"];
        $this->installmentDurationMonths = $result["INSTALLMENT_DURATION_MONTHS"];
        $this->downPayment = $result["DOWN_PAYMENT"];
        $this->monthlyPayment = $result["MONTHLY_PAYMENT"];
        $this->interestRate = $result["INTEREST_RATE"];
        $this->paymentStartDate = $result["PAYMENT_START_DATE"];
        $this->latitude = $result["LATITUDE"];
        $this->longitude = $result["LONGITUDE"];
        $this->addressLink = $result["ADDRESS_LINK"];
    }

    public static function parseResult($result): Property
    {
        return new Property($result);
    }
}


class House extends Property
{
    private $numberOfBathrooms;
    private $numberOfBedrooms;
    private $numberOfFloors;
    private $hasGarage;
    private $hasGarden;
    private $yearBuilt;
    private $heatingType;
    private $coolingType;
    private $isFurnished;
    private $backyardArea;
    private $flooringType;
    private $roofType;
    private $networkInfrastructure;
    private $hasLandline;

    protected function __construct($result)
    {
        parent::__construct($result);
        // Parse the result from the database
        $this->numberOfBathrooms = $result["NUMBER_OF_BATHROOMS"];
        $this->numberOfBedrooms = $result["NUMBER_OF_BEDROOMS"];
        $this->numberOfFloors = $result["NUMBER_OF_FLOORS"];
        $this->hasGarage = $result["HAS_GARAGE"];
        $this->hasGarden = $result["HAS_GARDEN"];
        $this->yearBuilt = $result["YEAR_BUILT"];
        $this->heatingType = $result["HEATING_TYPE"];
        $this->coolingType = $result["COOLING_TYPE"];
        $this->isFurnished = $result["IS_FURNISHED"];
        $this->backyardArea = $result["BACKYARD_AREA"];
        $this->flooringType = $result["FLOORING_TYPE"];
        $this->roofType = $result["ROOF_TYPE"];
    }
    public static function parseResult($result): House
    {
        return new House($result);
    }
}

class Apartment extends Property
{
    private $floorNumber;
    private $unitNumber;
    private $buildingName;
    private $hasElevator;
    private $monthlyMaintenanceFee;
    private $isFurnished;
    private $hasBalcony;
    private $viewType;
    private $networkInfrastructure;
    private $hasLandline;

    protected function __construct($result)
    {
        parent::__construct($result);
        // Parse the result from the database
        $this->floorNumber = $result["FLOOR_NUMBER"];
        $this->unitNumber = $result["UNIT_NUMBER"];
        $this->buildingName = $result["BUILDING_NAME"];
        $this->hasElevator = $result["HAS_ELEVATOR"];
        $this->monthlyMaintenanceFee = $result["MONTHLY_MAINTENANCE_FEE"];
        $this->isFurnished = $result["IS_FURNISHED"];
        $this->hasBalcony = $result["HAS_BALCONY"];
        $this->viewType = $result["VIEW_TYPE"];
        $this->networkInfrastructure = $result["NETWORK_INFRASTRUCTURE"];
        $this->hasLandline = $result["HAS_LANDLINE"];
    }
    public static function parseResult($result): Apartment
    {
        return new Apartment($result);
    }
}

class Studio extends Property
{
    private $floorNumber;
    private $apartmentName;
    private $isFurnished;
    private $hasKitchenette;
    private $hasBalcony;
    private $monthlyMaintenanceFee;
    private $hasLandline;

    protected function __construct($result)
    {
        parent::__construct($result);
        // Parse the result from the database
        $this->floorNumber = $result["FLOOR_NUMBER"];
        $this->apartmentName = $result["APARTMENT_NAME"];
        $this->isFurnished = $result["IS_FURNISHED"];
        $this->hasKitchenette = $result["HAS_KITCHENETTE"];
        $this->hasBalcony = $result["HAS_BALCONY"];
        $this->monthlyMaintenanceFee = $result["MONTHLY_MAINTENANCE_FEE"];
        $this->hasLandline = $result["HAS_LANDLINE"];
    }
    public static function parseResult($result): Studio
    {
        return new Studio($result);
    }
}

class Office extends Property
{
    private $floorNumber;
    private $buildingName;
    private $numberOfRooms;
    private $meetingRooms;
    private $isFurnished;
    private $hasReceptionArea;
    private $hasParking;
    private $monthlyMaintenanceFee;
    private $networkInfrastructure;
    private $hasLandline;

    protected function __construct($result)
    {
        parent::__construct($result);
        // Parse the result from the database
        $this->floorNumber = $result["FLOOR_NUMBER"];
        $this->buildingName = $result["BUILDING_NAME"];
        $this->numberOfRooms = $result["NUMBER_OF_ROOMS"];
        $this->meetingRooms = $result["MEETING_ROOMS"];
        $this->isFurnished = $result["IS_FURNISHED"];
        $this->hasReceptionArea = $result["HAS_RECEPTION_AREA"];
        $this->hasParking = $result["HAS_PARKING"];
        $this->monthlyMaintenanceFee = $result["MONTHLY_MAINTENANCE_FEE"];
        $this->networkInfrastructure = $result["NETWORK_INFRASTRUCTURE"];
        $this->hasLandline = $result["HAS_LANDLINE"];
    }
    public static function parseResult($result): Office
    {
        return new Office($result);
    }
}

class Land extends Property
{
    private $landType;
    private $zoningInfo;
    private $buildableArea;
    private $plotNumber;
    private $topography;
    private $roadAccess;

    protected function __construct($result)
    {
        parent::__construct($result);
        // Parse the result from the database
        $this->landType = $result["LAND_TYPE"];
        $this->zoningInfo = $result["ZONING_INFO"];
        $this->buildableArea = $result["BUILDABLE_AREA"];
        $this->plotNumber = $result["PLOT_NUMBER"];
        $this->topography = $result["TOPOGRAPHY"];
        $this->roadAccess = $result["ROAD_ACCESS"];
    }
    public static function parseResult($result): Land
    {
        return new Land($result);
    }
}

function LoadClass($className)
{
  require_once "Database.php";
  // Check if the class exists
  if (!class_exists($className)) {
      return null;
  }

  $object = [];
  $db = DataBase::getInstance();

  // Query the database for the class name
  $className = strtoupper($className);
  $sql = "SELECT * FROM " . $className . ", PROPERTY WHERE " . $className . ".PROPERTY_ID = PROPERTY.PROPERTY_ID";
  $result = $db->query($sql);

  // Check if the query was successful
  if (!isset($result)) {
      exit();
  }

  $className = strtolower($className);
  $className[0] = strtoupper($className[0]);
  $i = 0;

  // Parse the result and create an object of the class
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      // Create an object of the class and parse the result
      // Use the class name to call the static method
      // to parse the result
      $object[$i] = $className::parseResult($row);
      $i++;
    }
  }else{
    return null;
  }
  return $object;
}
