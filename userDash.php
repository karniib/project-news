<?php
SESSION_start();
include('inc/connection.php');
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

// SQL query to select the first three rows from the "articles" table
$sql = "SELECT * FROM articles LIMIT 3";
$result = $con->query($sql);

// Close the database connection
$con->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hadi News</title>
  <!-- Include Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-image: url('images/news.avif');
      /* Replace 'your-image.jpg' with your actual image file */
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-position: center center;
      background-color: #f8f9fa;
      /* Fallback color in case the image is missing */
    }

    .jumbotron {
      text-align: center;
      background-color: rgba(255, 255, 255, 0.7);
      /* Transparent white background (adjust alpha value for transparency) */
      color: #000000;
      margin-bottom: 20px;
    }

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

    /* Define the blue-text class */
    .blue-text {
      color: blue;
    }
    .custom-button {
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
        /* Hover effect for the button */
        .custom-button:hover {
            background-color: #0056b3; /* Darker background color on hover */
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
  <div class="jumbotron text-center">
    <h1>Welcome to Hadi News</h1>
    <p>Where all the sources are Trusted</p>
  </div>
  <div class="container">
    <h2>Latest Articles</h2>
    <table class="table table-bordered" style="background-color: lightblue;">
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
  <div class="container text-center">
    <!-- Customized button that links to PublishedArticles.php -->
    <a href="PublishedArticles.php" class="custom-button">Go to Published Articles</a>
  </div>
  <!-- Include Bootstrap JS (optional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>
