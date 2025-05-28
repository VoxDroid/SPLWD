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

<style>
img.sticky {
  position: -webkit-sticky;
  position: sticky;
  top: 0;
  width: 500px;

}
</style>

<body id="page-top">

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#aaaaaa1" role="tab" aria-controls="home"
      aria-selected="true">Daily Living & Socio</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="progress-tab" data-toggle="tab" href="#aaaaaa2" role="tab" aria-controls="progress"
      aria-selected="false">Language & Psychomotor</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#aaaaaa3" role="tab" aria-controls="profile"
      aria-selected="false">Cognitive & Behavioral</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#aaaaaa4" role="tab" aria-controls="profile"
      aria-selected="false">Teachers & Parents Remark</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#attendance1" role="tab" aria-controls="profile"
      aria-selected="false">Attendance</a>
  </li>


</ul>
<div class="tab-content container-fluid" align="center"id="myTabContent">
  <!--information tab-->

   <!-- attendace1 -->
   <div class="tab-pane fade" align="center" id="attendance1" role="tabpanel" aria-labelledby="home-tab">
   <h3 align="center">Attendance</h3>
      <div class="row mt-3">
       

      <?php

include('../connect.php');
$id = $_GET['id'];

$Jun="";
$Jul="";
$Aug="";
$Sep="";
$Oct="";
$Nov="";
$Dece="";
$Jan="";
$Jan="";
$Feb="";
$Mar="";
$Apr="";
$May="";

$Jun1="";
$Jul1="";
$Aug1="";
$Sep1="";
$Oct1="";
$Nov1="";
$Dece1="";
$Jan1="";
$Jan1="";
$Feb1="";
$Mar1="";
$Apr1="";
$May1="";

$folder_id = $_GET['folder_id'];
$id = $_GET['id'];
$sqlget = "SELECT * FROM attendance where folder_id = $folder_id and  lrn = $id";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());

while ($row = mysqli_fetch_assoc($sqldata)) {
  if($row['type']==1){
  $Jun=$row['june'];
$Jul=$row['july'];
$Aug=$row['aug'];
$Sep=$row['sept'];
$Oct=$row['oct'];
$Nov=$row['nov'];
$Dece=$row['dece'];
$Jan=$row['jan'];

$Feb=$row['feb'];
$Mar=$row['mar'];
$Apr=$row['apr'];
$May=$row['may'];
  }

  if($row['type']==2){
$Jun1=$row['june'];
$Jul1=$row['july'];
$Aug1=$row['aug'];
$Sep1=$row['sept'];
$Oct1=$row['oct'];
$Nov1=$row['nov'];
$Dece1=$row['dece'];
$Jan1=$row['jan'];
$Feb1=$row['feb'];
$Mar1=$row['mar'];
$Apr1=$row['apr'];
$May1=$row['may'];
  }



}
?>


      <table class="table table-bordered">
      <tr>
          <th></th>
     
          <td>Jun</td>
          <td>Jul</td>
          <td>Aug</td>
          <td>Sep</td>
          <td>Oct</td>
          <td>Nov</td>
          <td>Dece</td>
          <td>Jan</td>
          <td>Jan</td>
          <td>Feb</td>
          <td>Mar</td>
          <td>Apr</td>
          <td>May</td>
        </tr>
        <tr>
          <th>No. of School Days</th>
     
          <td><?php echo $Jun; ?></td>
          <td><?php echo $Jul; ?></td>
          <td><?php echo $Aug; ?></td>
          <td><?php echo $Sep; ?></td>
          <td><?php echo $Oct; ?></td>
          <td><?php echo $Sep; ?></td>
          <td><?php echo $Nov; ?></td>
          <td><?php echo $Dece; ?></td>
          <td><?php echo $Jan; ?></td>
          <td><?php echo $Feb; ?></td>
          <td><?php echo $Mar; ?></td>
          <td><?php echo $Apr; ?></td>
          <td><?php echo $May; ?></td>
        </tr>

        <tr>
          <th>No. of School Days Present</th>
     
          <td><?php echo $Jun1; ?></td>
          <td><?php echo $Jul1; ?></td>
          <td><?php echo $Aug1; ?></td>
          <td><?php echo $Sep1; ?></td>
          <td><?php echo $Oct1; ?></td>
          <td><?php echo $Sep1; ?></td>
          <td><?php echo $Nov1; ?></td>
          <td><?php echo $Dece1; ?></td>
          <td><?php echo $Jan1; ?></td>
          <td><?php echo $Feb1; ?></td>
          <td><?php echo $Mar1; ?></td>
          <td><?php echo $Apr1; ?></td>
          <td><?php echo $May1; ?></td>
        </tr>
        <tr>
          <th>No. of School Days Absent</th>
     
          <td><?php echo $Jun-$Jun1; ?></td>
          <td><?php echo $Jul-$Jul1; ?></td>
          <td><?php echo $Aug-$Aug1; ?></td>
          <td><?php echo $Sep-$Sep1; ?></td>
          <td><?php echo $Oct-$Oct1; ?></td>
          <td><?php echo $Sep-$Sep1; ?></td>
          <td><?php echo $Nov-$Nov1; ?></td>
          <td><?php echo $Dece-$Dece1; ?></td>
          <td><?php echo $Jan-$Jan1; ?></td>
          <td><?php echo $Feb-$Feb1; ?></td>
          <td><?php echo $Mar-$Mar; ?></td>
          <td><?php echo $Apr-$Apr1; ?></td>
          <td><?php echo $May-$May; ?></td>
        </tr>


      </table>
      </div>
</div>
   <!-- attendance -->

  <!-- aaaaaa1 -->
  <div class="tab-pane fade" align="center" id="aaaaaa1" role="tabpanel" aria-labelledby="home-tab">

  <div class="row">
<div class="col-md-3"></div>
  <div class="col-md-6"><img src="../img/legend.jpg" class="img-fluid">  </div>
     <!--first-->
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
                 <tr align="center"><th colspan="6" >Daily Living Skill Domain</th></tr>
                 <tr><th colspan="6">Self feeding</th></tr>

                 <?php

include('../connect.php');

$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=1 and folder_id =  $folder_id";
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

                  <td>

<?php if($row1['q5']==''){?>

<?php } else{
echo $row1['q5'];
?>
   <input type="hidden" name="1<?php echo $count;?>q5" value="<?php echo $row1['q5'];?>"> 
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

$sqlget2 = "SELECT * FROM progress_report where lrn = $id and progress_index=2 and folder_id =  $folder_id";
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

                    <td>

<?php if($row2['q5']==''){?>

<?php } else{
echo $row2['q5'];
?>
     <input type="hidden" name="2<?php echo $count;?>q5" value="<?php echo $row2['q5'];?>"> 
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
  </div>

</div>
<!-- aaaaaa1 -->

  <!-- aaaaaa2 -->
  <div class="tab-pane fade show" align="center" id="aaaaaa2" role="tabpanel" aria-labelledby="home-tab">
    <div class="row">
    <div class="col-md-3"></div>
  <div class="col-md-6"><img src="../img/legend.jpg" class="img-fluid">  </div>
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
$id = $_GET['id'];
$sqlget3 = "SELECT * FROM progress_report where lrn = $id and progress_index=3 and folder_id =  $folder_id";
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

                    <td>

<?php if($row13['q5']==''){?>

<?php } else{
echo $row13['q5'];
?>
     <input type="hidden" name="3<?php echo $count;?>q5" value="<?php echo $row13['q5'];?>"> 
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
$id = $_GET['id'];
$sqlget4 = "SELECT * FROM progress_report where lrn = $id and progress_index=4 and folder_id =  $folder_id";
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

                    <td>

<?php if($row4['q5']==''){?>

<?php } else{
echo $row4['q5'];
?>
     <input type="hidden" name="4<?php echo $count;?>q5" value="<?php echo $row4['q5'];?>"> 
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
    </div>



</div>
<!-- aaaaaa2 -->

  <!-- aaaaaa3 -->
  <div class="tab-pane fade" align="center" id="aaaaaa3" role="tabpanel" aria-labelledby="home-tab">
    <div class="row">
    <div class="col-md-3"></div>
  <div class="col-md-6"><img src="../img/legend.jpg" class="img-fluid">  </div>
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
$id = $_GET['id'];
$sqlget5 = "SELECT * FROM progress_report where lrn = $id and progress_index=5 and folder_id =  $folder_id";
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

                    <td>

<?php if($row5['q5']==''){?>

<?php } else{
echo $row5['q5'];
?>
     <input type="hidden" name="5<?php echo $count;?>q5" value="<?php echo $row5['q5'];?>"> 
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
$id = $_GET['id'];
$sqlget6 = "SELECT * FROM progress_report where lrn = $id and progress_index=6 and folder_id =  $folder_id";
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

                    <td>

<?php if($row6['q5']==''){?>

<?php } else{
echo $row6['q5'];
?>
     <input type="hidden" name="6<?php echo $count;?>q5" value="<?php echo $row6['q5'];?>"> 
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
    </div>

</div>
<!-- aaaaaa3 -->

  <!-- aaaaaa4 -->
  <div class="tab-pane fade" align="center" id="aaaaaa4" role="tabpanel" aria-labelledby="home-tab">
    <h3>TEACHERS and Parents REMARK</h3>
    <div class="row">
    


    <div class="col-md-6">
               <table class="table" style="text-align:center;">
                <tr>
                    <th>QUARTER</th>
                    <th>REMARKS</th>
                </tr>

                <?php 
$id123 = $_GET['id'];
$sqlget123 = "SELECT * FROM teachers_remark where lrn = $id123 and folder_id =  $folder_id";
$sqldata123 = mysqli_query($conn, $sqlget123) or die('Error Displaying Data'. mysqli_connect_error());

while ($row123 = mysqli_fetch_assoc($sqldata123)) {
?>

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
             
           
               <?php }?>

               </table>
               </div>

               <div class="col-md-6">
               <table class="table" style="text-align:center;">
                <tr>
                    <th>Date</th>
                    <th>Parent Observation</th>
                </tr>

                <?php 
$id123 = $_GET['id'];
$sqlgetobs = "SELECT * FROM parent_observation where lrn = $id123 ";
$sqldataobs = mysqli_query($conn, $sqlgetobs) or die('Error Displaying Data'. mysqli_connect_error());

while ($rowobs = mysqli_fetch_assoc($sqldataobs)) {
?>

                <tr>
                  <td><?php echo $rowobs['date']; ?></td>
                
                    <td><?php echo $rowobs['observation'];  ?></td>
                </tr>
            
             
           
               <?php }?>

               </table>
               </div>

               </div>
    </div>

</div>
<!-- aaaaaa4 -->
</div>


</body>

</html>