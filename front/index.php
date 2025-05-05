<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign In</title>
	<link rel="stylesheet" href="index.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wdth,wght@62.5..100,100..900&family=Roboto:ital,wdth,wght@0,75..100,100..900;1,75..100,100..900&display=swap" rel="stylesheet">
</head>

<body>
	<form action="/" class="sign-holder">
		<h1 class="sign-title">Sign In</h1>
		<div class="input-holder">
			<label for="username" class="sign-label">Username</label>
			<input name="username" type="text" class="sign-input">
		</div>
		<div class="input-holder">
			<label for="password" class="sign-label">Password</label>
			<input name="password" type="password" class="sign-input">
		</div>
		<a href="/" class="forgot-pass">Forgot your password?</a>
		<button type="submit" class="sign-btn">Sign In</button>
	</form>
</body>

</html>