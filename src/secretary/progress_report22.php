<?php include('../session.php');?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Log History</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">


    <!-- Custom styles for this template-->
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

<?php include('nav.php');?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Student list</h1>
                    </div>

                    <div class=" ">
                            <div class="card  shadow h-100 py-2">
                                <div class="card-body">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
                                        <tr>
                                        <th>LRN</th>
                                        <th>Name</th>
                                        <th>School</th>
                                        <th>Category</th>
                                        <th>Age</th>
                                        <th>Progress Report</th>
                                     
                                        
                                        </tr>
</thead>
<tbody>
                                        

                    <?php
	include('../connect.php');
	

  
$sqlget1 = "SELECT distinct lrn,folder_id from folder";
$sqldata1 = mysqli_query($conn, $sqlget1) or die('Error Displaying Data'. mysqli_connect_error());

while ($row3 = mysqli_fetch_assoc($sqldata1)) {

  $lrn = $row3['lrn'];
  $sch =$_SESSION['school'];
  $sqlgetlrn = "SELECT * from new_student where lrn = $lrn and school = '$sch' ";
  $sqldatalrn = mysqli_query($conn, $sqlgetlrn) or die('Error Displaying Data'. mysqli_connect_error());
  
  while ($row2 = mysqli_fetch_assoc($sqldatalrn)) {
   


		
?>

	<tr>
  <td><?php echo $row2['lrn'];?></td>
        <td><?php echo $row2['fname']." ".$row2['mname']." ".$row2['lname']?></td>
       
        <td><?php echo $row2['school'];?></td>
       
        <td><?php echo $row2['category'];?></td>
        <td><?php
$date = date_create($row2['birth_date']);
$interval = $date->diff(new DateTime);
echo $interval->y;
?></td>

        <td><a type="button" data-toggle="modal" data-target="#a<?php echo $row3['folder_id'];?>"  class="btn btn-success" >View Progress Report</a></td>
        
    </tr>

<?php

}

}


?>
<tbody>

<tfoot>
                                        <tr>
                                        <th>Teacher ID</th>
                                        <th>Action Type</th>
                                        <th>Detail</th>
                                        
                                        <th>Student</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                     
                                        
                                        </tr>
</tfoot>
	</table>

  
  <?php
	include('../connect.php');
	

  
$sqlget5 = "SELECT distinct lrn,folder_id from folder";
$sqldata5 = mysqli_query($conn, $sqlget5) or die('Error Displaying Data'. mysqli_connect_error());

while ($rowmodal = mysqli_fetch_assoc($sqldata5)) {

  ?>

<!-- Modal -->
<div class="modal fade" id="a<?php echo $rowmodal['folder_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php $folder_id =  $rowmodal['folder_id'];
              $lrn =$rowmodal['lrn'];

              include('aa.php');
         ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?php } ?>



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
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
  $(document).ready(function () {
    $('#example').DataTable();
});
</script>

<?php
if(isset($_GET['id'])){

  echo "<script>swal('User Account Declined', 'The selected Account has been declined!', 'warning');</script>";

}

if(isset($_GET['id1'])){

    echo "<script>swal('Account has been approved', 'The selected Account has been approved', 'success');</script>";
  
  }
?>

</html>