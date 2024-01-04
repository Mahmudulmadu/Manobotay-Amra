<?php
include"header.php";
include("php/checklogin.php");
 ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                      <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Track your requests</h1>
                    <p class="mb-4">Here you can track your submitted requests. </p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Program</th>
                                            <th>Request Date</th>
                                            <th>Demand</th>
                                            <th>Approved Amount</th>
                                            <th>Remarks</th>
                                            <th>Visit Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    
                                        <tr>
                                            <th>ID</th>
                                            <th>Program</th>
                                            <th>Request Date</th>
                                            <th>Demand</th>
                                            <th>Approved Amount</th>
                                            <th>Remarks</th>
                                            <th>Visit Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                   $sql = "SELECT * FROM request where scid=$user_id";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row["scid"]."</td>";
        echo "<td>".$row["apply_for"]."</td>";
        echo "<td>".$row["app_date"]."</td>";
        echo "<td>".$row["demand"]."</td>";
        echo "<td>".$row["approved_amount"]."</td>";
                echo "<td>".$row["remarks"]."</td>";
        echo "<td>".$row["visit_date"]."</td>";
       if ($row["status"] == "Completed") {
    echo '<td><i class="fas fa-check-circle mr-2" style="color: blue;"></i> '.$row["status"].'</td>';
} else if ($row["status"] == "Pending") {
    echo '<td><i class="fas fa-exclamation-triangle" style="color: orange;"></i> '.$row["status"].'</td>';
} else if ($row["status"] == "Rejected") {
    echo '<td><i class="fas fa-times-circle mr-2" style="color: red;"></i> '.$row["status"].'</td>';
} else {
    echo '<td><i class="fas fa-question-circle mr-2"></i> '.$row["status"].'</td>';
}
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"><i class="fas fa-exclamation-triangle"></i>
                Sorry! No record found. Please add request under any of TEI Program</a>
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