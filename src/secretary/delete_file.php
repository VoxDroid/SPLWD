<?php
if(isset($_GET['id'])){

include('../connect.php');
include('../session.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM student_files where student_files=$id";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());

while ($row = mysqli_fetch_assoc($sqldata)) {

  $uploaded="File Type: ".$row['file_type']." Description: ".$row['description']." Date: ".$row['date']; 
}

$date3 = date('Y-m-d');
$sql = "UPDATE `student_files` SET `status` = 'archive' WHERE `student_files`.`student_files` = $id;";

if ($conn->query($sql) === TRUE) {

  $sql123="INSERT INTO `log` (`log_id`, `date`, `teacher_id`, `action_type`, `details`, `previous`, `updated`, `student_id`, `status`) VALUES (NULL, '".$date3."', '".$_SESSION['teacher_id']."', 'Deleted a File', '".$uploaded."', '', '', '".$_SESSION['lrn']."', '');";
  if ($conn->query($sql123) === TRUE) {
    echo "<p>6".$type."</p>";
      } 
 header('location:student_file.php?id='.$_GET['lrn'].'&delete=1&folder_id='.$_GET['folder_id']);
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
}

if(isset($_GET['id1'])){

  include('../connect.php');
  include('../session.php');
  $id = $_GET['id1'];
  $sqlget = "SELECT * FROM student_files where student_files=$id";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());

while ($row = mysqli_fetch_assoc($sqldata)) {

  $uploaded="File Type: ".$row['file_type']." Description: ".$row['description']." Date: ".$row['date']; 
}
$date3 = date('Y-m-d');
  $sql = "UPDATE `student_files` SET `status` = '' WHERE `student_files`.`student_files` = $id;";
  
  if ($conn->query($sql) === TRUE) {
    $sql123="INSERT INTO `log` (`log_id`, `date`, `teacher_id`, `action_type`, `details`, `previous`, `updated`, `student_id`, `status`) VALUES (NULL, '".$date3."', '".$_SESSION['teacher_id']."', 'Retrieve a File', '".$uploaded."', '', '', '".$_SESSION['lrn']."', '');";
    if ($conn->query($sql123) === TRUE) {
      echo "<p>6".$type."</p>";
      header('location:archive.php?id='.$_SESSION['lrn']);
        } 

  } else {
    echo "Error updating record: " . $conn->error;
  }
  
  $conn->close();
  }

?>