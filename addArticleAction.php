<?php
include("inc/connection.php");
$title = $_POST["txttitle"];
$date = $_POST["txtdate"];
$source = $_POST["txtsource"];
$author = $_POST["txtauthor"];
$article = $_POST["txtarticle"];
$category = $_POST["txtcategory"];
$sql = "insert into articles (dbtitle,dbdate,dbsource,dbauthor,dbarticle,dbcategory) values('$title','$date','$source','$author','$article','$category')";
mysqli_query($con,$sql)or die(mysqli_error($con));
?>