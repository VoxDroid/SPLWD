<?php

include('../connect.php');

$id = $_POST['id'];
$pass=$_POST['password'];
$hashed_pass=password_hash($pass,PASSWORD_DEFAULT);


 $sql = "UPDATE `teachers` SET `password` = '".$hashed_pass."' WHERE `teachers`.`id` = $id;";

 if ($conn->query($sql) === TRUE) {
header('Location:user.php?change=1');
 }


?>