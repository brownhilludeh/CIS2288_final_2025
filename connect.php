<?php
/**
 * Description: config file for database 
 * Page: connect.php
 * 
 * @author Brownhill Udeh <co-author>
 * @since 2025-12-11
 */

$dbHost = 'localhost';
$dbName = 'news2288';
$dbUser = 'root';
$dbPass = '';

$mysqli = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($mysqli->connect_errno) {
	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
//db connect script here user is root pass is empty
?>