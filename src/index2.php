<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row p-5">
                            <div class="col-lg-6 d-none d-lg-block"><img src="img/SC.jfif" class="img-fluid" alt=""></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="te" name="user" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="pass" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                           
                                        </div>
                                        <input type="submit" name="login" value="submit"  class="btn btn-primary btn-user btn-block">
                                         
                                     
                                     
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot_password.php">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="signup.php">Create an Account!</a>
                                    </div>
                                    <?php  
if (isset($_POST['login'])) {
      # code...
      
    include('connect.php');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
     
          $sqlget2 = "SELECT * FROM new_student where lrn = '$username'";
          $sqldata2 = mysqli_query($conn, $sqlget2) or die('Error Displaying Data'. mysqli_connect_error());

          while ($row2 = mysqli_fetch_assoc($sqldata2)) {

            if (password_verify($password,$row2['password'])) {
                print "Logged in";
                $_SESSION['logged_in']=$row2['lrn'];
                $_SESSION['id']=$row2['lrn'];
                $_SESSION['logged_id']=$row2['student_code'];
                $id=$_SESSION['id'];
                $_SESSION['color']='bg-info';
                header("Location: parent/student_file.php?id=$id");
            }

            else{

             echo 'error';
            }



          }
        
       
         
          
        
        }  
     

    
?>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
if(isset($_GET['pending'])){

  echo "<script>swal('Pending User Account', 'Your Account status is still pending wait for the admin to approve your account', 'info');</script>";

}

if(isset($_GET['invalid'])){

    echo "<script>swal('Invalid username or password!', 'Please check your username or password or might be CAPSLOCK is enable', 'error');</script>";
  
  }
?>


</html>