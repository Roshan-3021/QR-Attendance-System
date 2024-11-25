
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

if($_GET['action']=='delete'){
    $id=intval($_GET['id']);
    
    $query=mysqli_query($conn,"delete from tbldepartments where id = $id ");
    if($query){
    echo "<script>alert('Department Deleted Successfully.');</script>";
    echo "<script type='text/javascript'> document.location = 'viewdepartment.php'; </script>";
    } else {
    echo "<script>alert('Something went wrong. Please try again.');</script>";
    }
    
    }
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Manage Departments</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body ">
            <div class="table-responsive">
                <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Department Name</th>
                            <th>Registration Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../db.php';
                        $sql = "SELECT * FROM `tbldepartments`";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $cnt = 1;
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <tr>
                                <td><?php echo $cnt++; ?></td>
                                    <td><?php echo $row["department_name"]; ?></td>
                                    <td><?php echo $row["reg_date"]; ?></td>
                                    <td><center><a href="viewdepartment.php?action=delete&id=<?php echo $row['id']; ?>"><i class="fas fa-trash" style="color: red"></i></a></center></td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='3'>No departments found</td></tr>";
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
}
?>
