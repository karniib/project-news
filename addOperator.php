<?php
SESSION_start();
include("inc/security.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Operator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            margin-top: 50px;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            border-bottom: none;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .navbar {
            background-color: #007bff; 
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

<div class="mt-4 p-5 bg-primary text-white rounded" style="text-align: center;">
  <h1>Add an Operator</h1>
</div>



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Add New Operator</h4>
                </div>
                <div class="card-body">
                    <form action="addOperatorAction.php" method="post">
                        <div class="mb-3">
                            <label for="FullName" class="form-label">FullName</label>
                            <input type="FullName" class="form-control" id="FullName" name="txtFullName" required>
                        </div>
                        <div class="mb-3">
                            <label for="Email" class="form-label">Email</label>
                            <input type="Email" class="form-control" id="Email" name="txtEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="Password" class="form-label">Password</label>
                            <input type="Password" class="form-control" id="Password" name="txtPassword" required>
                        </div>
                        <div class="mb-3">
                                <label for="source" class="form-label">Role</label>
                                <select class="form-select" id="Role" name="txtRole" required>
                                    <option value="" selected disabled>Select a role</option>
                                    <option value="admin">admin</option>
                                </select>
                            </div>
</div>
                        <div class="mb-3">
                   <input type="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>