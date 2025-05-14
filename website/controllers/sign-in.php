<?php
session_start();

// Check if the user has logged in
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// Get the email and password from the form
	$email = htmlspecialchars($_POST["email"] ?? "");
	$password = htmlspecialchars($_POST["password"] ?? "");

	// Check if the email is not a valid email address
	// set the error message
	// and redirect to the login page
	if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
		$_SESSION["error"] = "Please enter a valid email address";
		header("Location: ../index.php");
		exit();
	}
	// Load the user from the database
	// using the email and password
	require_once "../Model/User.php";
	$user = Load($email, $password);

	// Check if the user is found
	if(!isset($user)) {
		// if the user is not found, set the error message
		// and redirect to the login page
		$_SESSION["error"] = "Email or password is incorrect";
		header("Location: ../index.php");
		exit();
	}else{
		// if the user is found, set the session variables
		$_SESSION["user_id"] = $user->getUserId();
		$_SESSION["user_first_name"] = $user->getFirstName();
		$_SESSION["user_last_name"] = $user->getLastName();
		$_SESSION["user_email"] = $user->getEmail();
		header("Location: ../View/Account_view.php");
		exit();
	}
}
