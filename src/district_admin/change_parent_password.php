<?php

include('../connect.php');

$id = $_POST['id'];
$pass=$_POST['password'];
$hashed_pass=password_hash($pass,PASSWORD_DEFAULT);


 $sql = "UPDATE `new_student` SET `password` = '".$hashed_pass."' WHERE `new_student`.`student_id` = $id;";

 if ($conn->query($sql) === TRUE) {
header('Location:parent_account.php?change=1');
 }


?>