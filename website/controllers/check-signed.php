<?php
session_start();

if (!isset($_SESSION["user_id"])) {
	$_SESSION = [];
	header("Location: /");
	exit();
}
