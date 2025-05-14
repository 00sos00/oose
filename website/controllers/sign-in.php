<?php
session_start();
require_once __DIR__ . "/../Model/Database.php";
require_once __DIR__ . "/../Model/User.php";
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
			U.USER_ID, U.FIRST_NAME, U.LAST_NAME, U.COUNTRY_CODE, U.PHONE_NUMBER, SU.EMAIL, SU.PASSWORD
		from USER U
		join SYSTEM_USER SU
		on U.USER_ID = SU.USER_ID
		where EMAIL = '$email';
	");
	if ($userResult = $result->fetch_assoc()) {
		if ($password == $userResult["PASSWORD"]) {
			$sysUser = System_User::parseResult($userResult);
			$_SESSION["user"] = $sysUser;
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
