<?php
require_once __DIR__ . "/../Model/Database.php";
$db = DataBase::getInstance();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$userId = htmlspecialchars($_POST["id"]);
	if ($userId) {
		$result = $db->delete("DELETE FROM USER WHERE USER_ID = $userId");
		$db->delete("DELETE FROM SYSTEM_USER WHERE USER_ID = $userId");
		// TODO: Figure out a way to delete dynamically based on type of user
		echo $result;
		exit();
	}

	echo 0; 
}