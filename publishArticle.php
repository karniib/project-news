<?php
include("inc/connection.php");

if (isset($_POST['id'])) {
    $articleID = $_POST['id'];
    if (publishArticle($articleID)) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "Invalid request.";
}

// Function to update the article status to "1"
function publishArticle($articleID) {
    global $con;
    $articleID = mysqli_real_escape_string($con, $articleID);

    $updateQuery = "UPDATE articles SET status = '1' WHERE ID = '$articleID'";
    $updateResult = mysqli_query($con, $updateQuery);
    if ($updateResult) {
        return true; // Success
    } else {
        return false; // Failure
    }
}
?>
