<?php
session_start();
include("inc/connection.php");

$operatorId = $_SESSION["user_id"]
;$operatorNames = array();
$query = "SELECT FullName FROM users WHERE role = 'admin' and ID='$operatorId';";
$result = mysqli_query($con, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $operatorNames[] = $row['FullName'];
    }
}
$categoryNames = array();
$query = "SELECT CatName FROM categories";
$result = mysqli_query($con, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $categoryNames[] = $row['CatName'];
    }
}
$SourceNames = array();
$query = "SELECT Name FROM Sources";
$result = mysqli_query($con, $query);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $SourceNames[] = $row['Name'];
    }
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST["txttitle"];
    $date = $_POST["txtdate"];
    $source = $_POST["txtsource"];
    $author = $_POST["txtauthor"];
    $article = $_POST["txtarticle"];
    
    $selectedCategory = $_POST["category"];
    $selectedOperator = $_POST["operator"];

    $targetDirectory = "images"; 
    $targetFileName = $targetDirectory . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFileName, PATHINFO_EXTENSION));
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    if ($_FILES["image"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFileName)) {
            $sql = "INSERT INTO articles (dbTitle, dbDate, dbSource, dbAuthor, dbarticle, dbcategory, image, operator)
                    VALUES ('$title', '$date', '$source', '$author', '$article', '$selectedCategory', '$targetFileName', '$selectedOperator')";

            $result = mysqli_query($con, $sql);

            if ($result) {
                echo '<div style="text-align: center; margin-top: 20px; font-size: 24px; color: green;">Article Added</div>';
            } else {
                echo "Error: " . mysqli_error($con);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
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

        .blue-text {
            color: blue;
        }

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
        <h1>Add an Article</h1>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Add New Article</h4>
                    </div>
                    <div class="card-body">
                        <form action="addArticleAction.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="txttitle" required>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date" name="txtdate" required>
                            </div>
                            <div class="mb-3">
                                <label for="Source" class="form-label">Source</label>
                                <select class="form-select" id="operator" name="txtOperator" required>
                                    <option value="" selected disabled>Select a Source</option>
                                    <?php
                                    foreach ($SourceNames as $SourceName) {
                                        echo '<option value="' . $SourceName . '">' . $SourceName . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            </div>
                            <div class="mb-3">
                                <label for="author" class="form-label">Author</label>
                                <input type="text" class="form-control" id="author" name="txtauthor" required>
                            </div>
                            <div class="mb-3">
                                <label for="article" class="form-label">Article</label>
                                <textarea class="form-control" id="article" name="txtarticle" rows="6" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="txtImage" name="txtImage" accept="image/*" required>
                            </div>
                            <div class="mb-3">
                                <label for="operator" class="form-label">Operator</label>
                                <select class="form-select" id="operator" name="txtOperator" required>
                                    <option value="" selected disabled>Select an operator</option>
                                    <?php
                                    foreach ($operatorNames as $operatorName) {
                                        echo '<option value="' . $operatorName . '">' . $operatorName . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select" id="category" name="txtcategory" required>
                                    <option value="" selected disabled>Select a category</option>
                                    <?php
                                    foreach ($categoryNames as $categoryName) {
                                        echo '<option value="' . $categoryName . '">' . $categoryName . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.navbar-light .dmenu').hover(function () {
                $(this).find('.sm-menu').first().stop(true, true).slideDown(150);
            }, function () {
                $(this).find('.sm-menu').first().stop(true, true).slideUp(105)
            });
        });
    </script>
</body>
</html>
