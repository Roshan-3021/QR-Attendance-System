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
        <div class="card shadow mb-4 col-lg-12">
            <br>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add New Class</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form class="user" action="createclass_db.php" method="POST">
                            <div class="form-group">
                                <label for="subject">Subject Name</label>
                                <input type="text" name="subject" class="form-control form-control-user" placeholder="Enter Subject Name">
                            </div>

                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" name="date" class="form-control form-control-user" required>
                            </div>

                            <div class="form-group">
                                <label for="department">Department</label>
                                <select class="form-control " name="department" required>
                                   
                                    <option value="IT">IT</option>
                                    <option value="CSE">CSE</option>
                                    <option value="EXTC">EXTC</option>
                                    <option value="Civil">Civil</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="year">Year</label>
                                <select class="form-control " name="year" required>
                                    
                                    <option value="1">First Year</option>
                                    <option value="2">Second Year</option>
                                    <option value="3">Third Year</option>
                                    <option value="4">Fourth Year</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="department">Section</label>
                                <select class="form-control" name="sec">
                                    
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                   
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">Create Class</button>
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
