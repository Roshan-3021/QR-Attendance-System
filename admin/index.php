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
        $_SESSION['error'] = 'Incorrect Credentials';  
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
  
    <title>Attendance Monitoring System | Admin Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
   <style>
     .content-wrapper{
          background-image: url('img/background.jpg');
          background-size: cover;
     }
   </style>
   <!-- <link rel="icon" type="image/png" href="assets/images/favicon1.png"> -->
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-center p-5">
                <div class="brand-logo">
                  <img src="assets/images/logo.png">
                </div>
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">ADMIN LOGIN</h6>
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
                    <a href="../index.php" class="btn btn-danger btn-block loginbtn mb-2">Back to Home</a>

                  </div>
                  
         <!--          <div class="mb-2">
                    <a href="../index.php" class="btn btn-block btn-facebook auth-form-btn">
                      <i class="icon-social-home mr-2"></i>Back Home </a>
                  </div> -->
                  <?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger text-center mt20 bg-danger fg-light'>
			  		<p>".$_SESSION['error']."</p> 
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
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
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- endinject -->
  </body>
</html>