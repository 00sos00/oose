<?php
$host = $_SERVER["SERVER_NAME"] == "localhost" ? "localhost" : "FutureHostName";
$dbname = "luxville";
$username = "luxy";
$password = "SMq]ysXLVnTr0@ts";

try {
	$_GLOBAL["conn"] = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	$_GLOBAL["conn"]->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	session_start();
} catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
