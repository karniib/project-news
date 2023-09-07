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
<nav class="navbar navbar-expand-lg navbar-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="admin_dashboard.php">Admin Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item dropdown dmenu">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                  Account
                </a>
                <div class="dropdown-menu sm-menu">
                    <p style="text-align:center;">Logged in as <?php echo $_SESSION["user_FullName"] ?></p>
                    <a class="dropdown-item blue-text" href="displayOpByID.php" style="text-align:center;">Info</a>
                    <a class="dropdown-item blue-text" href="logoutAction.php" style="text-align:center;">Logout</a>
                </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contactUS.php">Contact Us</a>
            </li>
            <li class="nav-item dropdown dmenu">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                  Articles
                </a>
                <div class="dropdown-menu sm-menu">
                    <a class="dropdown-item blue-text" href="addArticle.php" style="text-align:center;">Add an Article</a>
                    <a class="dropdown-item blue-text" href="displayArticles.php" style="text-align:center;">All Articles</a>
                </div>
            </li>
            <li class="nav-item dropdown dmenu">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                  Operators
                </a>
                <div class="dropdown-menu sm-menu">
                    <a class="dropdown-item blue-text" href="displayOps.php" style="text-align:center;">View Operators</a>
                    <a class="dropdown-item blue-text" href="addOperator.php" style="text-align:center;">Add an Operator</a>
                </div>
            </li>
            <li class="nav-item dropdown dmenu">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                  Categories
                </a>
                <div class="dropdown-menu sm-menu">
                    <a class="dropdown-item blue-text" href="displayCat.php" style="text-align:center;">View Categories</a>
                    <a class="dropdown-item blue-text" href="addCategory.php" style="text-align:center;">add Categories</a>
                </div>
            </li>
            <li class="nav-item dropdown dmenu">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                  Source
                </a>
                <div class="dropdown-menu sm-menu">
                    <a class="dropdown-item blue-text" href="displaySources.php" style="text-align:center;">View Sources</a>
                    <a class="dropdown-item blue-text" href="addSource.php" style="text-align:center;">add Sources</a>
                </div>
            </li>
          </ul>
        </div>
    </nav>
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
