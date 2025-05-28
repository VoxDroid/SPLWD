<?php include('../session.php');?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pending Users</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Add Users Account</h1>
                    </div>



                    <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row ">
                    <div class="col-lg-3"></div>
           
            
                    <div class="col-lg-6">
                        <div class="p-2">
                            <div class="text-center">
                                
                            </div>
                            <form class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label class="form-label" for="bdate">First name</label>
                                        <input type="text" name="fname" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="First Name">
                                    </div>
                                    <div class="col-sm-6">
                                    <label class="form-label" for="bdate">Email</label>
                                        <input type="email" name="email" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Email">
                                    </div>
                                </div>
                                
                          
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label class="form-label" for="bdate">Middle Name</label>
                                        <input type="text" name="mname" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Middle Name">
                                    </div>
                                    <div class="col-sm-6">
                                    <label class="form-label" for="bdate">Password</label>
                                        <input type="password" name="password" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Password">
                                    </div>
                            </div>
                               
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label class="form-label" for="bdate">Last name</label>
                                        <input type="text" name="lname" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Last Name">
                                    </div>
                                    <div class="col-sm-6">
                                    <label class="form-label" for="bdate">Confirm Password</label>
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="">Gender</label>
                            <select  name="gender" id="" class="form-control" style="  font-size: 0.8rem;
  border-radius: 10rem;
  ">
                 <option value="Male">Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>

            
            </div>
                                    </div>
                                    <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="">Address</label>
                                        <input type="text" name="address" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Address">
                                    </div>
                                  
                            </div>
                            <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label class="form-label" for="bdate">Birth Date</label>
                                        <input type="date" name="birth_date" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Address">
                                    </div>
                                  
                            </div>
                                    
                                    
                                  
                                
                                <div class="m-2">
                                <a href="login.html" class="btn btn-primary btn-user btn-block">
                                    Add User Account
                                </a>
                                </div>
                             
                               
                            </form>
                          
                        
                           
                        </div>
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

<?php
	include('../connect.php'); 
	if (isset($_POST['signup'])) {
	$count=0;
$eemail = $_POST['email'];
$sql1 ="SELECT * FROM teachers";
$sqldata1 = mysqli_query($conn, $sql1) or die('Error Displaying Data'. mysqli_connect_error());
while ($row1 = mysqli_fetch_assoc($sqldata1)){
	if($row1==$eemail){
		
	$count++;
	}

}

	$pass=$_POST['password'];
	$hashed_pass=password_hash($pass,PASSWORD_DEFAULT);

	if($count>0)
	{
		echo "<p>Email already exist</p>";
	}

	else if ($count == 0)
    {


	
		
			$sql="INSERT INTO `teachers` (`id`, `teacher_id`, `fname`, `lname`, `mname`, `birth_date`, `address`, `gender`, `contact_no`, `email`, `password`, `img`, `status`, `category`) VALUES (NULL, '".$_POST['teacher_id']."', '".$_POST['fname']."', '".$_POST['lname']."', '".$_POST['mname']."', '".$_POST['bdate']."', '".$_POST['address']."', '".$_POST['gender']."', '".$_POST['contact_no']."', '".$_POST['email']."', '".$hashed_pass."', '', 'unapprove', '2');";
            if ($conn->query($sql) === TRUE) 
            {

              echo "<script>swal('Successfully created an account', 'Wait for the admin to approve your account', 'success');</script>";
			
			
		} 
		
		

}
    }
		

	
	
	?>

</html>