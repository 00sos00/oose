<?php
//require_once "./database/db_connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign In</title>
	<?php
	require_once "./components/GUI.php";
	GUI::getInstance()->renderAllCSS();
	?>
	<link rel="stylesheet" href="index.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wdth,wght@62.5..100,100..900&family=Roboto:ital,wdth,wght@0,75..100,100..900;1,75..100,100..900&display=swap" rel="stylesheet">
	<script src="jquery-3.7.1.js"></script>
	<script src="index.js"></script>
</head>

<body>
	<form action="#" id="signForm">
		<h1 class="title">Sign In</h1>
		<?php
		GUI::getInstance()->renderComponent(
			"InputHolder",
			[
				"label" => "Email",
				"input-name" => "email",
				"input-type" => "email"
			]
		);
		GUI::getInstance()->renderComponent(
			"InputHolder",
			[
				"label" => "Password",
				"input-name" => "password",
				"input-type" => "password"
			]
		);
		?>
		<a id="forgot-pass">Forgot your password?</a>
		<button type="submit" class="btn">Sign In</button>
	</form>
	<form action="#" id="forgotForm" style="display: none;">
		<h1 class="title">Forgot your password?</h1>
		<?php
		GUI::getInstance()->renderComponent(
			"InputHolder",
			[
				"label" => "Please enter your email address",
				"input-name" => "email",
				"input-type" => "email"
			]
		);
		?>
		<div class="btns-container">
			<button type="submit" class="btn">Continue</button>
			<button type="button" id="cancelBtn" class="btn">Cancel</button>
		</div>
	</form>
</body>

</html>