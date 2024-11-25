<?php
// Database connection
include '../db.php';
include_once('../mailSender.php');
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['emailid'];
    $password1 = $_POST['password'];
    $password = md5($_POST['password']);
    $department = $_POST['department'];
    $course = $_POST['course'];

    // Hash the password before storing it in the database
    

    // Check if username already exists
    $check_username_query = "SELECT * FROM `teachers` WHERE `username`='$username' AND `email` = '$email'";
    $check_username_result = $conn->query($check_username_query);

    if ($check_username_result->num_rows > 0) {
        echo "<script>alert('Username already exists. Please choose another username.'); 
              window.location='viewteacher.php';</script>";
        exit(); // Stop further execution
    }

    // Insert new record if username doesn't exist
    $sql = "INSERT INTO `teachers`(`fullname`, `username`, `email`, `password`, `department`, `course`) 
            VALUES ('$fullname','$username','$email','$password','$department', '$course')";
    


    if ($conn->query($sql) === TRUE) {
        $subject = 'Teacher Registration Successful';
        $msg = '<html>
            <body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
                <div style="max-width: 600px; margin: 0 auto; background-color: #fff; padding: 30px; border-radius: 10px; box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);">
                <a href="https://postimages.org/" target="_blank"><img src="https://i.postimg.cc/h48rXv6g/logo.png" border="0" alt="logo"/></a>
                    <h2 style="text-align: center; color: #555;">Teacher Registration Successful</h2>
                    <p style="font-size: 16px; line-height: 1.6">Dear '.ucwords($fullname).',</p>
                    <p style="font-size: 16px; line-height: 1.6;">We are pleased to inform you that your Registration as a Teacher has been Successful.</p>
                    <p style="font-size: 16px; line-height: 1.6;">Below are your login credentials:</p>
                    <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                        <tr>
                            <td style="padding: 10px; border: 1px solid #555; font-weight: bold;">Username:</td>
                            <td style="padding: 10px; border: 1px solid #555;">'.$username.'</td>
                        </tr>
                        <tr>
                            <td style="padding: 10px; border: 1px solid #555; font-weight: bold;">Password:</td>
                            <td style="padding: 10px; border: 1px solid #555;">'.$password1.'</td>
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
            echo "<script>alert('Teacher has been successfully registered!'); 
            window.location='viewteacher.php';</script>";
        }         
        exit(); // Stop further execution
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // If the form wasn't submitted, redirect to the add teacher page
    header("Location: viewteacher.php");
    exit();
}
?>
