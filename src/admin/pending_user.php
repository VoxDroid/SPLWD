<?php include('../session.php');?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pending Users</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

<?php include('nav.php');?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Pending Users</h1>
                    </div>

                    <div class=" ">
                            <div class="card  shadow h-100 py-2">
                                <div class="card-body">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <tr>
                                        <th>Teacher ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>School</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                     
                                        
                                        </tr>
                                        

                    <?php
	include('../connect.php');
	
    
  $school=$_SESSION['school'];
$sqlget1 = "SELECT * FROM teachers where status='pending' and school = '$school'";
$sqldata1 = mysqli_query($conn, $sqlget1) or die('Error Displaying Data'. mysqli_connect_error());

while ($row2 = mysqli_fetch_assoc($sqldata1)) {


		
?>

	<tr>
        <td><?php echo $row2['teacher_id'];?></td>
        <td><?php echo $row2['fname'];?></td>
        <td><?php echo $row2['lname'];?></td>
        <td><?php echo $row2['school'];?></td>
        <td><a type="button" data-toggle="modal" data-target="#e<?php echo $row2['id'];?>" href="update_status.php?id=<?php echo $row2['id'];?>" class="btn btn-danger" >Decline</a></td>
        <td><a type="button" data-toggle="modal" data-target="#a<?php echo $row2['id'];?>" href="update_status.php?id1=<?php echo $row2['id'];?>" class="btn btn-success" >Approve</a></td>
        
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
	</table>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
if(isset($_GET['id'])){

  echo "<script>swal('User Account Declined', 'The selected Account has been declined!', 'warning');</script>";

}

if(isset($_GET['id1'])){

    echo "<script>swal('Account has been approved', 'The selected Account has been approved', 'success');</script>";
  
  }
?>

</html>