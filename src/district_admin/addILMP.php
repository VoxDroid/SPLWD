<?php
include('../connect.php');
include('../session.php');

$date3 = date('Y-m-d');

$c_1 ="";
$c_2 ="";
$c_3 ="";
if(isset($_POST['c_1'])){ $c_1 = $_POST['c_1'];}
if(isset($_POST['c_2'])){ $c_1 = $_POST['c_2'];}
if(isset($_POST['c_3'])){ $c_1 = $_POST['c_3'];}

$sql ="INSERT INTO `ilmp_group` (`ilmp_group_id`, `folder_id`, `lrn`, `ilmp_date`, `c_1`, `c_2`, `c_3`) VALUES (NULL, '".$_GET['folder_id']."', '".$_GET['lrn']."','".$_POST['monitoring_date']."','".$c_1."','".$c_2."','".$c_3."');";
if ($conn->query($sql) === TRUE) {

}

$sqlget11 = "SELECT * FROM ilmp_group order by ilmp_group_id desc";
$sqldata11 = mysqli_query($conn, $sqlget11) or die('Error Displaying Data'. mysqli_connect_error());

while ($row31 = mysqli_fetch_assoc($sqldata11)) {
    $ilmp_group_id = $row31['ilmp_group_id'];
    break;

}
$folder_id = $_GET['folder_id'];
$sqlget11 = "SELECT * FROM folder where folder_id= $folder_id";
$sqldata11 = mysqli_query($conn, $sqlget11) or die('Error Displaying Data'. mysqli_connect_error());

while ($row31 = mysqli_fetch_assoc($sqldata11)) {
    $year = $row31['folder_year'];
    break;

}

$sql ="INSERT INTO `ilmp` (`ilmp_id`, `folder_id`, `lrn`, `learning_area`, `learner_need`, `intervention`, `monitoring_date`, `insignificant`, `significant`, `mastery`) VALUES 
('".$ilmp_group_id."', '".$_GET['folder_id']."', '".$_GET['lrn']."', '".$_POST['learning_area']."', '".$_POST['learner_need']."', '".$_POST['intervention']."', '".$_POST['monitoring_date']."', '".$_POST['insignificant']."', '".$_POST['significant']."', '".$_POST['mastery']."');";
if ($conn->query($sql) === TRUE) {

}

$sql ="INSERT INTO `ilmp` (`ilmp_id`, `folder_id`, `lrn`, `learning_area`, `learner_need`, `intervention`, `monitoring_date`, `insignificant`, `significant`, `mastery`) VALUES 
('".$ilmp_group_id."', '".$_GET['folder_id']."', '".$_GET['lrn']."', '".$_POST['learning_area2']."', '".$_POST['learner_need2']."', '".$_POST['intervention2']."', '".$_POST['monitoring_date2']."', '".$_POST['insignificant2']."', '".$_POST['significant2']."', '".$_POST['mastery2']."');";
if ($conn->query($sql) === TRUE) {

}

$sql ="INSERT INTO `ilmp` (`ilmp_id`, `folder_id`, `lrn`, `learning_area`, `learner_need`, `intervention`, `monitoring_date`, `insignificant`, `significant`, `mastery`) VALUES 
('".$ilmp_group_id."', '".$_GET['folder_id']."', '".$_GET['lrn']."', '".$_POST['learning_area3']."', '".$_POST['learner_need3']."', '".$_POST['intervention3']."', '".$_POST['monitoring_date3']."', '".$_POST['insignificant3']."', '".$_POST['significant3']."', '".$_POST['mastery3']."');";
if ($conn->query($sql) === TRUE) {

}

$des ="To folder year ".$year;

$sql123="INSERT INTO `log` (`log_id`, `date`, `teacher_id`, `action_type`, `details`, `previous`, `updated`, `student_id`, `status`, `school`) VALUES (NULL, '".$date3."', '".$_SESSION['teacher_id']."', 'Add ILMP', '".$des."', '', '', '".$_GET['lrn']."', '','".$_SESSION['school']."');";
if ($conn->query($sql123) === TRUE) {
 
    } 

    header('location:student_file.php?id='.$_GET['lrn'].'&folder_id='.$_GET['folder_id'].'&ilp=1');
?>