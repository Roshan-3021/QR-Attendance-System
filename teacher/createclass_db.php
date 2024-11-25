<?php
// Include database connection
include '../db.php';
session_start();
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $subject = mysqli_real_escape_string($conn, $_POST['course']);
    $date = mysqli_real_escape_string($conn, $_POST['c_date']);
    $time = mysqli_real_escape_string($conn, $_POST['c_time']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $year = mysqli_real_escape_string($conn, $_POST['year']);
    $sect = mysqli_real_escape_string($conn, $_POST['sect']);
    $aid = $_SESSION['aid'];

    // Check if class record already exists for the given date and other details
    // $check_sql = "SELECT * FROM `tblclass` WHERE `class_name` = '$subject' AND `department_name` = '$department' AND `year` = '$year' AND `section` = '$sect' AND `date` = '$date'";
    // $result = mysqli_query($conn, $check_sql);
    // if (mysqli_num_rows($result) > 0) {
    //     // If class record already exists for the day, you can choose to update it or ignore the new record
    //     // For now, let's ignore the new record
    //     echo "<script>alert('Class for this subject already exists for today!'); window.location='createclass.php';</script>";
    //     exit();
    // } else {
        // Prepare INSERT statement for tblclass
        $sql1 = "INSERT INTO `tblclass`(`class_name`, `department_name`, `year`, `section`, `date`, `time`, `addedbyno`) VALUES ('$subject','$department','$year','$sect', '$date', '$time', '$aid')";
        mysqli_query($conn, $sql1);

        // Prepare INSERT statement for attendance
        $sql2 = "INSERT INTO `attendance`(`subject`, `department`, `year`, `date`, `sect`, `time`, `addedbyno`) VALUES ('$subject','$department','$year','$date','$sect', '$time', '$aid')";

        // Execute INSERT statement for attendance
        if (mysqli_query($conn, $sql2)) {
            // Redirect back to createclass.php with success message
            echo "<script>alert('Class created successfully and attendance recorded!'); window.location='showqr.php';</script>";
            exit();
        } else {
            // Close database connection
            mysqli_close($conn);
            // Redirect back to createclass.php with error message
            echo "<script>alert('Failed to record class attendance!'); window.location='createclass.php';</script>";
            exit();
        }
    }
// } else {
//     // If form is not submitted, redirect back to createclass.php with error message
//     header("Location: createclass.php?error=1");
//     exit();
// }
?>
