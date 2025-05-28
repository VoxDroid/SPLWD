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
    <h2 class="h3 mb-0 text-gray-800"><strong>Students of District</strong></h2>
</div>

<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle mb-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Table View
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="folders.php">Folder View</a>
  
  </div>
</div>






<div class="row">

<div class="col-md-12">

<table id="example111" class="table"  style="width:100%;">
<thead>
                    <tr>
                      <th style="color:black;">LRN</th>
                    <th style="color:black;">Student Name</th>
                    <th style="color:black;">Age</th>
                    <th style="color:black;">Teacher</th>
                    
                    <th style="color:black;">School</th>
                    <th style="color:black;">Status</th>
                    <th style="color:black;">Action</th>
                
                 
                    
                    </tr>
</thead>
<tbody>


<?php
include('../connect.php');


$sqlget1 = "SELECT * FROM new_student ";
$sqldata1 = mysqli_query($conn, $sqlget1) or die('Error Displaying Data'. mysqli_connect_error());

while ($row3 = mysqli_fetch_assoc($sqldata1)) {

?>

<tr>
<td style="color:black;"><?php echo $row3['lrn'];?></td>
<td style="color:black;"><?php echo $row3['fname']." ".$row3['lname'];?></td>
<td style="color:black;"><?php
$date = date_create($row3['birth_date']);
$interval = $date->diff(new DateTime);
echo $interval->y;
?></td>

<td style="color:black;"> <?php
           include('../connect.php');
           $id = $row3['teacher_id'];
$sqlget = "SELECT * FROM teachers where teacher_id=$id";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());

while ($row = mysqli_fetch_assoc($sqldata)) echo $row['fname']." ".$row['lname']; { ?>



<?php }?></td>
<td style="color:black;"><?php echo $row3['school'];?></td>
<td style="color:black;"><?php echo $row3['enroll_status'];?></td>

<td style="color:black;"><a class="btn btn-success" href="student_file_folder.php?id=<?php echo $row3['lrn'];?>">View</a></td>
 

</tr>
<?php }?>






</tbody>

<tfoot>
                    <tr>
                      <th style="color:black;">LRN</th>
                    <th style="color:black;">Student Name</th>
                    <th style="color:black;">Age</th>
                    <th style="color:black;">Teacher</th>
                    
                    <th style="color:black;">School</th>
                    <th style="color:black;">Status</th>
                    <th style="color:black;">Action</th>
             
                 
                    
                    </tr>
</tfoot>
</table>
</div>
</div>

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    
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
    $('#example111').DataTable();
});
</script>

<script>
  $(document).ready(function () {
    $('#example222').DataTable();
});
</script>

<script>
  $(document).ready(function () {
    $('#example333').DataTable();
});
</script>

<script>
  $(document).ready(function () {
    $('#example444').DataTable();
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