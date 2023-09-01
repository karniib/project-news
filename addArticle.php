<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Article</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        body {
            background-color: #f8f9fa;
        }
        .card {
            margin-top: 50px;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            border-bottom: none;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-info navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="admin_dashboard.php">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
<div class="mt-4 p-5 bg-primary text-white rounded" style="text-align: center;">
  <h1>Add an Article</h1>
</div>



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Add New Article</h4>
                </div>
                <div class="card-body">
                    <form action="addArticleAction.php" method="post">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="txttitle" required>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" name="txtdate" required>
                        </div>
                        <div class="mb-3">
    <label for="source" class="form-label">Source</label>
    <select class="form-select" id="source" name="txtsource" required>
        <option value="" selected disabled>Select a source</option>
        <option value="CNN">CNN</option>
        <option value="BBC">BBC</option>
    </select>
</div>
                        <div class="mb-3">
                            <label for="author" class="form-label">Author</label>
                            <input type="text" class="form-control" id="author" name="txtauthor" required>
                        </div>
                        <div class="mb-3">
                            <label for="article" class="form-label">Article</label>
                            <textarea class="form-control" id="article" name="txtarticle" rows="6" required></textarea>
                        </div>
                        <div class="mb-3">
    <label for="category" class="form-label">Category</label>
    <select class="form-select" id="category" name="txtcategory" required>
        <option value="" selected disabled>Select a category</option>
        <option value="Technology">Technology</option>
        <option value="Science">Science</option>
        <option value="Politics">Politics</option>
        <option value="Entertainment">Entertainment</option>
        <!-- Add more categories as needed -->
    </select>
</div>
                        <div class="mb-3">
                   <input type="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>