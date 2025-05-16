<?php
ini_set('session.cookie_httponly', 1);
session_start();

if (!isset($_SESSION["user_id"])) {
	$_SESSION = [];
	header("Location: /");
	exit();
}
