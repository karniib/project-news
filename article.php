<?php
include("inc/connection.php");
$articleTitle = "Article Title";
$articleContent = "Invalid article ID.";
if (isset($_GET['id'])) {
    $articleId = $_GET['id'];
    $query = "SELECT dbtitle, dbarticle FROM articles WHERE ID = $articleId";
    
    $result = mysqli_query($con, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($con));
    }
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $articleTitle = $row['dbtitle'];
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
        <div class="jumbotron">
            <h1 class="display-4"><?php echo $articleTitle; ?></h1>
        </div>
        <div class="article-content">
            <?php echo $articleContent; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
