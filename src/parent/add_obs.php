<?php

include('../connect.php');
include('../session.php');

if(isset($_POST['submit'])){

$date=date('Y-m-d');


$sql = "INSERT INTO `parent_observation` (`observation_id`,`folder_id`, `lrn`, `observation`, `date`) VALUES (NULL, '".$_SESSION['folder_id']."', '".$_SESSION['id']."', '".$_POST['obs']."', '".$date."');";

if ($conn->query($sql) === TRUE) {
 header('location:add_observation.php?add=1');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
?>