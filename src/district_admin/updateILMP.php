<?php

include('../connect.php');

$ilmp_id = $_GET['id'];
$cnt=1;
$sqlilmp = "SELECT * FROM ilmp where ilmp_id = $ilmp_id";
$sqldatailmp = mysqli_query($conn, $sqlilmp) or die('Error Displaying Data'. mysqli_connect_error());

while ($ilmp = mysqli_fetch_assoc($sqldatailmp)) {

    $id = $ilmp['ilmpID'];

$sql ="UPDATE `ilmp` SET `learning_area` = '".$_POST['learning_area'.$cnt]."', `learner_need` = '".$_POST['learner_need'.$cnt]."', `intervention` = '".$_POST['intervention'.$cnt]."', `monitoring_date` = '".$_POST['monitoring_date'.$cnt]."', `insignificant` = '".$_POST['insignificant'.$cnt]."',
 `significant` = '".$_POST['significant'.$cnt]."', `mastery` = '".$_POST['mastery'.$cnt]."' WHERE `ilmp`.`ilmpID` = $id;";
if ($conn->query($sql) === TRUE) {

}

$cnt++;

}


header('location:student_file.php?folder_id='.$_GET['folder_id']."&id=".$_GET['lrn'].'&ilmpupdate=1');

?>