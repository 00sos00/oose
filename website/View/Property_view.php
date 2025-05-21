<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "../controllers/check-signed.php";
require_once "../gui/GUI.php";
require_once __DIR__ . "/../gui/components/Sidebar.php";
require_once __DIR__ . "/../Head.php";
require_once __DIR__ . "/../gui/components/Table.php";
require_once __DIR__ . "/../gui/components/SidebarItem.php";
require_once __DIR__ . "/../gui/components/Topbar.php";
require_once __DIR__ . "/../gui/components/Controller.php";

$gui = GUI::getInstance();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?= $gui->getComponentHTML("Head", ["page-title" => "Properties"]) ?>
	<link rel="stylesheet" href="../table-page.css">
</head>

<body>
	<div class="horizontal-stack">
		<?= $gui->getComponentHTML("Sidebar", ["selected-page" => "properties"]) ?>
		<div class="right-content">
			<div class="vertical-stack">
				<?php
				echo GUI::getInstance()->getComponentHTML('TopBar', [
				'avatar' => '../assets/avatar.jpg',
				'username' => $_SESSION["user_first_name"] . " " . $_SESSION["user_last_name"],
				'role' => $_SESSION["user_role"],
				'bell' => '../assets/bell.svg'
				]);

				// View Apartments Table
				require_once "../Model/Property.php";
				$properties = LoadClass("Apartment");
				$getterMap = [
					"ID" => "getPropertyId",
					"Unit Number" => "getUnitNumber",
					"Building Name" => "getBuildingName",
					"Listing Type" => "getFor",
					"Area" => "getArea",
					"Price" => "getPrice",
					"My Cut" => "getMyCut",
				];
				$statusMap = [
					"Status" => "getStatus",
					"Available" => "green",
					"Pending" => "yellow",
					"Sold" => "red",
					"Rented" => "blue",
					"Not Available" => "gray",
					"Under Construction" => "orange",
					"Reserved" => "purple",
				];
				echo $gui->getComponentHTML("Table", [
					"Header" => "Apartment",
					"columns" => ["ID", "Unit Number", "Building Name", "Listing Type", "Area", "Price", "My Cut"],
					"object" => $properties,
					"getterMap" => $getterMap,
					"hasStatus" => true,
					"hasActionColumn" => true,
					"statusMap" => $statusMap,
					"addUnits" => true
				]);

				// View Studio Table
				$properties = LoadClass("Studio");
				$getterMap = [
					"ID" => "getPropertyId",
					"Floor Number" => "getFloorNumber",
					"Apartment Name" => "getApartmentName",
					"Furnishment" => "getIsFurnished",
					"Listing Type" => "getFor",
					"Area" => "getArea",
					"Price" => "getPrice",
					"My Cut" => "getMyCut",
				];
				$statusMap = [
					"Status" => "getStatus",
					"Available" => "green",
					"Pending" => "yellow",
					"Sold" => "red",
					"Rented" => "blue",
					"Not Available" => "gray",
					"Under Construction" => "orange",
					"Reserved" => "purple",
				];
				echo $gui->getComponentHTML("Table", [
					"Header" => "Studio",
					"columns" => ["ID", "Floor Number", "Apartment Name", "Furnishment", "Listing Type", "Area", "Price", "My Cut"],
					"object" => $properties,
					"getterMap" => $getterMap,
					"hasStatus" => true,
					"hasActionColumn" => true,
					"statusMap" => $statusMap,
					"addUnits" => true
				]);

				// View House Table
				$properties = LoadClass("House");
				$getterMap = [
					"ID" => "getPropertyId",
					"Area" => "getArea",
					"Backyard Area" => "getBackyardArea",
					"Furnishment" => "getIsFurnished",
					"Listing Type" => "getFor",
					"Price" => "getPrice",
					"My Cut" => "getMyCut",
				];
				$statusMap = [
					"Status" => "getStatus",
					"Available" => "green",
					"Pending" => "yellow",
					"Sold" => "red",
					"Rented" => "blue",
					"Not Available" => "gray",
					"Under Construction" => "orange",
					"Reserved" => "purple",
				];
				echo $gui->getComponentHTML("Table", [
					"Header" => "House",
					"columns" => ["ID", "Area", "Backyard Area", "Furnishment", "Listing Type", "Price", "My Cut"],
					"object" => $properties,
					"getterMap" => $getterMap,
					"hasStatus" => true,
					"hasActionColumn" => true,
					"statusMap" => $statusMap,
					"addUnits" => true
				]);
				?>
			</div>
		</div>
	</div>
</body>

</html>

<style>
.horizontal-stack {
    display: flex;
    width: 100%;
    height: 100vh;
    flex-direction: row;
}
.right-content {
	height: 100%;
    width: 100%;
    overflow-y: auto;
    padding: 1%;
}
.vertical-stack {
    display: flex;
    flex-direction: column;
    gap: 0.3%;
    width: 100%;
	top: 6px;
	height: 100%;
}

/* For WebKit browsers (Chrome, Safari, Edge) */
.right-content::-webkit-scrollbar,
.vertical-stack::-webkit-scrollbar {
    width: 0px;
    background: var(--lighter-dark); /* Track color */
}
</style>