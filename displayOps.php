<?php
SESSION_start();
include("inc/connection.php"); 
$query = "SELECT ID, FullName, Email
FROM users WHERE role = 'admin'";

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
    <title>Ops Table</title>
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
        /* Additional custom styles */
        .jumbotron {
            background-color: #343a40;
            color: #ffffff;
            padding: 40px 0;
            margin-bottom: 20px;
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
    </header>

    <div class="container">
    <div class="jumbotron text-center" style="background-color: white; margin: 5px 0; padding: 5px;">
    <h1 style="color: black;">Ops Table</h1>
</div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th> <!-- New column for actions -->
                </tr>
            </thead>
            <tbody>
                <?php
                include("inc/connection.php"); 
                $query = "SELECT ID,FullName, Email FROM users WHERE role = 'admin'";
                $result = mysqli_query($con, $query);

                if (!$result) {
                    die("Query failed: " . mysqli_error($con));
                }

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['ID'] . "</td>";
                    echo "<td>" . $row['FullName'] . "</td>";
                    echo "<td>" . $row['Email'] . "</td>";
                    echo '<td>
                            <a href="updateOps.php?id=' . $row['ID'] . '" class="btn btn-primary btn-action">Update</a>
                            <a href="deleteOps.php?id=' . $row['ID'] . '" class="btn btn-danger btn-action">Delete</a>
                          </td>';
                    echo "</tr>";
                }
                mysqli_close($con);
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
