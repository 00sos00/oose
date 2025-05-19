<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once __DIR__ . "/../controllers/check-signed.php";
require_once __DIR__ . "/../gui/GUI.php";
require_once __DIR__ . "/../Model/User.php";
$_SESSION['previous-page'] = $_SERVER['REQUEST_URI'];
$gui = GUI::getInstance();
$gui->loadComponents([
	"Head",
	"InputHolder",
	"Dropdown",
	"CreateAccount",
	"ModifyAccount",
	"Sidebar",
	"SidebarItem",
	"Controller",
	"Table"
]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?= $gui->getComponentHTML("Head", ["page-title" => "Accounts"]) ?>
	<link rel="stylesheet" href="/table-page.css">
	<?php
	if (isset($_SESSION["error"])) {
		$err = $_SESSION["error"];
		echo "<script>alert('$err')</script>";
	}
	?>
</head>

<body>
	<div class="overlay"></div>
	<?= $gui->getComponentHTML("CreateAccount") ?>
	<?= $gui->getComponentHTML("ModifyAccount") ?>
	<?= $gui->getComponentHTML("Sidebar", ["selected-page" => "accounts"]) ?>
	<div class="right-content">
		<?php
		$maxRowsPerPage = 10;
		$currentPage = $_GET["page"] ?? 1;
		$systemUsersCount = FetchUsersCount("SYSTEM_USER");
		$totalPages = (int)(ceil($systemUsersCount / $maxRowsPerPage));
		echo $gui->getComponentHTML("Controller", [
			"createText" => "Create Account",
			"currentPage" => $currentPage,
			"totalPages" => $totalPages,
			"controllerTitle" => "Accounts"
		]);

		$users = FetchUsers("SYSTEM_USER", $currentPage, $maxRowsPerPage);
		$getterMap = [
			"ID" => "getUserId",
			"First Name" => "getFirstName",
			"Last Name" => "getLastName",
			"Email Address" => "getEmail",
			"Country Code" => "getCountryCode",
			"Phone Number" => "getPhoneNumber",
			"Role" => "getRole"
		];
		echo $gui->getComponentHTML("Table", [
			"columns" => ["ID", "First Name", "Last Name", "Email Address", "Country Code", "Phone Number", "Role"],
			"object" => $users,
			"getterMap" => $getterMap,
			"hasActionColumn" => true,
			"deleteScriptName" => "delete-user"
		]);
		?>
	</div>
</body>

</html>

<?php unset($_SESSION["error"]); ?>