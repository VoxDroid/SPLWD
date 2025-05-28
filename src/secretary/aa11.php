
<div class='row'>
<div class='col-md-12' align='center'>
TEACHERS REMARK
<?php 
include('../connect.php');



$sqlget123 = "SELECT * FROM teachers_remark where lrn = $lrn";
$sqldata123 = mysqli_query($conn, $sqlget123) or die('Error Displaying Data'. mysqli_connect_error());

while ($row123 = mysqli_fetch_assoc($sqldata123)) {
?>
<div class='row' align='center'>
    <div class='col-md-5'><img src='../img/legend.jpg' class='img-fluid' alt=''></div>
    <div class='col-md-7'>
               <table class='table' style='text-align:center;'>
                <tr>
                    <th>QUARTER</th>
                    <th>REMARKS</th>
                </tr>

                <input type='hidden' name='remark_id' value='<?php echo $row123['remark_id'];?>'>
                <input type='hidden' name='remark_q1' value='<?php echo $row123['remark_q1'];?>'>
                <input type='hidden' name='remark_q2' value='<?php echo $row123['remark_q2'];?>'>
                <input type='hidden' name='remark_q3' value='<?php echo $row123['remark_q3'];?>'>
                <input type='hidden' name='remark_q4' value='<?php echo $row123['remark_q4'];?>'>

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
<div class='col-md-6'>
              
              <table class='table table-bordered'>
                  <tr>
                  <th rowspan='2'>LEARNING AREAS</th>
                  <th colspan='4'>Periodic Rating</th>
                  <th rowspan='2'>final rating</th>
                  </tr>

                 <tr>
                 <th>1</th>
                  <th>2</th>
                  <th>3</th>
                  <th>4</th>
                 </tr>
                 <tr align='center'><th colspan='6' >Daily Living Skill Domain</th></tr>
                 <tr><th colspan='6'>Self feeding</th></tr>

                 <?php

include('../connect.php');
$id = $rowmodal['lrn'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=1 and folder_id = $folder_id";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {
  if($count==26){
  break;
     } 



?>
                 <tr><td><?php echo $row1['type'];?> </td><input type='hidden' name='1<?php echo $count;?>' value='<?php echo $row1['type'];?>'>
                 <td>

                 <?php if($row1['q1']==''){?>
                  
              <?php } else{
                  echo $row1['q1'];
                  ?>
                       <input type='hidden' name='1<?php echo $count;?>q1' value='<?php echo $row1['q1'];?>'> 
                  <?php
              }?>
         
              </td>
              <td>

                  <?php if($row1['q2']==''){?>
                 
                  <?php } else{
                  echo $row1['q2'];
                  ?>
                       <input type='hidden' name='1<?php echo $count;?>q2' value='<?php echo $row1['q2'];?>'> 
                  <?php
              }?>
                  </td>

                  <td>

                  <?php if($row1['q3']==''){?>
               
                  <?php } else{
                  echo $row1['q3'];
                  ?>
                       <input type='hidden' name='1<?php echo $count;?>q3' value='<?php echo $row1['q3'];?>'> 
                  <?php
              }?>
                  </td>
                  <td>

                  <?php if($row1['q4']==''){?>
                
                  <?php } else{
                  echo $row1['q4'];
                  ?>
                       <input type='hidden' name='1<?php echo $count;?>q4' value='<?php echo $row1['q4'];?>'> 
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
              <div class='col-md-6'>
            
            <table class='table table-bordered'>
                <tr>
                <th rowspan='2'>LEARNING AREAS</th>
                <th colspan='4'>Periodic Rating</th>
                <th rowspan='2'>final rating</th>
                </tr>

               <tr>
               <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
               </tr>
               <tr align='center'><th colspan='6' >SOCIO-EMOTIONAL DOMAIN</th></tr>
            
               <?php

include('../connect.php');
$id2 = $rowmodal['lrn'];
$sqlget2 = "SELECT * FROM progress_report where lrn = $id2 and progress_index=2 and folder_id = $folder_id";
$sqldata2 = mysqli_query($conn, $sqlget2) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row2 = mysqli_fetch_assoc($sqldata2)) {
  if($count==21){
  break;
     } 



?>
                 <tr><td><?php echo $row2['type'];?> </td><input type='hidden' name='2<?php echo $count;?>' value='<?php echo $row2['type'];?>'>
                 <td>

                 <?php if($row2['q1']==''){?>
               
                  <?php } else{
                  echo $row2['q1'];
                  ?>
                       <input type='hidden' name='2<?php echo $count;?>q1' value='<?php echo $row2['q1'];?>'> 
                  <?php
              }?>
              </td>
              <td>

                  <?php if($row2['q2']==''){?>
                 
                  <?php } else{
                  echo $row2['q2'];
                  ?>
                       <input type='hidden' name='2<?php echo $count;?>q2' value='<?php echo $row2['q2'];?>'> 
                  <?php
              }?>
                  </td>

                  <td>

                  <?php if($row2['q3']==''){?>
                
                  <?php } else{
                  echo $row2['q3'];
                  ?>
                       <input type='hidden' name='2<?php echo $count;?>q3' value='<?php echo $row2['q3'];?>'> 
                  <?php
              }?>
                  </td>
                  <td>

                  <?php if($row2['q4']==''){?>
                
                  <?php } else{
                  echo $row2['q4'];
                  ?>
                       <input type='hidden' name='2<?php echo $count;?>q4' value='<?php echo $row2['q4'];?>'> 
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
               <div class='col-md-6'>
            
            <table class='table table-bordered'>
                <tr>
                <th rowspan='2'>LEARNING AREAS</th>
                <th colspan='4'>Periodic Rating</th>
                <th rowspan='2'>final rating</th>
                </tr>

               <tr>
               <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
               </tr>
               <tr align='center'><th colspan='6' >LANGUAGE DEVELOPMENT</th></tr>
              <tr><th>LISTENING</th></tr>
              <?php

include('../connect.php');
$id21 = $rowmodal['lrn'];
$sqlget31 = "SELECT * FROM progress_report where lrn = $id21 and progress_index=3 and folder_id = $folder_id";
$sqldata31 = mysqli_query($conn, $sqlget31) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row13 = mysqli_fetch_assoc($sqldata31)) {
  if($count==19){
  break;
     } 



?>
                 <tr><td><?php echo $row13['type'];?> </td><input type='hidden' name='3<?php echo $count;?>' value='<?php echo $row13['type'];?>'>
                 <td>

                 <?php if($row13['q1']==''){?>
                 
                  <?php } else{
                  echo $row13['q1'];
                  ?>
                       <input type='hidden' name='3<?php echo $count;?>q1' value='<?php echo $row13['q1'];?>'> 
                  <?php
              }?>
              </td>
              <td>

                  <?php if($row13['q2']==''){?>
                 
                  <?php } else{
                  echo $row13['q2'];
                  ?>
                       <input type='hidden' name='3<?php echo $count;?>q2' value='<?php echo $row13['q2'];?>'> 
                  <?php
              }?>
                  </td>

                  <td>

                  <?php if($row13['q3']==''){?>
                
                  <?php } else{
                  echo $row13['q3'];
                  ?>
                       <input type='hidden' name='3<?php echo $count;?>q3' value='<?php echo $row13['q3'];?>'> 
                  <?php
              }?>
                  </td>
                  <td>

                  <?php if($row13['q4']==''){?>
                 
                  <?php } else{
                  echo $row13['q4'];
                  ?>
                       <input type='hidden' name='3<?php echo $count;?>q4' value='<?php echo $row13['q4'];?>'> 
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
                 <div class='col-md-6'>
              
              <table class='table table-bordered'>
                  <tr>
                  <th rowspan='2'>LEARNING AREAS</th>
                  <th colspan='4'>Periodic Rating</th>
                  <th rowspan='2'>final rating</th>
                  </tr>

                 <tr>
                 <th>1</th>
                  <th>2</th>
                  <th>3</th>
                  <th>4</th>
                 </tr>
                 <tr align='center'><th colspan='6' >PYSCHOMOTOR DOMAIN</th></tr>
                 <?php

include('../connect.php');
$id2 = $rowmodal['lrn'];
$sqlget4 = "SELECT * FROM progress_report where lrn = $id2 and progress_index=4 and folder_id = $folder_id";
$sqldata4 = mysqli_query($conn, $sqlget4) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row4 = mysqli_fetch_assoc($sqldata4)) {
    if($count==24){
    break;
       } 

  

?>
                   <tr><td><?php echo $row4['type'];?> </td><input type='hidden' name='4<?php echo $count;?>' value='<?php echo $row4['type'];?>'>
                   <td>

                   <?php if($row4['q1']==''){?>
                  
                    <?php } else{
                    echo $row4['q1'];
                    ?>
                         <input type='hidden' name='4<?php echo $count;?>q1' value='<?php echo $row4['q1'];?>'> 
                    <?php
                }?>
                </td>
                <td>

                    <?php if($row4['q2']==''){?>
                  
                    <?php } else{
                    echo $row4['q2'];
                    ?>
                         <input type='hidden' name='4<?php echo $count;?>q2' value='<?php echo $row4['q2'];?>'> 
                    <?php
                }?>
                    </td>

                    <td>

                    <?php if($row4['q3']==''){?>
                  
                    <?php } else{
                    echo $row4['q3'];
                    ?>
                         <input type='hidden' name='4<?php echo $count;?>q3' value='<?php echo $row4['q3'];?>'> 
                    <?php
                }?>
                    </td>
                    <td>

                    <?php if($row4['q4']==''){?>
                   
                    <?php } else{
                    echo $row4['q4'];
                    ?>
                         <input type='hidden' name='4<?php echo $count;?>q4' value='<?php echo $row4['q4'];?>'> 
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
                     <div class='col-md-6'>
              
              <table class='table table-bordered'>
                  <tr>
                  <th rowspan='2'>LEARNING AREAS</th>
                  <th colspan='4'>Periodic Rating</th>
                  <th rowspan='2'>final rating</th>
                  </tr>

                 <tr>
                 <th>1</th>
                  <th>2</th>
                  <th>3</th>
                  <th>4</th>
                 </tr>
                 <tr align='center'><th colspan='6' >PCOGNITIVE DOMAIN</th></tr>
        
                 <?php

include('../connect.php');
$id2 = $rowmodal['lrn'];
$sqlget5 = "SELECT * FROM progress_report where lrn = $id2 and progress_index=5 and folder_id = $folder_id";
$sqldata5 = mysqli_query($conn, $sqlget5) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row5 = mysqli_fetch_assoc($sqldata5)) {
    if($count==24){
    break;
       } 

  

?>
                   <tr><td><?php echo $row5['type'];?> <input type='hidden' name='5<?php echo $count;?>' value='<?php echo $row5['type'];?>'>
                   <td>

                   <?php if($row5['q1']==''){?>
                   
                    <?php } else{
                    echo $row5['q1'];
                    ?>
                         <input type='hidden' name='5<?php echo $count;?>q1' value='<?php echo $row5['q1'];?>'> 
                    <?php
                }?>
                </td>
                <td>

                    <?php if($row5['q2']==''){?>
                  
                    <?php } else{
                    echo $row5['q2'];
                    ?>
                         <input type='hidden' name='5<?php echo $count;?>q2' value='<?php echo $row5['q2'];?>'> 
                    <?php
                }?>
                    </td>

                    <td>

                    <?php if($row5['q3']==''){?>
                  
                    <?php } else{
                    echo $row5['q3'];
                    ?>
                         <input type='hidden' name='5<?php echo $count;?>q3' value='<?php echo $row5['q3'];?>'> 
                    <?php
                }?>
                    </td>
                    <td>

                    <?php if($row5['q4']==''){?>
                   
                    <?php } else{
                    echo $row5['q4'];
                    ?>
                         <input type='hidden' name='5<?php echo $count;?>q4' value='<?php echo $row5['q4'];?>'> 
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
                            <div class='col-md-6'>
              
              <table class='table table-bordered'>
                  <tr>
                  <th rowspan='2'>LEARNING AREAS</th>
                  <th colspan='4'>Periodic Rating</th>
                  <th rowspan='2'>final rating</th>
                  </tr>

                 <tr>
                 <th>1</th>
                  <th>2</th>
                  <th>3</th>
                  <th>4</th>
                 </tr>
                 <tr align='center'><th colspan='6' >BEHAVIORAL DEVELOPMENT</th></tr>
        
                 <?php

include('../connect.php');
$id2 = $rowmodal['lrn'];
$sqlget6 = "SELECT * FROM progress_report where lrn = $id2 and progress_index=6 and folder_id = $folder_id";
$sqldata6 = mysqli_query($conn, $sqlget6) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row6 = mysqli_fetch_assoc($sqldata6)) {
    if($count==24){
    break;
       } 

  

?>
                   <tr><td><?php echo $row6['type'];?> </td><input type='hidden' name='6<?php echo $count;?>' value='<?php echo $row6['type'];?>'>
                   <td>

                   <?php if($row6['q1']==''){?>
                  
                    <?php } else{
                    echo $row6['q1'];
                    ?>
                         <input type='hidden' name='6<?php echo $count;?>q1' value='<?php echo $row6['q1'];?>'> 
                    <?php
                }?>
                </td>
                <td>

                    <?php if($row6['q2']==''){?>
                
                    <?php } else{
                    echo $row6['q2'];
                    ?>
                         <input type='hidden' name='6<?php echo $count;?>q2' value='<?php echo $row6['q2'];?>'> 
                    <?php
                }?>
                    </td>

                    <td>

                    <?php if($row6['q3']==''){?>
              
                    <?php } else{
                    echo $row6['q3'];
                    ?>
                         <input type='hidden' name='6<?php echo $count;?>q3' value='<?php echo $row6['q3'];?>'> 
                    <?php
                }?>
                    </td>
                    <td>

                    <?php if($row6['q4']==''){?>
                  
                    <?php } else{
                    echo $row6['q4'];
                    ?>
                         <input type='hidden' name='6<?php echo $count;?>q4' value='<?php echo $row6['q4'];?>'> 
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

          

              

             </div>
   
       