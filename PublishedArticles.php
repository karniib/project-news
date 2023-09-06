<?php
// Database connection
include('inc/connection.php');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// SQL query to select all rows from the "articles" table
$sql = "SELECT * FROM articles";
$result = $con->query($sql);

// Close the database connection
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Articles</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
         .navbar {
      background-color: #007bff;
      /* Navbar background color */
    }

    .navbar-dark .navbar-nav .nav-link {
      font-size: 18px;
      /* Increase font size */
      color: white !important;
      /* Text color (important to override Bootstrap styles) */
      margin-right: 20px;
    }

    .navbar-dark .navbar-toggler-icon {
      background-color: white;
      /* Color of the toggler icon */
    }
        body {
            background-color: lightblue; /* Set background color to light blue */
        }
        .container {
            padding: 20px;
        }
        table {
            background-color: #ffffff; /* Table background color (white) */
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        a {
            text-decoration: none;
            color: #007bff; /* Link color (blue) */
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline; /* Underline on hover */
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
          <a class="nav-link" href="Userdash.php">User Dashboard</a>
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
    <h2>All Articles</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['ID'] . '</td>';
                    echo '<td><a href="article.php?id=' . $row['ID'] . '">' . $row['dbTitle'] . '</a></td>';
                    echo '<td>' . $row['dbcategory'] . '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="3">No articles found</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>
<!-- Include Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
