<?php
include"header.php";
include("php/checklogin.php");
 ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Your Funds Details</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Raised (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Your Total Funds in (<?php
echo "$year";
?>)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php $sql = "SELECT SUM( amount) FROM funds where scid=$user_id and year='$year'";
        $amountsum = mysqli_query($conn, $sql) or die(mysqli_error($sql));
        $row_amountsum = mysqli_fetch_assoc($amountsum);
        $totalRows_amountsum = mysqli_num_rows($amountsum);
        echo 'Tk.' .$row_amountsum['SUM( amount)'];?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Raised (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Your Verified Funds in (<?php
echo "$year";
?>)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php $sql = "SELECT SUM( amount) FROM funds where scid=$user_id and year='$year' and status='Verified'";
        $amountsum = mysqli_query($conn, $sql) or die(mysqli_error($sql));
        $row_amountsum = mysqli_fetch_assoc($amountsum);
        $totalRows_amountsum = mysqli_num_rows($amountsum);
        echo 'Tk.' .$row_amountsum['SUM( amount)'];?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Funding</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php $sql = "SELECT SUM( amount) FROM funds where scid=$user_id and status='Verified'";
        $amountsum = mysqli_query($conn, $sql) or die(mysqli_error($sql));
        $row_amountsum = mysqli_fetch_assoc($amountsum);
        $totalRows_amountsum = mysqli_num_rows($amountsum);
        echo 'Tk.' .$row_amountsum['SUM( amount)'];?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Funds Details</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Amount</th>
                                            <th>Transaction Type</th>
                                            <th>Transaction ID</th>
                                            <th>Month</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    
                                        <tr>
                                            <th>Amount</th>
                                            <th>TR Type</th>
                                            <th>TR ID</th>
                                            <th>Month</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                   $sql = "SELECT * FROM funds where scid=$user_id";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row["amount"]."</td>";
        echo "<td>".$row["ttype"]."</td>";
        echo "<td>".$row["tid"]."</td>";
        echo "<td>".$row["month"]."</td>";
    	echo "<td>".$row["date"]."</td>";
        if ($row["status"] == "Verified") {
            echo '<td><i class="fas fa-check-circle mr-2" style="color: blue;"></i>'.$row["status"].'</td>';
        } else {
            echo '<td><i class="fas fa-times-circle mr-2" style="color: red;"></i>'.$row["status"].'</td>';
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"><i class="fas fa-exclamation-triangle"></i>
                Sorry! No record found. Please Add funds</a>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
}

mysqli_close($conn);
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
<?php include"footer.php"; ?>