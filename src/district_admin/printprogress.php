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

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-print-css/css/bootstrap-print.min.css" media="print">





</head>

<style>

body{

    font-size:8.5px;
}
  /* Table design for printing */
  .table1 {
    border: 1px solid black;
    
    width: 100%;
    
  }
  .table1 tr th td{
    padding: 4px;
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
$id = $_GET['lrn'];

$address ="";
$name = "";
$birth_date = "";
$guardian = "";
$guardian_contact = "";
$category = "";
$grade = "";
$gender = "";

$folder_id = $_GET['folder_id'];
$sqlget = "SELECT * FROM new_student where lrn = $id";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());

while ($row = mysqli_fetch_assoc($sqldata)) {
  $address = $row['address'];
  $birth_date = $row['birth_date'];
  $guardian = $row['guardian'];
$guardian_contact = $row['gurdian_contact'];
$category = $row['category'];
$name = $row['fname']. " ".$row['lname'];
$gender = $row['gender'];

}
?>



<body id="page-top">
  <div class="container-fluid">
  <div class="d-flex justify-content-end">
<button type="button" id="printPageButton" class="btn btn-success hidethis mt-3" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
  
</div>
     <div class="row">


  
                <!--first-->
                <div class="col-md-4">
              
                <table class="table1 table-sm table-bordered">
                    <tr class="text-dark" style="background-color:yellow;">
                    <th rowspan="2">LEARNING AREAS</th>
                    <th colspan="4">Periodic Rating</th>
                    <th rowspan="2">final rating</th>
                    </tr>

                   <tr class="text-dark" style="background-color:yellow;">
                   <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                   </tr>
                   <tr align="center" class="text-dark" style="background-color:yellow;"><th colspan="6" >Daily Living Skill Domain</th></tr>
                   <tr><th colspan="6">Self feeding</th></tr>
<?php

include('../connect.php');
$id = $_GET['lrn'];
$folder_id = $_GET['folder_id'];
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
                <div class="col-md-4">
              
              <table class="table1 table-sm table-bordered">
                  <tr class="text-dark" style="background-color:yellow;">
                  <th rowspan="2">LEARNING AREAS</th>
                  <th colspan="4">Periodic Rating</th>
                  <th rowspan="2">final rating</th>
                  </tr>

                 <tr class="text-dark" style="background-color:yellow;">
                 <th>1</th>
                  <th>2</th>
                  <th>3</th>
                  <th>4</th>
                 </tr>
                 <tr align="center" class="text-dark" style="background-color:yellow;"><th colspan="6" >SOCIO-EMOTIONAL DOMAIN</th></tr>
              
                 <?php

include('../connect.php');
$id2 = $_GET['lrn'];
$sqlget2 = "SELECT * FROM progress_report where lrn = $id2 and progress_index=2 and folder_id =  $folder_id";
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
               
                 <!--THIRD-->
                 <div class="col-md-4">
              
              <table class="table1 table-sm table-bordered">
                  <tr class="text-dark" style="background-color:yellow;">
                  <th rowspan="2">LEARNING AREAS</th>
                  <th colspan="4">Periodic Rating</th>
                  <th rowspan="2">final rating</th>
                  </tr>

                 <tr class="text-dark" style="background-color:yellow;">
                 <th>1</th>
                  <th>2</th>
                  <th>3</th>
                  <th>4</th>
                 </tr>
                 <tr align="center" class="text-dark" style="background-color:yellow;"><th colspan="6" >LANGUAGE DEVELOPMENT</th></tr>
                <tr><th>LISTENING</th></tr>
                <?php

include('../connect.php');
$id2 = $_GET['lrn'];
$sqlget3 = "SELECT * FROM progress_report where lrn = $id2 and progress_index=3 and folder_id =  $folder_id";
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
                 <div class="col-md-4">
              
              <table class="table11 table-sm table-bordered">
                  <tr class="text-dark" style="background-color:yellow;">
                  <th rowspan="2">LEARNING AREAS</th>
                  <th colspan="4">Periodic Rating</th>
                  <th rowspan="2">final rating</th>
                  </tr>

                 <tr class="text-dark" style="background-color:yellow;">
                 <th>1</th>
                  <th>2</th>
                  <th>3</th>
                  <th>4</th>
                 </tr>
                 <tr align="center" class="text-dark" style="background-color:yellow;"><th colspan="6" >PYSCHOMOTOR DOMAIN</th></tr>
                 <?php

include('../connect.php');
$id2 = $_GET['lrn'];
$sqlget4 = "SELECT * FROM progress_report where lrn = $id2 and progress_index=4 and folder_id =  $folder_id";
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

                     <!--FIFTH-->
                     <div class="col-md-4">
              
              <table class="table1 table-sm table-bordered">
                  <tr class="text-dark" style="background-color:yellow;">
                  <th rowspan="2">LEARNING AREAS</th>
                  <th colspan="4">Periodic Rating</th>
                  <th rowspan="2">final rating</th>
                  </tr>

                 <tr class="text-dark" style="background-color:yellow;">
                 <th>1</th>
                  <th>2</th>
                  <th>3</th>
                  <th>4</th>
                 </tr>
                 <tr align="center" class="text-dark" style="background-color:yellow;"><th colspan="6" >PCOGNITIVE DOMAIN</th></tr>
        
                 <?php

include('../connect.php');
$id2 = $_GET['lrn'];
$sqlget5 = "SELECT * FROM progress_report where lrn = $id2 and progress_index=5 and folder_id =  $folder_id";
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
                            <div class="col-md-4">
              
              <table class="table1 table-sm table-bordered">
                  <tr class="text-dark" style="background-color:yellow;">
                  <th rowspan="2">LEARNING AREAS</th>
                  <th colspan="4">Periodic Rating</th>
                  <th rowspan="2">final rating</th>
                  </tr>

                 <tr class="text-dark" style="background-color:yellow;">
                 <th>1</th>
                  <th>2</th>
                  <th>3</th>
                  <th>4</th>
                 </tr>
                 <tr align="center" class="text-dark" style="background-color:yellow;"><th colspan="6" >BEHAVIORAL DEVELOPMENT</th></tr>
        
                 <?php

include('../connect.php');
$id2 = $_GET['lrn'];
$sqlget6 = "SELECT * FROM progress_report where lrn = $id2 and progress_index=6 and folder_id =  $folder_id";
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
               <div class="col-md-6 mt-5">
               <table class="table table-bordered" style="text-align:center;">
               <tr><th colspan="2"><h4>Teacher remarks</h3></th></tr>
                <tr>
                    <th>QUARTER</th>
                    <th>REMARKS</th>
                </tr>

                <?php 

$sqlget123 = "SELECT * FROM teachers_remark where lrn = $id2 and folder_id =  $folder_id";
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

               <table class="table" style="text-align:center;">
               <tr><th colspan="3"><h5> Parent's/guardian Observation and Signature</h5></th></tr>
                <tr>
                    <th>Quarter</th>
                    <th>Parent Observation</th>
                    <th>Signature</th>
                </tr>

                <?php 

$sqlgetobs = "SELECT * FROM parent_observation where lrn = $id2 ";
$sqldataobs = mysqli_query($conn, $sqlgetobs) or die('Error Displaying Data'. mysqli_connect_error());
$quarter= 1;
while ($rowobs = mysqli_fetch_assoc($sqldataobs)) {
?>

                <tr>
                  <td><?php if($quarter ==1){echo '1ST'; } ?>
                  <?php if($quarter ==2){echo '2ND'; } ?>
                  <?php if($quarter ==3){echo '3RD'; } ?>
                  <?php if($quarter ==4){echo '4TH'; } ?>
               </td>
                
                    <td><?php echo $rowobs['observation'];  ?></td>
                </tr>
            
             
           
               <?php $quarter++; }?>

               </table>

               <?php

include('../connect.php');


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
$id =$_GET['lrn'];
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
          <th><h4>Attendance</h4></th>
     
          <td>Jun</td>
          <td>Jul</td>
          <td>Aug</td>
          <td>Sep</td>
          <td>Oct</td>
          <td>Nov</td>
          <td>Dece</td>
          <td>Jan</td>
          <td>Feb</td>
          <td>Mar</td>
          <td>Apr</td>
          <td>May</td>
        </tr>
        <tr>
          <th>No. of School Days</th>
     
          <td><?php echo $Jun; ?> </td>
          <td><?php echo $Jul; ?> </td>
          <td><?php echo $Jun; ?> </td>
          <td><?php echo $Sep; ?> </td>
          <td><?php echo $Oct; ?> </td>
          <td><?php echo $Nov; ?> </td>
          <td><?php echo $Dece; ?> </td>
          <td><?php echo $Jan; ?> </td>
          <td><?php echo $Feb; ?> </td>
          <td><?php echo $Mar; ?> </td>
          <td><?php echo $Apr; ?> </td>
          <td><?php echo $May; ?> </td>
        
        </tr>

        <tr>
          <th>No. of School Days Present</th>
     
          <td><?php echo $Jun1; ?> </td>
          <td><?php echo $Jul1; ?> </td>
          <td><?php echo $Jun1; ?> </td>
          <td><?php echo $Sep1; ?> </td>
          <td><?php echo $Oct1; ?> </td>
          <td><?php echo $Nov1; ?> </td>
          <td><?php echo $Dece1; ?> </td>
          <td><?php echo $Jan1; ?> </td>
          <td><?php echo $Feb1; ?> </td>
          <td><?php echo $Mar1; ?> </td>
          <td><?php echo $Apr1; ?> </td>
          <td><?php echo $May1; ?> </td>
        </tr>
        <tr>
          <th>No. of School Days Absent</th>
     
          <td><?php echo $Jun-$Jun1; ?></td>
          <td><?php echo $Jul-$Jul1; ?></td>
          <td><?php echo $Aug-$Aug1; ?></td>
          <td><?php echo $Sep-$Sep1; ?></td>
          <td><?php echo $Oct-$Oct1; ?></td>
      
          <td><?php echo $Nov-$Nov1; ?></td>
          <td><?php echo $Dece-$Dece1; ?></td>
          <td><?php echo $Jan-$Jan1; ?></td>
          <td><?php echo $Feb-$Feb1; ?></td>
          <td><?php echo $Mar-$Mar1; ?></td>
          <td><?php echo $Apr-$Apr1; ?></td>
          <td><?php echo $May-$May1; ?></td>
        </tr>


      </table>
               </div>

                           
               <div class="col-md-6" style="margin-top:100px;">
               <h6 align="center"> Republika ng Pilipinas <br>
                    Department of Education <br>
                    PROGRESS REPORT CARD <br>
                    School Year 2021 – 2022</h6>
                    <div style="font-size:12px;">
                    <p>Certificate of Transfer <br>
                    Admitted to: ____________________________________________ <br>Eligible for Admission to: _________________________________</p>



<p align="center">_______________________________<br>Teacher</p>
<p align="center">_______________________________<br>Principal</p>


<p>Cancellation of Eligibility to transfer <br> Admitted in ________________ <br> Date ______________________</p>
<p align="center">_______________________________<br>Principal</p>
       
<strong>
                    <h7> Name: ___<u><?php echo $name; ?></u>___ <br>
Age: _<?php $date = date_create($birth_date);
$interval = $date->diff(new DateTime);
echo $interval->y; ?>_ Date of Birth: __<u><?php echo $birth_date; ?></u>__  Sex: __<u><?php echo $gender; ?></u>__</h7></strong>
               <table>
     <tr>
          <td><h8>LRN: </h8> </td>
          <?php
          $str = $id2;
           $chars = str_split($str);
foreach($chars as $char){
    // your code
?>
          <td style="border-collapse: collapse; padding:0; border:2px solid black;"> <input style="width:17px;" type="text" value="<?php echo $char; ?>" maxlength="1"></td>
         
     <?php } ?>   
     </tr>
</table>

<p class="mt-2">Dear Parents / Guardians,<br>
        This report card is designed to show your child’s progress in the differentlearning areas of development and character formation. 
        The school welcomes you to confer with the teacher / principal so that we may best understand your child’s special educational needs.     
        </p>
				            <p align="center">_____________________________ <br>
					    Teacher </p>
                             <p align="center">_____________________________ <br>
                Principal</p>


</div>
               </div>

               <div class="col-md-6">
             
               </div>

               <div class="col-md-6" style="font-size:12px;">
         


               </div>

<div>

</div>

              


               </div>
               </div>
               
     </div>

 
   
    </div>
</body>
</html>