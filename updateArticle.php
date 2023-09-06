<?php
session_start();
include("inc/connection.php");

// Initialize variables
$id = $dbarticle = $dbcategory = $dbauthor = $dbsource = $dbdate = $dbtitle = $image = $operator = '';

// Check if the ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the article's data based on the provided ID
    $query = "SELECT ID, dbarticle, dbcategory, dbauthor, dbsource, dbdate, dbtitle, image, operator FROM articles WHERE ID='$id'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $id = $row['ID'];
        $dbarticle = $row['dbarticle'];
        $dbcategory = $row['dbcategory'];
        $dbauthor = $row['dbauthor'];
        $dbsource = $row['dbsource'];
        $dbdate = $row['dbdate'];
        $dbtitle = $row['dbtitle'];
        $image = $row['image'];
        $operator = $row['operator'];
    } else {
        // Article with the provided ID not found
        echo "Article not found.";
        exit;
    }
} else {
    // ID not provided in the URL
    echo "ID not provided.";
    exit;
}

$queryCategories = "SELECT CatName FROM categories";
$resultCategories = mysqli_query($con, $queryCategories);

$categories = array();
while ($row = mysqli_fetch_assoc($resultCategories)) {
    $categories[] = $row['CatName'];
}

// Fetch Sources
$queryoperators = "SELECT FullName FROM users where role = 'admin'";
$resultoperators = mysqli_query($con, $queryoperators);
$operators = array();
while ($row = mysqli_fetch_assoc($resultoperators)) {
    $operators[] = $row['FullName'];
}
$querySources = "SELECT Name FROM sources";
$resultSources = mysqli_query($con, $querySources);
$sources = array();
while ($row = mysqli_fetch_assoc($resultSources)) {
    $sources[] = $row['Name'];
}

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get data from the form
    $id = $_POST['id'];
    $dbarticle = $_POST['txtarticle'];
    $dbcategory = $_POST['txtcategory'];
    $dbauthor = $_POST['dbauthor'];
    $dbsource = $_POST['txtsource'];
    $dbdate = $_POST['dbdate'];
    $dbtitle = $_POST['dbtitle'];
    $operator = $_POST['txtoperator'];

    // Validate and sanitize the input data (you should add more validation as needed)
    $id = mysqli_real_escape_string($con, $id);
    $dbarticle = mysqli_real_escape_string($con, $dbarticle);
    $dbcategory = mysqli_real_escape_string($con, $dbcategory);
    $dbauthor = mysqli_real_escape_string($con, $dbauthor);
    $dbsource = mysqli_real_escape_string($con, $dbsource);
    $dbdate = mysqli_real_escape_string($con, $dbdate);
    $dbtitle = mysqli_real_escape_string($con, $dbtitle);
    $operator = mysqli_real_escape_string($con, $operator);

    // Handle file upload
    $uploadDir = 'images/'; // Directory where you want to store uploaded images
    $uploadFile = $uploadDir . basename($_FILES['image']['name']);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
        // File uploaded successfully, update the image path in the database
        $image = mysqli_real_escape_string($con, $uploadFile);

        // Update the data in the 'articles' table
        $query = "UPDATE articles 
                  SET dbarticle='$dbarticle', dbcategory='$dbcategory', dbauthor='$dbauthor', dbsource='$dbsource', dbdate='$dbdate', dbtitle='$dbtitle', image='$image', operator='$operator'
                  WHERE ID='$id'";

        // Execute the query
        $result = mysqli_query($con, $query);

        // Check if the query was successful
       
    } else {
        echo "Error uploading file.";
    }
    if ($result) {
        header("Location: displayArticles.php"); // Change to the appropriate page
       exit; // Terminate the script to ensure the redirect takes effect
   } else {
       echo "Error updating data: " . mysqli_error($con);
   }
}

// Close the database connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Article Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            margin: 0;
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

        .container {
            background-color: #ff6b6b;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            max-width: 800px; /* Increase the maximum width */
            margin: auto; /* Center the container horizontally */
            margin-top: 70px; /* Add margin to push content below the navbar */
        }

        h1 {
            color: #fff;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            color: #fff;
            margin-bottom: 5px;
        }

        input[type="text"],
        select,
        textarea,
        input[type="file"] {
            padding: 12px;
            border: none;
            border-radius: 5px;
            background-color: #fff;
            transition: background-color 0.3s, border-color 0.3s;
        }

        input[type="text"]:focus,
        select:focus,
        textarea:focus,
        input[type="file"]:focus {
            background-color: #e8e8e8;
            outline: none;
            border-color: #007bff;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .label-input {
            display: flex;
            justify-content: space-between;
        }

        .label-input label {
            flex: 1;
            margin-right: 10px;
        }

        .label-input input,
        .label-input select,
        .label-input textarea {
            flex: 2;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
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

<div class="container">
        <h1>Update Article Data</h1>
        <!-- ... (previous code) ... -->

<!-- ... (previous code) ... -->

<form method="post" action="updateArticle.php?id=<?php echo $id; ?>" class="update-form" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    
    <div class="form-group label-input">
        <label for="category">Category:</label>
        <select id="category" name="txtcategory" required>
            <option value="" selected disabled>Select a category</option>
            <?php foreach ($categories as $category) { ?>
                <option value="<?php echo $category; ?>" <?php if ($dbcategory == $category) echo 'selected'; ?>><?php echo $category; ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="form-group label-input">
        <label for="source">Source:</label>
        <select id="source" name="txtsource" required>
            <option value="" selected disabled>Select a source</option>
            <?php foreach ($sources as $source) { ?>
                <option value="<?php echo $source; ?>" <?php if ($dbsource == $source) echo 'selected'; ?>><?php echo $source; ?></option>
            <?php } ?>
        </select>
    </div>
    
    <div class="form-group label-input">
        <label for="dbauthor">Author:</label>
        <input type="text" id="dbauthor" name="dbauthor" value="<?php echo $dbauthor; ?>" required>
    </div>
    
    <div class="form-group label-input">
        <label for="dbdate">Date:</label>
        <input type="text" id="dbdate" name="dbdate" value="<?php echo $dbdate; ?>" required>
    </div>
    
    <div class="form-group label-input">
        <label for="dbtitle">Title:</label>
        <input type="text" id="dbtitle" name="dbtitle" value="<?php echo $dbtitle; ?>" required>
    </div>
    
    <div class="form-group label-input">
        <label for="image">Image:</label>
        <input type="file" class="form-control" id="image" name="image" accept="image/*">
        <img src="<?php echo $image; ?>" alt="Current Image" width="100">
    </div>

    <div class="form-group label-input">
        <label for="source">Operator:</label>
        <select id="source" name="txtoperator" required>
            <option value="" selected disabled>Select an Operator</option>
            <?php foreach ($operators as $operatorItem) { ?>
                <option value="<?php echo $operatorItem; ?>" <?php if ($operator == $operatorItem) echo 'selected'; ?>><?php echo $operatorItem; ?></option>
            <?php } ?>
        </select>
    </div>
    
    <div class="form-group label-input">
        <label for="article">Article:</label>
        <textarea id="article" name="txtarticle" columns="8" rows="6" required><?php echo $dbarticle; ?></textarea>
    </div>
    
    <button type="submit" name="submit" class="btn btn-primary">Update</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    </div>
</body>
</html>
