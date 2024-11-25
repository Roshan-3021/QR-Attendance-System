<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection file
    include '../db.php';

    // Get username and password from the form and sanitize input
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, md5($_POST["password"]));

    // Prepare SQL statement to avoid SQL injection
    $sql = "SELECT * FROM admins WHERE username = ? AND password = ?";
    
    // Prepare the statement
    $stmt = mysqli_prepare($conn, $sql);
    
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    
    // Execute the statement
    mysqli_stmt_execute($stmt);
    
    // Store the result
    $result = mysqli_stmt_get_result($stmt);

    // Check if the query returned any rows
    if (mysqli_num_rows($result) == 1) {
        // Admin exists, fetch admin data
        $admin = mysqli_fetch_assoc($result);

        // Set session variables
        $_SESSION['aid'] = $admin['admin_id'];
        $_SESSION['admin_username'] = $admin['username'];

        echo '<script>alert("Admin Login Successful");</script>';
        // Redirect to the dashboard
        echo '<script>window.location.href = "dashboard.php";</script>';
        exit();        
    } else {
        // Admin doesn't exist or credentials are incorrect, show error message
        echo '<script>alert("Invalid Details");</script>';
    }

    // Close the statement
    mysqli_stmt_close($stmt);

    // Close the database connection
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Attendance Monitoring System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('img/background.jpg');
            
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
            <h2 class="text-center mb-4">Admin Login</h2>
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
