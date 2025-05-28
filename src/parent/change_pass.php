<?php

include('../connect.php');
include('../session.php');

if(isset($_POST['submit'])){

$date=date('Y-m-d');
$pass=$_POST['password'];
$hashed_pass=password_hash($pass,PASSWORD_DEFAULT);

$iid = $_SESSION['logged_in'];
$sql = "UPDATE `new_student` SET `password` = '".$hashed_pass."' WHERE `new_student`.`lrn` = $iid ;";

if ($conn->query($sql) === TRUE) {
  header('location:student_file.php?change=1');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
?>