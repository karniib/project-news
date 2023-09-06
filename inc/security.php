<?php 
include "connection.php";

// Check if the user is logged in and has a role
if(isset($_SESSION["user"]) && $_SESSION["user"]["role"] !== "admin") {
    header("location: login.php"); // Redirect to the login page
    exit; // Ensure script execution stops after the redirection
}
?>
