<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "../controllers/check-signed.php";
// Include GUI system and required UI components
require_once "../gui/GUI.php";
require_once __DIR__ . "/../gui/components/Sidebar.php";
require_once __DIR__ . "/../Head.php";
require_once __DIR__ . "/../gui/components/Table.php";
require_once __DIR__ . "/../gui/components/SidebarItem.php";
require_once __DIR__ . "/../gui/components/Topbar.php";
require_once __DIR__ . "/../gui/components/Controller.php";
// Get singleton instance of GUI 
$gui = GUI::getInstance();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?= $gui->getComponentHTML("Head", ["page-title" => "owner"]); ?>
	<link rel="stylesheet" href="../table-page.css">
</head>
<body>
	<div class="horizontal-stack">
		<?= $gui->getComponentHTML("Sidebar", ["selected-page" => "owner"]); ?>
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
				$owner = LoadUser("Owner");
				$getterMap = [
					"Owner ID" => "getUserId",
					"First Name" => "getFirstName",
					"Last Name" => "getLastName",
					"Phone Number" => "getPhoneNumber",
					"Rating" => "getRating",
				];

				echo $gui->getComponentHTML("Table", [
					"columns" => ["Owner ID", "First Name", "Last Name", "Phone Number", "Rating"],
					"object" => $owner,
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
		flex: 0 0 1;
		width: 100%;
		overflow-x: auto;
		padding: 1%;
	}
	.vertical-stack {
		display: flex;
		flex-direction: column;
		gap: 24px;
		width: 79%;
		position: absolute;
		top: 0;
	}
</style>
