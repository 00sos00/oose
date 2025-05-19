<?php
session_start();
require_once __DIR__ . "/../Model/Database.php";
$db = DataBase::getInstance();
$prevPage = $_SESSION["previous-page"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$userId = htmlspecialchars($_POST["id"] ?? "");
	$firstName = htmlspecialchars($_POST["first-name"] ?? "");
	$lastName = htmlspecialchars($_POST["last-name"] ?? "");
	$countryCode = htmlspecialchars($_POST["country-code"] ?? "");
	$phoneNumber = htmlspecialchars($_POST["phone-number"] ?? "");
	$email = htmlspecialchars($_POST["email-address"] ?? "");
	$roleId = (int)htmlspecialchars($_POST["role"] ?? "");

	if ($userId == "") {
		header("Location: $prevPage");
		exit();
	}

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
		UPDATE USER
		SET FIRST_NAME = '$firstName',
			LAST_NAME = '$lastName',
			COUNTRY_CODE = '$countryCode',
			PHONE_NUMBER = '$phoneNumber'
		WHERE USER_ID = $userId
	");
	$db->query("
		UPDATE SYSTEM_USER
		SET EMAIL = '$email',
			ROLE_ID = $roleId
		WHERE USER_ID = $userId
	");

	header("Location: $prevPage");
}
else if ($_SERVER["REQUEST_METHOD"] == "GET") {
	$userId = htmlspecialchars($_GET["id"] ?? "");
	if ($userId != "") {
		$result = $db->query("
			SELECT
				USER.FIRST_NAME,
				USER.LAST_NAME,
				USER.COUNTRY_CODE,
				USER.PHONE_NUMBER,
				SYSTEM_USER.EMAIL,
				SYSTEM_USER.ROLE_ID
			FROM USER, SYSTEM_USER, ROLE
			WHERE
				USER.USER_ID = $userId AND
				SYSTEM_USER.USER_ID = USER.USER_ID AND
				SYSTEM_USER.ROLE_ID = ROLE.ROLE_ID 
		");
		echo json_encode($result->fetch_assoc());
	}
}