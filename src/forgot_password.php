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
                                        <h1 class="h4 text-gray-900 mb-2">Reset Password</h1>
                                        <p class="mb-4">You may now reset your password</p>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <input type="submit" name="confirm_email" value="Send OTP" class="btn btn-primary btn-user btn-block">
                                            
                                        
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
        if (isset($_POST['confirm_email'])) {
            $email = $_POST['email'];

            $sql = "SELECT * FROM teachers WHERE email = '$email'";

            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
           
            if ($row) {
				?>
				echo '<script>window.location="otp_verification.php"</script>';
				<script>
                alert("<?php echo 'OTP sent to your email'?>");
            	</script>
				
            </script>
			<?php
			if($result){
				$otp = rand(100000,999999);
				$_SESSION['otp'] = $otp;
				$_SESSION['email'] = $email;
				require "Mail/phpmailer/PHPMailerAutoload.php";
				$mail = new PHPMailer;

				$mail->isSMTP();
				$mail->Host='smtp.gmail.com';
				$mail->Port=587;
				$mail->SMTPAuth=true;
				$mail->SMTPSecure='tls';

				$mail->Username='scdstacruz@gmail.com';
				$mail->Password='aydsuollcolazzhk';

				$mail->setFrom('qwertyqwerty0937@gmail.com', 'OTP Verification');
				$mail->addAddress($_POST["email"]);

				$mail->isHTML(true);
				$mail->Subject="Your verification code";
				$mail->Body="<p>Good Day, <br></p> <h3>Here is your OTP code $otp <br></h3>
				<br><br>
				<p>With regrads,</p>
				<b>To our group</b>
				";

						if(!$mail->send()){
							?>
								<script>
									alert("<?php echo "Failed, Invalid Email "?>");
								</script>
							<?php
						}else{
							?>
							 <script>
								alert("OTP has been sent to you email!");
								window.location.replace("otp_verification.php");
							</script>
							<?php
						}
			}
              
            } else {
				?>
				<script>
                alert("<?php echo 'Email not found'?>");
				header('Location: forgotPass.php');
            </script>
			<?php
            }
        }
        ?>

</html>