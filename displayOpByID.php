<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Operator Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        h1 {
            background-color: #007bff;
            color: #fff;
            padding: 20px 0;
        }
        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 50%; /* Adjust the width as needed */
        }
        th, td {
            border: 1px solid #e6e6e6;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Operator Profile</h1>
    <table>
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
</body>
</html>
