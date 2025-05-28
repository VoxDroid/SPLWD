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
  body {

    font-size: 12px;
  }

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
  @page {
    size: A4 landscape;
  }
</style>



<?php

include('../connect.php');

$name = "";
$folder_id = $_GET['folder_id'];
$id = $_GET['lrn'];
$ilmp_id =  $_GET['ilmp_id'];

$folder_id = $_GET['folder_id'];
$sqlget = "SELECT * FROM new_student where lrn = $id";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());

while ($row = mysqli_fetch_assoc($sqldata)) {
    $name = $row['fname']. " ".$row['lname'];


}
?>

<?php 

$c_1 = "";
$c_2 = "";
$c_3 = "";


$sqldif = "SELECT * FROM ilmp_group where ilmp_group_id = $ilmp_id";
$sqldatadif = mysqli_query($conn, $sqldif) or die('Error Displaying Data'. mysqli_connect_error());

while ($rowdif = mysqli_fetch_assoc($sqldatadif)) {

  $ilmp_id = $rowdif['ilmp_group_id'];
  $c_1 =$rowdif['c_1'];
$c_2 = $rowdif['c_2'];
$c_3 = $rowdif['c_3'];
}
  
  ?>


<?php
include('../connect.php');


$sqlgetgrade = "SELECT * FROM iep_difficulty where lrn = $id and folder_id = $folder_id";
$sqldatagrade = mysqli_query($conn, $sqlgetgrade) or die('Error Displaying Data'. mysqli_connect_error());

while ($gradeee = mysqli_fetch_assoc($sqldatagrade)) {
  $grade = $gradeee['grade'];
}
?>



<body id="page-top">
    
  <div class="container">
    
          <div class="row">
         <div> <button type="button" id="printPageButton" class="btn btn-success mt-5 hidethis float-right" onclick="window.print()"><i class="fas fa-print"></i> Print</button></div>
            
            <div class="col-md-12">
           
              <h3 align="center">INDIVIDUAL LEARNING MONITORING PLAN</h3>
              <table class="table table-bordered">
                <tr><td colspan="8">Learner's name: <?php echo $name; ?></td></tr>
                <tr><td colspan="8">Grade level: <?php echo $grade; ?></td></tr>
                <tr>
                  <th rowspan="2" style="text-align:center;">Learning Area</th>
                  <th rowspan="2" style="text-align:center;">Learner’s Needs</th>
                  <th rowspan="2" style="text-align:center;">Intervention Strategies Provided</th>
                  <th rowspan="2" style="text-align:center;">Monitoring Date</th>
                  <th colspan="3" style="text-align:center;">Learner’s Status</th>
                </tr>
                <tr style="text-align:center;"><th>Insignificant Progress</th>
              <th>Significant Progress</th>
            <th>Mastery</th></tr>

            <?php 

$cnt=1;
$sqlilmp = "SELECT * FROM ilmp where ilmp_id = $ilmp_id";
$sqldatailmp = mysqli_query($conn, $sqlilmp) or die('Error Displaying Data'. mysqli_connect_error());

while ($ilmp = mysqli_fetch_assoc($sqldatailmp)) {
?>

<tr>
  <td><?php echo $ilmp['learning_area']; ?></td>
  <td><?php echo $ilmp['learner_need']; ?></td>
  <td><?php echo $ilmp['intervention']; ?></td>
  <td><?php echo $ilmp['monitoring_date']; ?></td>
  <td><?php echo $ilmp['insignificant']; ?></td>
  <td><?php echo $ilmp['significant']; ?></td>
  <td><?php echo $ilmp['mastery']; ?></td>

</tr>





<?php
$cnt++;
} ?>
<tr>
    <th rowspan="3">Intervention Status</th>
    <td colspan="6"><input type="checkbox" <?php if($c_1 != ''){ echo 'checked';}?> name="c_1"> Learner is not making significant progress in a timely manner. Intervention strategies need to be revised.</td>
  
</tr>
<tr>  <td colspan="6"><input type="checkbox" <?php if($c_2 != ''){ echo 'checked'; }?>  name="c_2"> Learner is making significant progress. Continue with the learning plan. </td>
    </tr>
    <tr>
    <td colspan="6"><input type="checkbox" <?php if($c_3 != ''){ echo 'checked'; }?> name="c_3"> Learner has reached mastery of the competencies in learning plan. </td>
    </tr>
              </table>

</div></div></div>


</body>

</html>

           