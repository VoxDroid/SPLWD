<?php include('../session.php');?>
<!DOCTYPE html>
<html lang="en" >

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profile</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>
<style>




  .footer {
  position: fixed;
left: 1;
  bottom: 0;
  width: 100%;

  text-align: center;
}
</style>

<body style="background-color: black;">

<?php include('nav.php');?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0" style="color:black;"><strong>Teacher's Profile</strong></h1>
                    </div>

                    
                    <div class=" ">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row">
                                     

                                <?php
            include('../connect.php');
            $id = $_SESSION['logged_id'];
$sqlget = "SELECT * FROM teachers where id=$id";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());

while ($row = mysqli_fetch_assoc($sqldata)) {

?>

<div class="card col-md-12 col-xl-3">
<p style="color:black;" style="font-size:18px;"><strong> Employee ID : </strong><?php echo $row['teacher_id'];?> </p>
<p style="color:black;" style="font-size:18px;"><strong>Fullname : </strong><?php echo $row['fname']." ".$row['lname'];?></p>
  <img class="card-img-top" src="../img/<?php echo $row['img'];?>" onerror=this.src="../img/th.jfif" id="thumb" alt="Card image cap" style="max-height: 250px;">
  <div class="card-body">
  <form action="update_profile.php"  method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-8">

                <label for="fileToUpload1" class="btn btn-primary" style="font-size:13px; ">Select Image</label>
               
                <input type="file"   style="visibility:hidden;" name="fileToUpload1"  id="fileToUpload1" onchange="preview()"> 
                </div>

                <div class="col-md-4"> <input  type="submit" class="btn btn-secondary" style="font-size:13px;" value=" Update "></div>
                </div>
                </form>
                
            
               
   
  </div>
</div>
        
            <div class="col-md-12 col-xl-5 p-5">
              <form>





    
      <div style="font-size:18px;" class="mb-2 mt-2"> <b>Email : </b> </div>
      <div><input style="color:black;" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="<?php echo $row['email'];?>" readonly="readonly"></div>
    

    
      <div style="font-size:18px;"  class="mb-2 mt-2"> <b>Contact : </b> </div>
      <div ><input style="color:black;" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="contact_no" placeholder="<?php echo $row['contact_no'];?>" readonly="readonly"></div>
    

    
      <div style="font-size:18px;"  class="mb-2 mt-2"> <b>Address : </b> </div>
      <div><input style="color:black;" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="address" placeholder="<?php echo $row['address'];?>" readonly="readonly"></div>
    

  

    
      <div style="font-size:18px;"  class="mb-2 mt-2"> <b>Birth Date : </b> </div>
      <div><input style="color:black;" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="birt_date" placeholder="<?php echo $row['birth_date'];?>" readonly="readonly"></div>
    

                                        
                     

                          <button class="button btn btn-secondary float-right mt-3" type="button"  data-toggle="modal" data-target="#myModal">Update Profile</button>
                            
                            
                          </form>
                          <div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Info</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="update_teacher.php" method="POST">
  
      
      <div> <b>First Name : </b> </div>
      <div><input style="color:black;" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="fname" value="<?php echo $row['fname'];?>" ></div>
    
    
      <div> <b>Last Name : </b> </div>
      <div><input style="color:black;" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="lname" value="<?php echo $row['lname'];?>" ></div>
    
    
      <div> <b>Middle Name : </b> </div>
      <div><input style="color:black;" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="mname" value="<?php echo $row['mname'];?>" ></div>
    
    
      <div> <b>Email : </b> </div>
      <div><input style="color:black;" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?php echo $row['email'];?>" ></div>
    

    
      <div> <b>Contact : </b> </div>
      <div ><input style="color:black;" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="contact_no" value="<?php echo $row['contact_no'];?>" ></div>
    

    
      <div> <b>Address : </b> </div>
      <div><input style="color:black;" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="address" value="<?php echo $row['address'];?>" ></div>
    

  

    
      <div> <b>Birth Date : </b> </div>
      <div><input style="color:black;" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="birth_date" value="<?php echo $row['birth_date'];?>" ></div>
    

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-primary" >Update</button>
      </div>
      </form>

    </div>
  </div>
</div>


                          <?php } ?>
                          </div>
                          <div class="col-md-12 col-xl-3">
                                  <!-- Earnings (Monthly) Card Example -->
                        <div class=" col-md-12 mb-4">
                            <div class="card border-left-primary shadow h-40 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-small font-weight-bold text-primary text-uppercase mb-2 mt-2">
                                                Number of Students Handle</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                            $id=$_SESSION['teacher_id'];
                                            $sql = "SELECT * from new_student where teacher_id = $id";

if ($result = mysqli_query($conn, $sql)) {

    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );
    
    // Display result
    printf( $rowcount);
 }?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                                                  <!-- Earnings (Monthly) Card Example -->
                                                  <div class=" col-md-12 mb-4">
                            <div class="card border-left-primary shadow h-40 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-small font-weight-bold text-primary text-uppercase mb-2 mt-2">
                                                Number of Filess Uploaded</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php $id1=$_SESSION['teacher_id']; $sql = "SELECT * from student_files where teacher_id = $id1";

if ($result = mysqli_query($conn, $sql)) {

    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );
    
    // Display result
    printf( $rowcount);
 }?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                               <!-- Earnings (Monthly) Card Example -->
                                                  <!-- Earnings (Monthly) Card Example -->
                                                  <div class=" col-md-12 mb-4">
                            <div class="card border-left-primary shadow h-40 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-small font-weight-bold text-primary text-uppercase mb-2 mt-2">
                                                Activity log</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">                    <?php
	include('../connect.php');
	
    $iiid=$_SESSION['teacher_id'];
  
$sqlget1 = "SELECT * FROM log where teacher_id =  $iiid and action_type != 'Log in' order by log_id desc";
$sqldata1 = mysqli_query($conn, $sqlget1) or die('Error Displaying Data'. mysqli_connect_error());

while ($row2 = mysqli_fetch_assoc($sqldata1)) {

    echo  $row2['action_type'];
    break;  
}


		
?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        </div>

                      
                        </div>



                     
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
       
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
function preview() {
   thumb.src=URL.createObjectURL(event.target.files[0]);
}
</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
if(isset($_GET['update_profile'])){

  echo "<script>swal('Profile  updated', 'Your profile is successfully updated', 'success');</script>";

}

if(isset($_GET['update_image1'])){

    echo "<script>swal('Profile picture  updated', 'Your profile picture is successfully updated', 'success');</script>";
  
  }

  if(isset($_GET['update_image'])){

    echo "<script>swal('Upload Successfull', 'files successfully uploaded', 'success');</script>";
  
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