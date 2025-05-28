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

<?php include('nav1.php'); ?>
<a href="student_folder.php?lrn=<?php if(isset($_GET['lrn'])) {echo $_GET['lrn'];}
else if(isset($_GET['assessment'])) {echo $_GET['assessment'];}
else if(isset($_GET['evaluation'])) {echo $_GET['evaluation'];}?>">Back to folders</a>
<div class="container" align='center'>



<?php

include('../connect.php');
if(isset($_GET['lrn'])){
  $t=$_GET['lrn'];
$sqlget1 = "SELECT * FROM student where lrn = $t";
$sqldata1 = mysqli_query($conn, $sqlget1) or die('Error Displaying Data'. mysqli_connect_error());

while ($row3 = mysqli_fetch_assoc($sqldata1)) {

?>


    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-12 col-xl-8">

        <div class="card" style="border-radius: 15px;">
          <div class="card-body text-center">
            <div class="mt-3 mb-4">
            <img src="../img/<?php echo $row3['img'];?>" onerror=this.src="../img/profile.png" alt="" class="rounded-circle img-thumbnail" width="100">
            </div>
            <h4 class="mb-2"><?php echo $row3['lname'].", ".$row3['fname']." ".$row3['mname'].".";?></h4>
            <div class="form-group">
                            <p>Learners Registry Number : <strong><?php echo $row3['lrn'];?></strong></p>
                              
                              
                              
                            </div>
                            <div class="form-group">
                            
                            <p>Full Name : <strong><?php echo $row3['lname'];?></strong>, <strong><?php echo $row3['fname'];?></strong> <strong><?php echo $row3['mname'];?>.</strong></p>
                            </div>
                           
                          <div class="form-group">

                          <p>Birth Date : <strong><?php echo $row3['birth_date'];?></strong></p>
                          </div>
                          <div class="form-group">
                          <p>Address : <strong>        <?php
  //date in mm/dd/yyyy format; or it can be in other formats as well
  $birthDate1 = $row3['birth_date'];
  $birthDate = date("m/d/Y", strtotime($birthDate1));  
  //explode the date to get month, day and year
  $birthDate = explode("/", $birthDate);
  //get age from date or birthdate
  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
    ? ((date("Y") - $birthDate[2]) - 1)
    : (date("Y") - $birthDate[2]));
  echo "Age : " . $age;
?></strong></p>
                          </div>

                          <div class="form-group">

                          <p>Gender : <strong><?php echo $row3['gender'];?></strong></p>
                          </div>

                          <div class="form-group">
                          <p>Guardian : <strong><?php echo $row3['guardian'];?></strong></p>
                          </div>
                          <div class="form-group">
                          <p>Contact Number : <strong><?php echo $row3['contact_no'];?></strong></p>
                          </div>

                          <div class="form-group">
                          <p>Adviser : <strong><?php $teacher= $row3['teacher_id'];
                          $sqlget11 = "SELECT * FROM teachers where teacher_id=$teacher";
                          $sqldata11 = mysqli_query($conn, $sqlget11) or die('Error Displaying Data'. mysqli_connect_error());
                          
                          while ($row11 = mysqli_fetch_assoc($sqldata11)) {
                            echo $row11['fname']." ".$row11['lname'];
                          }?></strong></p>
                          </div>

                          <div class="form-group">
                          <p>Address : <strong><?php echo $row3['address'];?></strong></p>
                          </div>

                          <input class="float-right button mr-3 btn-primary" type="button" value="Update" id="secondaryButton" data-toggle="modal" data-target="#info"/>
                  
        
     
           
          </div>
          <div align="left"class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Student Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="update_info.php" method="POST">
        <input type="hidden" class="form-control" name="student_id" value="<?php echo $row3['student_id'];?>"/>
        <div class="form-group"><label for="">Learners Registry Number </label><input type="text" class="form-control" name="lrn" value="<?php echo $row3['lrn'];?>" /></div>
        <div class="form-group"><label for="">First Name </label><input type="text" class="form-control" name="fname" value="<?php echo $row3['fname'];?>" /></div>
        <div class="form-group"><label for="">Middlename </label><input type="text" maxlength="1" class="form-control" name="mname" value="<?php echo $row3['mname'];?>" /></div>
        <div class="form-group"><label for="">Last Name </label><input type="text" class="form-control" name="lname" value="<?php echo $row3['lname'];?>" /></div>
        <div class="form-group"><label for="">Birth Date </label><input type="date" class="form-control" name="birth_date" value="<?php echo $row3['birth_date'];?>" /></div>
        <div class="form-group"><label for="">Guardian</label><input type="text" class="form-control" name="guardian" value="<?php echo $row3['guardian'];?>" /></div>
        <div class="form-group"><label for="">Contact Number </label><input type="text" class="form-control" name="contact_no" value="<?php echo $row3['contact_no'];?>" /></div>
        <div class="form-group"><label for="">Teacher ID </label><input type="text" class="form-control" name="teacher_id" value="<?php echo $row3['teacher_id'];?>" /></div>
        <div class="form-group"><label for="">Address</label><input type="text" class="form-control" name="address" value="<?php echo $row3['address'];?>" /></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
      </form>
    </div>
  </div>
</div>
        </div>

      </div>
    </div>




<?php }
}?>

<?php
if(isset($_GET['assessment'])){
include('../connect.php');
$lrn = $_GET['assessment'];
$sqlget = "SELECT * FROM assessment where lrn=$lrn ";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());

while ($row1 = mysqli_fetch_assoc($sqldata)) {


?>
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-12 col-xl-8">

        <div class="card" style="border-radius: 15px;">
          <div class="card-body text-center">


            <h3 class="text-center">Student Assessment</h3>
         
                            <div class="form-group">
                                            <p>Type of Assessment : <strong><?php echo $row1['t_assessment'];?></strong></p>
                              
                             
                              
                            </div>
                            <div class="form-group">
                            <p>Chronological Age : <strong><?php echo $row1['c_age'];?></strong></p>
                            
                            </div>
                            <div class="form-group">
                            
                            <p>Result : <strong><?php echo $row1['t_assessment'];?></strong></p>
                          </div>

                          <div class="form-group">
                          <p>Administrator : <strong><?php echo $row1['administrator'];?></strong></p>
                          </div>


                          <div class="form-group">

                          <p>Strenght : <strong><?php echo $row1['strenght'];?></strong></p>
                          </div>

                          <div class="form-group">
                          <p>Category : <strong><?php echo $row1['category'];?></strong></p>
                          </div>
                          </div>
                          </div>
                          </div>
                          </div>



  <?php
}
}

?>
<!--ilp-->
<?php
if(isset($_GET['ilp'])){
include('../connect.php');
$lrn = $_GET['ilp'];
$sqlget = "SELECT * FROM ilp where lrn=$lrn ";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());

while ($row1 = mysqli_fetch_assoc($sqldata)) {


?>
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-12 col-xl-8">

        <div class="card" style="border-radius: 15px;">
          <div class="card-body text-center">

      
            <embed src="../ilp/<?php echo $row1['ilp_name'];?>" width="550" height="800" 
 type="application/pdf">


            
          </div>
        </div>
      </div>
     </div>
    </div>



  <?php
}
}

?>
<!--ilp-->

<?php
if(isset($_GET['evaluation'])){
include('../connect.php');
$lrn = $_GET['evaluation'];
$sqlget12 = "SELECT DISTINCT grade FROM evaluation where lrn=$lrn";
$sqldata12 = mysqli_query($conn, $sqlget12) or die('Error Displaying Data'. mysqli_connect_error());
echo "<div class='container'><div class='row'>";
while ($row12 = mysqli_fetch_assoc($sqldata12)) {


?>
   <div class="col-md-3">
      <h6>YEAR <?php echo  $row12['grade'];?></h6>
      <a type="button"  data-toggle="modal" data-target="#grade<?php echo  $row12['grade'];?>" >
 <img src="../img/folder.png" width="200" alt="">
 </a>
  
    </div>

    <!--modal-->
    <div class="modal fade" id="grade<?php echo  $row12['grade'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><h1 class="text-align-center">Student Evaluation GRADE <?php echo $row12['grade'];?></h1></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <!--row-->
      <div class="modal-body" align="left">
          <!--row-->
      <div class="row p-5">
        
 

   <!--quarter 2-->         
   <div class="col-md-6 border">
   <?php
      $grade=$row12['grade'];
      $sqlgeteva11 = "SELECT * FROM evaluation where lrn=$lrn and grade=$grade and quarter=2 order by evaluation_id asc limit 1";
      $sqldataeva11 = mysqli_query($conn, $sqlgeteva11) or die('Error Displaying Data'. mysqli_connect_error());
      while ($eva11 = mysqli_fetch_assoc($sqldataeva11)) {
        if($eva11['teacher_id']!=0){
      ?>
<h3>Quarter I</h3>
<h5>Teacher: <input type="text" name="t_id" value="<?php echo $eva11['teacher_id'];?>" readonly></h5>
<h5>Batch Year: <input type="text" value="<?php echo $eva11['date'];?>" readonly></h5>
<?php 
}
else{
?>
<h3>Quarter I</h3>
<h5>Teacher: <input type="text" name="t_id" placeholder="teacher employee id"></h5>
<h5>Batch Year: <input type="date" name="date1" ></h5>
<?php
}
}?>

<?php
      $grade=$row12['grade'];
      $sqlgeteva1 = "SELECT * FROM evaluation where lrn=$lrn and grade=$grade and quarter=1 order by evaluation_id asc limit 6";
      $sqldataeva1 = mysqli_query($conn, $sqlgeteva1) or die('Error Displaying Data'. mysqli_connect_error());
      while ($eva1 = mysqli_fetch_assoc($sqldataeva1)) {
        ?>
<?php if($eva1['type']==1){ ?>
<p><strong> DAILY LIVING SKILLS DOMAIN:</strong> </p>
<p><strong> Strength/s: </strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name='11dlsds'></textarea> <?php } else{ echo $eva1['strenght'];}?> </u></p>
<p><strong> Need/s:</strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name='11dlsdn'></textarea> <?php } else{ echo $eva1['needs'];}?>   </u></p>


<hr>
<?php }?>
<?php if($eva1['type']==2){ ?>
<p><strong> SOCIO - EMOTIONAL DOMAIN: </strong> </p>
<p><strong> Strength/s: </strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name="11seds"></textarea> <?php } else{ echo $eva1['strenght'];}?> </u></p>
<p><strong> Need/s:</strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name="11sedn"></textarea> <?php } else{ echo $eva1['needs'];}?>   </u></p>
<hr>
<?php }?>

<?php if($eva1['type']==3){ ?>
<p><strong> LANGUAGE DEVELOPMENT DOMAIN: </strong> </p>
<p><strong> Strength/s: </strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name="11ldds"></textarea> <?php } else{ echo $eva1['strenght'];}?> </u></p>
<p><strong> Need/s:</strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name="11lddn"></textarea> <?php } else{ echo $eva1['needs'];}?>   </u></p>
<hr>
<?php }?>

<?php if($eva1['type']==4){ ?>
<p><strong> PSYCHOMOTOR DOMAIN: </strong> </p>
<p><strong> Strength/s: </strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name="11pds"></textarea> <?php } else{ echo $eva1['strenght'];}?> </u></p>
<p><strong> Need/s:</strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name="11pdn"></textarea> <?php } else{ echo $eva1['needs'];}?>   </u></p>
<hr>
<?php }?>



<?php if($eva1['type']==5){ ?>
<p><strong> COGNITIVE DOMAIN:   </strong> </p>
<p><strong> Strength/s: </strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name="11cds"></textarea> <?php } else{ echo $eva1['strenght'];}?> </u></p>
<p><strong> Need/s:</strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name="11cdn"></textarea> <?php } else{ echo $eva1['needs'];}?>   </u></p>
<hr>

<?php }?>
<?php if($eva1['type']==6){ ?>
<p><strong> BEHAVIORAL DEVELOPMENT:    </strong> </p>

<p><strong> Strength/s: </strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name="11bds"></textarea> <?php } else{ echo $eva1['strenght'];}?> </u></p>
<p><strong> Need/s:</strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text'  name="11bdn"></textarea> <?php } else{ echo $eva1['needs'];}?>   </u></p>

<?php }?>


<?php }?>



</div>

<!--quarter-->

   <!--quarter 2-->         
   <div class="col-md-6 border">
   <?php
      $grade=$row12['grade'];
      $sqlgeteva11 = "SELECT * FROM evaluation where lrn=$lrn and grade=$grade and quarter=2 order by evaluation_id asc limit 1";
      $sqldataeva11 = mysqli_query($conn, $sqlgeteva11) or die('Error Displaying Data'. mysqli_connect_error());
      while ($eva11 = mysqli_fetch_assoc($sqldataeva11)) {
        if($eva11['teacher_id']!=0){
      ?>
<h3>Quarter II</h3>
<h5>Teacher: <input type="text" name="t_id" value="<?php echo $eva11['teacher_id'];?>" readonly></h5>
<h5>Batch Year: <input type="text" value="<?php echo $eva11['date'];?>" readonly></h5>
<?php 
}
else{
?>
<h3>Quarter II</h3>
<h5>Teacher: <input type="text" name="t_id" placeholder="teacher employee id"></h5>
<h5>Batch Year: <input type="date" name="date1" ></h5>
<?php
}
}?>

<?php
      $grade=$row12['grade'];
      $sqlgeteva1 = "SELECT * FROM evaluation where lrn=$lrn and grade=$grade and quarter=2 order by evaluation_id asc limit 6";
      $sqldataeva1 = mysqli_query($conn, $sqlgeteva1) or die('Error Displaying Data'. mysqli_connect_error());
      while ($eva1 = mysqli_fetch_assoc($sqldataeva1)) {
        ?>
<?php if($eva1['type']==1){ ?>
<p><strong> DAILY LIVING SKILLS DOMAIN:</strong> </p>
<p><strong> Strength/s: </strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name='11dlsds'></textarea> <?php } else{ echo $eva1['strenght'];}?> </u></p>
<p><strong> Need/s:</strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name='11dlsdn'></textarea> <?php } else{ echo $eva1['needs'];}?>   </u></p>


<hr>
<?php }?>
<?php if($eva1['type']==2){ ?>
<p><strong> SOCIO - EMOTIONAL DOMAIN: </strong> </p>
<p><strong> Strength/s: </strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name="11seds"></textarea> <?php } else{ echo $eva1['strenght'];}?> </u></p>
<p><strong> Need/s:</strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name="11sedn"></textarea> <?php } else{ echo $eva1['needs'];}?>   </u></p>
<hr>
<?php }?>

<?php if($eva1['type']==3){ ?>
<p><strong> LANGUAGE DEVELOPMENT DOMAIN: </strong> </p>
<p><strong> Strength/s: </strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name="11ldds"></textarea> <?php } else{ echo $eva1['strenght'];}?> </u></p>
<p><strong> Need/s:</strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name="11lddn"></textarea> <?php } else{ echo $eva1['needs'];}?>   </u></p>
<hr>
<?php }?>

<?php if($eva1['type']==4){ ?>
<p><strong> PSYCHOMOTOR DOMAIN: </strong> </p>
<p><strong> Strength/s: </strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name="11pds"></textarea> <?php } else{ echo $eva1['strenght'];}?> </u></p>
<p><strong> Need/s:</strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name="11pdn"></textarea> <?php } else{ echo $eva1['needs'];}?>   </u></p>
<hr>
<?php }?>



<?php if($eva1['type']==5){ ?>
<p><strong> COGNITIVE DOMAIN:   </strong> </p>
<p><strong> Strength/s: </strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name="11cds"></textarea> <?php } else{ echo $eva1['strenght'];}?> </u></p>
<p><strong> Need/s:</strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name="11cdn"></textarea> <?php } else{ echo $eva1['needs'];}?>   </u></p>
<hr>

<?php }?>
<?php if($eva1['type']==6){ ?>
<p><strong> BEHAVIORAL DEVELOPMENT:    </strong> </p>

<p><strong> Strength/s: </strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name="11bds"></textarea> <?php } else{ echo $eva1['strenght'];}?> </u></p>
<p><strong> Need/s:</strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text'  name="11bdn"></textarea> <?php } else{ echo $eva1['needs'];}?>   </u></p>

<?php }?>


<?php }?>



</div>

<!--quarter-->

   <!--quarter 3-->         
   <div class="col-md-6 border">
   <?php
      $grade=$row12['grade'];
      $sqlgeteva11 = "SELECT * FROM evaluation where lrn=$lrn and grade=$grade and quarter=2 order by evaluation_id asc limit 1";
      $sqldataeva11 = mysqli_query($conn, $sqlgeteva11) or die('Error Displaying Data'. mysqli_connect_error());
      while ($eva11 = mysqli_fetch_assoc($sqldataeva11)) {
        if($eva11['teacher_id']!=0){
      ?>
<h3>Quarter III</h3>
<h5>Teacher: <input type="text" name="t_id" value="<?php echo $eva11['teacher_id'];?>" readonly></h5>
<h5>Batch Year: <input type="text" value="<?php echo $eva11['date'];?>" readonly></h5>
<?php 
}
else{
?>
<h3>Quarter III</h3>
<h5>Teacher: <input type="text" name="t_id" placeholder="teacher employee id"></h5>
<h5>Batch Year: <input type="date" name="date1" ></h5>
<?php
}
}?>

<?php
      $grade=$row12['grade'];
      $sqlgeteva1 = "SELECT * FROM evaluation where lrn=$lrn and grade=$grade and quarter=3 order by evaluation_id asc limit 6";
      $sqldataeva1 = mysqli_query($conn, $sqlgeteva1) or die('Error Displaying Data'. mysqli_connect_error());
      while ($eva1 = mysqli_fetch_assoc($sqldataeva1)) {
        ?>
<?php if($eva1['type']==1){ ?>
<p><strong> DAILY LIVING SKILLS DOMAIN:</strong> </p>
<p><strong> Strength/s: </strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name='11dlsds'></textarea> <?php } else{ echo $eva1['strenght'];}?> </u></p>
<p><strong> Need/s:</strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name='11dlsdn'></textarea> <?php } else{ echo $eva1['needs'];}?>   </u></p>


<hr>
<?php }?>
<?php if($eva1['type']==2){ ?>
<p><strong> SOCIO - EMOTIONAL DOMAIN: </strong> </p>
<p><strong> Strength/s: </strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name="11seds"></textarea> <?php } else{ echo $eva1['strenght'];}?> </u></p>
<p><strong> Need/s:</strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name="11sedn"></textarea> <?php } else{ echo $eva1['needs'];}?>   </u></p>
<hr>
<?php }?>

<?php if($eva1['type']==3){ ?>
<p><strong> LANGUAGE DEVELOPMENT DOMAIN: </strong> </p>
<p><strong> Strength/s: </strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name="11ldds"></textarea> <?php } else{ echo $eva1['strenght'];}?> </u></p>
<p><strong> Need/s:</strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name="11lddn"></textarea> <?php } else{ echo $eva1['needs'];}?>   </u></p>
<hr>
<?php }?>

<?php if($eva1['type']==4){ ?>
<p><strong> PSYCHOMOTOR DOMAIN: </strong> </p>
<p><strong> Strength/s: </strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name="11pds"></textarea> <?php } else{ echo $eva1['strenght'];}?> </u></p>
<p><strong> Need/s:</strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name="11pdn"></textarea> <?php } else{ echo $eva1['needs'];}?>   </u></p>
<hr>
<?php }?>



<?php if($eva1['type']==5){ ?>
<p><strong> COGNITIVE DOMAIN:   </strong> </p>
<p><strong> Strength/s: </strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name="11cds"></textarea> <?php } else{ echo $eva1['strenght'];}?> </u></p>
<p><strong> Need/s:</strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name="11cdn"></textarea> <?php } else{ echo $eva1['needs'];}?>   </u></p>
<hr>

<?php }?>
<?php if($eva1['type']==6){ ?>
<p><strong> BEHAVIORAL DEVELOPMENT:    </strong> </p>

<p><strong> Strength/s: </strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name="11bds"></textarea> <?php } else{ echo $eva1['strenght'];}?> </u></p>
<p><strong> Need/s:</strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text'  name="11bdn"></textarea> <?php } else{ echo $eva1['needs'];}?>   </u></p>

<?php }?>


<?php }?>



</div>

<!--quarter3-->

   <!--quarter 4-->         
   <div class="col-md-6 border">
   <?php
      $grade=$row12['grade'];
      $sqlgeteva11 = "SELECT * FROM evaluation where lrn=$lrn and grade=$grade and quarter=4 order by evaluation_id asc limit 1";
      $sqldataeva11 = mysqli_query($conn, $sqlgeteva11) or die('Error Displaying Data'. mysqli_connect_error());
      while ($eva11 = mysqli_fetch_assoc($sqldataeva11)) {
        if($eva11['teacher_id']!=0){
      ?>
<h3>Quarter IV</h3>
<h5>Teacher: <input type="text" name="t_id" value="<?php echo $eva11['teacher_id'];?>" readonly></h5>
<h5>Batch Year: <input type="text" value="<?php echo $eva11['date'];?>" readonly></h5>
<?php 
}
else{
?>
<h3>Quarter IV</h3>
<h5>Teacher: <input type="text" name="t_id" placeholder="teacher employee id"></h5>
<h5>Batch Year: <input type="date" name="date1" ></h5>
<?php
}
}?>

<?php
      $grade=$row12['grade'];
      $sqlgeteva1 = "SELECT * FROM evaluation where lrn=$lrn and grade=$grade and quarter=3 order by evaluation_id asc limit 6";
      $sqldataeva1 = mysqli_query($conn, $sqlgeteva1) or die('Error Displaying Data'. mysqli_connect_error());
      while ($eva1 = mysqli_fetch_assoc($sqldataeva1)) {
        ?>
<?php if($eva1['type']==1){ ?>
<p><strong> DAILY LIVING SKILLS DOMAIN:</strong> </p>
<p><strong> Strength/s: </strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name='11dlsds'></textarea> <?php } else{ echo $eva1['strenght'];}?> </u></p>
<p><strong> Need/s:</strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name='11dlsdn'></textarea> <?php } else{ echo $eva1['needs'];}?>   </u></p>


<hr>
<?php }?>
<?php if($eva1['type']==2){ ?>
<p><strong> SOCIO - EMOTIONAL DOMAIN: </strong> </p>
<p><strong> Strength/s: </strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name="11seds"></textarea> <?php } else{ echo $eva1['strenght'];}?> </u></p>
<p><strong> Need/s:</strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name="11sedn"></textarea> <?php } else{ echo $eva1['needs'];}?>   </u></p>
<hr>
<?php }?>

<?php if($eva1['type']==3){ ?>
<p><strong> LANGUAGE DEVELOPMENT DOMAIN: </strong> </p>
<p><strong> Strength/s: </strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name="11ldds"></textarea> <?php } else{ echo $eva1['strenght'];}?> </u></p>
<p><strong> Need/s:</strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name="11lddn"></textarea> <?php } else{ echo $eva1['needs'];}?>   </u></p>
<hr>
<?php }?>

<?php if($eva1['type']==4){ ?>
<p><strong> PSYCHOMOTOR DOMAIN: </strong> </p>
<p><strong> Strength/s: </strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name="11pds"></textarea> <?php } else{ echo $eva1['strenght'];}?> </u></p>
<p><strong> Need/s:</strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name="11pdn"></textarea> <?php } else{ echo $eva1['needs'];}?>   </u></p>
<hr>
<?php }?>



<?php if($eva1['type']==5){ ?>
<p><strong> COGNITIVE DOMAIN:   </strong> </p>
<p><strong> Strength/s: </strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name="11cds"></textarea> <?php } else{ echo $eva1['strenght'];}?> </u></p>
<p><strong> Need/s:</strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name="11cdn"></textarea> <?php } else{ echo $eva1['needs'];}?>   </u></p>
<hr>

<?php }?>
<?php if($eva1['type']==6){ ?>
<p><strong> BEHAVIORAL DEVELOPMENT:    </strong> </p>

<p><strong> Strength/s: </strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text' name="11bds"></textarea> <?php } else{ echo $eva1['strenght'];}?> </u></p>
<p><strong> Need/s:</strong><u ><?php if($eva1['strenght']==''){?><textarea class='form-control' placeholder='<?php  echo $eva1['needs'];?>' type='text'  name="11bdn"></textarea> <?php } else{ echo $eva1['needs'];}?>   </u></p>

<?php }?>


<?php }?>



</div>

<!--quarter4-->





     </div>
     <!--row-->
      </div>
        <!--modal body-->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      
      </div>
    </div>
  </div>
</div>

  <?php
}
echo "</div></div>";
}

?>


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