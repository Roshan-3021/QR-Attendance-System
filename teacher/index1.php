<?php

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection file
    include '../db.php';

    // Get username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate username and password (You should add more validation here)

    // Query to check if the admin exists in the database
    $sql = "SELECT * FROM teachers WHERE username = '$username' AND password = '$password'";

    // Perform the query
    $result = mysqli_query($conn, $sql);

    // Check if the query returned any rows
    if (mysqli_num_rows($result) == 1) {
        // Admin exists, set session variables
        $_SESSION["admin_username"] = $username;

        // Redirect to the dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        // Admin doesn't exist or credentials are incorrect, show error message
        $error = "Invalid username or password.";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Login | Attendance Monitoring System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }
        .btn-primary {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-primary:hover {
            background-color: #004286;
            border-color: #004286;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2 class="text-center mb-4">Teacher Login</h2>
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>

                <a href="../index.php" class="btn btn-danger btn-block">Back to Home</a>
            </form>
        </div>
    </div>
</body>
</html>
