<?php include('../session.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
<div class="row d-flex justify-content-center">

<div class="col-md-12 d-flex justify-content-center" ><img src="../img/print_logo.png" alt=""></div>
<br>

<h3 align="center" style=" font-family: 'Old English Text MT';">Republic of the Philippines <br>
Department of Education <br>
<p style=" font-family: 'Trajan Pro'; font-size:16px;">Region IVA- CALABARZON</p> 
<p style=" font-family: 'Trajan Pro'; font-size:16px;">SCHOOLS DIVISION OF LAGUNA</p>
</h3>

</div>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Individual Educational Plan</title>
 

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-print-css/css/bootstrap-print.min.css" media="print">





</head>

<?php

include('../connect.php');
$id = $_GET['lrn'];

$address ="";
$name = "";
$birth_date = "";
$guardian = "";
$guardian_contact = "";
$category = "";
$work_= "";
$grade = "";
$gender ="";
$folder_id = $_GET['folder_id'];
$sqlget = "SELECT * FROM new_student where lrn = $id";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());

while ($row = mysqli_fetch_assoc($sqldata)) {
  $address = $row['address'];
  $birth_date = $row['birth_date'];
  $guardian = $row['guardian'];
$guardian_contact = $row['gurdian_contact'];
$category = $row['category'];
$work_ = $row['work'];
$gender = $row['gender'];
$name = $row['fname']." ".$row['mname']." ".$row['lname'];

}
?>

<style>


  /* Table design for printing */
  .table1 {
    border: 1px solid #F1F3F5;
    
    width: 100%;
    
  }
  .table1 tr th{
    padding: 5px;
  }



  @media print {
    body {
      -webkit-print-color-adjust: exact;
      /* color: white !important; */
    }


    #printPageButton {
      display: none;
    }

    footer {

      text-emphasis: none;
    }
  }



  /* ISO Paper Size */

</style>







<body id="page-top">
  <div class="container-fluid">

<?php
include('../connect.php');

?>


<div class="container-fluid" style="font-family:Times New Roman; font-size:24px;">

<div class="d-flex justify-content-end">
<button type="button" id="printPageButton" class="btn btn-success hidethis mt-3" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
  
</div>
<?php 
$bir_id = $_GET['bir_id'];
$folder_id = $_GET['folder_id'];
$sqlbir = "SELECT * FROM bir where bir = $bir_id";
$sqldatabir = mysqli_query($conn, $sqlbir) or die('Error Displaying Data'. mysqli_connect_error());

while ($rowbir = mysqli_fetch_assoc($sqldatabir)) {

$bir = $rowbir['bir'];
  
  ?>

<h2 style="text-align:center">BEHAVIOR INTERVENTION REPORT (BIR)</h2>
<table class="table table-borderless" style="text-align:center;">
  <tr>
  <td style="color:black;"><div class="d-flex justify-content-center"> <p style="color:black;"> School year:</p> _<u><?php echo $rowbir['school_year']; ?></u>_______</div></td> 
  </tr>

  <tr>
    <td style="color:black;"><div class="d-flex justify-content-center"> <p style="color:black;"> Date of Observation:_<u><?php echo $rowbir['date']; ?></u>_______</div></td> 
  </tr>

  <tr>
    <td style="color:black;"><div class="d-flex justify-content-left"> <p style="color:black;"> Name of Learners: _<u><?php echo $name; ?></u>_______ </p></div></td> 
  </tr>

  <tr>
    <td style="color:black;"><div class="d-flex justify-content-left"> <p style="color:black;"> Learner’s Reference Number : _<u><?php echo $_GET['lrn']; ?></u>_______ </p> </div></td> 
  </tr>

  <tr>
    <td style="color:black;"><div class="d-flex justify-content-left"> <p style="color:black;"> Date of Birth : _<u><?php echo $birth_date; ?></u>_______ </p> </div></td> 
  </tr>

  <tr>
    <td style="color:black;"><div class="d-flex justify-content-left"> <p style="color:black;"> Age of Learner: _<u>  <?php
$date = date_create($birth_date);
$interval = $date->diff(new DateTime);
echo $interval->y;
?></u>_____ Gender:  _<u><?php echo $gender; ?></u>_______   </p></div></td> 
  </tr>

  <tr>
    <td style="color:black;">Baseline Data: (refer to the SF9 or Anecdotal Record) <input style="color:black;" type="text" class="form-control" value = "<?php echo $rowbir['baseline']; ?>" name="baseline"></td>
  </tr>

  <tr>
    <td style="color:black;">Difficulty/Disability of the Learners:<input style="color:black;" type="text" class="form-control" value = "<?php echo $rowbir['difficulty']; ?>" name="difficulty"></td>
  </tr>
  
  <tr style="text-align:left">
    <td style="color:black;">Check the appropriate box:</td>
  </tr>
  <tr>
    <td style="color:black;">
 
      <div class="d-flex justify-content-start">
    <div><input style="color:black;" type="radio" value="1" <?php if($rowbir['with_'] == '1'){ echo 'checked';}?>  style="width:50px;" name="with_"></div> 
    <div><p style="color:black;">With Medical Assessment</p> </div>

    <div><p class="ml-5"> Results & Findings:</p></div>
    <div><textarea type="text" name="result" class="form-control ml-3" style="width:650px;"><?php echo $rowbir['result']; ?></textarea></div>
    </div>

    </td>
    
  </tr>

  <tr>
    <td style="color:black;">
 
      <div class="d-flex justify-content-start">
    <div><input style="color:black;" type="radio" <?php if($rowbir['with_'] == '2'){ echo 'checked';}?> value="2" style="width:50px;" name="with_"></div> 
    <div><p style="color:black;">Without Medical Assessment</p> </div>

    </td>
    
  </tr>

  <tr style="text-align:left">
    <td style="color:black;">Educational Placement of LSEN:</td>
  </tr>

  <tr>
    <td style="color:black;">
 
      <div class="d-flex justify-content-start">
    <div><input style="color:black;" type="radio" value="1"  style="width:50px;" <?php if($rowbir['self'] == '1'){ echo 'checked'; }?> name="self"></div> 
    <div><p style="color:black;">Self contained</p> </div>

    <div><input style="color:black;" type="radio" value="2" style="width:50px;" <?php if($rowbir['self'] == '2'){ echo 'checked'; } ?> name="self"></div> 
    <div><p style="color:black;">Inclusion</p> </div>

 
    </div>

    </td>
    
  </tr>

  <tr style="text-align:left">
    <td style="color:black;"><p style="color:black;"> Parents: ___________<u><?php echo $guardian; ?></u>____________ </p>
    <p style="color:black;"> Contact: _________<u><?php echo $guardian_contact; ?></u>___________ </p>
    <div class="d-flex justify-content-start">
    <p style="color:black;"> work: _________<u><?php echo $work_; ?></u>____________ </p>
    <p style="color:black;"> Home: __________<u><?php echo $address; ?></u>__________ </p>
</div>
</td>
  </tr>


       



</table>

<div class="row d-flex justify-content-center">

<div class="col-md-12 d-flex justify-content-center" ><img src="../img/print_logo.png" alt=""></div>
<br>

<h3 align="center" style=" font-family: 'Old English Text MT';">Republic of the Philippines <br>
Department of Education <br>
<p style=" font-family: 'Trajan Pro'; font-size:16px;">Region IVA- CALABARZON</p> 
<p style=" font-family: 'Trajan Pro'; font-size:16px;">SCHOOLS DIVISION OF LAGUNA</p>
</h3>

</div>
<?php
$sqlbir1 = "SELECT * FROM bir_intervention where bir_id = $bir ";
$sqldatabir1 = mysqli_query($conn, $sqlbir1) or die('Error Displaying Data'. mysqli_connect_error());

while ($rowbir1 = mysqli_fetch_assoc($sqldatabir1)) {

  ?>
<table class="table table-bordered">
  <tr>
    <th style="color:black; text-align:center" colspan="4">BEHAVIOR MANIFESTATION & INTERVENTION</th>

</tr>


<tr>
  <td style="color:black;"></td>
  <td style="color:black;">At Home</td>
  <td style="color:black;">In School</td>
  <td style="color:black;">Other Settings</td>
</tr>

<tr>
  <td style="color:black;">Antecedent/ Prior Behavior 
(Triggers/Signals)</td>
<td style="color:black;"><?php echo $rowbir1['antecedent']; ?></td>
<td style="color:black;"><?php echo $rowbir1['antecedent_2']; ?></td>
<td style="color:black;"><?php echo $rowbir1['antecedent_3']; ?></td>

</tr>

<tr>
  <td style="color:black;">Observable Behavior</td>
  <td style="color:black;"><?php echo $rowbir1['observable']; ?></td>
<td style="color:black;"><?php echo $rowbir1['observable_2']; ?></td>
<td style="color:black;"><?php echo $rowbir1['observable_3']; ?></td>
</tr>

<tr>
  <td style="color:black;">Result/ Consequence of Behavior</td>
  <td style="color:black;"><?php echo $rowbir1['consequence']; ?></td>
<td style="color:black;"><?php echo $rowbir1['consequence_2']; ?></td>
<td style="color:black;"><?php echo $rowbir1['consequence_3']; ?></td>
</tr>		

  <tr>
  <td style="color:black;">    
Intervention Done</td>
<td style="color:black;"><?php echo $rowbir1['intervention_done']; ?></td>
<td style="color:black;"><?php echo $rowbir1['intervention_done_2']; ?></td>
<td style="color:black;"><?php echo $rowbir1['intervention_done_3']; ?></td>
  </tr>  

  <tr>
  <td style="color:black;">    
  Proactive Strategies for Prevention</td>
  <td style="color:black;"><?php echo $rowbir1['proactive']; ?></td>
<td style="color:black;"><?php echo $rowbir1['proactive_2']; ?></td>
<td style="color:black;"><?php echo $rowbir1['proactive_3']; ?></td>

  </tr> 
    
  <tr>
  <td style="color:black;">    
  Reactive Strategies for Immediate Intervention</td>
  <td style="color:black;"><?php echo $rowbir1['reactive']; ?></td>
<td style="color:black;"><?php echo $rowbir1['reactive_2']; ?></td>
<td style="color:black;"><?php echo $rowbir1['reactive_3']; ?></td>
  </tr> 

  <?php } ?>
  
</table>

<br><br><br>
<table class="table table-bordered">
  <tr><td style="color:black;"><p style="color:black;"> Targeted Behavior (Behavior to be decreased)</p>
  <?php echo $rowbir['target']; ?></td></tr>

<tr><td style="color:black;"><p style="color:black;"> Specific Objectives:</p>
<?php echo $rowbir['objective']; ?></td></tr>

<tr><td style="color:black;"><p style="color:black;"> Basic Intervention Report:</p>
<?php echo $rowbir['bir_intervention']; ?></td></tr>

</table>

<table class="table table-borderless">
  <tr>
    <td style="color:black;">
    <div class="d-flex justify-content-center">
      <div><p class="mr-1">Prepared by:</p></div>
      <div><input style="color:black;" type="text" class="form-control" value="<?php echo $rowbir['teacher']; ?>" name="teacher" style="width:300px"><p class="ml-5"> Name of Teacher </p></div>
      <div><p class="mr-2 ml-5">Conformed:</p></div>
      <div><input style="color:black;" type="text" class="form-control" value="<?php echo $guardian; ?>"  style="width:300px"><p class="ml-5">Parent/Guardian</p></div>

</div>
     
    
    </td>
  </tr>

 

  <tr>
    <td style="color:black;">
    <div class="d-flex justify-content-center">
      <div><p style="color:black;">Noted:</p></div>
      <div><input style="color:black;" type="text" class="form-control" value="<?php echo $rowbir['principal']; ?>" name="principal" style="width:300px"><p class="ml-5">Name of Principal/School Head</p></div>
</div>
    </td>
  </tr>
</table>
<?php } ?>

</div>
</body>
</html>
        