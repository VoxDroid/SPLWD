<?php

include('../connect.php');
include('../session.php');
$id = $_GET['id'];

$sql = "UPDATE `bir` SET `teacher` = '".$_POST['teacher']."', `principal` = '".$_POST['principal']."', `baseline` = '".$_POST['baseline']."', `difficulty` = '".$_POST['difficulty']."', `with_` = '".$_POST['with_']."', `result` = '".$_POST['result']."', `self` = '".$_POST['self']."', `target` = '".$_POST['target']."', `objective` = '".$_POST['objective']."', `bir_intervention` = '".$_POST['bir_intervention']."', `school_year` = '".$_POST['school_year']."', `date` = '".$_POST['date_observation']."' WHERE `bir`.`bir` = $id;";

if ($conn->query($sql) === TRUE) {

}



$sql = "UPDATE `bir_intervention` SET `teacher_id` = '".$_POST['teacher']."', `antecedent` = '".$_POST['antecedent']."', `observable` = '".$_POST['observable']."', `consequence` = '".$_POST['consequence']."', `intervention_done` = '".$_POST['intervention_done']."', `proactive` = '".$_POST['proactive']."', `reactive` = '".$_POST['reactive']."', `antecedent_2` = '".$_POST['antecedent_2']."', `antecedent_3` = '".$_POST['antecedent_3']."', `observable_2` = '".$_POST['observable_2']."', `observable_3` = '".$_POST['observable_3']."', `consequence_2` = '".$_POST['consequence_2']."', `consequence_3` = '".$_POST['consequence_3']."', `intervention_done_2` = '".$_POST['intervention_done_2']."', `intervention_done_3` = '".$_POST['intervention_done_3']."', `proactive_2` = '".$_POST['proactive_2']."', `proactive_3` = '".$_POST['proactive_3']."', `reactive_2` = '".$_POST['reactive_2']."', `reactive_3` = '".$_POST['reactive_3']."' WHERE `bir_intervention`.`bir_id` = $id;";
if ($conn->query($sql) === TRUE) {

}

header('location:student_file.php?id='.$_GET['lrn'].'&folder_id='.$_GET['folder_id'].'&updatebir=1');
?>