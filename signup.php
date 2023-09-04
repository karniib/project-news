<?php
// Include your database connection file (e.g., connection.php)
include("inc/connection.php");

// Initialize variables
$FullName = $email = $password = '';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve user data from the form
    $FullName = $_POST['FullName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password for security (you should use password_hash() in a production environment)
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    // Insert user data into the 'users' table
    $query = "INSERT INTO users (FullName, Email, Password) VALUES ('$FullName' , '$email', '$hashedPassword')";

    // Execute the query
    $result = mysqli_query($con, $query);

    // Check if the query was successful
    if ($result) {
        // Registration successful, you can redirect to a login page or display a success message
        header("Location: login.php"); // Redirect to the login page
        exit;
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

// Close the database connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign Up</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css"> <!-- Add your CSS styles here -->
</head>

<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Sign Up</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <form method="post" action="signup.php" class="signin-form">
                            <div class="form-group">
                                <input type="text" class="form-control" name="FullName" placeholder="Full Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input id="password-field" type="password" class="form-control" name="password" placeholder="Password" required>
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Sign up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>