<?php
include("inc/security.php");
include("inc/connection.php");
$CatName = $_POST["txtCatName"];
$sql = "INSERT INTO categories (CatName) VALUES ('$CatName')";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));

if ($result) {
    echo '<div style="text-align: center; margin-top: 20px; font-size: 24px; color: green;">Category Added</div>';
    header("Refresh: 2; URL=addCategory.php");
    exit();
} else {
    echo "Error: " . mysqli_error($con);
}
?>
