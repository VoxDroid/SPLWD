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

<body id="page-top">

<?php include('nav.php');?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center  mb-4">
                        <a href="folders.php" class="btn btn-primary mr-3" data-toggle="tooltip" data-placement="top" title="Back to folders"><i class="fas fa-arrow-left "></i></a>
                        <h1 class="h3 mb-0 text-gray-800">Student File</h1>
                    </div>
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
      <td><input type="number" name="lrn" class="form-control" placeholder="Student LRN" value="<?php $_SESSION['lrn']=$row3['lrn']; echo $row3['lrn'];?>" readonly></td>
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
                <div class="col-md-12">     <button type="button" class="btn btn-primary float-right m-2" data-toggle="modal" data-target="#exampleModal">
  Update Progress Report
</button></div>
       

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update progress Report</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container-fluid" >
            <div class="row">
                  <!--teacher remarks-->
                 <div class="col-md-5"> <img src="../img/legend.jpg" class="img-fluid"> </div>

               <div class="col-md-7">
TEACHERS REMARK
<?php

include('../connect.php');
$id2 = $_GET['id'];
$sqlget51 = "SELECT * FROM teachers_remark where lrn = $id2 ";
$sqldata51 = mysqli_query($conn, $sqlget51) or die('Error Displaying Data'. mysqli_connect_error());
while ($row51 = mysqli_fetch_assoc($sqldata51)) {
 
?>
               <table   class="table">
                <tr>
                    <th>QUARTER</th>
                    <th>REMARKS</th>
                </tr>
                <input type="hidden" name="remark_id" value="<?php echo $row51['remark_id'];?>">
                <tr>
                    <td>1st</td>
                    <td>    <?php if($row51['remark_q1']==''){?>
                        <input type="text" name="tq1" id="">
                    <?php } else{
                    echo $row51['remark_q1'];
                   
                
                
                }
                    ?> <input type="hidden" name="tq1" value="<?php echo $row51['remark_q1'];?>"></td>
                </tr>
                <tr>
                    <td>2nd</td>
                    <td><?php if($row51['remark_q2']==''){?>
                        <input type="text" name="tq2" id="">
                    <?php } else{
                    echo $row51['remark_q2'];}
                    ?><input type="hidden" name="tq2" value="<?php echo $row51['remark_q2'];?>"></td>
                </tr>
                <tr>
                    <td>3rd</td>
                    <td><?php if($row51['remark_q3']==''){?>
                        <input type="text" name="tq3" id="">
                    <?php } else{
                    echo $row51['remark_q3'];}
                    ?><input type="hidden" name="tq3" value="<?php echo $row51['remark_q3'];?>"></td>
                </tr>
                <tr>
                    <td>4th</td>
                    <td><?php if($row51['remark_q4']==''){?>
                        <input type="text" name="tq4" id="">
                    <?php } else{
                    echo $row51['remark_q4'];}
                    ?><input type="hidden" name="tq4" value="<?php echo $row51['remark_q4'];?>"></td>
                </tr>
               </table>

               <?php }?>

               </div>
               <!--teacher remarks-->
                <!--first-->
                <div class="col-md-6">
                <form action="update_new_student.php?id=<?php echo $_GET['id']?>" method="post" enctype="multipart/form-data">
              
                <table   class="table table-bordered">
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
              
              <table   class="table table-bordered">
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
              
              <table   class="table table-bordered">
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
              
              <table   class="table table-bordered">
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
              
              <table   class="table table-bordered">
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
              
              <table   class="table table-bordered">
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

<div class="col-md-12" align="center">
TEACHERS REMARK
<?php 
$id123 = $_GET['id'];
$sqlget123 = "SELECT * FROM teachers_remark where lrn = $id123";
$sqldata123 = mysqli_query($conn, $sqlget123) or die('Error Displaying Data'. mysqli_connect_error());

while ($row123 = mysqli_fetch_assoc($sqldata123)) {
?>
<div class="row" align="center">
    <div class="col-md-3"> <img src="../img/legend.jpg" class="img-fluid"> </div>
    <div class="col-md-7">
               <table class="table" style="text-align:center;">
                <tr>
                    <th>QUARTER</th>
                    <th>REMARKS</th>
                </tr>

                <input type="hidden" name="remark_id" value="<?php echo $row123['remark_id'];?>">
                <tr>
                    <td>1st</td>
                    <td><?php echo $row123['remark_q1'];?></td>
                </tr>
                <tr>
                    <td>2nd</td>
                    <td><?php echo $row123['remark_q2'];?></td>
                </tr>
                <tr>
                    <td>3rd</td>
                    <td><?php echo $row123['remark_q3'];?></td>
                </tr>
                <tr>
                    <td>4th</td>
                    <td><?php echo $row123['remark_q4'];?></td>
                </tr>
               </table>
               </div>
               </div>
               <?php }?>

               </div>


                <!--first-->
                <div class="col-md-12 col-lg-6 col-xl-4">
              
                <table style="font-size:12px;"  class="table table-bordered">
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
                <div class="col-md-12 col-lg-6 col-xl-4">
              
              <table style="font-size:12px;"  class="table table-bordered">
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
                 <div class="col-md-12 col-lg-6 col-xl-4">
              
              <table style="font-size:12px;"  class="table table-bordered">
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
                 <div class="col-md-12 col-lg-6 col-xl-4">
              
              <table style="font-size:12px;"  class="table table-bordered">
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
                     <div class="col-md-12 col-lg-6 col-xl-4">
              
              <table style="font-size:12px;"  class="table table-bordered">
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
                            <div class="col-md-12 col-lg-6 col-xl-4">
              
              <table style="font-size:12px;"  class="table table-bordered">
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

               
            </div>
        </div>



  </div>
<!--Assessment tab-->

  <!--Assessent tab-->
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

  <div class="container">
    <div class="row">
        <!-- Button trigger modal -->
<div class="col-md-12"><button type="button" class="btn btn-primary float-right mb-5 mt-2" data-toggle="modal" data-target="#a1">
 Upload Student File
</button></div>

<!-- Modal -->
<div class="modal fade" id="a1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Student File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="upload_file.php?id=<?php echo $_SESSION['lrn']?>"  method="POST" enctype="multipart/form-data">

      <table class="table p-3">
    <tr>
        <th>File type</th>
        <th>Year</th>
        <th>Description</th>
        <th>Action</th>
    </tr>
    <tr>
        <td>INDIVIDUALIZED EDUCATION PLAN</td><input type="hidden" value="INDIVIDUALIZED EDUCATION PLAN" name="type1"></td>
        <td><input type="number" class="form-control" name="year1" max="2030" min="2010"></td>
        <td><input type="text" name="des1" class="form-control"></td>

        <td>
            
            <input id="uploadPDF1" onchange="showname()" type="file" name="fileToUpload1"/>
        </td>
        
    </tr>
    <tr>
        <td>INDIVIDUAL LEARNERS PLAN</td><input type="hidden" value="INDIVIDUAL LEARNERS PLAN" name="type2"></td>
        <td><input type="number" class="form-control" name="year2" max="2030" min="2010"></td>
        <td><input type="text" name="des2" class="form-control"></td>

        <td>
           
            <input id="uploadPDF2" onchange="showname1()" type="file" name="fileToUpload2"/>
        </td>
        
    </tr>
    <tr>
        <td>INDIVIDUAL LEARNING MONITORING PLAN</td><input type="hidden" value="INDIVIDUAL LEARNING MONITORING PLAN" name="type3"></td>
        <td><input type="number" class="form-control" name="year3" max="2030" min="2010"></td>
        <td><input type="text" name="des3" class="form-control"></td>
        <td>
           
            <input id="uploadPDF3" onchange="showname2()" type="file" name="fileToUpload3"/>
        </td>
        
    </tr>
    <tr>
        <td>BEHAVIOR INTERVENTION REPORT</td><input type="hidden" value="BEHAVIOR INTERVENTION REPORT" name="type4"></td>
        <td><input type="number" class="form-control" name="year4" max="2030" min="2010"></td>
        <td><input type="text" name="des4" class="form-control"></td>
        <td>
          
            <input id="uploadPDF4" onchange="showname3()" type="file" name="fileToUpload4"/>
        </td>
        
    </tr>
    <tr><td colspan="3"></td></tr>
  </table>

        
    
        
      </div>
      <div class="modal-footer">
    
      <input type="submit" value="ADD STUDENT" class="btn btn-primary float-right" name="submit">
        </form>
      </div>
    </div>
  </div>
</div>


  
  <?php

include('../connect.php');
$id2 = $_GET['id'];
$sqlget7 = "SELECT * FROM student_files where lrn = $id2 and status != 'archive' ";
$sqldata7 = mysqli_query($conn, $sqlget7) or die('Error Displaying Data'. mysqli_connect_error());

while ($row7 = mysqli_fetch_assoc($sqldata7)) {
 
?>



<div class="col-md-3" align="center" style="position: relative; ">
  <p><?php echo $row7['file_type'];?></p>
<img class="img-fluid" src="../img/pdf.png" width="100" alt="" style="display: block;" data-toggle="tooltip" data-placement="left" title="<?php echo $row7['description'].'-'.$row7['date'];?>">

<a type="button"  data-toggle="modal" data-target="#e<?php echo $row7['student_files']; ?>"><i class='fas fa-trash' style='color:red; position: absolute; margin-left:-20px; margin-top: -42px;'></i></a> <a href="../ilp/<?php echo $row7['file_name']?>"><i class='fas fa-eye' style='color:green; position: absolute; margin-left:10px; margin-top: -25px;'></i></a>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="e<?php echo $row7['student_files']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to Delete this File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" align="right">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
        <a href="delete_file.php?id=<?php echo $row7['student_files'];?>" class="btn btn-danger">YES</a>
      </div>
   
    </div>
  </div>
</div> 

</div>

<?php }?>
</div>
</div>
  </div>
<!--Assessment tab-->






</div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer footer bg-white">
                <div class="container my-auto">
                    <div class="copyright">
                        <span style="margin-left:-300px ;">Copyright &copy; BW09 2022-2023</span>
                    </div>
                </div>
            </footer>
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

<?php
if(isset($_GET['delete'])){

  echo "<script>swal('File has been deleted', 'The selected file has been deleted and moved to the student archive files', 'info');</script>";

}
?>

</body>

</html>