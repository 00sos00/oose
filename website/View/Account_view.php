<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "../controllers/check-signed.php";
require_once "../gui/GUI.php";
$gui = GUI::getInstance();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?= $gui->getComponentHTML("Head", ["page-title" => "Accounts"]) ?>
	<link rel="stylesheet" href="/table-page.css">
</head>

<body>
	<?= $gui->getComponentHTML("Sidebar", ["selected-page" => "accounts"]) ?>
	<div class="right-content">
		<?php
		require_once "../Model/User.php";
		$users = FetchUsers("System_User");
		$getterMap = [
			"ID" => "getUserId",
			"First Name" => "getFirstName",
			"Last Name" => "getLastName",
			"Email Address" => "getEmail",
			"Country Code" => "getCountryCode",
			"Phone Number" => "getPhoneNumber"
		];
		echo $gui->getComponentHTML("Table", [
			"columns" => ["ID", "First Name", "Last Name", "Email Address", "Country Code", "Phone Number"],
			"object" => $users,
			"getterMap" => $getterMap,
			"hasActionColumn" => true,
			"deleteScriptName" => "delete-user"
		]);
		?>
	</div>
</body>

</html>

<style>
	.right-content{
		width: 100%;
		padding: 24px;
	}
</style>