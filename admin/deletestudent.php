<?php
// Include database connection
include '../db.php';

// Check if ID parameter is set and is a valid integer
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Escape ID parameter for security
    $teacher_id = mysqli_real_escape_string($conn, $_GET['id']);

    // Prepare DELETE statement
    $sql = "DELETE FROM students WHERE student_id = $teacher_id";

    // Execute DELETE statement
    if(mysqli_query($conn, $sql)) {
        // Close database connection
        mysqli_close($conn);
        // Redirect back to viewteacher.php with success message
        echo "<script>alert('Student deleted successfully!'); window.location='viewstudent.php';</script>";
        exit();
    } else {
        // Close database connection
        mysqli_close($conn);
        // Redirect back to viewteacher.php with error message
        echo "<script>alert('Failed to delete Student!'); window.location='viewstudent.php';</script>";
        exit();
    }
} else {
    // If ID parameter is missing or invalid, redirect back to viewteacher.php with error message
    header("Location: viewstudent.php?error=1");
    exit();
}
?>
