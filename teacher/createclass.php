<?php
include 'header.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Class</h1>
        <!-- You can add a back button here if needed -->
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- DataTales Example -->
        <div class="card shadow mb-4 col-lg-9">
            <br>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add New Class</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form class="user" action="createclass_db.php" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                <label for="course">Course Name</label>
                                   <select class="form-control" name="course" style="cursor: pointer" required>
                                       <?php 
                                       $sql = "SELECT * FROM `teachers` WHERE course = '".$_SESSION['course']."'  AND teacher_id = '".$_SESSION['aid']."'";
                                       $result = $conn->query($sql);
                                       foreach ($result as $r1) {
                                           echo "<option value='".$r1['course']."'>".$r1['course']."</option>";
                                       }
                                       ?>
                                   </select>
                                </div>
                                <div class="col-md-6">
                                <label for="course">Department Name</label>
                                   <select class="form-control" name="department" style="cursor: pointer" required>
                                   <?php 
                                      $sql = "SELECT * FROM `teachers` WHERE department = '".$_SESSION['department_name']."' AND teacher_id = '".$_SESSION['aid']."'";
                                       $result = $conn->query($sql);
                                       foreach ($result as $r) {
                                           echo "<option value='".$r['department']."'>".$r['department']."</option>";
                                       }
                                       ?>
                                   </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="year">Year</label>
                                    <select class="form-control" name="year" required style="cursor: pointer">
                                        <option value="1">First Year</option>
                                        <option value="2">Second Year</option>
                                        <option value="3">Third Year</option>
                                        <option value="4">Fourth Year</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="section">Section</label>
                                    <select class="form-control" name="sect" required style="cursor: pointer">
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="year">Date</label>
                                  <input type="date" name = "c_date" class="form-control" required style="cursor: pointer">
                                </div>
                                <div class="col-md-6">
                                <label for="year">Time</label>
                                  <input type="time" name = "c_time" class="form-control" required style="cursor: pointer">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Create Class</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php
include 'footer.php';
?>
