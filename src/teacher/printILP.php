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

<?php
$ilp_id = $_GET['ilp_id'];
$principal = "";
$school_year = "";
$educ_history = "";
$interview_learner = "";
$strenght_1 = "";
$strenght_2 = "";
$strenght_3 = "";
$strenght_4 = "";
$strenght_5 = "";
$strenght_6 = "";
$strenght_7 = "";
$need_1 = "";
$need_2 = "";
$need_3 = "";
$need_4 = "";
$need_5 = "";
$need_6 = "";
$need_7 = "";

$id = $_GET['lrn'];
$folder_id = $_GET['folder_id'];
$ilp_id = $_GET['ilp_id'];
$sqlgetilp = "SELECT * FROM ilp where lrn = $id and folder_id = $folder_id and ilp_id = $ilp_id";
$sqldatailp = mysqli_query($conn, $sqlgetilp) or die('Error Displaying Data'. mysqli_connect_error());

while ($rowilp = mysqli_fetch_assoc($sqldatailp)) {

 
  $principal = $rowilp['principal'];
  $school_year = $rowilp['school_year'];
  $educ_history = $rowilp['educ_history'];
  $interview_learner = $rowilp['interview_learner'];
  $strenght_1 = $rowilp['strenght_1'];
  $strenght_2 = $rowilp['strenght_2'];
  $strenght_3 = $rowilp['strenght_3'];
  $strenght_4 = $rowilp['strenght_4'];
  $strenght_5 = $rowilp['strenght_5'];
  $strenght_6 = $rowilp['strenght_6'];
  $strenght_7 = $rowilp['strenght_7'];
  $need_1 = $rowilp['need_1'];
  $need_2 = $rowilp['need_2'];
  $need_3 = $rowilp['need_3'];
  $need_4 = $rowilp['need_4'];
  $need_5 = $rowilp['need_5'];
  $need_6 = $rowilp['need_6'];
  $need_7 = $rowilp['need_7'];
}

$adviser = "";
$type_assessment = "";
$date1 = "";
$chronological_age = "";
$administrator = "";
$result = "";
$date_interview = "";
$date_interview_student = "";

$sqlgetassess = "SELECT * FROM ilp_assessment where ilp_id = $ilp_id";
$sqldataassess = mysqli_query($conn, $sqlgetassess) or die('Error Displaying Data'. mysqli_connect_error());

while ($rowassess = mysqli_fetch_assoc($sqldataassess)) {

   $rowassess['adviser'];

   $adviser = $rowassess['adviser'];
   $type_assessment = $rowassess['type_assessment'];
   $date1 = $rowassess['date'];
   $chronological_age = $rowassess['chronological_age'];
   $administrator = $rowassess['administrator'];
   $result = $rowassess['result'];
   $date_interview = $rowassess['date_interview'];
   $date_interview_student = $rowassess['date_interview_student'];
}

?>


<div class="container-fluid">

<div class="d-flex justify-content-end">
<button type="button" id="printPageButton" class="btn btn-success hidethis mt-3" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
  
</div>


<h2 class="mt-5" align="center">INDIVIDUAL LEARNER’S PROFILE (ILP)</h2>

<h4> PART I </h4>
  <div class="row mb-5">
            <!--info-->

            <div class="col-md-2"></div>

            <div class="col-md-8">
           

       <table class="table table-borderless">
       <?php


$id = $_GET['lrn'];
$sqlget11 = "SELECT * FROM new_student where lrn = $id";
$sqldata11 = mysqli_query($conn, $sqlget11) or die('Error Displaying Data'. mysqli_connect_error());
$guardian="";
$guardian_contact = "";
while ($row31 = mysqli_fetch_assoc($sqldata11)) {

  $guardian=$row31['guardian'];
$guardian_contact = $row31['gurdian_contact'];



?>
       <tr>
        <td><strong>Name : </strong><u><?php echo $row31['fname']." ".$row31['lname']; ?></u></td>
        <td><strong>Date of Birth : </strong><u><?php echo $row31['birth_date']; ?></u></td>
        <td><strong>Age:</strong><u>            <?php
$date = date_create($row31['birth_date']);
$interval = $date->diff(new DateTime);
echo $interval->y;
?> </u></td>
       </tr>

       <tr>
        <td colspan="3"><strong>Address : </strong><?php echo $row31['address']; ?> Sta. Cruz Laguna</td>
       </tr>

       <tr>
       <td colspan="3"><strong>Type of Learner : </strong><?php echo $row31['category']; ?> Sta. Cruz Laguna</td>
    
       <td colspan="3"><strong>LRN : </strong><?php echo $row31['lrn']; ?></td>
       </tr>

       <tr>
       <td colspan="3"><strong>Principal : </strong><?php echo $principal; ?></td>
    
       <td colspan="3"><strong>Adviviser : </strong><?php echo $adviser; ?></td>
       </tr>

       
<?php }?>
       



       </table>

       </div>
   
   
       <table class="table1 table-bordered">

       
       <tr class="bg-secondary text-white">
    <th>Type of Assessments</th>
    <th>Date Administered</th>
    <th>Chronological Age</th>
    <th>Administrator</th>
    <th>Results/Outcome</th>
  </tr>

  <tr>
    <td><?php echo $type_assessment;?></td>
    <td><?php echo  $date1; ?></td>
    <td><?php echo $chronological_age;?></td>
    <td><?php echo $administrator;?></td>
    <td><?php echo $result;?></td>
  </tr>

  <tr>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
  </tr>
       

       </table>

       <br><br><br><br><br>

       <table class="table table-borderless">
  <tr >
    <td> <strong>Interview with Parents/Guardian</strong></td>
  </tr>

  <tr>
    <td>
    <p>Name of Parent/Guardian: <u><?php echo $guardian; ?></u></p>
    </td>
  </tr>

  <tr>
    <td>
    <p>Contact Number/s: <u><?php echo $guardian_contact; ?></u></p>	
    </td>
  </tr>

  <tr>
    <td>
    
    Date of Interview: <u><?php echo $date_interview; ?></u>
    
  </td>
  </tr>

  <tr>
    <td>
    <p>Developmental and educational History: <u><?php echo $educ_history; ?></u></p> 
    </td>
  </tr>
  <tr >
    <td>
      
<strong>Interview with the Learner</strong>
    </td>
  </tr>


  <tr>
    <td>
 
    Date of Interview: <u><?php echo $date_interview_student; ?></u>
    
  </td>
  </tr>

  <tr>
    <td>
    <p>Interests/Hobbies/Talents: <u><?php echo $interview_learner; ?></u></p>
    </td>
  </tr>
 </table>
       </div>

       <br><br><br><br><br><br><br><br><br><br><br><br><br>   
       <div class="row d-flex justify-content-center">

<div class="col-md-12 d-flex justify-content-center" ><img src="../img/print_logo.png" alt=""></div>
<br>

<h3 align="center" style=" font-family: 'Old English Text MT';">Republic of the Philippines <br>
Department of Education <br>
<p style=" font-family: 'Trajan Pro'; font-size:16px;">Region IVA- CALABARZON</p> 
<p style=" font-family: 'Trajan Pro'; font-size:16px;">SCHOOLS DIVISION OF LAGUNA</p>
</h3>

</div>

<table class="table table-borderless">

<tr ><td><p><strong>DAILY LIVING SKILLS DOMAIN:</strong> Present Level of Educational Performance</p></td></tr>

<tr><td><p><strong>Strength/s: </strong><u><?php echo $strenght_1;?></u> </p></td></tr>

<tr><td><p><strong>Need/s:  </strong><u><?php echo $need_2;?></u> </p></td></tr>

<tr ><td><p><strong>LANGUAGE DEVELOPMENT DOMAIN: :</strong> Present Level of Educational Performance</p></td></tr>

<tr><td><p><strong>Strength/s: </strong><u><?php echo $strenght_2;?></u> </p></td></tr>

<tr><td>
<p><strong>Need/s:  </strong><u><?php echo $need_2;?></u> </p></td></tr>

<tr ><td><p><strong>PSYCHOMOTOR DOMAIN:</strong> Present Level of Educational Performance</p></td></tr>

<tr><td>
<p><strong>Strength/s: </strong><u><?php echo $strenght_3;?></u> </p></td></tr>

<tr><td><p><strong>Need/s:  </strong><u><?php echo $need_3;?></u> </p></td></tr>


<tr ><td><p><strong>COGNITIVE DOMAIN:</strong> Present Level of Educational Performance</p></td></tr>
<tr><td><p><strong>Strength/s: </strong><u><?php echo $strenght_4;?></u> </p></td></tr>
<tr><td><p><strong>Need/s:  </strong><u><?php echo $need_4;?></u> </p></td></tr>
<tr ><td><p><strong>AESTHETIC AND CREATIVE DOMAIN:</strong> Present Level of Educational Performance</p></td></tr>
<tr><td><p><strong>Strength/s: </strong><u><?php echo $strenght_5;?></u> </p></td></tr>
<tr><td><p><strong>Need/s:  </strong><u><?php echo $need_5;?></u> </p></td></tr>
<tr ><td><p><strong>BEHAVIORAL DEVELOPMENT:</strong> Present Level of Educational Performance</p></td></tr>
<tr><td><p><strong>Strength/s: </strong><u><?php echo $strenght_6;?></u> </p></td></tr>
<tr><td><p><strong>Need/s:  </strong><u><?php echo $need_6;?></u> </p></td></tr>
<tr ><td><p><strong>ORIENTATION AND MOBILITY:</strong> Present Level of Educational Performance</p></td></tr>
<tr><td><p><strong>Strength/s: </strong><u><?php echo $strenght_7;?></u> </p></td></tr>
<tr><td><p><strong>Need/s:  </strong><u><?php echo $need_7;?></u> </p></td></tr>

</table>

        <br><br><br>
       <div class="row d-flex justify-content-center">

<div class="col-md-12 d-flex justify-content-center" ><img src="../img/print_logo.png" alt=""></div>
<br>

<h3 align="center" style=" font-family: 'Old English Text MT';">Republic of the Philippines <br>
Department of Education <br>
<p style=" font-family: 'Trajan Pro'; font-size:16px;">Region IVA- CALABARZON</p> 
<p style=" font-family: 'Trajan Pro'; font-size:16px;">SCHOOLS DIVISION OF LAGUNA</p>
</h3>

</div>


<table class="table1 table-sm table-borderless">

<tr class="bg-secondary text-white">
    <th><strong>Priority Learning Needs/Intervention</strong></th>
  </tr>
<?php
  $sqlprio = "SELECT * FROM ilp_priority where ilp_id = $ilp_id";
$sqldataprio = mysqli_query($conn, $sqlprio) or die('Error Displaying Data'. mysqli_connect_error());

while ($rowprio = mysqli_fetch_assoc($sqldataprio)) {

  ?>
  <tr>
    <td>1. <?php echo $rowprio['priority1'];?></td>
  </tr>
  <tr>
    <td>2. <?php echo $rowprio['priority2'];?></td>
  </tr>
  <tr>
    <td>3. <?php echo $rowprio['priority3'];?></td>
  </tr>
  <tr>
    <td>4. <?php echo $rowprio['priority4'];?></td>
  </tr>
  <tr>
    <td>5. <?php echo $rowprio['priority5'];?></td>
  </tr>
  <tr>
    <td>6. <?php echo $rowprio['priority6'];?></td>
  </tr>
  <tr>
    <td>7. <?php echo $rowprio['priority7'];?></td>
  </tr>

  <?php } ?>

</table>

<table class="table1 table-borderless">
  <tr class="bg-secondary text-white">
    <th><strong>Transition Package:</strong></th>

    <?php
  $sqltrans = "SELECT * FROM ilp_transition where ilp_id = $ilp_id";
$sqldatatrans = mysqli_query($conn, $sqltrans) or die('Error Displaying Data'. mysqli_connect_error());

while ($rowtrans = mysqli_fetch_assoc($sqldatatrans)) {

  ?>
  </tr>
  <tr>
    <td>1. <?php echo $rowtrans['transition1'];?></td>
  </tr>
  <tr>
    <td>2. <?php echo $rowtrans['transition2'];?></td>
  </tr>
  <tr>
    <td>3. <?php echo $rowtrans['transition3'];?></td>
  </tr>
  <tr>
    <td>4. <?php echo $rowtrans['transition4'];?></td>
  </tr>
  <tr>
    <td>5. <?php echo $rowtrans['transition5'];?></td>
  </tr>
  <?php } ?>
</table>

</div>
</body>
</html>
        