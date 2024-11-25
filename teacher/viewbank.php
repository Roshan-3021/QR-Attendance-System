<?php

include 'header.php';

?>


<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">View Bank</h1>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>City</th>
                                            <th>View Stock</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           <th>Name</th>
                                            <th>Phone</th>
                                            <th>City</th>
                                            <th>View Stock</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       <?php

                                       include '../db.php';
                                       $sql = "SELECT * FROM `bank` ORDER BY `id` DESC";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
										  // output data of each row
										  while($row = $result->fetch_assoc()) {
										    

                                       ?>


                                        <tr>
                                            <td><?php echo $row["name"];  ?></td>
                                            <td><?php echo $row["phone"];  ?></td>
                                            <td><?php echo $row["city"];  ?></td>
                                            <td> <a href="viewstock.php?id=<?php echo $row['id'];  ?>"> <i class="fas fa-eye"></i> </a> </td>
                                            <td> <a href="deletebank.php?id=<?php echo $row['id'];  ?>"> <i class="fas fa-trash"></i> </a> </td>
                                        </tr>
                                       
<?php

										  }
										} 


?>


                                    </tbody>
                                </table>
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