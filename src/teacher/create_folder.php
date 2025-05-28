<?php
$file_count=0;
include('../connect.php');
include('../session.php');
if(isset($_POST['submit'])){

  $pass=$_GET['lrn'];
  $hashed_pass=password_hash($pass,PASSWORD_DEFAULT);
  $date111 = date('Y-m-d');

  $folder = "INSERT INTO `folder` (`folder_id`, `folder_year`, `lrn`, `teacher`, `date_added`, `description`) VALUES (NULL, '".$_POST['progress_year']."', '".$_GET['lrn']."', '".$_SESSION['teacher_id']."', '".$date111."', '".$_POST['folder_des']."');";
  if ($conn->query($folder) === TRUE) {

  } 

  $sqlget11 = "SELECT * FROM folder order by folder_id desc";
$sqldata11 = mysqli_query($conn, $sqlget11) or die('Error Displaying Data'. mysqli_connect_error());

while ($row31 = mysqli_fetch_assoc($sqldata11)) {
    $folder_id = $row31['folder_id'];
    break;

}

$va1="";
$va2="";
$va3="";
$va4="";
$va5="";
$va6="";



if(isset( $_POST['d1'])) {
    $va1=$_POST['d1'];
}

if(isset( $_POST['d2'])) {
    $va2=$_POST['d2'];
}


if(isset( $_POST['d3'])) {
    $va3=$_POST['d3'];
}


if(isset( $_POST['d4'])) {
    $va4=$_POST['d4'];
}


if(isset( $_POST['d5'])) {
    $va5=$_POST['d5'];
}


if(isset( $_POST['d6'])) {
    $va6=$_POST['d6'];
}

$sql ="INSERT INTO `iep_difficulty` (`iep_id`, `folder_id`, `teacher_id`, `lrn`, `d_seeing`, `d_hearing`, `d_com`, `d_moving`, `d_concentrating`, `d_remembering`, `others`, `others_2`, `medical_diagnos`, `date_meeting`, `date_last_iep`, `purpose`, `review_date`, `comment`, `grade`) VALUES (NULL, '".$folder_id."', '".$_SESSION['teacher_id']."', '".$_GET['lrn']."', '".$va6."', '".$va1."', '".$va2."', '".$va3."', '".$va4."', '".$va5."', '".$_POST['others']."', '".$_POST['others_2']."', '".$_POST['medical_diagnos']."', '".$_POST['date_meeting']."', '".$_POST['date_last_iep']."', '".$_POST['purpose']."', '".$_POST['review_date']."','".$_POST['comment']."','".$_POST['grade']."');";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  }


$sqlget11 = "SELECT * FROM iep_difficulty order by iep_id desc";
$sqldata11 = mysqli_query($conn, $sqlget11) or die('Error Displaying Data'. mysqli_connect_error());

while ($row31 = mysqli_fetch_assoc($sqldata11)) {
    $id = $row31['iep_id'];
    break;

}

$bar1 ="INSERT INTO `iep_barriers` (`barrier_id`, `iep_id`, `folder_id`, `lrn`, `barrier_1`, `barrier_2`, `barrier_3`, `barrier_4`) VALUES (NULL, '".$id."','".$folder_id."', '".$_GET['lrn']."', '".$_POST['functional_1']."', '".$_POST['functional_2']."', '".$_POST['functional_3']."', '".$_POST['functional_4']."');";
$bar2 ="INSERT INTO `iep_barriers` (`barrier_id`, `iep_id`, `folder_id`, `lrn`, `barrier_1`, `barrier_2`, `barrier_3`, `barrier_4`) VALUES (NULL, '".$id."','".$folder_id."', '".$_GET['lrn']."', '".$_POST['functional_12']."', '".$_POST['functional_22']."', '".$_POST['functional_32']."', '".$_POST['functional_42']."');";
$bar3 ="INSERT INTO `iep_barriers` (`barrier_id`, `iep_id`, `folder_id`, `lrn`, `barrier_1`, `barrier_2`, `barrier_3`, `barrier_4`) VALUES (NULL, '".$id."','".$folder_id."', '".$_GET['lrn']."', '".$_POST['functional_13']."', '".$_POST['functional_23']."', '".$_POST['functional_33']."', '".$_POST['functional_43']."');";
$bar4 ="INSERT INTO `iep_barriers` (`barrier_id`, `iep_id`, `folder_id`, `lrn`, `barrier_1`, `barrier_2`, `barrier_3`, `barrier_4`) VALUES (NULL, '".$id."','".$folder_id."', '".$_GET['lrn']."', '".$_POST['functional_14']."', '".$_POST['functional_24']."', '".$_POST['functional_34']."', '".$_POST['functional_44']."');";
$bar5 ="INSERT INTO `iep_barriers` (`barrier_id`, `iep_id`, `folder_id`, `lrn`, `barrier_1`, `barrier_2`, `barrier_3`, `barrier_4`) VALUES (NULL, '".$id."','".$folder_id."', '".$_GET['lrn']."', '".$_POST['functional_15']."', '".$_POST['functional_25']."', '".$_POST['functional_35']."', '".$_POST['functional_45']."');";
if ($conn->query($bar1) === TRUE) {
    echo "New record created successfully";
  }
  if ($conn->query($bar2) === TRUE) {
    echo "New record created successfully";
  }
  if ($conn->query($bar3) === TRUE) {
    echo "New record created successfully";
  }
  if ($conn->query($bar4) === TRUE) {
    echo "New record created successfully";
  }
  if ($conn->query($bar5) === TRUE) {
    echo "New record created successfully";
  }
  





$sql3 ="INSERT INTO `iep_functional` (`functional_id`, `iep_id`, `folder_id`, `lrn`, `functional_1`, `functional_2`, `functional_3`, `functional_4`, `functional_5`, `functional_1_2`, `functional_1_3`, `functional_2_2`, `functional_2_3`, `functional_3_2`, `functional_3_3`, `functional_4_2`, `functional_4_3`, `functional_5_2`, `functional_5_3`) VALUES (NULL, '".$id."','".$folder_id."', '".$_GET['lrn']."', '".$_POST['functional_1_1']."', '".$_POST['functional_1_2']."', '".$_POST['functional_1_3']."', '".$_POST['functional_2_1']."', '".$_POST['functional_2_2']."', '".$_POST['functional_2_3']."', '".$_POST['functional_3_1']."', '".$_POST['functional_3_2']."', '".$_POST['functional_3_3']."', '".$_POST['functional_4_1']."', '".$_POST['functional_4_2']."', '".$_POST['functional_4_3']."', '".$_POST['functional_5_1']."', '".$_POST['functional_5_2']."', '".$_POST['functional_5_3']."');";
if ($conn->query($sql3) === TRUE) {
    echo "New record created successfully";
  }



                                                        
    

$goal1="INSERT INTO `iep_goals` (`goal_id`, `iep_id`, `folder_id`, `lrn`, `interest`, `goal`, `intervention`, `timeline`, `individual_responsible`, `remarks`, `progress`) VALUES (NULL, '".$id."','".$folder_id."', '".$_GET['lrn']."', '".$_POST['interest']."', '".$_POST['goal']."', '".$_POST['intervention']."', '".$_POST['timeline']."', '".$_POST['individual_responsible']."', '".$_POST['remarks']."', '".$_POST['progress']."');";
$goal2="INSERT INTO `iep_goals` (`goal_id`, `iep_id`, `folder_id`, `lrn`, `interest`, `goal`, `intervention`, `timeline`, `individual_responsible`, `remarks`, `progress`) VALUES (NULL, '".$id."','".$folder_id."', '".$_GET['lrn']."', '".$_POST['interest2']."', '".$_POST['goal2']."', '".$_POST['intervention2']."', '".$_POST['timeline2']."', '".$_POST['individual_responsible2']."', '".$_POST['remarks2']."', '".$_POST['progress2']."');";
$goal3="INSERT INTO `iep_goals` (`goal_id`, `iep_id`, `folder_id`, `lrn`, `interest`, `goal`, `intervention`, `timeline`, `individual_responsible`, `remarks`, `progress`) VALUES (NULL, '".$id."','".$folder_id."', '".$_GET['lrn']."', '".$_POST['interest3']."', '".$_POST['goal3']."', '".$_POST['intervention3']."', '".$_POST['timeline3']."', '".$_POST['individual_responsible3']."', '".$_POST['remarks3']."', '".$_POST['progress3']."');";
$goal4="INSERT INTO `iep_goals` (`goal_id`, `iep_id`, `folder_id`, `lrn`, `interest`, `goal`, `intervention`, `timeline`, `individual_responsible`, `remarks`, `progress`) VALUES (NULL, '".$id."','".$folder_id."', '".$_GET['lrn']."', '".$_POST['interest4']."', '".$_POST['goal4']."', '".$_POST['intervention4']."', '".$_POST['timeline4']."', '".$_POST['individual_responsible4']."', '".$_POST['remarks4']."', '".$_POST['progress4']."');";

if ($conn->query($goal1) === TRUE) {
    echo "New record created successfully";
  }
  if ($conn->query($goal2) === TRUE) {
    echo "New record created successfully";
  }
  if ($conn->query($goal3) === TRUE) {
    echo "New record created successfully";
  }
  if ($conn->query($goal4) === TRUE) {
    echo "New record created successfully";
  }
  


$sql5="INSERT INTO `iep_special_factor` (`special_factor_id`, `iep_id`, `folder_id`, `lrn`, `factor_1`, `factor_2`, `factor_3`, `comment_3`, `factor_4`, `comment_4`, `factor_5`, `comment_5`, `factor_6`, `comment_6`, `factor_7`, `comment_7`, `factor_8`, `comment_8`, `factor_8_type`, `factor_9`, `comment_9`) VALUES (NULL, '".$id."','".$folder_id."', '".$_GET['lrn']."', '".$_POST['factor_1']."', '".$_POST['factor_2']."', '".$_POST['factor_3']."', '".$_POST['comment_3']."', '".$_POST['factor_4']."', '".$_POST['comment_4']."', '".$_POST['factor_5']."', '".$_POST['comment_5']."', '".$_POST['factor_6']."', '".$_POST['comment_6']."', '".$_POST['factor_7']."', '".$_POST['comment_7']."', '".$_POST['factor_8']."', '".$_POST['comment_8']."', '".$_POST['factor_8_type']."', '".$_POST['factor_9']."', '".$_POST['comment_9']."');";
if ($conn->query($sql5) === TRUE) {
    echo "New record created successfully";
  }

$if = '';
$dis = '';

if(isset( $_POST['if_1'])) {
    $if=$_POST['if_1'];
}


if(isset( $_POST['if_2'])) {
    $if=$_POST['if_2'];
}


if(isset( $_POST['dis_1'])) {
    $dis=$_POST['dis_1'];
}


if(isset( $_POST['dis_2'])) {
    $dis=$_POST['dis_2'];
}
$sql6="INSERT INTO `iep_team` (`team_id`, `iep_id`, `folder_id`, `lrn`, `psych`, `nurse`, `therapist`, `language`, `if_regular`, `date`, `guidance`, `other_name`, `principal`, `if_1`, `dis_1`,`sp_teacher`) VALUES (NULL, '".$id."','".$folder_id."', '".$_GET['lrn']."', '".$_POST['psych']."', '".$_POST['nurse']."', '".$_POST['therapist']."', '', '', '".$_POST['date_meeting']."', '".$_POST['guidance']."', '".$_POST['other_name']."', '".$_POST['principal']."', '".$if."', '".$dis."', '".$_POST['sp_teacher']."');";

if ($conn->query($sql6) === TRUE) {
    echo "New record created successfully";
  }

$trans1="INSERT INTO `iep_transition` (`transition_id`, `iep_id`, `folder_id`, `lrn`, `interest`, `work`, `skills`, `individual_responsible`, `remarks`) VALUES (NULL, '".$id."','".$folder_id."', '".$_GET['lrn']."', '".$_POST['transition_interest']."', '".$_POST['work1']."', '".$_POST['skills']."', '".$_POST['individual']."', '".$_POST['transition_remarks']."');";
$trans2="INSERT INTO `iep_transition` (`transition_id`, `iep_id`, `folder_id`, `lrn`, `interest`, `work`, `skills`, `individual_responsible`, `remarks`) VALUES (NULL, '".$id."','".$folder_id."', '".$_GET['lrn']."', '".$_POST['transition_interest2']."', '".$_POST['work2']."', '".$_POST['skills2']."', '".$_POST['individual2']."', '".$_POST['transition_remarks2']."');";
$trans3="INSERT INTO `iep_transition` (`transition_id`, `iep_id`, `folder_id`, `lrn`, `interest`, `work`, `skills`, `individual_responsible`, `remarks`) VALUES (NULL, '".$id."','".$folder_id."', '".$_GET['lrn']."', '".$_POST['transition_interest3']."', '".$_POST['work3']."', '".$_POST['skills3']."', '".$_POST['individual3']."', '".$_POST['transition_remarks3']."');";

if ($conn->query($trans1) === TRUE) {
    echo "New record created successfully";
  }

  if ($conn->query($trans2) === TRUE) {
    echo "New record created successfully";
  }
  if ($conn->query($trans3) === TRUE) {
    echo "New record created successfully";
  }


    $type=1;
    while($type<=25){

$progress = "INSERT INTO `progress_report` (`progress_id`,`folder_id`, `lrn`, `year` , `progress_index`, `type`, `q1`, `q2`, `q3`, `q4` , `q5`) VALUES (NULL,'".$folder_id."', '".$_GET['lrn']."','".$_POST['progress_year']."',1, '".$_POST['1'.$type]."', '".$_POST['1'.$type.'q1']."', '".$_POST['1'.$type.'q2']."', '".$_POST['1'.$type.'q3']."', '".$_POST['1'.$type.'q4']."', '".$_POST['1'.$type.'q5']."');";

if ($conn->query($progress) === TRUE) {
  echo "<p>1".$type."</p>";
      } 
$type++;
    }

    $type=1;
    while($type<=20){

$progress1 = "INSERT INTO `progress_report` (`progress_id`,`folder_id`, `lrn`, `year`, `progress_index`, `type`, `q1`, `q2`, `q3`, `q4`, `q5`) VALUES (NULL,'".$folder_id."', '".$_GET['lrn']."','".$_POST['progress_year']."',2, '".$_POST['2'.$type]."', '".$_POST['2'.$type.'q1']."', '".$_POST['2'.$type.'q2']."', '".$_POST['2'.$type.'q3']."', '".$_POST['2'.$type.'q4']."', '".$_POST['1'.$type.'q5']."');";

if ($conn->query($progress1) === TRUE) {
    echo "<p>2".$type."</p>";
      } 
$type++;
    }

    $type=1;
    while($type<=18){

$progress2 = "INSERT INTO `progress_report` (`progress_id`,`folder_id` , `lrn`, `year`, `progress_index`, `type`, `q1`, `q2`, `q3`, `q4`, `q5`) VALUES (NULL,'".$folder_id."', '".$_GET['lrn']."','".$_POST['progress_year']."',3, '".$_POST['3'.$type]."', '".$_POST['3'.$type.'q1']."', '".$_POST['3'.$type.'q2']."', '".$_POST['3'.$type.'q3']."', '".$_POST['3'.$type.'q4']."', '".$_POST['1'.$type.'q5']."');";

if ($conn->query($progress2) === TRUE) {
    echo "<p>3".$type."</p>";
      } 
$type++;
    }

    $type=1;
    while($type<=23){

$progress3 = "INSERT INTO `progress_report` (`progress_id`,`folder_id`, `lrn`, `year`, `progress_index`, `type`, `q1`, `q2`, `q3`, `q4`, `q5`) VALUES (NULL,'".$folder_id."', '".$_GET['lrn']."','".$_POST['progress_year']."', 4,'".$_POST['4'.$type]."', '".$_POST['4'.$type.'q1']."', '".$_POST['4'.$type.'q2']."', '".$_POST['4'.$type.'q3']."', '".$_POST['4'.$type.'q4']."', '".$_POST['1'.$type.'q5']."');";

if ($conn->query($progress3) === TRUE) {
    echo "<p>4".$type."</p>";
      } 
$type++;
    }

    $type=1;
    while($type<=23){

$progress4 = "INSERT INTO `progress_report` (`progress_id`,`folder_id`, `lrn`, `year`, `progress_index`, `type`, `q1`, `q2`, `q3`, `q4`, `q5`) VALUES (NULL,'".$folder_id."', '".$_GET['lrn']."','".$_POST['progress_year']."',5, '".$_POST['5'.$type]."', '".$_POST['5'.$type.'q1']."', '".$_POST['5'.$type.'q2']."', '".$_POST['5'.$type.'q3']."', '".$_POST['5'.$type.'q4']."', '".$_POST['1'.$type.'q5']."');";

if ($conn->query($progress4) === TRUE) {
    echo "<p>5".$type."</p>";
      } 
$type++;
    }

    $type=1;
    while($type<=21){

$progress5 = "INSERT INTO `progress_report` (`progress_id`,`folder_id`, `lrn`, `year`, `progress_index`, `type`, `q1`, `q2`, `q3`, `q4`, `q5`) VALUES (NULL,'".$folder_id."', '".$_GET['lrn']."','".$_POST['progress_year']."',6, '".$_POST['6'.$type]."', '".$_POST['6'.$type.'q1']."', '".$_POST['6'.$type.'q2']."', '".$_POST['6'.$type.'q3']."', '".$_POST['6'.$type.'q4']."', '".$_POST['1'.$type.'q5']."');";

if ($conn->query($progress5) === TRUE) {
    echo "<p>6".$type."</p>";
      } 
$type++;
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
          $file_count++;
         
            $file = htmlspecialchars( basename( $_FILES["fileToUpload1"]["name"]));
            $file1= uniqid();
            rename('../ilp/'.$file,'../ilp/'.$file1);
            $date = date('Y-m-d');
       $files = "INSERT INTO `student_files` (`student_files`,`folder_id`, `lrn`, `teacher_id`, `year` , `file_type`, `file_name`, `description`, `date`, `school`) VALUES (NULL,'".$folder_id."', '".$_GET['lrn']."', '".$_SESSION['teacher_id']."', '".$_POST['year1']."', '".$_POST['type1']."', '".$file1."', '".$_POST['des1']."', '".$date."','".$_SESSION['school']."');";

if ($conn->query($files) === TRUE) {
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
          $file_count++;
          $file = htmlspecialchars( basename( $_FILES["fileToUpload3"]["name"]));
          $file1= uniqid();
          rename('../ilp/'.$file,'../ilp/'.$file1);
            $date = date('Y-m-d');
       $files1 = "INSERT INTO `student_files` (`student_files`,`folder_id`, `lrn`, `teacher_id`, `year`, `file_type`, `file_name`, `description`, `date`, `school`) VALUES (NULL,'".$folder_id."', '".$_GET['lrn']."', '".$_SESSION['teacher_id']."', '".$_POST['year3']."', '".$_POST['type3']."', '".$file1."', '".$_POST['des3']."', '".$date."', '".$_SESSION['school']."');";

if ($conn->query($files1) === TRUE) {
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
          $file_count++;
            $file = htmlspecialchars( basename( $_FILES["fileToUpload2"]["name"]));
            $file1= uniqid();
            rename('../ilp/'.$file,'../ilp/'.$file1);
            $date = date('Y-m-d');
       $files2 = "INSERT INTO `student_files` (`student_files`,`folder_id`, `lrn`, `teacher_id`, `year`, `file_type`, `file_name`, `description`, `date`, `school`) VALUES (NULL,'".$folder_id."', '".$_GET['lrn']."', '".$_SESSION['teacher_id']."', '".$_POST['year4']."', '".$_POST['type4']."', '".$file1."', '".$_POST['des4']."', '".$date."', '".$_SESSION['school']."');";

if ($conn->query($files2) === TRUE) {
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
          $file_count++;
            $file = htmlspecialchars( basename( $_FILES["fileToUpload2"]["name"]));
            $file1= uniqid();
            rename('../ilp/'.$file,'../ilp/'.$file1);
            $date = date('Y-m-d');
       $files3 = "INSERT INTO `student_files` (`student_files`,`folder_id`, `lrn`, `teacher_id`, `year`, `file_type`, `file_name`, `description`, `date`, `school`) VALUES (NULL,'".$folder_id."', '".$_GET['lrn']."', '".$_SESSION['teacher_id']."', '".$_POST['year2']."', '".$_POST['type2']."', '".$file1."', '".$_POST['des2']."', '".$date."', '".$_SESSION['school']."');";

if ($conn->query($files3) === TRUE) {
    echo "<p>6".$type."</p>";
      } 
        }
      }

      $date3 = date('Y-m-d');
     $remark = "INSERT INTO `teachers_remark` (`remark_id`,`folder_id`, `year`, `lrn`, `teacher_id`, `remark_q1`, `remark_q2`, `remark_q3`, `remark_q4`, `date`) VALUES (NULL,'".$folder_id."','".$_POST['progress_year']."' ,'".$_GET['lrn']."', '".$_SESSION['teacher_id']."', '".$_POST['tq1']."', '".$_POST['tq2']."', '".$_POST['tq3']."', '".$_POST['tq4']."', '".$date3."');";

     if ($conn->query($remark) === TRUE) {
      echo "<p>6".$type."</p>";
        } 
        $files3 ="INSERT INTO `attendance` (`attendance_id`, `folder_id`, `lrn`, `teacher_id`, `type`, `june`, `july`, `aug`, `sept`, `oct`, `nov`, `dece`, `jan`, `feb`, `mar`, `apr`, `may`)
        VALUES (NULL, '".$folder_id."', '".$_GET['lrn']."', '".$_SESSION['teacher_id']."', 1, '".$_POST['june']."', '".$_POST['july']."', '".$_POST['aug']."', '".$_POST['sept']."', '".$_POST['oct']."', '".$_POST['nov']."', '".$_POST['dece']."', '".$_POST['jan']."', '".$_POST['feb']."', '".$_POST['mar']."', '".$_POST['april']."', '".$_POST['may']."');";
       if ($conn->query($files3) === TRUE) {
         echo "<p>6".$type."</p>";
           } 

           $files3 ="INSERT INTO `attendance` (`attendance_id`, `folder_id`, `lrn`, `teacher_id`, `type`, `june`, `july`, `aug`, `sept`, `oct`, `nov`, `dece`, `jan`, `feb`, `mar`, `apr`, `may`)
           VALUES (NULL, '".$folder_id."', '".$_GET['lrn']."', '".$_SESSION['teacher_id']."', 2, '".$_POST['june1']."', '".$_POST['july1']."', '".$_POST['aug1']."', '".$_POST['sept1']."', '".$_POST['oct1']."', '".$_POST['nov1']."', '".$_POST['dece1']."', '".$_POST['jan1']."', '".$_POST['feb1']."', '".$_POST['mar1']."', '".$_POST['april1']."', '".$_POST['may1']."');";
           if ($conn->query($files3) === TRUE) {
             echo "<p>6".$type."</p>";
               } 
        $uploaded="Uploaded ".$file_count." Files";

        $sql123="INSERT INTO `log` (`log_id`, `date`, `teacher_id`, `action_type`, `details`, `previous`, `updated`, `student_id`, `status`, `school`) VALUES (NULL, '".$date3."', '".$_POST['teacher']."', 'Created a New folder', '".$uploaded."', '', '', '".$_GET['lrn']."', '','".$_SESSION['school']."');";
        if ($conn->query($sql123) === TRUE) {
          echo "<p>6".$type."</p>";
            } 
        header('location:student_file_folder.php?id='.$_GET['lrn'].'&alert=1');
    $conn->close();
}


?>