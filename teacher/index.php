<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection file
    include '../db.php';

    // Get username and password from the form and sanitize input
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, md5($_POST["password"]));

    // Prepare SQL statement to avoid SQL injection
    $sql = "SELECT * FROM teachers WHERE username = ? AND password = ?";
    
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
        $teacher = mysqli_fetch_assoc($result);

        // Set session variables
        $_SESSION['aid'] = $teacher['teacher_id'];
        $_SESSION['fullname'] = $teacher['fullname'];
        $_SESSION['admin_username'] = $teacher['username'];
        $_SESSION['department_name'] = $teacher['department'];
        $_SESSION['course'] = $teacher['course'];
        echo '<script>alert("Teacher Login Successful");</script>';
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
  
    <title>Attendance Monitoring System | Teacher Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../admin/assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- <link rel="icon" type="image/png" href="../admin/assets/images/favicon1.png"> -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../admin/assets/css/style.css">
   <style>
     .content-wrapper{
          background-image: url('../admin/img/background.jpg');
          background-size: cover;
     }
   </style>
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-center p-5">
                <div class="brand-logo">
                  <img src="../admin/assets/images/logo.png">
                </div>
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">TEACHER LOGIN</h6>
                <form class="pt-3" id="login" method="post" name="login">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" placeholder="Enter your username" required="true" name="username" value="<?php if(isset($_COOKIE["user_login"])) { echo $_COOKIE["user_login"]; } ?>" >
                  </div>
                  <div class="form-group">
                    
                    <input type="password" class="form-control form-control-lg" placeholder="Enter your password" name="password" required="true" value="<?php if(isset($_COOKIE["userpassword"])) { echo $_COOKIE["userpassword"]; } ?>">
                  </div>
                  <div class="mt-3">
                    <button class="btn btn-success btn-block loginbtn" name="login" type="submit">Login</button>
                    
                    <!-- <a href="../teacher/index.php" class="btn btn-primary btn-block loginbtn">Teachers Login</a> -->
                    <a href="../index.php" class="btn btn-danger btn-block loginbtn">Back to Home</a>

                  </div>
                  
         <!--          <div class="mb-2">
                    <a href="../index.php" class="btn btn-block btn-facebook auth-form-btn">
                      <i class="icon-social-home mr-2"></i>Back Home </a>
                  </div> -->
                  
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../admin/assets/js/off-canvas.js"></script>
    <script src="../admin/assets/js/bootstrap.min.js"></script>
    <!-- endinject -->
  </body>
</html>