<?php include('../session.php');?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Progress Report</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Progress Report</h1>
                    </div>

                    <div class=" ">
                            <div class="card  shadow h-100 py-2">
                                <div class="card-body">
                                <table id="example" class="table table-striped table-bordered" style="width:100%; text-align:center;">

<thead>
                                        <tr>
                                        <th style="color:black; text-align:center;">LRN</th>
                                        <th style="color:black; text-align:center;">Student Name</th>
                                        <th style="color:black; text-align:center;">Address</th>
                                        <th style="color:black; text-align:center;">Age</th>
                                        <th style="color:black; text-align:center;">School</th>
                                        <th style="color:black; text-align:center;">Action</th>
                                        </tr>
</thead>
<tbody>

                    <?php
	include('../connect.php');



  $sqlgetlrn = "SELECT distinct  lrn,folder_id from folder order by folder_id desc";
  $sqldatalrn = mysqli_query($conn, $sqlgetlrn) or die('Error Displaying Data'. mysqli_connect_error());
  
  while ($row3 = mysqli_fetch_assoc($sqldatalrn)) {
	
    
  $sch =$_SESSION['school'];
  $lrn = $row3['lrn'];
$sqlget1 = "SELECT * FROM new_student where enroll_status='enrolled' and school = '$sch' and lrn = $lrn";
$sqldata1 = mysqli_query($conn, $sqlget1) or die('Error Displaying Data'. mysqli_connect_error());

while ($row2 = mysqli_fetch_assoc($sqldata1)) {


		
?>

	<tr>
        <td><?php echo $row2['lrn'];?></td>
        <td><?php echo $row2['fname']." ".$row2['lname'];?></td>
        <td><?php echo $row2['address'];?> <?php echo $row3['folder_id'];?></td>
        <td><?php
$date = date_create($row2['birth_date']);
$interval = $date->diff(new DateTime);
echo $interval->y;
?></td>
        <td><?php echo $row2['school'];?></td>
        <td><a type="button" data-toggle="modal" data-target="#a<?php echo $row3['folder_id'];?>"  class="btn btn-success" >View Progress Report</a></td>
       

        
    </tr>




       
    
  
<?php
	

}
  }


?>
<tbody>

<tfoot>
<tr>
                                        <th style="color:black; text-align:center;">LRN</th>
                                        <th style="color:black; text-align:center;">Student Name</th>
                                        <th style="color:black; text-align:center;">Address</th>
                                        <th style="color:black; text-align:center;">Age</th>
                                        <th style="color:black; text-align:center;">School</th>
                                        <th style="color:black; text-align:center;">Action</th>
                                        </tr>

</tfoot>
	</table>
</div>
</div>
</div>


<?php
	include('../connect.php');



  $sqlmodal = "SELECT distinct  lrn,folder_id from folder order by folder_id desc";
  $sqldatamodal = mysqli_query($conn, $sqlmodal) or die('Error Displaying Data'. mysqli_connect_error());
  
  while ($rowmodal = mysqli_fetch_assoc($sqldatamodal)) {
	
    
  $sch =$_SESSION['school'];
  $lrn = $rowmodal['lrn'];
$sqlgetstu = "SELECT * FROM new_student where enroll_status='enrolled' and school = '$sch' and lrn = $lrn";
$sqldatastu = mysqli_query($conn, $sqlgetstu) or die('Error Displaying Data'. mysqli_connect_error());

while ($rowstu = mysqli_fetch_assoc($sqldatastu)) {

  $folder_id = $rowmodal['folder_id'];

 
		
?>

 <!-- Modal -->
 <div class="modal fade" id="a<?php echo $rowmodal['folder_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Progress report of </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" align="right">

      <div><a class="btn btn-success float-right m-2" href="printprogress.php?lrn=<?php  echo $lrn; ?>&folder_id=<?php echo $folder_id; ?>" target="_blank"> <i class="fas fa-print"></i> Print</a></div><br><br>

      <?php include('aaold.php');?>

      

   
      </div>
    
    </div>
  </div>
</div>




       
    
  
<?php
	

}
  }


?>



                     
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