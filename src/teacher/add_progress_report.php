<?php
include('../connect.php');
include('../session.php');
if(isset($_POST['submit'])){
    $type=1;
    while($type<=25){

$sql = "INSERT INTO `progress_report` (`progress_id`, `lrn`, `year` , `progress_index`, `type`, `q1`, `q2`, `q3`, `q4`) VALUES (NULL, '".$_POST['lrn']."','".$_POST['progress_year']."',1, '".$_POST['1'.$type]."', '".$_POST['1'.$type.'q1']."', '".$_POST['1'.$type.'q2']."', '".$_POST['1'.$type.'q3']."', '".$_POST['1'.$type.'q4']."');";

if ($conn->query($sql) === TRUE) {
  echo "<p>1".$type."</p>";
      } 
$type++;
    }

    $type=1;
    while($type<=20){

$sql1 = "INSERT INTO `progress_report` (`progress_id`, `lrn`, `year`, `progress_index`, `type`, `q1`, `q2`, `q3`, `q4`) VALUES (NULL, '".$_POST['lrn']."','".$_POST['progress_year']."',2, '".$_POST['2'.$type]."', '".$_POST['2'.$type.'q1']."', '".$_POST['2'.$type.'q2']."', '".$_POST['2'.$type.'q3']."', '".$_POST['2'.$type.'q4']."');";

if ($conn->query($sql1) === TRUE) {
    echo "<p>2".$type."</p>";
      } 
$type++;
    }

    $type=1;
    while($type<=18){

$sql2 = "INSERT INTO `progress_report` (`progress_id`, `lrn`, `year`, `progress_index`, `type`, `q1`, `q2`, `q3`, `q4`) VALUES (NULL, '".$_POST['lrn']."','".$_POST['progress_year']."',3, '".$_POST['3'.$type]."', '".$_POST['3'.$type.'q1']."', '".$_POST['3'.$type.'q2']."', '".$_POST['3'.$type.'q3']."', '".$_POST['3'.$type.'q4']."');";

if ($conn->query($sql2) === TRUE) {
    echo "<p>3".$type."</p>";
      } 
$type++;
    }

    $type=1;
    while($type<=23){

$sql3 = "INSERT INTO `progress_report` (`progress_id`, `lrn`, `year`, `progress_index`, `type`, `q1`, `q2`, `q3`, `q4`) VALUES (NULL, '".$_POST['lrn']."','".$_POST['progress_year']."', 4,'".$_POST['4'.$type]."', '".$_POST['4'.$type.'q1']."', '".$_POST['4'.$type.'q2']."', '".$_POST['4'.$type.'q3']."', '".$_POST['4'.$type.'q4']."');";

if ($conn->query($sql3) === TRUE) {
    echo "<p>4".$type."</p>";
      } 
$type++;
    }

    $type=1;
    while($type<=23){

$sql4 = "INSERT INTO `progress_report` (`progress_id`, `lrn`, `year`, `progress_index`, `type`, `q1`, `q2`, `q3`, `q4`) VALUES (NULL, '".$_POST['lrn']."','".$_POST['progress_year']."',5, '".$_POST['5'.$type]."', '".$_POST['5'.$type.'q1']."', '".$_POST['5'.$type.'q2']."', '".$_POST['5'.$type.'q3']."', '".$_POST['5'.$type.'q4']."');";

if ($conn->query($sql4) === TRUE) {
    echo "<p>5".$type."</p>";
      } 
$type++;
    }

    $type=1;
    while($type<=21){

$sql5 = "INSERT INTO `progress_report` (`progress_id`, `lrn`, `year`, `progress_index`, `type`, `q1`, `q2`, `q3`, `q4`) VALUES (NULL, '".$_POST['lrn']."','".$_POST['progress_year']."',6, '".$_POST['6'.$type]."', '".$_POST['6'.$type.'q1']."', '".$_POST['6'.$type.'q2']."', '".$_POST['6'.$type.'q3']."', '".$_POST['6'.$type.'q4']."');";

if ($conn->query($sql5) === TRUE) {
    echo "<p>6".$type."</p>";
      } 
$type++;
    }

}
?>