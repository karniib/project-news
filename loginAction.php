<?php
include("inc/connection.php");
session_start();

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the email and entered password from the form
    $email = $_POST["email"];
    $enteredPassword = $_POST["password"];

    // Check if the "Remember Me" checkbox is checked
    $rememberMe = isset($_POST["remember_me"]) ? true : false;

    // If "Remember Me" is checked, set a cookie with the email
    if ($rememberMe) {
        // Set a cookie to remember the email for 30 days (you can adjust the expiration time)
        setcookie("remembered_email", $email, time() + (30 * 24 * 60 * 60), "/");
    }

    // Prepare and execute a SQL query to retrieve the user's stored hash
    $stmt = $con->prepare("SELECT * FROM operators WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a row was found
    if ($result->num_rows == 1) {
        // Fetch the user data
        $user = $result->fetch_assoc();

        // Verify the entered password against the stored hash
        if (password_verify($enteredPassword, $user["Password"])) { // Use "Password" for the column name
            // Password is correct, set session variables
            $_SESSION["user_id"] = $user["ID"]; // Use "ID" for the column name
            $_SESSION["user_email"] = $email;
            $_SESSION["user_FullName"] = $user["FullName"];

            // Redirect to a dashboard or other protected page
            header("Location: admin_dashboard.php");
            exit();
        } else {
            header("Location: login.php");
        }
    } else {
        header("Location: login.php");
    }
} 
?>
