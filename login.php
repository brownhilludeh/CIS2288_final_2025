<?php
	$pageTitle = "News - Login";
	include ("incPageHead.php");

	//Login processing logic here
    //Validate form input against hard coded values for username and password

?>
        <form action="login.php" method="post">
			<div class="form-group">
				<label for="user">Username:</label>
				<input type="text" name="username" id="user" class="form-control"/><br>
				<label for="password">Password:</label>
				<input type="password" id="password" name="password" class="form-control"/><br>
				<input type="submit" name="submit" value="Login" class="btn btn-default"/>
			</div>
        </form>
        <?php
            if (isset($error)) {
                echo "<div class='alert alert-danger'>$error</div>";
            }

			include ("incPageFoot.php");
        ?>


