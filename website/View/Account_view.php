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
	<div class="horizontal-stack">
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
				"hasActionColumn" => true
			]);
			?>
		</div>
	</div>
</body>

</html>

<style>
	.horizontal-stack{
		display: flex;
		width: 100%;
		height: 100vh;
		flex-direction: row;
	}
	.right-content{
		flex: 0 0 1;
		width: 100%;
		overflow-x: auto;
		padding: 24px;
	}
</style>