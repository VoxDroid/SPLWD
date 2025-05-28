<?php include('../session.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Individual Educational Plan</title>
    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-print-css/css/bootstrap-print.min.css" media="print">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<style>

  body{

    font-size:12px;
    -webkit-print-color-adjust: exact;
  }


@media print {
  #printPageButton {
    display: none;
  }

}
</style>

<style>
    /* ISO Paper Size */
@page {
  size: A4 landscape;
}

@media print {

  footer{

  text-emphasis: none;
  }
   
}
</style>






<body id="page-top">
  <div class="container-fluid">

<?php
include('../connect.php');

$psych = "";
$nurse = "";
$therapist = "";
$language = "";
$if_regular ="";
$guidance = "";
$other_name = "";
$principal = "";
$if_1 = "";
$dis_1 = "";

$id = $_GET['lrn'];
$iep = $_GET['iep_id'];
$sqlgetteam = "SELECT * FROM iep_team where iep_id = $iep";
$sqldatateam = mysqli_query($conn, $sqlgetteam) or die('Error Displaying Data'. mysqli_connect_error());

while ($rowteam = mysqli_fetch_assoc($sqldatateam)) {
  $psych = $rowteam['psych'];
  $nurse = $rowteam['nurse'];
  $therapist = $rowteam['therapist'];
  $language = $rowteam['language'];
  $if_regular = $rowteam['if_regular'];
  $guidance = $rowteam['guidance'];
  $other_name = $rowteam['other_name'];
  $principal = $rowteam['principal'];
  $if_1 = $rowteam['if_1'];
  $dis_1 = $rowteam['dis_1'];


}

?>

<button type="button" id="printPageButton" class="btn btn-success hidethis" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
<div class="container-fluid">

<h2 align="center">INDIVIDUALIZED EDUCATION PLAN (IEP)</h2>

A.	PERSONAL INFORMATION
  <div class="row border mb-5">
            <!--info-->
           
            <div class="col-md-5 border">
  
            LEARNER/PARENT INFORMATION
       <table class table>
       <?php


$id = $_GET['lrn'];
$sqlget11 = "SELECT * FROM new_student where lrn = $id";
$sqldata11 = mysqli_query($conn, $sqlget11) or die('Error Displaying Data'. mysqli_connect_error());

while ($row31 = mysqli_fetch_assoc($sqldata11)) {

?>
        <tr>
             <td><div class="d-flex justify-content-between"><p><strong>LEARNER: </strong> <u> <?php echo " ".$row31['fname']." ".$row31['mname']." ".$row31['lname']; $name = " ".$row31['fname']." ".$row31['mname']." ".$row31['lname']."";?>&emsp;&emsp;&emsp;&emsp;</u></p> <p><strong>Gender:</strong><u> <?php echo " ".$row31['gender'];?>&emsp;&emsp;&emsp;&emsp;&emsp;</u></p></div></td>
             <input type="hidden" name="lrn" value="<?php echo $row31['lrn'];?>">
             </tr>

          

             <tr>
             <td><div class="d-flex justify-content-between"><p><strong>Birth Date:</strong><u><?php echo " ".$row31['birth_date'];?></u>&emsp;</p><p><strong>Grade:</strong><u>&emsp;<?php
             $others = "";
             $comment =  "";
             $d_seeing = "";
             $d_hearing = "";
             $d_com = "";
             $d_moving = "";
             $d_concentrating = "";
             $d_remembering = "";
             $other = "";
             $medical_diagnos = "";
             $iep = $_GET['iep_id'];
             $date_meeting = "";
             $date_last_iep = "";
             $review_date = "" ;
             $purpose = "";
             $sqlgetdiff = "SELECT * FROM iep_difficulty where iep_id = $iep";
$sqldatadiff = mysqli_query($conn, $sqlgetdiff) or die('Error Displaying Data'. mysqli_connect_error());

while ($rowdiff = mysqli_fetch_assoc($sqldatadiff)) {

echo $rowdiff['grade'];
$comment = $rowdiff['comment'];
$others = $rowdiff['others_2'];
$other = $rowdiff['others'];
$d_seeing = $rowdiff['d_seeing'];
$d_hearing = $rowdiff['d_hearing'];
$d_com = $rowdiff['d_com'];
$d_moving = $rowdiff['d_moving'];
$d_concentrating = $rowdiff['d_concentrating'];
$d_remembering = $rowdiff['d_remembering'];
$medical_diagnos = $rowdiff['medical_diagnos'];
$iep = $_GET['iep_id'];
$date_meeting = $rowdiff['date_meeting'];
$date_last_iep = $rowdiff['date_last_iep'];
$purpose = $rowdiff['purpose'];
$review_date = $rowdiff['review_date'];

}

?>&emsp;</u> &emsp;</p> <p><strong>LRN:</strong><u>&emsp;<?php echo " ".$row31['lrn'];?>&emsp;</u></p></div></td>
             </tr> 

         

           

             <tr>
             <td><p><strong>Current School:</strong><u>&emsp;<?php echo " ".$row31['school'];?></u></p></td>
             </tr>

             <tr>
             <td><p><strong>Address of School:</strong><u><?php echo " ".$row31['school'];?></u></p></td>
             </tr>

             <tr>
             <td><p><strong>Mother Tongue Spoken:</strong><u>&emsp;<?php echo " ".$row31['m_tounge'];?>&emsp;</u></p></td>
             </tr>

             <tr>
             <td><p><strong>Address:</strong><u>&emsp;<?php echo " ".$row31['address'];?>&emsp;</u></p></td>
             </tr>

            

             <tr>
             <td><p><strong>Parent/Guardian/Caregiver:</strong><?php echo " ".$row31['guardian']; $guardian = $row31['guardian']; ?></p></td>
             </tr>

             <tr>
             <td><p><strong>Work & Workplace:</strong><u>&emsp;<?php echo " ".$row31['work'];?>&emsp;</u></p></td>
             </tr>

             <tr>
             <td><p><strong>Landline/Cell Phone No.:</strong><u>&emsp;<?php echo " ".$row31['gurdian_contact'];?>&emsp;</u></p></td>
             </tr>

             <tr>
             <td><p><strong>Email:</strong><u>&emsp;<?php echo " ".$row31['email'];?>&emsp;</u></p></td>
             </tr>

             <tr>
             <td><p><strong>Mother Tongue Spoken:</strong><u>&emsp;<?php echo " ".$row31['guardian_mtounge'];?>&emsp;</u></p></td>
             </tr>

             <tr>
             <td><p><strong>Interpreter or other Accomodations Needed:</strong><u>&emsp;<?php echo $others;?>&emsp;</u></p></td>
             </tr>
<?php }?>
       



       </table>

            </div>
            <!--info-->


                <!--difficulty-->
                <div class="col-md-3 border" align="left">
                DIFFICULTIES (Select most relevant):

                <p><input type="checkbox"  name="d6" value="1"> Difficulty in Seeing</p>

<p><input type="checkbox"
<?php if($d_hearing != "")
{
echo "checked disabled";
}?>
name="d1" value="1"> Difficulty in Hearing</p>

<p><input <?php if($d_com != "")
{
echo "checked disabled";
}?> type="checkbox" name="d2" value="1"> Difficulty in Communicating</p>

<p><input <?php if($d_moving != "")
{
echo "checked disabled";
}?> type="checkbox" name="d3" value="1"> Difficulty in Moving/Walking</p>

<p><input <?php if($d_concentrating != "")
{
echo "checked disabled";
}?> type="checkbox" name="d4" value="1"> Difficulty in Concentrating/Paying
     Attention    </p>    

<p><input type="checkbox" <?php if($d_remembering != "")
{
echo "checked disabled";
}?> name="d5" value="1"> Difficulty in Remembering/
     Understanding</p>

<p>Other (please specify) <u> <?php echo $other; ?></u></p>




<p> Medical diagnosis(if yes, Indicate) <u> <?php echo $medical_diagnos; ?></u></p>


                </div>
                 <!--difficulty-->
                   <!--meeting-->
                <div class="col-md-4 border" align="left">
                MEETING INFORMATION:

                <p>DATE OF MEETING : <?php echo $date_meeting; ?></p>
<p>DATE OF LAST IEP : <?php echo $date_last_iep; ?></p>

<strong>PURPOSE OF MEETING:</strong> 
<p><input <?php if($purpose == "1")
{
echo "checked disabled";
}?> type="radio" name="purpose"  value="1"> Interim IEP</p>
<p><input 
<?php if($purpose == "2")
{
echo "checked disabled";
}?> type="radio" name="purpose" value="2"> Initial IEP</p>
<p><input <?php if($purpose == "3")
{
echo "checked disabled";
}?> type="radio" name="purpose" value="3"> Term IEP</p>

<p><input <?php if($purpose == "4")
{
echo "checked disabled";
}?> type="radio" name="purpose" value="4"> IEP Following 3-Yr, Reevaluation</p>
<p><input <?php if($purpose == "5")
{
echo "checked disabled";
}?> type="radio" name="purpose" value="5"> Revision to IEP Date : <?php echo $review_date;?></p>

<p><input <?php if($purpose == "6")
{
echo "checked disabled";
}?> type="radio" name="purpose" value="6"> Exit/Graduation</p>
<p> IEP Revision Without a Meeting At the request of </p>
   <p> <input <?php if($purpose == "7")
{
echo "checked disabled";
}?> type="radio" name="purpose" value="7">Parent</p>
   <p> <input <?php if($purpose == "8")
{
echo "checked disabled";
}?> type="radio" name="purpose" value="8">School</p>

<p>IEP Review Date</p>

<p>COMMENTS : <u><?php echo $comment; ?></u></p>

                </div>
                </div>

                <br><br>
                <br> <br> <br> <br>            

               <h5 align="center" class = "mt-5"> IEP TEAM MEMBERS IN ATTENDANCE </h5>
    <div class="row">
      <table >
        <tr>
          <td>Parent/Guardian/Caregiver:  <u>&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $guardian;?>&emsp;&emsp;&emsp;&emsp;&emsp;</u></td>
          <td>School Psychologist:<u>&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $psych;?>&emsp;&emsp;&emsp;&emsp;&emsp;</u></td>
        </tr>

        <tr>
          <td>Learner: <u>&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $name;?>&emsp;&emsp;&emsp;&emsp;&emsp;</u> </td>
          <td>Guidance Counselor/Designate:  <u>&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $guidance;?>&emsp;&emsp;&emsp;&emsp;&emsp;</u></td>
          
        </tr>

        <tr>
          <td>Principal/School Head: <u>&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $principal;?>&emsp;&emsp;&emsp;&emsp;&emsp;</u></td>
          <td>School Nurse :  <u>&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $nurse;?>&emsp;&emsp;&emsp;&emsp;&emsp;</u></td>
        </tr>

        <tr>
          <td>Other (name and role) : <u>&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $other_name;?>&emsp;&emsp;&emsp;&emsp;&emsp;</u></td>
        </tr>
        <tr>
          <td>Special Education Teacher : <u>&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $teacher;?>&emsp;&emsp;&emsp;&emsp;&emsp;</u></td>
          <td>Therapist/Pathologist/Specialist : <u>&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $therapist;?>&emsp;&emsp;&emsp;&emsp;&emsp;</u></td>
        </tr>
        <tr>
          <td colspan="2">*Learner must be invited when transition is discussed
       **The IEP learn must include at least one regular education teacher of the learner (if the learner is or may be participating in the regular education environment
</td>
        </tr>

        <tr align="center">
          <td colspan="2">_____<u> <u>&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $guardian;?>&emsp;&emsp;&emsp;&emsp;&emsp;</u></u>_____<br>Signature over Printed Name of Parent/Guardian/Caregiver
</td>
        </tr>

        <tr>
          <td rowspan="2" colspan="2">
          <p><input <?php if($if_1 == "1")
{
echo "checked disabled";
}?> type="checkbox" value="1" name="if_1"> Not Applicable (learner will not be 18 within one year</p>
          <p><input <?php if($if_1 == "2")
{
echo "checked disabled";
}?> type="checkbox" value="2" name="if_2">The learner has been informed of his/her rights under law and advised of the transfer of rights at age 18</p>  
          
          <p>Distribution:</p>
           <p><input <?php if($dis_1 == "1")
{
echo "checked disabled";
}?> type="checkbox" value="1" name="dis_1"> Learner’s Folder</p>
            <p> <input <?php if($dis_1 == "2")
{
echo "checked disabled";
}?> type="checkbox" value="1" name="dis_2"> Parent/Guardian/Caregiver/ Ed Special Education/Receiving Teacher</p>

          </td>
        </tr>

    

      </table>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

               <strong> I.	PRESENT LEVELS OF ACADEMIC ACHIEVEMENT AND FUNCTIONAL PERFORMANCE</strong><br>
                <br>

<div class="row">

  <div class="col-md-1"></div>
  <div class="col-md-10">
  <table class="table table-sm table-bordered">
  <tr style="background-color:grey; color:white;">
    <th>Result of initial or most recent evaluation of school and division assessments:</th>
  </tr>
  <?php
  $function1 ="";
  $function2 ="";
  $function3 ="";
  $function4 ="";
  $function5 ="";
 
include('../connect.php');
$id1 = $_GET['lrn'];
$f_id = $_GET['folder_id'];
$iid =  $_GET['iep_id'];
$sqlget1 = "SELECT * FROM iep_functional where lrn = $id1 and folder_id = $f_id and iep_id = $iid";
$sqldata1 = mysqli_query($conn, $sqlget1) or die('Error Displaying Data'. mysqli_connect_error());

while ($row1 = mysqli_fetch_assoc($sqldata1)) {

  $function1 .=$row1['functional_1']."@";
  if($row1['functional_2'] != ''){
  $function2 .=$row1['functional_2']."@";
  }
  if($row1['functional_3'] != ''){
    $function3 .=$row1['functional_3']."@";
    }
    if($row1['functional_4'] != ''){
      $function4 .=$row1['functional_4']."@";
      }
      if($row1['functional_5'] != ''){
        $function5 .=$row1['functional_5']."@";
        }

?>

<?php }

$pieces1 = explode("@", $function1);
$pieces2 = explode("@", $function2);
$pieces3 = explode("@", $function3);
$pieces4 = explode("@", $function4);
$pieces5 = explode("@", $function5);

?>
  <tr>
    <td> <p><strong> <?php echo $pieces1[0];?></strong></p> </td>
  </tr>

  <tr>
    <td> <p><strong> <?php echo $pieces1[1];?></strong> </p></td>
  </tr>
  <tr>
    <td> <p><strong> <?php echo $pieces1[2];?></strong> </p></td>
  </tr>

  <tr class="bg-secondary text-white">
    <th>Description of academic, developmental and/or functional strengths:</th>
  </tr>

  <tr>
    <td> <p><strong> <?php echo $pieces2[0];?></strong> </p></td>
  </tr>

  <tr>
    <td> <p><strong> <?php echo $pieces2[1];?></strong></p></td>
  </tr>
  <tr>
    <td>  <p><strong> <?php echo $pieces2[2];?></strong></p> </td>
  </tr>

  <tr class="bg-secondary text-white">
    <th>Description of academic, developmental and/or functional needs:</th>
  </tr>

  <tr>
    <td> <p><strong> <?php echo $pieces3[0];?></strong></p> </td>
  </tr>

  <tr>
    <td> <p><strong> <?php echo $pieces3[1];?></strong></p>  </td>
  </tr>
  <tr>
    <td> <p><strong> <?php echo $pieces3[2];?></strong></p>  </td>
  </tr>

  <tr class="bg-secondary text-white">
    <th>Parental concerns regarding their child’s education:</th>
  </tr>

  <tr>
    <td> <p><strong> <?php echo $pieces4[0];?></strong></p></td>
  </tr>

  <tr>
    <td> <p><strong> <?php echo $pieces4[1];?></strong></p> </td>
  </tr>
  <tr>
    <td> <p><strong> <?php echo $pieces4[2];?></strong></p> </td>
  </tr>

  <tr class="bg-secondary text-white">
    <th>Impact of the disability on involvement and progress in the general education curriculum (for preschool, how the disability affects participation in appropriate activities).</th>
  </tr>

  <tr>
    <td> <p><strong> <?php echo $pieces5[0];?></strong></p></td>
  </tr>

  <tr>
    <td> <p><strong> <?php echo $pieces5[1];?></strong></p> </td>
  </tr>
  <tr>
    <td> <p><strong> <?php echo $pieces5[2];?></strong></p> </td>
  </tr>

</table>
  </div>
</div>


</div>

<br><br><br><br><br><br>

<div class="row">
<strong>II.	CONSIDERATION OF SPECIAL FACTORS</strong>

<?php
$factor1 = "";
$factor2 = "";
$factor3 = "";
$factor4 = "";
$factor5 = "";
$factor6 = "";
$factor7 = "";
$factor8 = "";
$factor9 = "";
$factor_type = "";

$comment1 ="";
$comment2 ="";
$comment3 ="";
$comment4 ="";
$comment5 ="";
$comment6 ="";
$comment7 ="";
$comment8 ="";
$comment9 ="";




include('../connect.php');
$id = $_GET['lrn'];
$iep_id = $_GET['iep_id'];
$sqlget2 = "SELECT * FROM iep_special_factor where lrn = $id and iep_id = $iep_id";
$sqldata2 = mysqli_query($conn, $sqlget2) or die('Error Displaying Data'. mysqli_connect_error());

while ($row2 = mysqli_fetch_assoc($sqldata2)) {

 $factor1 = $row2['factor_1'];
$factor2 =  $row2['factor_2'];
$factor3 =  $row2['factor_3'];
$factor4 =  $row2['factor_4'];
$factor5 =  $row2['factor_5'];
$factor6 =  $row2['factor_6'];
$factor7 =  $row2['factor_7'];
$factor8 =  $row2['factor_8'];
$factor9 =  $row2['factor_9'];
$factor_type =$row2['factor_8_type'];


$comment3 =$row2['comment_3'];
$comment4 =$row2['comment_4'];
$comment5 =$row2['comment_5'];
$comment6 =$row2['comment_6'];
$comment7 =$row2['comment_7'];
$comment8 =$row2['comment_8'];
$comment9 =$row2['comment_9'];


 

?>

<?php }



?>

<table class="table table-sm">
 <tr>
   <td colspan="2"><p>a.)Does the learner have difficulty relating with people which impede his/her learning or the learning of other?	</p></td>
   <td><input type="radio" <?php if($factor1 == 'yes'){echo 'checked'; }?> disabled name="factor_1" value="yes">Yes</td>
   <td><input type="radio" <?php if($factor1 == 'no'){echo 'checked'; }?> disabled name="factor_1" value="no">No</td>
 </tr>

 <tr>
   <td colspan="2"><p>b.)if yes, consider the appropriateness of developing a Behavior Intervention Plan.	Behavior Intervention Plan developed?	Refer to Behavior InterventionPlan for additional information.</p></td>
   <td><input type="radio" <?php if($factor2 == 'yes'){echo 'checked'; }?> disabled name="factor_2" value="yes">Yes</td>
   <td><input type="radio" <?php if($factor2 == 'no'){echo 'checked'; }?> disabled name="factor_2" value="no">No</td>
 </tr>

 <tr>
   <td colspan="2"><p>Does the leaner have difficulty in Moving/ Walking?
If yes, consider the mobility needs as related to IEP and describe below.
</p></td>
<td><input  type="radio" <?php if($factor3 == 'yes'){echo 'checked'; }?> disabled name="factor_3" value="yes">Yes</td>
   <td><input type="radio" <?php if($factor3 == 'no'){echo 'checked'; }?> disabled name="factor_3" value="no">No</td>
 </tr>
 <tr><td colspan="4"><p><strong><?php echo $comment3;?></strong></p></td></tr>

 <tr>
   <td colspan="2"><p>Does the learner have difficulty in seeing or with blindness/visual impairment?	
   If yes, provide for instruction in Braille and the use of Braille, unless the IEP Team determines that instruction in Braille is not appropriate for the learner after an
evaluation of the learner’s reading and writing skills, needs, and appropriate reading and wrting media, including evaluation of future needs for instruction in Braille
or the use of Braille. Describe below.

</p></td>
<td><input type="radio" <?php if($factor4 == 'yes'){echo 'checked'; }?> disabled name="factor_4" value="yes">Yes</td>
   <td><input type="radio" <?php if($factor4 == 'no'){echo 'checked'; }?> disabled name="factor_4" value="no">No</td>
 </tr>

 <tr><td colspan="4"><p><strong><?php echo $comment4;?></strong></p></td></tr>

 <tr>

   <td colspan="2"><p>Does the learner have difficulty in communicating?	
   If yes, consider the communication needs and describe below.

</p></td>
<td><input type="radio" <?php if($factor5 == 'yes'){echo 'checked'; }?> disabled name="factor_5" value="yes">Yes</td>
   <td><input type="radio" <?php if($factor5 == 'no'){echo 'checked'; }?> disabled name="factor_5" value="no">No</td>
 </tr>
 <tr><td colspan="4"><p><strong><?php echo $comment5;?></strong></p></td></tr>

 <tr>

<td colspan="2"><p>Does the learner have difficulty in concentrating/paying attention?
If yes, consider the understanding needs and describe below.

</p></td>
<td><input type="radio" <?php if($factor6 == 'yes'){echo 'checked'; }?> disabled name="factor_6" value="yes">Yes</td>
   <td><input type="radio" <?php if($factor6 == 'no'){echo 'checked'; }?> disabled name="factor_6" value="no">No</td>
</tr>
<tr><td colspan="4"><p><strong><?php echo $comment6;?></strong></p></td></tr>

<tr>

<td colspan="2"><p><strong>Does the learner have difficulty in hearing or Is the learner deaf or hard of hearing?</strong>
If yes, consider and describe the learner’s language and communication needs, opportunities for direct communication with peers and professional personnel in the
learner’s language and communication mode, academic level and full range of needs, including opportunities for direct instruction in the learner’s language and
communication mode. Describe communication needs below.


</p></td>
<td><input type="radio" <?php if($factor7 == 'yes'){echo 'checked'; }?> disabled name="factor_7" value="yes">Yes</td>
   <td><input type="radio" <?php if($factor7 == 'no'){echo 'checked'; }?> disabled name="factor_7" value="no">No</td>
</tr>

<tr><td colspan="4"><p><strong><?php echo $comment7;?></strong></p></td></tr>

<tr>

<td colspan="2"><p><strong>Does the learner need assistive technology devices or services?</strong>

If yes, describe the type of assistive technology and how it is used. If no, describe how the learner’s needs are being met in deficit areas



</p></td>
<td><input type="radio" <?php if($factor8 == 'yes'){echo 'checked'; }?> disabled name="factor_8" value="yes">Yes</td>
   <td><input type="radio" <?php if($factor8 == 'no'){echo 'checked'; }?> disabled name="factor_8" value="no">No</td>
</tr>
<tr><td colspan="4"><p><strong><?php echo $comment8;?></strong></p></td></tr>

<tr>

<td colspan="2"><p><strong>Does the learner require alternative format for instructional materials?</strong>

If yes, specify format(s) of materials required below.

</p></td>

<td><input type="radio" <?php if($factor9 == 'yes'){echo 'checked disabled'; }?> disabled name="factor_9" value="yes">Yes</td>
   <td><input type="radio" <?php if($factor9 == 'no'){echo 'checked disabled'; }?> disabled name="factor_9" value="no">No</td>
</tr>

<tr>
 <td colspan="4"><input type="radio" <?php if($factor_type == 'Braille'){echo 'checked disabled'; }?>  name="factor_8_type" value="Braille"> Braille
 <input type="radio" name="factor_8_type" <?php if($factor_type == 'Large Type'){echo 'checked disabled'; }?> value="Large Type"> Large Type	
 <input type="radio" name="factor_8_type" <?php if($factor_type == 'Auditory'){echo 'checked disabled'; }?>  value="Auditory"> Auditory	
 <input type="radio" name="factor_8_type" <?php if($factor_type == 'Electronic text'){echo 'checked disabled'; }?> value="Electronic text"> Electronic text	</td>
                          
</tr>

<tr><td><p><strong><?php echo $comment9;?></strong></p></td></tr>

</table>

</div>



<div class="row">
<strong>B.	DIFFICULTIES, BARRIERS AND ENABLING SUPPORTS</strong>
 <table class="table table-sm table-bordered">
  <tr class="bg-secondary text-white">
    <th>DIFFICULTY (enter all areas of difficulty)</th>
    <th>ENVIRONMENTAL BARRIERS (describe each factor restricting participation)</th>
    <th>ENVIRONMENTAL FACILITATORS (describe each factor enabling participation in response to barriers) </th>
    <th>ENVIRONMENTAL FACILITATORS (describe each factor enabling participation in response to barriers)</th>
  </tr>
  <?php




 
include('../connect.php');
$id1 = $_GET['lrn'];

$sqlget3 = "SELECT * FROM iep_barriers where lrn = $id1 and iep_id = $iep_id";
$sqldata3 = mysqli_query($conn, $sqlget3) or die('Error Displaying Data'. mysqli_connect_error());

while ($row3 = mysqli_fetch_assoc($sqldata3)) {  

?>



  <tr>
    <td><p><strong><?php echo $row3['barrier_1'];?></strong></p></td>
    <td><p><strong><?php echo $row3['barrier_2'];?></strong></p></td>
    <td><p><strong><?php echo $row3['barrier_3'];?></strong></p></td>
    <td><p><strong><?php echo $row3['barrier_4'];?></strong></p></td>
  </tr>
  <?php }



?>
 </table>

</div>

<div class="row">
 <strong> Selection of Barriers and Qualifiers for Environmental Barriers and Facilitators (taken from ICF)</strong>
 <table class="table table-sm table-bordered m-1">
  <tr class="bg-secondary text-white">
    <th>DIFFICULTIES (select all relevant categories)</th>
    <th>Qualifiers for Environmental Barriers</th>
    <th>Qualifiers for Environmental Facilitators</th>
  </tr>
  <tr>
    <td rowspan="6">
    <p> •	Seeing </p>
    <p> •	Hearing </p>
    <p> •	Communicating </p>
    <p> •	Moving/Walking </p>
    <p> •	Concentrating/Paying Attention </p>
    <p> •	Remembering/understanding </p>

    </td>

    <td rowspan="6">
    <p> 0  No barrier </p>
    <p> 1  Mild barrier </p>
    <p> 2  Moderate barrier </p>
    <p> 3  Severe barrier </p>
    <p> 4  Complete barrier </p>
    <p> 8  Barrier, not specified </p>
    <p> 9  Not Applicable </p>


    </td>

    <td rowspan="6">
    <p> +1  Mild facilatator </p>
    <p> +2  Moderate facilatator </p>
    <p> +3  Substantial facilatator </p>
    <p>  +4  Complete facilatator </p>
    <p> +8  Facilitator, not specified </p>
    <p> +9  Not Applicable </p>



    </td>
  </tr>
 </table>
</div>
<br><br><br>
<div class="row">
<strong><p>C.	STUDENT GOALS</p></strong>
<div class="col-md-12"><p> To support identification of learner goals, also confirm:</p></div>


<div class="col-md-12"><p> •	What opprtunites are available at the school to support learner goals?</p></div>

<div class="col-md-12"><p> •	What are the student interest areas?</p></div>

<br>

<div class="col-md-12"><p> •	What disability-specific skills does the learner need to develop to support their participation/ attainment of goals?</p></div>

<div class="col-md-12"><p> Goals –(eg.-Skills to improve participation in education or daily living skills. Goals should be SMART (Strategic, Measurable, Achievable, Realistic, and Time-bound)</p></div>

<table class="table table-sm table-bordered">
  <tr class="bg-secondary text-white">
    <th>INTEREST</th>
    <th>GOAL</th>
    <th>INTERVENTIONS</th>
    <th>TIMELINE</th>
    <th>INDIVIDUALS RESPONSIBLE</th>
    <th>REMARKS	</th>
    <th>PROGRESS/
NEXT STEPS</th>

  </tr>

  <?php




 
include('../connect.php');
$id1 = $_GET['lrn'];
$sqlget4 = "SELECT * FROM iep_goals where lrn = $id1 and  iep_id = $iep_id";
$sqldata4 = mysqli_query($conn, $sqlget4) or die('Error Displaying Data'. mysqli_connect_error());

while ($row4 = mysqli_fetch_assoc($sqldata4)) {  

?>



  <tr>
    <td><p><strong><?php echo $row4['interest'];?></strong></p></td>
    <td><p><strong><?php echo $row4['goal'];?></strong></p></td>
    <td><p><strong><?php echo $row4['intervention'];?></strong></p></td>
    <td><p><strong><?php echo $row4['timeline'];?></strong></p></td>
    <td><p><strong><?php echo $row4['individual_responsible'];?></strong></p></td>
    <td><p><strong><?php echo $row4['remarks'];?></strong></p></td>
    <td><p><strong><?php echo $row4['progress'];?></strong></p></td>
  </tr>
  <?php }



?>
</table>

<strong>D.	STUDENT TRANSITION</strong>
<div class="col-md-12"><p>This section is for learners exiting the school environment and transitioning into work.</p></div>
<table class="table table-sm table-bordered">
  <tr class="bg-secondary text-white">
    <th>INTEREST</th>
    <th>WORK OPPORTUNITIES</th>
    <th>INTERVENTIONS/
TRANSITION SKILLS
</th>
<th>INDIVIDUALS RESPONSIBLE</th>
<th>REMARKS</th>
  </tr>

  <?php




 
include('../connect.php');
$id1 = $_GET['lrn'];
$folder_id = $_GET['folder_id'];
$sqlget5 = "SELECT * FROM iep_transition where lrn = $id and folder_id = $folder_id and iep_id = $iep_id";
$sqldata5 = mysqli_query($conn, $sqlget5) or die('Error Displaying Data'. mysqli_connect_error());

while ($row5 = mysqli_fetch_assoc($sqldata5)) {  

?>



  <tr>
    <td><p><strong><?php echo $row5['interest'];?></strong></p></td>
    <td><p><strong><?php echo $row5['work'];?></strong></p></td>
    <td><p><strong><?php echo $row5['skills'];?></strong></p></td>

    <td><p><strong><?php echo $row5['individual_responsible'];?></strong></p></td>
    <td><p><strong><?php echo $row5['remarks'];?></strong></p></td>

  </tr>
  <?php }



?>
</table>
</div>
<br><br><br><br>

<div class="row">
  <div class="col-md-12">
<p align="center"><strong> IEP IMPLEMENTATION</strong></p>

<p>


______________________ As the parent I agree with the components of this IEP, I understand that its provisions will be implemented as soon as possible after the IEP goes into effect.
</p>

<p>

_____________________ As the parent, I disagree will or part of this IEP, I Understand that the School must provide me with written notice if any intent to implement this IEP. If I wish to prevent the implementation of this IEP, I must submit a written request for a due process hearing to school principal.
</p>
</div>

<table class="table table-sm">
  <tr>
    <td colspan="3" align="center"><p><br>________<?php echo $guardian;?>_______</p>
  <p>Parent’s Signature</p></td>
  </tr>

  <tr>
    <td><p>_________________________________</p>
  <p>Special Education Teacher</p></td>

  <td>
    <p>_________________________________</p>
    <p>Regular/Receiving Teacher <br>(if LSEN is in Inclusion)<br>Regular/Receiving Teacher</p>
  </td>

  <td><p>________________________________<br>Principal/School Head</p></td>
  </tr>

  <tr>
    <td><p>_________________________________<br>Learner (if applicable)</p></td>

  <td>
    <p>_________________________________<br>Guidance Counselor/SPED Coordinator</p>
  </td>

  <td><p>_________________________________<br>Psychologist/Other Specialist</p></td>
  </tr>


	

</table>
</div>

</div>
</body>
</html>
        