<?php
include('../connect.php');
include('../session.php');
if(isset($_POST['submit'])){
   

$file_count=0;
$files="";

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
          $files .= " ".$_POST['type1'];
         
            $file = htmlspecialchars( basename( $_FILES["fileToUpload1"]["name"]));

            $command = '"C:\Program Files\LibreOffice\program\soffice.bin" --headless --convert-to pdf C:\xampp\htdocs\sc_district_profiling\ilp/'.$file.' --outdir C:\xampp\htdocs\sc_district_profiling\ilp/';
            exec($command);

            $filename_without_ext = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file);

            $pdf = $filename_without_ext.".pdf";
         
            $date = date('Y-m-d');
       $sql7 = "INSERT INTO `student_files` (`student_files`, `folder_id`, `lrn`, `teacher_id`, `year` , `file_type`, `file_name`, `description`, `date`, `school`, `doc`) VALUES (NULL,'".$_GET['folder_id']."', '".$_GET['id']."', '".$_SESSION['teacher_id']."', '".$_POST['year1']."', '".$_POST['type1']."', '".$pdf."', '".$_POST['des1']."', '".$date."','".$_SESSION['school']."','".$file."');";

if ($conn->query($sql7) === TRUE) {
    
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
          $files .=",".$_POST['type3'];

          $file = htmlspecialchars( basename( $_FILES["fileToUpload3"]["name"]));
          $command = '"C:\Program Files\LibreOffice\program\soffice.bin" --headless --convert-to pdf C:\xampp\htdocs\sc_district_profiling\ilp/'.$file.' --outdir C:\xampp\htdocs\sc_district_profiling\ilp/';
          exec($command);

          $filename_without_ext = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file);

          $pdf = $filename_without_ext.".pdf";
       
          $date = date('Y-m-d');
     $sql7 = "INSERT INTO `student_files` (`student_files`, `folder_id`, `lrn`, `teacher_id`, `year` , `file_type`, `file_name`, `description`, `date`, `school`, `doc`) VALUES (NULL,'".$_GET['folder_id']."', '".$_GET['id']."', '".$_SESSION['teacher_id']."', '".$_POST['year1']."', '".$_POST['type1']."', '".$pdf."', '".$_POST['des1']."', '".$date."','".$_SESSION['school']."','".$file."');";

if ($conn->query($sql7) === TRUE) {
  
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
          $files .=",".$_POST['type4'];
            $file = htmlspecialchars( basename( $_FILES["fileToUpload4"]["name"]));
            $command = '"C:\Program Files\LibreOffice\program\soffice.bin" --headless --convert-to pdf C:\xampp\htdocs\sc_district_profiling\ilp/'.$file.' --outdir C:\xampp\htdocs\sc_district_profiling\ilp/';
            exec($command);

            $filename_without_ext = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file);

            $pdf = $filename_without_ext.".pdf";
         
            $date = date('Y-m-d');
       $sql7 = "INSERT INTO `student_files` (`student_files`, `folder_id`, `lrn`, `teacher_id`, `year` , `file_type`, `file_name`, `description`, `date`, `school`, `doc`) VALUES (NULL,'".$_GET['folder_id']."', '".$_GET['id']."', '".$_SESSION['teacher_id']."', '".$_POST['year1']."', '".$_POST['type1']."', '".$pdf."', '".$_POST['des1']."', '".$date."','".$_SESSION['school']."','".$file."');";

if ($conn->query($sql7) === TRUE) {
    
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
          $files .= ",".$_POST['type2'];
            $file = htmlspecialchars( basename( $_FILES["fileToUpload2"]["name"]));
            $command = '"C:\Program Files\LibreOffice\program\soffice.bin" --headless --convert-to pdf C:\xampp\htdocs\sc_district_profiling\ilp/'.$file.' --outdir C:\xampp\htdocs\sc_district_profiling\ilp/';
            exec($command);

            $filename_without_ext = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file);

            $pdf = $filename_without_ext.".pdf";
         
            $date = date('Y-m-d');
       $sql7 = "INSERT INTO `student_files` (`student_files`, `folder_id`, `lrn`, `teacher_id`, `year` , `file_type`, `file_name`, `description`, `date`, `school`, `doc`) VALUES (NULL,'".$_GET['folder_id']."', '".$_GET['id']."', '".$_SESSION['teacher_id']."', '".$_POST['year1']."', '".$_POST['type1']."', '".$pdf."', '".$_POST['des1']."', '".$date."','".$_SESSION['school']."','".$file."');";

if ($conn->query($sql7) === TRUE) {
    
      }

        }
      
      
      }
    }

    $date3 = date('Y-m-d');
    $uploaded="Uploaded ".$file_count.$files;
    $sql123="INSERT INTO `log` (`log_id`, `date`, `teacher_id`, `action_type`, `details`, `previous`, `updated`, `student_id`, `status`, `school`) VALUES (NULL, '".$date3."', '".$_SESSION['teacher_id']."', 'Uploaded a File', '".$uploaded."', '', '', '".$_GET['id']."', '','".$_SESSION['school']."');";
    if ($conn->query($sql123) === TRUE) {
    
        } 
    header('location:student_file.php?id='.$_GET['id'].'&folder_id='.$_GET['folder_id']."&upload1=1");
    $conn->close();



?>