<?php
// Start the session (make sure to start the session at the very beginning of your PHP script)
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            background-image: url('images/newsbg.jpeg'); /* Replace 'your-image.jpg' with your actual image file */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center center;
            background-color: #f8f9fa; /* Fallback color in case the image is missing */
        }
        .jumbotron {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.7); /* Transparent white background (adjust alpha value for transparency) */
            color: #000000;
            padding: 40px 0;
            margin-bottom: 20px;
        }
        .container {
            text-align: center;
        }
        /* Style for the "Manage Operators" row */
        .manage-row {
            background-color: #007bff;
            color: #fff;
            transition: background-color 0.3s;
        }
        .manage-row:hover {
            background-color: #0056b3;
        }
        /* Style for buttons */
        .btn-action {
            text-decoration: none;
            color: #fff;
            font-weight: 600;
            padding: 6px 12px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            transition: background-color 0.3s;
            display: inline-block; /* Display buttons inline */
            margin-right: 10px; /* Add margin for spacing between buttons */
        }
        .btn-action:hover {
            background-color: #0056b3;
        }
        /* Custom colors for cards */
        .card {
            background-color: #dcdcdc; /* Slightly darker gray background color */
            border: 1px solid #e6e6e6;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden; /* Hide overflow content */
        }
        .card-title {
            color: #007bff;
        }
        .card-subtitle {
            color: #6c757d;
        }
        .card-link {
            color: #007bff;
            font-weight: bold;
        }
        .card-body-hidden {
            display: none; /* Initially hide the card text */
        }
        .card:hover .card-body-hidden {
            display: block; /* Display card text on hover */
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
    <div class="jumbotron">
        <h1 class="display-4">Admin Dashboard</h1>
        <p class="lead" style="color: red;">Welcome <?php echo $_SESSION["user_FullName"] ?> to your admin control panel</p>
    </div>  
    <div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-title">
                    <h5 class="card-title">Articles</h5>
                </div>
                <div class="card-body card-body-hidden"> <!-- Initially hidden card text -->
                    <h6 class="card-subtitle mb-2">News Articles</h6>
                    <a href="displayArticles.php" class="card-link">View & Manage Articles</a>
                    <br>
                    <a href="addArticle.php" class="card-link">Add an Article</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-title">
                    <h5 class="card-title">Operators</h5>
                </div>
                <div class="card-body card-body-hidden"> <!-- Initially hidden card text -->
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="displayOps.php" class="card-link">View & Manage Operators</a>
                    <br>
                    <a href="addOperator.php" class="card-link">Add an Operator</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-title">
                    <h5 class="card-title">Categories</h5>
                </div>
                <div class="card-body card-body-hidden"> <!-- Initially hidden card text -->
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="displayCat.php" class="card-link">View & Manage Categories</a>
                    <br>
                    <a href="addCategory.php" class="card-link">Add a Category</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-title">
                    <h5 class="card-title">Sources</h5>
                </div>
                <div class="card-body card-body-hidden"> <!-- Initially hidden card text -->
                    <h6 class="card-subtitle mb-2">Only trusted ones</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="displaySources.php" class="card-link">View & Manage Sources</a>
                    <br>
                    <a href="addSource.php" class="card-link">Add a Source</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>

</body>
</html>
