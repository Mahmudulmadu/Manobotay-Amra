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
                                    <h6 class="m-0 font-weight-bold text-primary">Add Your Funds</h6>
                                    </div>
                                <!-- Card Body -->
                                <div class="card-body">
                              <?php 
if(isset($_POST['request'])) {
    // Escape user input to prevent SQL injection
    $funds = mysqli_real_escape_string($conn, $_POST['funds']);
    $tid = mysqli_real_escape_string($conn, $_POST['tid']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    
    // Check if QAT status is Fail
    if ($amount < 2000) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fas fa-exclamation-triangle"></i>
                Repected Member, Minimum funding is 2000 PKR, Please send 2000/ PKR Thank You!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
    } else {
        // Check if request already exists for this user
        $check_sql = "SELECT * FROM funds WHERE scid='$user_id' and month='$month'";
        $check_result = mysqli_query($conn, $check_sql);

        if (mysqli_num_rows($check_result) > 0) {
            // Request already exists for this user
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"><i class="fas fa-info-circle"></i>
                    A request has already been submitted for current month. Please wait for admin approval.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        } else {
            // Prepare SQL statement
            $sql = "INSERT INTO funds (scid, amount, ttype, tid, month, year, status)
                    VALUES ('$user_id', '$amount', '$funds', '$tid', '$month', '$year', 'Verification Pending')";

            if (mysqli_query($conn, $sql)) {
              $last_id = mysqli_insert_id($conn);
              echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle mr-2"></i> Success! Funds Added. <a href="track-funds.php">Track your Funds</a>.
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
        }
    }

    mysqli_close($conn);
}
?>
                     <form class="user" method="post">
                                         <div class="form-group">
<label for="cars">Transaction Type:</label>
<select class="form-control" name="funds" >

    <option value="Bank Transfer">Bank Transfer</option>
    <option value="Bkash">Bkash</option>
     <option value="Nogod">Nogod</option>
</select>
                                        </div>
                                        <div class="form-group">
                                        <label for="cars">Transaction ID</label>
                                            <input type="number" class="form-control form-control-user"
                                                id="exampleInputPassword" name="tid" autofocus required>
                                        </div>
                                         <div class="form-group">
                                        <label for="cars">Amount</label>
                                            <input type="number" class="form-control form-control-user"
                                                id="exampleInputPassword" name="amount" placeholder="2000" required>
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" name="request" value="Add Funds">
                                        </a>
                                </div>
                            </div>
          </div>

                    
                                        

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                          <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Your Profile:</h6>
                        </div>
                        <div class="card-body">
                          <h6 class="m-0 font-weight-bold text-primary">Name:</h6>
<?php echo $name;?>
<br><br>
<h6 class="m-0 font-weight-bold text-primary">Address:</h6>
<?php echo $address;?>
<br><br>
<h6 class="m-0 font-weight-bold text-primary">Fathers Name:</h6>
<?php echo $fname;?>
<br><br>

<h6 class="m-0 font-weight-bold text-primary">Contact Number:</h6>
<?php echo $contact;?><br><br>
<h6 class="m-0 font-weight-bold text-primary">Your members ID:</h6>
<?php echo $members_id;?><br><br>
<h6 class="m-0 font-weight-bold text-primary">Your District:</h6>
<?php echo $dist;?><br><br>

                                </div>
                               </div>
                            </div>
                                                </div>
                                                              
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?php include"footer.php"; ?>