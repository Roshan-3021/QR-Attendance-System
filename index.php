<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Monitoring System</title>
    <link rel="icon" type="image/png" href="admin/assets/images/favicon1.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container-fluid {
            padding: 0;
        }
        .jumbotron {
            background-color: #007bff;
            color: #fff;
            padding: 100px 30px;
            border-radius: 0;
            margin-bottom: 0;
        }
        .jumbotron h1 {
            font-weight: bold;
        }
        .jumbotron p {
            font-size: 1.2rem;
        }
        .btn-primary {
            background-color: #0056b3;
            border-color: #0056b3;
            margin-top: 20px;
        }
        .btn-primary:hover {
            background-color: #004286;
            border-color: #004286;
        }
        #about {
            background-color: #fff;
            padding: 80px 0;
        }
        #about h2 {
            margin-bottom: 30px;
            font-weight: bold;
        }
        #about p {
            font-size: 1.1rem;
            line-height: 1.6;
        }
        footer {
            background-color: #007bff;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
        .admin-login, .teacher-login {
            margin-top: 20px;
        }
        .admin-login:hover, .teacher-login:hover {
            text-decoration: none;
        }
        .login-btn {
            background-color: #28a745;
            border-color: #28a745;
            color: #fff;
            font-size: 1.1rem;
            padding: 10px 30px;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }
        .login-btn:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
    </style>
</head>
<body>

    <div class="container-fluid">
        <div class="jumbotron text-center">
            <h1 class="display-3">Welcome to Absenteesm Monitoring System</h1>
            <p class="lead">Effortless attendance tracking with QR codes</p>
            <a class="btn btn-primary btn-lg" href="#about" role="button">Learn More</a>
            <div class="row justify-content-center mt-3">
                <div class="col-md-4">
                    <a href="admin/" class="login-btn admin-login">Admin Login</a>
                </div>
                <div class="col-md-4">
                    <a href="teacher/" class="login-btn teacher-login">Teacher Login</a>
                </div>
            </div>
        </div>
    </div>

    <section id="about" class="container">
        <div class="row">
            <div class="col-md-4 text-center">
                <span class="feature-icon">&#128218;</span>
                <h2 class="feature-heading">Student Attendance</h2>
                <p>Record student attendance efficiently using QR codes.</p>
            </div>
            <div class="col-md-4 text-center">
                <span class="feature-icon">&#128220;</span>
                <h2 class="feature-heading">Teacher Dashboard</h2>
                <p>Teachers can easily manage attendance and view reports.</p>
            </div>
            <div class="col-md-4 text-center">
                <span class="feature-icon">&#128101;</span>
                <h2 class="feature-heading">Administrator Access</h2>
                <p>Administrators have access to advanced features for attendance management.</p>
            </div>
        </div>
    </section>

    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>About</h2>
                    <p>This Attendance Monitoring System simplifies attendance tracking in B.E. colleges using QR codes.</p>
                    <p>Students scan their unique QR codes upon entering the classroom, and their attendance is recorded automatically.</p>
                </div>
                <div class="col-md-6">
                    <h2>How It Works</h2>
                    <p>Teachers and administrators can access attendance records through a secure dashboard, enabling them to monitor attendance trends and address any issues.</p>
                    <p>The system provides detailed reports, making it easy to track attendance history and identify patterns.</p>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2024 Attendance Monitoring System. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
