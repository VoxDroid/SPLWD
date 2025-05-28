<?php include('../session.php');?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Folders</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>
<style>
  select.selectList { width: 35px; }
</style>
<style>
  .footer {
  position: fixed;
left: 1;
  bottom: 0;
  width: 100%;

  text-align: center;
}
</style>

<body id="page-top">

<?php include('nav.php');?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Student Folders of <?php echo $_SESSION['school'];?></h1>
                    </div>
 
  
                    <div class="row">

<div class="container-fluid">
        <h3>Individualized Education Plan</h3>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
          
  <li class="nav-item">
    <a class="nav-link active" id="a1-tab" data-toggle="tab" href="#a1" role="tab" aria-controls="a1"
      aria-selected="true">Information</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="a1-tab" data-toggle="tab" href="#a6" role="tab" aria-controls="a1"
      aria-selected="true">IEP Team</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="a1-tab" data-toggle="tab" href="#a7" role="tab" aria-controls="a1"
      aria-selected="true">Functional Performance</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#a2" role="tab" aria-controls="profile"
      aria-selected="false">Consideration</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#a3" role="tab" aria-controls="contact"
      aria-selected="false">Barriers</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#a4" role="tab" aria-controls="contact"
      aria-selected="false">Goals && Transition</a>
  </li>

 
</ul>
<div class="tab-content" id="myTabContent">

<!--information-->
  <div class="tab-pane fade show active" id="a1" role="tabpanel" aria-labelledby="a1-tab" align="left">
 A.	PERSONAL INFORMATION
  <div class="row border">
            <!--info-->
           
            <div class="col-md-5 border">
  
            LEARNER/PARENT INFORMATION
       <table class="table">
       <?php

include('../connect.php');
$id = $_GET['id'];
$sqlget11 = "SELECT * FROM new_student where lrn = $id";
$sqldata11 = mysqli_query($conn, $sqlget11) or die('Error Displaying Data'. mysqli_connect_error());

while ($row31 = mysqli_fetch_assoc($sqldata11)) {

?>
        <tr>
             <td><p><strong>LEARNER: </strong> <?php echo " ".$row31['fname']." ".$row31['mname']." ".$row31['lname']; $name = " ".$row31['fname']." ".$row31['mname']." ".$row31['lname'];?></p></td>
             <input type="hidden" name="lrn" value="<?php echo $row31['lrn'];?>">
             </tr>

             <tr>
             <td><p><strong>Gender:</strong> <?php echo " ".$row31['gender'];?></p></td>
             </tr>

             <tr>
             <td><p><strong>Birth Date:</strong><?php echo " ".$row31['birth_date'];?></p></td>
             </tr> 

             <tr>
             <td><p><strong>Grade/Level:</strong> <select name="grade" id="" class="form-control">
              <option value="1">I</option>
              <option value="2">II</option>
              <option value="3">III</option>
              <option value="4">IV</option>
              <option value="5">V</option>
              <option value="6">VI</option></select> </p></td>
             </tr>

             <tr>
             <td><p><strong>LRN:</strong><?php echo " ".$row31['lrn'];?></p></td>
             </tr>

             <tr>
             <td><p><strong>Current School:</strong><?php echo " ".$row31['school'];?></p></td>
             </tr>

             <tr>
             <td><p><strong>Address of School:</strong><?php echo " ".$row31['school'];?></p></td>
             </tr>

             <tr>
             <td><p><strong>Mother Tongue Spoken:</strong><?php echo " ".$row31['m_tounge'];?></p></td>
             </tr>

             <tr>
             <td><p><strong>Address:</strong><?php echo " ".$row31['address'];?></p></td>
             </tr>

             <tr>
             <td><p><strong>Gender:</strong><?php echo " ".$row31['gender'];?></p></td>
             </tr>

             <tr>
             <td><p><strong>Parent/Guardian/Caregiver:</strong><?php echo " ".$row31['guardian']; $guardian = $row31['guardian']; ?></p></td>
             </tr>

             <tr>
             <td><p><strong>Work & Workplace:</strong><?php echo " ".$row31['work'];?></p></td>
             </tr>

             <tr>
             <td><p><strong>Landline/Cell Phone No.:</strong><?php echo " ".$row31['gurdian_contact'];?></p></td>
             </tr>

             <tr>
             <td><p><strong>Email:</strong><?php echo " ".$row31['email'];?></p></td>
             </tr>

             <tr>
             <td><p><strong>Mother Tongue Spoken:</strong><?php echo " ".$row31['guardian_mtounge'];?></p></td>
             </tr>

             <tr>
             <td><p><strong>Interpreter or other Accomodations Needed:</strong><br><textarea name="others_2" class="form-control"></textarea></p></td>
             </tr>
<?php }?>
       



       </table>

            </div>
            <!--info-->

                <!--difficulty-->
                <div class="col-md-3 border" align="left">
                DIFFICULTIES (Select most relevant):

                <p><input type="checkbox"  name="d6" value="1"> Difficulty in Seeing</p>

<p><input type="checkbox" name="d1" value="1"> Difficulty in Hearing</p>

<p><input type="checkbox" name="d2" value="1"> Difficulty in Communicating</p>

<p><input type="checkbox" name="d3" value="1"> Difficulty in Moving/Walking</p>

<p><input type="checkbox" name="d4" value="1"> Difficulty in Concentrating/Paying
     Attention    </p>    

<p><input type="checkbox" name="d5" value="1"> Difficulty in Remembering/
     Understanding</p>

<p>Other (please specify) <br><textarea name="others" id="" cols="25" rows="3"></textarea></p>




<p> Medical diagnosis(if yes, Indicate)  <br><textarea name="medical_diagnos" id="" cols="25" rows="3"></textarea></p>


                </div>
                 <!--difficulty-->
                   <!--meeting-->
                <div class="col-md-4 border" align="left">
                MEETING INFORMATION:

                <p>DATE OF MEETING <input type="date" name="date_meeting"></p>
<p>DATE OF LAST IEP<input type="date" name="date_last_iep"></p>

<strong>PURPOSE OF MEETING:</strong> 
<p><input type="radio" name="purpose"  value="1"> Interim IEP</p>
<p><input type="radio" name="purpose" value="2"> Initial IEP</p>
<p><input type="radio" name="purpose" value="3"> Term IEP</p>

<p><input type="radio" name="purpose" value="4"> IEP Following 3-Yr, Reevaluation</p>
<p><input type="radio" name="purpose" value="5"> Revision to IEP Date <input type="date" name="review_date"></p>

<p><input type="radio" name="purpose" value="6"> Exit/Graduation</p>
<p> IEP Revision Without a Meeting At the request of </p>
   <p> <input type="radio" name="purpose" value="7">Parent</p>
   <p> <input type="radio" name="purpose" value="8">School</p>

<p>IEP Review Date</p>

<p>COMMENTS:<br><textarea name="comment" id="" cols="30" rows="3"></textarea></p>

                </div>
                </div>
  </div>

<!--information-->


<!--team-->
  <div class="tab-pane fade" id="a7" role="tabpanel" aria-labelledby="a1-tab" align="left">
<div class="row">
I.	PRESENT LEVELS OF ACADEMIC ACHIEVEMENT AND FUNCTIONAL PERFORMANCE

<table class="table table-bordered">
  <tr>
    <th>Result of initial or most recent evaluation of school and division assessments:</th>
  </tr>

  <tr>
    <td> <textarea class="form-control" name="functional_1_1"></textarea> </td>
  </tr>

  <tr>
    <td> <textarea class="form-control" name="functional_1_2"></textarea> </td>
  </tr>
  <tr>
    <td> <textarea class="form-control" name="functional_1_3"></textarea> </td>
  </tr>

  <tr>
    <th>Description of academic, developmental and/or functional strengths:</th>
  </tr>

  <tr>
    <td> <textarea class="form-control" name="functional_2_1"></textarea> </td>
  </tr>

  <tr>
    <td> <textarea class="form-control" name="functional_2_2"></textarea> </td>
  </tr>
  <tr>
    <td> <textarea class="form-control" name="functional_2_3"></textarea> </td>
  </tr>

  <tr>
    <th>Description of academic, developmental and/or functional needs:</th>
  </tr>

  <tr>
    <td> <textarea class="form-control" name="functional_3_1"></textarea> </td>
  </tr>

  <tr>
    <td> <textarea class="form-control" name="functional_3_2"></textarea> </td>
  </tr>
  <tr>
    <td> <textarea class="form-control" name="functional_3_3"></textarea> </td>
  </tr>

  <tr>
    <th>Parental concerns regarding their child’s education:</th>
  </tr>

  <tr>
    <td> <textarea class="form-control" name="functional_4_1"></textarea> </td>
  </tr>

  <tr>
    <td> <textarea class="form-control" name="functional_4_2"></textarea> </td>
  </tr>
  <tr>
    <td> <textarea class="form-control" name="functional_4_3"></textarea> </td>
  </tr>

  <tr>
    <th>Impact of the disability on involvement and progress in the general education curriculum (for preschool, how the disability affects participation in appropriate activities).</th>
  </tr>

  <tr>
    <td> <textarea class="form-control" name="functional_5_1"></textarea> </td>
  </tr>

  <tr>
    <td> <textarea class="form-control" name="functional_5_2"></textarea> </td>
  </tr>
  <tr>
    <td> <textarea class="form-control" name="functional_5_3"></textarea> </td>
  </tr>

</table>
</div>
</div>
<!--team-->

<!--functional-->
<div class="tab-pane fade" id="a6" role="tabpanel" aria-labelledby="a6-tab" align="left">
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
  <div class="tab-pane fade" id="a2" role="tabpanel" aria-labelledby="profile-tab">
    <div class="row">
      <!--CONSIDERATION OF SPECIAL FACTORS-->
 <div class="col-md-12" align="left">
 II.	CONSIDERATION OF SPECIAL FACTORS
 
 <table class="table">
  <tr>
    <td colspan="2"><p>a.)Does the learner have difficulty relating with people which impede his/her learning or the learning of other?	</p></td>
    <td><input type="radio" name="factor_1" value="yes">Yes</td>
    <td><input type="radio" name="factor_1" value="no">No</td>
  </tr>

  <tr>
    <td colspan="2"><p>b.)if yes, consider the appropriateness of developing a Behavior Intervention Plan.	Behavior Intervention Plan developed?	Refer to Behavior InterventionPlan for additional information.</p></td>
    <td><input type="radio" name="factor_2" value="yes">Yes</td>
    <td><input type="radio" name="factor_2" value="no">No</td>
  </tr>

  <tr>
    <td colspan="2"><p>Does the leaner have difficulty in Moving/ Walking?
If yes, consider the mobility needs as related to IEP and describe below.
</p></td>
    <td><input type="radio" name="factor_3" value="yes">Yes</td>
    <td><input type="radio" name="factor_3" value="no">No</td>
  </tr>
  <tr><td colspan="4"><textarea name="comment_3" id="" class="form-control"></textarea></td></tr>

  <tr>
    <td colspan="2"><p>Does the learner have difficulty in seeing or with blindness/visual impairment?	
    If yes, provide for instruction in Braille and the use of Braille, unless the IEP Team determines that instruction in Braille is not appropriate for the learner after an
evaluation of the learner’s reading and writing skills, needs, and appropriate reading and wrting media, including evaluation of future needs for instruction in Braille
or the use of Braille. Describe below.

</p></td>
    <td><input type="radio" name="factor_4" value="yes">Yes</td>
    <td><input type="radio" name="factor_4" value="no">No</td>
  </tr>

  <tr><td colspan="4"><textarea name="comment_4" id="" class="form-control"></textarea></td></tr>

  <tr>

    <td colspan="2"><p>Does the learner have difficulty in communicating?	
    If yes, consider the communication needs and describe below.

</p></td>
    <td><input type="radio" name="factor_5" value="yes">Yes</td>
    <td><input type="radio" name="factor_5" value="no">No</td>
  </tr>
  <tr><td colspan="4"><textarea name="comment_5" id="" class="form-control"></textarea></td></tr>

  <tr>

<td colspan="2"><p>Does the learner have difficulty in concentrating/paying attention?
If yes, consider the understanding needs and describe below.

</p></td>
<td><input type="radio" name="factor_6" value="yes">Yes</td>
<td><input type="radio" name="factor_6" value="no">No</td>
</tr>
<tr><td colspan="4"><textarea name="comment_6" id="" class="form-control"></textarea></td></tr>

<tr>

<td colspan="2"><p><strong>Does the learner have difficulty in hearing or Is the learner deaf or hard of hearing?</strong>
If yes, consider and describe the learner’s language and communication needs, opportunities for direct communication with peers and professional personnel in the
learner’s language and communication mode, academic level and full range of needs, including opportunities for direct instruction in the learner’s language and
communication mode. Describe communication needs below.


</p></td>
<td><input type="radio" name="factor_7" value="yes">Yes</td>
<td><input type="radio" name="factor_7" value="no">No</td>
</tr>

<tr><td colspan="4"><textarea name="comment_7" id="" class="form-control"></textarea></td></tr>

<tr>

<td colspan="2"><p><strong>Does the learner need assistive technology devices or services?</strong>

If yes, describe the type of assistive technology and how it is used. If no, describe how the learner’s needs are being met in deficit areas



</p></td>
<td><input type="radio" name="factor_8" value="yes">Yes</td>
<td><input type="radio" name="factor_8" value="no">No</td>
</tr>
<tr><td colspan="4"><textarea name="comment_8" id="" class="form-control"></textarea></td></tr>

<tr>

<td colspan="2"><p><strong>Does the learner require alternative format for instructional materials?</strong>

If yes, specify format(s) of materials required below.

</p></td>

<td><input type="radio" name="factor_9" value="yes">Yes</td>
<td><input type="radio" name="factor_9" value="no">No</td>
</tr>

<tr>
  <td colspan="4"><input type="radio" name="factor_8_type" value="Braille"> Braille
  <input type="radio" name="factor_8_type" value="Large Type"> Large Type	
  <input type="radio" name="factor_8_type" value="Auditory"> Auditory	
  <input type="radio" name="factor_8_type" value="Electronic text"> Electronic text	</td>
 		      		  					
</tr>

<tr><td colspan="4"><textarea name="comment_9" id="" class="form-control"></textarea></td></tr>

 </table>

 </div>
</div>
  </div>
  <!--factors-->

  <!--abrriers-->
  <div class="tab-pane fade" id="a3" role="tabpanel" aria-labelledby="contact-tab">
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
  <tr>
    <td><textarea name="functional_1" id="" class="form-control"></textarea></td>
    <td><textarea name="functional_2" id="" class="form-control"></textarea></td>
    <td><textarea name="functional_3" id="" class="form-control"></textarea></td>
    <td><textarea name="functional_4" id="" class="form-control"></textarea></td>
  </tr>
  <tr>
    <td><textarea name="functional_12" id="" class="form-control"></textarea></td>
    <td><textarea name="functional_22" id="" class="form-control"></textarea></td>
    <td><textarea name="functional_32" id="" class="form-control"></textarea></td>
    <td><textarea name="functional_42" id="" class="form-control"></textarea></td>
  </tr>
  <tr>
    <td><textarea name="functional_13" id="" class="form-control"></textarea></td>
    <td><textarea name="functional_23" id="" class="form-control"></textarea></td>
    <td><textarea name="functional_33" id="" class="form-control"></textarea></td>
    <td><textarea name="functional_43" id="" class="form-control"></textarea></td>
  </tr>

  <tr>
    <td><textarea name="functional_14" id="" class="form-control"></textarea></td>
    <td><textarea name="functional_24" id="" class="form-control"></textarea></td>
    <td><textarea name="functional_34" id="" class="form-control"></textarea></td>
    <td><textarea name="functional_44" id="" class="form-control"></textarea></td>
  </tr>

  <tr>
    <td><textarea name="functional_15" id="" class="form-control"></textarea></td>
    <td><textarea name="functional_25" id="" class="form-control"></textarea></td>
    <td><textarea name="functional_35" id="" class="form-control"></textarea></td>
    <td><textarea name="functional_45" id="" class="form-control"></textarea></td>
  </tr>
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
  <div class="tab-pane fade" id="a4" role="tabpanel" aria-labelledby="contact-tab">

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

  <tr>
    <td><textarea type="text" name="interest" class="form-control"></textarea></td>
    <td><textarea type="text" name="goal" class="form-control"></textarea></td>
    <td><textarea type="text" name="intervention" class="form-control"></textarea></td>
    <td><textarea type="text" name="timeline" class="form-control"></textarea></td>
    <td><textarea type="text" name="individual_responsible" class="form-control"></textarea></td>
    <td><textarea type="text" name="remarks" class="form-control"></textarea></td>
    <td><textarea type="text" name="progress" class="form-control"></textarea></td>
   				
  </tr>

  <tr>
    <td><textarea type="text" name="interest2" class="form-control"></textarea></td>
    <td><textarea type="text" name="goal2" class="form-control"></textarea></td>
    <td><textarea type="text" name="intervention2" class="form-control"></textarea></td>
    <td><textarea type="text" name="timeline2" class="form-control"></textarea></td>
    <td><textarea type="text" name="individual_responsible2" class="form-control"></textarea></td>
    <td><textarea type="text" name="remarks2" class="form-control"></textarea></td>
    <td><textarea type="text" name="progress2" class="form-control"></textarea></td>
   				
  </tr>

  <tr>
    <td><textarea type="text" name="interest3" class="form-control"></textarea></td>
    <td><textarea type="text" name="goal3" class="form-control"></textarea></td>
    <td><textarea type="text" name="intervention3" class="form-control"></textarea></td>
    <td><textarea type="text" name="timeline3" class="form-control"></textarea></td>
    <td><textarea type="text" name="individual_responsible3" class="form-control"></textarea></td>
    <td><textarea type="text" name="remarks3" class="form-control"></textarea></td>
    <td><textarea type="text" name="progress3" class="form-control"></textarea></td>
   				
  </tr>

  <tr>
    <td><textarea type="text" name="interest4" class="form-control"></textarea></td>
    <td><textarea type="text" name="goal4" class="form-control"></textarea></td>
    <td><textarea type="text" name="intervention4" class="form-control"></textarea></td>
    <td><textarea type="text" name="timeline4" class="form-control"></textarea></td>
    <td><textarea type="text" name="individual_responsible4" class="form-control"></textarea></td>
    <td><textarea type="text" name="remarks4" class="form-control"></textarea></td>
    <td><textarea type="text" name="progress4" class="form-control"></textarea></td>
   				
  </tr>
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

  <tr>
  <td><textarea type="text" name="transition_interest" class="form-control"></textarea></td>
    <td><textarea type="text" name="work" class="form-control"></textarea></td>
    <td><textarea type="text" name="skills" class="form-control"></textarea></td>
    <td><textarea type="text" name="individual" class="form-control"></textarea></td>
    <td><textarea type="text" name="transition_remarks" class="form-control"></textarea></td>
    				
  </tr>

  <tr>
  <td><textarea type="text" name="transition_interest2" class="form-control"></textarea></td>
    <td><textarea type="text" name="work2" class="form-control"></textarea></td>
    <td><textarea type="text" name="skills2" class="form-control"></textarea></td>
    <td><textarea type="text" name="individual2" class="form-control"></textarea></td>
    <td><textarea type="text" name="transition_remarks2" class="form-control"></textarea></td>
    				
  </tr>

  <tr>
  <td><textarea type="text" name="transition_interest3" class="form-control"></textarea></td>
    <td><textarea type="text" name="work3" class="form-control"></textarea></td>
    <td><textarea type="text" name="skills3" class="form-control"></textarea></td>
    <td><textarea type="text" name="individual3" class="form-control"></textarea></td>
    <td><textarea type="text" name="transition_remarks3" class="form-control"></textarea></td>
    				
  </tr>
</table>
</div>
<!--B.	Goals-->

<div class="col-md-12" >
  <p>IEP IMPLEMENTATION</p>


______________________ As the parent I agree with the components of this IEP, I understand that its provisions will be implemented as soon as possible after the IEP goes into effect.

_____________________ As the parent, I disagree will or part of this IEP, I Understand that the School must provide me with written notice if any intent to implement this IEP. If I wish to prevent the implementation of this IEP, I must submit a written request for a due process hearing to school principal.

<table class="table">
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

  </div>
  <!--goal-->
</div>

</div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
       
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
function preview() {
   thumb.src=URL.createObjectURL(event.target.files[0]);
}
</script>
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>
