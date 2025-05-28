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
        <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
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
        <button class="btn btn-info mt-2" data-toggle="modal" data-target="#exampleModalstatus">Update Enrollment status</button>
        <button class="btn btn-success mt-2" data-toggle="modal" data-target="#exampleModalinfo">Update Information</button>
        <button class="btn btn-warning mt-2" data-toggle="modal" data-target="#history">Teacher History</button>

        <!-- Modal -->
<div class="modal fade" id="history" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Teacher History</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <table class="table table-borderless">

      <tr><th>Teacher</th> <th>Year</th></tr>
      
      <?php

include('../connect.php');
$id = $_GET['id'];
$steacher = "SELECT distinct teacher,date FROM teacher_history where lrn = $id";
$sqldatateacher = mysqli_query($conn, $steacher) or die('Error Displaying Data'. mysqli_connect_error());

while ($rowteach = mysqli_fetch_assoc($sqldatateacher)) {

    


?>

<tr>
    <td><?php echo $rowteach['teacher']; ?></td>
    <td><?php echo $rowteach['date']; ?></td>
</tr>
<?php } ?>
</table>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
       
        </div>
    </div>
    <?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM new_student where lrn = $id";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());

while ($row = mysqli_fetch_assoc($sqldata)) {

?>


        <!-- Modal update info-->
        <div class="modal fade" id="exampleModalinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:black;" class="modal-title" id="exampleModalLabel">Update Student Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="update_student_info.php?lrn=<?php echo $_GET['id'];?>" method="POST">

        <div class="row">

        <div class="col-md-6">

        <table align="left" class="table table-bordered">
    <tr>
      <td style="color:black;">LRN:</td>
      <td style="color:black;"><input type="number" name="lrn" class="form-control" value="<?php echo $row['lrn'];?>" readonly> </td>
      <input type="hidden" value ="<?php echo $row['student_id'];?>" name="id">
    </tr>

    <tr>
        <td style="color:black;">Category: </td>
        <td style="color:black;"><input type="text" name="category" class="form-control" value="<?php echo $row['category'];?>" readonly></td>
    </tr>

    <tr>
        <td style="color:black;">Status: </td>
        <td style="color:black;">  <input type="text" name="enroll_status" class="form-control" value="<?php echo $row['enroll_status'];?>" readonly> </td>

    </tr>
    <tr>
      <td style="color:black;">First Name:</td>
      <td style="color:black;">
      <input type="text" name="fname" class="form-control" value="<?php echo $row['fname'];?>">
      <input type="hidden" name="student_code" class="form-control" placeholder="Student Code"></td>
    </tr>

    <tr>
      <td style="color:black;">Last Name:</td>
      <td style="color:black;">
      <input type="text" name="lname" class="form-control" value="<?php echo $row['lname'];?>">
     
    </tr>
    <tr>
      <td style="color:black;">Middle Name:</td>
      <td style="color:black;">
      <input type="text" name="mname" class="form-control" value="<?php echo $row['mname'];?>">
     
    </tr>
    
    <tr>
      <td style="color:black;">Birth Date:</td>
      <td style="color:black;"><input type="date" name="birth_date" class="form-control" value="<?php echo $row['birth_date'];?>"></td>
    </tr>
    <tr>
      <td style="color:black;">Birth Place:</td>
      <td style="color:black;"><input type="text" name="birth_place" class="form-control" value="<?php echo $row['birth_place'];?>"></td>
    </tr>
    <tr>
      <td style="color:black;">Gender:</td>
      <td style="color:black;"><input type="text" name="gender" class="form-control" value="<?php echo $row['gender'];?>"></td>
    </tr>

    <tr>
      <td style="color:black;">Address:</td>
      <td style="color:black;"><input type="text" name="address" class="form-control" value="<?php echo $row['address'];?>">
       
    </tr>

  
<tr>
  <td style="color:black;">School:</td>
  <td style="color:black;"> <input type="text" class="form-control" value="<?php echo $_SESSION['school'];?>"  name="school" readonly></td>
</tr>
    <tr>
      <td style="color:black;">Teacher:</td>
      <td style="color:black;"><input type="text" name="teacher" class="form-control" value="<?php echo $row['teacher'];?>" readonly></td>

      <tr>
      <td style="color:black;">Mother Tounge:</td>
      <td style="color:black;"><input type="text" name="m_tounge" class="form-control" value="<?php echo $row['m_tounge'];?>"></td>
    </tr>
    
    
  </table>
  </div>
  <div class="col-md-6 bg-light">

  <table class="table table-bordered">
  <tr>
      <td style="color:black;">Guardian Name:</td>
      <td style="color:black;">
      <input type="text" name="guardian" class="form-control" value="<?php echo $row['guardian'];?>">
     
    </tr>

    <tr>
      <td style="color:black;">Guardian Occupation:</td>
      <td style="color:black;">
      <input type="text" name="work" class="form-control" value="<?php echo $row['work'];?>">
     
    </tr>

    <tr>
      <td style="color:black;">Guardian Contact:</td>
      <td style="color:black;"><input type="text" name="guardian_contact" class="form-control" value="<?php echo $row['gurdian_contact'];?>"></td>
    </tr>

    <tr>
      <td style="color:black;">Guardian email:</td>
      <td style="color:black;">
      <input type="email" name="email" class="form-control" value="<?php echo $row['email'];?>">
     
    </tr>

    <tr>
      <td style="color:black;">Guardian Mother Tounge:</td>
      <td style="color:black;">
      <input type="text" name="guardian_mtounge" class="form-control" value="<?php echo $row['guardian_mtounge'];?>">
     
    </tr>

</table>
</div>

</div>
  


      </div>
      <div class="modal-footer">

        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

 <!-- Modal update info-->
<h5 style="color:black;"><strong>Name : </strong><?php echo $row['fname']. " ".$row['lname'];?></h5>
<h5 style="color:black;"><strong>Category : </strong><?php echo $row['category'];?></h5>
<h5 style="color:black;"><strong>Status : </strong><?php echo $row['enroll_status'];?></h5>

<div class="modal fade" id="exampleModalstatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:black;" class="modal-title" id="exampleModalLabel">Update Enrollment Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> <form action="update_status.php?id=<?php echo $row['student_id'];?>&lrn=<?php echo $row['lrn'];?>" method="POST">
        <div class="row">

            <div class="col-md-2"></div>
            <div class="col-md-8">
                <select name="enroll_status" class="form-control" id="">
                    <option value="Enrolled">Enrolled</option>
                    <option value="Main streamed">Main streamed</option>
                    <option value="Graduated">Graduated</option>
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
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Create Folder
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color:black;" class="modal-title" id="exampleModalLabel">Create Folder</h5>
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
<label for="">SELECT SCHOOL YEAR</label>
  <br>
        <select class="form-control" style="width:200px;" name="progress_year" id="">
          <?php
          $count=2010;
          $date=date('Y');
          while($count<= $date){?>
          <option value="<?php echo $count;?>"><?php echo $count;?></option>

          <?php $count++;
        }?>
        </select>
        <br>

        <label for="">Folder Description</label>
        <br>
        <input type="text" name="folder_des" class="form-control" style="width:500px;">
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
             <td style="color:black;"><p style="color:black;"><strong>Grade/Level:</strong> <select name="grade" id="" class="form-control">
              <option value="1">I</option>
              <option value="2">II</option>
              <option value="3">III</option>
              <option value="4">IV</option>
              <option value="5">V</option>
              <option value="6">VI</option></select> </p></td>
             </tr>

        

             <tr>
             <td style="color:black;"><p style="color:black;"><strong>Interpreter or other Accomodations Needed:</strong><br><textarea name="others_2" class="form-control"></textarea></p></td>
             </tr>

       



       </table>

            </div>
            <!--info-->

                <!--difficulty-->
                <div class="col-md-3 border" align="left">
                DIFFICULTIES (Select most relevant):

                <p style="color:black;"><input type="checkbox" checked  name="d6" value="1"> Difficulty in Seeing</p>

<p style="color:black;"><input type="checkbox" name="d1" value="1"> Difficulty in Hearing</p>

<p style="color:black;"><input type="checkbox" name="d2" value="1"> Difficulty in Communicating</p>

<p style="color:black;"><input type="checkbox" name="d3" value="1"> Difficulty in Moving/Walking</p>

<p style="color:black;"><input type="checkbox" name="d4" value="1"> Difficulty in Concentrating/Paying
     Attention    </p>    

<p style="color:black;"><input type="checkbox" name="d5" value="1"> Difficulty in Remembering/
     Understanding</p>

<p style="color:black;">Other (please specify) <br><textarea name="others" id="" cols="25" rows="3"></textarea></p>




<p style="color:black;"> Medical diagnosis(if yes, Indicate)  <br><textarea name="medical_diagnos" id="" cols="25" rows="3"></textarea></p>


                </div>
                 <!--difficulty-->
                   <!--meeting-->
                <div class="col-md-4 border" align="left">
                MEETING INFORMATION:

                <p style="color:black;">DATE OF MEETING <input type="date" name="date_meeting"></p>
<p style="color:black;">DATE OF LAST IEP<input type="date" name="date_last_iep"></p>

<strong>PURPOSE OF MEETING:</strong> 
<p style="color:black;"><input type="radio" checked name="purpose"  value="1"> Interim IEP</p>
<p style="color:black;"><input type="radio" name="purpose" value="2"> Initial IEP</p>
<p style="color:black;"><input type="radio" name="purpose" value="3"> Term IEP</p>

<p style="color:black;"><input type="radio" name="purpose" value="4"> IEP Following 3-Yr, Reevaluation</p>
<p style="color:black;"><input type="radio" name="purpose" value="5"> Revision to IEP Date <input type="date" name="review_date"></p>

<p style="color:black;"><input type="radio" name="purpose" value="6"> Exit/Graduation</p>
<p style="color:black;"> IEP Revision Without a Meeting At the request of </p>
   <p style="color:black;"> <input type="radio" name="purpose" value="7">Parent</p>
   <p style="color:black;"> <input type="radio" name="purpose" value="8">School</p>

<p style="color:black;">IEP Review Date</p>

<p style="color:black;">COMMENTS:<br><textarea name="comment" id="" cols="30" rows="3"></textarea></p>

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
    <th style="color:black;">Result of initial or most recent evaluation of school and division assessments:</th>
  </tr>

  <tr>
    <td style="color:black;"> <textarea class="form-control" name="functional_1_1"></textarea> </td>
  </tr>

  <tr>
    <td style="color:black;"> <textarea class="form-control" name="functional_1_2"></textarea> </td>
  </tr>
  <tr>
    <td style="color:black;"> <textarea class="form-control" name="functional_1_3"></textarea> </td>
  </tr>

  <tr>
    <th style="color:black;">Description of academic, developmental and/or functional strengths:</th>
  </tr>

  <tr>
    <td style="color:black;"> <textarea class="form-control" name="functional_2_1"></textarea> </td>
  </tr>

  <tr>
    <td style="color:black;"> <textarea class="form-control" name="functional_2_2"></textarea> </td>
  </tr>
  <tr>
    <td style="color:black;"> <textarea class="form-control" name="functional_2_3"></textarea> </td>
  </tr>

  <tr>
    <th style="color:black;">Description of academic, developmental and/or functional needs:</th>
  </tr>

  <tr>
    <td style="color:black;"> <textarea class="form-control" name="functional_3_1"></textarea> </td>
  </tr>

  <tr>
    <td style="color:black;"> <textarea class="form-control" name="functional_3_2"></textarea> </td>
  </tr>
  <tr>
    <td style="color:black;"> <textarea class="form-control" name="functional_3_3"></textarea> </td>
  </tr>

  <tr>
    <th style="color:black;">Parental concerns regarding their child’s education:</th>
  </tr>

  <tr>
    <td style="color:black;"> <textarea class="form-control" name="functional_4_1"></textarea> </td>
  </tr>

  <tr>
    <td style="color:black;"> <textarea class="form-control" name="functional_4_2"></textarea> </td>
  </tr>
  <tr>
    <td style="color:black;"> <textarea class="form-control" name="functional_4_3"></textarea> </td>
  </tr>

  <tr>
    <th style="color:black;">Impact of the disability on involvement and progress in the general education curriculum (for preschool, how the disability affects participation in appropriate activities).</th>
  </tr>

  <tr>
    <td style="color:black;"> <textarea class="form-control" name="functional_5_1"></textarea> </td>
  </tr>

  <tr>
    <td style="color:black;"> <textarea class="form-control" name="functional_5_2"></textarea> </td>
  </tr>
  <tr>
    <td style="color:black;"> <textarea class="form-control" name="functional_5_3"></textarea> </td>
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
   
          <td style="color:black;">School Psychologist: <input type="text" class="form-control" name="psych"></td>
    
    
          <td style="color:black;">Guidance Counselor/Designate: <input type="text" class="form-control" name="guidance"></td>
          
        </tr>

        <tr>
          <td style="color:black;">Principal/School Head: <input type="text" class="form-control" name="principal"></td>
          <td style="color:black;">School Nurse : <input type="text" class="form-control" name="nurse"></td>
        </tr>

        <tr>
          <td style="color:black;">Other (name and role) : <input class="form-control" name="other_name" type="text"></td>
          <td style="color:black;">Therapist/Pathologist/Specialist : <input class="form-control" name="therapist" type="text"></td>
        </tr>
        <tr>
          <td style="color:black;">Special Education Teacher : <input class="form-control" name="sp_teacher" type="text"></td>
        
        </tr>
        <tr>
          <td style="color:black;" colspan="2">*Learner must be invited when transition is discussed
       **The IEP learn must include at least one regular education teacher of the learner (if the learner is or may be participating in the regular education environment
</td>
        </tr>



        <tr>
          <td style="color:black;" rowspan="2" colspan="2">
          <p style="color:black;"><input type="checkbox" checked value="1" name="if_1"> Not Applicable (learner will not be 18 within one year</p>
          <p style="color:black;"><input type="checkbox" value="2" name="if_2">The learner has been informed of his/her rights under law and advised of the transfer of rights at age 18</p>  
          
          <p style="color:black;">Distribution:</p>
           <p style="color:black;"><input type="checkbox" checked value="1" name="dis_1"> Learner’s Folder</p>
            <p style="color:black;"> <input type="checkbox" value="1" name="dis_2"> Parent/Guardian/Caregiver/ Ed Special Education/Receiving Teacher</p>

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
    <td style="color:black;" colspan="2"><p style="color:black;">a.)Does the learner have difficulty relating with people which impede his/her learning or the learning of other?	</p></td>
    <td style="color:black;"><input type="radio" name="factor_1" value="yes">Yes</td>
    <td style="color:black;"><input type="radio" checked name="factor_1" value="no">No</td>
  </tr>

  <tr>
    <td style="color:black;" colspan="2"><p style="color:black;">b.)if yes, consider the appropriateness of developing a Behavior Intervention Plan.	Behavior Intervention Plan developed?	Refer to Behavior InterventionPlan for additional information.</p></td>
    <td style="color:black;"><input type="radio" name="factor_2" value="yes">Yes</td>
    <td style="color:black;"><input type="radio" checked name="factor_2" value="no">No</td>
  </tr>

  <tr>
    <td style="color:black;" colspan="2"><p style="color:black;">Does the leaner have difficulty in Moving/ Walking?
If yes, consider the mobility needs as related to IEP and describe below.
</p></td>
    <td style="color:black;"><input type="radio" name="factor_3" value="yes">Yes</td>
    <td style="color:black;"><input type="radio" checked name="factor_3" value="no">No</td>
  </tr>
  <tr><td style="color:black;" colspan="4"><textarea name="comment_3" id="" class="form-control"></textarea></td></tr>

  <tr>
    <td style="color:black;" colspan="2"><p style="color:black;">Does the learner have difficulty in seeing or with blindness/visual impairment?	
    If yes, provide for instruction in Braille and the use of Braille, unless the IEP Team determines that instruction in Braille is not appropriate for the learner after an
evaluation of the learner’s reading and writing skills, needs, and appropriate reading and wrting media, including evaluation of future needs for instruction in Braille
or the use of Braille. Describe below.

</p></td>
    <td style="color:black;"><input type="radio" name="factor_4" value="yes">Yes</td>
    <td style="color:black;"><input type="radio" checked name="factor_4" value="no">No</td>
  </tr>

  <tr><td style="color:black;" colspan="4"><textarea name="comment_4" id="" class="form-control"></textarea></td></tr>

  <tr>

    <td style="color:black;" colspan="2"><p style="color:black;">Does the learner have difficulty in communicating?	
    If yes, consider the communication needs and describe below.

</p></td>
    <td style="color:black;"><input type="radio" name="factor_5" value="yes">Yes</td>
    <td style="color:black;"><input type="radio" checked name="factor_5" value="no">No</td>
  </tr>
  <tr><td style="color:black;" colspan="4"><textarea name="comment_5" id="" class="form-control"></textarea></td></tr>

  <tr>

<td style="color:black;" colspan="2"><p style="color:black;">Does the learner have difficulty in concentrating/paying attention?
If yes, consider the understanding needs and describe below.

</p></td>
<td style="color:black;"><input type="radio" name="factor_6" value="yes">Yes</td>
<td style="color:black;"><input type="radio" checked name="factor_6" value="no">No</td>
</tr>
<tr><td style="color:black;" colspan="4"><textarea name="comment_6" id="" class="form-control"></textarea></td></tr>

<tr>

<td style="color:black;" colspan="2"><p style="color:black;"><strong>Does the learner have difficulty in hearing or Is the learner deaf or hard of hearing?</strong>
If yes, consider and describe the learner’s language and communication needs, opportunities for direct communication with peers and professional personnel in the
learner’s language and communication mode, academic level and full range of needs, including opportunities for direct instruction in the learner’s language and
communication mode. Describe communication needs below.


</p></td>
<td style="color:black;"><input type="radio" name="factor_7" value="yes">Yes</td>
<td style="color:black;"><input type="radio" checked name="factor_7" value="no">No</td>
</tr>

<tr><td style="color:black;" colspan="4"><textarea name="comment_7" id="" class="form-control"></textarea></td></tr>

<tr>

<td style="color:black;" colspan="2"><p style="color:black;"><strong>Does the learner need assistive technology devices or services?</strong>

If yes, describe the type of assistive technology and how it is used. If no, describe how the learner’s needs are being met in deficit areas



</p></td>
<td style="color:black;"><input type="radio" name="factor_8" value="yes">Yes</td>
<td style="color:black;"><input type="radio" checked name="factor_8" value="no">No</td>
</tr>
<tr><td style="color:black;" colspan="4"><textarea name="comment_8" id="" class="form-control"></textarea></td></tr>

<tr>

<td style="color:black;" colspan="2"><p style="color:black;"><strong>Does the learner require alternative format for instructional materials?</strong>

If yes, specify format(s) of materials required below.

</p></td>

<td style="color:black;"><input type="radio" name="factor_9" value="yes">Yes</td>
<td style="color:black;"><input type="radio" checked name="factor_9" value="no">No</td>
</tr>

<tr>
  <td style="color:black;" colspan="4"><input type="radio" checked name="factor_8_type" value="Braille"> Braille
  <input type="radio" name="factor_8_type" value="Large Type"> Large Type	
  <input type="radio" name="factor_8_type" value="Auditory"> Auditory	
  <input type="radio" name="factor_8_type" value="Electronic text"> Electronic text	</td>
 		      		  					
</tr>

<tr><td style="color:black;" colspan="4"><textarea name="comment_9" id="" class="form-control"></textarea></td></tr>

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
    <th style="color:black;">DIFFICULTY (enter all areas of difficulty)</th>
    <th style="color:black;">ENVIRONMENTAL BARRIERS (describe each factor restricting participation)</th>
    <th style="color:black;">ENVIRONMENTAL FACILITATORS (describe each factor enabling participation in response to barriers) </th>
    <th style="color:black;">ENVIRONMENTAL FACILITATORS (describe each factor enabling participation in response to barriers)</th>
  </tr>
  <tr>
    <td style="color:black;"><textarea name="functional_1" id="" class="form-control"></textarea></td>
    <td style="color:black;"><textarea name="functional_2" id="" class="form-control"></textarea></td>
    <td style="color:black;"><textarea name="functional_3" id="" class="form-control"></textarea></td>
    <td style="color:black;"><textarea name="functional_4" id="" class="form-control"></textarea></td>
  </tr>
  <tr>
    <td style="color:black;"><textarea name="functional_12" id="" class="form-control"></textarea></td>
    <td style="color:black;"><textarea name="functional_22" id="" class="form-control"></textarea></td>
    <td style="color:black;"><textarea name="functional_32" id="" class="form-control"></textarea></td>
    <td style="color:black;"><textarea name="functional_42" id="" class="form-control"></textarea></td>
  </tr>
  <tr>
    <td style="color:black;"><textarea name="functional_13" id="" class="form-control"></textarea></td>
    <td style="color:black;"><textarea name="functional_23" id="" class="form-control"></textarea></td>
    <td style="color:black;"><textarea name="functional_33" id="" class="form-control"></textarea></td>
    <td style="color:black;"><textarea name="functional_43" id="" class="form-control"></textarea></td>
  </tr>

  <tr>
    <td style="color:black;"><textarea name="functional_14" id="" class="form-control"></textarea></td>
    <td style="color:black;"><textarea name="functional_24" id="" class="form-control"></textarea></td>
    <td style="color:black;"><textarea name="functional_34" id="" class="form-control"></textarea></td>
    <td style="color:black;"><textarea name="functional_44" id="" class="form-control"></textarea></td>
  </tr>

  <tr>
    <td style="color:black;"><textarea name="functional_15" id="" class="form-control"></textarea></td>
    <td style="color:black;"><textarea name="functional_25" id="" class="form-control"></textarea></td>
    <td style="color:black;"><textarea name="functional_35" id="" class="form-control"></textarea></td>
    <td style="color:black;"><textarea name="functional_45" id="" class="form-control"></textarea></td>
  </tr>
 </table>
 Selection of Barriers and Qualifiers for Environmental Barriers and Facilitators (taken from ICF)
 <table class="table table-bordered">
  <tr>
    <th style="color:black;">DIFFICULTIES (select all relevant categories)</th>
    <th style="color:black;">Qualifiers for Environmental Barriers</th>
    <th style="color:black;">Qualifiers for Environmental Facilitators</th>
  </tr>
  <tr>
    <td style="color:black;" rowspan="6">
    <p style="color:black;"> •	Seeing </p>
    <p style="color:black;"> •	Hearing </p>
    <p style="color:black;"> •	Communicating </p>
    <p style="color:black;"> •	Moving/Walking </p>
    <p style="color:black;"> •	Concentrating/Paying Attention </p>
    <p style="color:black;"> •	Remembering/understanding </p>

    </td>

    <td style="color:black;" rowspan="6">
    <p style="color:black;"> 0  No barrier </p>
    <p style="color:black;"> 1  Mild barrier </p>
    <p style="color:black;"> 2  Moderate barrier </p>
    <p style="color:black;"> 3  Severe barrier </p>
    <p style="color:black;"> 4  Complete barrier </p>
    <p style="color:black;"> 8  Barrier, not specified </p>
    <p style="color:black;"> 9  Not Applicable </p>


    </td>

    <td style="color:black;" rowspan="6">
    <p style="color:black;"> +1  Mild facilatator </p>
    <p style="color:black;"> +2  Moderate facilatator </p>
    <p style="color:black;"> +3  Substantial facilatator </p>
    <p style="color:black;">  +4  Complete facilatator </p>
    <p style="color:black;"> +8  Facilitator, not specified </p>
    <p style="color:black;"> +9  Not Applicable </p>



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

<p style="color:black;"> To support identification of learner goals, also confirm:</p>
<p style="color:black;"> •	What opprtunites are available at the school to support learner goals?</p>
<p style="color:black;"> •	What are the student interest areas?</p>
<p style="color:black;"> •	What disability-specific skills does the learner need to develop to support their participation/ attainment of goals?</p>

<p style="color:black;"> Goals –(eg.-Skills to improve participation in education or daily living skills. Goals should be SMART (Strategic, Measurable, Achievable, Realistic, and Time-bound)</p>

<table class="table table-bordered">
  <tr>
    <th style="color:black;">INTEREST</th>
    <th style="color:black;">GOAL</th>
    <th style="color:black;">INTERVENTIONS</th>
    <th style="color:black;">TIMELINE</th>
    <th style="color:black;">INDIVIDUALS RESPONSIBLE</th>
    <th style="color:black;">REMARKS	</th>
    <th style="color:black;">PROGRESS/
NEXT STEPS</th>

  </tr>

  <tr>
    <td style="color:black;"><textarea type="text" name="interest" class="form-control"></textarea></td>
    <td style="color:black;"><textarea type="text" name="goal" class="form-control"></textarea></td>
    <td style="color:black;"><textarea type="text" name="intervention" class="form-control"></textarea></td>
    <td style="color:black;"><textarea type="text" name="timeline" class="form-control"></textarea></td>
    <td style="color:black;"><textarea type="text" name="individual_responsible" class="form-control"></textarea></td>
    <td style="color:black;"><textarea type="text" name="remarks" class="form-control"></textarea></td>
    <td style="color:black;"><textarea type="text" name="progress" class="form-control"></textarea></td>
   				
  </tr>

  <tr>
    <td style="color:black;"><textarea type="text" name="interest2" class="form-control"></textarea></td>
    <td style="color:black;"><textarea type="text" name="goal2" class="form-control"></textarea></td>
    <td style="color:black;"><textarea type="text" name="intervention2" class="form-control"></textarea></td>
    <td style="color:black;"><textarea type="text" name="timeline2" class="form-control"></textarea></td>
    <td style="color:black;"><textarea type="text" name="individual_responsible2" class="form-control"></textarea></td>
    <td style="color:black;"><textarea type="text" name="remarks2" class="form-control"></textarea></td>
    <td style="color:black;"><textarea type="text" name="progress2" class="form-control"></textarea></td>
   				
  </tr>

  <tr>
    <td style="color:black;"><textarea type="text" name="interest3" class="form-control"></textarea></td>
    <td style="color:black;"><textarea type="text" name="goal3" class="form-control"></textarea></td>
    <td style="color:black;"><textarea type="text" name="intervention3" class="form-control"></textarea></td>
    <td style="color:black;"><textarea type="text" name="timeline3" class="form-control"></textarea></td>
    <td style="color:black;"><textarea type="text" name="individual_responsible3" class="form-control"></textarea></td>
    <td style="color:black;"><textarea type="text" name="remarks3" class="form-control"></textarea></td>
    <td style="color:black;"><textarea type="text" name="progress3" class="form-control"></textarea></td>
   				
  </tr>

  <tr>
    <td style="color:black;"><textarea type="text" name="interest4" class="form-control"></textarea></td>
    <td style="color:black;"><textarea type="text" name="goal4" class="form-control"></textarea></td>
    <td style="color:black;"><textarea type="text" name="intervention4" class="form-control"></textarea></td>
    <td style="color:black;"><textarea type="text" name="timeline4" class="form-control"></textarea></td>
    <td style="color:black;"><textarea type="text" name="individual_responsible4" class="form-control"></textarea></td>
    <td style="color:black;"><textarea type="text" name="remarks4" class="form-control"></textarea></td>
    <td style="color:black;"><textarea type="text" name="progress4" class="form-control"></textarea></td>
   				
  </tr>
</table>

D.	STUDENT TRANSITION
<p style="color:black;">This section is for learners exiting the school environment and transitioning into work.</p>
<table class="table table-bordered">
  <tr>
    <th style="color:black;">INTEREST</th>
    <th style="color:black;">WORK OPPORTUNITIES</th>
    <th style="color:black;">INTERVENTIONS/
TRANSITION SKILLS
</th>
<th style="color:black;">INDIVIDUALS RESPONSIBLE</th>
<th style="color:black;">REMARKS</th>
  </tr>

  <tr>
  <td style="color:black;"><textarea type="text" name="transition_interest" class="form-control"></textarea></td>
    <td style="color:black;"><textarea type="text" name="work1" class="form-control"></textarea></td>
    <td style="color:black;"><textarea type="text" name="skills" class="form-control"></textarea></td>
    <td style="color:black;"><textarea type="text" name="individual" class="form-control"></textarea></td>
    <td style="color:black;"><textarea type="text" name="transition_remarks" class="form-control"></textarea></td>
    				
  </tr>

  <tr>
  <td style="color:black;"><textarea type="text" name="transition_interest2" class="form-control"></textarea></td>
    <td style="color:black;"><textarea type="text" name="work2" class="form-control"></textarea></td>
    <td style="color:black;"><textarea type="text" name="skills2" class="form-control"></textarea></td>
    <td style="color:black;"><textarea type="text" name="individual2" class="form-control"></textarea></td>
    <td style="color:black;"><textarea type="text" name="transition_remarks2" class="form-control"></textarea></td>
    				
  </tr>

  <tr>
  <td style="color:black;"><textarea type="text" name="transition_interest3" class="form-control"></textarea></td>
    <td style="color:black;"><textarea type="text" name="work3" class="form-control"></textarea></td>
    <td style="color:black;"><textarea type="text" name="skills3" class="form-control"></textarea></td>
    <td style="color:black;"><textarea type="text" name="individual3" class="form-control"></textarea></td>
    <td style="color:black;"><textarea type="text" name="transition_remarks3" class="form-control"></textarea></td>
    				
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
    <div class="tab-pane fade container-fluid" id="progress" role="tabpanel" aria-labelledby="progress-tab">
     

                <ul class="nav nav-tabs" id="myTab" role="tablist">

<li class="nav-item">
  <a class="nav-link active" id="progress-tab" data-toggle="tab" href="#pro1" role="tab" aria-controls="progress"
    aria-selected="false">Daily living & Socio</a>
</li>
<li class="nav-item">
  <a class="nav-link" id="progress-tab" data-toggle="tab" href="#pro2" role="tab" aria-controls="progress"
    aria-selected="false">Language & Psychomotor</a>
</li>
<li class="nav-item">
  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#pro3" role="tab" aria-controls="profile"
    aria-selected="false">Cognitive & Behavioural</a>
</li>
<li class="nav-item">
  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#pro4" role="tab" aria-controls="profile"
    aria-selected="false">Teachers Remark</a>
</li>



</ul>

<div class="tab-content container" align="center" id="myTabContent">

    <!-- pro5 -->
    <div class="tab-pane fade"  role="tabpanel" aria-labelledby="progress-tab">
    <div class="row">
    <table class="table" style="width:50%;">
      <tr>
          <th style="color:black;"><h4>Attendance</h4></th>
     
          <td style="color:black;">Jun</td>
          <td style="color:black;">Jul</td>
          <td style="color:black;">Aug</td>
          <td style="color:black;">Sep</td>
          <td style="color:black;">Oct</td>
          <td style="color:black;">Nov</td>
          <td style="color:black;">Dece</td>
          <td style="color:black;">Jan</td>
          <td style="color:black;">Feb</td>
          <td style="color:black;">Mar</td>
          <td style="color:black;">Apr</td>
          <td style="color:black;">May</td>
        </tr>
        <tr>
          <th style="color:black;">No. of School Days</th>
     
          <td style="color:black;"><input style="color:black;" type="number" name="june" style="width:43px;"></td>
          <td style="color:black;"><input style="color:black;" type="number" name="july" style="width:43px;"></td>
          <td style="color:black;"><input style="color:black;" type="number" name="aug" style="width:43px;"></td>
          <td style="color:black;"><input style="color:black;" type="number" name="sept" style="width:43px;"></td>
          <td style="color:black;"><input style="color:black;" type="number" name="oct" style="width:43px;"></td>
          <td style="color:black;"><input style="color:black;" type="number" name="nov" style="width:43px;"></td>
          <td style="color:black;"><input style="color:black;" type="number" name="dece" style="width:43px;"></td>
          <td style="color:black;"><input style="color:black;" type="number" name="jan" style="width:43px;"></td>
          <td style="color:black;"><input style="color:black;" type="number" name="feb" style="width:43px;"></td>
          <td style="color:black;"><input style="color:black;" type="number" name="mar" style="width:43px;"></td>
          <td style="color:black;"><input style="color:black;" type="number" name="apr" style="width:43px;"></td>
          <td style="color:black;"><input style="color:black;" type="number" name="may" style="width:43px;"></td>

        
        
        </tr>

        <tr>
          <th style="color:black;">No. of School Days Present</th>
     
          <td style="color:black;"><input style="color:black;" type="number" name="june1" style="width:43px;"></td>
          <td style="color:black;"><input style="color:black;" type="number" name="july1" style="width:43px;"></td>
          <td style="color:black;"><input style="color:black;" type="number" name="aug1" style="width:43px;"></td>
          <td style="color:black;"><input style="color:black;" type="number" name="sept1" style="width:43px;"></td>
          <td style="color:black;"><input style="color:black;" type="number" name="oct1" style="width:43px;"></td>
          <td style="color:black;"><input style="color:black;" type="number" name="nov1" style="width:43px;"></td>
          <td style="color:black;"><input style="color:black;" type="number" name="dece1" style="width:43px;"></td>
          <td style="color:black;"><input style="color:black;" type="number" name="jan1" style="width:43px;"></td>
          <td style="color:black;"><input style="color:black;" type="number" name="feb1" style="width:43px;"></td>
          <td style="color:black;"><input style="color:black;" type="number" name="mar1" style="width:43px;"></td>
          <td style="color:black;"><input style="color:black;" type="number" name="apr1" style="width:43px;"></td>
          <td style="color:black;"><input style="color:black;" type="number" name="may1" style="width:43px;"></td>
       
        </tr>
        <tr>
          <th style="color:black;">No. of School Days Absent</th>
     
          <td style="color:black;"></td>
          <td style="color:black;"></td>
          <td style="color:black;"></td>
          <td style="color:black;"></td>
          <td style="color:black;"></td>
          <td style="color:black;"></td>
          <td style="color:black;"></td>
          <td style="color:black;"></td>
          <td style="color:black;"></td>
          <td style="color:black;"></td>
          <td style="color:black;"></td>
          <td style="color:black;"></td>

        
        </tr>


      </table>
    </div>
    </div>

    <!-- pro5 -->

<!-- pro1 -->
<div class="tab-pane fade show active" id="pro1" role="tabpanel" aria-labelledby="progress-tab">
<img src="../img/legend.jpg" class="img-fluid">

<div class="row">
                 <!--first-->
                 <div class="col-md-12 col-lg-6 col-xl-6">
              
              <table style="font-size:12px;" class="table table-bordered ">
                  <tr>
                  <th style="color:black;" rowspan="2">LEARNING AREAS</th>
                  <th style="color:black;" colspan="4">Periodic Rating</th>
                  <th style="color:black;" rowspan="2">final rating</th>
                  </tr>

                 <tr>
                 <th style="color:black;">1</th>
                  <th style="color:black;">2</th>
                  <th style="color:black;">3</th>
                  <th style="color:black;">4</th>
                 </tr>
                 <tr align="center"><th colspan="6" >Daily Living Skill Domain</th></tr>
                 <tr><th colspan="6">Self feeding</th></tr>
                 <tr><td style="color:black;">Expresses need to eat drink through non-verbal and or verbal means </td><input type="hidden" name="11" value="Expresses need to eat drink through non-verbal and or verbal means">
                 <td style="color:black;">
                  <select class="selectList" name="11q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="11q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="11q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="11q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Chews and swallows different kinds of foods</td><input type="hidden" name="12" value="Chews and swallows different kinds of foods">
                  <td style="color:black;">
                  <select class="selectList" name="12q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="12q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="12q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="12q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;" >
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
                  <td style="color:black;">Swallows liquid like soup</td><input type="hidden" name="13" value="Swallows liquid like soup">
                  <td style="color:black;">
                  <select class="selectList" name="13q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="13q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="13q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="13q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Picks up food with fingers or scoops with spoon</td><input type="hidden" name="14" value="Picks up food with fingers or scoops with spoon">
                  <td style="color:black;">
                  <select class="selectList" name="14q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="14q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="14q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="14q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Picks up and eats finger food</td><input type="hidden" name="15" value="Picks up and eats finger food">
                  <td style="color:black;">
                  <select class="selectList" name="15q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="15q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="15q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="15q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;" >
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
                  <td style="color:black;">Sips and drinks liquid</td><input type="hidden" name="16" value="Sips and drinks liquid">
                  <td style="color:black;">
                  <select class="selectList" name="16q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="16q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="16q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="16q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Eats with spoon and fork</td><input type="hidden" name="17" value="Eats with spoon and fork">
                  <td style="color:black;">
                  <select class="selectList" name="17q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="17q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="17q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="17q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Uses the table knife for spreading</td><input type="hidden" name="18" value="Uses the table knife for spreading">
                  <td style="color:black;">
                  <select class="selectList" name="18q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="18q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="18q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="18q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;" >
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
                  <td style="color:black;">Cuts food using the table knife</td><input type="hidden" name="19" value="Cuts food using the table knife">
                  <td style="color:black;">
                  <select class="selectList" name="19q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="19q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="19q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="19q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;" >
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
                  <td style="color:black;">Distinguishes edible and non-edible foods & substances</td><input type="hidden" name="110" value="Distinguishes edible and non-edible foods & substances">
                  <td style="color:black;">
                  <select class="selectList" name="110q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="110q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="110q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="110q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Peels / unwraps food</td><input type="hidden" name="111" value="Peels / unwraps food">
                  <td style="color:black;">
                  <select class="selectList" name="111q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="111q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="111q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="111q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Uses table napkins</td><input type="hidden" name="112" value="Uses table napkins">
                  <td style="color:black;">
                  <select class="selectList" name="112q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="112q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="112q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="112q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Exhibits table settings skills</td><input type="hidden" name="113" value="Exhibits table settings skills">
                  <td style="color:black;">
                  <select class="selectList" name="113q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="113q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="113q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="113q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                 <tr><th style="color:black;">Toileting</th></tr>
                 <tr>
                  <td style="color:black;">Uses comfort room/toilet bowl to urinate or defecate</td><input type="hidden" name="114" value="Uses comfort room/toilet bowl to urinate or defecate">
                  <td style="color:black;">
                  <select class="selectList" name="114q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="114q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="114q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="114q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                 <tr><td style="color:black;">Uses toilet paper to clean-up and disposes it properly</td><input type="hidden" name="115" value="Uses toilet paper to clean-up and disposes it properly">
                 <td style="color:black;">
                  <select class="selectList" name="115q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="115q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="115q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="115q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Uses dipper properly</td><input type="hidden" name="116" value="Uses dipper properly">
                  <td style="color:black;">
                  <select class="selectList" name="116q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="116q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="116q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="116q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Cleans self with soap & water after toileting</td><input type="hidden" name="117" value="Cleans self with soap & water after toileting">
                  <td style="color:black;">
                  <select class="selectList" name="117q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="117q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="117q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="117q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                 <tr><th style="color:black;">Dressing</th></tr>

                 <tr>
                  <td style="color:black;">Removes / puts on socks</td><input type="hidden" name="118" value="Removes / puts on socks">
                  <td style="color:black;">
                  <select class="selectList" name="118q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="118q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="118q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="118q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;" >
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
                  <td style="color:black;">Removes / puts on shoes or slippers</td><input type="hidden" name="119" value="Removes / puts on shoes or slippers">
                  <td style="color:black;">
                  <select class="selectList" name="119q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="119q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="119q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="119q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Removes / puts on clothes</td><input type="hidden" name="120" value="Removes / puts on clothes">
                  <td style="color:black;">
                  <select class="selectList" name="120q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="120q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="120q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="120q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Open & closes dressing implements (zip/unzip, button/unbutton</td><input type="hidden" name="121" value="Open & closes dressing implements (zip/unzip, button/unbutton">
                  <td style="color:black;">
                  <select class="selectList" name="121q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="121q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="121q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="121q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <th style="color:black;">Grooming hygiene</th>

              </tr>
                 <tr>
                  <td style="color:black;">Washes and dries hands properly </td><input type="hidden" name="122" value="Washes and dries hands properly">
                  <td style="color:black;">
                  <select class="selectList" name="122q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="122q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="122q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="122q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;" >
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
                  <td style="color:black;">Cleans own face </td><input type="hidden" name="123" value="Cleans own face">
                  <td style="color:black;">
                  <select class="selectList" name="123q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="123q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="123q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="123q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;" >
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
                  <td style="color:black;">Brushes teeth</td><input type="hidden" name="124" value="Brushes teeth">
                  <td style="color:black;">
                  <select class="selectList" name="124q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="124q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="124q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="124q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Combs / brushes hair</td><input type="hidden" name="125" value="Combs / brushes hair">
                  <td style="color:black;">
                  <select class="selectList" name="125q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="125q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="125q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="125q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <th style="color:black;" rowspan="2">LEARNING AREAS</th>
                  <th style="color:black;" colspan="4">Periodic Rating</th>
                  <th style="color:black;" rowspan="2">final rating</th>
                  </tr>

                 <tr>
                 <th style="color:black;">1</th>
                  <th style="color:black;">2</th>
                  <th style="color:black;">3</th>
                  <th style="color:black;">4</th>
                 </tr>
                 <tr align="center"><th colspan="6" >SOCIO-EMOTIONAL DOMAIN</th></tr>
              
                 <tr><td style="color:black;">Uses courteous expressions appropriately</td><input type="hidden" name="21" value="Uses courteous expressions appropriately">
                 <td style="color:black;">
                  <select class="selectList" name="21q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="21q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="21q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="21q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;" >
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
                  <td style="color:black;">Asks an apology when necessary </td><input type="hidden" name="22" value="Asks an apology when necessary">
                  <td style="color:black;">
                  <select class="selectList" name="22q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="22q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="22q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="22q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;" >
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
                  <td style="color:black;">Pays attention to someone talking</td><input type="hidden" name="23" value="Pays attention to someone talking">
                  <td style="color:black;">
                  <select class="selectList" name="23q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="23q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="23q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="23q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Plays with peers</td><input type="hidden" name="24" value="Plays with peers">
                  <td style="color:black;">
                  <select class="selectList" name="24q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="24q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="24q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="24q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Makes friends easy</td><input type="hidden" name="25" value="Makes friends easy">
                  <td style="color:black;">
                  <select class="selectList" name="25q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="25q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="25q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="25q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;" >
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
                  <td style="color:black;">Follows rules and regulations</td><input type="hidden" name="26" value="Follows rules and regulations">
                  <td style="color:black;">
                  <select class="selectList" name="26q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="26q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="26q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="26q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;" >
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
                  <td style="color:black;">Seeks / Accepts help</td><input type="hidden" name="27" value="Seeks / Accepts help">
                  <td style="color:black;">
                  <select class="selectList" name="27q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="27q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="27q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="27q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;" >
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
                  <td style="color:black;">Expresses / shows appropriate emotions</td><input type="hidden" name="28" value="Expresses / shows appropriate emotions">
                  <td style="color:black;">
                  <select class="selectList" name="28q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="28q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="28q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="28q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;" >
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
                  <td style="color:black;">Waits for one’s turn</td><input type="hidden" name="29" value="Waits for one’s turn">
                  <td style="color:black;">
                  <select class="selectList" name="29q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="29q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="29q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="29q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;" >
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
                  <td style="color:black;">Asks permission to use things owned by others</td><input type="hidden" name="210" value="Asks permission to use things owned by others">
                  <td style="color:black;">
                  <select class="selectList" name="210q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="210q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="210q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="210q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;" >
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
                  <td style="color:black;">Seeks help from other friends</td><input type="hidden" name="211" value="Seeks help from other friends">
                  <td style="color:black;">
                  <select class="selectList" name="211q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="211q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="211q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="211q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;" >
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
                  <td style="color:black;">Imitates adult activities</td><input type="hidden" name="212" value="Imitates adult activities">
                  <td style="color:black;">
                  <select class="selectList" name="212q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="212q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="212q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="212q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Displays sense of humor</td><input type="hidden" name="213" value="Displays sense of humor">
                  <td style="color:black;">
                  <select class="selectList" name="213q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="213q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="213q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="213q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Identifies self as member of family / cultural group</td><input type="hidden" name="214" value="Identifies self as member of family / cultural group">
                  <td style="color:black;">
                  <select class="selectList" name="214q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="214q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="214q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="214q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;" >
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
                 <tr><td style="color:black;">Identifies personal belongings</td><input type="hidden" name="215" value="Identifies personal belongings">
                 <td style="color:black;">
                  <select class="selectList" name="215q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="215q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="215q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="215q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Displays sensitivity to the feelings of others</td><input type="hidden" name="216" value="Displays sensitivity to the feelings of others">
                  <td style="color:black;">
                  <select class="selectList" name="216q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="216q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="216q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="216q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;" >
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
                  <td style="color:black;">Shows sportsmanship</td><input type="hidden" name="217" value="Shows sportsmanship">
                  <td style="color:black;">
                  <select class="selectList" name="217q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="217q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="217q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="217q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Show initiatives to work on tasks</td><input type="hidden" name="218" value="Show initiatives to work on tasks">
                  <td style="color:black;">
                  <select class="selectList" name="218q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="218q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="218q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="218q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Works independently</td><input type="hidden" name="219" value="Works independently">
                  <td style="color:black;">
                  <select class="selectList" name="219q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="219q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="219q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="219q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Shows self-control</td><input type="hidden" name="220" value="Shows self-control">
                  <td style="color:black;">
                  <select class="selectList" name="220q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="220q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="220q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="220q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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

</div>

    </div>
<!-- pro1 -->

<!-- pro2 -->
<div class="tab-pane fade" id="pro2" role="tabpanel" aria-labelledby="progress-tab">
<img src="../img/legend.jpg" class="img-fluid">

<div class="row">
         <!--THIRD-->
         <div class="col-md-12 col-lg-6 col-xl-6">
              
              <table style="font-size:12px;" class="table table-bordered ">
                  <tr>
                  <th style="color:black;" rowspan="2">LEARNING AREAS</th>
                  <th style="color:black;" colspan="4">Periodic Rating</th>
                  <th style="color:black;" rowspan="2">final rating</th>
                  </tr>

                 <tr>
                 <th style="color:black;">1</th>
                  <th style="color:black;">2</th>
                  <th style="color:black;">3</th>
                  <th style="color:black;">4</th>
                 </tr>
                 <tr align="center"><th colspan="6" >LANGUAGE DEVELOPMENT</th></tr>
                <tr><th style="color:black;">LISTENING</th></tr>
                 <tr><td style="color:black;">Follows simple direction</td><input type="hidden" name="31" value="Follows simple direction">
                 <td style="color:black;">
                  <select class="selectList" name="31q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="31q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="31q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="31q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Distinguishes different types of sound </td><input type="hidden" name="32" value="Distinguishes different types of sound">
                  <td style="color:black;">
                  <select class="selectList" name="32q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="32q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="32q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="32q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Comprehends simple familiar stories</td><input type="hidden" name="33" value="Comprehends simple familiar stories">
                  <td style="color:black;">
                  <select class="selectList" name="33q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="33q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="33q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="33q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Listens attentively to stories, poems, and rhymes</td><input type="hidden" name="34" value="Listens attentively to stories, poems, and rhymes">
                  <td style="color:black;">
                  <select class="selectList" name="34q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="34q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="34q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="34q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
              <tr><th style="color:black;">SPEAKING</th></tr>   
              <tr>
                   
                  <td style="color:black;">Increases vocabulary to describe things </td><input type="hidden" name="35" value="Increases vocabulary to describe things ">
                  <td style="color:black;">
                  <select class="selectList" name="35q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="35q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="35q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="35q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;" >
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
                  <td style="color:black;">Increases vocabulary to express one’s feelings</td><input type="hidden" name="36" value="Increases vocabulary to express one’s feelings">
                  <td style="color:black;">
                  <select class="selectList" name="36q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="36q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="36q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="36q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Increases vocabulary to share information</td><input type="hidden" name="37" value="Increases vocabulary to share information">
                  <td style="color:black;">
                  <select class="selectList" name="37q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="37q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="37q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="37q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;" >
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
                  <td style="color:black;">Answers and responds to questions accordingly</td><input type="hidden" name="38" value="Answers and responds to questions accordingly">
                  <td style="color:black;">
                  <select class="selectList" name="38q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="38q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="38q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="38q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;" >
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
              <tr><th style="color:black;">READING</th></tr>   
              <tr>
                  <td style="color:black;">Discriminates similarities & differences between pictures and objects</td><input type="hidden" name="39" value="Discriminates similarities & differences between pictures and objects">
                  <td style="color:black;">
                  <select class="selectList" name="39q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="39q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="39q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="39q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Classifies objects according to function Notes details in pictures </td><input type="hidden" name="310" value="Classifies objects according to function Notes details in pictures">
                  <td style="color:black;">
                  <select class="selectList" name="310q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="310q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="310q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="310q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;" >
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
                  <td style="color:black;">Notes details in pictures </td><input type="hidden" name="311" value="Notes details in pictures ">
                  <td style="color:black;">
                  <select class="selectList" name="311q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="311q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="311q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="311q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Visualizes objects and pictures from memory</td><input type="hidden" name="312" value="Visualizes objects and pictures from memory ">
                  <td style="color:black;">
                  <select class="selectList" name="312q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="312q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="312q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="312q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;" >
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
                  <td style="color:black;">Comprehends picture stories</td><input type="hidden" name="313" value="Comprehends picture stories">
                  <td style="color:black;">
                  <select class="selectList" name="313q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="313q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="313q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="313q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;" >
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
              <tr><th style="color:black;">WRITING</th></tr>   
              <tr>
                  <td style="color:black;">Holds / grips pencil properly</td><input type="hidden" name="314" value="Holds / grips pencil properly">
                  <td style="color:black;">
                  <select class="selectList" name="314q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="314q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="314q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="314q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Traces lines and shapes</td><input type="hidden" name="315" value="Traces lines and shapes">
                  <td style="color:black;">
                  <select class="selectList" name="315q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="315q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="315q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="315q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;" >
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
                 <tr><td style="color:black;">Traces letters, numbers and one’s names properly</td><input type="hidden" name="316" value="Traces letters, numbers and one’s names properly">
                 <td style="color:black;">
                  <select class="selectList" name="316q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="316q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="316q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="316q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Draws basic figures</td><input type="hidden" name="317" value="Draws basic figures">
                  <td style="color:black;">
                  <select class="selectList" name="317q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="317q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="317q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="317q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Uses basic strokes correctly</td><input type="hidden" name="318" value="Uses basic strokes correctly">
                  <td style="color:black;">
                  <select class="selectList" name="318q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="318q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="318q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="318q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                           <!--FOURTH-->
                           <div class="col-md-12 col-lg-6 col-xl-6">
              
              <table style="font-size:12px;" class="table table-bordered ">
                  <tr>
                  <th style="color:black;" rowspan="2">LEARNING AREAS</th>
                  <th style="color:black;" colspan="4">Periodic Rating</th>
                  <th style="color:black;" rowspan="2">final rating</th>
                  </tr>

                 <tr>
                 <th style="color:black;">1</th>
                  <th style="color:black;">2</th>
                  <th style="color:black;">3</th>
                  <th style="color:black;">4</th>
                 </tr>
                 <tr align="center"><th colspan="6" >PYSCHOMOTOR DOMAIN</th></tr>
                 <tr><th style="color:black;">BASIC MOVEMENT</th></tr>
              
                 <tr><td style="color:black;">Sits, stand and walks with good posture</td><input type="hidden" name="41" value="Sits, stand and walks with good posture">
                 <td style="color:black;">
                  <select class="selectList" name="41q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="41q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="41q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="41q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Runs and jogs gradually in increasing distance</td><input type="hidden" name="42" value="Runs and jogs gradually in increasing distance">
                  <td style="color:black;">
                  <select class="selectList" name="42q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="42q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="42q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="42q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Jumps & performs other exercises with or w/o music</td><input type="hidden" name="43" value="Jumps & performs other exercises with or w/o music">
                  <td style="color:black;">
                  <select class="selectList" name="43q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="43q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="43q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="43q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Lifts increasing heavy weights</td><input type="hidden" name="44" value="Lifts increasing heavy weights">
                  <td style="color:black;">
                  <select class="selectList" name="44q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="44q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="44q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="44q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Balances in one foot for gradually increasing period of time </td><input type="hidden" name="45" value="Balances in one foot for gradually increasing period of time">
                  <td style="color:black;">
                  <select class="selectList" name="45q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="45q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="45q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="45q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Imitates motor movements of people & animals</td><input type="hidden" name="46" value="Imitates motor movements of people & animals">
                  <td style="color:black;">
                  <select class="selectList" name="46q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="46q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="46q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="46q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;" >
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
                  <td style="color:black;">Bends & strengthens knees properly while feet flat on the floor </td><input type="hidden" name="47" value="Bends & strengthens knees properly while feet flat on the floor ">
                  <td style="color:black;">
                  <select class="selectList" name="47q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="47q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="47q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="47q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Goes up and down the stairs</td><input type="hidden" name="48" value="Goes up and down the stairs">
                  <td style="color:black;">
                  <select class="selectList" name="48q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="48q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="48q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="48q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
              <tr><th style="color:black;">PERCEPTUAL MOTOR SKILLS</th></tr>   
              <tr>
                  <td style="color:black;">Uses clay to make simple but increasingly meaningful shapes & objects</td><input type="hidden" name="49" value="GUses clay to make simple but increasingly meaningful shapes & objects">
                  <td style="color:black;">
                  <select class="selectList" name="49q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="49q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="49q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="49q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;" >
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
                  <td style="color:black;">Uses crayon to color</td><input type="hidden" name="410" value="Uses crayon to color">
                  <td style="color:black;">
                  <select class="selectList" name="410q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="410q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="410q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="410q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
              <tr><th style="color:black;">GROSS MOTOR SKILLS</th></tr>  

              <tr>
                  <td style="color:black;">Walks while carrying objects </td><input type="hidden" name="411" value="Walks while carrying objects ">
                  <td style="color:black;">
                  <select class="selectList" name="411q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="411q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="411q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="411q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Jumps toward aim without falling</td><input type="hidden" name="412" value="Jumps toward aim without falling">
                  <td style="color:black;">
                  <select class="selectList" name="412q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="412q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="412q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="412q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Throws and catches objects  </td><input type="hidden" name="413" value="Throws and catches objects">
                  <td style="color:black;">
                  <select class="selectList" name="413q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="413q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="413q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="413q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Kicks ball without losing balance</td><input type="hidden" name="414" value="Kicks ball without losing balance">
                  <td style="color:black;">
                  <select class="selectList" name="414q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="414q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="414q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="414q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Hops alternately without falling</td><input type="hidden" name="415" value="Hops alternately without falling">
                  <td style="color:black;">
                  <select class="selectList" name="415q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="415q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="415q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="415q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
            <tr><th style="color:black;">FINE MOTOR SKIILLS</th></tr>
            <tr>
                  <td style="color:black;">Makes an object out of clay</td><input type="hidden" name="416" value="Makes an object out of clay">
                  <td style="color:black;">
                  <select class="selectList" name="416q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="416q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="416q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="416q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Squeezes soft rubber ball of convenient size</td><input type="hidden" name="417" value="Squeezes soft rubber ball of convenient size">
                  <td style="color:black;">
                  <select class="selectList" name="417q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="417q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="417q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="417q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Folds divides & tears paper into halves / pieces</td><input type="hidden" name="418" value="Folds divides & tears paper into halves / pieces">
                  <td style="color:black;">
                  <select class="selectList" name="418q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="418q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="418q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="418q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                 <tr><td style="color:black;">Cuts out shapes, outline & objects</td><input type="hidden" name="419" value="FCuts out shapes, outline & objects">
                 <td style="color:black;">
                  <select class="selectList" name="419q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="419q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="419q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="419q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Pastes paper properly</td><input type="hidden" name="420" value="Pastes paper properly">
                  <td style="color:black;">
                  <select class="selectList" name="420q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="420q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="420q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="420q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Strings and threads beads</td><input type="hidden" name="421" value="Strings and threads beads">
                  <td style="color:black;">
                  <select class="selectList" name="421q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="421q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="421q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="421q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Turns doorknob with forearm rotation</td><input type="hidden" name="422" value="Turns doorknob with forearm rotation">
                  <td style="color:black;">
                  <select class="selectList" name="422q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="422q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="422q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="422q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Removes bottle cap</td><input type="hidden" name="423" value="Removes bottle cap">
                  <td style="color:black;">
                  <select class="selectList" name="423q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="423q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="423q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="423q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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

</div>
    </div>
<!-- pro2 -->

<!-- pro3 -->
<div class="tab-pane fade" id="pro3" role="tabpanel" aria-labelledby="progress-tab">
<img src="../img/legend.jpg" class="img-fluid">
<div class="row">

    <!--FIFTH-->
    <div class="col-md-12 col-lg-6 col-xl-6">
              
              <table style="font-size:12px;" class="table table-bordered ">
                  <tr>
                  <th style="color:black;" rowspan="2">LEARNING AREAS</th>
                  <th style="color:black;" colspan="4">Periodic Rating</th>
                  <th style="color:black;" rowspan="2">final rating</th>
                  </tr>

                 <tr>
                 <th style="color:black;">1</th>
                  <th style="color:black;">2</th>
                  <th style="color:black;">3</th>
                  <th style="color:black;">4</th>
                 </tr>
                 <tr align="center"><th colspan="6" >PCOGNITIVE DOMAIN</th></tr>
        
                 <tr><td style="color:black;">Identifies colors</td><input type="hidden" name="51" value="Identifies colors">
                 <td style="color:black;">
                  <select class="selectList" name="51q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="51q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="51q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="51q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Identifies shapes</td><input type="hidden" name="52" value="Identifies shapes">
                  <td style="color:black;">
                  <select class="selectList" name="52q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="52q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="52q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="52q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Identifies letters of the alphabet</td><input type="hidden" name="53" value="Identifies letters of the alphabet">
                  <td style="color:black;">
                  <select class="selectList" name="53q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="53q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="53q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="53q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Identifies sizes (long, short, big, small, tall, short)</td><input type="hidden" name="54" value="Identifies sizes (long, short, big, small, tall, short)">
                  <td style="color:black;">
                  <select class="selectList" name="54q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="54q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="54q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="54q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Sorts objects according to color</td><input type="hidden" name="55" value="Sorts objects according to color">
                  <td style="color:black;">
                  <select class="selectList" name="55q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="55q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="55q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="55q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Sorts objects according to size</td><input type="hidden" name="56" value="Sorts objects according to size">
                  <td style="color:black;">
                  <select class="selectList" name="56q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="56q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="56q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="56q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Sorts objects according to shape</td><input type="hidden" name="57" value="Sorts objects according to shape">
                  <td style="color:black;">
                  <select class="selectList" name="57q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="57q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="57q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="57q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Tells the size of an object</td><input type="hidden" name="58" value="Tells the size of an object">
                  <td style="color:black;">
                  <select class="selectList" name="58q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="58q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="58q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="58q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Identifies numbers up to _______________</td><input type="hidden" name="59" value="Identifies numbers up to _______________">
                  <td style="color:black;">
                  <select class="selectList" name="59q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="59q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="59q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="59q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Counts numbers up to __________________</td><input type="hidden" name="510" value="Counts numbers up to __________________">
                  <td style="color:black;">
                  <select class="selectList" name="510q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="510q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="510q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="510q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Follows one to three steps direction </td><input type="hidden" name="511" value="Follows one to three steps direction ">
                  <td style="color:black;">
                  <select class="selectList" name="511q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="511q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="511q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="511q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Identifies the body parts</td><input type="hidden" name="512" value="Identifies the body parts">
                  <td style="color:black;">
                  <select class="selectList" name="512q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="512q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="512q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="512q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Identifies the five senses & their function</td><input type="hidden" name="513" value="Identifies the five senses & their function">
                  <td style="color:black;">
                  <select class="selectList" name="513q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="513q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="513q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="513q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Sequences / Arranges picture in the story</td><input type="hidden" name="514" value="Sequences / Arranges picture in the story">
                  <td style="color:black;">
                  <select class="selectList" name="514q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="514q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="514q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="514q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Identifies / Reads simple words with pictures</td><input type="hidden" name="515" value="Identifies / Reads simple words with pictures">
                  <td style="color:black;">
                  <select class="selectList" name="515q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="515q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="515q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="515q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Identifies / Reads simple phrases with pictures</td><input type="hidden" name="516" value="Identifies / Reads simple phrases with pictures">
                  <td style="color:black;">
                  <select class="selectList" name="516q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="516q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="516q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="516q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Identifies / Reads simple sentences with pictures</td><input type="hidden" name="517" value="Identifies / Reads simple sentences with pictures">
                  <td style="color:black;">
                  <select class="selectList" name="517q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="517q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="517q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="517q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Identifies days of the week</td><input type="hidden" name="518" value="Identifies days of the week">
                  <td style="color:black;">
                  <select class="selectList" name="518q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="518q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="518q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="518q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Identifies month in the year</td><input type="hidden" name="519" value="Identifies month in the year">
                  <td style="color:black;">
                  <select class="selectList" name="519q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="519q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="519q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="519q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Identifies one self</td><input type="hidden" name="520" value="Identifies one self">
                  <td style="color:black;">
                  <select class="selectList" name="520q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="520q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="520q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="520q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Identifies members of the family</td><input type="hidden" name="521" value="Identifies members of the family">
                  <td style="color:black;">
                  <select class="selectList" name="521q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="521q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="521q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="521q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Identifies different community helpers in school and / or in the community </td><input type="hidden" name="522" value="Identifies different community helpers in school and / or in the community">
                  <td style="color:black;">
                  <select class="selectList" name="522q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="522q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="522q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="522q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Identifies objects / pictures being presented</td><input type="hidden" name="523" value="Identifies objects / pictures being presented">
                  <td style="color:black;">
                  <select class="selectList" name="523q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="523q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="523q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="523q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <th style="color:black;" rowspan="2">LEARNING AREAS</th>
                  <th style="color:black;" colspan="4">Periodic Rating</th>
                  <th style="color:black;" rowspan="2">final rating</th>
                  </tr>

                 <tr>
                 <th style="color:black;">1</th>
                  <th style="color:black;">2</th>
                  <th style="color:black;">3</th>
                  <th style="color:black;">4</th>
                 </tr>
                 <tr align="center"><th colspan="6" >BEHAVIORAL DEVELOPMENT</th></tr>
        
                 <tr><td style="color:black;">Uses appropriate verbal communication for social interaction </td><input type="hidden" name="61" value="Uses appropriate verbal communication for social interaction">
                 <td style="color:black;">
                  <select class="selectList" name="61q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="61q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="61q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="61q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Learns how to speak in lower tone</td><input type="hidden" name="62" value="Learns how to speak in lower tone">
                  <td style="color:black;">
                  <select class="selectList" name="62q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="62q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="62q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="62q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Familiarizes with and takes routed direction</td><input type="hidden" name="63" value="Familiarizes with and takes routed direction">
                  <td style="color:black;">
                  <select class="selectList" name="63q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="63q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="63q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="63q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Follows “Quieting Down” instruction</td><input type="hidden" name="64" value="Follows “Quieting Down” instruction">
                  <td style="color:black;">
                  <select class="selectList" name="64q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="64q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="64q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="64q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Performs simple tasks (e.g. throwing of trash in the bin, etc.)</td><input type="hidden" name="65" value="Performs simple tasks (e.g. throwing of trash in the bin, etc.)">
                  <td style="color:black;">
                  <select class="selectList" name="65q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="65q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="65q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="65q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Puts back materials used like pencil in its proper place</td><input type="hidden" name="66" value="Puts back materials used like pencil in its proper place">
                  <td style="color:black;">
                  <select class="selectList" name="66q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="66q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="66q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="66q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Accepts consequences of behavior</td><input type="hidden" name="67" value="Accepts consequences of behavior">
                  <td style="color:black;">
                  <select class="selectList" name="67q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="67q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="67q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="67q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Follows teacher’s command instruction</td><input type="hidden" name="68" value="Follows teacher’s command instruction">
                  <td style="color:black;">
                  <select class="selectList" name="68q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="68q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="68q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="68q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Participates well in lesson being executed by the teacher</td><input type="hidden" name="69" value="Participates well in lesson being executed by the teacher">
                  <td style="color:black;">
                  <select class="selectList" name="69q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="69q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="69q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="69q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Responds to questions, activities given to him / her</td><input type="hidden" name="610" value="Responds to questions, activities given to him / her">
                  <td style="color:black;">
                  <select class="selectList" name="610q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="610q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="610q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="610q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Attends to tasks without getting out from the chair </td><input type="hidden" name="611" value="Attends to tasks without getting out from the chair">
                  <td style="color:black;">
                  <select class="selectList" name="611q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="611q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="611q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="611q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Watches / Listens to videos / music for 5 minutes or more</td><input type="hidden" name="612" value="Watches / Listens to videos / music for 5 minutes or more">
                  <td style="color:black;">
                  <select class="selectList" name="612q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="612q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="612q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="612q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Responds positively to behavior management procedures</td><input type="hidden" name="613" value="Responds positively to behavior management procedures">
                  <td style="color:black;">
                  <select class="selectList" name="613q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="613q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="613q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="613q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Reduces / Eliminates in appropriate and aggressive behavior during session</td><input type="hidden" name="614" value="Reduces / Eliminates in appropriate and aggressive behavior during session">
                  <td style="color:black;">
                  <select class="selectList" name="614q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="614q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="614q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="614q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Reduces / Eliminates tantrums during the session </td><input type="hidden" name="615" value="Reduces / Eliminates tantrums during the session">
                  <td style="color:black;">
                  <select class="selectList" name="615q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="615q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="615q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="615q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Plays with other children</td><input type="hidden" name="616" value="Plays with other children">
                  <td style="color:black;">
                  <select class="selectList" name="616q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="616q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="616q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="616q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                 <tr><td style="color:black;">Takes turn in game activity</td><input type="hidden" name="617" value="Takes turn in game activity">
                 <td style="color:black;">
                  <select class="selectList" name="617q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="617q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="617q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="617q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Takes turn games / knows how to wait when playing time</td><input type="hidden" name="618" value="Takes turn games / knows how to wait when playing time">
                  <td style="color:black;">
                  <select class="selectList" name="618q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="618q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="618q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="618q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Shares things / food without teacher’s prompt</td><input type="hidden" name="619" value="Shares things / food without teacher’s prompt">
                  <td style="color:black;">
                  <select class="selectList" name="619q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="619q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="619q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="619q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Develops longer attention span to complete the task</td><input type="hidden" name="620" value="Develops longer attention span to complete the task">
                  <td style="color:black;">
                  <select class="selectList" name="620q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="620q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="620q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="620q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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
                  <td style="color:black;">Completes task on time</td><input type="hidden" name="621" value="Completes task on time">
                  <td style="color:black;">
                  <select class="selectList" name="621q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td style="color:black;" >
                      <select  class="selectList" name="621q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td style="color:black;">
                      <select  class="selectList" name="621q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
                      <select  class="selectList" name="621q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td style="color:black;" >
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

</div>

    </div>
<!-- pro3 -->

<!-- pro4 -->
<div class="tab-pane fade" id="pro4" role="tabpanel" aria-labelledby="progress-tab">


<div class="row">
    
                               <!--teacher remarks-->
                               <div class="col-md-2"></div>
                              


<div class="col-md-8">
<p style="color:black;"> TEACHERS REMARK </p>
               <table class="table table-bordered ">
                <tr>
                    <th style="color:black;">QUATER</th>
                    <th style="color:black;">REMARKS</th>
                </tr>
                <tr>
                    <td style="color:black;">1st</td>
                    <td style="color:black;"><input class="form-control" type="text" name="tq1" id=""></td>
                </tr>
                <tr>
                    <td style="color:black;">2nd</td>
                    <td style="color:black;"><input class="form-control" type="text" name="tq2" id=""></td>
                </tr>
                <tr>
                    <td style="color:black;">3rd</td>
                    <td style="color:black;"><input class="form-control" type="text" name="tq3" id=""></td>
                </tr>
                <tr>
                    <td style="color:black;">4th</td>
                    <td style="color:black;"><input class="form-control" type="text" name="tq4" id=""></td>
                </tr>
               </table>

        
               </div>
               <!--teacher remarks-->
</div>
    </div>
<!-- pro4 -->

    </div>
                
     

   

  
               
      



  </div>
<!--Assessment tab-->

  <!--Assessent tab-->
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

  <table class="table table-borderless p-3">
    <tr>
        <th style="color:black;">File type</th>
        <th style="color:black;">Year</th>
        <th style="color:black;">Description</th>
        <th style="color:black;">Action</th>
    </tr>
    <tr>
        <td style="color:black;">INDIVIDUALIZED EDUCATION PLAN</td><input type="hidden" value="INDIVIDUALIZED EDUCATION PLAN" name="type1"></td>
        <td style="color:black;"><input type="number" class="form-control" name="year1" max="2030" min="2010"></td>
        <td style="color:black;"><input type="text" name="des1" class="form-control"></td>

        <td style="color:black;">
            
            <input id="uploadPDF1" onchange="showname()" type="file" name="fileToUpload1"/>
        </td>
        
    </tr>
    <tr>
        <td style="color:black;">INDIVIDUAL LEARNERS PLAN</td><input type="hidden" value="INDIVIDUAL LEARNERS PLAN" name="type2"></td>
        <td style="color:black;"><input type="number" class="form-control" name="year2" max="2030" min="2010"></td>
        <td style="color:black;"><input type="text" name="des2" class="form-control"></td>

        <td style="color:black;">
           
            <input id="uploadPDF2" onchange="showname1()" type="file" name="fileToUpload2"/>
        </td>
        
    </tr>
    <tr>
        <td style="color:black;">INDIVIDUAL LEARNING MONITORING PLAN</td><input type="hidden" value="INDIVIDUAL LEARNING MONITORING PLAN" name="type3"></td>
        <td style="color:black;"><input type="number" class="form-control" name="year3" max="2030" min="2010"></td>
        <td style="color:black;"><input type="text" name="des3" class="form-control"></td>
        <td style="color:black;">
           
            <input id="uploadPDF3" onchange="showname2()" type="file" name="fileToUpload3"/>
        </td>
        
    </tr>
    <tr>
        <td style="color:black;">BEHAVIOR INTERVENTION REPORT</td><input type="hidden" value="BEHAVIOR INTERVENTION REPORT" name="type4"></td>
        <td style="color:black;"><input type="number" class="form-control" name="year4" max="2030" min="2010"></td>
        <td style="color:black;"><input type="text" name="des4" class="form-control"></td>
        <td style="color:black;">
          
            <input id="uploadPDF4" onchange="showname3()" type="file" name="fileToUpload4"/>
        </td>
        
    </tr>
   
  </table>

  <input type="submit" value="Create Folder" class="btn btn-primary float-right mt-5" name="submit">

  </div>
<!--Assessment tab-->





      </div>
      <div class="modal-footer">
       
  
      </form>
      </div>
    </div>
  </div>
</div></div>
      <div class="row">

    <?php

include('../connect.php');
$id = $_GET['id'];

$sqlget1 = "SELECT * FROM folder where lrn = $id";
$sqldata1 = mysqli_query($conn, $sqlget1) or die('Error Displaying Data'. mysqli_connect_error());

while ($row3 = mysqli_fetch_assoc($sqldata1)) {

?>
<div class="col-md-2" align="center" style="color:black;">
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
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
  $(document).ready(function () {
    $('#example').DataTable();
});
</script>
<?php
if(isset($_GET['alert'])){

  echo "<script>swal('Folder has been added', 'Folder Successfully Added to a Student', 'success');</script>";

}
?>

<?php
if(isset($_GET['update'])){

  echo "<script>swal('Information successfuly update', 'Student information successfuly updated', 'success');</script>";

}
?>

</body>

</html>