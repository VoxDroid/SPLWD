<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign up</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .required-field::before {
  content: "*";
  color: red;
  margin-left:2px
}
    </style>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row ">
                <div class="col-lg-6 d-none d-lg-block pl-5 pt-5 mt-5 "><img src="img/sc22.jpg" class="img-fluid" alt=""></div>
            
                    <div class="col-lg-6">
                        <div class="p-3">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>

                            <?php if(isset($_GET['error'])){?>
                            <form class="user" method="post" action="add_account.php">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label class="form-label" for="bdate">First name</label>
                                        <input  required type="text" name="fname" class="form-control" id="exampleFirstName"
                                        value="<?php echo $_GET['fname'];?>"
                                            placeholder="First Name">
                                    </div>

                                    <div class="col-sm-6">
                                    <label class="form-label" for="bdate">Contact Number</label>
                                        <input  required type="number" name="contact_no" class="form-control" id="exampleLastName"
                                        value="<?php echo $_GET['contact_no'];?>"
                                            placeholder="Contact Number">
                                    </div>
                                 
                                </div>
                                
                          
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label class="form-label" for="bdate">Middle Name</label>
                                        <input  required type="text" name="mname" class="form-control" id="exampleFirstName"
                                        value="<?php echo $_GET['mname'];?>"
                                            placeholder="Middle Name">
                                    </div>
                                    <div class="col-sm-6">
                                    <label class="form-label" for="bdate">Employee ID</label>
                                        <input  required type="number" maxlength="7"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" id="teacher_id" name="teacher_id" class="form-control" id="exampleLastName"
                                        value="<?php echo $_GET['teacher_id'];?>"
                                            placeholder="Employee ID">
                                    </div>
                                 
                                  
                            </div>
                               
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label class="form-label" for="bdate">Last name</label>
                                        <input  required type="text" name="lname" class="form-control" value="<?php echo $_GET['lname'];?>"
                                            id="exampleInputPassword" placeholder="Last Name">
                                    </div>

                                    <div class="col-sm-6">
                                    <label class="form-label" for="bdate">School</label>
                                    <select  name="school" id="" class="form-control required-field" >
               
                <option value="BES">BES</option>
                <option value="GES">GES</option>
                <option value="SCES">SCES</option>
            </select>
                                    </div>
                              
                                  
                                    
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="">Gender</label>
                            <select  name="gender" id="" class="form-control">
                 <option value="Male">Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>

            
            </div>

            <div class="col-sm-6">
                                    <label class="form-label" for="bdate">Email</label>
                                        <input  required type="email" name="email" class="form-control" id="exampleLastName"
                                            placeholder="Email">
                                    </div>
         

                                    </div>


                                    <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="">Address</label>
                                        <input  required type="text" name="address" class="form-control" id="exampleFirstName"
                                        value="<?php echo $_GET['address'];?>"
                                            placeholder="Address">
                                    </div>
                                    <div class="col-sm-6">
                                    <label class="form-label" for="bdate">Password</label>
                                        <input  required type="password" name="password" pattern = "(?=.*\d)(?=.* 
     [a-z])(?=.*?[0-9])(?=.*?[~`!@#$%\^&*()\-_=+[\]{};:\x27.,\x22\\|/?><]).{4,}" class="form-control" id="exampleLastName"
                                            placeholder="Password">
                                    </div>

                                   
                                  
                            </div>
                            <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label class="form-label" for="bdate">Birth Date</label>
                                        <input  required type="date" name="bdate" class="form-control" id="exampleFirstName"  value="<?php echo $_GET['bdate'];?>"
                                            placeholder="Address">
                                    </div>
                                    <div class="col-sm-6">
                                    <label class="form-label" for="bdate">Confirm Password</label>
                                        <input  required type="password" name="password" class="form-control"
                                            id="exampleRepeatPassword" placeholder="Repeat Password">
                                        </div>
                                  
                            </div>
                            <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                    <label class="form-label" for="bdate">User Type</label>
                                    <select class="form-control" name="category" >
                                    <option value="4">Teacher</option>
                                    <option value="3">Secretary</option>
                                      
                                        <option value="2">Principal</option>

                                    </select>
                                    </div>
                                  
                                  
                            </div>

                      
                                    
                                    
                                  
                                
                                <div class="m-2">
                                <input  required type='submit' onclick="showname3()" name="signup" value="Register Account" class="btn btn-primary btn-user btn-block">
                                    
                                
                                </div>
                             
                               
                            </form>
                            <?php } else{?>

                            <form class="user" method="post" action="add_account.php">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label class="form-label" for="bdate">First name</label>
                                        <input  required type="text" name="fname" class="form-control" id="exampleFirstName"
                                            placeholder="First Name">
                                    </div>

                                    <div class="col-sm-6">
                                    <label class="form-label" for="bdate">Contact Number</label>
                                        <input  required type="number" name="contact_no" class="form-control" id="exampleLastName"
                                            placeholder="Contact Number">
                                    </div>
                                 
                                </div>
                                
                          
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label class="form-label" for="bdate">Middle Name</label>
                                        <input  required type="text" name="mname" class="form-control" id="exampleFirstName"
                                            placeholder="Middle Name">
                                    </div>
                                    <div class="col-sm-6">
                                    <label class="form-label" for="bdate">Employee ID</label>
                                        <input  required type="number" maxlength="7"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="teacher_id" id = "teacher_id" class="form-control" id="exampleLastName"
                                            placeholder="Employee ID">
                                    </div>
                                 
                                  
                            </div>
                               
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label class="form-label" for="bdate">Last name</label>
                                        <input  required type="text" name="lname" class="form-control"
                                            id="exampleInputPassword" placeholder="Last Name">
                                    </div>
                                    <div class="col-sm-6">
                                    <label class="form-label" for="bdate">School</label>
                                    <select  name="school" id="" class="form-control required-field">
               
                <option value="BES">BES</option>
                <option value="GES">GES</option>
                <option value="SCES">SCES</option>
            </select>
                                    </div>
                                  
                                    
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="">Gender</label>
                            <select  name="gender" id="" class="form-control">
                 <option value="Male">Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>

            
            </div>
            <div class="col-sm-6">
                                    <label class="form-label" for="bdate">Email</label>
                                        <input  required type="email" name="email" class="form-control" id="exampleLastName"
                                            placeholder="Email">
                                    </div>

                                    </div>
                                    <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="">Address</label>
                                        <input  required type="text" name="address" class="form-control" id="exampleFirstName"
                                            placeholder="Address">
                                    </div>

                                    <div class="col-sm-6">
                                    <label class="form-label" for="password">Password</label>
                                        <input  required type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="form-control" 
                                            id="exampleRepeatPassword" placeholder="Repeat Password">
</div>
                                  
                            </div>
                            <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label class="form-label" for="bdate">Birth Date</label>
                                        <input  required type="date" name="bdate" class="form-control" id="exampleFirstName"
                                            placeholder="Address">
                                    </div>
                                    <div class="col-sm-6">
                                    <label class="form-label" for="password">Confirm Password</label>
                                        <input  required type="password" name="password" class="form-control"
                                            id="exampleRepeatPassword" placeholder="Repeat Password">
</div>
                                  
                            </div>

                            <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                    <label class="form-label" for="bdate">User Type</label>
                                    <select class="form-control" name="category" >
                                    <option value="4">Teacher</option>
                                    <option value="3">Secretary</option>
                                      
                                        <option value="2">Principal</option>

                                    </select>
                                    </div>
                                  
                                  
                            </div>

                      
                                    
                                    
                                  
                                
                                <div class="m-2">
                                <input  required type='submit'  onclick="showname3()" name="signup" value="Register Account" class="btn btn-primary btn-user btn-block">
                                    
                                
                                </div>
                             
                               
                            </form>
                            <?php }?>
                            <div class="text-center">
                                <a class="small" href="index.php">Already have an account? Login!</a>
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
if(isset($_GET['approve'])){
    echo "<script>swal('Successfully created an account', 'Wait for the admin to approve your account', 'success');</script>";

}

else if(isset($_GET['error'])){
    echo "<script>swal('Email Already Exist', 'The email that you provide is already taken', 'warning');</script>";

}
?>

<script>
      function showname3() {
     
        
        
    var arr1=[<?php
include('../connect.php');
$count = 1;

$sqlget1 = "SELECT * FROM teachers";
$sqldata1 = mysqli_query($conn, $sqlget1) or die('Error Displaying Data'. mysqli_connect_error());

while ($row3 = mysqli_fetch_assoc($sqldata1)) {

  if($count == 1){

    echo '"'.$row3['teacher_id'].'"';

  }

  else if($count>1)
  {

    echo ',"'.$row3['teacher_id'].'"';
  }

  $count++;
}




?>];  
   if(arr1.indexOf(document.getElementById("teacher_id").value) !== -1)  
        {  
            swal('LRN Already Exist', 'LRN already exist please input valid LRN!', 'warning');
                return false;
        }   
       
     
    };
 </script>


</html>