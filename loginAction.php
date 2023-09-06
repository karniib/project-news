<?php
include("inc/connection.php");
session_start();

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the email and entered password from the form
    $email = $_POST["email"];
    $enteredPassword = $_POST["password"];
    $rememberMe = isset($_POST["remember_me"]) ? true : false;

    // If "Remember Me" is checked, set a cookie with the email
    if ($rememberMe) {
        // Set a cookie to remember the email for 30 days (you can adjust the expiration time)
        setcookie("remembered_email", $email, time() + (30 * 24 * 60 * 60), "/");
    }

    // Prepare and execute a SQL query to retrieve the user's stored hash
    $stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a row was found
    if ($result->num_rows == 1) {
        // Fetch the user data
        $user = $result->fetch_assoc();
        if (password_verify($enteredPassword, $user["Password"])) { 
            $_SESSION["user_id"] = $user["ID"]; 
            $_SESSION["user_email"] = $email;
            $_SESSION["user_FullName"] = $user["FullName"];
            $_SESSION["role"] = $user["role"];
            if($user["role"]=="admin"){

            header("Location: admin_dashboard.php");
            exit();
        } else{ 
           
            header("Location: userDashboard.php");
        }}else {
            header("Location: login.php");
        }
    } else {
        header("Location: login.php");
    }
} 
?>
