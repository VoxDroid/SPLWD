<?php include('../session.php');?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    

<?php include('nav.php');

include('../connect.php');
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Number of Students</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php 
                                            
                                            $sql = "SELECT * from new_student";

if ($result = mysqli_query($conn, $sql)) {

    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );
    
    // Display result
    printf( $rowcount);
 }?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-address-card fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Numbers of Files</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                          
                                            $sql1 = "SELECT * from student_files ";

if ($result1 = mysqli_query($conn, $sql1)) {

    // Return the number of rows in result set
    $rowcount1 = mysqli_num_rows( $result1 );
    
    // Display result
    printf( $rowcount1);
 }?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-folder fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Number of Teachers
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php   
                                            $sql3 = "SELECT * from teachers";

if ($result3 = mysqli_query($conn, $sql3)) {

    // Return the number of rows in result set
    $rowcount3 = mysqli_num_rows( $result3 );
    
    // Display result
    printf( $rowcount3);
 }?></div>
                                                </div>
                                               
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Account Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php 
                                           
                                            $sql3 = "SELECT * from teachers";
                                            $sql4 = "SELECT * from teachers where status = 'pending'";

if ($result4 = mysqli_query($conn, $sql4)) {

    // Return the number of rows in result set
    $rowcount4 = mysqli_num_rows( $result4 );
    
    // Display result
    printf( $rowcount4);
 }?></div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="pending_user.php"><i class="fas fa-user-plus fa-2x text-gray-300"></i></a>
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
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Number of Student Overview</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body" align="center">
                                    <div class="chart-area">
                                        
                                   


<canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Student every school</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart1"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> BES
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> GES
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> SCES
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Current Users Actions</h6>
                                </div>
                                <div class="card-body">



                                <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
                                        <tr>
                                        <th>Teacher</th>
                                        <th>Action Type</th>
                                        <th>Details</th>
                                        
                                        <th>Student</th>
                                        <th>Date</th>
                                    
                                     
                                        
                                        </tr>
</thead>
<tbody>
                                        

                    <?php
	include('../connect.php');
  
$sqlget1 = "SELECT * FROM log order by log_id desc limit 5";
$sqldata1 = mysqli_query($conn, $sqlget1) or die('Error Displaying Data'. mysqli_connect_error());

while ($row2 = mysqli_fetch_assoc($sqldata1)) {


		
?>

	<tr>
        <td>      <?php
           include('../connect.php');
           $id = $row2['teacher_id'];
$sqlget = "SELECT * FROM teachers where teacher_id=$id";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());

while ($row = mysqli_fetch_assoc($sqldata)) echo $row['fname']." ".$row['lname']; { ?>



<?php }?></td>
        <td><?php echo $row2['action_type'];?></td>
        <td><?php echo $row2['details'];?></td>
       
        <td><?php echo $row2['student_id'];?></td>
        <td><?php echo $row2['date'];?></td>

       
        
    </tr>

 <!-- Modal -->
<div class="modal fade" id="e<?php echo $row2['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to Decline account?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" align="right">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <a href="update_status.php?id=<?php echo $row2['id'];?>" class="btn btn-danger">Yes</a>
   
      </div>
    
    </div>
  </div>
</div>

 <!-- Modal -->
 <div class="modal fade" id="a<?php echo $row2['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to Approve account?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" align="right">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <a href="update_status.php?id1=<?php echo $row2['id'];?>" class="btn btn-success">Yes</a>
   
      </div>
    
    </div>
  </div>
</div>
       
    
  
<?php
	

}


?>
<tbody>

<tfoot>
                                        <tr>
                                        <th>Teacher</th>
                                        <th>Action Type</th>
                                        <th>Details</th>
                                        
                                        <th>Student</th>
                                        <th>Date</th>
                                 
                                     
                                        
                                        </tr>
</tfoot>
	</table>
                                   
                                    </div>
                                </div>
                            </div>

                           
                    
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>

    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

   



<script>
var xValues = [<?php
        include('../connect.php');

$sql = "SELECT distinct address from new_student";

$count=0;
$sqldata1 = mysqli_query($conn, $sql) or die('Error Displaying Data'. mysqli_connect_error());
    while ($row1 = mysqli_fetch_assoc($sqldata1))
    {
    if($count==0){
        $a= "'".$row1['address']."'";
        $count++;
        echo $a;


    }
    else if($count==1){
        
        echo ",'".$row1['address']."'";
    }
    
}
?>];
var yValues = [ <?php
        include('../connect.php');

$sql1 = "SELECT COUNT(address) as num  from new_student group by address order by student_id asc";

$count=0;
$sqldata11 = mysqli_query($conn, $sql1) or die('Error Displaying Data'. mysqli_connect_error());
    while ($row11 = mysqli_fetch_assoc($sqldata11))
    {
    if($count==0){
        $a= $row11['num'];
        $count++;
        echo $a;


    }
    else if($count==1){
        
        echo ",".$row11['num'];
    }
    
}
?>];
var barColors = ['#4e73df', '#1cc88a', '#36b9cc','#2e59d9', '#17a673', '#2c9faf'];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: 0, max:<?php  $sql44 = "SELECT * from new_student";

if ($result44 = mysqli_query($conn, $sql44)) {

    // Return the number of rows in result set
    $rowcount44 = mysqli_num_rows( $result44);
    
    // Display result
    echo $rowcount44;
 }?>}}],
    },
    title: {
      display: true,
      text: "Number of student from every Baranggay"
    }
  }
});
</script>

<script>

<?php
 $sql44 = "SELECT * from new_student";

 if ($result44 = mysqli_query($conn, $sql44)) {
 
     // Return the number of rows in result set
     $rowcount44 = mysqli_num_rows( $result44);
     
     // Display result
     $GLOBALS['total']= $rowcount44;
  }
 $sql11 = "SELECT * from new_student where school='BES'";

if ($result11 = mysqli_query($conn, $sql11)) {

    // Return the number of rows in result set
    $rowcount11 = mysqli_num_rows( $result11 );
    
    // Display result
    $GLOBALS['1']= $rowcount11;
 }

 $sql22 = "SELECT * from new_student where school='GES'";

 if ($result22 = mysqli_query($conn, $sql22)) {
 
     // Return the number of rows in result set
     $rowcount22 = mysqli_num_rows( $result22 );
     
     // Display result
     $GLOBALS['2']= $rowcount22;
  }

  $sql33 = "SELECT * from new_student where school='SCES'";

  if ($result33 = mysqli_query($conn, $sql33)) {
  
      // Return the number of rows in result set
      $rowcount33 = mysqli_num_rows( $result33 );
      
      // Display result
      $GLOBALS['3']= $rowcount33;
   }
 
 ?>
    // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart1");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["BES", "GES", "SCES"],
    datasets: [{
      data: [<?php echo $GLOBALS['1'].",".$GLOBALS['2'].",".$GLOBALS['3'];?>],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
</script>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>