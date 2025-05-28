<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
include('../connect.php');
include('../session.php');
if(isset($_POST['submit'])){
    $id=$_SESSION['logged_id'];

    $updated = "";


$sqlget = "SELECT * FROM teachers where teacher_id=$id";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());

while ($row = mysqli_fetch_assoc($sqldata))  {

  if($row['fname']!=$_POST['fname']){

    $updated .= "First name (".$row['fname']." to ".$_POST['fname']."),";

  }

  if($row['mname']!=$_POST['mname']){

    $updated .= "Middle name (".$row['mname']." to ".$_POST['mname']."),";

  }

  if($row['lname']!=$_POST['lname']){

    $updated .= "Last name (".$row['lname']." to ".$_POST['lname']."),";

  }


}




   
$sql = "UPDATE `teachers` SET `fname` = '".$_POST['fname']."', `lname` = '".$_POST['lname']."', `mname` = '".$_POST['mname']."', `birth_date` = '".$_POST['birth_date']."', `address` = '".$_POST['address']."', `contact_no` = '".$_POST['contact_no']."', `email` = '".$_POST['email']."' WHERE `teachers`.`id` = $id;";

if ($conn->query($sql) === TRUE) {

  $date3 = date('Y-m-d');
  $uploaded="Uploaded ".$file_count.$files;
  $sql123="INSERT INTO `log` (`log_id`, `date`, `teacher_id`, `action_type`, `details`, `previous`, `updated`, `student_id`, `status`, `school`) VALUES (NULL, '".$date3."', '".$_SESSION['teacher_id']."', 'Update profile information', '".$updated."', '', '', '', '','".$_SESSION['school']."');";
  if ($conn->query($sql123) === TRUE) {
  
      } 
  header('location:profile.php?update_profile=1');
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
}
?>