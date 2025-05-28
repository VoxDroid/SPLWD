<?php include('../session.php');?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Folders</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>
<style>
  select.selectList { width: 35px; }
</style>
<style>
  .footer {
  position: fixed;
left: 1;
  bottom: 0;
  width: 100%;

  text-align: center;
}
</style>

<body id="page-top">

<?php include('nav.php');?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h2 class="h3 mb-0 text-gray-800"><strong>Student Folders of <?php echo $_SESSION['school'];?></strong></h2>
                    </div>
 
  

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
      aria-selected="true">Enrolled</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="progress-tab" data-toggle="tab" href="#iep" role="tab" aria-controls="progress"
      aria-selected="false">Main Streamed</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="progress-tab" data-toggle="tab" href="#progress" role="tab" aria-controls="progress"
      aria-selected="false">Graduated</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
      aria-selected="false">Transferred</a>
  </li>

 


</ul>
 <!-- tab items close-->

 <!-- tab content-->
<div class="tab-content" align="center"id="myTabContent">

<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="progress-tab">
<h3 class= "m-4" style="color:black; font-weight:bold;">Transferred Students</h3>
  <div class="row">
   
  <?php
include('../connect.php');

$school =$_SESSION['school'];
$sqlget1 = "SELECT * FROM new_student where school= '$school' and enroll_status = 'Transferred'";
$sqldata1 = mysqli_query($conn, $sqlget1) or die('Error Displaying Data'. mysqli_connect_error());

while ($row3 = mysqli_fetch_assoc($sqldata1)) {

?>
<div class="col-md-2" style="color:black;" align="center">
  <?php 

$name =$row3['fname']; 
echo $name[0].". ".$row3['lname'];?>
<a href="student_file_folder.php?id=<?php echo $row3['lrn'];?>"> <img class="img-fluid" src="../img/folder.png" alt=""></a>
 
</div>
<?php }?>
  </div>


</div>

<div class="tab-pane fade" id="progress" role="tabpanel" aria-labelledby="progress-tab">
<h3 class= "m-4" style="color:black; font-weight:bold;">Graduated Students</h3>
  <div class="row">

  

  <?php
include('../connect.php');

$school =$_SESSION['school'];
$sqlget1 = "SELECT * FROM new_student where school= '$school' and enroll_status = 'Graduated'";
$sqldata1 = mysqli_query($conn, $sqlget1) or die('Error Displaying Data'. mysqli_connect_error());

while ($row3 = mysqli_fetch_assoc($sqldata1)) {

?>
<div class="col-md-2" style="color:black;" align="center">
  <?php 
  
  $name =$row3['fname']; 
  echo $name[0].". ".$row3['lname'];?>
  <a href="student_file_folder.php?id=<?php echo $row3['lrn'];?>"> <img class="img-fluid" src="../img/folder.png" alt=""></a>
 
</div>
<?php }?>

  </div>
</div>


 <!-- forms -->
 <div class="tab-pane fade" id="iep" role="tabpanel" aria-labelledby="progress-tab">
 <h3 class= "m-4" style="color:black; font-weight:bold;">Main Streamed Students</h3>
<div class="row">



<?php
include('../connect.php');

$school =$_SESSION['school'];
$sqlget1 = "SELECT * FROM new_student where school= '$school' and enroll_status = 'Main Streamed'";
$sqldata1 = mysqli_query($conn, $sqlget1) or die('Error Displaying Data'. mysqli_connect_error());

while ($row3 = mysqli_fetch_assoc($sqldata1)) {

?>
<div class="col-md-2" style="color:black;" align="center">
  <?php 

$name =$row3['fname']; 
echo $name[0].". ".$row3['lname'];?>
<a href="student_file_folder.php?id=<?php echo $row3['lrn'];?>"> <img class="img-fluid" src="../img/folder.png" alt=""></a>
 
</div>
<?php }?>

</div>

 </div>

 <!-- enrolled -->

 <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="progress-tab">
 <h3 class= "m-4" style="color:black; font-weight:bold;">Enrolled Students</h3>
  <div class="row">

  
  <?php
include('../connect.php');

$school =$_SESSION['school'];
$sqlget1 = "SELECT * FROM new_student where school= '$school' and enroll_status = 'Enrolled'";
$sqldata1 = mysqli_query($conn, $sqlget1) or die('Error Displaying Data'. mysqli_connect_error());

while ($row3 = mysqli_fetch_assoc($sqldata1)) {

?>
<div class="col-md-2" style="color:black;" align="center">
  <?php 

$name =$row3['fname']; 
echo $name[0].". ".$row3['lname'];?>
<a href="student_file_folder.php?id=<?php echo $row3['lrn'];?>"> <img class="img-fluid" src="../img/folder.png" alt=""></a>
 
</div>
<?php }?>
  </div>
 </div>

</div>

<!-- enrolled -->



                   






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
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
if(isset($_GET['id'])){

  echo "<script>swal('New Student Added', 'New Student successfuly Added', 'success');</script>";

}
?>



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