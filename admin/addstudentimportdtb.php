<?php
include('../db.php');
if(isset($_POST["import"])) {
    $fileName = $_FILES["excel"]["name"];
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

    // Generate a new unique filename based on date and time
    $newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;
    $targetDirectory = "../uploads/" . $newFileName;

    // Move uploaded file to the target directory
    move_uploaded_file($_FILES["excel"]["tmp_name"], $targetDirectory);

    // Include necessary files
    require "../excelReader/excel_reader2.php";
    require "../excelReader/SpreadsheetReader.php";

    // Create SpreadsheetReader instance
    $reader = new SpreadsheetReader($targetDirectory);

    // Loop through each row of the spreadsheet
    foreach($reader as $key => $row) {
        // Assign values from the spreadsheet to variables
        $name = $row[0];
        $email = $row[1];
        $contact = $row[2];
        $department = $row[3];
        $year = $row[4];
        $sect = $row[5];

        // Insert data into the students table
        $stmt = $conn->prepare("INSERT INTO `students`(`name`, `email`, `contact`, `department`, `year`, `sect`) VALUES(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $name, $email, $contact, $department, $year, $sect);
        $stmt->execute();
    }

    // Display success message
    echo "<script> alert('Student Details Imported Successfully');  
    window.location='viewstudent.php';</script>";
}    

?>