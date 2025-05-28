<?php include('../session.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Student</title>

  <?php include('../links.php');  ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mammoth/1.4.18/mammoth.browser.min.js" integrity="sha512-Z8jpnlnXO9rena5GNKiX0EHQRNLLh0LobtlTESOc55UMcQPOdxBpSMrU9MMZI1b5Xoph9bPMFbNyi9s33Du0EA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
select.selectList { width: 35px; }



</style>
<body> 
<div id="loading">
	<div  class="center">
	<img src="../img/6.gif" width="300">
	</div>
</div>

<?php include('nav1.php');  ?>

<div class="container-fluid bg-light">
    <!-- Button trigger modal -->


<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
      aria-selected="true">Student Information</a>
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
<div class="tab-content" align="center"id="myTabContent">
  <!--information tab-->
  <div class="tab-pane fade show active container" align="center" id="home" role="tabpanel" aria-labelledby="home-tab">
<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-7 bg-light p-3">
   
    <?php

include('../connect.php');
$id = $_GET['id'];
$sqlget1 = "SELECT * FROM new_student where lrn = $id";
$sqldata1 = mysqli_query($conn, $sqlget1) or die('Error Displaying Data'. mysqli_connect_error());

while ($row3 = mysqli_fetch_assoc($sqldata1)) {

?>
  <table align="left" class="table">
    <tr>
      <td>LRN:</td>
      <td><input type="number" name="lrn" class="form-control" placeholder="Student LRN" value="<?php echo $row3['lrn'];?>" readonly></td>
    </tr>
    <tr>
      <td>Student code:</td>
      <td><input type="text" name="student_code" class="form-control" placeholder="Student Code" value="<?php echo $row3['student_code'];?>" readonly></td>
    </tr>
    <tr>
      <td>Birth Date:</td>
      <td><input type="date" name="birth_date" class="form-control" placeholder="Student Birth date" value="<?php echo $row3['birth_date'];?>" readonly></td>
    </tr>
    <tr>
      <td>Birth Place:</td>
      <td><input type="text" name="birth_place" class="form-control" placeholder="Student Birth Place" value="<?php echo $row3['birth_place'];?>" readonly></td>
    </tr>
    <tr>
      <td>Gender:</td>
      <td><input type="text" class="form-control" name="gender" value="<?php echo $row3['gender'];?>" readonly></td>
    </tr>

    <tr>
      <td>Address:</td>
      <td><input type="text" name="address" class="form-control" value="<?php echo $row3['address'];?>" placeholder="Student Address" readonly></td>
    </tr>

    <tr>
      <td>Guardian Contact:</td>
      <td><input type="text" name="guardian_contact" value="<?php echo $row3['gurdian_contact'];?>" class="form-control" placeholder="Guardian Contact" readonly></td>
    </tr>
<tr>
  <td>School:</td>
  <td><input type="text" class="form-control" value="<?php echo $row3['school'];?>" readonly></td>
</tr>
    <tr>
      <td>Teacher:</td>
      <td><input type="text" class="form-control" value="<?php echo $row3['teacher'];?>" readonly></td>
    </tr>

    
    
    
  </table>

  <?php }?>
  </div>
  </div>
  </div>
  <!--information tab-->

    <!--Assessent tab-->
    <div class="tab-pane fade" id="progress" role="tabpanel" aria-labelledby="progress-tab">
        
   

        <div class="container-fluid" >
            <div class="row">
                <div>     <button type="button" class="btn btn-primary float-right m-2" data-toggle="modal" data-target="#exampleModal">
  Update Progress Report
</button></div>
       

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container-fluid" >
            <div class="row">
                <!--first-->
                <div class="col-md-6">
                <form action="update_new_student.php?id=<?php echo $_GET['id']?>" method="post" enctype="multipart/form-data">
              
                <table class="table table-bordered">
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

                   <?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=1";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {
    if($count==26){
    break;
       } 

  

?>
                   <tr><td><?php echo $row1['type'];?> </td><input type="hidden" name="1<?php echo $count;?>" value="<?php echo $row1['type'];?>">
                   <td>

                   <?php if($row1['q1']==''){?>
                    <select class="selectList" name="1<?php echo $count;?>q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select>
                <?php } else{
                    echo $row1['q1'];
                    ?>
                         <input type="hidden" name="1<?php echo $count;?>q1" value="<?php echo $row1['q1'];?>"> 
                    <?php
                }?>
           
                </td>
                <td>

                    <?php if($row1['q2']==''){?>
                    <select class="selectList" name="1<?php echo $count;?>q2" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select>
                    <?php } else{
                    echo $row1['q2'];
                    ?>
                         <input type="hidden" name="1<?php echo $count;?>q2" value="<?php echo $row1['q2'];?>"> 
                    <?php
                }?>
                    </td>

                    <td>

                    <?php if($row1['q3']==''){?>
                    <select class="selectList" name="1<?php echo $count;?>q3" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select>
                    <?php } else{
                    echo $row1['q3'];
                    ?>
                         <input type="hidden" name="1<?php echo $count;?>q3" value="<?php echo $row1['q3'];?>"> 
                    <?php
                }?>
                    </td>
                    <td>

                    <?php if($row1['q4']==''){?>
                    <select class="selectList" name="1<?php echo $count;?>q4" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select>
                    <?php } else{
                    echo $row1['q4'];
                    ?>
                         <input type="hidden" name="1<?php echo $count;?>q4" value="<?php echo $row1['q4'];?>"> 
                    <?php
                }?>
                    </td>
                </tr>

        
                <?php
             $count++;
            
        }?>
                  
                </table>

            
                </div>
                 <!--first-->

                           <!--SECOND-->
                <div class="col-md-6">
              
              <table class="table table-bordered">
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
              
                 <?php

include('../connect.php');
$id2 = $_GET['id'];
$sqlget2 = "SELECT * FROM progress_report where lrn = $id2 and progress_index=2";
$sqldata2 = mysqli_query($conn, $sqlget2) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row2 = mysqli_fetch_assoc($sqldata2)) {
    if($count==21){
    break;
       } 

  

?>
                   <tr><td><?php echo $row2['type'];?> </td><input type="hidden" name="2<?php echo $count;?>" value="<?php echo $row2['type'];?>">
                   <td>

                   <?php if($row2['q1']==''){?>
                    <select class="selectList" name="2<?php echo $count;?>q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select>
                    <?php } else{
                    echo $row2['q1'];
                    ?>
                         <input type="hidden" name="2<?php echo $count;?>q1" value="<?php echo $row2['q1'];?>"> 
                    <?php
                }?>
                </td>
                <td>

                    <?php if($row2['q2']==''){?>
                    <select class="selectList" name="2<?php echo $count;?>q2" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select>
                    <?php } else{
                    echo $row2['q2'];
                    ?>
                         <input type="hidden" name="2<?php echo $count;?>q2" value="<?php echo $row2['q2'];?>"> 
                    <?php
                }?>
                    </td>

                    <td>

                    <?php if($row2['q3']==''){?>
                    <select class="selectList" name="2<?php echo $count;?>q3" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select>
                    <?php } else{
                    echo $row2['q3'];
                    ?>
                         <input type="hidden" name="2<?php echo $count;?>q3" value="<?php echo $row2['q3'];?>"> 
                    <?php
                }?>
                    </td>
                    <td>

                    <?php if($row2['q4']==''){?>
                    <select class="selectList" name="2<?php echo $count;?>q4" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select>
                    <?php } else{
                    echo $row2['q4'];
                    ?>
                         <input type="hidden" name="2<?php echo $count;?>q4" value="<?php echo $row2['q4'];?>"> 
                    <?php
                }?>
                    </td>
                </tr>

        
                <?php
             $count++;
            
        }?>
                  
                
                 

              </table>
              </div>
               <!--SECOND-->
               
                 <!--THIRD-->
                 <div class="col-md-6">
              
              <table class="table table-bordered">
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
                <?php

include('../connect.php');
$id2 = $_GET['id'];
$sqlget3 = "SELECT * FROM progress_report where lrn = $id2 and progress_index=3";
$sqldata3 = mysqli_query($conn, $sqlget3) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row13 = mysqli_fetch_assoc($sqldata3)) {
    if($count==19){
    break;
       } 

  

?>
                   <tr><td><?php echo $row13['type'];?> </td><input type="hidden" name="3<?php echo $count;?>" value="<?php echo $row13['type'];?>">
                   <td>

                   <?php if($row13['q1']==''){?>
                    <select class="selectList" name="3<?php echo $count;?>q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select>
                    <?php } else{
                    echo $row13['q1'];
                    ?>
                         <input type="hidden" name="3<?php echo $count;?>q1" value="<?php echo $row13['q1'];?>"> 
                    <?php
                }?>
                </td>
                <td>

                    <?php if($row13['q2']==''){?>
                    <select class="selectList" name="3<?php echo $count;?>q2" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select>
                    <?php } else{
                    echo $row13['q2'];
                    ?>
                         <input type="hidden" name="3<?php echo $count;?>q2" value="<?php echo $row13['q2'];?>"> 
                    <?php
                }?>
                    </td>

                    <td>

                    <?php if($row13['q3']==''){?>
                    <select class="selectList" name="3<?php echo $count;?>q3" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select>
                    <?php } else{
                    echo $row13['q3'];
                    ?>
                         <input type="hidden" name="3<?php echo $count;?>q3" value="<?php echo $row13['q3'];?>"> 
                    <?php
                }?>
                    </td>
                    <td>

                    <?php if($row13['q4']==''){?>
                    <select class="selectList" name="3<?php echo $count;?>q4" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select>
                    <?php } else{
                    echo $row13['q4'];
                    ?>
                         <input type="hidden" name="3<?php echo $count;?>q4" value="<?php echo $row13['q4'];?>"> 
                    <?php
                }?>
                    </td>
                </tr>

        
                <?php
             $count++;
            
        }?>
                
                
                 

              </table>
              </div>
               <!--THIRD-->
               

                 <!--FOURTH-->
                 <div class="col-md-6">
              
              <table class="table table-bordered">
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
                 <?php

include('../connect.php');
$id2 = $_GET['id'];
$sqlget4 = "SELECT * FROM progress_report where lrn = $id2 and progress_index=4";
$sqldata4 = mysqli_query($conn, $sqlget4) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row4 = mysqli_fetch_assoc($sqldata4)) {
    if($count==24){
    break;
       } 

  

?>
                   <tr><td><?php echo $row4['type'];?> </td><input type="hidden" name="4<?php echo $count;?>" value="<?php echo $row4['type'];?>">
                   <td>

                   <?php if($row4['q1']==''){?>
                    <select class="selectList" name="4<?php echo $count;?>q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select>
                    <?php } else{
                    echo $row4['q1'];
                    ?>
                         <input type="hidden" name="4<?php echo $count;?>q1" value="<?php echo $row4['q1'];?>"> 
                    <?php
                }?>
                </td>
                <td>

                    <?php if($row4['q2']==''){?>
                    <select class="selectList" name="4<?php echo $count;?>q2" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select>
                    <?php } else{
                    echo $row4['q2'];
                    ?>
                         <input type="hidden" name="4<?php echo $count;?>q2" value="<?php echo $row4['q2'];?>"> 
                    <?php
                }?>
                    </td>

                    <td>

                    <?php if($row4['q3']==''){?>
                    <select class="selectList" name="4<?php echo $count;?>q3" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select>
                    <?php } else{
                    echo $row4['q3'];
                    ?>
                         <input type="hidden" name="4<?php echo $count;?>q3" value="<?php echo $row4['q3'];?>"> 
                    <?php
                }?>
                    </td>
                    <td>

                    <?php if($row4['q4']==''){?>
                    <select class="selectList" name="4<?php echo $count;?>q4" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select>
                    <?php } else{
                    echo $row4['q4'];
                    ?>
                         <input type="hidden" name="4<?php echo $count;?>q4" value="<?php echo $row4['q4'];?>"> 
                    <?php
                }?>
                    </td>
                </tr>

        
                <?php
             $count++;
            
        }?>
                
                
              </table>
              </div>
               <!--FOURTH-->

                     <!--FIFTH-->
                     <div class="col-md-6">
              
              <table class="table table-bordered">
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
        
                 <?php

include('../connect.php');
$id2 = $_GET['id'];
$sqlget5 = "SELECT * FROM progress_report where lrn = $id2 and progress_index=5";
$sqldata5 = mysqli_query($conn, $sqlget5) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row5 = mysqli_fetch_assoc($sqldata5)) {
    if($count==24){
    break;
       } 

  

?>
                   <tr><td><?php echo $row5['type'];?> <input type="hidden" name="5<?php echo $count;?>" value="<?php echo $row5['type'];?>">
                   <td>

                   <?php if($row5['q1']==''){?>
                    <select class="selectList" name="5<?php echo $count;?>q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select>
                    <?php } else{
                    echo $row5['q1'];
                    ?>
                         <input type="hidden" name="5<?php echo $count;?>q1" value="<?php echo $row5['q1'];?>"> 
                    <?php
                }?>
                </td>
                <td>

                    <?php if($row5['q2']==''){?>
                    <select class="selectList" name="5<?php echo $count;?>q2" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select>
                    <?php } else{
                    echo $row5['q2'];
                    ?>
                         <input type="hidden" name="5<?php echo $count;?>q2" value="<?php echo $row5['q2'];?>"> 
                    <?php
                }?>
                    </td>

                    <td>

                    <?php if($row5['q3']==''){?>
                    <select class="selectList" name="5<?php echo $count;?>q3" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select>
                    <?php } else{
                    echo $row5['q3'];
                    ?>
                         <input type="hidden" name="5<?php echo $count;?>q3" value="<?php echo $row5['q3'];?>"> 
                    <?php
                }?>
                    </td>
                    <td>

                    <?php if($row5['q4']==''){?>
                    <select class="selectList" name="5<?php echo $count;?>q4" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select>
                    <?php } else{
                    echo $row5['q4'];
                    ?>
                         <input type="hidden" name="5<?php echo $count;?>q4" value="<?php echo $row5['q4'];?>"> 
                    <?php
                }?>
                    </td>
                </tr>

        
                <?php
             $count++;
            
        }?>
             


                
                
              </table>
              </div>
               <!--FIFTH-->

                            <!--SIX-->
                            <div class="col-md-6">
              
              <table class="table table-bordered">
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
        
                 <?php

include('../connect.php');
$id2 = $_GET['id'];
$sqlget6 = "SELECT * FROM progress_report where lrn = $id2 and progress_index=6";
$sqldata6 = mysqli_query($conn, $sqlget6) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row6 = mysqli_fetch_assoc($sqldata6)) {
    if($count==24){
    break;
       } 

  

?>
                   <tr><td><?php echo $row6['type'];?> </td><input type="hidden" name="6<?php echo $count;?>" value="<?php echo $row6['type'];?>">
                   <td>

                   <?php if($row6['q1']==''){?>
                    <select class="selectList" name="6<?php echo $count;?>q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select>
                    <?php } else{
                    echo $row6['q1'];
                    ?>
                         <input type="hidden" name="6<?php echo $count;?>q1" value="<?php echo $row6['q1'];?>"> 
                    <?php
                }?>
                </td>
                <td>

                    <?php if($row6['q2']==''){?>
                    <select class="selectList" name="6<?php echo $count;?>q2" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select>
                    <?php } else{
                    echo $row6['q2'];
                    ?>
                         <input type="hidden" name="6<?php echo $count;?>q2" value="<?php echo $row6['q2'];?>"> 
                    <?php
                }?>
                    </td>

                    <td>

                    <?php if($row6['q3']==''){?>
                    <select class="selectList" name="6<?php echo $count;?>q3" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select>
                    <?php } else{
                    echo $row6['q3'];
                    ?>
                         <input type="hidden" name="6<?php echo $count;?>q3" value="<?php echo $row6['q3'];?>"> 
                    <?php
                }?>
                    </td>
                    <td>

                    <?php if($row6['q4']==''){?>
                    <select class="selectList" name="6<?php echo $count;?>q4" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select>
                    <?php } else{
                    echo $row6['q4'];
                    ?>
                         <input type="hidden" name="6<?php echo $count;?>q4" value="<?php echo $row6['q4'];?>"> 
                    <?php
                }?>
                    </td>
                </tr>

        
                <?php
             $count++;
            
        }?>

             

             


                
                
              </table>
              </div>
               <!--SIXTH-->
<hr>
               <!--teacher remarks-->
               <div class="col-md-4">
TEACHERS REMARK
<?php

include('../connect.php');
$id2 = $_GET['id'];
$sqlget51 = "SELECT * FROM teachers_remark where lrn = $id2 ";
$sqldata51 = mysqli_query($conn, $sqlget51) or die('Error Displaying Data'. mysqli_connect_error());
while ($row51 = mysqli_fetch_assoc($sqldata51)) {
 

  

?>
               <table class="table">
                <tr>
                    <th>QUARTER</th>
                    <th>REMARKS</th>
                </tr>
                <tr>
                    <td>1st</td>
                    <td>    <?php if($row51['remark_q1']==''){?>
                        <input type="text" name="tq1" id="">
                    <?php } else{
                    echo $row51['remark_q1'];}
                    ?></td>
                </tr>
                <tr>
                    <td>2nd</td>
                    <td><?php if($row51['remark_q2']==''){?>
                        <input type="text" name="tq2" id="">
                    <?php } else{
                    echo $row51['remark_q2'];}
                    ?></td>
                </tr>
                <tr>
                    <td>3rd</td>
                    <td><?php if($row51['remark_q3']==''){?>
                        <input type="text" name="tq3" id="">
                    <?php } else{
                    echo $row51['remark_q3'];}
                    ?></td>
                </tr>
                <tr>
                    <td>4th</td>
                    <td><?php if($row51['remark_q4']==''){?>
                        <input type="text" name="tq4" id="">
                    <?php } else{
                    echo $row51['remark_q4'];}
                    ?></td>
                </tr>
               </table>

               <?php }?>

               </div>
               <!--teacher remarks-->
               
            </div>
        </div>
      </div>
   
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
                <!--first-->
                <div class="col-md-4">
              
                <table class="table table-bordered">
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

                   <?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=1";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {
    if($count==26){
    break;
       } 

  

?>
                   <tr><td><?php echo $row1['type'];?> </td><input type="hidden" name="1<?php echo $count;?>" value="<?php echo $row1['type'];?>">
                   <td>

                   <?php if($row1['q1']==''){?>
                    
                <?php } else{
                    echo $row1['q1'];
                    ?>
                         <input type="hidden" name="1<?php echo $count;?>q1" value="<?php echo $row1['q1'];?>"> 
                    <?php
                }?>
           
                </td>
                <td>

                    <?php if($row1['q2']==''){?>
                   
                    <?php } else{
                    echo $row1['q2'];
                    ?>
                         <input type="hidden" name="1<?php echo $count;?>q2" value="<?php echo $row1['q2'];?>"> 
                    <?php
                }?>
                    </td>

                    <td>

                    <?php if($row1['q3']==''){?>
                 
                    <?php } else{
                    echo $row1['q3'];
                    ?>
                         <input type="hidden" name="1<?php echo $count;?>q3" value="<?php echo $row1['q3'];?>"> 
                    <?php
                }?>
                    </td>
                    <td>

                    <?php if($row1['q4']==''){?>
                  
                    <?php } else{
                    echo $row1['q4'];
                    ?>
                         <input type="hidden" name="1<?php echo $count;?>q4" value="<?php echo $row1['q4'];?>"> 
                    <?php
                }?>
                    </td>
                </tr>

        
                <?php
             $count++;
            
        }?>
                  
                </table>

            
                </div>
                 <!--first-->

                           <!--SECOND-->
                <div class="col-md-4">
              
              <table class="table table-bordered">
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
              
                 <?php

include('../connect.php');
$id2 = $_GET['id'];
$sqlget2 = "SELECT * FROM progress_report where lrn = $id2 and progress_index=2";
$sqldata2 = mysqli_query($conn, $sqlget2) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row2 = mysqli_fetch_assoc($sqldata2)) {
    if($count==21){
    break;
       } 

  

?>
                   <tr><td><?php echo $row2['type'];?> </td><input type="hidden" name="2<?php echo $count;?>" value="<?php echo $row2['type'];?>">
                   <td>

                   <?php if($row2['q1']==''){?>
                 
                    <?php } else{
                    echo $row2['q1'];
                    ?>
                         <input type="hidden" name="2<?php echo $count;?>q1" value="<?php echo $row2['q1'];?>"> 
                    <?php
                }?>
                </td>
                <td>

                    <?php if($row2['q2']==''){?>
                   
                    <?php } else{
                    echo $row2['q2'];
                    ?>
                         <input type="hidden" name="2<?php echo $count;?>q2" value="<?php echo $row2['q2'];?>"> 
                    <?php
                }?>
                    </td>

                    <td>

                    <?php if($row2['q3']==''){?>
                  
                    <?php } else{
                    echo $row2['q3'];
                    ?>
                         <input type="hidden" name="2<?php echo $count;?>q3" value="<?php echo $row2['q3'];?>"> 
                    <?php
                }?>
                    </td>
                    <td>

                    <?php if($row2['q4']==''){?>
                  
                    <?php } else{
                    echo $row2['q4'];
                    ?>
                         <input type="hidden" name="2<?php echo $count;?>q4" value="<?php echo $row2['q4'];?>"> 
                    <?php
                }?>
                    </td>
                </tr>

        
                <?php
             $count++;
            
        }?>
                  
                
                 

              </table>
              </div>
               <!--SECOND-->
               
                 <!--THIRD-->
                 <div class="col-md-4">
              
              <table class="table table-bordered">
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
                <?php

include('../connect.php');
$id2 = $_GET['id'];
$sqlget3 = "SELECT * FROM progress_report where lrn = $id2 and progress_index=3";
$sqldata3 = mysqli_query($conn, $sqlget3) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row13 = mysqli_fetch_assoc($sqldata3)) {
    if($count==19){
    break;
       } 

  

?>
                   <tr><td><?php echo $row13['type'];?> </td><input type="hidden" name="3<?php echo $count;?>" value="<?php echo $row13['type'];?>">
                   <td>

                   <?php if($row13['q1']==''){?>
                   
                    <?php } else{
                    echo $row13['q1'];
                    ?>
                         <input type="hidden" name="3<?php echo $count;?>q1" value="<?php echo $row13['q1'];?>"> 
                    <?php
                }?>
                </td>
                <td>

                    <?php if($row13['q2']==''){?>
                   
                    <?php } else{
                    echo $row13['q2'];
                    ?>
                         <input type="hidden" name="3<?php echo $count;?>q2" value="<?php echo $row13['q2'];?>"> 
                    <?php
                }?>
                    </td>

                    <td>

                    <?php if($row13['q3']==''){?>
                  
                    <?php } else{
                    echo $row13['q3'];
                    ?>
                         <input type="hidden" name="3<?php echo $count;?>q3" value="<?php echo $row13['q3'];?>"> 
                    <?php
                }?>
                    </td>
                    <td>

                    <?php if($row13['q4']==''){?>
                   
                    <?php } else{
                    echo $row13['q4'];
                    ?>
                         <input type="hidden" name="3<?php echo $count;?>q4" value="<?php echo $row13['q4'];?>"> 
                    <?php
                }?>
                    </td>
                </tr>

        
                <?php
             $count++;
            
        }?>
                
                
                 

              </table>
              </div>
               <!--THIRD-->
               <hr>

                 <!--FOURTH-->
                 <div class="col-md-4">
              
              <table class="table table-bordered">
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
                 <?php

include('../connect.php');
$id2 = $_GET['id'];
$sqlget4 = "SELECT * FROM progress_report where lrn = $id2 and progress_index=4";
$sqldata4 = mysqli_query($conn, $sqlget4) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row4 = mysqli_fetch_assoc($sqldata4)) {
    if($count==24){
    break;
       } 

  

?>
                   <tr><td><?php echo $row4['type'];?> </td><input type="hidden" name="4<?php echo $count;?>" value="<?php echo $row4['type'];?>">
                   <td>

                   <?php if($row4['q1']==''){?>
                  
                    <?php } else{
                    echo $row4['q1'];
                    ?>
                         <input type="hidden" name="4<?php echo $count;?>q1" value="<?php echo $row4['q1'];?>"> 
                    <?php
                }?>
                </td>
                <td>

                    <?php if($row4['q2']==''){?>
                  
                    <?php } else{
                    echo $row4['q2'];
                    ?>
                         <input type="hidden" name="4<?php echo $count;?>q2" value="<?php echo $row4['q2'];?>"> 
                    <?php
                }?>
                    </td>

                    <td>

                    <?php if($row4['q3']==''){?>
                  
                    <?php } else{
                    echo $row4['q3'];
                    ?>
                         <input type="hidden" name="4<?php echo $count;?>q3" value="<?php echo $row4['q3'];?>"> 
                    <?php
                }?>
                    </td>
                    <td>

                    <?php if($row4['q4']==''){?>
                   
                    <?php } else{
                    echo $row4['q4'];
                    ?>
                         <input type="hidden" name="4<?php echo $count;?>q4" value="<?php echo $row4['q4'];?>"> 
                    <?php
                }?>
                    </td>
                </tr>

        
                <?php
             $count++;
            
        }?>
                
                
              </table>
              </div>
               <!--FOURTH-->

                     <!--FIFTH-->
                     <div class="col-md-4">
              
              <table class="table table-bordered">
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
        
                 <?php

include('../connect.php');
$id2 = $_GET['id'];
$sqlget5 = "SELECT * FROM progress_report where lrn = $id2 and progress_index=5";
$sqldata5 = mysqli_query($conn, $sqlget5) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row5 = mysqli_fetch_assoc($sqldata5)) {
    if($count==24){
    break;
       } 

  

?>
                   <tr><td><?php echo $row5['type'];?> <input type="hidden" name="5<?php echo $count;?>" value="<?php echo $row5['type'];?>">
                   <td>

                   <?php if($row5['q1']==''){?>
                   
                    <?php } else{
                    echo $row5['q1'];
                    ?>
                         <input type="hidden" name="5<?php echo $count;?>q1" value="<?php echo $row5['q1'];?>"> 
                    <?php
                }?>
                </td>
                <td>

                    <?php if($row5['q2']==''){?>
                  
                    <?php } else{
                    echo $row5['q2'];
                    ?>
                         <input type="hidden" name="5<?php echo $count;?>q2" value="<?php echo $row5['q2'];?>"> 
                    <?php
                }?>
                    </td>

                    <td>

                    <?php if($row5['q3']==''){?>
                  
                    <?php } else{
                    echo $row5['q3'];
                    ?>
                         <input type="hidden" name="5<?php echo $count;?>q3" value="<?php echo $row5['q3'];?>"> 
                    <?php
                }?>
                    </td>
                    <td>

                    <?php if($row5['q4']==''){?>
                   
                    <?php } else{
                    echo $row5['q4'];
                    ?>
                         <input type="hidden" name="5<?php echo $count;?>q4" value="<?php echo $row5['q4'];?>"> 
                    <?php
                }?>
                    </td>
                </tr>

        
                <?php
             $count++;
            
        }?>
             


                
                
              </table>
              </div>
               <!--FIFTH-->

                            <!--SIX-->
                            <div class="col-md-4">
              
              <table class="table table-bordered">
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
        
                 <?php

include('../connect.php');
$id2 = $_GET['id'];
$sqlget6 = "SELECT * FROM progress_report where lrn = $id2 and progress_index=6";
$sqldata6 = mysqli_query($conn, $sqlget6) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row6 = mysqli_fetch_assoc($sqldata6)) {
    if($count==24){
    break;
       } 

  

?>
                   <tr><td><?php echo $row6['type'];?> </td><input type="hidden" name="6<?php echo $count;?>" value="<?php echo $row6['type'];?>">
                   <td>

                   <?php if($row6['q1']==''){?>
                  
                    <?php } else{
                    echo $row6['q1'];
                    ?>
                         <input type="hidden" name="6<?php echo $count;?>q1" value="<?php echo $row6['q1'];?>"> 
                    <?php
                }?>
                </td>
                <td>

                    <?php if($row6['q2']==''){?>
                
                    <?php } else{
                    echo $row6['q2'];
                    ?>
                         <input type="hidden" name="6<?php echo $count;?>q2" value="<?php echo $row6['q2'];?>"> 
                    <?php
                }?>
                    </td>

                    <td>

                    <?php if($row6['q3']==''){?>
              
                    <?php } else{
                    echo $row6['q3'];
                    ?>
                         <input type="hidden" name="6<?php echo $count;?>q3" value="<?php echo $row6['q3'];?>"> 
                    <?php
                }?>
                    </td>
                    <td>

                    <?php if($row6['q4']==''){?>
                  
                    <?php } else{
                    echo $row6['q4'];
                    ?>
                         <input type="hidden" name="6<?php echo $count;?>q4" value="<?php echo $row6['q4'];?>"> 
                    <?php
                }?>
                    </td>
                </tr>

        
                <?php
             $count++;
            
        }?>

             

             


                
                
              </table>
              </div>
               <!--SIXTH-->
<hr>
               <!--teacher remarks-->
               <div class="col-md-4">
TEACHERS REMARK
               <table class="table">
                <tr>
                    <th>QUARTER</th>
                    <th>REMARKS</th>
                </tr>
                <tr>
                    <td>1st</td>
                    <td><input type="text" name="tq1" id=""></td>
                </tr>
                <tr>
                    <td>2nd</td>
                    <td><input type="text" name="tq2" id=""></td>
                </tr>
                <tr>
                    <td>3rd</td>
                    <td><input type="text" name="tq3" id=""></td>
                </tr>
                <tr>
                    <td>4th</td>
                    <td><input type="text" name="tq4" id=""></td>
                </tr>
               </table>

               </div>
               <!--teacher remarks-->
               
            </div>
        </div>



  </div>
<!--Assessment tab-->

  <!--Assessent tab-->
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

  <div class="container">
    <div class="row">
        <!-- Button trigger modal -->
<div><button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#a1">
 Upload Student File
</button></div>

<!-- Modal -->
<div class="modal fade" id="a1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Student File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action=""></form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


  
  <?php

include('../connect.php');
$id2 = $_GET['id'];
$sqlget7 = "SELECT * FROM student_files where lrn = $id2";
$sqldata7 = mysqli_query($conn, $sqlget7) or die('Error Displaying Data'. mysqli_connect_error());

while ($row7 = mysqli_fetch_assoc($sqldata7)) {
 
?>

<div class="col-md-2" align="center">
  <p><?php echo $row7['file_type']?></p>
  <a href="../ilp/<?php echo $row7['file_name'];?>"> <img class="img-fluid" src="../img/pdf.png" width="100" alt=""></a>
 
</div>

<?php }?>
</div>
</div>
  </div>
<!--Assessment tab-->






</div>


</div>

</div>
</body>
<script src="../js/tab.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<!-- Javascript code -->
<script>
    $("body").on("change", "#file", function(e){
        parseWordDocxFile(e.target.files, '#docPreview');
    });

    function parseWordDocxFile(inputElement, showDiv) {
        var files = inputElement || [];
        if (!files.length) return;
        var file = files[0];
        console.time();
        var reader = new FileReader();
        reader.onloadend = function(event) {

            var arrayBuffer = reader.result;
            mammoth.convertToHtml({arrayBuffer: arrayBuffer}).then(function (resultObject) {
                console.log(resultObject.value);
                $(showDiv).html(resultObject.value);
                console.log(resultObject.value);
            })
            console.timeEnd();
            mammoth.extractRawText({arrayBuffer: arrayBuffer}).then(function (resultObject) {
                result2.innerHTML = resultObject.value;
                console.log(resultObject.value);
            })

            mammoth.convertToMarkdown({arrayBuffer: arrayBuffer}).then(function (resultObject) {
                result3.innerHTML = resultObject.value;
                console.log(resultObject.value);
            })
        };
        reader.readAsArrayBuffer(file);
    }
</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
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
<script>
  function PreviewImage() {
    pdffile=document.getElementById("uploadPDF").files[0];
    pdffile_url=URL.createObjectURL(pdffile);
    $('#viewer').attr('src',pdffile_url);
}
</script>
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>

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
 
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
if(isset($_GET['delete'])){

  echo "<script>swal('File Successfuly Retrieve', 'The selected file has been retrieve and restored to the student folder', 'success');</script>";

}
?>
</html>