<?php
/*
 * Description: check if they are logged in, if not send to login php
 * Page: incCheckCreds.php
 * 
 * @author Brownhill Udeh <co-author>
 * @since 2025-12-11
 */
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
   header("Location: login.php?error=You are not logged in");
}
?>