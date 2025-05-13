<?php
session_start();
require_once __DIR__ . "/../Model/Database.php";
$db = DataBase::getInstance();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$email = htmlspecialchars($_POST["email"] ?? "");
	$password = htmlspecialchars($_POST["password"] ?? "");
	if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
		$_SESSION["error"] = "Please enter a valid email address";
		header("Location: /");
		exit();
	}
	if (strlen($password) < 8) {
		$_SESSION["error"] = "A minimum of 8 characters is needed for a password";
		header("Location: /");
		exit();
	}

	$result = $db->query("
		select
			user_id, email, password
		from system_user
		where email = '$email';
	");
	if ($user = $result->fetch_assoc()) {
		if ($password = $user["password"]) {
			$_SESSION["user_id"] = $user["user_id"];
			unset($_SESSION["error"]);
			header("Location: /accounts");
		} else {
			$_SESSION["error"] = "Invalid password";
			header("Location: /");
		}
	} else {
		$_SESSION["error"] = "Account not found";
		header("Location: /");
	}
} else {
	header("Location: /");
}
