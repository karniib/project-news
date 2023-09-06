<?php
include("inc/connection.php"); // Include your database connection file

if (isset($_GET['id'])) {
$articleID=$_GET['id'];
    
    $updateQuery = "UPDATE articles SET status = 0 WHERE ID = $articleID;";
    $updateResult = mysqli_query($con, $updateQuery);

    if ($updateResult) {
        echo "success"; // Return a success message
        header("location:displayArticles.php");
    } else {
        echo "error"; // Return an error message if the update fails
    }
} else {
    echo "no id"; // Return an error message if the 'id' parameter is not set
}
?>
