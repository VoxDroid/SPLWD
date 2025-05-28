<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Forgot Password</title>

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
                                        <h1 class="h4 text-gray-900 mb-2">You're OTP is Verified!</h1>
                                        <p class="mb-4">You can now reset your password!</p>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="password" name="pass1" class="form-control form-control-user mb-3"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter new Password">
                                                <input type="password" name="pass2" class="form-control form-control-user mb-3"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Confirm password">
                                        </div>
                                        <input type="submit" name="submit" value="Verify" class="btn btn-primary btn-user btn-block">
                                            
                                        
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="signup.php">Create an Account!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="index.php">Already have an account? Login!</a>
                                    </div>
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

<?php
include('connect.php');
    if(isset($_POST["submit"])){

		
        $pass = $_POST["pass1"];
		$psw2 = $_POST["pass2"];
        $Email = $_SESSION['email'];
      

		if($pass == $psw2){

			$sql = mysqli_query($conn, "SELECT * FROM teachers WHERE email='$Email'");
			$query = mysqli_num_rows($sql);
			  $fetch = mysqli_fetch_assoc($sql);
	
			if($Email){
				
				
				$hashed_pass=password_hash($pass,PASSWORD_DEFAULT);
				mysqli_query($conn, "UPDATE teachers SET password = '$hashed_pass' WHERE email='$Email'");
				?>
				<script>
					alert("<?php echo "Your password reset is succesful"?>");
					window.location.replace("index.php");
					
				</script>
				<?php
			}else{
				?>
				<script>
					alert("<?php echo "Please try again"?>");
				</script>
				<?php
			}
		}
		else{
			?>
				<script>
					alert("<?php echo "Passwords did not match!"?>");
				</script>
				<?php
		}

    }

?>
</html>