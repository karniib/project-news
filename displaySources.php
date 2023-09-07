<?php
SESSION_start();
include("inc/connection.php"); 
$query = "SELECT sources.ID, sources.Name, sources.Type
FROM sources";

$result = mysqli_query($con, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sources Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles for table */
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 30px;
        }
        .table {
            background-color: #ffffff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .table thead th {
            background-color: #007bff;
            color: #fff;
        }
        .table-hover tbody tr:hover {
            background-color: #f0f0f0;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        /* Add custom style for the article title links */
        .article-title a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
        /* Add custom style for buttons */
        .btn-action {
            margin-right: 5px;
        }
        .navbar {
            background-color: #007bff; /* Navbar background color */
        }

        .navbar-dark .navbar-nav .nav-link {
            font-size: 18px; /* Increase font size */
            color: white !important; /* Text color (important to override Bootstrap styles) */
            margin-right: 20px;
        }

        .navbar-dark .navbar-toggler-icon {
            background-color: white; /* Color of the toggler icon */
        }

        /* Define the blue-text class */
        .blue-text {
            color: blue;
        }

    </style>
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
<div class="jumbotron">
    <h1 class="display-4">Sources Table</h1>
</div>
<div class="container">
    <h1>Sources Table</h1>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Source Name</th>
                <th>Type</th>
                <th>Action</th> <!-- New column for actions -->
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['ID'] . "</td>";
                echo "<td>" . $row['Name'] . "</td>";
                echo "<td>" . $row['Type'] . "</td>";
                echo '<td>
                        <a href="updateSource.php?id=' . $row['ID'] . '" class="btn btn-primary btn-action">Update</a>
                        <a href="deleteSource.php?id=' . $row['ID'] . '" class="btn btn-danger btn-action">Delete</a>
                      </td>';
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<!-- Include Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>
