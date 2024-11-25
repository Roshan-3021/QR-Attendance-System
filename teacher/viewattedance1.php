<?php
include 'header.php';

$aid = $_GET['id'];

$sql = "SELECT * FROM `attendance` WHERE `id`='$aid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $dept = $row["department"];
    $subject_name = $row['subject'];
    $year = $row["year"];
    $date = $row["date"];
    $time = $row["time"];
    $timestamp = strtotime("$date $time");
    $standard_date_time = date("d-m-y H:i:s", $timestamp);

  }
}

// Initialize total counts
$total_present = 0;
$total_absent = 0;

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">View Attendance</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Student Name</th>
                            <th>Subject</th>
                            <th>Year</th>
                            <th>Section</th>
                            <th>Date | Time</th>
                            <th>P / A</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../db.php';

                        $sql_students = "SELECT * FROM `students` WHERE `department`='$dept' AND `year`='$year'";
                        $result_students = $conn->query($sql_students);
                        $cnt = 1;

                        if ($result_students->num_rows > 0) {
                            // output data of each row
                            while ($row = $result_students->fetch_assoc()) {
                                $sid = $row["student_id"];

                                // Count present records for the current student
                                $sql_present = "SELECT COUNT(*) AS present_count FROM `mark` WHERE `sid`='$sid' AND `aid`='$aid'";
                                $result_present = $conn->query($sql_present);
                                $row_present = $result_present->fetch_assoc();
                                $present_count = $row_present['present_count'];

                                // Calculate absent count based on total records
                                $absent_count = 1 - $present_count;

                                // Increment total counts
                                $total_present += $present_count;
                                $total_absent += $absent_count;

                                ?>
                                <tr>
                                    <td><?php echo $cnt++; ?></td>
                                    <td><?php echo ucwords($row["name"]); ?></td>
                                    <td><?php echo ucwords($subject_name); ?></td>
                                    <td><?php echo ucwords($row['year']); ?>  year</td>
                                    <td><?php echo ucwords($row['sect']); ?></td>
                                    <td><?php echo $standard_date_time; ?></td>
                                    <td>
                                        <?php if ($present_count > 0): ?>
                                            <b><span style="color: green">Present</span></b>
                                        <?php else: ?>
                                            <b><span style="color: red">Absent</span></b>
                                        <?php endif; ?>
                                    </td>
                                </tr>

                                
                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='3'>No Students found</td></tr>";
                        }

                       $_SESSION['total_present'] = $total_present;
                       $_SESSION['total_absent'] = $total_absent;
                            
                        ?>
                        
                    </tbody>
                </table>
            </div>
          </div>
        </div>
        <div id="piechart" style="width: 790px; height: 590px;"></div>
    
<script src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Attendance', 'Per Lecture'],
          ['Total Present Students',     <?php echo htmlentities($total_present);?>],
          ['Total Absent Students',     <?php echo htmlentities($total_absent);?>]     
        ]);

        var options = {
          title: '<?php echo  $subject_name; ?> Course Attendance'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</div>
<!-- /.container-fluid -->

<?php
include 'footer.php';
?>
