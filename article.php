<?php
SESSION_start();
include("inc/connection.php");
$articleTitle = "Article Title";
$articleContent = "Invalid article ID.";
if (isset($_GET['id'])) {
    $articleId = $_GET['id'];
    $query = "SELECT * FROM articles WHERE ID = $articleId";
    
    $result = mysqli_query($con, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($con));
    }
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $articleTitle = $row['dbTitle'];
        $articleContent = $row['dbarticle'];
    } else {
        $articleTitle = "Article not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $articleTitle; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 30px;
        }
        .jumbotron {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            border-radius: 0;
            margin-bottom: 30px;
            text-align: center;
        }
        .article-title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .article-content {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
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
          </ul>
        </div>
      </nav> 
      <div class="container">
    <div class="jumbotron">
        <h1 class="display-4"><?php echo $articleTitle; ?></h1>
    </div>
    
    <div class="card">
        <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="Article Image">
        <div class="card-body">
            <h5 class="card-title text-center font-weight-bold">
                <?php echo $articleTitle; ?>
            </h5>
            <div class="article-content">
                <?php echo $articleContent; ?>
            </div>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
