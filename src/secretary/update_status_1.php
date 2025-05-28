<?php

include('../connect.php');

$id = $_GET['id'];


 $sql = "UPDATE `new_student` SET `enroll_status` = 'Transferred',`school` = '".$_POST['enroll_status']."',`teacher_id` = '".$_POST['teacher']."' WHERE `new_student`.`student_id` = $id;";

 if ($conn->query($sql) === TRUE) {

 }


$iid = $_POST['teacher'];

$sqlget = "SELECT * FROM teachers where teacher_id = $iid";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());

while ($row = mysqli_fetch_assoc($sqldata)) { 

 $name = $row['fname']." ".$row['lname'];

}

$date = date('Y');
$sql = "INSERT INTO `teacher_history` (`history_id`, `teacher`, `date`, `lrn`) VALUES (NULL, '".$name."', '".$date."', '".$_GET['lrn']."');";

if ($conn->query($sql) === TRUE) {

}


header('Location:student_file_folder.php?id='.$_GET['lrn'].'&status=1');
?>

 


