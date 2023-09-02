<?php
include("inc/connection.php");

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get data from the form
    $id = $_POST['id'];
    $Name = $_POST['Name'];
    $Type = $_POST['Type'];
    // Validate and sanitize the input data (you should add more validation as needed)
    $id = mysqli_real_escape_string($con, $id);
    $Name = mysqli_real_escape_string($con, $Name);
    $Type = mysqli_real_escape_string($con, $Type);
    // Update the data in the 'egories' table
    $query = "UPDATE sources SET Name='$Name', Type='$Type' WHERE ID='$id'";

    // Execute the query
    $result = mysqli_query($con, $query);

    // Check if the query was successful
    if ($result) {
        // Redirect back to displayCats.php
        header("Location: displaysources.php");
        exit; // Terminate the script to ensure the redirect takes effect
    } else {
        echo "Error updating data: " . mysqli_error($con);
    }
}

// Check if the ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the source's data based on the provided ID
    $query = "SELECT ID, Name,Type FROM sources WHERE ID='$id'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $id = $row['ID'];
        $Name = $row['Name'];
        $Type = $row['Type'];
    } else {
        // source with the provided ID not found
        echo "source not found.";
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
    <title>Update source Data</title>
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

        input[type="text"] {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background-color: #fff;
            transition: background-color 0.3s, border-color 0.3s;
        }

        input[type="text"]:focus {
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
        <h1>Update source Data</h1>
        <form method="post" action="updateSource.php" class="update-form">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="Name">Name:</label>
                <input type="text" name="Name" value="<?php echo $Name; ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="Type">Type:</label>
                <input type="Bit" name="Type" value="<?php echo $Type; ?>" class="form-control" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>
