<?php
include('../connect.php');
include('../session.php');
if(isset($_POST['submit'])){
  $lrn = $_GET['id'];
  $folder_id = $_GET['folder_id'];
    $type=1;
    while($type<=25){
      $type1=$_POST['1'.$type];
$sql = "UPDATE `progress_report` SET `q1` = '".$_POST['1'.$type.'q1']."', `q2` = '".$_POST['1'.$type.'q2']."', `q3` = '".$_POST['1'.$type.'q3']."', `q4` = '".$_POST['1'.$type.'q4']."' WHERE type = '$type1' and folder_id= $folder_id and  lrn = $lrn and progress_index=1;";


if ($conn->query($sql) === TRUE) {
  echo "<p>1".$type."</p>";
      } 
$type++;
    }

    $type=1;
    while($type<=20){
      $type2=$_POST['2'.$type];
$sql = "UPDATE `progress_report` SET `q1` = '".$_POST['2'.$type.'q1']."', `q2` = '".$_POST['2'.$type.'q2']."', `q3` = '".$_POST['2'.$type.'q3']."', `q4` = '".$_POST['2'.$type.'q4']."' WHERE type = '$type2' and folder_id= $folder_id and lrn = $lrn and progress_index=2;";


if ($conn->query($sql) === TRUE) {
  echo "<p>1".$type."</p>";
      } 
$type++;
    }

    $type=1;
    while($type<=18){
      $type3=$_POST['3'.$type];
$sql = "UPDATE `progress_report` SET `q1` = '".$_POST['3'.$type.'q1']."', `q2` = '".$_POST['3'.$type.'q2']."', `q3` = '".$_POST['3'.$type.'q3']."', `q4` = '".$_POST['3'.$type.'q4']."' WHERE type = '$type3' and folder_id= $folder_id and lrn = $lrn and progress_index=3;";


if ($conn->query($sql) === TRUE) {
  echo "<p>1".$type."</p>";
      } 
$type++;
    }

    $type=1;
    while($type<=23){
      $type4=$_POST['4'.$type];
$sql = "UPDATE `progress_report` SET `q1` = '".$_POST['4'.$type.'q1']."', `q2` = '".$_POST['4'.$type.'q2']."', `q3` = '".$_POST['4'.$type.'q3']."', `q4` = '".$_POST['4'.$type.'q4']."' WHERE type = '$type4' and folder_id= $folder_id and lrn = $lrn and progress_index=4;";


if ($conn->query($sql) === TRUE) {
  echo "<p>1".$type."</p>";
      } 
$type++;
    }

    $type=1;
    while($type<=23){
      $type5=$_POST['5'.$type];
$sql = "UPDATE `progress_report` SET `q1` = '".$_POST['5'.$type.'q1']."', `q2` = '".$_POST['5'.$type.'q2']."', `q3` = '".$_POST['5'.$type.'q3']."', `q4` = '".$_POST['5'.$type.'q4']."' WHERE type = '$type5' and folder_id= $folder_id and lrn = $lrn and progress_index=5;";


if ($conn->query($sql) === TRUE) {
  echo "<p>1".$type."</p>";
      } 
$type++;
    }

    $type=1;
    while($type<=21){
      $type6=$_POST['6'.$type];
$sql = "UPDATE `progress_report` SET `q1` = '".$_POST['6'.$type.'q1']."', `q2` = '".$_POST['6'.$type.'q2']."', `q3` = '".$_POST['6'.$type.'q3']."', `q4` = '".$_POST['6'.$type.'q4']."' WHERE type = '$type6' and folder_id= $folder_id and lrn = $lrn and progress_index=6;";


if ($conn->query($sql) === TRUE) {
  echo "<p>1".$type."</p>";
      } 
$type++;
    }

    echo $_POST['remark_id'];

    $remark =$_POST['remark_id'];
    $sql = "UPDATE `teachers_remark` SET `remark_q1` = '".$_POST['tq1']."', `remark_q2` = '".$_POST['tq2']."', `remark_q3` = '".$_POST['tq3']."', `remark_q4` = '".$_POST['tq4']."' WHERE `teachers_remark`.`remark_id` = $remark;";


    if ($conn->query($sql) === TRUE) {
      echo "<p>1".$type."</p>";
          } 


          $sql = "UPDATE `attendance` SET `june` = '".$_POST['june']."', `july` = '".$_POST['july']."', `aug` = '".$_POST['aug']."', `sept` = '".$_POST['sept']."', `oct` = '".$_POST['oct']."', `nov` = '".$_POST['nov']."', `dece` = '".$_POST['dece']."', `jan` = '".$_POST['jan']."', `feb` = '".$_POST['feb']."', `mar` = '".$_POST['mar']."', `apr` = '".$_POST['apr']."', `may` = '".$_POST['may']."' WHERE folder_id = $folder_id and lrn = $lrn and type = 1";


          if ($conn->query($sql) === TRUE) {
            echo "<p>1".$type."</p>";
                } 
                $sql = "UPDATE `attendance` SET `june` = '".$_POST['june1']."', `july` = '".$_POST['july1']."', `aug` = '".$_POST['aug1']."', `sept` = '".$_POST['sept1']."', `oct` = '".$_POST['oct1']."', `nov` = '".$_POST['nov1']."', `dece` = '".$_POST['dece1']."', `jan` = '".$_POST['jan1']."', `feb` = '".$_POST['feb1']."', `mar` = '".$_POST['mar1']."', `apr` = '".$_POST['apr1']."', `may` = '".$_POST['may1']."' WHERE folder_id = $folder_id and lrn = $lrn and type = 2";


                if ($conn->query($sql) === TRUE) {
                  echo "<p>1".$type."</p>";
                      } 




    header('location:student_file.php?id='.$lrn.'&folder_id='.$_GET['folder_id'].'#progress');
    $conn->close();
}


?>