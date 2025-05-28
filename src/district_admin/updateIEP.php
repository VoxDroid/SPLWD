<?php

include('../connect.php');
$id = $_GET['id'];
$lrn =$_GET['lrn'];
$sql = "UPDATE `iep_functional` SET `functional_1` = '".$_POST['functional_1']."', `functional_2` = '".$_POST['functional_2']."', `functional_3` = '".$_POST['functional_3']."', `functional_4` = '".$_POST['functional_4']."', `functional_5` = '".$_POST['functional_5']."', `functional_1_2` = '".$_POST['functional_1_2']."', `functional_1_3` = '".$_POST['functional_1_3']."', `functional_2_2` = '".$_POST['functional_2_2']."', `functional_2_3` = '".$_POST['functional_2_3']."', `functional_3_2` = '".$_POST['functional_3_2']."', `functional_3_3` = '".$_POST['functional_3_3']."', `functional_4_2` = '".$_POST['functional_4_2']."', `functional_4_3` = '".$_POST['functional_4_3']."', `functional_5_2` = '".$_POST['functional_5_2']."', `functional_5_3` = '".$_POST['functional_5_3']."' WHERE `iep_functional`.`iep_id` = $id;";

if ($conn->query($sql) === TRUE) {

}
$sql = "UPDATE `iep_special_factor` SET `factor_1` = '".$_POST['factor_1']."', `factor_2` = '".$_POST['factor_2']."', `factor_3` = '".$_POST['factor_3']."', `comment_3` = '".$_POST['comment_3']."', `factor_4` = '".$_POST['factor_4']."', `comment_4` = '".$_POST['comment_4']."', `factor_5` = '".$_POST['factor_5']."', `comment_5` = '".$_POST['comment_5']."', `factor_6` = '".$_POST['factor_6']."', `comment_6` = '".$_POST['comment_6']."', `factor_7` = '".$_POST['factor_7']."', `comment_7` = '".$_POST['comment_7']."', `factor_8` = '".$_POST['factor_8']."', `comment_8` = '".$_POST['comment_8']."', `factor_8_type` = '".$_POST['factor_8_type']."', `factor_9` = '".$_POST['factor_9']."', `comment_9` = '".$_POST['comment_9']."' WHERE `iep_special_factor`.`iep_id` = $id;";
if ($conn->query($sql) === TRUE) {

}

$folder_id = $_GET['folder_id'];
$sqlget3 = "SELECT * FROM iep_barriers where folder_id = $folder_id and iep_id = $id";
$sqldata3 = mysqli_query($conn, $sqlget3) or die('Error Displaying Data'. mysqli_connect_error());
$count=0;
while ($row3 = mysqli_fetch_assoc($sqldata3)) {  
  $count++;

  $id1 = $row3['barrier_id'];


$sql = "UPDATE `iep_barriers` SET `barrier_1` = '".$_POST['barrier_1_'.$count]."', `barrier_2` = '".$_POST['barrier_2_'.$count]."', `barrier_3` = '".$_POST['barrier_3_'.$count]."', `barrier_4` = '".$_POST['barrier_4_'.$count]."' WHERE `iep_barriers`.`barrier_id` = $id1;";
if ($conn->query($sql) === TRUE) {

}
}

$count = 0;
$sqlget4 = "SELECT * FROM iep_goals where folder_id = $folder_id and iep_id = $id";
$sqldata4 = mysqli_query($conn, $sqlget4) or die('Error Displaying Data'. mysqli_connect_error());

while ($row4 = mysqli_fetch_assoc($sqldata4)) {  


  $count++;
  $id2 = $row4['goal_id'];

  $sql = "UPDATE `iep_goals` SET `interest` = '".$_POST['interest_'.$count]."', `goal` = '".$_POST['goal_'.$count]."', `intervention` = '".$_POST['intervention_'.$count]."', `timeline` = '".$_POST['timeline_'.$count]."', `individual_responsible` = '".$_POST['individual_responsible_'.$count]."', `remarks` = '".$_POST['remarks_'.$count]."', `progress` = '".$_POST['progress_'.$count]."' WHERE `iep_goals`.`goal_id` = $id2;";
if ($conn->query($sql) === TRUE) {

}
}

$count=0;
$sqlget5 = "SELECT * FROM iep_transition where folder_id = $folder_id and iep_id = $id";
$sqldata5 = mysqli_query($conn, $sqlget5) or die('Error Displaying Data'. mysqli_connect_error());

while ($row5 = mysqli_fetch_assoc($sqldata5)) { 
    $count++;
  $id3 = $row5['transition_id'];

  $sql = "UPDATE `iep_transition` SET `interest` = '".$_POST['interest1_'.$count]."', `work` = '".$_POST['work1_'.$count]."', `skills` = '".$_POST['skills1_'.$count]."', `individual_responsible` = '".$_POST['individual_responsible1_'.$count]."', `remarks` = '".$_POST['remarks1_'.$count]."' WHERE `iep_transition`.`transition_id` = $id3;";
if ($conn->query($sql) === TRUE) {

}

}

$seeing="";
$hearing="";
$concentrating="";
$remebering="";
$com="";
$moving="";
$d_other="";



if(isset($_POST['d_seeing'])) {
    $seeing=$_POST['d_seeing'];
}

if(isset($_POST['d_hearing'])) {
    $hearing=$_POST['d_hearing'];
}


if(isset($_POST['d_concentrating'])) {
    $concentrating=$_POST['d_concentrating'];
}


if(isset($_POST['d_remembering'])) {
    $remebering=$_POST['d_remembering'];
}


if(isset($_POST['d_com'])) {
    $com=$_POST['d_com'];
}


if(isset($_POST['d_moving'])) {
    $moving=$_POST['d_moving'];
}

if(isset($_POST['d_other'])) {
    $d_other=$_POST['d_other'];
}

$sql="UPDATE `iep_difficulty` SET `d_other` = '".$d_other."',`d_com` = '".$com."',`d_seeing` = '".$seeing."', `d_hearing` = '".$hearing."', `d_moving` = '".$moving."', `d_concentrating` = '".$concentrating."', `d_remembering` = '".$remebering."', `others` = '".$_POST['others']."', `others_2` = '".$_POST['others_2']."', `medical_diagnos` = '".$_POST['medical_diagnos']."', `date_meeting` = '".$_POST['date_meeting']."', `date_last_iep` = '".$_POST['date_last_iep']."', `purpose` = '".$_POST['purpose']."', `review_date` = '".$_POST['review_date']."', `comment` = '".$_POST['comment']."', `grade` = '".$_POST['grade']."' WHERE `iep_difficulty`.`iep_id` = $id;";
if ($conn->query($sql) === TRUE) {

}
$sql ="UPDATE `iep_team` SET `sp_teacher` = '".$_POST['sp_teacher']."',`psych` = '".$_POST['psych']."', `nurse` = '".$_POST['nurse']."', `therapist` = '".$_POST['therapist']."', `language` = '', `if_regular` = '".$_POST['if_1']."', `date` = '".$_POST['date_meeting']."', `guidance` = '".$_POST['guidance']."', `other_name` = '".$_POST['other_name']."', `principal` = '".$_POST['principal']."', `if_1` = '".$_POST['if_1']."', `dis_1` = '".$_POST['dis_1']."' WHERE `iep_team`.`iep_id` = $id;"; 
if ($conn->query($sql) === TRUE) {

}
header('location:student_file.php?id='.$lrn."&folder_id=".$_GET['folder_id']."&updateIEP=1");

?>