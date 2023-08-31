<?php
include("inc/connection.php");
$FName = $_POST["txtFullName"];
$Email = $_POST["txtEmail"];
$Password = $_POST["txtPassword"];

// Hash the password
$hashedPassword = password_hash($Password, PASSWORD_BCRYPT);

$sql = "INSERT INTO operators (FullName, Email, Password) VALUES ('$FName', '$Email', '$hashedPassword')";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));

if ($result) {
    // Display success message
    echo '<div style="text-align: center; margin-top: 20px; font-size: 24px; color: green;">Operator Added</div>';

    // Redirect to the addOperator.php page after a brief delay
    header("Refresh: 2; URL=addOperator.php");
    exit();
} else {
    // Handle the error here if needed
    echo "Error: " . mysqli_error($con);
}
?>
