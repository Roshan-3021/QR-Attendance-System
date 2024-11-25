<?php
include 'header.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Change Password</h1>
        <!-- You can add a back button here if needed -->
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- DataTales Example -->
        <div class="card shadow mb-4 col-lg-6">
            <br>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form class="user" action="change_db.php" method="POST">
                            <div class="form-group">
                                <label for="subject">Enter New Password</label>
                                <input type="text" name="user" value="<?php echo $name; ?>" hidden="">
                                <input type="password" name="password" class="form-control form-control-user" placeholder="Enter New Password" required="">
                            </div>

                            

                            <button type="submit" class="btn btn-primary btn-user btn-block">Create New Password</button>
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
