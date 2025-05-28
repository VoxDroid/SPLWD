<?php include('../session.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Change Password</title>

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
                    <div class="d-sm-flex align-items-center  mb-4">
                     
                        <h1 class="h3 mb-0 text-gray-800">Change Password</h1>
                    </div>
    <!-- Button trigger modal -->
                        <div class="col-md-12 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                <form action="change_pass.php" onSubmit="return checkPassword(this)" method="POST">
                                    <div class="row no-gutters">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-3">
                                        <img class="img-fluid rounded-circle" src="../img/sc22.jpg" alt="">

                                        </div>
                                        <div class='col-md-4 p-5'>
                                            <p>Password</p>
                                        
                                     <input type="password" name="password" class="form-control">
                                     <p>Confirm Password</p>
                                     <input type="password" name="confirmPassword" class="form-control">
                                        <div><input type="submit" name="submit" class="btn btn-primary float-right mt-5" value="Change Password"></div>
                                     
                                        </div>
                                    </div>
                                    </form>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
      function showname () {
      var name = document.getElementById('uploadPDF1'); 
      const input =document.getElementById('uploadPDF1');
      let text=(name.files.item(0).name);
      const f = text.split(".");

      
      if(f[1] != 'pdf'){
        swal("Please Select PDF file only!",{ icon: "warning"});
      input.value="";
      }
     
    };
 </script>

<script>
      function showname1 () {
      var name = document.getElementById('uploadPDF2'); 
      const input =document.getElementById('uploadPDF2');
      let text=(name.files.item(0).name);
      const f = text.split(".");

      
      if(f[1] != 'pdf'){
        swal("Please Select PDF file only!",{ icon: "warning"});
      input.value="";
      }
     
    };
 </script>

<script>
      function showname2 () {
      var name = document.getElementById('uploadPDF3'); 
      const input =document.getElementById('uploadPDF3');
      let text=(name.files.item(0).name);
      const f = text.split(".");

      
      if(f[1] != 'pdf'){
        swal("Please Select PDF file only!",{ icon: "warning"});
      input.value="";
      }
     
    };
 </script>

<script>
      function showname3 () {
      var name = document.getElementById('uploadPDF4'); 
      const input =document.getElementById('uploadPDF4');
      let text=(name.files.item(0).name);
      const f = text.split(".");

      
      if(f[1] != 'pdf'){
        swal("Please Select PDF file only!",{ icon: "warning"});
      input.value="";
      }
     
    };
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
    <script>
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script>
  // 👇 pass the form into the function as a parameter
  function checkPassword(form) {
    // 👇 get passwords from the field using their name attribute
    const password = form.password.value;
    const confirmPassword = form.confirmPassword.value;

    // 👇 check if both match using if-else condition
    if (password != confirmPassword) {
     swal('Password not Match', 'Password not Match! double check your password', 'warning');
      return false;
    } else {
      
    }
  }
</script>
<?php
if(isset($_GET['add'])){

  echo "<script>swal('Add Observation Successful', 'The Observation added successfuly', 'success');</script>";

}
?>



</body>

</html>