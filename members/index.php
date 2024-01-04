<?php
include"header.php";
include("php/checklogin.php");
 ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Raised (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Manobotay Amra have raised in (<?php
echo "$year";
?>)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php $sql = "SELECT SUM( amount) FROM funds where year='$year' and status='Verified' ";
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
                                                Manobotay have spent in (<?php
echo "$year";
?>)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php $sql = "SELECT SUM( approved_amount) FROM request where year='$year' and status='Completed'";
        $amountsum = mysqli_query($conn, $sql) or die(mysqli_error($sql));
        $row_amountsum = mysqli_fetch_assoc($amountsum);
        $totalRows_amountsum = mysqli_num_rows($amountsum);
        echo 'Tk.' .$row_amountsum['SUM( approved_amount)'];?></div>
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
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Manobotay Needs in (<?php
echo "$year";
?>)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php $sql = "SELECT SUM( expected_amount) FROM request where year=$year and status='Pending'";
        $amountsum = mysqli_query($conn, $sql) or die(mysqli_error($sql));
        $row_amountsum = mysqli_fetch_assoc($amountsum);
        $totalRows_amountsum = mysqli_num_rows($amountsum);
        echo 'Tk.' .$row_amountsum['SUM( expected_amount)'];?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-hdd fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests of (<?php
echo "$year";
?>)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">  <?php $sql = "SELECT * FROM request WHERE status = 'Pending'";
    $query = $conn->query($sql);
    echo "$query->num_rows";?> </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-eye fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                          <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Introduction of Manobotay</h6>
                        </div>
                        <div class="card-body">
                           This is a non-profit organization that is dedicated to providing support in Bangladesh. The organization was founded with the aim of creating a
positive impact on the education system of the country by enhancing the quality of education in schools.
by its members.This is an organization that is dedicated to improving ...................<br><br> 
<h6 class="m-0 font-weight-bold text-primary">Download Intro & Budget Document</h6><br>
<p><a href="Budget-Document-of-The-Education-Initative-for-FY-2023-2024.pdf" target="_blank" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                        <span class="text">Complete Intro of Manobotay Amra</span>
                                    </a></p>
<h6 class="m-0 font-weight-bold text-primary">Download Intro & Budget Document of Manobotay Amra (Programs)</h6>
<div class="my-2"></div>
                                    <a href="Details-of-LAP.pdf" target="_blank" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-tv"></i>
                                        </span>
                                        <span class="text">Funding Aids Program</span>
                                    </a>
                                    <a href="Details-of-IDP.pdf" target="_blank" class="btn btn-info btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-building"></i>
                                        </span>
                                        <span class="text">Infra Development Program</span>
                                    </a>
                                     <a href="emergency-fund.pdf" target="_blank" class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-ambulance"></i>
                                        </span>
                                        <span class="text">Emergency Fund</span>
                                    </a>
                                </div>
                                </div>
                               
                            </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Budget Distribution FY(2023-2024)</h6>
                                    </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Funding Aids
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Infra Development
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-danger"></i> Emergency Fund
                                        </span>
                                         <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Operational Cost
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?php include"footer.php"; ?>