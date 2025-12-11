<?php
/**
 * Description: this page will present the user with an edit form
 * Page: editNews.php
 * 
 * @author Brownhill Udeh <co-author>
 * @since 2025-12-11
 */

$pageTitle = "News - Edit";
include("incPageHead.php");

require_once('incCheckCreds.php');
require_once("connect.php");

// Initialize variables
$error = [];
$message = '';
$newsData = [];
$newsId = 0;
$headline = '';
$storyDetails = '';

// Getting the news story id from URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: index.php?error=Invalid news story id");
    exit();
}
$newsId = (int) $_GET['id'];

// Fetch existing news story
$query = "SELECT * FROM news WHERE storyId = " . $newsId;
$result = $mysqli->query($query);

// Check if news story exists
if ($result->num_rows == 0) {
    header("Location: index.php?error=News story does not exist");
    exit();
}

// Fetch news story
$newsData = $result->fetch_assoc();

// Set variables
$newsId = $newsData['storyId'];
$headline = $newsData['headline'];
$storyDetails = $newsData['storyDetails'];

// Processing form submit
if (isset($_POST['submit'])) {
    // Sanitize input 
    $newsId = (int) $_POST['newsId'];
    $headline = trim($mysqli->real_escape_string($_POST['headline']));
    $storyDetails = trim($mysqli->real_escape_string($_POST['storyDetails']));

    // Validate input
    if (empty($headline) || empty($storyDetails)) {
        $error[] = "One or more fields was empty.";
    }

    // Check for errors (fixed typo: $errors -> $error)
    if (empty($error)) {
        // Update news story
        $updateQuery = "UPDATE news SET headline = '$headline', storyDetails = '$storyDetails' WHERE storyId = " . $newsId;
        $updateResult = $mysqli->query($updateQuery);

        if ($updateResult) {
            $message = "<div class='alert alert-success'>Edit Success <a href='index.php'>View All News</a></div>";
        } else {
            $message = "<div class='alert alert-danger'>There was a problem with your query. <a href=\"javascript:history.back()\">Go Back</a></div>";
        }
    } else {
        $message = "<div class='alert alert-danger'>" . implode('<br>', $error) . " <a href=\"javascript:history.back()\">Go Back</a></div>";
    }
}
?>

<body>
    <h2>Edit News Item</h2>

    <?php
    // Display message if exists
    if (!empty($message)) {
        echo $message;
    }
    ?>

    <form action="editNews.php?id=<?php echo $newsId; ?>" method="post">
        <div class="form-group">
            <label for="headline">Headline:</label><br>
            <input type="text" id="headline" class="form-control" name="headline" value="<?php echo htmlspecialchars($headline); ?>" required /><br>
        </div>
        <div class="form-group">
            <label for="storyDetails">Story Details:</label><br>
            <textarea id="storyDetails" class="form-control" name="storyDetails" required><?php echo htmlspecialchars($storyDetails); ?></textarea><br>
            <input type="hidden" name="newsId" value="<?php echo $newsId; ?>" />
            <input type="submit" name="submit" class="btn btn-default" value="Commit Edit">
        </div>
    </form>

    <?php
    include("incPageFoot.php");
    ?>