<?php
// Include database connection
include '../db.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $year = mysqli_real_escape_string($conn, $_POST['year']);
    $sect = mysqli_real_escape_string($conn, $_POST['sec']);

    // Prepare INSERT statement
    $sql = "INSERT INTO `attendance`(`subject`, `department`, `year`, `date`,`sect`) VALUES ('$subject','$department','$year','$date','$sect')";

    // Execute INSERT statement
    if (mysqli_query($conn, $sql)) {
        
        // Redirect back to createclass.php with success message
        echo "<script>alert('Class created successfully!'); window.location='showqr.php';</script>";
        exit();
    } else {
        // Close database connection
        mysqli_close($conn);
        // Redirect back to createclass.php with error message
        echo "<script>alert('Failed to create class!'); window.location='createclass.php';</script>";
        exit();
    }
} else {
    // If form is not submitted, redirect back to createclass.php with error message
    header("Location: createclass.php?error=1");
    exit();
}
?>
