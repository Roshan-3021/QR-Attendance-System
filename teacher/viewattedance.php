<?php
include 'header.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">View Attedance</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Department</th>
                            <th>Year</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>View</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                     
                        $aid = $_SESSION['aid'];
                        // Fetch the department name from the result set
                     
                            $department_name11 = $_SESSION['department_name'];
                    
                            // Fetch attendance records
                            $sql = "SELECT * FROM attendance WHERE department = ? AND addedbyno = ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("si", $department_name11, $aid);
                            $stmt->execute();
                            $result = $stmt->get_result();
                    
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                    ?>
                                    <tr>
                                        <td><?php echo $row["subject"]; ?></td>
                                        <td><?php echo $row["department"]; ?></td>
                                        <td><?php echo $row["year"]; ?> year</td>
                                        <td><?php echo $row["date"]; ?></td>
                                        <td><?php echo $row['time']; ?></td>
                                        
                                        <td> <a href="viewattedance1.php?id=<?php echo $row['id']; ?>"> <i class="fa fa-eye" aria-hidden="true"></i> </a> </td>
                                        <?php
                    
                                            $status = $row["status"];
                                            if($status=="active") {
                                        ?>
                    
                                        <td><a href="closeclass.php?id=<?php echo $row['id']; ?>">Close Attendance</a></td>
                    
                                        <?php
                                            } else {
                                        ?>
                    
                                        <td>Attendance Already Closed</td>
                    
                                        <?php
                                            }
                                        ?>
                                    </tr>
                    <?php
                                }
                            } else {
                                echo "<tr><td colspan='3'>No Attendance records found</td></tr>";
                            }
                     
                    
                      ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
