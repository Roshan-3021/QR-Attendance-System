<?php 
session_start();
error_reporting(0);

// Database Connection
include('../db.php');

//Validating Session
if(strlen($_SESSION['aid']) == 0) { 
    header('location:index.php');
    exit(); // Ensure script stops execution after redirection
} else {
    include 'header.php';
?>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Student</h1>
        <!-- You can add a back button here if needed -->
    </div>

    <div class="row">
        <div class="card shadow mb-4 col-lg-9">
            <br>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add New Student</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form class="user" action="addstudent_db.php" method="POST">
                           <div class="row">
                               <div class="col-md-6">
                                   <label for="name">Name</label>
                                   <input type="text" name="name" class="form-control form-control" placeholder="Enter Student Name" required>
                               </div>
                               <div class="col-md-6">
                                   <label for="email">Email Id</label>
                                   <input type="email" name="email" class="form-control form-control" placeholder="Enter Email Address" required>
                               </div>
                           </div>
                       
                           <div class="row mt-4">
                               <div class="col-md-6">
                                   <label for="contact">Contact</label>
                                   <input type="text" name="contact" class="form-control form-control" placeholder="Enter Contact Number" required>
                               </div>
                               <div class="col-md-6">
                                   <label for="department">Department</label>
                                   <select class="form-control" name="department" style="cursor: pointer" required>
                                       <?php 
                                       $sql = "SELECT * FROM `tbldepartments`;";
                                       $result = $conn->query($sql);
                                       foreach ($result as $r) {
                                           echo "<option value='".$r['department_name']."'>".$r['department_name']."</option>";
                                       }
                                       ?>
                                   </select>
                               </div>
                           </div>

                           <div class="row mt-4">
                               <div class="col-md-6">
                                   <label for="year">Year</label>
                                   <select class="form-control" name="year" style="cursor: pointer" required>
                                       <option value="1">1st</option>
                                       <option value="2">2nd</option>
                                       <option value="3">3rd</option>
                                       <option value="4">4th</option>
                                   </select>
                               </div>
                               <div class="col-md-6">
                                   <label for="sect">Section</label>
                                   <select class="form-control" name="sect" style="cursor: pointer" required>
                                       <option value="A">A</option>
                                       <option value="B">B</option>
                                       <option value="C">C</option>
                                   </select>
                               </div>
                           </div>

                           <div class="form-group"></div>
                           <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4 col-lg-3">
            <br>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Import Student Data</h6>
            </div>
            <div class="row mt-3 mb-3"> 
                <div class="col-md-8">
                    <form action="addstudentimportdtb.php" method="POST" enctype="multipart/form-data">    
                        <label for="excel">Import File</label>&nbsp&nbsp
                        <input type="file" id="excel" name="excel" style="cursor: pointer" required >
                        <button type="submit" name="import" class="btn btn-success mt-2">Import</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php

include 'footer.php';
}
?>
