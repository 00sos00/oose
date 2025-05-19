<?php
require_once __DIR__ . "/../Model/Database.php";
$db = DataBase::getInstance();
session_start();
$prevPage = $_SESSION["previous-page"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$firstName = htmlspecialchars($_POST["first-name"] ?? "");
	$lastName = htmlspecialchars($_POST["last-name"] ?? "");
	$countryCode = htmlspecialchars($_POST["country-code"] ?? "");
	$phoneNumber = htmlspecialchars($_POST["phone-number"] ?? "");
	$email = htmlspecialchars($_POST["email"] ?? "");
	$roleId = (int)htmlspecialchars($_POST["role"] ?? "");

	if ($countryCode[0] != '+') {
		$_SESSION["error"] = "Please enter a valid country code";
		header("Location: $prevPage");
		exit();
	}

	if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
		$_SESSION["error"] = "Please enter a valid email address";
		header("Location: $prevPage");
		exit();
	}

	$db->query("
		INSERT INTO Luxville.USER
			(FIRST_NAME, LAST_NAME, COUNTRY_CODE, PHONE_NUMBER)
		VALUES
			('$firstName', '$lastName', '$countryCode', '$phoneNumber')"
	);
	$newId = $db->getInsertId();
	$db->query("
		INSERT INTO Luxville.SYSTEM_USER
			(USER_ID, ROLE_ID, EMAIL, PASSWORD)
		VALUES
			($newId, $roleId, '$email', '')"
	);
	// TODO: Send reset password email

	header("Location: $prevPage");
}