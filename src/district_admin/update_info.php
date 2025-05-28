<?php
include('../connect.php');
if(isset($_POST['update'])){
    $lrn=$_POST['lrn'];
    $st_id=$_POST['student_id'];
$sql = "UPDATE `student` SET `lrn` = '".$_POST['lrn']."', `teacher_id` = '".$_POST['teacher_id']."', `fname` = '".$_POST['fname']."', `lname` = '".$_POST['lname']."', `mname` = '".$_POST['mname']."', `birth_date` = '".$_POST['birth_date']."', `address` = '".$_POST['address']."', `guardian` = '".$_POST['guardian']."', `contact_no` = '".$_POST['contact_no']."', `category` = '2' WHERE `student`.`student_id` = $st_id;";

if ($conn->query($sql) === TRUE) {
echo "<script type='text/javascript'>
	swal({
  title: 'Good job!',
  text: 'You clicked the button!',
  icon: 'success',
});
</script>";
 header('Location:student_profile.php?lrn='.$lrn);
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
}
?>
