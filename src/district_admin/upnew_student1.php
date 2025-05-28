<?php
include('../connect.php');
include('../session.php');
if(isset($_POST['submit'])){
    $type=1;
    while($type<=25){

$sql = "INSERT INTO `progress_report` (`progress_id`, `lrn`, `year` , `progress_index`, `type`, `q1`, `q2`, `q3`, `q4`) VALUES (NULL, '".$_POST['lrn']."','".$_POST['progress_year']."',1, '".$_POST['1'.$type]."', '".$_POST['1'.$type.'q1']."', '".$_POST['1'.$type.'q2']."', '".$_POST['1'.$type.'q3']."', '".$_POST['1'.$type.'q4']."');";

if ($conn->query($sql) === TRUE) {
  echo "<p>1".$type."</p>";
      } 
$type++;
    }

    $type=1;
    while($type<=20){

$sql1 = "INSERT INTO `progress_report` (`progress_id`, `lrn`, `year`, `progress_index`, `type`, `q1`, `q2`, `q3`, `q4`) VALUES (NULL, '".$_POST['lrn']."','".$_POST['progress_year']."',2, '".$_POST['2'.$type]."', '".$_POST['2'.$type.'q1']."', '".$_POST['2'.$type.'q2']."', '".$_POST['2'.$type.'q3']."', '".$_POST['2'.$type.'q4']."');";

if ($conn->query($sql1) === TRUE) {
    echo "<p>2".$type."</p>";
      } 
$type++;
    }

    $type=1;
    while($type<=18){

$sql2 = "INSERT INTO `progress_report` (`progress_id`, `lrn`, `year`, `progress_index`, `type`, `q1`, `q2`, `q3`, `q4`) VALUES (NULL, '".$_POST['lrn']."','".$_POST['progress_year']."',3, '".$_POST['3'.$type]."', '".$_POST['3'.$type.'q1']."', '".$_POST['3'.$type.'q2']."', '".$_POST['3'.$type.'q3']."', '".$_POST['3'.$type.'q4']."');";

if ($conn->query($sql2) === TRUE) {
    echo "<p>3".$type."</p>";
      } 
$type++;
    }

    $type=1;
    while($type<=23){

$sql3 = "INSERT INTO `progress_report` (`progress_id`, `lrn`, `year`, `progress_index`, `type`, `q1`, `q2`, `q3`, `q4`) VALUES (NULL, '".$_POST['lrn']."','".$_POST['progress_year']."', 4,'".$_POST['4'.$type]."', '".$_POST['4'.$type.'q1']."', '".$_POST['4'.$type.'q2']."', '".$_POST['4'.$type.'q3']."', '".$_POST['4'.$type.'q4']."');";

if ($conn->query($sql3) === TRUE) {
    echo "<p>4".$type."</p>";
      } 
$type++;
    }

    $type=1;
    while($type<=23){

$sql4 = "INSERT INTO `progress_report` (`progress_id`, `lrn`, `year`, `progress_index`, `type`, `q1`, `q2`, `q3`, `q4`) VALUES (NULL, '".$_POST['lrn']."','".$_POST['progress_year']."',5, '".$_POST['5'.$type]."', '".$_POST['5'.$type.'q1']."', '".$_POST['5'.$type.'q2']."', '".$_POST['5'.$type.'q3']."', '".$_POST['5'.$type.'q4']."');";

if ($conn->query($sql4) === TRUE) {
    echo "<p>5".$type."</p>";
      } 
$type++;
    }

    $type=1;
    while($type<=21){

$sql5 = "INSERT INTO `progress_report` (`progress_id`, `lrn`, `year`, `progress_index`, `type`, `q1`, `q2`, `q3`, `q4`) VALUES (NULL, '".$_POST['lrn']."','".$_POST['progress_year']."',6, '".$_POST['6'.$type]."', '".$_POST['6'.$type.'q1']."', '".$_POST['6'.$type.'q2']."', '".$_POST['6'.$type.'q3']."', '".$_POST['6'.$type.'q4']."');";

if ($conn->query($sql5) === TRUE) {
    echo "<p>6".$type."</p>";
      } 
$type++;
    }

    $sql6 = "INSERT INTO `new_student` (`student_id`, `lrn`, `teacher_id`, `student_code`, `birth_date`, `birth_place`, `gender`, `address`, `gurdian_contact`, `school`, `teacher`) VALUES (NULL, '".$_POST['lrn']."', '".$_SESSION['teacher_id']."' ,'".$_POST['student_code']."', '".$_POST['birth_date']."', '".$_POST['birth_place']."', '".$_POST['gender']."', '".$_POST['address']."', '".$_POST['guardian_contact']."', '".$_POST['school']."', '".$_POST['teacher']."');";

if ($conn->query($sql6) === TRUE) {
    echo "<p>6".$type."</p>";
      } 

      $target_dir1 = "../ilp/";
      $target_file1 = $target_dir1 . basename($_FILES["fileToUpload1"]["name"]);
      $uploadOk1 = 1;
      $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
      
      // Check if file already exists
      if (file_exists($target_file1)) {
    
    
        $uploadOk1 = 0;
      }
      
      // Check file size
    
      
      
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk1 == 0) {
       
      
      // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file1)) {
         
            $file = htmlspecialchars( basename( $_FILES["fileToUpload1"]["name"]));
            $file1= uniqid();
            rename('../ilp/'.$file,'../ilp/'.$file1);
            $date = date('Y-m-d');
       $sql7 = "INSERT INTO `student_files` (`student_files`, `lrn`, `teacher_id`, `year` , `file_type`, `file_name`, `description`, `date`) VALUES (NULL, '".$_POST['lrn']."', '".$_SESSION['teacher_id']."', '".$_POST['year1']."', '".$_POST['type1']."', '".$file1."', '".$_POST['des1']."', '".$date."');";

if ($conn->query($sql7) === TRUE) {
    echo "<p>6".$type."</p>";
      } 
        }
      }

      $target_dir3 = "../ilp/";
      $target_file3 = $target_dir3 . basename($_FILES["fileToUpload3"]["name"]);
      $uploadOk3 = 1;
      $imageFileType3 = strtolower(pathinfo($target_file3,PATHINFO_EXTENSION));
      
      // Check if file already exists
      if (file_exists($target_file3)) {
    
    
        $uploadOk3 = 0;
      }
      
      // Check file size
    
      
      
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk3 == 0) {
       
      
      // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload3"]["tmp_name"], $target_file3)) {
          $file = htmlspecialchars( basename( $_FILES["fileToUpload3"]["name"]));
          $file1= uniqid();
          rename('../ilp/'.$file,'../ilp/'.$file1);
            $date = date('Y-m-d');
       $sql7 = "INSERT INTO `student_files` (`student_files`, `lrn`, `teacher_id`, `year`, `file_type`, `file_name`, `description`, `date`) VALUES (NULL, '".$_POST['lrn']."', '".$_SESSION['teacher_id']."', '".$_POST['year3']."', '".$_POST['type3']."', '".$file1."', '".$_POST['des3']."', '".$date."');";

if ($conn->query($sql7) === TRUE) {
    echo "<p>6".$type."</p>";
      } 
        }
      }

      $target_dir4 = "../ilp/";
      $target_file4 = $target_dir4 . basename($_FILES["fileToUpload4"]["name"]);
      $uploadOk4 = 1;
      $imageFileType4 = strtolower(pathinfo($target_file4,PATHINFO_EXTENSION));
      
      // Check if file already exists
      if (file_exists($target_file4)) {
    
    
        $uploadOk4 = 0;
      }
      
      // Check file size
    
      
      
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk4 == 0) {
       
      
      // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload4"]["tmp_name"], $target_file4)) {
            $file = htmlspecialchars( basename( $_FILES["fileToUpload2"]["name"]));
            $file1= uniqid();
            rename('../ilp/'.$file,'../ilp/'.$file1);
            $date = date('Y-m-d');
       $sql8 = "INSERT INTO `student_files` (`student_files`, `lrn`, `teacher_id`, `year`, `file_type`, `file_name`, `description`, `date`) VALUES (NULL, '".$_POST['lrn']."', '".$_SESSION['teacher_id']."', '".$_POST['year4']."', '".$_POST['type4']."', '".$file1."', '".$_POST['des4']."', '".$date."');";

if ($conn->query($sql8) === TRUE) {
    echo "<p>6".$type."</p>";
      } 
        }
      }

      $target_dir2 = "../ilp/";
      $target_file2 = $target_dir2 . basename($_FILES["fileToUpload2"]["name"]);
      $uploadOk2 = 1;
      $imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
      
      // Check if file already exists
      if (file_exists($target_file2)) {
    
    
        $uploadOk2 = 0;
      }
      
      // Check file size
    
      
      
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk2 == 0) {
       
      
      // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file2)) {
            $file = htmlspecialchars( basename( $_FILES["fileToUpload2"]["name"]));
            $file1= uniqid();
            rename('../ilp/'.$file,'../ilp/'.$file1);
            $date = date('Y-m-d');
       $sql9 = "INSERT INTO `student_files` (`student_files`, `lrn`, `teacher_id`, `year`, `file_type`, `file_name`, `description`, `date`) VALUES (NULL, '".$_POST['lrn']."', '".$_SESSION['teacher_id']."', '".$_POST['year2']."', '".$_POST['type2']."', '".$file1."', '".$_POST['des2']."', '".$date."');";

if ($conn->query($sql9) === TRUE) {
    echo "<p>6".$type."</p>";
      } 
        }
      }

      $date3 = date('Y-m-d');
     $sql10 = "INSERT INTO `teachers_remark` (`remark_id`, `year`, `lrn`, `teacher_id`, `remark_q1`, `remark_q2`, `remark_q3`, `remark_q4`, `date`) VALUES (NULL,'".$_POST['progress_year']."' ,'".$_POST['lrn']."', '".$_SESSION['teacher_id']."', '".$_POST['tq1']."', '".$_POST['tq2']."', '".$_POST['tq3']."', '".$_POST['tq4']."', '".$date3."');";

     if ($conn->query($sql10) === TRUE) {
      echo "<p>6".$type."</p>";
        } 
      
        header('location:folders.php?id=2');
    $conn->close();
}


?>