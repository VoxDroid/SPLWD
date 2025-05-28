<?php

include('../connect.php');
include('../session.php');

$ilp_id = $_GET['ilp_id'];

$sql = "UPDATE `ilp` SET  `principal` = '".$_POST['principal']."', `educ_history` = '".$_POST['educ_history']."', `interview_learner` = '".$_POST['interview']."', `strenght_1` = '".$_POST['strenght_1']."', `need_1` = '".$_POST['need_1']."', `strenght_2` = '".$_POST['strenght_2']."', `strenght_3` = '".$_POST['strenght_3']."', `need_2` = '".$_POST['need_2']."', `need_3` = '".$_POST['need_3']."', `strenght_4` = '".$_POST['strenght_4']."', `need_4` = '".$_POST['need_4']."', `strenght_5` = '".$_POST['strenght_5']."', `need_5` = '".$_POST['need_5']."', `strenght_6` = '".$_POST['strenght_6']."', `strenght_7` = '".$_POST['strenght_7']."', `need_6` = '".$_POST['need_6']."', `need_7` = '".$_POST['need_7']."' WHERE `ilp`.`ilp_id` = $ilp_id ;";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  }

$sql = "UPDATE `ilp_assessment` SET `type_assessment` = '".$_POST['type_assessment']."', `chronological_age` = '".$_POST['chronological_age']."', `date` = '".$_POST['date']."', `administrator` = '".$_POST['administrator']."', `result` = '".$_POST['result']."', `date_interview` = '".$_POST['date1']."', `date_interview_student` = '".$_POST['date2']."', `adviser` = '".$_POST['adviser']."' WHERE `ilp_assessment`.`ilp_id` = $ilp_id ;";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  }



  $sql ="UPDATE `ilp_priority` SET `priority1` = '".$_POST['priority1']."', `priority2` = '".$_POST['priority2']."', `priority3` = '".$_POST['priority3']."', `priority4` = '".$_POST['priority4']."', `priority5` = '".$_POST['priority5']."', `priority6` = '".$_POST['priority6']."', `priority7` = '".$_POST['priority7']."' WHERE `ilp_priority`.`ilp_id` = $ilp_id ;";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  }

  $sql = "UPDATE `ilp_transition` SET `transition1` = '".$_POST['transition1']."', `transition2` = '".$_POST['transition2']."', `transition3` = '".$_POST['transition3']."', `transition4` = '".$_POST['transition4']."', `transition5` = '".$_POST['transition5']."' WHERE `ilp_transition`.`ilp_id` = $ilp_id ;";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  }

  // $sql = "INSERT INTO `ilp_transition` (`transition_id`, `ilp_id`, `lrn`, `folder_id`, `transition1`, `transition2`, `transition3`, `transition4`, `transition5`) 
// VALUES (NULL, '".$id."' , '".$lrn."', '".$folder_id."', '".$_POST['transition1']."', '".$_POST['transition2']."', '".$_POST['transition3']."', '".$_POST['transition4']."', '".$_POST['transition5']."');";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// }

// $sql = "INSERT INTO `ilp_assessment` (`assessment_id`, `ilp_id`, `lrn`, `folder_id`, `type_assessment`, `date`, `chronological_age`, `administrator`, `result`, `date_interview`, `date_interview_student`) 
// VALUES (NULL, '".$id."' , '".$lrn."', '".$folder_id."', '".$_POST['type_assessment']."', '".$_POST['date']."', '".$_POST['chronological_age']."', '".$_POST['administrator']."', '".$_POST['result']."', '".$_POST['date_interview']."', '".$_POST['date_interview_student']."');";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// }

// $sql = "INSERT INTO `ilp_priority` (`priority_id`, `ilp_id`, `lrn`, `folder_id`, `priority1`, `priority2`, `priority3`, `priority4`, `priority5`, `priority6`, `priority7`)
//  VALUES (NULL, '".$id."' , '".$lrn."', '".$folder_id."', '".$_POST['priority1']."', '".$_POST['priority2']."', '".$_POST['priority3']."', '".$_POST['priority4']."', '".$_POST['priority5']."', '".$_POST['priority6']."', '".$_POST['priority7']."');";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// }

// $sql = "INSERT INTO `ilp_priority` (`priority_id`, `ilp_id`, `lrn`, `folder_id`, `priority1`, `priority2`, `priority3`, `priority4`, `priority5`, `priority6`, `priority7`)
//  VALUES (NULL, '".$id."' , '".$lrn."', '".$folder_id."', '".$_POST['priority1']."', '".$_POST['priority2']."', '".$_POST['priority3']."', '".$_POST['priority4']."', '".$_POST['priority5']."', '".$_POST['priority6']."', '".$_POST['priority7']."');";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// }

header('location:student_file.php?id='.$_GET['id'].'&folder_id='.$_GET['folder_id'].'&updateilp=1');
?>