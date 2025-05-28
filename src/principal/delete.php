<?php
if(isset($_GET['id'])){

include('../connect.php');
include('../session.php');
$id = $_GET['id'];
$sql = "DELETE FROM `student_files` WHERE student_files=$id";

if ($conn->query($sql) === TRUE) {
 header('location:archive.php?id1='.$_SESSION['lrn'].'&delete1=1');
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
}

if(isset($_GET['id1'])){

  include('../connect.php');
  include('../session.php');
  $id = $_GET['id1'];
  $sql = "UPDATE `student_files` SET `status` = '' WHERE `student_files`.`student_files` = $id;";
  
  if ($conn->query($sql) === TRUE) {
   header('location:archive.php?id1='.$_SESSION['lrn']);
  } else {
    echo "Error updating record: " . $conn->error;
  }
  
  $conn->close();
  }

?>