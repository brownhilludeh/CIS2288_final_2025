<?php
/**
 * Description: index.php
 * 
 * @author Brownhill Udeh
 * @since 2025-12-11
 */
$pageTitle = "News - Home";
include("incPageHead.php");
?>
<div class="jumbotron"></div>
<?php

echo "<div class='panel panel-default'>";
// if logged in do this
$glyphEditIcon = "<span style='float:right'><a title='edit this story' href='editNews.php'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a></span>";
//else
$glyphEditIcon = "";

echo "<div class='panel-heading'>news headline here</div>";
echo "<div class='panel-body'>story here</div>";
echo "</div>";

include("incPageFoot.php");
?>