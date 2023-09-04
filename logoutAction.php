<?php
session_start();
include("inc/connection.php");
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["confirm_logout"])) {
    // The user confirmed logout, destroy the session and redirect to the login page
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 100px;
        }

        h1 {
            text-align: center;
            font-size: 36px;
            color: #007bff;
        }

        .confirmation-text {
            text-align: center;
            font-size: 20px;
            margin-top: 30px;
        }

        .btn-yes {
            margin-top: 30px;
            display: block;
            margin: 0 auto;
            background-color: #007bff;
            color: #fff;
            border: none;
            width: 150px;
            padding: 10px;
            font-size: 18px;
            cursor: pointer;
        }

        .btn-no {
            display: block;
            margin: 0 auto;
            text-align: center;
            text-decoration: none;
            padding: 10px;
            font-size: 18px;
            color: #007bff;
            transition: color 0.3s;
        }

        .btn-no:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Logout</h1>
        <p class="confirmation-text">Are you sure you want to log out?</p>
        <form method="post" class="text-center">
            <button type="submit" name="confirm_logout" class="btn btn-yes">Yes</button>
        </form>
        <a href="javascript:history.go(-1);" class="btn btn-no">No</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>

