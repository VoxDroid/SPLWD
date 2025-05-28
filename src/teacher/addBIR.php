<?php

include('../connect.php');
include('../session.php');

$sql ="INSERT INTO `bir` (`bir`, `lrn`, `folder_id`, `teacher`, `principal`, `baseline`, `difficulty`, `with_`, `result`, `self`, `target`, `objective`, `bir_intervention`, `school_year`, `date`)
 VALUES (NULL, '".$_GET['lrn']."', '".$_GET['folder_id']."', '".$_POST['teacher']."', '".$_POST['principal']."', '".$_POST['baseline']."', '".$_POST['difficulty']."', '".$_POST['with_']."', '".$_POST['result']."', '".$_POST['self']."', '".$_POST['target']."', '".$_POST['objective']."', '".$_POST['bir_intervention']."', '".$_POST['school_year']."', '".$_POST['date_observation']."');";
if ($conn->query($sql) === TRUE) {

}

$sqlget11 = "SELECT * FROM bir order by bir desc";
$sqldata11 = mysqli_query($conn, $sqlget11) or die('Error Displaying Data'. mysqli_connect_error());

while ($row31 = mysqli_fetch_assoc($sqldata11)) {
    $bir = $row31['bir'];
    break;

}

$sql ="INSERT INTO `bir_intervention` (`bir_intervention_id`, `bir_id`, `lrn`, `folder_id`, `teacher_id`, `antecedent`, `observable`, `consequence`, `intervention_done`, `proactive`, `reactive`, `antecedent_2`, `antecedent_3`, `observable_2`, `observable_3`, `consequence_2`, `consequence_3`, `intervention_done_2`, `intervention_done_3`, `proactive_2`, `proactive_3`, `reactive_2`, `reactive_3`) 
VALUES (NULL, '".$bir."', '".$_GET['lrn']."', '".$_GET['folder_id']."', '".$_POST['teacher']."', '".$_POST['antecedent']."', '".$_POST['observable']."', '".$_POST['consequence']."', '".$_POST['intervention_done']."', '".$_POST['proactive']."', '".$_POST['reactive']."', '".$_POST['antecedent_2']."', '".$_POST['antecedent_3']."', '".$_POST['observable_2']."', '".$_POST['observable_3']."', '".$_POST['consequence_2']."', '".$_POST['consequence_3']."', '".$_POST['intervention_done_2']."', '".$_POST['intervention_done_3']."', '".$_POST['proactive_2']."', '".$_POST['proactive_3']."', '".$_POST['reactive_2']."', '".$_POST['reactive_3']."');";
if ($conn->query($sql) === TRUE) {

}

header('location:student_file.php?id='.$_GET['lrn'].'&folder_id='.$_GET['folder_id'].'&bir=1');
?>