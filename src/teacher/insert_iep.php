<?php

include('../connect.php');
include('../session.php');


$va1="";
$va2="";
$va3="";
$va4="";
$va5="";
$va6="";



if(isset( $_POST['d1'])) {
    $va1=$_POST['d1'];
}

if(isset( $_POST['d2'])) {
    $va2=$_POST['d2'];
}


if(isset( $_POST['d3'])) {
    $va3=$_POST['d3'];
}


if(isset( $_POST['d4'])) {
    $va4=$_POST['d4'];
}


if(isset( $_POST['d5'])) {
    $va5=$_POST['d5'];
}


if(isset( $_POST['d6'])) {
    $va6=$_POST['d6'];
}

$sql ="INSERT INTO `iep_difficulty` (`iep_id`, `folder_id`, `teacher_id`, `lrn`, `d_seeing`, `d_hearing`, `d_com`, `d_moving`, `d_concentrating`, `d_remembering`, `others`, `others_2`, `medical_diagnos`, `date_meeting`, `date_last_iep`, `purpose`, `review_date`, `comment`, `grade`) VALUES (NULL, '".$_GET['folder_id']."', '".$_SESSION['teacher_id']."', '".$_POST['lrn']."', '".$va6."', '".$va1."', '".$va2."', '".$va3."', '".$va4."', '".$va5."', '".$_POST['others']."', '".$_POST['others_2']."', '".$_POST['medical_diagnos']."', '".$_POST['date_meeting']."', '".$_POST['date_last_iep']."', '".$_POST['purpose']."', '".$_POST['review_date']."','".$_POST['comment']."','".$_POST['grade']."');";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  }


$sqlget11 = "SELECT * FROM iep_difficulty order by iep_id desc";
$sqldata11 = mysqli_query($conn, $sqlget11) or die('Error Displaying Data'. mysqli_connect_error());

while ($row31 = mysqli_fetch_assoc($sqldata11)) {
    $id = $row31['iep_id'];
    break;

}

$bar1 ="INSERT INTO `iep_barriers` (`barrier_id`, `iep_id`, `folder_id`, `lrn`, `barrier_1`, `barrier_2`, `barrier_3`, `barrier_4`) VALUES (NULL, '".$id."','".$_GET['folder_id']."', '".$_POST['lrn']."', '".$_POST['functional_1']."', '".$_POST['functional_2']."', '".$_POST['functional_3']."', '".$_POST['functional_4']."');";
$bar2 ="INSERT INTO `iep_barriers` (`barrier_id`, `iep_id`, `folder_id`, `lrn`, `barrier_1`, `barrier_2`, `barrier_3`, `barrier_4`) VALUES (NULL, '".$id."','".$_GET['folder_id']."', '".$_POST['lrn']."', '".$_POST['functional_12']."', '".$_POST['functional_22']."', '".$_POST['functional_32']."', '".$_POST['functional_42']."');";
$bar3 ="INSERT INTO `iep_barriers` (`barrier_id`, `iep_id`, `folder_id`, `lrn`, `barrier_1`, `barrier_2`, `barrier_3`, `barrier_4`) VALUES (NULL, '".$id."','".$_GET['folder_id']."', '".$_POST['lrn']."', '".$_POST['functional_13']."', '".$_POST['functional_23']."', '".$_POST['functional_33']."', '".$_POST['functional_43']."');";
$bar4 ="INSERT INTO `iep_barriers` (`barrier_id`, `iep_id`, `folder_id`, `lrn`, `barrier_1`, `barrier_2`, `barrier_3`, `barrier_4`) VALUES (NULL, '".$id."','".$_GET['folder_id']."', '".$_POST['lrn']."', '".$_POST['functional_14']."', '".$_POST['functional_24']."', '".$_POST['functional_34']."', '".$_POST['functional_44']."');";
$bar5 ="INSERT INTO `iep_barriers` (`barrier_id`, `iep_id`, `folder_id`, `lrn`, `barrier_1`, `barrier_2`, `barrier_3`, `barrier_4`) VALUES (NULL, '".$id."','".$_GET['folder_id']."', '".$_POST['lrn']."', '".$_POST['functional_15']."', '".$_POST['functional_25']."', '".$_POST['functional_35']."', '".$_POST['functional_45']."');";
if ($conn->query($bar1) === TRUE) {
    echo "New record created successfully";
  }
  if ($conn->query($bar2) === TRUE) {
    echo "New record created successfully";
  }
  if ($conn->query($bar3) === TRUE) {
    echo "New record created successfully";
  }
  if ($conn->query($bar4) === TRUE) {
    echo "New record created successfully";
  }
  if ($conn->query($bar5) === TRUE) {
    echo "New record created successfully";
  }
  


if($_POST['functional_1_1']!=''){


$sql3 ="INSERT INTO `iep_functional` (`functional_id`, `iep_id`, `folder_id`, `lrn`, `functional_1`, `functional_2`, `functional_3`, `functional_4`, `functional_5`) VALUES (NULL, '".$id."','".$_GET['folder_id']."', '".$_POST['lrn']."', '".$_POST['functional_1_1']."', '', '', '', '');";
if ($conn->query($sql3) === TRUE) {
    echo "New record created successfully";
  }
}

if($_POST['functional_1_2']!=''){


    $sql3 ="INSERT INTO `iep_functional` (`functional_id`, `iep_id`, `folder_id`, `lrn`, `functional_1`, `functional_2`, `functional_3`, `functional_4`, `functional_5`) VALUES (NULL, '".$id."','".$_GET['folder_id']."', '".$_POST['lrn']."', '".$_POST['functional_1_2']."', '', '', '', '');";
    if ($conn->query($sql3) === TRUE) {
        echo "New record created successfully";
      }
    }
    if($_POST['functional_1_3']!=''){


        $sql3 ="INSERT INTO `iep_functional` (`functional_id`, `iep_id`, `folder_id`, `lrn`, `functional_1`, `functional_2`, `functional_3`, `functional_4`, `functional_5`) VALUES (NULL, '".$id."','".$_GET['folder_id']."', '".$_POST['lrn']."', '".$_POST['functional_1_3']."', '', '', '', '');";
        if ($conn->query($sql3) === TRUE) {
            echo "New record created successfully";
          }
        }
        if($_POST['functional_2_1']!=''){


            $sql3 ="INSERT INTO `iep_functional` (`functional_id`, `iep_id`, `folder_id`, `lrn`, `functional_1`, `functional_2`, `functional_3`, `functional_4`, `functional_5`) VALUES (NULL, '".$id."','".$_GET['folder_id']."', '".$_POST['lrn']."', '', '".$_POST['functional_2_1']."', '', '', '');";
            if ($conn->query($sql3) === TRUE) {
                echo "New record created successfully";
              }
            }
            if($_POST['functional_2_2']!=''){


                $sql3 ="INSERT INTO `iep_functional` (`functional_id`, `iep_id`, `folder_id`, `lrn`, `functional_1`, `functional_2`, `functional_3`, `functional_4`, `functional_5`) VALUES (NULL, '".$id."','".$_GET['folder_id']."', '".$_POST['lrn']."', '', '".$_POST['functional_2_2']."', '', '', '');";
                if ($conn->query($sql3) === TRUE) {
                    echo "New record created successfully";
                  }
                }

                if($_POST['functional_2_3']!=''){


                    $sql3 ="INSERT INTO `iep_functional` (`functional_id`, `iep_id`, `folder_id`, `lrn`, `functional_1`, `functional_2`, `functional_3`, `functional_4`, `functional_5`) VALUES (NULL, '".$id."','".$_GET['folder_id']."', '".$_POST['lrn']."', '', '".$_POST['functional_2_3']."', '', '', '');";
                    if ($conn->query($sql3) === TRUE) {
                        echo "New record created successfully";
                      }
                    }

                    if($_POST['functional_3_1']!=''){


                        $sql3 ="INSERT INTO `iep_functional` (`functional_id`, `iep_id`, `folder_id`, `lrn`, `functional_1`, `functional_2`, `functional_3`, `functional_4`, `functional_5`) VALUES (NULL, '".$id."','".$_GET['folder_id']."', '".$_POST['lrn']."', '', '', '".$_POST['functional_3_1']."', '', '');";
                        if ($conn->query($sql3) === TRUE) {
                            echo "New record created successfully";
                          }
                        }
                        if($_POST['functional_3_2']!=''){


                            $sql3 ="INSERT INTO `iep_functional` (`functional_id`, `iep_id`, `folder_id`, `lrn`, `functional_1`, `functional_2`, `functional_3`, `functional_4`, `functional_5`) VALUES (NULL, '".$id."','".$_GET['folder_id']."', '".$_POST['lrn']."', '', '', '".$_POST['functional_3_2']."', '', '');";
                            if ($conn->query($sql3) === TRUE) {
                                echo "New record created successfully";
                              }
                            }

                            if($_POST['functional_3_3']!=''){


                                $sql3 ="INSERT INTO `iep_functional` (`functional_id`, `iep_id`, `folder_id`, `lrn`, `functional_1`, `functional_2`, `functional_3`, `functional_4`, `functional_5`) VALUES (NULL, '".$id."','".$_GET['folder_id']."', '".$_POST['lrn']."', '', '', '".$_POST['functional_3_3']."', '', '');";
                                if ($conn->query($sql3) === TRUE) {
                                    echo "New record created successfully";
                                  }
                                }

                                if($_POST['functional_4_1']!=''){


                                    $sql3 ="INSERT INTO `iep_functional` (`functional_id`, `iep_id`, `folder_id`, `lrn`, `functional_1`, `functional_2`, `functional_3`, `functional_4`, `functional_5`) VALUES (NULL, '".$id."','".$_GET['folder_id']."', '".$_POST['lrn']."', '', '', '', '".$_POST['functional_4_1']."', '');";
                                    if ($conn->query($sql3) === TRUE) {
                                        echo "New record created successfully";
                                      }
                                    }

                                    if($_POST['functional_4_2']!=''){


                                        $sql3 ="INSERT INTO `iep_functional` (`functional_id`, `iep_id`, `folder_id`, `lrn`, `functional_1`, `functional_2`, `functional_3`, `functional_4`, `functional_5`) VALUES (NULL, '".$id."','".$_GET['folder_id']."', '".$_POST['lrn']."', '', '', '', '".$_POST['functional_4_2']."', '');";
                                        if ($conn->query($sql3) === TRUE) {
                                            echo "New record created successfully";
                                          }
                                        }

                                        if($_POST['functional_4_3']!=''){


                                            $sql3 ="INSERT INTO `iep_functional` (`functional_id`, `iep_id`, `folder_id`, `lrn`, `functional_1`, `functional_2`, `functional_3`, `functional_4`, `functional_5`) VALUES (NULL, '".$id."','".$_GET['folder_id']."', '".$_POST['lrn']."', '', '', '', '".$_POST['functional_4_3']."', '');";
                                            if ($conn->query($sql3) === TRUE) {
                                                echo "New record created successfully";
                                              }
                                            }

                                            if($_POST['functional_5_1']!=''){


                                                $sql3 ="INSERT INTO `iep_functional` (`functional_id`, `iep_id`, `folder_id`, `lrn`, `functional_1`, `functional_2`, `functional_3`, `functional_4`, `functional_5`) VALUES (NULL, '".$id."','".$_GET['folder_id']."', '".$_POST['lrn']."', '', '', '', '', '".$_POST['functional_5_1']."');";
                                                if ($conn->query($sql3) === TRUE) {
                                                    echo "New record created successfully";
                                                  }
                                                }

                                                if($_POST['functional_5_2']!=''){


                                                    $sql3 ="INSERT INTO `iep_functional` (`functional_id`, `iep_id`, `folder_id`, `lrn`, `functional_1`, `functional_2`, `functional_3`, `functional_4`, `functional_5`) VALUES (NULL, '".$id."','".$_GET['folder_id']."', '".$_POST['lrn']."', '', '', '', '', '".$_POST['functional_5_2']."');";
                                                    if ($conn->query($sql3) === TRUE) {
                                                        echo "New record created successfully";
                                                      }
                                                    }

                                                    if($_POST['functional_5_3']!=''){


                                                        $sql3 ="INSERT INTO `iep_functional` (`functional_id`, `iep_id`, `folder_id`, `lrn`, `functional_1`, `functional_2`, `functional_3`, `functional_4`, `functional_5`) VALUES (NULL, '".$id."','".$_GET['folder_id']."', '".$_POST['lrn']."', '', '', '', '', '".$_POST['functional_5_3']."');";
                                                        if ($conn->query($sql3) === TRUE) {
                                                            echo "New record created successfully";
                                                          }
                                                        }
    

$goal1="INSERT INTO `iep_goals` (`goal_id`, `iep_id`, `folder_id`, `lrn`, `interest`, `goal`, `intervention`, `timeline`, `individual_responsible`, `remarks`, `progress`) VALUES (NULL, '".$id."','".$_GET['folder_id']."', '".$_POST['lrn']."', '".$_POST['interest']."', '".$_POST['goal']."', '".$_POST['intervention']."', '".$_POST['timeline']."', '".$_POST['individual_responsible']."', '".$_POST['remarks']."', '".$_POST['progress']."');";
$goal2="INSERT INTO `iep_goals` (`goal_id`, `iep_id`, `folder_id`, `lrn`, `interest`, `goal`, `intervention`, `timeline`, `individual_responsible`, `remarks`, `progress`) VALUES (NULL, '".$id."','".$_GET['folder_id']."', '".$_POST['lrn']."', '".$_POST['interest2']."', '".$_POST['goal2']."', '".$_POST['intervention2']."', '".$_POST['timeline2']."', '".$_POST['individual_responsible2']."', '".$_POST['remarks2']."', '".$_POST['progress2']."');";
$goal3="INSERT INTO `iep_goals` (`goal_id`, `iep_id`, `folder_id`, `lrn`, `interest`, `goal`, `intervention`, `timeline`, `individual_responsible`, `remarks`, `progress`) VALUES (NULL, '".$id."','".$_GET['folder_id']."', '".$_POST['lrn']."', '".$_POST['interest3']."', '".$_POST['goal3']."', '".$_POST['intervention3']."', '".$_POST['timeline3']."', '".$_POST['individual_responsible3']."', '".$_POST['remarks3']."', '".$_POST['progress3']."');";
$goal4="INSERT INTO `iep_goals` (`goal_id`, `iep_id`, `folder_id`, `lrn`, `interest`, `goal`, `intervention`, `timeline`, `individual_responsible`, `remarks`, `progress`) VALUES (NULL, '".$id."','".$_GET['folder_id']."', '".$_POST['lrn']."', '".$_POST['interest4']."', '".$_POST['goal4']."', '".$_POST['intervention4']."', '".$_POST['timeline4']."', '".$_POST['individual_responsible4']."', '".$_POST['remarks4']."', '".$_POST['progress4']."');";

if ($conn->query($goal1) === TRUE) {
    echo "New record created successfully";
  }
  if ($conn->query($goal2) === TRUE) {
    echo "New record created successfully";
  }
  if ($conn->query($goal3) === TRUE) {
    echo "New record created successfully";
  }
  if ($conn->query($goal4) === TRUE) {
    echo "New record created successfully";
  }
  


$sql5="INSERT INTO `iep_special_factor` (`special_factor_id`, `iep_id`, `folder_id`, `lrn`, `factor_1`, `factor_2`, `factor_3`, `comment_3`, `factor_4`, `comment_4`, `factor_5`, `comment_5`, `factor_6`, `comment_6`, `factor_7`, `comment_7`, `factor_8`, `comment_8`, `factor_8_type`, `factor_9`, `comment_9`) VALUES (NULL, '".$id."','".$_GET['folder_id']."', '".$_POST['lrn']."', '".$_POST['factor_1']."', '".$_POST['factor_2']."', '".$_POST['factor_3']."', '".$_POST['comment_3']."', '".$_POST['factor_4']."', '".$_POST['comment_4']."', '".$_POST['factor_5']."', '".$_POST['comment_5']."', '".$_POST['factor_6']."', '".$_POST['comment_6']."', '".$_POST['factor_7']."', '".$_POST['comment_7']."', '".$_POST['factor_8']."', '".$_POST['comment_8']."', '".$_POST['factor_8_type']."', '".$_POST['factor_9']."', '".$_POST['comment_9']."');";
if ($conn->query($sql5) === TRUE) {
    echo "New record created successfully";
  }

$if = '';
$dis = '';

if(isset( $_POST['if_1'])) {
    $if=$_POST['if_1'];
}


if(isset( $_POST['if_2'])) {
    $if=$_POST['if_2'];
}


if(isset( $_POST['dis_1'])) {
    $dis=$_POST['dis_1'];
}


if(isset( $_POST['dis_2'])) {
    $dis=$_POST['dis_2'];
}
$sql6="INSERT INTO `iep_team` (`team_id`, `iep_id`, `folder_id`, `lrn`, `psych`, `nurse`, `therapist`, `language`, `if_regular`, `date`, `guidance`, `other_name`, `principal`, `if_1`, `dis_1`) VALUES (NULL, '".$id."','".$_GET['folder_id']."', '".$_POST['lrn']."', '".$_POST['psych']."', '".$_POST['nurse']."', '".$_POST['therapist']."', '', '', '".$_POST['date_meeting']."', '".$_POST['guidance']."', '".$_POST['other_name']."', '".$_POST['principal']."', '".$if."', '".$dis."');";

if ($conn->query($sql6) === TRUE) {
    echo "New record created successfully";
  }

$trans1="INSERT INTO `iep_transition` (`transition_id`, `iep_id`, `folder_id`, `lrn`, `interest`, `work`, `skills`, `individual_responsible`, `remarks`) VALUES (NULL, '".$id."','".$_GET['folder_id']."', '".$_POST['lrn']."', '".$_POST['transition_interest']."', '".$_POST['work']."', '".$_POST['skills']."', '".$_POST['individual']."', '".$_POST['transition_remarks']."');";
$trans2="INSERT INTO `iep_transition` (`transition_id`, `iep_id`, `folder_id`, `lrn`, `interest`, `work`, `skills`, `individual_responsible`, `remarks`) VALUES (NULL, '".$id."','".$_GET['folder_id']."', '".$_POST['lrn']."', '".$_POST['transition_interest2']."', '".$_POST['work2']."', '".$_POST['skills2']."', '".$_POST['individual2']."', '".$_POST['transition_remarks2']."');";
$trans3="INSERT INTO `iep_transition` (`transition_id`, `iep_id`, `folder_id`, `lrn`, `interest`, `work`, `skills`, `individual_responsible`, `remarks`) VALUES (NULL, '".$id."','".$_GET['folder_id']."', '".$_POST['lrn']."', '".$_POST['transition_interest3']."', '".$_POST['work3']."', '".$_POST['skills3']."', '".$_POST['individual3']."', '".$_POST['transition_remarks3']."');";

if ($conn->query($trans1) === TRUE) {
    echo "New record created successfully";
  }

  if ($conn->query($trans2) === TRUE) {
    echo "New record created successfully";
  }
  if ($conn->query($trans3) === TRUE) {
    echo "New record created successfully";
  }

  header('Location:student_file.php?id='.$_POST['lrn'].'&folder_id='.$_GET['folder_id']);
?>