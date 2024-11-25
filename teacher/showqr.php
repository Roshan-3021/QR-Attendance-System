<?php
include 'header.php';
// use Endroid\QrCode\QrCode;

// // Include Composer's autoloader
// require_once 'vendor/autoload.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Mark Attendance</h1>
        <!-- You can add a back button here if needed -->
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- DataTales Example -->
        <div class="card shadow mb-4 col-lg-12">
            <br>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Mark Attendance</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12" style="text-align: center;">
                        <?php
                        // Function to generate QR code and save it to a file
                        function generateQRCode($data, $filename, $size = 150) {
                            // Include necessary JavaScript and CSS files
                            echo '<script type="text/javascript" src="js/jquery.min.js"></script>';
                            echo '<script type="text/javascript" src="js/qrcode.js"></script>';
                            
                            // Create a QRCode instance
                            echo '<center><div id="qrcode" style="margin-bottom: 35px; margin-top: 30px"></div><center>';
                            echo '<script type="text/javascript">';
                            echo 'var qrcode = new QRCode(document.getElementById("qrcode"), {';
                            echo 'width : ' . $size . ',';
                            echo 'height : ' . $size;
                            echo '});';
                            echo 'qrcode.makeCode("' . $data . '");';
                            echo '</script>';

                            // Save the generated QR code to a file
                            // $qrCode = new QRCode($data);
                            // $qrCode->setSize($size);
                            // $qrCode->setMargin(10);
                            // $qrCode->save($filename);
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
                        // echo '<img src="' . $filename . '" alt="QR Code" width="300" height="300">';
                       
                        ?>
                    </div>
                </div>
                <center><button style="text-align: center; font: 35px;"><a href="closeclass.php?id=<?php echo $data; ?>"> Close Attendance </a></button></center>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php
include 'footer.php';
?>
