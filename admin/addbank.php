<?php

include 'header.php';

?>




                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"> Blood Bank</h1>
                        <a href="bank.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-eye fa-sm text-white-50"></i> View All</a>
                    </div>

                    <!-- Content Row -->
                    
                    <div class="row">

                        <!-- DataTales Example -->
                    <div class="card shadow mb-4 col-lg-12">
                        <br>
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add New Blood Bank</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                            
                            <div class="col-lg-12">
                                
                                    <form class="user" action="addbankdb.php" method="POST">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control form-control-user"
                                                 
                                                placeholder="Enter Blood Bank Name">
                                        </div>

                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" 
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="number" class="form-control form-control-user"
                                                 
                                                placeholder="Enter Contact number">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <textarea class="form-control" name="address" placeholder="Enter Blood Bank Address">Enter Blood Bank Address
                                                
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="city" class="form-control form-control-user"
                                                 
                                                placeholder="Enter City Name">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="state" class="form-control form-control-user"
                                                 
                                                placeholder="Enter State">
                                        </div>
                                        
                                        
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Register
                                        </button>
                                        
                                        
                                    </form>
                                   
                                
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>

                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           <?php

           include 'footer.php';


           ?>
        