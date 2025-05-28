<?php include('../session.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Profile</title>

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



</style>
<body>

<?php include('nav1.php');  ?>





<div class="container">
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#page1" role="tab" aria-controls="home"
      aria-selected="true">Student Information</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#page2" role="tab" aria-controls="assessment"
      aria-selected="false">Assessment</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#page3" role="tab" aria-controls="contact"
      aria-selected="false">Evaluation</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab1" data-toggle="tab" href="#page4" role="tab" aria-controls="contact"
      aria-selected="false">IEP/ILP</a>
  </li>
</ul>
<form  method="post" enctype="multipart/form-data">

    <div class="row">

    <?php
include('../connect.php');
$lrn = $_POST['lrn'];
$sqlget = "SELECT * FROM student where lrn=$lrn";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());

while ($row = mysqli_fetch_assoc($sqldata)) {

?>
   
      <div class="col-md-1"></div>
      <div class="tab-content" id="myTabContent">
         
              <!-- page1 -->
              

              <div class=" container tab-pane fade show active" id="page1" role="tabpanel" aria-labelledby="home-tab">
                
<div class="tab-pane fade show active" id="page1" role="tabpanel" aria-labelledby="home-tab">
  
                  <div class="col-md-10 bg-light mt-5 border">
                       <div class="row">
                           <div class="card p-5 col-md-5" style="width: 20rem;" >
                                <img src="../img/<?php echo $row['img'];?>" onerror=this.src="../img/profile.png" alt="" class="rounded-circle img-thumbnail" width="400">
                                <div class="card-body">
                                <div class="custom-file">
                             
                           </div>
                      </div>
                  </div>
            <div class="col-md-2 pt-5">
            
            </div>
            <div class="col-md-5 pb-5 pr-5 pt-4">
            <h3 class="text-center">STUDENT INFORMATION</h3>
                                  
                            <div class="form-group">
                            <p>Learners Registry Number : <strong><?php echo $row['lrn'];?></strong></p>
                              
                              
                              
                            </div>
                            <div class="form-group">
                            
                            <p>Full Name : <strong><?php echo $row['lname'];?></strong>, <strong><?php echo $row['fname'];?></strong> <strong><?php echo $row['mname'];?>.</strong></p>
                            </div>
                           
                          <div class="form-group">

                          <p>Birth Date : <strong><?php echo $row['birth_date'];?></strong></p>
                          </div>

                          <div class="form-group">

                          <p>Gender : <strong><?php echo $row['gender'];?></strong></p>
                          </div>

                          <div class="form-group">
                          <p>Guardian : <strong><?php echo $row['guardian'];?></strong></p>
                          </div>
                          <div class="form-group">
                          <p>Contact Number : <strong><?php echo $row['contact_no'];?></strong></p>
                          </div>

                          <div class="form-group">
                          <p>Adviser : <strong><?php echo $row['teacher_id'];?></strong></p>
                          </div>

                          <div class="form-group">
                          <p>Address : <strong><?php echo $row['address'];?></strong></p>
                          </div>

                          <input class="float-right button"  onclick="document.getElementById('profile-tab').click()" type="button" value="Next" id="secondaryButton" />

                          <input class="float-right button mr-3 btn-primary" type="button" value="Update" id="secondaryButton" data-toggle="modal" data-target="#info"/>
                            
                            
                        
            </div>
          </div>
        </div>
 <!--modal for assessment-->
<div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Student Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group"><input type="text" class="form-control" value="<?php echo $row['lrn'];?>" /></div>
        <div class="form-group"><input type="text" class="form-control" value="<?php echo $row['fname'];?>" /></div>
        <div class="form-group"><input type="text" class="form-control" value="<?php echo $row['mname'];?>" /></div>
        <div class="form-group"><input type="text" class="form-control" value="<?php echo $row['lname'];?>" /></div>
        <div class="form-group"><input type="text" class="form-control" value="<?php echo $row['birth_date'];?>" /></div>
        <div class="form-group"><input type="text" class="form-control" value="<?php echo $row['guardian'];?>" /></div>
        <div class="form-group"><input type="text" class="form-control" value="<?php echo $row['contact_no'];?>" /></div>
        <div class="form-group"><input type="text" class="form-control" value="<?php echo $row['teacher_id'];?>" /></div>
        <div class="form-group"><input type="text" class="form-control" value="<?php echo $row['address'];?>" /></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
 <!--modal for assessment-->
</div>

</div>
   
 <!-- page1 -->

               <!-- page2 -->
               <div class=" container tab-pane fade" id="page2" role="tabpanel" aria-labelledby="home-tab">
                
<div class="tab-pane fade show active" id="page1" role="tabpanel" aria-labelledby="home-tab">

<?php
include('../connect.php');
$lrn = $_GET['lrn'];
$sqlget = "SELECT * FROM assessment where lrn=$lrn";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());

while ($row1 = mysqli_fetch_assoc($sqldata)) {

?>

                  <div class="col-md-10 bg-light mt-5 border">
                       <div class="row">
                           <div class="card p-5 col-md-5" style="width: 20rem;" >
                                <img src="../img/<?php echo $row['img'];?>" onerror=this.src="../img/profile.png" alt="" class="rounded-circle img-thumbnail" width="400">
                                <div class="card-body">
                                <div class="custom-file">
                              
                           </div>
                      </div>
                  </div>
            <div class="col-md-2"></div>
            <div class="col-md-5 p-5">

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

                          <input class="float-right button" type="button" value="Next" id="secondaryButton" 
       onclick="document.getElementById('contact-tab').click()" />
       <input class="float-right button mr-3 btn-primary" type="button" value="Update" id="secondaryButton" data-toggle="modal" data-target="#assessment"/>
       <!--modal for assessment-->

       <div class="modal fade" id="assessment" tabindex="-1" role="dialog" aria-labelledby="assessment" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Student Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group"><input type="text" class="form-control" value="<?php echo $row1['c_age'];?>" /></div>
        <div class="form-group"><input type="text" class="form-control" value="<?php echo $row1['t_assessment'];?>" /></div>
        <div class="form-group"><input type="text" class="form-control" value="<?php echo $row1['administrator'];?>" /></div>
        <div class="form-group"><input type="text" class="form-control" value="<?php echo $row1['strenght'];?>" /></div>
        <div class="form-group"><input type="text" class="form-control" value="<?php echo $row1['category'];?>" /></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
       <!--modal for assessment-->                      
                            
                        
            </div>
          </div>
        </div>
</div>

</div>
<?php

}?>
   
 <!-- page2 -->


              <!-- page3 -->
              <div class=" container tab-pane fade" id="page3" role="tabpanel" aria-labelledby="home-tab">
  
        <div class="col-md-10 bg-light mt-5 border">
            <div class="col-md-8 ">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="grade1-tab" data-toggle="tab" href="#page-grade1" role="tab" aria-controls="grade1"
      aria-selected="true">GRADE-I</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="grade2-tab" data-toggle="tab" href="#page-grade2" role="tab" aria-controls="grade2"
      aria-selected="false">GRADE-II</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="grade3-tab" data-toggle="tab" href="#page-grade3" role="tab" aria-controls="grade3"
      aria-selected="false">GRADE-III</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="grade4-tab1" data-toggle="tab" href="#page-grade4" role="tab" aria-controls="grade4"
      aria-selected="false">GRADE-IV</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="grade5-tab" data-toggle="tab" href="#page-grade5" role="tab" aria-controls="grade5"
      aria-selected="false">GRADE-V</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="grade6-tab1" data-toggle="tab" href="#page-grade6" role="tab" aria-controls="grade6"
      aria-selected="false">GRADE-VI</a>
  </li>
</ul>
<div class="row p-2">
<div class="tab-content" id="myTabContent">
<div class=" container tab-pane fade show active" id="page-grade1" role="tabpanel" aria-labelledby="home-tab">
  <h1 class="text-align-center">Student evaluation GRADE I</h1>
  <hr>
              
<?php
            $lrn = $_POST['lrn'];
$sqlget = "SELECT * FROM evaluation where lrn=$lrn and grade =1";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());

while ($row2 = mysqli_fetch_assoc($sqldata)) {

  $t =$row2['teacher_id'];
  

  if ($row2['type']=='1'){
    $str1=$row2['strenght'];
    $nds1=$row2['needs'];
  }
  if ($row2['type']=='2'){
    $str2=$row2['strenght'];
    $nds2=$row2['needs'];
  }
  if ($row2['type']=='3'){
    $str3=$row2['strenght'];
    $nds3=$row2['needs'];
  }
  if ($row2['type']=='4'){
    $str4=$row2['strenght'];
    $nds4=$row2['needs'];
  }
  if ($row2['type']=='5'){
    $str5=$row2['strenght'];
    $nds5=$row2['needs'];
  }
  if ($row2['type']=='6'){
    $str6=$row2['strenght'];
    $nds6=$row2['needs'];
  }

}

$sqlget1 = "SELECT * FROM teachers where teacher_id = $t";
$sqldata1 = mysqli_query($conn, $sqlget1) or die('Error Displaying Data'. mysqli_connect_error());

while ($row3 = mysqli_fetch_assoc($sqldata1)) {

  $teacher = $row3['fname']." ".$row3['lname'];

}


?>
<h3>Quarter I</h3>
<h5>Teachear:  <?php echo $teacher;?></h5>
<h5>Batch Year: </h5>

<p><strong> DAILY LIVING SKILLS DOMAIN:</strong> Present Level of Educational Performance</p>
<p><strong> Strenght/s: </strong><u>  <?php echo $str1;?> </u></p>
<p><strong> Need/s:</strong><u ><?php echo $nds1;?>   </u></p>
<hr>

<p><strong> SOCIO - EMOTIONAL DOMAIN: </strong> Present Level of Educational Performance</p>
<p><strong> Strenght/s: </strong><u>  <?php echo $str2;?> </u></p>
<p><strong> Need/s:</strong><u ><?php echo $nds2;?>   </u></p>
<hr>

<p><strong> LANGUAGE DEVELOPMENT DOMAIN: : </strong> Present Level of Educational Performance</p>
<p><strong> Strenght/s: </strong><u>  <?php echo $str3;?> </u></p>
<p><strong> Need/s:</strong><u ><?php echo $nds3;?>   </u></p>
<hr>
<p><strong> PSYCHOMOTOR DOMAIN:  </strong> Present Level of Educational Performance</p>
<p><strong> Strenght/s: </strong><u>  <?php echo $str4;?> </u></p>
<p><strong> Need/s:</strong><u ><?php echo $nds4;?>   </u></p>
<hr>
<p><strong> COGNITIVE DOMAIN:   </strong> Present Level of Educational Performance</p>
<p><strong> Strenght/s: </strong><u>  <?php echo $str5;?> </u></p>
<p><strong> Need/s:</strong><u ><?php echo $nds5;?>   </u></p>
<hr>
<p><strong> BEHAVIORAL DEVELOPMENT:    </strong> Present Level of Educational Performance</p>
<p><strong> Strenght/s: </strong><u>  <?php echo $str6;?> </u></p>
<p><strong> Need/s:</strong><u ><?php echo $nds6;?>   </u></p>



                          

</div><!--closing grade1-->

<!--page-grade2-->

<div class=" container tab-pane fade" id="page-grade2" role="tabpanel" aria-labelledby="assessment-tab">
  <h1 class="text-align-center">Student evaluation GRADE II</h1>
  <hr>
              
<?php
            $lrn = $_POST['lrn'];
$sqlget = "SELECT * FROM evaluation where lrn=$lrn";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());

while ($row2 = mysqli_fetch_assoc($sqldata)) {

?>
<h3>Quarter 2</h3>
<h5>Teachear: </h5>
<h5>Batch Year: </h5>
<p><strong> DAILY LIVING SKILLS DOMAIN:</strong> Present Level of Educational Performance</p>
<p><strong> Strenght/s: </strong><u >  </u></p>
<p><strong> Need/s:</strong><u >  </u></p>
<hr>

<p><strong> SOCIO - EMOTIONAL DOMAIN: </strong> Present Level of Educational Performance</p>
<p><strong> Strenght/s: </strong><u >  </u></p>
<p><strong> Need/s:</strong><u > </u></p>
<hr>

<p><strong> LANGUAGE DEVELOPMENT DOMAIN: : </strong> Present Level of Educational Performance</p>
<p><strong> Strenght/s: </strong><u > </u></p>
<p><strong> Need/s:</strong><u > </u></p>
<hr>
<p><strong> PSYCHOMOTOR DOMAIN:  </strong> Present Level of Educational Performance</p>
<p><strong> Strenght/s: </strong><u > </u></p>
<p><strong> Need/s:</strong><u > </u></p>
<hr>
<p><strong> COGNITIVE DOMAIN:   </strong> Present Level of Educational Performance</p>
<p><strong> Strenght/s: </strong><u ></u></p>
<p><strong> Need/s:</strong><u >  </u></p>
<hr>
<p><strong> BEHAVIORAL DEVELOPMENT:    </strong> Present Level of Educational Performance</p>
<p><strong> Strenght/s: </strong><u > </u></p>
<p><strong> Need/s:</strong><u > </u></p>



                          
<?php
}
?>
</div>
<!--closing grade2-->

<!--page-grade3-->

<div class=" container tab-pane fade" id="page-grade3" role="tabpanel" aria-labelledby="home-tab">
  <h1 class="text-align-center">Student evaluation GRADE III</h1>
  <hr>
              
<?php
            $lrn = $_POST['lrn'];
$sqlget = "SELECT * FROM evaluation where lrn=$lrn";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());

while ($row2 = mysqli_fetch_assoc($sqldata)) {

?>
<h3>Quarter I</h3>
<h5>Teachear: </h5>
<h5>Batch Year: </h5>
<p><strong> DAILY LIVING SKILLS DOMAIN:</strong> Present Level of Educational Performance</p>
<p><strong> Strenght/s: </strong><u >  </u></p>
<p><strong> Need/s:</strong><u >  </u></p>
<hr>

<p><strong> SOCIO - EMOTIONAL DOMAIN: </strong> Present Level of Educational Performance</p>
<p><strong> Strenght/s: </strong><u >  </u></p>
<p><strong> Need/s:</strong><u > </u></p>
<hr>

<p><strong> LANGUAGE DEVELOPMENT DOMAIN: : </strong> Present Level of Educational Performance</p>
<p><strong> Strenght/s: </strong><u > </u></p>
<p><strong> Need/s:</strong><u > </u></p>
<hr>
<p><strong> PSYCHOMOTOR DOMAIN:  </strong> Present Level of Educational Performance</p>
<p><strong> Strenght/s: </strong><u > </u></p>
<p><strong> Need/s:</strong><u > </u></p>
<hr>
<p><strong> COGNITIVE DOMAIN:   </strong> Present Level of Educational Performance</p>
<p><strong> Strenght/s: </strong><u ></u></p>
<p><strong> Need/s:</strong><u >  </u></p>
<hr>
<p><strong> BEHAVIORAL DEVELOPMENT:    </strong> Present Level of Educational Performance</p>
<p><strong> Strenght/s: </strong><u > </u></p>
<p><strong> Need/s:</strong><u > </u></p>



                          
<?php
}
?>

</div>
<!--closing grade3-->

<!--page-grade4-->

<div class=" container tab-pane fade" id="page-grade4" role="tabpanel" aria-labelledby="home-tab">
  <h1 class="text-align-center">Student evaluation GRADE IV</h1>
  <hr>
              
<?php
            $lrn = $_POST['lrn'];
$sqlget = "SELECT * FROM evaluation where lrn=$lrn";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());

while ($row2 = mysqli_fetch_assoc($sqldata)) {

?>
<h3>Quarter I</h3>
<h5>Teachear: </h5>
<h5>Batch Year: </h5>
<p><strong> DAILY LIVING SKILLS DOMAIN:</strong> Present Level of Educational Performance</p>
<p><strong> Strenght/s: </strong><u >  </u></p>
<p><strong> Need/s:</strong><u >  </u></p>
<hr>

<p><strong> SOCIO - EMOTIONAL DOMAIN: </strong> Present Level of Educational Performance</p>
<p><strong> Strenght/s: </strong><u >  </u></p>
<p><strong> Need/s:</strong><u > </u></p>
<hr>

<p><strong> LANGUAGE DEVELOPMENT DOMAIN: : </strong> Present Level of Educational Performance</p>
<p><strong> Strenght/s: </strong><u > </u></p>
<p><strong> Need/s:</strong><u > </u></p>
<hr>
<p><strong> PSYCHOMOTOR DOMAIN:  </strong> Present Level of Educational Performance</p>
<p><strong> Strenght/s: </strong><u > </u></p>
<p><strong> Need/s:</strong><u > </u></p>
<hr>
<p><strong> COGNITIVE DOMAIN:   </strong> Present Level of Educational Performance</p>
<p><strong> Strenght/s: </strong><u ></u></p>
<p><strong> Need/s:</strong><u >  </u></p>
<hr>
<p><strong> BEHAVIORAL DEVELOPMENT:    </strong> Present Level of Educational Performance</p>
<p><strong> Strenght/s: </strong><u > </u></p>
<p><strong> Need/s:</strong><u > </u></p>



                          
<?php
}
?>

</div>
<!--closing grade4-->

<!--page-grade5-->

<div class=" container tab-pane fade" id="page-grade5" role="tabpanel" aria-labelledby="home-tab">
  <h1 class="text-align-center">Student evaluation GRADE V</h1>
  <hr>
              
<?php
            $lrn = $_POST['lrn'];
$sqlget = "SELECT * FROM evaluation where lrn=$lrn";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());

while ($row2 = mysqli_fetch_assoc($sqldata)) {

?>
<h3>Quarter I</h3>
<h5>Teachear: </h5>
<h5>Batch Year: </h5>
<p><strong> DAILY LIVING SKILLS DOMAIN:</strong> Present Level of Educational Performance</p>
<p><strong> Strenght/s: </strong><u >  </u></p>
<p><strong> Need/s:</strong><u >  </u></p>
<hr>

<p><strong> SOCIO - EMOTIONAL DOMAIN: </strong> Present Level of Educational Performance</p>
<p><strong> Strenght/s: </strong><u >  </u></p>
<p><strong> Need/s:</strong><u > </u></p>
<hr>

<p><strong> LANGUAGE DEVELOPMENT DOMAIN: : </strong> Present Level of Educational Performance</p>
<p><strong> Strenght/s: </strong><u > </u></p>
<p><strong> Need/s:</strong><u > </u></p>
<hr>
<p><strong> PSYCHOMOTOR DOMAIN:  </strong> Present Level of Educational Performance</p>
<p><strong> Strenght/s: </strong><u > </u></p>
<p><strong> Need/s:</strong><u > </u></p>
<hr>
<p><strong> COGNITIVE DOMAIN:   </strong> Present Level of Educational Performance</p>
<p><strong> Strenght/s: </strong><u ></u></p>
<p><strong> Need/s:</strong><u >  </u></p>
<hr>
<p><strong> BEHAVIORAL DEVELOPMENT:    </strong> Present Level of Educational Performance</p>
<p><strong> Strenght/s: </strong><u > </u></p>
<p><strong> Need/s:</strong><u > </u></p>



                          
<?php
}
?>

</div>
<!--closing grade5-->

<!--page-grade6-->

<div class=" container tab-pane fade" id="page-grade6" role="tabpanel" aria-labelledby="home-tab">
  <h1 class="text-align-center">Student evaluation GRADE VI</h1>
  <hr>
              
<?php
            $lrn = $_POST['lrn'];
$sqlget = "SELECT * FROM evaluation where lrn=$lrn";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());

while ($row2 = mysqli_fetch_assoc($sqldata)) {

?>
<h3>Quarter I</h3>
<h5>Teachear: </h5>
<h5>Batch Year: </h5>
<p><strong> DAILY LIVING SKILLS DOMAIN:</strong> Present Level of Educational Performance</p>
<p><strong> Strenght/s: </strong><u >  </u></p>
<p><strong> Need/s:</strong><u >  </u></p>
<hr>

<p><strong> SOCIO - EMOTIONAL DOMAIN: </strong> Present Level of Educational Performance</p>
<p><strong> Strenght/s: </strong><u >  </u></p>
<p><strong> Need/s:</strong><u > </u></p>
<hr>

<p><strong> LANGUAGE DEVELOPMENT DOMAIN: : </strong> Present Level of Educational Performance</p>
<p><strong> Strenght/s: </strong><u > </u></p>
<p><strong> Need/s:</strong><u > </u></p>
<hr>
<p><strong> PSYCHOMOTOR DOMAIN:  </strong> Present Level of Educational Performance</p>
<p><strong> Strenght/s: </strong><u > </u></p>
<p><strong> Need/s:</strong><u > </u></p>
<hr>
<p><strong> COGNITIVE DOMAIN:   </strong> Present Level of Educational Performance</p>
<p><strong> Strenght/s: </strong><u ></u></p>
<p><strong> Need/s:</strong><u >  </u></p>
<hr>
<p><strong> BEHAVIORAL DEVELOPMENT:    </strong> Present Level of Educational Performance</p>
<p><strong> Strenght/s: </strong><u > </u></p>
<p><strong> Need/s:</strong><u > </u></p>



                          
<?php
}
?>

</div>
<!--closing grade6-->

</div><!--closing tab-content-->



    



         
</div>

        
</div>
<div class="p-5"><input class="float-right button ml-3" type="button" value="Next" id="secondaryButton" onclick="document.getElementById('contact-tab1').click()" /></div>

</div>
</div>
   
 <!-- page3 -->



 
                <!-- page4 -->
                <div class=" container tab-pane fade" id="page4" role="tabpanel" aria-labelledby="home-tab">
<div class="tab-pane fade show active" id="page1" role="tabpanel" aria-labelledby="home-tab">
                  
           
            <div class="col-md-12 p-5">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="grade1-tab" data-toggle="tab" href="#grade1" role="tab" aria-controls="home"
      aria-selected="true">GRADE-I</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="grade2-tab" data-toggle="tab" href="#grade2" role="tab" aria-controls="assessment"
      aria-selected="false">GRADE-II</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="grade3-tab" data-toggle="tab" href="#grade3" role="tab" aria-controls="contact"
      aria-selected="false">GRADE-III</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="grade4-tab1" data-toggle="tab" href="#grade4" role="tab" aria-controls="contact"
      aria-selected="false">GRADE-IV</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="grade5-tab" data-toggle="tab" href="#grade5" role="tab" aria-controls="contact"
      aria-selected="false">GRADE-V</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="grade6-tab1" data-toggle="tab" href="#grade6" role="tab" aria-controls="contact"
      aria-selected="false">GRADE-VI</a>
  </li>
</ul>
            <button type="button" class="btn btn-primary m-3" data-toggle="modal" data-target="#exampleModal">Update ILP</button>
            <button type="button" class="btn btn-danger m-3" data-toggle="modal" data-target="#exampleModal">Delete ILP</button>
            <?php
            $lrn = $_POST['lrn'];
$sqlget = "SELECT * FROM ilp where lrn=$lrn";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());

while ($row4 = mysqli_fetch_assoc($sqldata)) {

?>
            
             <embed src="../ilp/<?php echo $row4['ilp_name'];?>" width="100%" height="700" type="">
             <?php }?>
    </iframe>
                              
                              
                             

                            </div>
           

            </div>
          </div>
        </div>
</div>
<!--modal for upload ilp-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Student ILP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <input type="file" name="fileToUpload" class="mb-3" id="fileToUpload">
                <input type="date" class="form-control" name="dateilp" >
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!--modal for upload ilp-->

</div>
   
 <!-- page4 -->



 


</div>
</form>

</div>
</div>

<?php

}?>
</body>
</html>