
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

$aid = $_SESSION['aid'];




$usercount = 4;



$sql = "SELECT * FROM teachers";

// Execute the query
$result = $conn->query($sql);
$bank_count = $result->num_rows;

$sql = "SELECT * FROM students";

// Execute the query
$result = $conn->query($sql);
$resolved_request = $result->num_rows;


if (isset($_GET['status']) && $_GET['status'] === 'userdeleted') {

?>


<div class="container">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong></strong> User Deleted Successfully.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</div>


<script type="text/javascript">
    const modal = document.querySelector('.alert');

setTimeout(() => {
  modal.classList.remove('show');
}, 3000);
</script>

<?php

}


if (isset($_GET['status']) && $_GET['status'] === 'bankdeleted') {

?>


<div class="container">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong></strong> Blood Bank Deleted Successfully.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</div>


<script type="text/javascript">
    const modal = document.querySelector('.alert');

setTimeout(() => {
  modal.classList.remove('show');
}, 3000);
</script>

<?php

}





?>



                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        <a href="viewdepartment.php"> <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Registered Departments</div></a>
                                                <?php $query=mysqli_query($conn,"select * from tbldepartments");
                                                $department_count=mysqli_num_rows($query); ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $department_count; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        <a href="viewclasses.php"> <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Classes</div></a>
                                                <?php $query=mysqli_query($conn,"select * from tblclass WHERE addedbyno = '".$aid."'");
                                                $class_count=mysqli_num_rows($query); ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $class_count; ?></div>
                                            
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-donate fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        <a href="viewstudent.php"> <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Students</div></a>
                                            <?php $query=mysqli_query($conn,"select * from students WHERE department = '".$_SESSION['department_name']."'");
                                                $student_count=mysqli_num_rows($query); ?>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $student_count; ?></div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-check fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        
                    </div>

                    <div class="card">
                    <div id="piechart" style="width: 800px; height: 600px;"></div>
                </div>
                <!-- /.container-fluid -->
                
    
<script src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Attendance', 'Per Lecture'],
          ['Total Present Students',     <?php echo $_SESSION['total_present'];?>],
          ['Total Absent Students',     <?php echo $_SESSION['total_absent'];?>]     
        ]);

        var options = {
          title: '<?php echo  $_SESSION['course']; ?> Course Attendance'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  
    
            </div>
            <!-- End of Main Content -->

            <?php
include 'footer.php';
}
?>