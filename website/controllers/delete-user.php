<?php
require_once __DIR__ . "/../Model/Database.php";
$db = DataBase::getInstance();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$userId = htmlspecialchars($_POST["id"]);
	if ($userId) {
		$result = $db->delete("DELETE FROM USER WHERE USER_ID = $userId");
		// TODO: Delete from "SYSTEM_USER" Table as well
		echo $result;
		exit();
	}

	echo 0; 
}