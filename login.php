<?php
/**
 * Description: this page will present the user with a login form
 * Page: login.php
 * 
 * @author Brownhill Udeh <co-author>
 * @since 2025-12-11
 */
$pageTitle = "News - Login";
include("incPageHead.php");

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
	header("Location: index.php?message=You are already logged in");
	exit();
}

//Login processing logic here

//Validate form input against hard coded values for username and password
if (!isset($_POST['submit'])) {
	
	?>
	<form action="login.php" method="post">
		<div class="form-group">
			<label for="user">Username:</label>
			<input type="text" name="username" id="user" class="form-control" /><br>
			<label for="password">Password:</label>
			<input type="password" id="password" name="password" class="form-control" /><br>
			<input type="submit" name="submit" value="Login" class="btn btn-default" />
		</div>
	</form>
	<?php
} else {
	include("connect.php");

	$username = $_POST['username'];
	$password = $_POST['password'];

	//check to see if username and password match
	if ($username == "admin" && $password == "news2288") {
		$_SESSION['loggedIn'] = true;
		header("Location: index.php?message=You are now logged in");
		exit();
	} else {
		$error = "Invalid username or password";
	}
}
if (isset($error)) {
	echo "<div class='alert alert-danger'>$error</div>";
}

include("incPageFoot.php");
?>