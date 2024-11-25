<?php session_start();
error_reporting(0);
// Database Connection
include('../db.php');
//Validating Session
if(strlen($_SESSION['aid'])==0)
  { 
header('location:index.php');
}
else{
include 'header.php';

include '../db.php';
if(isset($_POST['submit'])) {
    // Getting Post Values  
    $course_name = $_POST['course_name'];
    $departmentname = $_POST['departmentname'];
    // Check if the department name already exists
    $check_sql = "SELECT * FROM tblcourses WHERE course_name = ?";
    $check_stmt = mysqli_prepare($conn, $check_sql);
    mysqli_stmt_bind_param($check_stmt, "s", $course_name);
    mysqli_stmt_execute($check_stmt);
    mysqli_stmt_store_result($check_stmt);
    
    if(mysqli_stmt_num_rows($check_stmt) > 0) {
        echo "<script>alert('Course name already exists.');</script>";
    } else {
        // Prepare the SQL query with placeholders
        $sql = "INSERT INTO tblcourses ( `course_name`, `department_name`, `reg_date`) 
                VALUES (?,?, CURRENT_DATE)";

        // Prepare the statement
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt) {
            // Bind the parameters
            mysqli_stmt_bind_param($stmt, "ss",$course_name, $departmentname);
            
            // Execute the query
            $result = mysqli_stmt_execute($stmt);

            if($result) {
                echo "<script>alert('New Course Added Successfully.');</script>";
                echo "<script type='text/javascript'> document.location = 'managecourse.php'; </script>";
            } else {
                echo "<script>alert('Something went wrong. Please try again.');</script>";
            }
        } else {
            echo "<script>alert('Error in preparing SQL statement.');</script>";
        }
    }
}

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Courses</h1>
        <a href="viewdepartment.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-eye fa-sm text-white-50"></i> View All</a>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- DataTales Example -->
        <div class="card shadow mb-4 col-lg-9">
            <br>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Course Name</h6>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-lg-12">

                        <form class="user" action="" method="POST">  
                        <div class="form-group">
    <label for="department"><b>Select Department</b></label>
    <select class="form-control" name="departmentname" id="department" style="cursor: pointer" required>
        <?php 
        $sql = "SELECT * FROM `tbldepartments`;";
        $result = $conn->query($sql);
        foreach ($result as $r) {
        ?>
        <option value="<?php echo $r['department_name']; ?>"><?php echo $r['department_name']; ?></option>
        <?php 
    } ?>
    </select>
</div>
                  <div class="form-group  mt-4">
                     <label for="course_name" ><b>Enter Course Name</b></label>   
                     <input type="text" name="course_name" class="form-control form-control"
                                    placeholder="Enter Course Name" required pattern="[A-Za-z\s]+" title="Name should contain only alphabets">
                  </div>
                 

                          
                                <button type="submit" id="submit" name = "submit" class="btn btn-primary">
                                Add Course
                            </button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
include 'footer.php';
}
?>