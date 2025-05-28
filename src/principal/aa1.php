
<div class="row" style="  display: grid;
  grid-template-columns:auto auto auto;">

<div class="col-md-6" style="padding:5px;">
              
              <table style=" font-size:8px;  border: 1px solid black;
  border-collapse: collapse; width: 100%;"class="table table-bordered">
                  <tr>
                  <th style="  border: 1px solid black;
  border-collapse: collapse;" rowspan="2">LEARNING AREAS</th>
                  <th style="  border: 1px solid black;
  border-collapse: collapse;" colspan="4">Periodic Rating</th>
                  <th style="  border: 1px solid black;
  border-collapse: collapse;" rowspan="2">final rating</th>
                  </tr>

                 <tr>
                 <th style="  border: 1px solid black;
  border-collapse: collapse;">1</th>
                  <th style="  border: 1px solid black;
  border-collapse: collapse;">2</th>
                  <th style="  border: 1px solid black;
  border-collapse: collapse;">3</th>
                  <th style="  border: 1px solid black;
  border-collapse: collapse;">4</th>
                 </tr>
                 <tr align="center"><th style="  border: 1px solid black;
  border-collapse: collapse;" colspan="6" >Daily Living Skill Domain</th></tr>
                 <tr><th style="  border: 1px solid black;
  border-collapse: collapse;" colspan="6">Self feeding</th></tr>

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
                 <tr><td style="  border: 1px solid black;
  border-collapse: collapse;"><?php echo $row1['type'];?> </td><input type="hidden" name="1<?php echo $count;?>" value="<?php echo $row1['type'];?>">
                 <td style="  border: 1px solid black;
  border-collapse: collapse;">

                 <?php if($row1['q1']==''){?>
                  
              <?php } else{
                  echo $row1['q1'];
                  ?>
                       <input type="hidden" name="1<?php echo $count;?>q1" value="<?php echo $row1['q1'];?>"> 
                  <?php
              }?>
         
              </td>
              <td style="  border: 1px solid black;
  border-collapse: collapse;">

                  <?php if($row1['q2']==''){?>
                 
                  <?php } else{
                  echo $row1['q2'];
                  ?>
                       <input type="hidden" name="1<?php echo $count;?>q2" value="<?php echo $row1['q2'];?>"> 
                  <?php
              }?>
                  </td>

                  <td style="  border: 1px solid black;
  border-collapse: collapse;">

                  <?php if($row1['q3']==''){?>
               
                  <?php } else{
                  echo $row1['q3'];
                  ?>
                       <input type="hidden" name="1<?php echo $count;?>q3" value="<?php echo $row1['q3'];?>"> 
                  <?php
              }?>
                  </td>
                  <td style="  border: 1px solid black;
  border-collapse: collapse;">

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
              <div class="col-md-6" style="padding:5px;" >
            
            <table style=" font-size:8px;  border: 1px solid black;
  border-collapse: collapse; width: 100%;"class="table table-bordered">
                <tr>
                <th style="  border: 1px solid black;
  border-collapse: collapse;" rowspan="2">LEARNING AREAS</th>
                <th style="  border: 1px solid black;
  border-collapse: collapse;" colspan="4">Periodic Rating</th>
                <th style="  border: 1px solid black;
  border-collapse: collapse;" rowspan="2">final rating</th>
                </tr>

               <tr>
               <th style="  border: 1px solid black;
  border-collapse: collapse;">1</th>
                <th style="  border: 1px solid black;
  border-collapse: collapse;">2</th>
                <th style="  border: 1px solid black;
  border-collapse: collapse;">3</th>
                <th style="  border: 1px solid black;
  border-collapse: collapse;">4</th>
               </tr>
               <tr align="center"><th style="  border: 1px solid black;
  border-collapse: collapse;" colspan="6" >SOCIO-EMOTIONAL DOMAIN</th></tr>
            
               <?php

include('../connect.php');
$id2 = 1234567;
$sqlget2 = "SELECT * FROM progress_report where lrn = $id2 and progress_index=2";
$sqldata2 = mysqli_query($conn, $sqlget2) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row2 = mysqli_fetch_assoc($sqldata2)) {
  if($count==21){
  break;
     } 



?>
                 <tr><td style="  border: 1px solid black;
  border-collapse: collapse;"><?php echo $row2['type'];?> </td><input type="hidden" name="2<?php echo $count;?>" value="<?php echo $row2['type'];?>">
                 <td style="  border: 1px solid black;
  border-collapse: collapse;">

                 <?php if($row2['q1']==''){?>
               
                  <?php } else{
                  echo $row2['q1'];
                  ?>
                       <input type="hidden" name="2<?php echo $count;?>q1" value="<?php echo $row2['q1'];?>"> 
                  <?php
              }?>
              </td>
              <td style="  border: 1px solid black;
  border-collapse: collapse;">

                  <?php if($row2['q2']==''){?>
                 
                  <?php } else{
                  echo $row2['q2'];
                  ?>
                       <input type="hidden" name="2<?php echo $count;?>q2" value="<?php echo $row2['q2'];?>"> 
                  <?php
              }?>
                  </td>

                  <td style="  border: 1px solid black;
  border-collapse: collapse;">

                  <?php if($row2['q3']==''){?>
                
                  <?php } else{
                  echo $row2['q3'];
                  ?>
                       <input type="hidden" name="2<?php echo $count;?>q3" value="<?php echo $row2['q3'];?>"> 
                  <?php
              }?>
                  </td>
                  <td style="  border: 1px solid black;
  border-collapse: collapse;">

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
               <div class="col-md-6" style="padding:5px;">
            
            <table style=" font-size:8px;  border: 1px solid black;
  border-collapse: collapse; width: 100%;"class="table table-bordered">
                <tr>
                <th style="  border: 1px solid black;
  border-collapse: collapse;" rowspan="2">LEARNING AREAS</th>
                <th style="  border: 1px solid black;
  border-collapse: collapse;" colspan="4">Periodic Rating</th>
                <th style="  border: 1px solid black;
  border-collapse: collapse;" rowspan="2">final rating</th>
                </tr>

               <tr>
               <th style="  border: 1px solid black;
  border-collapse: collapse;">1</th>
                <th style="  border: 1px solid black;
  border-collapse: collapse;">2</th>
                <th style="  border: 1px solid black;
  border-collapse: collapse;">3</th>
                <th style="  border: 1px solid black;
  border-collapse: collapse;">4</th>
               </tr>
               <tr align="center"><th style="  border: 1px solid black;
  border-collapse: collapse;" colspan="6" >LANGUAGE DEVELOPMENT</th></tr>
              <tr><th style="  border: 1px solid black;
  border-collapse: collapse;">LISTENING</th></tr>
              <?php

include('../connect.php');
$id21 = 1234567;
$sqlget31 = "SELECT * FROM progress_report where lrn = $id21 and progress_index=3";
$sqldata31 = mysqli_query($conn, $sqlget31) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row13 = mysqli_fetch_assoc($sqldata31)) {
  if($count==19){
  break;
     } 



?>
                 <tr><td style="  border: 1px solid black;
  border-collapse: collapse;"><?php echo $row13['type'];?> </td><input type="hidden" name="3<?php echo $count;?>" value="<?php echo $row13['type'];?>">
                 <td style="  border: 1px solid black;
  border-collapse: collapse;">

                 <?php if($row13['q1']==''){?>
                 
                  <?php } else{
                  echo $row13['q1'];
                  ?>
                       <input type="hidden" name="3<?php echo $count;?>q1" value="<?php echo $row13['q1'];?>"> 
                  <?php
              }?>
              </td>
              <td style="  border: 1px solid black;
  border-collapse: collapse;">

                  <?php if($row13['q2']==''){?>
                 
                  <?php } else{
                  echo $row13['q2'];
                  ?>
                       <input type="hidden" name="3<?php echo $count;?>q2" value="<?php echo $row13['q2'];?>"> 
                  <?php
              }?>
                  </td>

                  <td style="  border: 1px solid black;
  border-collapse: collapse;">

                  <?php if($row13['q3']==''){?>
                
                  <?php } else{
                  echo $row13['q3'];
                  ?>
                       <input type="hidden" name="3<?php echo $count;?>q3" value="<?php echo $row13['q3'];?>"> 
                  <?php
              }?>
                  </td>
                  <td style="  border: 1px solid black;
  border-collapse: collapse;">

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

             
                 <!--FOURTH-->
                 <div class="col-md-6" style="padding:5px;">
              
              <table style=" font-size:8px;  border: 1px solid black;
  border-collapse: collapse; width: 100%;"class="table table-bordered">
                  <tr>
                  <th style="  border: 1px solid black;
  border-collapse: collapse;" rowspan="2">LEARNING AREAS</th>
                  <th style="  border: 1px solid black;
  border-collapse: collapse;" colspan="4">Periodic Rating</th>
                  <th style="  border: 1px solid black;
  border-collapse: collapse;" rowspan="2">final rating</th>
                  </tr>

                 <tr>
                 <th style="  border: 1px solid black;
  border-collapse: collapse;">1</th>
                  <th style="  border: 1px solid black;
  border-collapse: collapse;">2</th>
                  <th style="  border: 1px solid black;
  border-collapse: collapse;">3</th>
                  <th style="  border: 1px solid black;
  border-collapse: collapse;">4</th>
                 </tr>
                 <tr align="center"><th style="  border: 1px solid black;
  border-collapse: collapse;" colspan="6" >PYSCHOMOTOR DOMAIN</th></tr>
                 <?php

include('../connect.php');
$id2 = 1234567;
$sqlget4 = "SELECT * FROM progress_report where lrn = $id2 and progress_index=4";
$sqldata4 = mysqli_query($conn, $sqlget4) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row4 = mysqli_fetch_assoc($sqldata4)) {
    if($count==24){
    break;
       } 

  

?>
                   <tr><td style="  border: 1px solid black;
  border-collapse: collapse;"><?php echo $row4['type'];?> </td><input type="hidden" name="4<?php echo $count;?>" value="<?php echo $row4['type'];?>">
                   <td style="  border: 1px solid black;
  border-collapse: collapse;">

                   <?php if($row4['q1']==''){?>
                  
                    <?php } else{
                    echo $row4['q1'];
                    ?>
                         <input type="hidden" name="4<?php echo $count;?>q1" value="<?php echo $row4['q1'];?>"> 
                    <?php
                }?>
                </td>
                <td style="  border: 1px solid black;
  border-collapse: collapse;">

                    <?php if($row4['q2']==''){?>
                  
                    <?php } else{
                    echo $row4['q2'];
                    ?>
                         <input type="hidden" name="4<?php echo $count;?>q2" value="<?php echo $row4['q2'];?>"> 
                    <?php
                }?>
                    </td>

                    <td style="  border: 1px solid black;
  border-collapse: collapse;">

                    <?php if($row4['q3']==''){?>
                  
                    <?php } else{
                    echo $row4['q3'];
                    ?>
                         <input type="hidden" name="4<?php echo $count;?>q3" value="<?php echo $row4['q3'];?>"> 
                    <?php
                }?>
                    </td>
                    <td style="  border: 1px solid black;
  border-collapse: collapse;">

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
                     <div class="col-md-6" style="padding:5px;">
              
              <table style=" font-size:8px;  border: 1px solid black;
  border-collapse: collapse; width: 100%;"class="table table-bordered">
                  <tr>
                  <th style="  border: 1px solid black;
  border-collapse: collapse;" rowspan="2">LEARNING AREAS</th>
                  <th style="  border: 1px solid black;
  border-collapse: collapse;" colspan="4">Periodic Rating</th>
                  <th style="  border: 1px solid black;
  border-collapse: collapse;" rowspan="2">final rating</th>
                  </tr>

                 <tr>
                 <th style="  border: 1px solid black;
  border-collapse: collapse;">1</th>
                  <th style="  border: 1px solid black;
  border-collapse: collapse;">2</th>
                  <th style="  border: 1px solid black;
  border-collapse: collapse;">3</th>
                  <th style="  border: 1px solid black;
  border-collapse: collapse;">4</th>
                 </tr>
                 <tr align="center"><th style="  border: 1px solid black;
  border-collapse: collapse;" colspan="6" >PCOGNITIVE DOMAIN</th></tr>
        
                 <?php

include('../connect.php');
$id2 = 1234567;
$sqlget5 = "SELECT * FROM progress_report where lrn = $id2 and progress_index=5";
$sqldata5 = mysqli_query($conn, $sqlget5) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row5 = mysqli_fetch_assoc($sqldata5)) {
    if($count==24){
    break;
       } 

  

?>
                   <tr><td style="  border: 1px solid black;
  border-collapse: collapse;"><?php echo $row5['type'];?> <input type="hidden" name="5<?php echo $count;?>" value="<?php echo $row5['type'];?>">
                   <td style="  border: 1px solid black;
  border-collapse: collapse;">

                   <?php if($row5['q1']==''){?>
                   
                    <?php } else{
                    echo $row5['q1'];
                    ?>
                         <input type="hidden" name="5<?php echo $count;?>q1" value="<?php echo $row5['q1'];?>"> 
                    <?php
                }?>
                </td>
                <td style="  border: 1px solid black;
  border-collapse: collapse;">

                    <?php if($row5['q2']==''){?>
                  
                    <?php } else{
                    echo $row5['q2'];
                    ?>
                         <input type="hidden" name="5<?php echo $count;?>q2" value="<?php echo $row5['q2'];?>"> 
                    <?php
                }?>
                    </td>

                    <td style="  border: 1px solid black;
  border-collapse: collapse;">

                    <?php if($row5['q3']==''){?>
                  
                    <?php } else{
                    echo $row5['q3'];
                    ?>
                         <input type="hidden" name="5<?php echo $count;?>q3" value="<?php echo $row5['q3'];?>"> 
                    <?php
                }?>
                    </td>
                    <td style="  border: 1px solid black;
  border-collapse: collapse;">

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
                            <div class="col-md-6" style="padding:5px;">
              
              <table style=" font-size:8px;  border: 1px solid black;
  border-collapse: collapse; width: 100%;"class="table table-bordered">
                  <tr>
                  <th style="  border: 1px solid black;
  border-collapse: collapse;" rowspan="2">LEARNING AREAS</th>
                  <th style="  border: 1px solid black;
  border-collapse: collapse;" colspan="4">Periodic Rating</th>
                  <th style="  border: 1px solid black;
  border-collapse: collapse;" rowspan="2">final rating</th>
                  </tr>

                 <tr>
                 <th style="  border: 1px solid black;
  border-collapse: collapse;">1</th>
                  <th style="  border: 1px solid black;
  border-collapse: collapse;">2</th>
                  <th style="  border: 1px solid black;
  border-collapse: collapse;">3</th>
                  <th style="  border: 1px solid black;
  border-collapse: collapse;">4</th>
                 </tr>
                 <tr align="center"><th colspan="6" >BEHAVIORAL DEVELOPMENT</th></tr>
        
                 <?php

include('../connect.php');
$id2 = 1234567;
$sqlget6 = "SELECT * FROM progress_report where lrn = $id2 and progress_index=6";
$sqldata6 = mysqli_query($conn, $sqlget6) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row6 = mysqli_fetch_assoc($sqldata6)) {
    if($count==24){
    break;
       } 

  

?>
                   <tr><td style="  border: 1px solid black;
  border-collapse: collapse;"><?php echo $row6['type'];?> </td><input type="hidden" name="6<?php echo $count;?>" value="<?php echo $row6['type'];?>">
                   <td style="  border: 1px solid black;
  border-collapse: collapse;">

                   <?php if($row6['q1']==''){?>
                  
                    <?php } else{
                    echo $row6['q1'];
                    ?>
                         <input type="hidden" name="6<?php echo $count;?>q1" value="<?php echo $row6['q1'];?>"> 
                    <?php
                }?>
                </td>
                <td style="  border: 1px solid black;
  border-collapse: collapse;">

                    <?php if($row6['q2']==''){?>
                
                    <?php } else{
                    echo $row6['q2'];
                    ?>
                         <input type="hidden" name="6<?php echo $count;?>q2" value="<?php echo $row6['q2'];?>"> 
                    <?php
                }?>
                    </td>

                    <td style="  border: 1px solid black;
  border-collapse: collapse;">

                    <?php if($row6['q3']==''){?>
              
                    <?php } else{
                    echo $row6['q3'];
                    ?>
                         <input type="hidden" name="6<?php echo $count;?>q3" value="<?php echo $row6['q3'];?>"> 
                    <?php
                }?>
                    </td>
                    <td style="  border: 1px solid black;
  border-collapse: collapse;">

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

               <!--teacher remarks-->

          
               <div class="col-md-12" align="center" style="padding:5px;">
TEACHERS REMARK
<?php 
include('../connect.php');
$id123 = 1234567;
$sqlget123 = "SELECT * FROM teachers_remark where lrn = $id123";
$sqldata123 = mysqli_query($conn, $sqlget123) or die('Error Displaying Data'. mysqli_connect_error());

while ($row123 = mysqli_fetch_assoc($sqldata123)) {
?>
<div class="row" align="center" style="  display: grid;
  grid-template-columns: auto auto ;">
    <div><img src="../img/legend.jpg" width="50%" class="img-fluid" alt=""></div>
    <div>
               <table style=" font-size:8px;  border: 1px solid black;
  border-collapse: collapse; width: 100%;"class="table" style="text-align:center;">
                <tr>
                    <th style="  border: 1px solid black;
  border-collapse: collapse;">QUARTER</th>
                    <th style="  border: 1px solid black;
  border-collapse: collapse;">REMARKS</th>
                </tr>

                <input type="hidden" name="remark_id" value="<?php echo $row123['remark_id'];?>">
                <input type="hidden" name="remark_q1" value="<?php echo $row123['remark_q1'];?>">
                <input type="hidden" name="remark_q2" value="<?php echo $row123['remark_q2'];?>">
                <input type="hidden" name="remark_q3" value="<?php echo $row123['remark_q3'];?>">
                <input type="hidden" name="remark_q4" value="<?php echo $row123['remark_q4'];?>">

                <tr>
                    <td style="  border: 1px solid black;
  border-collapse: collapse;">1st</td>
                    <td style="  border: 1px solid black;
  border-collapse: collapse;"><?php echo $row123['remark_q1'];?></td>
                </tr>
                <tr>
                    <td style="  border: 1px solid black;
  border-collapse: collapse;">2nd</td>
                    <td style="  border: 1px solid black;
  border-collapse: collapse;"><?php echo $row123['remark_q2'];?></td>
                </tr>
                <tr>
                    <td style="  border: 1px solid black;
  border-collapse: collapse;">3rd</td>
                    <td style="  border: 1px solid black;
  border-collapse: collapse;"><?php echo $row123['remark_q3'];?></td>
                </tr>
                <tr>
                    <td style="  border: 1px solid black;
  border-collapse: collapse;">4th</td>
                    <td style="  border: 1px solid black;
  border-collapse: collapse;"><?php echo $row123['remark_q4'];?></td>
                </tr>
               </table>
               </div>
               </div>
               <?php }?>

               </div>
              

             </div>
       