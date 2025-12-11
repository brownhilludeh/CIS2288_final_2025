<?php
$pageTitle = "News - Edit";
include("incPageHead.php");

/*
This page will present the user with an edit form and is also used to process form input

 //User Messages
            $message = "<div class='alert alert-success'>Edit Success <a href='index.php'>View All News</a></div>";
            $message = "<div class='alert alert-danger'>There was a problem with your query. <a href=\"javascript:history.back()\">Go Back</a></div>";
            $message = "<div class='alert alert-danger'>One or more fields was empty. <a href=\"javascript:history.back()\">Go Back</a></div>";
*/
?>
    <body>
    <h2>Edit News Item</h2>

    <form action="editNews.php" method="post">
        <div class="form-group">
            <label for="headLine">Headline:</label><br>
            <input id="headLine" type="text" name="headline" class="form-control" value=""/>
        </div>
        <div class="form-group">
            <label for="storyDetails">Story Details:</label><br>
            <textarea id="storyDetails" class="form-control" name="storyDetails"></textarea><br>
            <input type="hidden" name="id" value=""/>
            <input type="submit" name="submit" class="btn btn-default" value="Commit Edit">
        </div>
    </form>

<?php
include("incPageFoot.php");
?>