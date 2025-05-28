<?php include('include/head.php') ?>

<body class="hold-transition skin-blue sidebar-mini">


<?php include('include/header.php') ?>
<?php include('include/user_panel.php')?>
<?php include('include/side_navigation.php')?>
<?php 
               
                $start_week = $_GET['start_date'];
                $end_week = $_GET['end_date'];
                $week_id = $_GET['week_id'];

                ?>

<div class="content-wrapper">
<section class="content" >
          <div class="box box-solid ">
            <div class="box-header with-border hidethis">
              <button class="btn btn-primary pull-right hidethis"  type="button" 
            id="btPrint" onclick="window.print()" ><span class="glyphicon glyphicon-print"></span>&nbsp&nbsp&nbsp&nbspPrint this Page</button>
                <form action="accomplishment.php">
              <h3 class="box-title hidethis">Print Report</h3>
            
                <button type="submit" class="btn btn-warning pull-right hidethis" style="width:100px;">Back</button>
              </form>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div style="text-align:center">
                <p><span style="font:10px Calibri">Republic of the Philippines<br></span>
                <span style="font:16px Old English Text MT; "><b> Laguna State Polytechnic University</b><br></span>
                <span style="font:11px Calibri"> Province of Laguna<br></span>
                <span style="font:12px Calibri"><b>WEEKLY ACCOMPLISHMENT REPORT</span></b></p><br>

                <p style="font:11px Calibri">COLLEGE OF COMPUTER STUDIES</p>
              </div>
              <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="font: bold 12px Calibri; text-align: center;width:10%">DATE</th>              
                  <th style="font: bold 12px Calibri; text-align: center;width:25%">OBJECTIVES</th>
                  <th style="font: bold 12px Calibri; text-align: center;width:25%">ACTIVITIES</th>
                   <th style="font: bold 12px Calibri; text-align: center;width:25%">ACCOMPLISHMENTS</th>
                   <th style="font: bold 12px Calibri; text-align: center;width:15%">ATTACHMENTS</th>
                    
                </tr>
                <?php
                  $mysqli = new mysqli("sql306.epizy.com","epiz_27746872","sejX46F8iM5GI","epiz_27746872_conneccs_db");

                          if ($mysqli -> connect_errno) {
                            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                            exit();
                          }
                          $display_week = "SELECT * FROM report_accomplishment WHERE report_accomplisshment_week_id = '$week_id' ";

                           $result = mysqli_query($mysqli, $display_week);
                           $resultcheck = mysqli_num_rows($result);

                           if ($resultcheck > 0) { 
                           while ($row = mysqli_fetch_assoc($result)){ 
                           $start_date = $row['report_accomplishment_date_start'];
                           $end_date = $row['report_accomplishment_date_end'];
                           $objective = $row['report_accomplishment_objective'];
                           $activity = $row['report_accomplishment_activity'];
                           $accomplished = $row['report_accomplishment_accomplished'];
                           $report_id = $row['report_accomplishment_id'];
                           $week_ = $row['report_accomplisshment_week_id'];
                           $attached = $row['report_accomplishment_attachment'];
                          
                          
                           echo "<tr>
                           <td style='font: bold 10px Calibri;'>($start_date) &nbspTO&nbsp ($end_date)</td>
                           <td style='font: bold 10px Calibri;'>$objective</td>
                           <td style='font: bold 10px Calibri;'>$activity</td>
                           <td style='font: bold 10px Calibri;'>$accomplished</td>
                         
                           <td style='font: bold 10px Calibri;'>$attached</td>

                           </tr>

                           ";
                         }
                       }
                          ?>

              </table>
            </div>
                        <div style="margin-left: 20px;margin-top:30px">
                            <?php $mysqli = new mysqli("sql306.epizy.com","epiz_27746872","sejX46F8iM5GI","epiz_27746872_conneccs_db");

                          if ($mysqli -> connect_errno) {
                            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                            exit();
                          }
                          $select_name = "SELECT * FROM profile_faculty WHERE faculty_id = '$user_id'";
                          $res_name = mysqli_query($mysqli, $select_name);
                          if($res_name){
                            while($row = mysqli_fetch_assoc($res_name)){
                              $fname = $row['teacher_fname'];
                              $lname = $row['teacher_lname'];
                            }
                          }
                         ?>
                         
                              <p><span style="font: bold 10px Arial;"> Prepared by: &nbsp&nbsp</span><span style="font: bold 11px Arial; text-decoration: underline;"><?php echo "$fname"; ?>&nbsp<?php echo "$lname"; ?> </span>
                          
                              <span  style="font: bold 10px Arial; margin-left: 300px"> Reviewed by: &nbsp&nbsp</span><span style="font: bold 11px Arial; text-decoration: underline;">REYNALEN C. JUSTO,  MM-ITM,LPT</span></p>

                              <p><span style="font: bold 10px Arial; margin-left: 100px">&nbsp&nbsp</span><span style="font: bold 11px Arial;">Faculty </span>
                          
                              <span  style="font: bold 11px Arial; margin-left: 400px"> College Dean/Associate Dean</span></p>
                          
                        </div>

              

            
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        	</section>
        </div>



<
<?php include('include/side_navigation_control.php')?>
<?php include('include/scripts.php')?>

</body>
</html>