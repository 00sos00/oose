<?php
require_once __DIR__ . "/../Model/Database.php";
require_once __DIR__ . "/../gui/GUI.php";
$db = DataBase::getInstance();
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
		$queryResult = $db->query("select concat('#', user_id), first_name, last_name, country_code, phone_number from user limit 10;");
		echo $gui->getComponentHTML("Table", [
			"columns" => ["User ID", "First Name", "Last Name", "Country Code", "Phone Number"],
			"queryResult" => $queryResult,
			"hasActionColumn" => true
		]);
		?>
	</div>
</body>

</html>