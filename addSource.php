<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Source</title>
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
        <a class="navbar-brand" href="login.php">Your Website</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
<div class="mt-4 p-5 bg-primary text-white rounded" style="text-align: center;">
  <h1>Add a Source</h1>
</div>



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Add New Source</h4>
                </div>
                <div class="card-body">
                    <form action="addSourceAction.php" method="post">
                        <div class="mb-3">
                            <label for="Name" class="form-label">Name</label>
                            <input type="Name" class="form-control" id="Name" name="txtName" required>
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">type</label>
                            <input type="type" class="form-control" id="type" name="txtType" required>
                        </div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>