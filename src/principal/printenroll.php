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

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<style>




@media print {
  #printPageButton {
    display: none;
  }
}
</style>







<body id="page-top">
  <div class="container-fluid">




<div class="container-fluid">

<div class="d-flex justify-content-end">
<button type="button" id="printPageButton" class="btn btn-success hidethis mt-3" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
  
</div>
<div class="row d-flex justify-content-center">

<div class="col-md-12 d-flex justify-content-center" ><img src="../img/print_logo.png" alt=""></div>
<br>

<h3 align="center" style=" font-family: 'Old English Text MT';">Republic of the Philippines <br>
Department of Education <br>
<p style=" font-family: 'Trajan Pro'; font-size:16px;">Region IVA- CALABARZON</p> 
<p style=" font-family: 'Trajan Pro'; font-size:16px;">SCHOOLS DIVISION OF LAGUNA</p>
</h3>



<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <tr>
                                        <th>LRN</th>
                                        <th>Student Code</th>
                                        <th>Address</th>
                                        <th>Age</th>
                                        <th>School</th>
                                        <th>Enrollment Status</th>
                                     
                                       
                                        </tr>
                                        

                    <?php
	include('../connect.php');
	
    
  $school=$_SESSION['school'];
$sqlget1 = "SELECT * FROM new_student where enroll_status='enrolled' and school='$school'";
$sqldata1 = mysqli_query($conn, $sqlget1) or die('Error Displaying Data'. mysqli_connect_error());

while ($row2 = mysqli_fetch_assoc($sqldata1)) {


		
?>

	<tr>
        <td><?php echo $row2['lrn'];?></td>
        <td><?php echo $row2['student_code'];?></td>
        <td><?php echo $row2['address'];?></td>
        <td><?php
$date = date_create($row2['birth_date']);
$interval = $date->diff(new DateTime);
echo $interval->y;
?></td>
        <td><?php echo $row2['school'];?></td>
        <td><?php echo $row2['enroll_status'];?></td>
       

        
    </tr>

 <!-- Modal -->
<div class="modal fade" id="e<?php echo $row2['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to Decline account?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" align="right">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <a href="update_status.php?id=<?php echo $row2['id'];?>" class="btn btn-danger">Yes</a>
   
      </div>
    
    </div>
  </div>
</div>

 <!-- Modal -->
 <div class="modal fade" id="a<?php echo $row2['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to Approve account?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" align="right">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <a href="update_status.php?id1=<?php echo $row2['id'];?>" class="btn btn-success">Yes</a>
   
      </div>
    
    </div>
  </div>
</div>
       
    
  
<?php
	

}


?>
	</table>
</div>



</div>
</body>
</html>
        