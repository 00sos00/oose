<?php

// Get all parameters from the query string
$params = $_GET;

// Build the new URL (change 'index.php' to your target file)
$newUrl = 'index.php?' . http_build_query($params);

// Redirect to the new URL
header("Location: $newUrl");
exit();