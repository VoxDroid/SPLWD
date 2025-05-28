<?php
                          include('../connect.php');
                          include('../session.php');
// Check if image file is a actual image or fake image
if(isset($_POST["submit1"])) {

  $target_dir1 = "../img/";
  $target_file1 = $target_dir1 . basename($_FILES["fileToUpload1"]["name"]);
  $uploadOk1 = 1;
  $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
  
  // Check if file already exists
  if (file_exists($target_file1)) {


    $uploadOk1 = 0;
  }
  
  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk1 = 0;
  }
  
  
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk1 == 0) {
   
  
  // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file1)) {

    }
  }
 
  $target_dir = "../ilp/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if file already exists


// Check file size



// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
 

// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $pass=$_POST['lrn'];
  $hashed_pass=password_hash($pass,PASSWORD_DEFAULT);
    date_default_timezone_set('Asia/Manila');
	$date = date("Y-m-d");
  $t_id=$_SESSION['teacher_id'];
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    $sql ="INSERT INTO `student` (`lrn`, `teacher_id`, `fname`, `lname`, `mname`, `birth_date`, `gender`, `address`, `guardian`, `contact_no`, `img`, `category`,`password`) VALUES ('".$_POST['lrn']."', '".$_POST['teacher_id']."', '".$_POST['fname']."', '".$_POST['lname']."', '".$_POST['mname']."', '".$_POST['birth_date']."', '".$_POST['gender']."', '".$_POST['address']."', '".$_POST['guardian']."', '".$_POST['contact_no']."','". htmlspecialchars( basename( $_FILES["fileToUpload1"]["name"])). "', '1','".$hashed_pass."');";
    $sql2 ="INSERT INTO `assessment` (`lrn`, `t_assessment`, `c_age`, `administrator`, `strenght`, `category`) VALUES ('".$_POST['lrn']."', '".$_POST['t_assessment']."', '".$_POST['c_age']."', '".$_POST['administrator']."', '".$_POST['strenght']."', '".$_POST['category']."');";
    $sql7 ="INSERT INTO `ilp` (`lrn`, `date`, `ilp_name`) VALUES ('".$_POST['lrn']."', '".$_POST['dateilp']."', '". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). "');";
    $sql8 = "INSERT INTO `log` (`log_id`, `date`, `teacher_id`, `action_type`, `previous`, `updated`, `student_id`, `status`) VALUES (NULL, '".$date."', '".$t_id."', 'Add new Student', 'N/A', 'N/A', '".$_POST['lrn']."', 'archive');";
      
    $quarter=1;
    $grade=1;
    while($grade<=6){
        while($quarter<=4){

    $sql9="INSERT INTO `evaluation` (`evaluation_id`, `lrn`, `teacher_id`, `date`, `evaluation`, `quarter`, `type`, `strenght`, `needs`, `grade` ) VALUES (NULL, '".$_POST['lrn']."', '".$_POST[$grade.$quarter.'t_id']."', '".$_POST[$grade.$quarter.'date1']."', '', '".$quarter."', '1', '".$_POST[$grade.$quarter.'dlsds']."', '".$_POST[$grade.$quarter.'dlsdn']."','".$grade."');";
    
    $sql10="INSERT INTO `evaluation` (`evaluation_id`, `lrn`, `teacher_id`, `date`, `evaluation`, `quarter`, `type`, `strenght`, `needs`, `grade` ) VALUES (NULL, '".$_POST['lrn']."','".$_POST[$grade.$quarter.'t_id']."', '".$_POST[$grade.$quarter.'date1']."', '', ".$quarter.", '2', '".$_POST[$grade.$quarter.'seds']."', '".$_POST[$grade.$quarter.'sedn']."','".$grade."');";
    
    $sql11="INSERT INTO `evaluation` (`evaluation_id`, `lrn`, `teacher_id`, `date`, `evaluation`, `quarter`, `type`, `strenght`, `needs`, `grade` ) VALUES (NULL, '".$_POST['lrn']."','".$_POST[$grade.$quarter.'t_id']."', '".$_POST[$grade.$quarter.'date1']."', '', ".$quarter.", '3', '".$_POST[$grade.$quarter.'ldds']."', '".$_POST[$grade.$quarter.'lddn']."','".$grade."');";
    
    $sql12="INSERT INTO `evaluation` (`evaluation_id`, `lrn`,`teacher_id`, `date`, `evaluation`, `quarter`, `type`, `strenght`, `needs`, `grade` ) VALUES (NULL, '".$_POST['lrn']."', '".$_POST[$grade.$quarter.'t_id']."', '".$_POST[$grade.$quarter.'date1']."', '', ".$quarter.", '4', '".$_POST[$grade.$quarter.'pds']."', '".$_POST[$grade.$quarter.'pdn']."','".$grade."');";
    
    $sql13="INSERT INTO `evaluation` (`evaluation_id`, `lrn`, `teacher_id`, `date`, `evaluation`, `quarter`, `type`, `strenght`, `needs`, `grade` ) VALUES (NULL, '".$_POST['lrn']."','".$_POST[$grade.$quarter.'t_id']."', '".$_POST[$grade.$quarter.'date1']."', '', ".$quarter.", '5', '".$_POST[$grade.$quarter.'cds']."', '".$_POST[$grade.$quarter.'cdn']."','".$grade."');";
    $sql14="INSERT INTO `evaluation` (`evaluation_id`, `lrn`, `teacher_id`, `date`, `evaluation`, `quarter`, `type`, `strenght`, `needs`, `grade` ) VALUES (NULL, '".$_POST['lrn']."','".$_POST[$grade.$quarter.'t_id']."', '".$_POST[$grade.$quarter.'date1']."', '', ".$quarter.", '6', '".$_POST[$grade.$quarter.'cds']."', '".$_POST[$grade.$quarter.'cdn']."','".$grade."');";
    if (mysqli_query($conn, $sql9)) {
  
     
    } 
    if (mysqli_query($conn, $sql10)) {
  
     
    } 
    if (mysqli_query($conn, $sql11)) {
  
     
    } 
    if (mysqli_query($conn, $sql12)) {
  
     
    } 
    if (mysqli_query($conn, $sql13)) {
  
     
    } 
    if (mysqli_query($conn, $sql14)) {
  
     
    } 
    $quarter++;
  
}
$quarter=1;
$grade++;


  }


    if (mysqli_query($conn, $sql)) {
  
     
    } 
    
    if (mysqli_query($conn, $sql8)) {
     
    } 

    if (mysqli_query($conn, $sql7)) {
     
    } 
    if (mysqli_query($conn, $sql2)) {
      header('Location:addNewStudent.php?alert=1');
      
    
    } 


    mysqli_close($conn);
  
  } else {
   
  }
}
 
}


?>