<?php
include"header.php";
?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                        <!-- Pie Chart -->
                        <div class="row">
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Submit Request Under FAP</h6>
                                    </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                <?php 
                                  if(isset($_POST['request'])) {
    // Escape user input to prevent SQL injection
    $demand = mysqli_real_escape_string($conn, $_POST['demand']);
    // Prepare SQL statement
    $check_sql = "SELECT * FROM request WHERE scid='$user_id' and status='Pending'";
        $check_result = mysqli_query($conn, $check_sql);

        if (mysqli_num_rows($check_result) > 0) {
            // Request already exists for this user
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"><i class="fas fa-info-circle"></i>
                    A request has already been submitted. Please check <a href="tracking.php">Tracking..</a>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        } else {
        $sql = "INSERT INTO request (scid, apply_for, demand, remarks, year, status)
                    VALUES ('$user_id', 'IDP', '$demand', 'Waiting for visit','$year', 'Pending')";

            if (mysqli_query($conn, $sql)) {
              $last_id = mysqli_insert_id($conn);
              echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle mr-2"></i> Request added successfully. Track this Request <a href="tracking.php">Tracking..</a>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Error: ' . $sql . '<br>' . mysqli_error($conn) . '
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
    }

    mysqli_close($conn);
}
}
?>
                     <form class="user" method="post">
                                         <div class="form-group">
<label for="cars">Select Demand:</label>
<select class="form-control" name="demand" >
  <optgroup label="Electronic Devices:">
   
</select>
                                        </div>
                                        <div class="form-group">
                                        <label for="cars">Expected Ammount</label>
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputPassword" name="eamount" autofocus required>
                                        </div>
                                         <div class="form-group">
                                         <label for="cars">Contact Number:</label>
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputPassword" value="<?php echo $contact;?>" readonly>
                                        </div>
                                         <div class="form-group">
                                         <label for="cars">Your District:</label>
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputPassword" value="<?php echo $dist;?>" readonly>
                                        </div>
                                         <div class="form-group">
                                         <label for="cars">Your CNIC:</label>
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputPassword" value="<?php echo $members_id?>" readonly>
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" name="request" value="Submit Request">
                                        </a>
                                </div>
                            </div>
          </div>

                    
                                        

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                          <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">TORs of LAP</h6>
                        </div>
                        <div class="card-body">
                     <p> <B> Yor are applying under Funding Aids Program situated at <u><?php echo $address;?></u></b></p>
                          <h6 class="m-0 font-weight-bold text-primary">Eligibility Criteria:</h6>

 <a href="Details-of-LAP.pdf" target="_blank" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-tv"></i>
                                        </span>
                                        <span class="text">Dwnload Budget Document</span>
                                    </a>
                                </div>
                               </div>
                            </div>
                                                </div>
                                                              
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?php include"footer.php"; ?>