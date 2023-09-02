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
            background-color: #f8f9fa;
        }
        .jumbotron {
            text-align: center;
            background-color: #343a40;
            color: #ffffff;
            padding: 40px 0;
            margin-bottom: 20px;
        }
        .container {
            text-align: center;
        }
        .table {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .table th {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
        }
        .table td {
            padding: 15px;
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
        }
        .btn-action:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="jumbotron">
        <h1 class="display-4">Admin Dashboard</h1>
        <p class="lead">Welcome to your admin control panel</p>
    </div>
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <a href="addArticle.php" class="btn-action">Add Article</a>
                        <a href="displayArticles.php" class="btn-action">View Articles</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="#" class="btn-action">Manage Articles</a>
                        <a href="addOperator.php" class="btn-action">Add Operator</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="addSource.php" class="btn-action">Add Source</a>
                        <a href="displaySources.php" class="btn-action">Manage Source</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="addCategory.php" class="btn-action">Add Category</a>
                        <a href="displayCat.php" class="btn-action">Manage Category</a>
                    </td>
                </tr>
                <!-- Improved style for the "Manage Operators" row -->
                <tr class="manage-row">
                    <td>
                        <a href="displayOps.php" class="btn-action">Manage Operators</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
