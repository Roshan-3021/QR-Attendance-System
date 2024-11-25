<?php
// Include database connection
include '../db.php';
include_once('../mailSender.php');
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $year = mysqli_real_escape_string($conn, $_POST['year']);
    $sect = mysqli_real_escape_string($conn, $_POST['sect']);

    // Check if email already exists
    $check_email_query = "SELECT * FROM students WHERE email='$email'";
    $check_email_result = mysqli_query($conn, $check_email_query);

    if (mysqli_num_rows($check_email_result) > 0) {
        // Email already exists, display alert and exit
        mysqli_close($conn);
        echo "<script>alert('Email already exists. Please use a different email.'); window.location='viewstudent.php';</script>";
        exit();
    }

    // Prepare INSERT statement
    $sql = "INSERT INTO students (name, email, contact, department, year, sect) VALUES ('$name', '$email', '$contact', '$department', '$year', '$sect')";

    // Execute INSERT statement
    if (mysqli_query($conn, $sql)) {
        // Close database connection
        mysqli_close($conn);



        $subject = 'Student Registration Successful';
        $msg = '<html>
            <body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
                <div style="max-width: 600px; margin: 0 auto; background-color: #fff; padding: 30px; border-radius: 10px; box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);">
                <center><a href="https://postimages.org/" target="_blank"><img src="https://i.postimg.cc/h48rXv6g/logo.png" border="0" alt="logo"/></a></center>
                    <h2 style="text-align: center; color: #555;">Student Registration Successful</h2>
                    <p style="font-size: 16px; line-height: 1.6">Dear '.ucwords($name).',</p>
                    <p style="font-size: 16px; line-height: 1.6;">We are pleased to inform you that your Registration as a Student has been Successful.</p>
                    <p style="font-size: 16px; line-height: 1.6;">Below are your login credentials:</p>
                    <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                        <tr>
                            <td style="padding: 10px; border: 1px solid #555; font-weight: bold;">Username:</td>
                            <td style="padding: 10px; border: 1px solid #555;">'.$email.'</td>
                        </tr>
                        <tr>
                            <td style="padding: 10px; border: 1px solid #555; font-weight: bold;">Password:</td>
                            <td style="padding: 10px; border: 1px solid #555;">12345</td>
                        </tr>
                    </table>
                    <p style="font-size: 16px; line-height: 1.6;">Please use the provided credentials to log in and access your account. If you have any questions or concerns, feel free to contact us.</p>
                    <p style="font-size: 16px; line-height: 1;">Best regards,</p>
                    <p style="font-size: 16px; line-height: 1; color: blue"><b>The AttendEase Team</b></p>
                </div>
            </body>
        </html>';

        $accept = smtp_mailer($email, $subject, $msg);
        
        if($accept) {
            echo "<script>alert('Student added successfully!'); window.location='viewstudent.php';window.location='viewstudent.php';</script>";
           
        }         

        // Redirect back to addstudent.php with success message
        exit();
    } else {
        // Close database connection
        mysqli_close($conn);
        // Redirect back to addstudent.php with error message
        echo "<script>alert('Failed to add student!'); window.location='viewstudent.php';</script>";
        exit();
    }
} else {
    // If form is not submitted, redirect back to addstudent.php with error message
    header("Location: viewstudent.php?error=1");
    exit();
}
?>
