<?php

ini_set('session.cookie_httponly', 1);
session_start();
if (isset($_SESSION["user_id"])) {
	header("Location: /accounts");
	exit();
}
require_once "Model/Database.php";
require_once "gui/GUI.php";
$db = DataBase::getInstance();
$gui = GUI::getInstance();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?= $gui->getComponentHTML("Head", ["page-title" => "Sign In"]) ?>
	<link rel="stylesheet" href="index.css">
	<script src="index.js"></script>
</head>

<body>
	<form action="controllers/sign-in.php" method="post" id="signForm">
		<h1 class="title">Sign In</h1>
		<p class="error"><?= $_SESSION["error"] ?? "" ?></p>
		<?php
		echo $gui->getComponentHTML("InputHolder", [
			"label" => "Email",
			"input-name" => "email",
			"input-type" => "email"
		]);
		echo $gui->getComponentHTML("InputHolder", [
			"label" => "Password",
			"input-name" => "password",
			"input-type" => "password"
		]);
		?>
		<a id="forgot-pass">Forgot your password?</a>
		<button type="submit" class="btn">Sign In</button>
	</form>
	<form action="#" id="forgotForm" style="display: none;">
		<h1 class="title">Forgot your password?</h1>
		<?=
		$gui->getComponentHTML("InputHolder", [
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

<?php unset($_SESSION["error"]) ?>