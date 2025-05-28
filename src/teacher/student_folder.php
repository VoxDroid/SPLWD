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



<div class="container mt-5" align='center'>
  <?php
      include('../connect.php');
      if(isset($_GET['lrn'])){
      $lrn = $_GET['lrn'];
      $sqlget = "SELECT * FROM student where lrn=$lrn";
      $sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
      while ($row2 = mysqli_fetch_assoc($sqldata)) {

        echo "<h1 class='mb-5'>".$row2['fname']." ".$row2['lname']." Files </h1>";

      }

  }?>

  <div class="row">
    <div class="col-md-3">
      <h3>Student Information</h3>
      <a href="student_profile.php?lrn=<?php echo  $lrn;?>">
 <img src="../img/folder.png" width="300" alt="">
 </a>
  
    </div>

    <div class="col-md-3">
    <h3>Assessment</h3>
    <a href="student_profile.php?assessment=<?php echo  $lrn;?>">
    <img src="../img/folder.png" width="300" alt="">
</a>
  
    </div>

    <div class="col-md-3">
    <h3>Evaluation</h3>
    <a href="student_profile.php?evaluation=<?php echo  $lrn;?>">
    <img src="../img/folder.png" width="300" alt="">
    </a>
  
    </div>

    <div class="col-md-3">
    <h3>ILP</h3>
    <a href="student_profile.php?ilp=<?php echo  $lrn;?>">
    <img src="../img/folder.png" width="300" alt="">
    </a>
  
    </div>

  </div>

</div>

</div>


</body>
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