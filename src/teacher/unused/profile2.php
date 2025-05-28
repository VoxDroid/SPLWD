<!DOCTYPE html>
<html lang="en">

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

<body id="page-top">

<?php include('nav.php');?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    
                    <div class=" ">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row">

                                <?php
            include('../connect.php');
            $id = 1;
$sqlget = "SELECT * FROM teachers where id=$id";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());

while ($row = mysqli_fetch_assoc($sqldata)) {

?>
            <div class="card p-5 col-md-5" style="width: 20rem;" >
              <img src="../img/" onerror=this.src="../img/<?php echo $row['img'];?>" alt="" id="thumb" class="rounded-circle img-thumbnail" width="400">
                <div class="card-body">
                <form action="update_profile.php"  method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-8">

                <label for="fileToUpload1" class="btn btn-primary" style="font-size:13px; ">Select Image</label>
               
                <input type="file"   style="visibility:hidden;" name="fileToUpload1"  id="fileToUpload1" onchange="preview()"> 
                </div>

                <div class="col-md-4"> <input type="submit" value="update"></div>
                </div>
                </form>
                 <h5 class="card-title">Fullname: <?php echo $row['fname']." ".$row['lname'];?></h5>
                 <h5 class="card-title">Employee ID: <?php echo $row['teacher_id'];?></h5>
             
                
                 
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-6 p-5">
              <form>

          
  <table class="text-right table">



    <tr>
      <td> <b>Email : </b> </td>
      <td><input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="<?php echo $row['email'];?>" readonly="readonly"></td>
    </tr>

    <tr>
      <td> <b>Contact : </b> </td>
      <td ><input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="contact_no" placeholder="<?php echo $row['contact_no'];?>" readonly="readonly"></td>
    </tr>

    <tr>
      <td> <b>Address : </b> </td>
      <td><input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="address" placeholder="<?php echo $row['address'];?>" readonly="readonly"></td>
    </tr>

  

    <tr>
      <td> <b>Birth Date : </b> </td>
      <td><input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="birt_date" placeholder="<?php echo $row['birth_date'];?>" readonly="readonly"></td>
    </tr>
  </table>
                                        
                     

                          <button class="button btn-secondary float-right" type="button"  data-toggle="modal" data-target="#myModal">Update Profile</button>
                            
                            
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
      <table class="text-right">
      <tr>
      <td> <b>First Name : </b> </td>
      <td><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="fname" value="<?php echo $row['fname'];?>" ></td>
    </tr>
    <tr>
      <td> <b>Last Name : </b> </td>
      <td><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="lname" value="<?php echo $row['lname'];?>" ></td>
    </tr>
    <tr>
      <td> <b>Middle Name : </b> </td>
      <td><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="mname" value="<?php echo $row['mname'];?>" ></td>
    </tr>
    <tr>
      <td> <b>Email : </b> </td>
      <td><input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?php echo $row['email'];?>" ></td>
    </tr>

    <tr>
      <td> <b>Contact : </b> </td>
      <td ><input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="contact_no" value="<?php echo $row['contact_no'];?>" ></td>
    </tr>

    <tr>
      <td> <b>Address : </b> </td>
      <td><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="address" value="<?php echo $row['address'];?>" ></td>
    </tr>

  

    <tr>
      <td> <b>Birth Date : </b> </td>
      <td><input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="birth_date" value="<?php echo $row['birth_date'];?>" ></td>
    </tr>
  </table>
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