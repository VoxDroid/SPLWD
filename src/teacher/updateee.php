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

<style>
img.sticky {
  position: -webkit-sticky;
  position: sticky;
  top: 0;
  width: 500px;

}
</style>

<body id="page-top">

<?php
include('../connect.php');
$count = 1;
$school =$_SESSION['school'];
$teacher =$_SESSION['teacher_id'];
$sqlget1 = "SELECT * FROM student_files";
$sqldata1 = mysqli_query($conn, $sqlget1) or die('Error Displaying Data'. mysqli_connect_error());

while ($row3 = mysqli_fetch_assoc($sqldata1)) {

  if($count == 1){

    echo '"'.$row3['file_name'].'"';

  }

  else if($count>1)
  {

    echo ',"'.$row3['file_name'].'"';
  }

  $count++;
}




?>

<script>
         var arr1 = [50,60,65,90];
         var arr2 = [60];  
         for (i = 0; i < arr1.length; i++) {  
            for (z = 0; z < arr1.length; z++) {
               if (arr1[i] === arr2[z]) {
                  document.write("<br>Matched element: "+arr2[z]);
               }  
            }  
         }  
      </script>

<?php
include('../connect.php');
$count = 1;
$school =$_SESSION['school'];
$teacher =$_SESSION['teacher_id'];
$sqlget1 = "SELECT * FROM new_student";
$sqldata1 = mysqli_query($conn, $sqlget1) or die('Error Displaying Data'. mysqli_connect_error());

while ($row3 = mysqli_fetch_assoc($sqldata1)) {

  if($count == 1){

    echo '"'.$row3['lrn'].'"';

  }

  else if($count>1)
  {

    echo ',"'.$row3['lrn'].'"';
  }

  $count++;
}




?>

<?php
$filename = 'filename.php'; 
$filename_without_ext = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);

echo $filename_without_ext;

?>
<h2 align="center">BEHAVIOR INTERVENTION REPORT (BIR)</h2>
<table class="table table-borderless" style="text-align:center;">
  <tr>
  <td><div class="d-flex justify-content-center"> <p> School year:</p> <input type="number" style="width:150px;" class="form-control ml-3" name="school_year"></div></td> 
  </tr>

  <tr>
    <td><div class="d-flex justify-content-center"> <p> Date of Observation:</p> <input type="date" style="width:150px;" class="form-control ml-3" name="date_observation"></div></td> 
  </tr>

  <tr>
    <td><div class="d-flex justify-content-left"> <p> Name of Learners: </p> <input type="text" style="width:150px;" class="form-control ml-3" name="date_observation"></div></td> 
  </tr>

  <tr>
    <td><div class="d-flex justify-content-left"> <p> Learner’s Reference Number : </p> <input type="text" style="width:150px;" class="form-control ml-3" name="date_observation"></div></td> 
  </tr>

  <tr>
    <td><div class="d-flex justify-content-left"> <p> Date of Birth : </p> <input type="text" style="width:150px;" class="form-control ml-3" name="date_observation"></div></td> 
  </tr>

  <tr>
    <td><div class="d-flex justify-content-left"> <p> Age of Learner: ______________________ Gender: Male            Female  : </p> <input type="text" style="width:150px;" class="form-control ml-3" name="date_observation"></div></td> 
  </tr>

  <tr>
    <td>Baseline Data: (refer to the SF9 or Anecdotal Record) <input type="text" class="form-control" name="baseline"></td>
  </tr>

  <tr>
    <td>Difficulty/Disability of the Learners:<input type="text" class="form-control" name="dificulty"></td>
  </tr>
  
  <tr style="text-align:left">
    <td>Check the appropriate box:</td>
  </tr>
  <tr>
    <td>
 
      <div class="d-flex justify-content-start">
    <div><input type="checkbox" style="width:50px;" name="with"></div> 
    <div><p>With Medical Assessment</p> </div>

    <div><p class="ml-5"> Results & Findings:</p></div>
    <div><textarea type="text" name="findings" class="form-control ml-3" style="width:650px;"></textarea></div>
    </div>

    </td>
    
  </tr>

  <tr>
    <td>
 
      <div class="d-flex justify-content-start">
    <div><input type="checkbox" style="width:50px;" name="with"></div> 
    <div><p>With Medical Assessment</p> </div>

    </td>
    
  </tr>

  <tr style="text-align:left">
    <td>Educational Placement of LSEN:</td>
  </tr>

  <tr>
    <td>
 
      <div class="d-flex justify-content-start">
    <div><input type="checkbox" style="width:50px;" name="with"></div> 
    <div><p>Self contained</p> </div>

    <div><input type="checkbox" style="width:50px;" name="with"></div> 
    <div><p>Inclusion</p> </div>

 
    </div>

    </td>
    
  </tr>

  <tr style="text-align:left">
    <td><p> Parents: _____________________________ </p>
    <p> Contact: _____________________________ </p>
    <div class="d-flex justify-content-start">
    <p> work: _____________________________ </p>
    <p> Home: _____________________________ </p>
</div>
</td>
  </tr>


       



</table>

<table class="table table-bordered">
  <tr>
    <th colspan="4">BEHAVIOR MANIFESTATION & INTERVENTION</th>

</tr>

<tr>
  <td></td>
  <td>At Home</td>
  <td>In School</td>
  <td>Other Settings</td>
</tr>

<tr>
  <td>Antecedent/ Prior Behavior 
(Triggers/Signals)</td>
<td></td>
<td></td>
<td></td>
</tr>

<tr>
  <td>Observable Behavior</td>
  <td></td>
<td></td>
<td></td>
</tr>

<tr>
  <td>Result/ Consequence of Behavior</td>
  <td></td>
<td></td>
<td></td>
</tr>		

  <tr>
  <td>    
Intervention Done</td>
  <td></td>
<td></td>
<td></td>
  </tr>  

  <tr>
  <td>    
  Proactive Strategies for Prevention</td>
  <td></td>
<td></td>
<td></td>
  </tr> 
    
  <tr>
  <td>    
  Reactive Strategies for Immediate Intervention</td>
  <td></td>
<td></td>
<td></td>
  </tr> 
  
</table>

<br><br><br>
<table class="table table-bordered">
  <tr><td><p> Targeted Behavior (Behavior to be decreased)</p>
<p></p></td></tr>

<tr><td><p> Specific Objectives:</p>
<p></p></td></tr>

<tr><td><p> Basic Intervention Report:</p>
<p></p></td></tr>

</table>

<table class="table table-borderless">
  <tr>
    <td>
    <div class="d-flex justify-content-center">
      <div><p class="mr-1">Prepared by:</p></div>
      <div><input type="text" class="form-control" style="width:300px"><p class="ml-5"> Name of Teacher </p></div>
      <div><p class="mr-2 ml-5">Conformed:</p></div>
      <div><input type="text" class="form-control" style="width:300px"><p class="ml-5">Parent/Guardian</p></div>

</div>
     
    
    </td>
  </tr>

 

  <tr>
    <td>
    <div class="d-flex justify-content-center">
      <div><p>Noted:</p></div>
      <div><input type="text" class="form-control" style="width:300px"><p class="ml-5">Name of Principal/School Head</p></div>
</div>
    </td>
  </tr>
</table>
						
                                                                                                    
                                             
                                        

</body>

</html>