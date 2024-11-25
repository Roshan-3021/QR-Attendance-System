
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

    <h1 class="h3 mb-2 text-gray-800">View Teachers</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body ">
            <div class="table-responsive">
                <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                        <th>Teacher Name</th>
                            <th>Username</th>
                            <th>Email Id</th>
                            <th>Assigned Course</th>
                            <th>Department</th>
                            <th>Status</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../db.php';
                        $sql = "SELECT * FROM `teachers`";
                        $result = $conn->query($sql);
                        $cnt = 1;
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <tr>
                                <td><?php echo $cnt++; ?>.</td>
                                <td><?php echo $row["fullname"]; ?></td>
                                    <td><?php echo $row["username"]; ?></td>
                                    
                                    <td><?php echo $row["email"]; ?></td>
                                    <td><?php echo $row["course"]; ?></td>
                                    <td><?php echo $row["department"]; ?></td>
                                    <td><?php echo $row["status"]; ?></td>
                                    <td><a href="delete_teacher.php?id=<?php echo $row['teacher_id']; ?>"><i class="fas fa-trash" style="color: red; cursor: pointer"></i></a></td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='3'>No teachers found</td></tr>";
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
}
include 'footer.php';
?>
