<?php
SESSION_start();
include("inc/connection.php");
include("inc/security.php");

// Query for Unpublished Articles
$queryUnpublished = "SELECT articles.ID, articles.dbtitle, dbCategory, dbdate, dbsource, status,operator
                    FROM articles
                    WHERE status = '0'";
$resultUnpublished = mysqli_query($con, $queryUnpublished);

// Query for Published Articles
$queryPublished = "SELECT articles.ID, articles.dbtitle, dbCategory, dbdate, dbsource, status,operator
                  FROM articles
                  WHERE status = '1'";
$resultPublished = mysqli_query($con, $queryPublished);

if (!$resultUnpublished || !$resultPublished) {
    die("Query failed: " . mysqli_error($con));
}

// Function to update the article status to "1"
function publishArticle($articleID)
{
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style> .navbar {
            background-color: #007bff; /* Navbar background color */
        }

        .navbar-dark .navbar-nav .nav-link {
            font-size: 18px; /* Increase font size */
            color: white !important; /* Text color (important to override Bootstrap styles) */
            margin-right: 20px;
        }

        .navbar-dark .navbar-toggler-icon {
            background-color: white; /* Color of the toggler icon */
        }</style>

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
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="jumbotron text-center" style="background-color: white; margin: 5px 0; padding: 5px;">
            <h1>Articles Table</h1>
            <div class="container">
                <h2>Unpublished Articles</h2>
                <table class="table table-striped table-hover">
                    <!-- Table header for Unpublished Articles -->
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
                    <!-- Table body for Unpublished Articles -->
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($resultUnpublished)) {
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
                                <button class="btn btn-success publish-button" data-article-id="' . $row['ID'] . '">Publish</button>
                              </td>';
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="container">
                <h2>Published Articles</h2>
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
                    <!-- Table body for Published Articles -->
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($resultPublished)) {
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
                <a href="unpublishArticle.php?id=' . $row['ID'] . '" class="btn btn-warning">UnPublish</a>
              </td>';
                            echo "</tr>";
                        }
                        ?>
                    </tbody>

                </table>
            </div>
            <!-- Include Bootstrap JS (optional) -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
       $(document).ready(function() {
    // Handle "Publish" button click
    $(".publish-button").click(function() {
        var articleID = $(this).data("article-id");
        $.ajax({
            url: "publishArticle.php", // Create a new PHP file to handle the status update
            method: "POST",
            data: {
                id: articleID
            },
            success: function(response) {
                if (response == "success") {
                    alert("Article published successfully.");
                    setTimeout(function() {
                        location.reload(); // Reload the current page
                    }, 500);
                } else {
                    alert("Failed to publish article.");
                }
            }
        });
    });
});

    </script>
</body>

</html>