<?php
include 'header.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Teachers</h1>
        <a href="viewteacher.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-eye fa-sm text-white-50"></i> View All</a>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- DataTales Example -->
        <div class="card shadow mb-4 col-lg-9">
            <br>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add New Teacher</h6>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-lg-12">

                        <form class="user" action="add_teacher_db.php" method="POST">  
                         
                     <div class="row"> <div class="col-md-6"> 
                     <label for="fullname" ><b>Enter Full Name</b></label>   
                     <input type="text" name="fullname" class="form-control form-control"
                                    placeholder="Enter Fullname" required></div>



                                    <div class="col-md-6"> 
                                    <label for="fullname"><b>Enter Username</b></label>     
                                    
                                    <input type="text" name="username" class="form-control form-control"
                                    placeholder="Enter Username " required></div></div>
                        
                                    <div class="row mt-4"> 
                                        
                                    <div class="col-md-6"> <label for="fullname" ><b>Enter Email Id</b></label>    <input type="email" name="emailid" class="form-control form-control"
                                    placeholder="Enter Email" required>
                                </div>
                                    <div class="col-md-6"> 
                                        <label for="fullname" ><b>Enter Password</b></label> 
                                    <input type="password" name="password" class="form-control form-control"
                                    placeholder="Password" required>
                                </div></div>
                        
                          

  <div class="row mt-4 mb-4">
    <div class="col-md-6">
        <label for="department"><b>Select Department</b></label>
        <select class="form-control" name="department" id="department" style="cursor: pointer" required>
        <option value="" disabled selected>Select Department</option>
            <?php 
            $sql = "SELECT * FROM `tbldepartments`;";
            $result = $conn->query($sql);
            foreach ($result as $r) {
            ?>
            <option value="<?php echo $r['department_name']; ?>"><?php echo $r['department_name']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="col-md-6">
        <label for="course"><b>Select Course</b></label>
        <select class="form-control" name="course" id="course" style="cursor: pointer" required>
            <!-- Options will be populated dynamically via AJAX -->
        </select>
    </div>
</div>


                           

                            <button type="submit" class="btn btn-primary">
                                Add Teacher
                            </button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    // AJAX request to fetch courses based on selected department
    document.getElementById('department').addEventListener('change', function() {
        var department = this.value;
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Update courses select element with returned options
                document.getElementById('course').innerHTML = this.responseText;
            }
        };
        xhr.open('GET', 'get_courses.php?department=' + department, true);
        xhr.send();
    });
</script>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
include 'footer.php';
?>
