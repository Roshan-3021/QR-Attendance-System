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
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Mark Attedance</h1>
        <!-- You can add a back button here if needed -->
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- DataTales Example -->
        <div class="card shadow mb-4 col-lg-12">
            <br>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Mark Attedance</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12" style="text-align: center;">
                        <?php

// Function to generate QR code
function generateQRCode($data, $filename, $size = 300) {
    // Encode the data
    $encodedData = urlencode($data);
    
    // Google Chart API URL for generating QR code
    $url = "https://chart.googleapis.com/chart?chs={$size}x{$size}&cht=qr&chl={$encodedData}";

    // Get the QR code image data from the URL
    $imageData = file_get_contents($url);

    // Save the image to a file
    file_put_contents($filename, $imageData);
}

// Example usage:

$sql = "SELECT * FROM  `attendance` ORDER BY `attendance`.`id` DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $data = $row["id"];
  }
} 



$filename = "qr_code.png"; // Output file name

// Generate the QR code
generateQRCode($data, $filename);

// Output the QR code image
echo '<img src="' . $filename . '" alt="QR Code">';
?>

                    </div>
                </div>
             <center>   <button style="text-align: center;font: 35px;"><a href="closeclass.php?id=<?php echo $data; ?>"> Close Attedance </a></button></center>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php
}
include 'footer.php';
?>
