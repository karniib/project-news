<?php
$con = mysqli_connect('localhost', 'root', '', 'news');
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get data from the form
    $id = $_POST['id'];
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];

    // Validate and sanitize the input data (you should add more validation as needed)
    $id = mysqli_real_escape_string($con, $id);
    $fullName = mysqli_real_escape_string($con, $fullName);
    $email = mysqli_real_escape_string($con, $email);

    // Update the data in the 'operators' table
    $query = "UPDATE operators SET FullName='$fullName', Email='$email' WHERE ID='$id'";

    // Execute the query
    $result = mysqli_query($con, $query);

    // Check if the query was successful
    if ($result) {
        // Redirect back to displayOps.php
        header("Location: displayOps.php");
        exit; // Terminate the script to ensure the redirect takes effect
    } else {
        echo "Error updating data: " . mysqli_error($con);
    }
}

// Check if the ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the operator's data based on the provided ID
    $query = "SELECT ID, FullName, Email FROM operators WHERE ID='$id'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $id = $row['ID'];
        $fullName = $row['FullName'];
        $email = $row['Email'];
    } else {
        // Operator with the provided ID not found
        echo "Operator not found.";
        exit;
    }
} else {
    // ID not provided in the URL
    echo "ID not provided.";
    exit;
}

// Close the database connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Operator Data</title>
    <link rel="stylesheet" href="styles.css"> <!-- Include an external CSS file for styling -->
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: #ff6b6b; /* Vibrant red background */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            text-align: center;
        }

        h1 {
            color: #fff; /* White header text */
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #fff;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background-color: #fff;
            transition: background-color 0.3s, border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus {
            background-color: #e8e8e8;
            outline: none;
            border-color: #007bff;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Update Operator Data</h1>
        <form method="post" action="update.php" class="update-form">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="fullName">Full Name:</label>
                <input type="text" name="fullName" value="<?php echo $fullName; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
