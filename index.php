<?php
/**
 * Description: index.php
 * 
 * @author Brownhill Udeh <co-author>
 * @since 2025-12-11
 */

$pageTitle = "News - Home";
include("incPageHead.php");
require_once("connect.php");

//select all news stories
$sql = "SELECT * FROM news";
$result = $mysqli->query($sql);
?>
<div class="jumbotron"></div>
<?php
//loop through news stories
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {

		echo "<div class='panel panel-default'>";
		// if logged in do this
		if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
			$glyphEditIcon = "<span style='float:right'><a title='edit this story' href='editNews.php?id=$row[storyId]'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a></span>";
		} else {
			$glyphEditIcon = "";
		}

		echo "<div class='panel-heading'>$row[headline]  $glyphEditIcon</div>";
		echo "<div class='panel-body'>$row[storyDetails]</div>";
		echo "</div>";
	}
}

include("incPageFoot.php");
?>