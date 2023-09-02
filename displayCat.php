<?php
include("inc/connection.php"); 
$query = "SELECT categories.ID, categories.CatName
FROM categories";

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
    <title>Categories Table</title>
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
    </style>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-info navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="admin_dashboard.php">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
    <div class="container">
        <h1>Categories Table</h1>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Action</th> <!-- New column for actions -->
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['ID'] . "</td>";
                    echo "<td>" . $row['CatName'] . "</td>";
                    echo '<td>
                            <a href="updateCat.php?id=' . $row['ID'] . '" class="btn btn-primary btn-action">Update</a>
                            <a href="deleteCat.php?id=' . $row['ID'] . '" class="btn btn-danger btn-action">Delete</a>
                          </td>';
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Include Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
                