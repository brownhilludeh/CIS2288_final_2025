<?php
/*
 * Description: incPageHead.php
 * 
 * @author Brownhill Udeh <co-author>
 * @since 2025-12-11
 */

session_start();

$isLoggedIn = isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true;
?>


<!doctype html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://getbootstrap.com/docs/3.3/dist/css/bootstrap.min.css">
	<link href="css/jumbotron-narrow.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet" />
	<title><?php echo $pageTitle; ?></title>
</head>

<body>
	<div class="container">
		<div class="header clearfix">
			<nav>
				<ul class="nav nav-pills pull-right">
					<li role="presentation"><a href="index.php">Home</a></li>
					<!-- Both buttons below should never be visible at the same time -->
					<?php if ($isLoggedIn): ?>
						<li role='presentation'><a href='logout.php'>Logout</a></li>
					<?php else: ?>
						<li role='presentation'><a href='login.php'>Login</a></li>
					<?php endif; ?>
				</ul>
			</nav>
			<h3 class="text-muted"><a href="/">The CIS Blog</a></h3>
		</div>
		<!-- Message alert -->
		<?php if (isset($message)): ?>
			<?php echo $message; ?>
		<?php endif; ?>
		<div class="row marketing">
			<div class="col-lg-12">