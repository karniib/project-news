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
            width: 90%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .table td {
            padding: 15px;
        }
        .table a {
            text-decoration: none;
            color: #333;
            font-weight: 600;
        }
        .table a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="jumbotron">
        <h1 class="display-4">Admin Dashboard</h1>
        <p class="lead">Welcome to your admin control panel</p>
    </div>
    <div class="container">
        <table class="table">
            <tr>
                <td><a href="addArticle.php">Add Article</a></td>
                <td><a href="displayArticles.php">View Articles</a></td>
            </tr>
            <tr>
                <td><a href="#">Manage Article</a></td>
                <td><a href="addOperator.php">Add Operator</a></td>
            </tr>
            <tr>
                <td><a href="addSource.php">Add Source</a></td>
                <td><a href="#">Manage Source</a></td>
            </tr>
            <tr>
                <td colspan="2"><a href="addCategory.php">Add Category</a></td>
            </tr>
        </table>
    </div>
</body>
</html>
