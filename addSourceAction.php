<?php
include("inc/connection.php");
include("inc/security.php");
$Name = $_POST["txtName"];
$Type = $_POST["txtType"];
$sql = "INSERT INTO sources (Name, type) VALUES ('$Name', '$Type')";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));

if ($result) {
    echo '<div style="text-align: center; margin-top: 20px; font-size: 24px; color: green;">Source Added</div>';
    header("Refresh: 2; URL=addsource.php");
    exit();
} else {
    echo "Error: " . mysqli_error($con);
}
?>
