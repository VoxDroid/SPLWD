<ul class="nav nav-tabs" id="myTab" role="tablist">

  <li class="nav-item">
    <a class="nav-link active" id="a1-tab" data-toggle="tab" href="#a7" role="tab" aria-controls="a1"
      aria-selected="true">Functional Performance</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#a22" role="tab" aria-controls="profile"
      aria-selected="false">Consideration</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#a32" role="tab" aria-controls="contact"
      aria-selected="false">Barriers</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#a42" role="tab" aria-controls="contact"
      aria-selected="false">Goals && Transition</a>
  </li>

 
</ul>
<div class="tab-content" id="myTabContent">


<!--team-->
  <div class="tab-pane fade active show" id="a72" role="tabpanel" aria-labelledby="a1-tab" align="left">
<div class="row">
I.	PRESENT LEVELS OF ACADEMIC ACHIEVEMENT AND FUNCTIONAL PERFORMANCE





<table class="table table-bordered">
  <tr>
    <th>Result of initial or most recent evaluation of school and division assessments:</th>
  </tr>
  <?php
  $function1 ="";
  $function2 ="";
  $function3 ="";
  $function4 ="";
  $function5 ="";
 
include('../connect.php');
$id1 = $_GET['id'];
$sqlget1 = "SELECT * FROM iep_functional where lrn = $id";
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

  <tr>
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

  <tr>
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

  <tr>
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

  <tr>
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
<!--team-->

<!--functional-->
<div class="tab-pane fade" id="a62" role="tabpanel" aria-labelledby="a6-tab" align="left">
  IEP TEAM MEMBERS IN ATTENDANCE
    <div class="row">
      <table class="table">
        <tr>
          <td>Parent/Guardian/Caregiver: <strong> <?php echo $guardian;?> </strong></td>
          <td>School Psychologist: <input type="text" class="form-control" name="psych"></td>
        </tr>

        <tr>
          <td>Learner: <strong> <?php echo $name;?></strong> </td>
          <td>Guidance Counselor/Designate: <input type="text" class="form-control" name="guidance"></td>
          
        </tr>

        <tr>
          <td>Principal/School Head: <input type="text" class="form-control" name="principal"></td>
          <td>School Nurse : <input type="text" class="form-control" name="nurse"></td>
        </tr>

        <tr>
          <td>Other (name and role) : <input class="form-control" name="other_name" type="text"></td>
        </tr>
        <tr>
          <td>Special Education Teacher : <input class="form-control" name="teacher" type="text"></td>
          <td>Therapist/Pathologist/Specialist : <input class="form-control" name="therapist" type="text"></td>
        </tr>
        <tr>
          <td colspan="2">*Learner must be invited when transition is discussed
       **The IEP learn must include at least one regular education teacher of the learner (if the learner is or may be participating in the regular education environment
</td>
        </tr>

        <tr align="center">
          <td colspan="2">_____<u> <?php echo $guardian;?></u>_____<br>Signature over Printed Name of Parent/Guardian/Caregiver
</td>
        </tr>

        <tr>
          <td rowspan="2" colspan="2">
          <p><input type="checkbox" value="1" name="if_1"> Not Applicable (learner will not be 18 within one year</p>
          <p><input type="checkbox" value="2" name="if_2">The learner has been informed of his/her rights under law and advised of the transfer of rights at age 18</p>  
          
          <p>Distribution:</p>
           <p><input type="checkbox" value="1" name="dis_1"> Learner’s Folder</p>
            <p> <input type="checkbox" value="1" name="dis_2"> Parent/Guardian/Caregiver/ Ed Special Education/Receiving Teacher</p>

          </td>
        </tr>

    

      </table>
    </div>
</div>
<!--functional-->

<!--factors-->
  <div class="tab-pane fade" id="a22" role="tabpanel" aria-labelledby="profile-tab">
    <div class="row">
      <!--CONSIDERATION OF SPECIAL FACTORS-->
 <div class="col-md-12" align="left">
 II.	CONSIDERATION OF SPECIAL FACTORS

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
$id1 = $_GET['id'];
$folder_id = $_GET['folder_id'];
$sqlget2 = "SELECT * FROM iep_special_factor where lrn = $id and folder_id = $folder_id";
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
 
 <table class="table">
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

<td><input type="radio" <?php if($factor9 == 'yes'){echo 'checked'; }?> disabled name="factor_9" value="yes">Yes</td>
    <td><input type="radio" <?php if($factor9 == 'no'){echo 'checked'; }?> disabled name="factor_9" value="no">No</td>
</tr>

<tr>
  <td colspan="4"><input type="radio" <?php if($factor_type == 'Braille'){echo 'checked'; }?>  name="factor_8_type" value="Braille"> Braille
  <input type="radio" name="factor_8_type" <?php if($factor_type == 'Large Type'){echo 'checked'; }?> value="Large Type"> Large Type	
  <input type="radio" name="factor_8_type" <?php if($factor_type == 'Auditory'){echo 'checked'; }?>  value="Auditory"> Auditory	
  <input type="radio" name="factor_8_type" <?php if($factor_type == 'Electronic text'){echo 'checked'; }?> value="Electronic text"> Electronic text	</td>
 		      		  					
</tr>

<tr><td><p><strong><?php echo $comment9;?></strong></p></td></tr>

 </table>

 </div>
</div>
  </div>
  <!--factors-->

  <!--abrriers-->
  <div class="tab-pane fade" id="a32" role="tabpanel" aria-labelledby="contact-tab">
    <div class="row">
<!--B.	DIFFICULTIES, BARRIERS AND ENABLING SUPPORTS-->
<div class="col-md-12" align="left">
 B.	DIFFICULTIES, BARRIERS AND ENABLING SUPPORTS
 <table class="table table-bordered">
  <tr>
    <th>DIFFICULTY (enter all areas of difficulty)</th>
    <th>ENVIRONMENTAL BARRIERS (describe each factor restricting participation)</th>
    <th>ENVIRONMENTAL FACILITATORS (describe each factor enabling participation in response to barriers) </th>
    <th>ENVIRONMENTAL FACILITATORS (describe each factor enabling participation in response to barriers)</th>
  </tr>
  <?php




 
include('../connect.php');
$id1 = $_GET['id'];
$folder_id = $_GET['folder_id'];
$sqlget3 = "SELECT * FROM iep_barriers where lrn = $id and folder_id = $folder_id";
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
 Selection of Barriers and Qualifiers for Environmental Barriers and Facilitators (taken from ICF)
 <table class="table table-bordered">
  <tr>
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
<!--B.	DIFFICULTIES, BARRIERS AND ENABLING SUPPORTS-->
</div>
  </div>
  
   <!--abrriers-->

    <!--goal-->
  <div class="tab-pane fade" id="a42" role="tabpanel" aria-labelledby="contact-tab">

  <div class="row">
<!--B.	Goals-->
<div class="col-md-12" align="left">
C.	STUDENT GOALS

<p> To support identification of learner goals, also confirm:</p>
<p> •	What opprtunites are available at the school to support learner goals?</p>
<p> •	What are the student interest areas?</p>
<p> •	What disability-specific skills does the learner need to develop to support their participation/ attainment of goals?</p>

<p> Goals –(eg.-Skills to improve participation in education or daily living skills. Goals should be SMART (Strategic, Measurable, Achievable, Realistic, and Time-bound)</p>

<table class="table table-bordered">
  <tr>
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
$id1 = $_GET['id'];
$folder_id = $_GET['folder_id'];
$sqlget4 = "SELECT * FROM iep_goals where lrn = $id and folder_id = $folder_id";
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

D.	STUDENT TRANSITION
<p>This section is for learners exiting the school environment and transitioning into work.</p>
<table class="table table-bordered">
  <tr>
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
$id1 = $_GET['id'];
$folder_id = $_GET['folder_id'];
$sqlget5 = "SELECT * FROM iep_transition where lrn = $id and folder_id = $folder_id";
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
<!--B.	Goals-->


  </div>

  </div>
  <!--goal-->
</div>