<?php
/*
 * Description: logout.php
 * 
 * @author Brownhill Udeh <co-author>
 * @since 2025-12-11
 */

session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;

//destory the session cookie

setcookie(session_name(), '', time() - 3600);

//destory the session
session_destroy();

header("Location: index.php?message=You are now logged out");
// how do you log someone out of a session/end a session
// then send user directly to index.php
?>