<?php
require_once "gui/GUI.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php
	echo GUI::getInstance()->getComponentHTML("Head", ["page-title" => "Sign In"]);
	?>
</head>

<body>
	<?php
	require_once "Model/Database.php";
	$db = DataBase::getInstance();
	$result = $db->query("select user_id, first_name, last_name, country_code, phone_number from user limit 10");
	echo GUI::getInstance()->getComponentHTML("Table", [
		"columns" => ["User ID", "First Name", "Last Name", "Country Code", "Phone Number"],
		"queryResult" => $result,
		"hasActionColumn" => true
	]);
	?>
	<!-- <?php
			echo GUI::getInstance()->getComponentHTML("Sidebar", ["selected-page" => "owners"]);
			?>
	<form action="#" id="signForm">
		<h1 class="title">Sign In</h1>
		<?php
		echo GUI::getInstance()->getComponentHTML("InputHolder", [
			"label" => "Email",
			"input-name" => "email",
			"input-type" => "email"
		]);
		echo GUI::getInstance()->getComponentHTML("InputHolder", [
			"label" => "Password",
			"input-name" => "password",
			"input-type" => "password"
		]);
		echo GUI::getInstance()->getComponentHTML("Topbar", [
			"user-name" => "Gunnar Hajderi",
			"user-role" => "Admin",
			"profile-img" => "assets/user-profile.jpg"
		]);
		?>
		<a id="forgot-pass">Forgot your password?</a>
		<button type="submit" class="btn">Sign In</button>
	</form> -->
	<form action="#" id="forgotForm" style="display: none;">
		<h1 class="title">Forgot your password?</h1>
		<?php
		echo GUI::getInstance()->getComponentHTML("InputHolder", [
			"label" => "Please enter your email address",
			"input-name" => "email",
			"input-type" => "email"
		]);
		?>
		<div class="btns-container">
			<button type="submit" class="btn">Continue</button>
			<button type="button" id="cancelBtn" class="btn">Cancel</button>
		</div>
	</form>
</body>

</html>