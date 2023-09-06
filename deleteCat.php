<?php
include("inc/connection.php");
include("inc/security.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Check if the confirm parameter is set
    if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
        // Perform the deletion
        $query = "DELETE FROM categories WHERE ID = '$id'";
        $result = mysqli_query($con, $query);

        if ($result) {
            // Deletion was successful
            header("Location: displayCat.php");
            exit;
        } else {
            // Error occurred during deletion
            echo "Error deleting article: " . mysqli_error($con);
        }
    } else {
        // Display a confirmation dialog
        ?>
       <!DOCTYPE html>
<html>
<head>
    <title>Delete Category</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="alert alert-danger">
            <h4 class="alert-heading">Delete Category</h4>
            <hr>
            <p class="mb-0">Are you sure you want to delete this Category?</p>
        </div>
        <div class="text-center">
            <a href="deleteCat.php?id=<?= $id ?>&confirm=yes" class="btn btn-danger">Yes, Delete</a>
            <a href="displayCat.php" class="btn btn-secondary">Cancel</a>
        </div>
    </div>

    <!-- Include Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

        <?php
    }
} else {
    // ID not provided in the URL
    echo "ID not provided in the URL.";
}

// Close the database connection
mysqli_close($con);
?>
