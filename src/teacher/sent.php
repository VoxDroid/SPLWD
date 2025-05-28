<?php
$a=$_GET['id'];
include("../connect.php");
include("../session.php");
if(isset($_POST['send'])){
$id=$_GET['id'];
$msg=$_POST['msg'];
$date = date("m-d-y");
$hey=$_SESSION['logged_id'];

$sql = "INSERT INTO `message` (`msg_id`,`sender`, `receiver`, `message`,`date_time`) VALUES (NULL,'".$hey."', '".$a."', '".$msg."', '".$date."');";

  
if ($conn->query($sql) == TRUE) {
  

              } 
              header("Location: chat.php?id=$a");
            }

?>