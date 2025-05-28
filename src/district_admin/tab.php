<div class="tab-pane fade" id="progresschart" role="tabpanel" aria-labelledby="progress-tab">
    <div class="row">
        <!-- chart1 -->
      <div class="col-md-12 border">
        <div class="row">
            <!-- label -->
          <div class="col-md-4" align="left">
          <?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=1";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=0;
while ($row1 = mysqli_fetch_assoc($sqldata)) {
            $count++;
            $a= "<p>".$count.". ".$row1['type']."</p>";
            echo $a;
                if($count==13){
                break;
                } 
                

            
                }
?>
          </div>
          <!-- label -->
          <div class="col-md-8"><canvas id="lineChart"></canvas></div>
        </div>
  </div>
   <!-- chart1 -->

    <!-- chart2 -->

  <div class="col-md-12 border" align="left">
        <div class="row">
          <div class="col-md-4">
          <?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=1";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=0;
while ($row1 = mysqli_fetch_assoc($sqldata)) {
                    $count++;  
                    if($count>=14){
                                $a= "<p>".$count.". ".$row1['type']."</p>";
                                echo $a;          
                    }
                    if($count==25){
                    break;
                    } 

                
                    }
?>
          </div>
          <div class="col-md-8">  <canvas id="lineChart1"></canvas></div>
        </div>
      </div>
       <!-- chart2 -->
    </div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    //line
var ctxL = document.getElementById("lineChart").getContext('2d');
var myLineChart = new Chart(ctxL, {
  type: 'bar',
  data: {
    labels: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=1";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

   


        if($count==1){
            $a= "'".$count."'";
            $count++;
            echo $a;
    
    
        }
        else{
            
            echo ",'".$count."'";
            $count++;
        }

     



    if($count==14){
    break;
       } 

  
    }
?>],
    datasets: [{
      label: "Quarter 1",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=1";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {




        if($count==1){
            if($row1['q1']=='P'){
                echo 4;

                $count++;
            }
            if($row1['q1']=='A'){
                echo 3;

                $count++;
            }

            if($row1['q1']=='D'){
                echo 2;

                $count++;
            }

            if($row1['q1']=='B'){
                echo 1;

                $count++;
            }
            
           
           
    
    
        }
        else {
            if($row1['q1']=='P'){
                $n=4;
                echo ",".$n;
       

               
            }
            if($row1['q1']=='A'){
                $n=3;
                echo ",".$n;
        

            }

            if($row1['q1']=='D'){
                $n=2;
                echo ",".$n;
          

            }

            if($row1['q1']=='B'){
                $n=1;
                echo ",".$n;
             

              
            }
          
        }
        $count++;
     





    if($count==13){
    break;
       } 

  
    }
?>],
      backgroundColor: [
        'rgba(105, 0, 132, .2)',
      ],
      borderColor: [
        'rgba(200, 99, 132, .7)',
      ],
      borderWidth: 2
    },
    {
      label: "QUARTER 2",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=1";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

   


        if($count==1){
            if($row1['q2']=='P'){
                echo 4;

                $count++;
            }
            if($row1['q2']=='A'){
                echo 3;

                $count++;
            }

            if($row1['q2']=='D'){
                echo 2;

                $count++;
            }

            if($row1['q2']=='B'){
                echo 4;

                $count++;
            }
            
           
           
    
    
        }
        else {
            if($row1['q2']=='P'){
                $n=4;
                echo ",".$n;
                $count++;

               
            }
            if($row1['q2']=='A'){
                $n=3;
                echo ",".$n;
                $count++;

            }

            if($row1['q2']=='D'){
                $n=2;
                echo ",".$n;
                $count++;

            }

            if($row1['q2']=='B'){
                $n=1;
                echo ",".$n;
                $count++;

              
            }
        }

     





    if($count==7){
    break;
       } 

  
    }
?>],
      backgroundColor: [
        'rgba(0, 137, 132, .2)',
      ],
      borderColor: [
        'rgba(0, 10, 130, .7)',
      ],
      borderWidth: 2
    }
    ]
  },
  options: {
    responsive: true
  }
});
</script>

<script>
    //line
var ctxL = document.getElementById("lineChart1").getContext('2d');
var myLineChart = new Chart(ctxL, {
  type: 'bar',
  data: {
    labels: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=1";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=0;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

  $count++;


        if($count==14){
            $a= "'".$count."'";
            $count++;
            echo $a;
    
    
        }
        else if($count>13){
            
            echo ",'".$count."'";
          
        }

     





    if($count==25){
    break;
       } 

  
    }
?>],
    datasets: [{
      label: "Quarter 1",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=1";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

   


        if($count==7){
            if($row1['q1']=='P'){
                echo 4;

                $count++;
            }
            if($row1['q1']=='A'){
                echo 3;

                $count++;
            }

            if($row1['q1']=='D'){
                echo 2;

                $count++;
            }

            if($row1['q1']=='B'){
                echo 4;

                $count++;
            }
            
           
           
    
    
        }
        else if($count>7){
            if($row1['q1']=='P'){
                $n=4;
                echo ",".$n;

               
            }
            if($row1['q1']=='A'){
                $n=3;
                echo ",".$n;

            }

            if($row1['q1']=='D'){
                $n=2;
                echo ",".$n;

            }

            if($row1['q1']=='B'){
                $n=1;
                echo ",".$n;

              
            }
        }
        $count++;

     





    if($count==14){
    break;
       } 

  
    }
?>],
      backgroundColor: [
        'rgba(105, 0, 132, .2)',
      ],
      borderColor: [
        'rgba(200, 99, 132, .7)',
      ],
      borderWidth: 2
    },
    {
      label: "QUARTER 2",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=1";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

   


        if($count==1){
            if($row1['q2']=='P'){
                echo 4;

                $count++;
            }
            if($row1['q2']=='A'){
                echo 3;

                $count++;
            }

            if($row1['q2']=='D'){
                echo 2;

                $count++;
            }

            if($row1['q2']=='B'){
                echo 4;

                $count++;
            }
            
           
           
    
    
        }
        else if($count==2){
            if($row1['q2']=='P'){
                $n=4;
                echo ",".$n;

               
            }
            if($row1['q2']=='A'){
                $n=3;
                echo ",".$n;

            }

            if($row1['q2']=='D'){
                $n=2;
                echo ",".$n;

            }

            if($row1['q2']=='B'){
                $n=1;
                echo ",".$n;

              
            }
        }

     





    if($count==26){
    break;
       } 

  
    }
?>],
      backgroundColor: [
        'rgba(0, 137, 132, .2)',
      ],
      borderColor: [
        'rgba(0, 10, 130, .7)',
      ],
      borderWidth: 2
    }
    ]
  },
  options: {
    responsive: true
  }
});
</script>
</div>

    <!--Assessent tab-->