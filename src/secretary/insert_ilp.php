<?php

include('../connect.php');
include('../session.php');

$folder_id = $_GET['folder_id'];
$lrn = $_GET['id'];

$sql ="INSERT INTO `ilp` (`ilp_id`, `lrn`, `folder_id`, `school_year`, `principal`, `educ_history`, `interview_learner`, `strenght_1`, `need_1`, `strenght_2`, `need_2`, `strenght_3`, `need_3`, `strenght_4`, `need_4`, `strenght_5`, `need_5`, `strenght_6`, `need_6`, `strenght_7`, `need_7`) 
VALUES (NULL, '".$lrn."', '".$folder_id."', '".$_POST['school_year']."', '".$_POST['principal']."', '".$_POST['educ_history']."', '".$_POST['interview_learner']."', '".$_POST['strenght1']."', '".$_POST['need1']."', '".$_POST['strenght2']."', '".$_POST['need2']."', '".$_POST['strenght3']."', '".$_POST['need3']."', '".$_POST['strenght4']."', '".$_POST['need4']."', '".$_POST['strenght5']."', '".$_POST['need5']."', '".$_POST['strenght6']."', '".$_POST['need6']."', '".$_POST['strenght7']."', '".$_POST['need7']."');";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  }


$sqlget11 = "SELECT * FROM ilp order by ilp_id desc";
$sqldata11 = mysqli_query($conn, $sqlget11) or die('Error Displaying Data'. mysqli_connect_error());

while ($row31 = mysqli_fetch_assoc($sqldata11)) {
    $id = $row31['ilp_id'];
    break;

}


$sql = "INSERT INTO `ilp_transition` (`transition_id`, `ilp_id`, `lrn`, `folder_id`, `transition1`, `transition2`, `transition3`, `transition4`, `transition5`) 
VALUES (NULL, '".$id."' , '".$lrn."', '".$folder_id."', '".$_POST['transition1']."', '".$_POST['transition2']."', '".$_POST['transition3']."', '".$_POST['transition4']."', '".$_POST['transition5']."');";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
}

$sql = "INSERT INTO `ilp_assessment` (`assessment_id`, `ilp_id`, `lrn`, `folder_id`, `type_assessment`, `date`, `chronological_age`, `administrator`, `result`, `date_interview`, `date_interview_student`) 
VALUES (NULL, '".$id."' , '".$lrn."', '".$folder_id."', '".$_POST['type_assessment']."', '".$_POST['date']."', '".$_POST['chronological_age']."', '".$_POST['administrator']."', '".$_POST['result']."', '".$_POST['date_interview']."', '".$_POST['date_interview_student']."');";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
}

$sql = "INSERT INTO `ilp_priority` (`priority_id`, `ilp_id`, `lrn`, `folder_id`, `priority1`, `priority2`, `priority3`, `priority4`, `priority5`, `priority6`, `priority7`)
 VALUES (NULL, '".$id."' , '".$lrn."', '".$folder_id."', '".$_POST['priority1']."', '".$_POST['priority2']."', '".$_POST['priority3']."', '".$_POST['priority4']."', '".$_POST['priority5']."', '".$_POST['priority6']."', '".$_POST['priority7']."');";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
}

$sql = "INSERT INTO `ilp_priority` (`priority_id`, `ilp_id`, `lrn`, `folder_id`, `priority1`, `priority2`, `priority3`, `priority4`, `priority5`, `priority6`, `priority7`)
 VALUES (NULL, '".$id."' , '".$lrn."', '".$folder_id."', '".$_POST['priority1']."', '".$_POST['priority2']."', '".$_POST['priority3']."', '".$_POST['priority4']."', '".$_POST['priority5']."', '".$_POST['priority6']."', '".$_POST['priority7']."');";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
}


?>