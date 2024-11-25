<?php
// Include database connection
include '../db.php';

// Get selected department
$department = $_GET['department'];

// Fetch courses based on selected department
$sql = "SELECT * FROM tblcourses WHERE department_name = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $department);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Generate options for courses select element
$options = '';
while ($row = mysqli_fetch_assoc($result)) {
    $options .= '<option value="' . $row['course_name'] . '">' . $row['course_name'] . '</option>';
}

echo $options;

// Close database connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
