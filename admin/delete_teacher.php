<?php
// Include database connection
include '../db.php';

// Check if ID parameter is set and is a valid integer
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Escape ID parameter for security
    $teacher_id = mysqli_real_escape_string($conn, $_GET['id']);

    // Prepare DELETE statement
    $sql = "DELETE FROM teachers WHERE teacher_id = $teacher_id";

    // Execute DELETE statement
    if(mysqli_query($conn, $sql)) {
        // Close database connection
        mysqli_close($conn);
        // Redirect back to viewteacher.php with success message
        echo "<script>alert('Teacher deleted successfully!'); window.location='viewteacher.php';</script>";
        exit();
    } else {
        // Close database connection
        mysqli_close($conn);
        // Redirect back to viewteacher.php with error message
        echo "<script>alert('Failed to delete teacher!'); window.location='viewteacher.php';</script>";
        exit();
    }
} else {
    // If ID parameter is missing or invalid, redirect back to viewteacher.php with error message
    header("Location: viewteacher.php?error=1");
    exit();
}
?>
