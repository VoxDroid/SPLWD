<?php include('../session.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student File</title>

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
                    <div class="d-sm-flex align-items-center  mb-4">
                        <a href="folders.php" class="btn btn-primary mr-3" data-toggle="tooltip" data-placement="top" title="Back to folders"><i class="fas fa-arrow-left "></i></a>
                        <h1 class="h3 mb-0 text-gray-800">Student File</h1>

                    </div>
   


    <div class="row">
 

    <div class="col-md-2 border vh-100">

    <img src="../img/student.png" class="img-fluid" alt="">

    <div class="row">
        <div class="col-md-12 d-flex flex-column">
        <button class="btn btn-info mt-2" data-toggle="modal" data-target="#exampleModalstatus">Transfer Student</button>
    
       
        </div>
    </div>
    <?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM new_student where lrn = $id";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());

while ($row = mysqli_fetch_assoc($sqldata)) {

?>
<h5><strong>Name : </strong><?php echo $row['fname']. " ".$row['lname'];?></h5>
<h5><strong>Category : </strong><?php echo $row['category'];?></h5>
<h5><strong>Status : </strong><?php echo $row['enroll_status'];?></h5>

<div class="modal fade" id="exampleModalstatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Transfer Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> <form action="update_status_1.php?id=<?php echo $row['student_id'];?>&lrn=<?php echo $row['lrn'];?>" method="POST">
        <div class="row">

            <div class="col-md-2"></div>
            <div class="col-md-8">
                <label for="">Transfer Student to : </label>
                <select name="enroll_status" class="form-control" id="">
                    <option value="SCES">SCES</option>
                    <option value="GES">GES</option>
                    <option value="BES">BES</option>
                    
                </select>

                <label for="">Select Adviser: </label>

                <select class="form-control" name="teacher" id="">
        <option value="">Teacher</option>
        <?php
           include('../connect.php');
         
$sqlget = "SELECT * FROM teachers where email != 'admin' and category = 4";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());

while ($row = mysqli_fetch_assoc($sqldata)) { ?>

<option value="<?php echo $row['teacher_id'];?>"><?php echo $row['fname']." ".$row['lname'];?></option>

<?php }?>
        
      </select>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php }?>
        
    </div>

    <div class="col-md-10">
    <div align="right"><!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Folder</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <ul class="nav nav-tabs" id="myTab" role="tablist">

  <li class="nav-item">
    <a class="nav-link active" id="progress-tab" data-toggle="tab" href="#iep" role="tab" aria-controls="progress"
      aria-selected="false">IEP</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="progress-tab" data-toggle="tab" href="#progress" role="tab" aria-controls="progress"
      aria-selected="false">Progress Report</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
      aria-selected="false">Student files</a>
  </li>


</ul>
<form action="create_folder.php?lrn=<?php echo $_GET['id'];?>" method="post" enctype="multipart/form-data">
<div class="tab-content" align="center"id="myTabContent">

<!-- iep -->
<div class="tab-pane fade show active" id="iep" role="tabpanel" aria-labelledby="progress-tab">
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
  
       
       <table class="table">


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
             <td><p><strong>Interpreter or other Accomodations Needed:</strong><br><textarea name="others_2" class="form-control"></textarea></p></td>
             </tr>

       



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
   
          <td>School Psychologist: <input type="text" class="form-control" name="psych"></td>
    
    
          <td>Guidance Counselor/Designate: <input type="text" class="form-control" name="guidance"></td>
          
        </tr>

        <tr>
          <td>Principal/School Head: <input type="text" class="form-control" name="principal"></td>
          <td>School Nurse : <input type="text" class="form-control" name="nurse"></td>
        </tr>

        <tr>
          <td>Other (name and role) : <input class="form-control" name="other_name" type="text"></td>
          <td>Therapist/Pathologist/Specialist : <input class="form-control" name="therapist" type="text"></td>
        </tr>
        <tr>
          <td>Special Education Teacher : <input class="form-control" name="teacher" type="text"></td>
        
        </tr>
        <tr>
          <td colspan="2">*Learner must be invited when transition is discussed
       **The IEP learn must include at least one regular education teacher of the learner (if the learner is or may be participating in the regular education environment
</td>
        </tr>



        <tr>
          <td rowspan="2" colspan="2">
          <p><input type="checkbox" checked value="1" name="if_1"> Not Applicable (learner will not be 18 within one year</p>
          <p><input type="checkbox" value="2" name="if_2">The learner has been informed of his/her rights under law and advised of the transfer of rights at age 18</p>  
          
          <p>Distribution:</p>
           <p><input type="checkbox" checked value="1" name="dis_1"> Learner’s Folder</p>
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
    <td><textarea type="text" name="work1" class="form-control"></textarea></td>
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


  </div>

  </div>
  <!--goal-->
</div>


 



  <!--CONSIDERATION OF SPECIAL FACTORS-->

  
      
        

    </div>
</div>
<!-- iep close -->

  <!--information tab-->

    <!--Assessent tab-->
    <div class="tab-pane fade" id="progress" role="tabpanel" aria-labelledby="progress-tab">
        <label for="">SELECT YEAR OF THE PROGRESS REPORT</label>
        <select name="progress_year" id="">
          <?php
          $count=2010;
          $date=date('Y');
          while($count<= $date){?>
          <option value="<?php echo $count;?>"><?php echo $count;?></option>

          <?php $count++;
        }?>
        </select>
   

        <div class="container-fluid" >
            <div class="row">
                <div class="col-md-12">
                <div class="row">
                
                <div class="col-md-4"><img src="../img/legend.jpg" class="img-fluid"></div>

                               <!--teacher remarks-->
               <div class="col-md-8">
TEACHERS REMARK
               <table class="table table-bordered ">
                <tr>
                    <th>QUATER</th>
                    <th>REMARKS</th>
                </tr>
                <tr>
                    <td>1st</td>
                    <td><input class="form-control" type="text" name="tq1" id=""></td>
                </tr>
                <tr>
                    <td>2nd</td>
                    <td><input class="form-control" type="text" name="tq2" id=""></td>
                </tr>
                <tr>
                    <td>3rd</td>
                    <td><input class="form-control" type="text" name="tq3" id=""></td>
                </tr>
                <tr>
                    <td>4th</td>
                    <td><input class="form-control" type="text" name="tq4" id=""></td>
                </tr>
               </table>

               </div>
               </div>
    </div>
               <!--teacher remarks-->
                <!--first-->
                <div class="col-md-12 col-lg-6 col-xl-6">
              
                <table style="font-size:12px;" class="table table-bordered ">
                    <tr>
                    <th rowspan="2">LEARNING AREAS</th>
                    <th colspan="4">Periodic Rating</th>
                    <th rowspan="2">final rating</th>
                    </tr>

                   <tr>
                   <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                   </tr>
                   <tr align="center"><th colspan="6" >Daily Living Skill Domain</th></tr>
                   <tr><th colspan="6">Self feeding</th></tr>
                   <tr><td>Expresses need to eat drink through non-verbal and or verbal means </td><input type="hidden" name="11" value="Expresses need to eat drink through non-verbal and or verbal means">
                   <td>
                    <select class="selectList" name="11q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="11q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="11q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="11q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="11q5" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>

                   <tr>
                    <td>Chews and swallows different kinds of foods</td><input type="hidden" name="12" value="Chews and swallows different kinds of foods">
                    <td>
                    <select class="selectList" name="12q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="12q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="12q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="12q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td >
                        <select  class="selectList" name="12q5" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr>
                    <td>Swallows liquid like soup</td><input type="hidden" name="13" value="Swallows liquid like soup">
                    <td>
                    <select class="selectList" name="13q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="13q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="13q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="13q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="13q5" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr>
                    <td>Picks up food with fingers or scoops with spoon</td><input type="hidden" name="14" value="Picks up food with fingers or scoops with spoon">
                    <td>
                    <select class="selectList" name="14q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="14q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="14q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="14q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="14q5" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr>
                    <td>Picks up and eats finger food</td><input type="hidden" name="15" value="Picks up and eats finger food">
                    <td>
                    <select class="selectList" name="15q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="15q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="15q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="15q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td >
                        <select  class="selectList" name="15q5" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr>
                    <td>Sips and drinks liquid</td><input type="hidden" name="16" value="Sips and drinks liquid">
                    <td>
                    <select class="selectList" name="16q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="16q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="16q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="16q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="16q5" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr>
                    <td>Eats with spoon and fork</td><input type="hidden" name="17" value="Eats with spoon and fork">
                    <td>
                    <select class="selectList" name="17q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="17q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="17q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="17q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="17q5" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr>
                    <td>Uses the table knife for spreading</td><input type="hidden" name="18" value="Uses the table knife for spreading">
                    <td>
                    <select class="selectList" name="18q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="18q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="18q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="18q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td >
                        <select  class="selectList" name="18q5" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr>
                    <td>Cuts food using the table knife</td><input type="hidden" name="19" value="Cuts food using the table knife">
                    <td>
                    <select class="selectList" name="19q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="19q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="19q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="19q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td >
                        <select  class="selectList" name="19q5" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr>
                    <td>Distinguishes edible and non-edible foods & substances</td><input type="hidden" name="110" value="Distinguishes edible and non-edible foods & substances">
                    <td>
                    <select class="selectList" name="110q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="110q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="110q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="110q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="110q5" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr>
                    <td>Peels / unwraps food</td><input type="hidden" name="111" value="Peels / unwraps food">
                    <td>
                    <select class="selectList" name="111q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="111q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="111q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="111q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="111q5" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr>
                    <td>Uses table napkins</td><input type="hidden" name="112" value="Uses table napkins">
                    <td>
                    <select class="selectList" name="112q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="112q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="112q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="112q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="112q5" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr>
                    <td>Exhibits table settings skills</td><input type="hidden" name="113" value="Exhibits table settings skills">
                    <td>
                    <select class="selectList" name="113q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="113q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="113q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="113q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="113q5" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr><th>Toileting</th></tr>
                   <tr>
                    <td>Uses comfort room/toilet bowl to urinate or defecate</td><input type="hidden" name="114" value="Uses comfort room/toilet bowl to urinate or defecate">
                    <td>
                    <select class="selectList" name="114q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="114q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="114q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="114q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="114q5" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr><td>Uses toilet paper to clean-up and disposes it properly</td><input type="hidden" name="115" value="Uses toilet paper to clean-up and disposes it properly">
                   <td>
                    <select class="selectList" name="115q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="115q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="115q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="115q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="115q5" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                    </tr>
                   <tr>
                    <td>Uses dipper properly</td><input type="hidden" name="116" value="Uses dipper properly">
                    <td>
                    <select class="selectList" name="116q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="116q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="116q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="116q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="116q5" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr>
                    <td>Cleans self with soap & water after toileting</td><input type="hidden" name="117" value="Cleans self with soap & water after toileting">
                    <td>
                    <select class="selectList" name="117q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="117q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="117q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="117q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="117q5" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr><th>Dressing</th></tr>

                   <tr>
                    <td>Removes / puts on socks</td><input type="hidden" name="118" value="Removes / puts on socks">
                    <td>
                    <select class="selectList" name="118q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="118q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="118q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="118q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td >
                        <select  class="selectList" name="118q5" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                <tr>
                    <td>Removes / puts on shoes or slippers</td><input type="hidden" name="119" value="Removes / puts on shoes or slippers">
                    <td>
                    <select class="selectList" name="119q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="119q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="119q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="119q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="119q5" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr>
                    <td>Removes / puts on clothes</td><input type="hidden" name="120" value="Removes / puts on clothes">
                    <td>
                    <select class="selectList" name="120q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="120q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="120q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="120q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="120q5" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr>
                    <td>Open & closes dressing implements (zip/unzip, button/unbutton</td><input type="hidden" name="121" value="Open & closes dressing implements (zip/unzip, button/unbutton">
                    <td>
                    <select class="selectList" name="121q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="121q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="121q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="121q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="121q5" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr>
                    <th>Grooming hygiene</th>

                </tr>
                   <tr>
                    <td>Washes and dries hands properly </td><input type="hidden" name="122" value="Washes and dries hands properly">
                    <td>
                    <select class="selectList" name="122q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="122q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="122q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="122q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td >
                        <select  class="selectList" name="122q5" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr>
                    <td>Cleans own face </td><input type="hidden" name="123" value="Cleans own face">
                    <td>
                    <select class="selectList" name="123q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="123q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="123q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="123q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td >
                        <select  class="selectList" name="123q5" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr>
                    <td>Brushes teeth</td><input type="hidden" name="124" value="Brushes teeth">
                    <td>
                    <select class="selectList" name="124q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="124q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="124q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="124q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="124q5" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr>
                    <td>Combs / brushes hair</td><input type="hidden" name="125" value="Combs / brushes hair">
                    <td>
                    <select class="selectList" name="125q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="125q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="125q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="125q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="125q5" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>

                </table>
                </div>
                 <!--first-->

                           <!--SECOND-->
                <div class="col-md-12 col-lg-6 col-xl-6">
              
              <table style="font-size:12px;" class="table table-bordered ">
                  <tr>
                  <th rowspan="2">LEARNING AREAS</th>
                  <th colspan="4">Periodic Rating</th>
                  <th rowspan="2">final rating</th>
                  </tr>

                 <tr>
                 <th>1</th>
                  <th>2</th>
                  <th>3</th>
                  <th>4</th>
                 </tr>
                 <tr align="center"><th colspan="6" >SOCIO-EMOTIONAL DOMAIN</th></tr>
              
                 <tr><td>Uses courteous expressions appropriately</td><input type="hidden" name="21" value="Uses courteous expressions appropriately">
                 <td>
                  <select class="selectList" name="21q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="21q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="21q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="21q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td >
                      <select  class="selectList" name="21q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>

                 <tr>
                  <td>Asks an apology when necessary </td><input type="hidden" name="22" value="Asks an apology when necessary">
                  <td>
                  <select class="selectList" name="22q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="22q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="22q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="22q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td >
                      <select  class="selectList" name="22q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Pays attention to someone talking</td><input type="hidden" name="23" value="Pays attention to someone talking">
                  <td>
                  <select class="selectList" name="23q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="23q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="23q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="23q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="23q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Plays with peers</td><input type="hidden" name="24" value="Plays with peers">
                  <td>
                  <select class="selectList" name="24q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="24q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="24q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="24q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="24q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Makes friends easy</td><input type="hidden" name="25" value="Makes friends easy">
                  <td>
                  <select class="selectList" name="25q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="25q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="25q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="25q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td >
                      <select  class="selectList" name="25q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Follows rules and regulations</td><input type="hidden" name="26" value="Follows rules and regulations">
                  <td>
                  <select class="selectList" name="26q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="26q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="26q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="26q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td >
                      <select  class="selectList" name="26q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Seeks / Accepts help</td><input type="hidden" name="27" value="Seeks / Accepts help">
                  <td>
                  <select class="selectList" name="27q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="27q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="27q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="27q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td >
                      <select  class="selectList" name="27q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Expresses / shows appropriate emotions</td><input type="hidden" name="28" value="Expresses / shows appropriate emotions">
                  <td>
                  <select class="selectList" name="28q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="28q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="28q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="28q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td >
                      <select  class="selectList" name="28q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Waits for one’s turn</td><input type="hidden" name="29" value="Waits for one’s turn">
                  <td>
                  <select class="selectList" name="29q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="29q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="29q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="29q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td >
                      <select  class="selectList" name="29q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Asks permission to use things owned by others</td><input type="hidden" name="210" value="Asks permission to use things owned by others">
                  <td>
                  <select class="selectList" name="210q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="210q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="210q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="210q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td >
                      <select  class="selectList" name="210q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Seeks help from other friends</td><input type="hidden" name="211" value="Seeks help from other friends">
                  <td>
                  <select class="selectList" name="211q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="211q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="211q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="211q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td >
                      <select  class="selectList" name="211q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Imitates adult activities</td><input type="hidden" name="212" value="Imitates adult activities">
                  <td>
                  <select class="selectList" name="212q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="212q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="212q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="212q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="212q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Displays sense of humor</td><input type="hidden" name="213" value="Displays sense of humor">
                  <td>
                  <select class="selectList" name="213q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="213q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="213q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="213q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="213q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
            
                 <tr>
                  <td>Identifies self as member of family / cultural group</td><input type="hidden" name="214" value="Identifies self as member of family / cultural group">
                  <td>
                  <select class="selectList" name="214q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="214q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="214q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="214q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td >
                      <select  class="selectList" name="214q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr><td>Identifies personal belongings</td><input type="hidden" name="215" value="Identifies personal belongings">
                 <td>
                  <select class="selectList" name="215q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="215q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="215q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="215q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="215q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                  </tr>
                 <tr>
                  <td>Displays sensitivity to the feelings of others</td><input type="hidden" name="216" value="Displays sensitivity to the feelings of others">
                  <td>
                  <select class="selectList" name="216q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="216q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="216q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="216q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td >
                      <select  class="selectList" name="216q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Shows sportsmanship</td><input type="hidden" name="217" value="Shows sportsmanship">
                  <td>
                  <select class="selectList" name="217q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="217q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="217q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="217q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="217q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
               

                 <tr>
                  <td>Show initiatives to work on tasks</td><input type="hidden" name="218" value="Show initiatives to work on tasks">
                  <td>
                  <select class="selectList" name="218q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="218q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="218q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="218q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="218q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Works independently</td><input type="hidden" name="219" value="Works independently">
                  <td>
                  <select class="selectList" name="219q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="219q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="219q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="219q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="219q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Shows self-control</td><input type="hidden" name="220" value="Shows self-control">
                  <td>
                  <select class="selectList" name="220q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="220q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="220q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="220q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="220q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                
                 

              </table>
              </div>
               <!--SECOND-->
               
                 <!--THIRD-->
                 <div class="col-md-12 col-lg-6 col-xl-6">
              
              <table style="font-size:12px;" class="table table-bordered ">
                  <tr>
                  <th rowspan="2">LEARNING AREAS</th>
                  <th colspan="4">Periodic Rating</th>
                  <th rowspan="2">final rating</th>
                  </tr>

                 <tr>
                 <th>1</th>
                  <th>2</th>
                  <th>3</th>
                  <th>4</th>
                 </tr>
                 <tr align="center"><th colspan="6" >LANGUAGE DEVELOPMENT</th></tr>
                <tr><th>LISTENING</th></tr>
                 <tr><td>Follows simple direction</td><input type="hidden" name="31" value="Follows simple direction">
                 <td>
                  <select class="selectList" name="31q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="31q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="31q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="31q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="31q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>

                 <tr>
                  <td>Distinguishes different types of sound </td><input type="hidden" name="32" value="Distinguishes different types of sound">
                  <td>
                  <select class="selectList" name="32q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="32q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="32q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="32q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="32q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Comprehends simple familiar stories</td><input type="hidden" name="33" value="Comprehends simple familiar stories">
                  <td>
                  <select class="selectList" name="33q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="33q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="33q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="33q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="33q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Listens attentively to stories, poems, and rhymes</td><input type="hidden" name="34" value="Listens attentively to stories, poems, and rhymes">
                  <td>
                  <select class="selectList" name="34q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="34q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="34q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="34q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="34q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
              <tr><th>SPEAKING</th></tr>   
              <tr>
                   
                  <td>Increases vocabulary to describe things </td><input type="hidden" name="35" value="Increases vocabulary to describe things ">
                  <td>
                  <select class="selectList" name="35q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="35q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="35q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="35q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td >
                      <select  class="selectList" name="35q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Increases vocabulary to express one’s feelings</td><input type="hidden" name="36" value="Increases vocabulary to express one’s feelings">
                  <td>
                  <select class="selectList" name="36q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="36q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="36q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="36q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="36q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Increases vocabulary to share information</td><input type="hidden" name="37" value="Increases vocabulary to share information">
                  <td>
                  <select class="selectList" name="37q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="37q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="37q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="37q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td >
                      <select  class="selectList" name="37q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Answers and responds to questions accordingly</td><input type="hidden" name="38" value="Answers and responds to questions accordingly">
                  <td>
                  <select class="selectList" name="38q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="38q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="38q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="38q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td >
                      <select  class="selectList" name="38q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
              <tr><th>READING</th></tr>   
              <tr>
                  <td>Discriminates similarities & differences between pictures and objects</td><input type="hidden" name="39" value="Discriminates similarities & differences between pictures and objects">
                  <td>
                  <select class="selectList" name="39q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="39q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="39q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="39q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="39q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Classifies objects according to function Notes details in pictures </td><input type="hidden" name="310" value="Classifies objects according to function Notes details in pictures">
                  <td>
                  <select class="selectList" name="310q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="310q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="310q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="310q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td >
                      <select  class="selectList" name="310q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>

              <tr>
                  <td>Notes details in pictures </td><input type="hidden" name="311" value="Notes details in pictures ">
                  <td>
                  <select class="selectList" name="311q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="311q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="311q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="311q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="311q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Visualizes objects and pictures from memory</td><input type="hidden" name="312" value="Visualizes objects and pictures from memory ">
                  <td>
                  <select class="selectList" name="312q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="312q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="312q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="312q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td >
                      <select  class="selectList" name="312q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Comprehends picture stories</td><input type="hidden" name="313" value="Comprehends picture stories">
                  <td>
                  <select class="selectList" name="313q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="313q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="313q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="313q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td >
                      <select  class="selectList" name="313q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
              <tr><th>WRITING</th></tr>   
              <tr>
                  <td>Holds / grips pencil properly</td><input type="hidden" name="314" value="Holds / grips pencil properly">
                  <td>
                  <select class="selectList" name="314q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="314q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="314q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="314q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="314q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
            
                 <tr>
                  <td>Traces lines and shapes</td><input type="hidden" name="315" value="Traces lines and shapes">
                  <td>
                  <select class="selectList" name="315q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="315q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="315q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="315q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td >
                      <select  class="selectList" name="315q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr><td>Traces letters, numbers and one’s names properly</td><input type="hidden" name="316" value="Traces letters, numbers and one’s names properly">
                 <td>
                  <select class="selectList" name="316q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="316q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="316q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="316q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="316q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                  </tr>
                 <tr>
                  <td>Draws basic figures</td><input type="hidden" name="317" value="Draws basic figures">
                  <td>
                  <select class="selectList" name="317q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="317q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="317q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="317q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="317q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Uses basic strokes correctly</td><input type="hidden" name="318" value="Uses basic strokes correctly">
                  <td>
                  <select class="selectList" name="318q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="318q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="318q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="318q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="318q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
               

                
                
                 

              </table>
              </div>
               <!--THIRD-->
               <hr>

                 <!--FOURTH-->
                 <div class="col-md-12 col-lg-6 col-xl-6">
              
              <table style="font-size:12px;" class="table table-bordered ">
                  <tr>
                  <th rowspan="2">LEARNING AREAS</th>
                  <th colspan="4">Periodic Rating</th>
                  <th rowspan="2">final rating</th>
                  </tr>

                 <tr>
                 <th>1</th>
                  <th>2</th>
                  <th>3</th>
                  <th>4</th>
                 </tr>
                 <tr align="center"><th colspan="6" >PYSCHOMOTOR DOMAIN</th></tr>
                 <tr><th>BASIC MOVEMENT</th></tr>
              
                 <tr><td>Sits, stand and walks with good posture</td><input type="hidden" name="41" value="Sits, stand and walks with good posture">
                 <td>
                  <select class="selectList" name="41q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="41q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="41q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="41q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="41q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>

                 <tr>
                  <td>Runs and jogs gradually in increasing distance</td><input type="hidden" name="42" value="Runs and jogs gradually in increasing distance">
                  <td>
                  <select class="selectList" name="42q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="42q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="42q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="42q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="42q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Jumps & performs other exercises with or w/o music</td><input type="hidden" name="43" value="Jumps & performs other exercises with or w/o music">
                  <td>
                  <select class="selectList" name="43q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="43q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="43q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="43q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="43q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Lifts increasing heavy weights</td><input type="hidden" name="44" value="Lifts increasing heavy weights">
                  <td>
                  <select class="selectList" name="44q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="44q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="44q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="44q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="44q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Balances in one foot for gradually increasing period of time </td><input type="hidden" name="45" value="Balances in one foot for gradually increasing period of time">
                  <td>
                  <select class="selectList" name="45q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="45q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="45q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="45q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="45q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Imitates motor movements of people & animals</td><input type="hidden" name="46" value="Imitates motor movements of people & animals">
                  <td>
                  <select class="selectList" name="46q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="46q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="46q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="46q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td >
                      <select  class="selectList" name="46q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Bends & strengthens knees properly while feet flat on the floor </td><input type="hidden" name="47" value="Bends & strengthens knees properly while feet flat on the floor ">
                  <td>
                  <select class="selectList" name="47q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="47q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="47q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="47q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="47q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Goes up and down the stairs</td><input type="hidden" name="48" value="Goes up and down the stairs">
                  <td>
                  <select class="selectList" name="48q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="48q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="48q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="48q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="48q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
              <tr><th>PERCEPTUAL MOTOR SKILLS</th></tr>   
              <tr>
                  <td>Uses clay to make simple but increasingly meaningful shapes & objects</td><input type="hidden" name="49" value="GUses clay to make simple but increasingly meaningful shapes & objects">
                  <td>
                  <select class="selectList" name="49q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="49q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="49q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="49q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td >
                      <select  class="selectList" name="49q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
              <tr>
                  <td>Uses crayon to color</td><input type="hidden" name="410" value="Uses crayon to color">
                  <td>
                  <select class="selectList" name="410q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="410q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="410q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="410q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="410q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
              <tr><th>GROSS MOTOR SKILLS</th></tr>  

              <tr>
                  <td>Walks while carrying objects </td><input type="hidden" name="411" value="Walks while carrying objects ">
                  <td>
                  <select class="selectList" name="411q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="411q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="411q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="411q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="411q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Jumps toward aim without falling</td><input type="hidden" name="412" value="Jumps toward aim without falling">
                  <td>
                  <select class="selectList" name="412q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="412q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="412q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="412q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="412q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
              
              <tr>
                  <td>Throws and catches objects  </td><input type="hidden" name="413" value="Throws and catches objects">
                  <td>
                  <select class="selectList" name="413q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="413q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="413q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="413q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="413q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Kicks ball without losing balance</td><input type="hidden" name="414" value="Kicks ball without losing balance">
                  <td>
                  <select class="selectList" name="414q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="414q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="414q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="414q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="414q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Hops alternately without falling</td><input type="hidden" name="415" value="Hops alternately without falling">
                  <td>
                  <select class="selectList" name="415q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="415q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="415q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="415q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="415q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
            <tr><th>FINE MOTOR SKIILLS</th></tr>
            <tr>
                  <td>Makes an object out of clay</td><input type="hidden" name="416" value="Makes an object out of clay">
                  <td>
                  <select class="selectList" name="416q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="416q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="416q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="416q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="416q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
              <tr>
                  <td>Squeezes soft rubber ball of convenient size</td><input type="hidden" name="417" value="Squeezes soft rubber ball of convenient size">
                  <td>
                  <select class="selectList" name="417q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="417q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="417q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="417q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="417q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Folds divides & tears paper into halves / pieces</td><input type="hidden" name="418" value="Folds divides & tears paper into halves / pieces">
                  <td>
                  <select class="selectList" name="418q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="418q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="418q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="418q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="418q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr><td>Cuts out shapes, outline & objects</td><input type="hidden" name="419" value="FCuts out shapes, outline & objects">
                 <td>
                  <select class="selectList" name="419q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="419q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="419q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="419q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="419q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                  </tr>
                 <tr>
                  <td>Pastes paper properly</td><input type="hidden" name="420" value="Pastes paper properly">
                  <td>
                  <select class="selectList" name="420q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="420q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="420q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="420q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="420q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Strings and threads beads</td><input type="hidden" name="421" value="Strings and threads beads">
                  <td>
                  <select class="selectList" name="421q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="421q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="421q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="421q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="421q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
               

                 <tr>
                  <td>Turns doorknob with forearm rotation</td><input type="hidden" name="422" value="Turns doorknob with forearm rotation">
                  <td>
                  <select class="selectList" name="422q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="422q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="422q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="422q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="422q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Removes bottle cap</td><input type="hidden" name="423" value="Removes bottle cap">
                  <td>
                  <select class="selectList" name="423q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="423q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="423q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="423q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="423q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                
                
              </table>
              </div>
               <!--FOURTH-->

                     <!--FIFTH-->
                     <div class="col-md-12 col-lg-6 col-xl-6">
              
              <table style="font-size:12px;" class="table table-bordered ">
                  <tr>
                  <th rowspan="2">LEARNING AREAS</th>
                  <th colspan="4">Periodic Rating</th>
                  <th rowspan="2">final rating</th>
                  </tr>

                 <tr>
                 <th>1</th>
                  <th>2</th>
                  <th>3</th>
                  <th>4</th>
                 </tr>
                 <tr align="center"><th colspan="6" >PCOGNITIVE DOMAIN</th></tr>
        
                 <tr><td>Identifies colors</td><input type="hidden" name="51" value="Identifies colors">
                 <td>
                  <select class="selectList" name="51q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="51q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="51q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="51q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="51q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>

                 <tr>
                  <td>Identifies shapes</td><input type="hidden" name="52" value="Identifies shapes">
                  <td>
                  <select class="selectList" name="52q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="52q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="52q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="52q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="52q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Identifies letters of the alphabet</td><input type="hidden" name="53" value="Identifies letters of the alphabet">
                  <td>
                  <select class="selectList" name="53q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="53q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="53q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="53q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="53q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Identifies sizes (long, short, big, small, tall, short)</td><input type="hidden" name="54" value="Identifies sizes (long, short, big, small, tall, short)">
                  <td>
                  <select class="selectList" name="54q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="54q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="54q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="54q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="54q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Sorts objects according to color</td><input type="hidden" name="55" value="Sorts objects according to color">
                  <td>
                  <select class="selectList" name="55q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="55q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="55q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="55q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="55q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Sorts objects according to size</td><input type="hidden" name="56" value="Sorts objects according to size">
                  <td>
                  <select class="selectList" name="56q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="56q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="56q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="56q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="56q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Sorts objects according to shape</td><input type="hidden" name="57" value="Sorts objects according to shape">
                  <td>
                  <select class="selectList" name="57q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="57q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="57q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="57q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="57q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Tells the size of an object</td><input type="hidden" name="58" value="Tells the size of an object">
                  <td>
                  <select class="selectList" name="58q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="58q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="58q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="58q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="58q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
             
              <tr>
                  <td>Identifies numbers up to _______________</td><input type="hidden" name="59" value="Identifies numbers up to _______________">
                  <td>
                  <select class="selectList" name="59q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="59q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="59q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="59q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="59q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Counts numbers up to __________________</td><input type="hidden" name="510" value="Counts numbers up to __________________">
                  <td>
                  <select class="selectList" name="510q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="510q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="510q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="510q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="510q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
           
              <tr>
                  <td>Follows one to three steps direction </td><input type="hidden" name="511" value="Follows one to three steps direction ">
                  <td>
                  <select class="selectList" name="511q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="511q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="511q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="511q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="511q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Identifies the body parts</td><input type="hidden" name="512" value="Identifies the body parts">
                  <td>
                  <select class="selectList" name="512q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="512q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="512q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="512q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="512q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Identifies the five senses & their function</td><input type="hidden" name="513" value="Identifies the five senses & their function">
                  <td>
                  <select class="selectList" name="513q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="513q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="513q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="513q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="513q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
         
                 <tr>
                  <td>Sequences / Arranges picture in the story</td><input type="hidden" name="514" value="Sequences / Arranges picture in the story">
                  <td>
                  <select class="selectList" name="514q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="514q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="514q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="514q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="514q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                <tr>
                  <td>Identifies / Reads simple words with pictures</td><input type="hidden" name="515" value="Identifies / Reads simple words with pictures">
                  <td>
                  <select class="selectList" name="515q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="515q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="515q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="515q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="515q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Identifies / Reads simple phrases with pictures</td><input type="hidden" name="516" value="Identifies / Reads simple phrases with pictures">
                  <td>
                  <select class="selectList" name="516q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="516q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="516q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="516q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="516q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
               

                 <tr>
                  <td>Identifies / Reads simple sentences with pictures</td><input type="hidden" name="517" value="Identifies / Reads simple sentences with pictures">
                  <td>
                  <select class="selectList" name="517q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="517q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="517q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="517q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="517q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 
              <tr>
                  <td>Identifies days of the week</td><input type="hidden" name="518" value="Identifies days of the week">
                  <td>
                  <select class="selectList" name="518q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="518q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="518q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="518q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="518q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
              <tr>
                  <td>Identifies month in the year</td><input type="hidden" name="519" value="Identifies month in the year">
                  <td>
                  <select class="selectList" name="519q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="519q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="519q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="519q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="519q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
              
              <tr>
                  <td>Identifies one self</td><input type="hidden" name="520" value="Identifies one self">
                  <td>
                  <select class="selectList" name="520q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="520q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="520q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="520q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="520q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>

              <tr>
                  <td>Identifies members of the family</td><input type="hidden" name="521" value="Identifies members of the family">
                  <td>
                  <select class="selectList" name="521q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="521q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="521q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="521q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="521q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>

              <tr>
                  <td>Identifies different community helpers in school and / or in the community </td><input type="hidden" name="522" value="Identifies different community helpers in school and / or in the community">
                  <td>
                  <select class="selectList" name="522q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="522q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="522q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="522q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="522q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>

              <tr>
                  <td>Identifies objects / pictures being presented</td><input type="hidden" name="523" value="Identifies objects / pictures being presented">
                  <td>
                  <select class="selectList" name="523q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="523q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="523q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="523q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="523q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>

             


                
                
              </table>
              </div>
               <!--FIFTH-->

                            <!--SIX-->
                            <div class="col-md-12 col-lg-6 col-xl-6">
              
              <table style="font-size:12px;" class="table table-bordered ">
                  <tr>
                  <th rowspan="2">LEARNING AREAS</th>
                  <th colspan="4">Periodic Rating</th>
                  <th rowspan="2">final rating</th>
                  </tr>

                 <tr>
                 <th>1</th>
                  <th>2</th>
                  <th>3</th>
                  <th>4</th>
                 </tr>
                 <tr align="center"><th colspan="6" >BEHAVIORAL DEVELOPMENT</th></tr>
        
                 <tr><td>Uses appropriate verbal communication for social interaction </td><input type="hidden" name="61" value="Uses appropriate verbal communication for social interaction">
                 <td>
                  <select class="selectList" name="61q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="61q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="61q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="61q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="61q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>

                 <tr>
                  <td>Learns how to speak in lower tone</td><input type="hidden" name="62" value="Learns how to speak in lower tone">
                  <td>
                  <select class="selectList" name="62q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="62q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="62q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="62q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="62q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Familiarizes with and takes routed direction</td><input type="hidden" name="63" value="Familiarizes with and takes routed direction">
                  <td>
                  <select class="selectList" name="63q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="63q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="63q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="63q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="63q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Follows “Quieting Down” instruction</td><input type="hidden" name="64" value="Follows “Quieting Down” instruction">
                  <td>
                  <select class="selectList" name="64q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="64q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="64q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="64q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="64q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Performs simple tasks (e.g. throwing of trash in the bin, etc.)</td><input type="hidden" name="65" value="Performs simple tasks (e.g. throwing of trash in the bin, etc.)">
                  <td>
                  <select class="selectList" name="65q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="65q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="65q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="65q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="65q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Puts back materials used like pencil in its proper place</td><input type="hidden" name="66" value="Puts back materials used like pencil in its proper place">
                  <td>
                  <select class="selectList" name="66q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="66q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="66q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="66q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="66q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Accepts consequences of behavior</td><input type="hidden" name="67" value="Accepts consequences of behavior">
                  <td>
                  <select class="selectList" name="67q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="67q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="67q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="67q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="67q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Follows teacher’s command instruction</td><input type="hidden" name="68" value="Follows teacher’s command instruction">
                  <td>
                  <select class="selectList" name="68q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="68q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="68q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="68q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="68q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
             
              <tr>
                  <td>Participates well in lesson being executed by the teacher</td><input type="hidden" name="69" value="Participates well in lesson being executed by the teacher">
                  <td>
                  <select class="selectList" name="69q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="69q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="69q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="69q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="69q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Responds to questions, activities given to him / her</td><input type="hidden" name="610" value="Responds to questions, activities given to him / her">
                  <td>
                  <select class="selectList" name="610q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="610q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="610q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="610q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="610q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
           
              <tr>
                  <td>Attends to tasks without getting out from the chair </td><input type="hidden" name="611" value="Attends to tasks without getting out from the chair">
                  <td>
                  <select class="selectList" name="611q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="611q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="611q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="611q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="611q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Watches / Listens to videos / music for 5 minutes or more</td><input type="hidden" name="612" value="Watches / Listens to videos / music for 5 minutes or more">
                  <td>
                  <select class="selectList" name="612q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="612q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="612q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="612q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="612q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Responds positively to behavior management procedures</td><input type="hidden" name="613" value="Responds positively to behavior management procedures">
                  <td>
                  <select class="selectList" name="613q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="613q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="613q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="613q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="613q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>

              <tr>
                  <td>Reduces / Eliminates in appropriate and aggressive behavior during session</td><input type="hidden" name="614" value="Reduces / Eliminates in appropriate and aggressive behavior during session">
                  <td>
                  <select class="selectList" name="614q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="614q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="614q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="614q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="614q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>

              <tr>
                  <td>Reduces / Eliminates tantrums during the session </td><input type="hidden" name="615" value="Reduces / Eliminates tantrums during the session">
                  <td>
                  <select class="selectList" name="615q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="615q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="615q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="615q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="615q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
         
                 <tr>
                  <td>Plays with other children</td><input type="hidden" name="616" value="Plays with other children">
                  <td>
                  <select class="selectList" name="616q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="616q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="616q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="616q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="616q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr><td>Takes turn in game activity</td><input type="hidden" name="617" value="Takes turn in game activity">
                 <td>
                  <select class="selectList" name="617q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="617q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="617q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="617q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="617q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                  </tr>
                 <tr>
                  <td>Takes turn games / knows how to wait when playing time</td><input type="hidden" name="618" value="Takes turn games / knows how to wait when playing time">
                  <td>
                  <select class="selectList" name="618q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="618q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="618q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="618q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="618q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Shares things / food without teacher’s prompt</td><input type="hidden" name="619" value="Shares things / food without teacher’s prompt">
                  <td>
                  <select class="selectList" name="619q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="619q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="619q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="619q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="619q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
               

                 <tr>
                  <td>Develops longer attention span to complete the task</td><input type="hidden" name="620" value="Develops longer attention span to complete the task">
                  <td>
                  <select class="selectList" name="620q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="620q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="620q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="620q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="620q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Completes task on time</td><input type="hidden" name="621" value="Completes task on time">
                  <td>
                  <select class="selectList" name="621q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="621q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="621q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="621q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="621q5" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>

             

             


                
                
              </table>
              </div>
               <!--SIXTH-->
<hr>

               
            </div>
        </div>



  </div>
<!--Assessment tab-->

  <!--Assessent tab-->
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

  <table class="table p-3">
    <tr>
        <th>File type</th>
        <th>Year</th>
        <th>Description</th>
        <th>Action</th>
    </tr>
    <tr>
        <td>INDIVIDUALIZED EDUCATION PLAN</td><input type="hidden" value="INDIVIDUALIZED EDUCATION PLAN" name="type1"></td>
        <td><input type="number" class="form-control" name="year1" max="2030" min="2010"></td>
        <td><input type="text" name="des1" class="form-control"></td>

        <td>
            
            <input id="uploadPDF1" onchange="showname()" type="file" name="fileToUpload1"/>
        </td>
        
    </tr>
    <tr>
        <td>INDIVIDUAL LEARNERS PLAN</td><input type="hidden" value="INDIVIDUAL LEARNERS PLAN" name="type2"></td>
        <td><input type="number" class="form-control" name="year2" max="2030" min="2010"></td>
        <td><input type="text" name="des2" class="form-control"></td>

        <td>
           
            <input id="uploadPDF2" onchange="showname1()" type="file" name="fileToUpload2"/>
        </td>
        
    </tr>
    <tr>
        <td>INDIVIDUAL LEARNING MONITORING PLAN</td><input type="hidden" value="INDIVIDUAL LEARNING MONITORING PLAN" name="type3"></td>
        <td><input type="number" class="form-control" name="year3" max="2030" min="2010"></td>
        <td><input type="text" name="des3" class="form-control"></td>
        <td>
           
            <input id="uploadPDF3" onchange="showname2()" type="file" name="fileToUpload3"/>
        </td>
        
    </tr>
    <tr>
        <td>BEHAVIOR INTERVENTION REPORT</td><input type="hidden" value="BEHAVIOR INTERVENTION REPORT" name="type4"></td>
        <td><input type="number" class="form-control" name="year4" max="2030" min="2010"></td>
        <td><input type="text" name="des4" class="form-control"></td>
        <td>
          
            <input id="uploadPDF4" onchange="showname3()" type="file" name="fileToUpload4"/>
        </td>
        
    </tr>
   
  </table>

 

  </div>
<!--Assessment tab-->





      </div>
      <div class="modal-footer">
       
      <input type="submit" value="ADD STUDENT" class="btn btn-primary float-right" name="submit">
      </form>
      </div>
    </div>
  </div>
</div></div>
      <div class="row">

    <?php

include('../connect.php');
$id = $_GET['id'];
$school =$_SESSION['school'];
$sqlget1 = "SELECT * FROM folder where lrn = $id";
$sqldata1 = mysqli_query($conn, $sqlget1) or die('Error Displaying Data'. mysqli_connect_error());

while ($row3 = mysqli_fetch_assoc($sqldata1)) {

?>
<div class="col-md-2" align="center">
  <?php 

  echo $row3['folder_year'];?>
  <a href="student_file.php?id=<?php echo $row3['lrn'];?>&folder_id=<?php echo $row3['folder_id'];?>"> <img class="img-fluid" src="../img/folder.png" alt=""></a>
 
</div>



<?php
}

?>

    </div>
    <table id="example" class="table"  style="width:100%;">
<thead>
                    <tr>
                    <th style="color:black;">Folder Year</th>
                   
                    <th style="color:black;">Description</th>
                    <th style="color:black;">Date Added</th>
                    <th style="color:black;">Action</th>
                
                 
                    
                    </tr>
</thead>
<tbody>


<?php
include('../connect.php');

$lrnn = $_GET['id'];
$sqlget1 = "SELECT * FROM folder where lrn = $lrnn";
$sqldata1 = mysqli_query($conn, $sqlget1) or die('Error Displaying Data'. mysqli_connect_error());

while ($row3 = mysqli_fetch_assoc($sqldata1)) {

?>

<tr>

<td style="color:black;"><?php echo $row3['folder_year'];?></td>
<td style="color:black;"><?php echo $row3['description'];?></td>
<td style="color:black;"><?php echo $row3['date_added'];?></td>

<td style="color:black;">
<a class="btn btn-success" href="student_file.php?id=<?php echo $row3['lrn'];?>&folder_id=<?php echo $row3['folder_id'];?>"> View</a>

</td>

</tr>
<?php }?>






</tbody>

<tfoot>
                    <tr>
                     
                    <th style="color:black;">Folder Year</th>
                  
                    <th style="color:black;">Description</th>
                    <th style="color:black;">Date Added</th>
                    <th style="color:black;">Action</th>
             
                 
                    
                    </tr>
</tfoot>
</table>
    </div>

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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
      function showname () {
      var name = document.getElementById('uploadPDF1'); 
      const input =document.getElementById('uploadPDF1');
      let text=(name.files.item(0).name);
      const f = text.split(".");

      
      if(f[1] != 'pdf'){
        swal("Please Select PDF file only!",{ icon: "warning"});
      input.value="";
      }
     
    };
 </script>

<script>
      function showname1 () {
      var name = document.getElementById('uploadPDF2'); 
      const input =document.getElementById('uploadPDF2');
      let text=(name.files.item(0).name);
      const f = text.split(".");

      
      if(f[1] != 'pdf'){
        swal("Please Select PDF file only!",{ icon: "warning"});
      input.value="";
      }
     
    };
 </script>

<script>
      function showname2 () {
      var name = document.getElementById('uploadPDF3'); 
      const input =document.getElementById('uploadPDF3');
      let text=(name.files.item(0).name);
      const f = text.split(".");

      
      if(f[1] != 'pdf'){
        swal("Please Select PDF file only!",{ icon: "warning"});
      input.value="";
      }
     
    };
 </script>

<script>
      function showname3 () {
      var name = document.getElementById('uploadPDF4'); 
      const input =document.getElementById('uploadPDF4');
      let text=(name.files.item(0).name);
      const f = text.split(".");

      
      if(f[1] != 'pdf'){
        swal("Please Select PDF file only!",{ icon: "warning"});
      input.value="";
      }
     
    };
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
    <script>
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
if(isset($_GET['alert'])){

  echo "<script>swal('Folder has been added', 'Folder Successfully Added to a Student', 'success');</script>";

}
?>

<?php
if(isset($_GET['status'])){

  echo "<script>swal('Student has been transferred', 'Student Successfully Transferred', 'success');</script>";

}
?>

</body>

</html>