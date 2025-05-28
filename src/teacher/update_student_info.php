<?php
include('../connect.php');
include('../session.php');

$id = $_POST['id'];

$sql = "UPDATE `new_student` SET `fname` = '".$_POST['fname']."', `lname` = '".$_POST['lname']."', `mname` = '".$_POST['mname']."', `m_tounge` = '".$_POST['m_tounge']."', `birth_date` = '".$_POST['birth_date']."', `birth_place` = '".$_POST['birth_place']."', `gender` = '".$_POST['gender']."', `address` = '".$_POST['address']."', `guardian` = '".$_POST['guardian']."', `work` = '".$_POST['work']."', `email` = '".$_POST['email']."', `guardian_mtounge` = '".$_POST['guardian_mtounge']."', `gurdian_contact` = '".$_POST['guardian_contact']."' WHERE `new_student`.`student_id` = $id;
";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
 header('location:student_file_folder.php?id='.$_GET['lrn'].'&update=1');
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>