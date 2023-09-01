<?php
include("inc/connection.php");
$title = $_POST["txttitle"];
$date = $_POST["txtdate"];
$source = $_POST["txtsource"];
$author = $_POST["txtauthor"];
$article = $_POST["txtarticle"];
$category = $_POST["txtcategory"];
$sql = "insert into articles (dbtitle,dbdate,dbsource,dbauthor,dbarticle,dbcategory) values('$title','$date','$source','$author','$article','$category')";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));

if ($result) {
    echo '<div style="text-align: center; margin-top: 20px; font-size: 24px; color: green;">Article added Added</div>';
    header("Refresh: 2; URL=addCategory.php");
    exit();
} else {
    echo "Error: " . mysqli_error($con);
}
?>
