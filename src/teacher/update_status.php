<?php

include('../connect.php');

$id = $_GET['id'];


 $sql = "UPDATE `new_student` SET `enroll_status` = '".$_POST['enroll_status']."' WHERE `new_student`.`student_id` = $id;";

 if ($conn->query($sql) === TRUE) {
header('Location:student_file_folder.php?id='.$_GET['lrn']);
 }


?>