<?php
if(isset($_GET['id'])){

include('../connect.php');
include('../session.php');
$id = $_GET['id'];
$sql = "UPDATE `teachers` SET `status` = 'decline' WHERE `teachers`.`id` = $id;";

if ($conn->query($sql) === TRUE) {
 header('location:pending_user.php?id=1');
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
}

if(isset($_GET['id1'])){

  include('../connect.php');
  include('../session.php');
  $id = $_GET['id1'];
  $sql = "UPDATE `teachers` SET `status` = 'approve' WHERE `teachers`.`id` = $id;";
  
  if ($conn->query($sql) === TRUE) {
    header('location:pending_user.php?id1=1');
  } else {
    echo "Error updating record: " . $conn->error;
  }
  
  $conn->close();
  }

?>