<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title >Operator Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('images/newspapers.jpg'); /* Replace 'your-image.jpg' with your actual image file */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center center;
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #007bff;
        }

        .navbar-dark .navbar-nav .nav-link {
            font-size: 18px;
            color: white !important;
            margin-right: 20px;
        }

        .navbar-dark .navbar-toggler-icon {
            background-color: white;
        }

        .profile-container {
            text-align: center;
            margin-top: 20px;
        }

        .profile-table {
            margin: 0 auto;
            width: 50%;
            border-collapse: collapse;
        }

        .profile-table th, .profile-table td {
            padding: 10px;
            border: 1px solid #e6e6e6;
            background-color: #007bff; /* Add this background color */
            color: white; /* Text color for better contrast */
        }

        .profile-table th {
            background-color: #007bff;
            color: white;
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

<div class="profile-container">
    <h1 style= color:white  >Operator Profile</h1>
    <table class="table profile-table">
        <tr>
            <th>User ID</th>
            <td><?php echo $_SESSION["user_id"]; ?></td>
        </tr>
        <tr>
            <th>Username</th>
            <td><?php echo $_SESSION["user_FullName"]; ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $_SESSION["user_email"]; ?></td>
        </tr>
        <!-- Add more operator-specific data fields as needed -->
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
