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
	<?= $gui->getComponentHTML("Head", ["page-title" => "account"]) ?>
	<link rel="stylesheet" href="../table-page.css">
</head>

<body>
	<div class="horizontal-stack">
		<?= $gui->getComponentHTML("Sidebar", ["selected-page" => "account"]) ?>
		<div class="right-content">
			<div class="vertical-stack">
			<?php
			echo GUI::getInstance()->getComponentHTML('TopBar', [
			'avatar' => '../assets/avatar.jpg',
			'username' => $_SESSION["user_first_name"] . " " . $_SESSION["user_last_name"],
			'role' => $_SESSION["user_role"],
			'bell' => '../assets/bell.svg'
			]);

			require_once "../Model/User.php";
			$users = LoadUser("System_User");
			$getterMap = [
				"ID" => "getUserId",
				"First Name" => "getFirstName",
				"Last Name" => "getLastName",
				"Email Address" => "getEmail",
				"Country Code" => "getCountryCode",
				"Phone Number" => "getPhoneNumber"
			];
			echo $gui->getComponentHTML("Table", [
				"Header" => "Accounts",
				"columns" => ["ID", "First Name", "Last Name", "Email Address", "Country Code", "Phone Number"],
				"object" => $users,
				"getterMap" => $getterMap,
				"hasActionColumn" => true
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