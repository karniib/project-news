<?php
SESSION_start();
include("inc/connection.php"); 
include("inc/security.php");

if (isset($_GET['id'])) {
    $operatorID = mysqli_real_escape_string($con, $_GET['id']);

    // Query to select articles written by the specified operator
    $queryOperatorArticles = "SELECT articles.ID, articles.dbtitle, dbCategory, dbdate, dbsource, status,operator
    FROM articles WHERE operator = '$operatorID'";
    $resultOperatorArticles = mysqli_query($con, $queryOperatorArticles);

    if (!$resultOperatorArticles) {
        die("Query failed: " . mysqli_error($con));
    }
} else {
    // Handle the case where 'id' parameter is not set
    // Redirect or show an error message as needed
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operator's Articles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add your custom styles here if needed -->
</head>
<body>
    <div class="container">
        <h1>Articles Written by Operator <?php echo $operatorID; ?></h1>
        <ul>
                <table class="table table-striped table-hover">
                <!-- Table header for Published Articles -->
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Source</th>
                        <th>Status</th>
                        <th>operator</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <!-- Table body for Published Articles -->
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($resultOperatorArticles)) {
                        echo "<tr>";
                        echo "<td>" . $row['ID'] . "</td>";
                        echo '<td class="article-title"><a href="article.php?id=' . $row['ID'] . '">' . $row['dbtitle'] . '</a></td>';
                        echo "<td>" . $row['dbCategory'] . "</td>";
                        echo "<td>" . $row['dbdate'] . "</td>";
                        echo "<td>" . $row['dbsource'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo '<td><a href="operatorArticles.php?id=' . $row['operator'] . '">' . $row['operator'] . '</a></td>';
                        echo '<td>
                                <a href="updateArticle.php?id=' . $row['ID'] . '" class="btn btn-primary">Update</a>
                                <a href="deleteArticle.php?id=' . $row['ID'] . '" class="btn btn-danger">Delete</a>
                              </td>';
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        <!-- Add any other content or styling as needed -->
    </div>
</body>
</html>
