<?php
session_start();
include("inc/connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $title = mysqli_real_escape_string($con, $_POST["txttitle"]);
    $date = mysqli_real_escape_string($con, $_POST["txtdate"]);
    $source = mysqli_real_escape_string($con, $_POST["txtsource"]);
    $author = mysqli_real_escape_string($con, $_POST["txtauthor"]);
    $article = mysqli_real_escape_string($con, $_POST["txtarticle"]);
    $selectedCategory = mysqli_real_escape_string($con, $_POST["txtcategory"]);
    $selectedOperator = mysqli_real_escape_string($con, $_POST["txtOperator"]);
    $targetDirectory = "images/";
    $targetFileName = $targetDirectory . basename($_FILES["txtImage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFileName, PATHINFO_EXTENSION));
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["txtImage"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    if ($_FILES["txtImage"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["txtImage"]["tmp_name"], $targetFileName)) {
            // Insert the article data into the database
            $sql = "INSERT INTO articles (dbTitle, dbDate, dbSource, dbAuthor, dbarticle, dbcategory, image, operator)
                    VALUES ('$title', '$date', '$source', '$author', '$article', '$selectedCategory', '$targetFileName', '$selectedOperator')";

            $result = mysqli_query($con, $sql);

            if ($result) {
                echo '<div style="text-align: center; margin-top: 20px; font-size: 24px; color: green;">Article Added</div>';
                header("Refresh: 2; URL=addArticle.php");
                exit();
            } else {
                echo "Error: " . mysqli_error($con);
            }
            
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
