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
                            <div class="col-lg-6 d-none d-lg-block"><img src="img/SC2.png" class="img-fluid" alt=""></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="te" name="user" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Email...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="pass" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                           
                                        </div>
                                        <input type="submit" name="login" value="Submit"  class="btn btn-primary btn-user btn-block">
                                         
                                     
                                     
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
    date_default_timezone_set('Asia/Manila');
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($conn, $username);  
        $password = mysqli_real_escape_string($conn, $password);  

  
        $sqlget2 = "SELECT * FROM new_student where lrn = '$username'";
          $sqldata2 = mysqli_query($conn, $sqlget2) or die('Error Displaying Data'. mysqli_connect_error());

          while ($row2 = mysqli_fetch_assoc($sqldata2)) {

            if (password_verify($password,$row2['password'])) {
                print "Logged in";
                $_SESSION['logged_in']=$row2['lrn'];
                $_SESSION['id']=$row2['lrn'];
                $_SESSION['guardian']=$row2['guardian'];
                $id=$_SESSION['id'];
                $_SESSION['color']='bg-info';
                $_SESSION['folder_id']= "";

           
$sqlgetobs = "SELECT * FROM folder where lrn = $username order by folder_id desc";
$sqldataobs = mysqli_query($conn, $sqlgetobs) or die('Error Displaying Data'. mysqli_connect_error());

while ($rowobs = mysqli_fetch_assoc($sqldataobs)) {
    $_SESSION['folder_id']= $rowobs['folder_id'];
    break;


}



    header("Location: parent/change.php");





              
            }

            else{

              exit();
            }
        }
        
       
          $sqlget = "SELECT * FROM teachers where BINARY email = BINARY '$username'";
          $sqldata1 = mysqli_query($conn, $sqlget) or die(header('location:index.php?invalid=1'));

          while ($row1 = mysqli_fetch_assoc($sqldata1)) {


            if(password_verify($password,$row1['password']) && $username=="admin" ){
                $_SESSION['admin']=$username;
                $_SESSION['logged_in']=$username;
                $_SESSION['logged_id']=$row1['id'];
                $_SESSION['color']='bg-info';
                $id=$_SESSION['logged_id'];
                header("Location: district_admin/dashboard.php?id=$id");

            }

            else if (password_verify($password,$row1['password']) && $row1['status']=='approve' && $row1['category']==2) {
                print "Logged in";
                $_SESSION['logged_in']=$row1['fname'];
                $_SESSION['teacher_id']=$row1['teacher_id'];
                $_SESSION['img']=$row1['img'];
                $_SESSION['logged_id']=$row1['id'];
                $id=$_SESSION['logged_id'];
                $_SESSION['school']=$row1['school'];
                $_SESSION['color']='bg-info';

                $date = date('Y-m-d h:i:sa');
                $sql123="INSERT INTO `log` (`log_id`, `date`, `teacher_id`, `action_type`, `details`, `previous`, `updated`, `student_id`, `status`, `school`) VALUES (NULL, '".$date."', '".$row1['teacher_id']."', 'Log in', 'Log in to the system', '', '', '', '','".$row1['school']."');";
                if ($conn->query($sql123) === TRUE) {
                
                    }
                
                header("Location: principal/dashboard.php?id=$id");
            }

            else if (password_verify($password,$row1['password']) && $row1['status']=='approve' && $row1['category']==3) {
                print "Logged in";
                $_SESSION['logged_in']=$row1['fname'];
                $_SESSION['teacher_id']=$row1['teacher_id'];
                $_SESSION['img']=$row1['img'];
                $_SESSION['logged_id']=$row1['id'];
                $id=$_SESSION['logged_id'];
                $_SESSION['school']=$row1['school'];
                $_SESSION['color']='bg-info';

                $date = date('Y-m-d h:i:sa');
                $sql123="INSERT INTO `log` (`log_id`, `date`, `teacher_id`, `action_type`, `details`, `previous`, `updated`, `student_id`, `status`, `school`) VALUES (NULL, '".$date."', '".$row1['teacher_id']."', 'Log in', 'Log in to the system', '', '', '', '','".$row1['school']."');";
                if ($conn->query($sql123) === TRUE) {
                
                    }
                header("Location: secretary/dashboard.php?id=$id");
            }

            else if (password_verify($password,$row1['password']) && $row1['status']=='approve' && $row1['category']==4) {
                print "Logged in";
                $_SESSION['logged_in']=$row1['fname'];
                $_SESSION['teacher_id']=$row1['teacher_id'];
                $_SESSION['img']=$row1['img'];
                $_SESSION['logged_id']=$row1['id'];
                $id=$_SESSION['logged_id'];
                $_SESSION['school']=$row1['school'];
                $_SESSION['color']='bg-info';

                $date = date('Y-m-d h:i:sa');
                $sql123="INSERT INTO `log` (`log_id`, `date`, `teacher_id`, `action_type`, `details`, `previous`, `updated`, `student_id`, `status`, `school`) VALUES (NULL, '".$date."', '".$row1['teacher_id']."', 'Log in', 'Log in to the system', '', '', '', '','".$row1['school']."');";
                if ($conn->query($sql123) === TRUE) {
                
                    }
                header("Location: teacher/profile.php?id=$id");
            }

         

              else {
         
                if($row1['status']=='approve'){
                   header('location:index.php?invalid=1');

                }
                else{
                    echo "pending";
                    header('location:index.php?pending=1');
                }
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

    echo "<script>swal('Invalid username or password!', 'Please check your username or password', 'error');</script>";
  
  }
?>


</html>