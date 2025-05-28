<?php include('../session.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Student</title>

  <?php include('../links.php');  ?>
</head>
<style type="text/css">

.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: black;
  color: white;
  text-align: center;
}

#loading {
  background-color: white;

  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  z-index: 9999999;
}
.center {
position: absolute;
left: 50%;
top: 50%;
transform: translate(-50%, -50%);

padding: 10px;
}



</style>
<body> 
<div id="loading">
	<div  class="center">
	<img src="../img/6.gif" width="300">
	</div>
</div>

<?php include('nav1.php');  ?>

<div class="container" align="center">
  <div class="row">

  <h1 style="color:white; font-family: Courier New; font-weight:bolder;">Students Folder</h1>


<?php

include('../connect.php');

$sqlget1 = "SELECT * FROM new_student";
$sqldata1 = mysqli_query($conn, $sqlget1) or die('Error Displaying Data'. mysqli_connect_error());

while ($row3 = mysqli_fetch_assoc($sqldata1)) {

?>
<div class="col-md-2" align="center">
  <?php echo $row3['student_code']?>
  <a href="new_student_folder.php?id=<?php echo $row3['lrn'];?>"> <img class="img-fluid" src="../img/folder.png" alt=""></a>
 
</div>



<?php
}
?>



    </div>
  </div>
</div>


</body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
if(isset($_GET['id'])){

  echo "<script>swal('New Student Added', 'New Student successfuly Added', 'success');</script>";

}
?>
<script src="../js/tab.js"></script>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
var delay = 1000;
setTimeout(function() 
           
    {  
        
        $( "#loading" ).fadeOut( "slow" );
     $( "body" ).css( "background-color", "white" );
         $('#container').fadeIn();
     

    },
    delay
) ;
</script>
</html>