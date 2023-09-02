<?php
$con = mysqli_connect('localhost', 'root', '', 'news');
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
        $query = "DELETE FROM articles WHERE ID='$id'";
        $result = mysqli_query($con, $query);

        if ($result) {
            header("Location: displayArticles.php");
            exit; 
        } else {
            echo "Error deleting data: " . mysqli_error($con);
        }
    }
     else
     {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Delete Article</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f8f9fa;
                    text-align: center;
                }
                .confirmation-box {
                    background-color: #fff;
                    border: 1px solid #ddd;
                    padding: 20px;
                    max-width: 400px;
                    margin: 0 auto;
                    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                }
                .confirmation-text {
                    font-size: 18px;
                    margin-bottom: 20px;
                }
                .confirmation-buttons {
                    display: flex;
                    justify-content: center;
                }
                .confirmation-button {
                    padding: 10px 20px;
                    margin: 0 10px;
                    border: none;
                    cursor: pointer;
                    background-color: #007bff;
                    color: #fff;
                    text-decoration: none;
                    border-radius: 4px;
                }
                .confirmation-button.no {
                    background-color: #ccc;
                }
            </style>
        </head>
        <body>
            <div class="confirmation-box">
                <p class="confirmation-text">Are you sure you want to delete this Article?</p>
                <div class="confirmation-buttons">
                    <a href="deleteArticle.php?id=<?= $id ?>&confirm=yes" class="confirmation-button">Yes</a>
                    <a href="displayArticles.php" class="confirmation-button no">No</a>
                </div>
            </div>
        </body>
        </html>
        <?php
    }
} else {
    // ID not provided in the URL
    echo "ID not provided.";
    exit;
}

// Close the database connection
mysqli_close($con);
?>
