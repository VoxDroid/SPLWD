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
                    <h4>Progress Chart</h4>



<ul class="nav nav-tabs ml-2" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#aa1" role="tab" aria-controls="home"
      aria-selected="true">DAILY LIVING SKILLS</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="progress-tab" data-toggle="tab" href="#aa2" role="tab" aria-controls="progress"
      aria-selected="false">SOCIO-EMOTIONAL</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" id="progress-tab" data-toggle="tab" href="#aa3" role="tab" aria-controls="progress"
      aria-selected="false">LANGUAGE DEVELOPMENT</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#aa4" role="tab" aria-controls="profile"
      aria-selected="false">PYSCHOMOTOR</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" id="progress-tab" data-toggle="tab" href="#aa5" role="tab" aria-controls="progress"
      aria-selected="false">COGNITIVE</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#aa6" role="tab" aria-controls="profile"
      aria-selected="false">BEHAVIORAL DEVELOPMENT</a>
  </li>


</ul>

<div class="tab-content" align="center"id="myTabContent">

<!-- aa2 -->
<div class="tab-pane fade container-fluid" align="center" id="aa2" role="tabpanel" aria-labelledby="home-tab">

<div class="row">
        <!-- chart1 -->
      <div class="col-md-12 border">
        <div class="row">
            <!-- label -->
          <div class="col-md-4" align="left">
          <?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=2";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=0;
while ($row1 = mysqli_fetch_assoc($sqldata)) {
            $count++;
            $a= "<p>".$count.". ".$row1['type']."</p>";
            echo $a;
                if($count==10){ break; } 
    }
?>
          </div>
          <!-- label -->
          <div class="col-md-8"><canvas id="lineChart3"></canvas></div>
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
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=2";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=0;
while ($row1 = mysqli_fetch_assoc($sqldata)) {
                    $count++;  
                    if($count>=11){
                                $a= "<p>".$count.". ".$row1['type']."</p>";
                                echo $a;          
                    }
                    if($count==25){
                    break;
                    } 

                
                    }
?>
          </div>
          <div class="col-md-8">  <canvas id="lineChart4"></canvas></div>
        </div>
      </div>
       <!-- chart2 -->
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    //line
var ctxL = document.getElementById("lineChart3").getContext('2d');
var myLineChart = new Chart(ctxL, {
  type: 'bar',
  data: {
    labels: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=2";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

        if($count==1){ $a= "'".$count."'"; $count++; echo $a;}
        else{ echo ",'".$count."'"; $count++; }

    if($count==14){ break; } }
?>],
    datasets: [{
      
      label: "Quarter 1",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=2";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

  if($count==1){
            if($row1['q1']=='P'){ echo 4;  }
            if($row1['q1']=='AP'){ echo 3;  }
            if($row1['q1']=='D'){ echo 2; }
            if($row1['q1']=='B'){ echo 1;  }
        }
        else {
            if($row1['q1']=='P'){ $n=4; echo ",".$n; }
            if($row1['q1']=='AP'){ $n=3; echo ",".$n; }
            if($row1['q1']=='D'){ $n=2; echo ",".$n; }
            if($row1['q1']=='B'){ $n=1; echo ",".$n; } 
        }
        $count++;
    if($count==10){ break; } 
    }
?>],
      backgroundColor: [
        '#10A19D',
      ],
      borderColor: [
        'white',
      ],
      borderWidth: 2
    },
    {
      
      label: "Quarter 2",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=2";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

  if($count==1){
            if($row1['q2']=='P'){ echo 4; }
            if($row1['q2']=='AP'){ echo 3;  }
            if($row1['q2']=='D'){ echo 2;  }
            if($row1['q2']=='B'){ echo 1;  }
        }
        else {
            if($row1['q2']=='P'){ $n=4; echo ",".$n; }
            if($row1['q2']=='AP'){ $n=3; echo ",".$n; }
            if($row1['q2']=='D'){ $n=2; echo ",".$n; }
            if($row1['q2']=='B'){ $n=1; echo ",".$n; } 
        }
        $count++;
    if($count==10){ break; } 
    }
?>],
      backgroundColor: [
        '#540375',
      ],
      borderColor: [
        'white',
      ],
      borderWidth: 2
    },
    {
      
      label: "Quarter 3",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=2";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

  if($count==1){
            if($row1['q3']=='P'){ echo 4;  }
            if($row1['q3']=='AP'){ echo 3;  }
            if($row1['q3']=='D'){ echo 2; }
            if($row1['q3']=='B'){ echo 1; ; }
        }
        else {
            if($row1['q3']=='P'){ $n=4; echo ",".$n; }
            if($row1['q3']=='AP'){ $n=3; echo ",".$n; }
            if($row1['q3']=='D'){ $n=2; echo ",".$n; }
            if($row1['q3']=='B'){ $n=1; echo ",".$n; } 
        }
        $count++;
    if($count==10){ break; } 
    }
?>],
      backgroundColor: [ '#FF7000',],
      borderColor: [ 'white',],
      borderWidth: 2
    },
    {
      label: "QUARTER 4",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=2";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

   


        if($count==1){
            if($row1['q4']=='P'){ echo 4; }
            if($row1['q4']=='AP'){ echo 3;  }
            if($row1['q4']=='D'){ echo 2; }
            if($row1['q4']=='B'){ echo 4; }
        }
        else {
            if($row1['q4']=='P'){ $n=4; echo ",".$n;  }
            if($row1['q4']=='AP'){ $n=3; echo ",".$n;  }
            if($row1['q4']=='D'){ $n=2; echo ",".$n;  }
            if($row1['q4']=='B'){ $n=1; echo ",".$n;  }
        }

        $count++;

    if($count==10){ break; } 
    }
?>],
      backgroundColor: [ '#FFBF00',],
      borderColor: ['white',],
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
var ctxL = document.getElementById("lineChart4").getContext('2d');
var myLineChart = new Chart(ctxL, {
  type: 'bar',
  data: {
    labels: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=2";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=0;
while ($row1 = mysqli_fetch_assoc($sqldata)) {
  $count++;
        if($count==11){ $a= "'".$count."'"; echo $a;}
        else if($count>11){ echo ",'".$count."'";}
   
       
        
}
?>],
    datasets: [{
      label: "Quarter 1",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=2";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {



        if($count==11){
            if($row1['q1']=='P'){ echo 4;  }
            if($row1['q1']=='AP'){ echo 3; }
            if($row1['q1']=='D'){ echo 2; }
            if($row1['q1']=='B'){ echo 1; }
                     }
        else if($count>11){
            if($row1['q1']=='P'){ $n=4; echo ",".$n; }
            if($row1['q1']=='AP'){ $n=3; echo ",".$n; }
            if($row1['q1']=='D'){ $n=2; echo ",".$n; }
            if($row1['q1']=='B'){ $n=1; echo ",".$n; }
                         } 
                         $count++;
        if($count==26){ break; } 
    }
?>],
      backgroundColor: [ '#10A19D',],
      borderColor: ['white',],
      borderWidth: 2
    },

    {
      label: "Quarter 2",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=2";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {



        if($count==11){
            if($row1['q2']=='P'){ echo 4;  }
            if($row1['q2']=='AP'){ echo 3; }
            if($row1['q2']=='D'){ echo 2; }
            if($row1['q2']=='B'){ echo 1; }
                     }
        else if($count>11){
            if($row1['q2']=='P'){ $n=4; echo ",".$n; }
            if($row1['q2']=='AP'){ $n=3; echo ",".$n; }
            if($row1['q2']=='D'){ $n=2; echo ",".$n; }
            if($row1['q2']=='B'){ $n=1; echo ",".$n; }
                         } 
                         $count++;
        if($count==26){ break; } 
    }
?>],
      backgroundColor: [ '#540375',],
      borderColor: ['white',],
      borderWidth: 2
    },

    {
      label: "Quarter 3",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=2";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {



        if($count==11){
            if($row1['q3']=='P'){ echo 4;  }
            if($row1['q3']=='AP'){ echo 3; }
            if($row1['q3']=='D'){ echo 2; }
            if($row1['q3']=='B'){ echo 1; }
                     }
        else if($count>11){
            if($row1['q3']=='P'){ $n=4; echo ",".$n; }
            if($row1['q3']=='AP'){ $n=3; echo ",".$n; }
            if($row1['q3']=='D'){ $n=2; echo ",".$n; }
            if($row1['q3']=='B'){ $n=1; echo ",".$n; }
                         } 
                         $count++;
        if($count==26){ break; } 
    }
?>],
      backgroundColor: [ '#FF7000',],
      borderColor: ['white',],
      borderWidth: 2
    },
    {
      label: "QUARTER 4",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=2";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

        if($count==11){
            if($row1['q4']=='P'){ echo 4; }
            if($row1['q4']=='AP'){ echo 3;  }
            if($row1['q4']=='D'){ echo 2; }
            if($row1['q4']=='B'){ echo 1; } 
        }
        else if($count > 11){
            if($row1['q4']=='P'){ $n=4; echo ",".$n; }
            if($row1['q4']=='A'){ $n=3; echo ",".$n; }
            if($row1['q4']=='D'){ $n=2; echo ",".$n; }
            if($row1['q4']=='B'){ $n=1; echo ",".$n; }
        }

        $count++;
    if($count==26){ break; } 
                                              }
?>],
      backgroundColor: [
        '#FFBF00',
      ],
      borderColor: [
        'white',
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
<!--aa2 -->


<!-- aa3 -->
<div class="tab-pane fade container-fluid" align="center" id="aa3" role="tabpanel" aria-labelledby="home-tab">


<div class="row">
        <!-- chart1 -->
      <div class="col-md-12 border">
        <div class="row">
            <!-- label -->
          <div class="col-md-4" align="left">
          <?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=3";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=0;
while ($row1 = mysqli_fetch_assoc($sqldata)) {
            $count++;
            $a= "<p>".$count.". ".$row1['type']."</p>";
            echo $a;
                if($count==10){ break; } 
    }
?>
          </div>
          <!-- label -->
          <div class="col-md-8"><canvas id="lineChart5"></canvas></div>
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
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=3";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=0;
while ($row1 = mysqli_fetch_assoc($sqldata)) {
                    $count++;  
                    if($count>=10){
                                $a= "<p>".$count.". ".$row1['type']."</p>";
                                echo $a;          
                    }
                    if($count==25){
                    break;
                    } 

                
                    }
?>
          </div>
          <div class="col-md-8">  <canvas id="lineChart6"></canvas></div>
        </div>
      </div>
       <!-- chart2 -->
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    //line
var ctxL = document.getElementById("lineChart5").getContext('2d');
var myLineChart = new Chart(ctxL, {
  type: 'bar',
  data: {
    labels: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=3";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

        if($count==1){ $a= "'".$count."'"; $count++; echo $a;}
        else{ echo ",'".$count."'"; $count++; }

    if($count==10){ break; } }
?>],
    datasets: [{
      
      label: "Quarter 1",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=3";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

  if($count==1){
            if($row1['q1']=='P'){ echo 4;  }
            if($row1['q1']=='AP'){ echo 3;  }
            if($row1['q1']=='D'){ echo 2; }
            if($row1['q1']=='B'){ echo 1;  }
        }
        else {
            if($row1['q1']=='P'){ $n=4; echo ",".$n; }
            if($row1['q1']=='AP'){ $n=3; echo ",".$n; }
            if($row1['q1']=='D'){ $n=2; echo ",".$n; }
            if($row1['q1']=='B'){ $n=1; echo ",".$n; } 
        }
        $count++;
    if($count==10){ break; } 
    }
?>],
      backgroundColor: [
        '#10A19D',
      ],
      borderColor: [
        'white',
      ],
      borderWidth: 2
    },
    {
      
      label: "Quarter 2",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=3";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

  if($count==1){
            if($row1['q2']=='P'){ echo 4; }
            if($row1['q2']=='AP'){ echo 3;  }
            if($row1['q2']=='D'){ echo 2;  }
            if($row1['q2']=='B'){ echo 1;  }
        }
        else {
            if($row1['q2']=='P'){ $n=4; echo ",".$n; }
            if($row1['q2']=='AP'){ $n=3; echo ",".$n; }
            if($row1['q2']=='D'){ $n=2; echo ",".$n; }
            if($row1['q2']=='B'){ $n=1; echo ",".$n; } 
        }
        $count++;
    if($count==10){ break; } 
    }
?>],
      backgroundColor: [
        '#540375',
      ],
      borderColor: [
        'white',
      ],
      borderWidth: 2
    },
    {
      
      label: "Quarter 3",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=3";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

  if($count==1){
            if($row1['q3']=='P'){ echo 4;  }
            if($row1['q3']=='AP'){ echo 3;  }
            if($row1['q3']=='D'){ echo 2; }
            if($row1['q3']=='B'){ echo 1; ; }
        }
        else {
            if($row1['q3']=='P'){ $n=4; echo ",".$n; }
            if($row1['q3']=='AP'){ $n=3; echo ",".$n; }
            if($row1['q3']=='D'){ $n=2; echo ",".$n; }
            if($row1['q3']=='B'){ $n=1; echo ",".$n; } 
        }
        $count++;
    if($count==10){ break; } 
    }
?>],
      backgroundColor: [ '#FF7000',],
      borderColor: [ 'white',],
      borderWidth: 2
    },
    {
      label: "QUARTER 4",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=3";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

   


        if($count==1){
            if($row1['q4']=='P'){ echo 4; }
            if($row1['q4']=='AP'){ echo 3;  }
            if($row1['q4']=='D'){ echo 2; }
            if($row1['q4']=='B'){ echo 4; }
        }
        else {
            if($row1['q4']=='P'){ $n=4; echo ",".$n;  }
            if($row1['q4']=='AP'){ $n=3; echo ",".$n;  }
            if($row1['q4']=='D'){ $n=2; echo ",".$n;  }
            if($row1['q4']=='B'){ $n=1; echo ",".$n;  }
        }

        $count++;

    if($count==10){ break; } 
    }
?>],
      backgroundColor: [ '#FFBF00',],
      borderColor: ['white',],
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
var ctxL = document.getElementById("lineChart6").getContext('2d');
var myLineChart = new Chart(ctxL, {
  type: 'bar',
  data: {
    labels: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=3";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=0;
while ($row1 = mysqli_fetch_assoc($sqldata)) {
  $count++;
        if($count==10){ $a= "'".$count."'"; echo $a;}
        else if($count>10){ echo ",'".$count."'";}
   
       
        
}
?>],
    datasets: [{
      label: "Quarter 1",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=3";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {



        if($count==10){
            if($row1['q1']=='P'){ echo 4;  }
            if($row1['q1']=='AP'){ echo 3; }
            if($row1['q1']=='D'){ echo 2; }
            if($row1['q1']=='B'){ echo 1; }
                     }
        else if($count>10){
            if($row1['q1']=='P'){ $n=4; echo ",".$n; }
            if($row1['q1']=='AP'){ $n=3; echo ",".$n; }
            if($row1['q1']=='D'){ $n=2; echo ",".$n; }
            if($row1['q1']=='B'){ $n=1; echo ",".$n; }
                         } 
                         $count++;
        if($count==26){ break; } 
    }
?>],
      backgroundColor: [ '#10A19D',],
      borderColor: ['white',],
      borderWidth: 2
    },

    {
      label: "Quarter 2",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=3";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {



        if($count==10){
            if($row1['q2']=='P'){ echo 4;  }
            if($row1['q2']=='AP'){ echo 3; }
            if($row1['q2']=='D'){ echo 2; }
            if($row1['q2']=='B'){ echo 1; }
                     }
        else if($count>10){
            if($row1['q2']=='P'){ $n=4; echo ",".$n; }
            if($row1['q2']=='AP'){ $n=3; echo ",".$n; }
            if($row1['q2']=='D'){ $n=2; echo ",".$n; }
            if($row1['q2']=='B'){ $n=1; echo ",".$n; }
                         } 
                         $count++;
        if($count==26){ break; } 
    }
?>],
      backgroundColor: [ '#540375',],
      borderColor: ['white',],
      borderWidth: 2
    },

    {
      label: "Quarter 3",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=3";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {



        if($count==10){
            if($row1['q3']=='P'){ echo 4;  }
            if($row1['q3']=='AP'){ echo 3; }
            if($row1['q3']=='D'){ echo 2; }
            if($row1['q3']=='B'){ echo 1; }
                     }
        else if($count>10){
            if($row1['q3']=='P'){ $n=4; echo ",".$n; }
            if($row1['q3']=='AP'){ $n=3; echo ",".$n; }
            if($row1['q3']=='D'){ $n=2; echo ",".$n; }
            if($row1['q3']=='B'){ $n=1; echo ",".$n; }
                         } 
                         $count++;
        if($count==26){ break; } 
    }
?>],
      backgroundColor: [ '#FF7000',],
      borderColor: ['white',],
      borderWidth: 2
    },
    {
      label: "QUARTER 4",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=3";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

        if($count==10){
            if($row1['q4']=='P'){ echo 4; }
            if($row1['q4']=='AP'){ echo 3;  }
            if($row1['q4']=='D'){ echo 2; }
            if($row1['q4']=='B'){ echo 1; } 
        }
        else if($count > 10){
            if($row1['q4']=='P'){ $n=4; echo ",".$n; }
            if($row1['q4']=='A'){ $n=3; echo ",".$n; }
            if($row1['q4']=='D'){ $n=2; echo ",".$n; }
            if($row1['q4']=='B'){ $n=1; echo ",".$n; }
        }

        $count++;
    if($count==26){ break; } 
                                              }
?>],
      backgroundColor: [
        '#FFBF00',
      ],
      borderColor: [
        'white',
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
<!--aa3 -->


<!-- aa4 -->
<div class="tab-pane fade container-fluid" align="center" id="aa4" role="tabpanel" aria-labelledby="home-tab">

<div class="row">
        <!-- chart1 -->
      <div class="col-md-12 border">
        <div class="row">
            <!-- label -->
          <div class="col-md-4" align="left">
          <?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=4";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=0;
while ($row1 = mysqli_fetch_assoc($sqldata)) {
            $count++;
            $a= "<p>".$count.". ".$row1['type']."</p>";
            echo $a;
                if($count==10){ break; } 
    }
?>
          </div>
          <!-- label -->
          <div class="col-md-8"><canvas id="lineChart7"></canvas></div>
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
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=4";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=0;
while ($row1 = mysqli_fetch_assoc($sqldata)) {
                    $count++;  
                    if($count>=11){
                                $a= "<p>".$count.". ".$row1['type']."</p>";
                                echo $a;          
                    }
                    if($count==25){
                    break;
                    } 

                
                    }
?>
          </div>
          <div class="col-md-8">  <canvas id="lineChart8"></canvas></div>
        </div>
      </div>
       <!-- chart2 -->
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    //line
var ctxL = document.getElementById("lineChart7").getContext('2d');
var myLineChart = new Chart(ctxL, {
  type: 'bar',
  data: {
    labels: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=4";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

        if($count==1){ $a= "'".$count."'"; $count++; echo $a;}
        else{ echo ",'".$count."'"; $count++; }

    if($count==11){ break; } }
?>],
    datasets: [{
      
      label: "Quarter 1",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=4";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

  if($count==1){
            if($row1['q1']=='P'){ echo 4;  }
            if($row1['q1']=='AP'){ echo 3;  }
            if($row1['q1']=='D'){ echo 2; }
            if($row1['q1']=='B'){ echo 1;  }
        }
        else {
            if($row1['q1']=='P'){ $n=4; echo ",".$n; }
            if($row1['q1']=='AP'){ $n=3; echo ",".$n; }
            if($row1['q1']=='D'){ $n=2; echo ",".$n; }
            if($row1['q1']=='B'){ $n=1; echo ",".$n; } 
        }
        $count++;
    if($count==10){ break; } 
    }
?>],
      backgroundColor: [
        '#10A19D',
      ],
      borderColor: [
        'white',
      ],
      borderWidth: 2
    },
    {
      
      label: "Quarter 2",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=4";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

  if($count==1){
            if($row1['q2']=='P'){ echo 4; }
            if($row1['q2']=='AP'){ echo 3;  }
            if($row1['q2']=='D'){ echo 2;  }
            if($row1['q2']=='B'){ echo 1;  }
        }
        else {
            if($row1['q2']=='P'){ $n=4; echo ",".$n; }
            if($row1['q2']=='AP'){ $n=3; echo ",".$n; }
            if($row1['q2']=='D'){ $n=2; echo ",".$n; }
            if($row1['q2']=='B'){ $n=1; echo ",".$n; } 
        }
        $count++;
    if($count==10){ break; } 
    }
?>],
      backgroundColor: [
        '#540375',
      ],
      borderColor: [
        'white',
      ],
      borderWidth: 2
    },
    {
      
      label: "Quarter 3",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=4";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

  if($count==1){
            if($row1['q3']=='P'){ echo 4;  }
            if($row1['q3']=='AP'){ echo 3;  }
            if($row1['q3']=='D'){ echo 2; }
            if($row1['q3']=='B'){ echo 1; ; }
        }
        else {
            if($row1['q3']=='P'){ $n=4; echo ",".$n; }
            if($row1['q3']=='AP'){ $n=3; echo ",".$n; }
            if($row1['q3']=='D'){ $n=2; echo ",".$n; }
            if($row1['q3']=='B'){ $n=1; echo ",".$n; } 
        }
        $count++;
    if($count==10){ break; } 
    }
?>],
      backgroundColor: [ '#FF7000',],
      borderColor: [ 'white',],
      borderWidth: 2
    },
    {
      label: "QUARTER 4",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=4";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

   


        if($count==1){
            if($row1['q4']=='P'){ echo 4; }
            if($row1['q4']=='AP'){ echo 3;  }
            if($row1['q4']=='D'){ echo 2; }
            if($row1['q4']=='B'){ echo 4; }
        }
        else {
            if($row1['q4']=='P'){ $n=4; echo ",".$n;  }
            if($row1['q4']=='AP'){ $n=3; echo ",".$n;  }
            if($row1['q4']=='D'){ $n=2; echo ",".$n;  }
            if($row1['q4']=='B'){ $n=1; echo ",".$n;  }
        }

        $count++;

    if($count==10){ break; } 
    }
?>],
      backgroundColor: [ '#FFBF00',],
      borderColor: ['white',],
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
var ctxL = document.getElementById("lineChart8").getContext('2d');
var myLineChart = new Chart(ctxL, {
  type: 'bar',
  data: {
    labels: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=4";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=0;
while ($row1 = mysqli_fetch_assoc($sqldata)) {
  $count++;
        if($count==11){ $a= "'".$count."'"; echo $a;}
        else if($count>11){ echo ",'".$count."'";}
   
       
        
}
?>],
    datasets: [{
      label: "Quarter 1",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=4";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {



        if($count==11){
            if($row1['q1']=='P'){ echo 4;  }
            if($row1['q1']=='AP'){ echo 3; }
            if($row1['q1']=='D'){ echo 2; }
            if($row1['q1']=='B'){ echo 1; }
                     }
        else if($count>11){
            if($row1['q1']=='P'){ $n=4; echo ",".$n; }
            if($row1['q1']=='AP'){ $n=3; echo ",".$n; }
            if($row1['q1']=='D'){ $n=2; echo ",".$n; }
            if($row1['q1']=='B'){ $n=1; echo ",".$n; }
                         } 
                         $count++;
        if($count==26){ break; } 
    }
?>],
      backgroundColor: [ '#10A19D',],
      borderColor: ['white',],
      borderWidth: 2
    },

    {
      label: "Quarter 2",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=4";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {



        if($count==11){
            if($row1['q2']=='P'){ echo 4;  }
            if($row1['q2']=='AP'){ echo 3; }
            if($row1['q2']=='D'){ echo 2; }
            if($row1['q2']=='B'){ echo 1; }
                     }
        else if($count>11){
            if($row1['q2']=='P'){ $n=4; echo ",".$n; }
            if($row1['q2']=='AP'){ $n=3; echo ",".$n; }
            if($row1['q2']=='D'){ $n=2; echo ",".$n; }
            if($row1['q2']=='B'){ $n=1; echo ",".$n; }
                         } 
                         $count++;
        if($count==26){ break; } 
    }
?>],
      backgroundColor: [ '#540375',],
      borderColor: ['white',],
      borderWidth: 2
    },

    {
      label: "Quarter 3",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=4";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {



        if($count==11){
            if($row1['q3']=='P'){ echo 4;  }
            if($row1['q3']=='AP'){ echo 3; }
            if($row1['q3']=='D'){ echo 2; }
            if($row1['q3']=='B'){ echo 1; }
                     }
        else if($count>11){
            if($row1['q3']=='P'){ $n=4; echo ",".$n; }
            if($row1['q3']=='AP'){ $n=3; echo ",".$n; }
            if($row1['q3']=='D'){ $n=2; echo ",".$n; }
            if($row1['q3']=='B'){ $n=1; echo ",".$n; }
                         } 
                         $count++;
        if($count==26){ break; } 
    }
?>],
      backgroundColor: [ '#FF7000',],
      borderColor: ['white',],
      borderWidth: 2
    },
    {
      label: "QUARTER 4",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=4";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

        if($count==11){
            if($row1['q4']=='P'){ echo 4; }
            if($row1['q4']=='AP'){ echo 3;  }
            if($row1['q4']=='D'){ echo 2; }
            if($row1['q4']=='B'){ echo 1; } 
        }
        else if($count > 11){
            if($row1['q4']=='P'){ $n=4; echo ",".$n; }
            if($row1['q4']=='A'){ $n=3; echo ",".$n; }
            if($row1['q4']=='D'){ $n=2; echo ",".$n; }
            if($row1['q4']=='B'){ $n=1; echo ",".$n; }
        }

        $count++;
    if($count==26){ break; } 
                                              }
?>],
      backgroundColor: [
        '#FFBF00',
      ],
      borderColor: [
        'white',
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
<!--aa4 -->


<!-- aa5 -->
<div class="tab-pane fade container-fluid" align="center" id="aa5" role="tabpanel" aria-labelledby="home-tab">

<div class="row">
        <!-- chart1 -->
      <div class="col-md-12 border">
        <div class="row">
            <!-- label -->
          <div class="col-md-4" align="left">
          <?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=5";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=0;
while ($row1 = mysqli_fetch_assoc($sqldata)) {
            $count++;
            $a= "<p>".$count.". ".$row1['type']."</p>";
            echo $a;
                if($count==10){ break; } 
    }
?>
          </div>
          <!-- label -->
          <div class="col-md-8"><canvas id="lineChart9"></canvas></div>
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
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=5";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=0;
while ($row1 = mysqli_fetch_assoc($sqldata)) {
                    $count++;  
                    if($count>=11){
                                $a= "<p>".$count.". ".$row1['type']."</p>";
                                echo $a;          
                    }
                    if($count==25){
                    break;
                    } 

                
                    }
?>
          </div>
          <div class="col-md-8">  <canvas id="lineChart10"></canvas></div>
        </div>
      </div>
       <!-- chart2 -->
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    //line
var ctxL = document.getElementById("lineChart9").getContext('2d');
var myLineChart = new Chart(ctxL, {
  type: 'bar',
  data: {
    labels: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=5";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

        if($count==1){ $a= "'".$count."'"; $count++; echo $a;}
        else{ echo ",'".$count."'"; $count++; }

    if($count==11){ break; } }
?>],
    datasets: [{
      
      label: "Quarter 1",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=5";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

  if($count==1){
            if($row1['q1']=='P'){ echo 4;  }
            if($row1['q1']=='AP'){ echo 3;  }
            if($row1['q1']=='D'){ echo 2; }
            if($row1['q1']=='B'){ echo 1;  }
        }
        else {
            if($row1['q1']=='P'){ $n=4; echo ",".$n; }
            if($row1['q1']=='AP'){ $n=3; echo ",".$n; }
            if($row1['q1']=='D'){ $n=2; echo ",".$n; }
            if($row1['q1']=='B'){ $n=1; echo ",".$n; } 
        }
        $count++;
    if($count==10){ break; } 
    }
?>],
      backgroundColor: [
        '#10A19D',
      ],
      borderColor: [
        'white',
      ],
      borderWidth: 2
    },
    {
      
      label: "Quarter 2",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=5";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

  if($count==1){
            if($row1['q2']=='P'){ echo 4; }
            if($row1['q2']=='AP'){ echo 3;  }
            if($row1['q2']=='D'){ echo 2;  }
            if($row1['q2']=='B'){ echo 1;  }
        }
        else {
            if($row1['q2']=='P'){ $n=4; echo ",".$n; }
            if($row1['q2']=='AP'){ $n=3; echo ",".$n; }
            if($row1['q2']=='D'){ $n=2; echo ",".$n; }
            if($row1['q2']=='B'){ $n=1; echo ",".$n; } 
        }
        $count++;
    if($count==10){ break; } 
    }
?>],
      backgroundColor: [
        '#540375',
      ],
      borderColor: [
        'white',
      ],
      borderWidth: 2
    },
    {
      
      label: "Quarter 3",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=5";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

  if($count==1){
            if($row1['q3']=='P'){ echo 4;  }
            if($row1['q3']=='AP'){ echo 3;  }
            if($row1['q3']=='D'){ echo 2; }
            if($row1['q3']=='B'){ echo 1; ; }
        }
        else {
            if($row1['q3']=='P'){ $n=4; echo ",".$n; }
            if($row1['q3']=='AP'){ $n=3; echo ",".$n; }
            if($row1['q3']=='D'){ $n=2; echo ",".$n; }
            if($row1['q3']=='B'){ $n=1; echo ",".$n; } 
        }
        $count++;
    if($count==10){ break; } 
    }
?>],
      backgroundColor: [ '#FF7000',],
      borderColor: [ 'white',],
      borderWidth: 2
    },
    {
      label: "QUARTER 4",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=5";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

   


        if($count==1){
            if($row1['q4']=='P'){ echo 4; }
            if($row1['q4']=='AP'){ echo 3;  }
            if($row1['q4']=='D'){ echo 2; }
            if($row1['q4']=='B'){ echo 4; }
        }
        else {
            if($row1['q4']=='P'){ $n=4; echo ",".$n;  }
            if($row1['q4']=='AP'){ $n=3; echo ",".$n;  }
            if($row1['q4']=='D'){ $n=2; echo ",".$n;  }
            if($row1['q4']=='B'){ $n=1; echo ",".$n;  }
        }

        $count++;

    if($count==10){ break; } 
    }
?>],
      backgroundColor: [ '#FFBF00',],
      borderColor: ['white',],
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
var ctxL = document.getElementById("lineChart10").getContext('2d');
var myLineChart = new Chart(ctxL, {
  type: 'bar',
  data: {
    labels: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=5";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=0;
while ($row1 = mysqli_fetch_assoc($sqldata)) {
  $count++;
        if($count==11){ $a= "'".$count."'"; echo $a;}
        else if($count>11){ echo ",'".$count."'";}
   
       
        
}
?>],
    datasets: [{
      label: "Quarter 1",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=5";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {



        if($count==11){
            if($row1['q1']=='P'){ echo 4;  }
            if($row1['q1']=='AP'){ echo 3; }
            if($row1['q1']=='D'){ echo 2; }
            if($row1['q1']=='B'){ echo 1; }
                     }
        else if($count>11){
            if($row1['q1']=='P'){ $n=4; echo ",".$n; }
            if($row1['q1']=='AP'){ $n=3; echo ",".$n; }
            if($row1['q1']=='D'){ $n=2; echo ",".$n; }
            if($row1['q1']=='B'){ $n=1; echo ",".$n; }
                         } 
                         $count++;
        if($count==26){ break; } 
    }
?>],
      backgroundColor: [ '#10A19D',],
      borderColor: ['white',],
      borderWidth: 2
    },

    {
      label: "Quarter 2",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=5";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {



        if($count==11){
            if($row1['q2']=='P'){ echo 4;  }
            if($row1['q2']=='AP'){ echo 3; }
            if($row1['q2']=='D'){ echo 2; }
            if($row1['q2']=='B'){ echo 1; }
                     }
        else if($count>11){
            if($row1['q2']=='P'){ $n=4; echo ",".$n; }
            if($row1['q2']=='AP'){ $n=3; echo ",".$n; }
            if($row1['q2']=='D'){ $n=2; echo ",".$n; }
            if($row1['q2']=='B'){ $n=1; echo ",".$n; }
                         } 
                         $count++;
        if($count==26){ break; } 
    }
?>],
      backgroundColor: [ '#540375',],
      borderColor: ['white',],
      borderWidth: 2
    },

    {
      label: "Quarter 3",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=5";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {



        if($count==11){
            if($row1['q3']=='P'){ echo 4;  }
            if($row1['q3']=='AP'){ echo 3; }
            if($row1['q3']=='D'){ echo 2; }
            if($row1['q3']=='B'){ echo 1; }
                     }
        else if($count>11){
            if($row1['q3']=='P'){ $n=4; echo ",".$n; }
            if($row1['q3']=='AP'){ $n=3; echo ",".$n; }
            if($row1['q3']=='D'){ $n=2; echo ",".$n; }
            if($row1['q3']=='B'){ $n=1; echo ",".$n; }
                         } 
                         $count++;
        if($count==26){ break; } 
    }
?>],
      backgroundColor: [ '#FF7000',],
      borderColor: ['white',],
      borderWidth: 2
    },
    {
      label: "QUARTER 4",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=5";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

        if($count==11){
            if($row1['q4']=='P'){ echo 4; }
            if($row1['q4']=='AP'){ echo 3;  }
            if($row1['q4']=='D'){ echo 2; }
            if($row1['q4']=='B'){ echo 1; } 
        }
        else if($count > 11){
            if($row1['q4']=='P'){ $n=4; echo ",".$n; }
            if($row1['q4']=='A'){ $n=3; echo ",".$n; }
            if($row1['q4']=='D'){ $n=2; echo ",".$n; }
            if($row1['q4']=='B'){ $n=1; echo ",".$n; }
        }

        $count++;
    if($count==26){ break; } 
                                              }
?>],
      backgroundColor: [
        '#FFBF00',
      ],
      borderColor: [
        'white',
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
<!--aa5 -->

<!-- aa6 -->
<div class="tab-pane fade container-fluid" align="center" id="aa6" role="tabpanel" aria-labelledby="home-tab">

<div class="row">
        <!-- chart1 -->
      <div class="col-md-12 border">
        <div class="row">
            <!-- label -->
          <div class="col-md-4" align="left">
          <?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=6";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=0;
while ($row1 = mysqli_fetch_assoc($sqldata)) {
            $count++;
            $a= "<p>".$count.". ".$row1['type']."</p>";
            echo $a;
                if($count==10){ break; } 
    }
?>
          </div>
          <!-- label -->
          <div class="col-md-8"><canvas id="lineChart12"></canvas></div>
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
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=6";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=0;
while ($row1 = mysqli_fetch_assoc($sqldata)) {
                    $count++;  
                    if($count>=11){
                                $a= "<p>".$count.". ".$row1['type']."</p>";
                                echo $a;          
                    }
                    if($count==25){
                    break;
                    } 

                
                    }
?>
          </div>
          <div class="col-md-8">  <canvas id="lineChart13"></canvas></div>
        </div>
      </div>
       <!-- chart2 -->
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    //line
var ctxL = document.getElementById("lineChart12").getContext('2d');
var myLineChart = new Chart(ctxL, {
  type: 'bar',
  data: {
    labels: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=6";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

        if($count==1){ $a= "'".$count."'"; $count++; echo $a;}
        else{ echo ",'".$count."'"; $count++; }

    if($count==11){ break; } }
?>],
    datasets: [{
      
      label: "Quarter 1",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=6";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

  if($count==1){
            if($row1['q1']=='P'){ echo 4;  }
            if($row1['q1']=='AP'){ echo 3;  }
            if($row1['q1']=='D'){ echo 2; }
            if($row1['q1']=='B'){ echo 1;  }
        }
        else {
            if($row1['q1']=='P'){ $n=4; echo ",".$n; }
            if($row1['q1']=='AP'){ $n=3; echo ",".$n; }
            if($row1['q1']=='D'){ $n=2; echo ",".$n; }
            if($row1['q1']=='B'){ $n=1; echo ",".$n; } 
        }
        $count++;
    if($count==10){ break; } 
    }
?>],
      backgroundColor: [
        '#10A19D',
      ],
      borderColor: [
        'white',
      ],
      borderWidth: 2
    },
    {
      
      label: "Quarter 2",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=6";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

  if($count==1){
            if($row1['q2']=='P'){ echo 4; }
            if($row1['q2']=='AP'){ echo 3;  }
            if($row1['q2']=='D'){ echo 2;  }
            if($row1['q2']=='B'){ echo 1;  }
        }
        else {
            if($row1['q2']=='P'){ $n=4; echo ",".$n; }
            if($row1['q2']=='AP'){ $n=3; echo ",".$n; }
            if($row1['q2']=='D'){ $n=2; echo ",".$n; }
            if($row1['q2']=='B'){ $n=1; echo ",".$n; } 
        }
        $count++;
    if($count==10){ break; } 
    }
?>],
      backgroundColor: [
        '#540375',
      ],
      borderColor: [
        'white',
      ],
      borderWidth: 2
    },
    {
      
      label: "Quarter 3",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=6";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

  if($count==1){
            if($row1['q3']=='P'){ echo 4;  }
            if($row1['q3']=='AP'){ echo 3;  }
            if($row1['q3']=='D'){ echo 2; }
            if($row1['q3']=='B'){ echo 1; ; }
        }
        else {
            if($row1['q3']=='P'){ $n=4; echo ",".$n; }
            if($row1['q3']=='AP'){ $n=3; echo ",".$n; }
            if($row1['q3']=='D'){ $n=2; echo ",".$n; }
            if($row1['q3']=='B'){ $n=1; echo ",".$n; } 
        }
        $count++;
    if($count==10){ break; } 
    }
?>],
      backgroundColor: [ '#FF7000',],
      borderColor: [ 'white',],
      borderWidth: 2
    },
    {
      label: "QUARTER 4",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=6";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

   


        if($count==1){
            if($row1['q4']=='P'){ echo 4; }
            if($row1['q4']=='AP'){ echo 3;  }
            if($row1['q4']=='D'){ echo 2; }
            if($row1['q4']=='B'){ echo 4; }
        }
        else {
            if($row1['q4']=='P'){ $n=4; echo ",".$n;  }
            if($row1['q4']=='AP'){ $n=3; echo ",".$n;  }
            if($row1['q4']=='D'){ $n=2; echo ",".$n;  }
            if($row1['q4']=='B'){ $n=1; echo ",".$n;  }
        }

        $count++;

    if($count==10){ break; } 
    }
?>],
      backgroundColor: [ '#FFBF00',],
      borderColor: ['white',],
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
var ctxL = document.getElementById("lineChart13").getContext('2d');
var myLineChart = new Chart(ctxL, {
  type: 'bar',
  data: {
    labels: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=6";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=0;
while ($row1 = mysqli_fetch_assoc($sqldata)) {
  $count++;
        if($count==11){ $a= "'".$count."'"; echo $a;}
        else if($count>11){ echo ",'".$count."'";}
   
       
        
}
?>],
    datasets: [{
      label: "Quarter 1",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=6";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {



        if($count==11){
            if($row1['q1']=='P'){ echo 4;  }
            if($row1['q1']=='AP'){ echo 3; }
            if($row1['q1']=='D'){ echo 2; }
            if($row1['q1']=='B'){ echo 1; }
                     }
        else if($count>11){
            if($row1['q1']=='P'){ $n=4; echo ",".$n; }
            if($row1['q1']=='AP'){ $n=3; echo ",".$n; }
            if($row1['q1']=='D'){ $n=2; echo ",".$n; }
            if($row1['q1']=='B'){ $n=1; echo ",".$n; }
                         } 
                         $count++;
        if($count==26){ break; } 
    }
?>],
      backgroundColor: [ '#10A19D',],
      borderColor: ['white',],
      borderWidth: 2
    },

    {
      label: "Quarter 2",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=6";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {



        if($count==11){
            if($row1['q2']=='P'){ echo 4;  }
            if($row1['q2']=='AP'){ echo 3; }
            if($row1['q2']=='D'){ echo 2; }
            if($row1['q2']=='B'){ echo 1; }
                     }
        else if($count>11){
            if($row1['q2']=='P'){ $n=4; echo ",".$n; }
            if($row1['q2']=='AP'){ $n=3; echo ",".$n; }
            if($row1['q2']=='D'){ $n=2; echo ",".$n; }
            if($row1['q2']=='B'){ $n=1; echo ",".$n; }
                         } 
                         $count++;
        if($count==26){ break; } 
    }
?>],
      backgroundColor: [ '#540375',],
      borderColor: ['white',],
      borderWidth: 2
    },

    {
      label: "Quarter 3",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=6";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {



        if($count==11){
            if($row1['q3']=='P'){ echo 4;  }
            if($row1['q3']=='AP'){ echo 3; }
            if($row1['q3']=='D'){ echo 2; }
            if($row1['q3']=='B'){ echo 1; }
                     }
        else if($count>11){
            if($row1['q3']=='P'){ $n=4; echo ",".$n; }
            if($row1['q3']=='AP'){ $n=3; echo ",".$n; }
            if($row1['q3']=='D'){ $n=2; echo ",".$n; }
            if($row1['q3']=='B'){ $n=1; echo ",".$n; }
                         } 
                         $count++;
        if($count==26){ break; } 
    }
?>],
      backgroundColor: [ '#FF7000',],
      borderColor: ['white',],
      borderWidth: 2
    },
    {
      label: "QUARTER 4",
      data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=6";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

        if($count==11){
            if($row1['q4']=='P'){ echo 4; }
            if($row1['q4']=='AP'){ echo 3;  }
            if($row1['q4']=='D'){ echo 2; }
            if($row1['q4']=='B'){ echo 1; } 
        }
        else if($count > 11){
            if($row1['q4']=='P'){ $n=4; echo ",".$n; }
            if($row1['q4']=='A'){ $n=3; echo ",".$n; }
            if($row1['q4']=='D'){ $n=2; echo ",".$n; }
            if($row1['q4']=='B'){ $n=1; echo ",".$n; }
        }

        $count++;
    if($count==26){ break; } 
                                              }
?>],
      backgroundColor: [
        '#FFBF00',
      ],
      borderColor: [
        'white',
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
<!--aa6 -->

<div class="tab-pane fade show active container-fluid" align="center" id="aa1" role="tabpanel" aria-labelledby="home-tab">

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
              if($count==13){ break; } 
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

      if($count==1){ $a= "'".$count."'"; $count++; echo $a;}
      else{ echo ",'".$count."'"; $count++; }

  if($count==14){ break; } }
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
          if($row1['q1']=='P'){ echo 4;  }
          if($row1['q1']=='AP'){ echo 3;  }
          if($row1['q1']=='D'){ echo 2; }
          if($row1['q1']=='B'){ echo 1;  }
      }
      else {
          if($row1['q1']=='P'){ $n=4; echo ",".$n; }
          if($row1['q1']=='AP'){ $n=3; echo ",".$n; }
          if($row1['q1']=='D'){ $n=2; echo ",".$n; }
          if($row1['q1']=='B'){ $n=1; echo ",".$n; } 
      }
      $count++;
  if($count==13){ break; } 
  }
?>],
    backgroundColor: [
      '#10A19D',
    ],
    borderColor: [
      'white',
    ],
    borderWidth: 2
  },
  {
    
    label: "Quarter 2",
    data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=1";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

if($count==1){
          if($row1['q2']=='P'){ echo 4; }
          if($row1['q2']=='AP'){ echo 3;  }
          if($row1['q2']=='D'){ echo 2;  }
          if($row1['q2']=='B'){ echo 1;  }
      }
      else {
          if($row1['q2']=='P'){ $n=4; echo ",".$n; }
          if($row1['q2']=='AP'){ $n=3; echo ",".$n; }
          if($row1['q2']=='D'){ $n=2; echo ",".$n; }
          if($row1['q2']=='B'){ $n=1; echo ",".$n; } 
      }
      $count++;
  if($count==13){ break; } 
  }
?>],
    backgroundColor: [
      '#540375',
    ],
    borderColor: [
      'white',
    ],
    borderWidth: 2
  },
  {
    
    label: "Quarter 3",
    data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=1";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

if($count==1){
          if($row1['q3']=='P'){ echo 4;  }
          if($row1['q3']=='AP'){ echo 3;  }
          if($row1['q3']=='D'){ echo 2; }
          if($row1['q3']=='B'){ echo 1; ; }
      }
      else {
          if($row1['q3']=='P'){ $n=4; echo ",".$n; }
          if($row1['q3']=='AP'){ $n=3; echo ",".$n; }
          if($row1['q3']=='D'){ $n=2; echo ",".$n; }
          if($row1['q3']=='B'){ $n=1; echo ",".$n; } 
      }
      $count++;
  if($count==13){ break; } 
  }
?>],
    backgroundColor: [ '#FF7000',],
    borderColor: [ 'white',],
    borderWidth: 2
  },
  {
    label: "QUARTER 4",
    data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=1";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

 


      if($count==1){
          if($row1['q4']=='P'){ echo 4; }
          if($row1['q4']=='AP'){ echo 3;  }
          if($row1['q4']=='D'){ echo 2; }
          if($row1['q4']=='B'){ echo 4; }
      }
      else {
          if($row1['q4']=='P'){ $n=4; echo ",".$n;  }
          if($row1['q4']=='AP'){ $n=3; echo ",".$n;  }
          if($row1['q4']=='D'){ $n=2; echo ",".$n;  }
          if($row1['q4']=='B'){ $n=1; echo ",".$n;  }
      }

      $count++;

  if($count==13){ break; } 
  }
?>],
    backgroundColor: [ '#FFBF00',],
    borderColor: ['white',],
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
      if($count==14){ $a= "'".$count."'"; echo $a;}
      else if($count>14){ echo ",'".$count."'";}

      if($count == 25){ break; }
 
     
      
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



      if($count==14){
          if($row1['q1']=='P'){ echo 4;  }
          if($row1['q1']=='AP'){ echo 3; }
          if($row1['q1']=='D'){ echo 2; }
          if($row1['q1']=='B'){ echo 1; }
                   }
      else if($count>14){
          if($row1['q1']=='P'){ $n=4; echo ",".$n; }
          if($row1['q1']=='AP'){ $n=3; echo ",".$n; }
          if($row1['q1']=='D'){ $n=2; echo ",".$n; }
          if($row1['q1']=='B'){ $n=1; echo ",".$n; }
                       } 
                       $count++;
      if($count==26){ break; } 
  }
?>],
    backgroundColor: [ '#10A19D',],
    borderColor: ['white',],
    borderWidth: 2
  },

  {
    label: "Quarter 2",
    data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=1";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {



      if($count==14){
          if($row1['q2']=='P'){ echo 4;  }
          if($row1['q2']=='AP'){ echo 3; }
          if($row1['q2']=='D'){ echo 2; }
          if($row1['q2']=='B'){ echo 1; }
                   }
      else if($count>14){
          if($row1['q2']=='P'){ $n=4; echo ",".$n; }
          if($row1['q2']=='AP'){ $n=3; echo ",".$n; }
          if($row1['q2']=='D'){ $n=2; echo ",".$n; }
          if($row1['q2']=='B'){ $n=1; echo ",".$n; }
                       } 
                       $count++;
      if($count==26){ break; } 
  }
?>],
    backgroundColor: [ '#540375',],
    borderColor: ['white',],
    borderWidth: 2
  },

  {
    label: "Quarter 3",
    data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=1";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {



      if($count==14){
          if($row1['q3']=='P'){ echo 4;  }
          if($row1['q3']=='AP'){ echo 3; }
          if($row1['q3']=='D'){ echo 2; }
          if($row1['q1']=='B'){ echo 1; }
                   }
      else if($count>14){
          if($row1['q3']=='P'){ $n=4; echo ",".$n; }
          if($row1['q3']=='AP'){ $n=3; echo ",".$n; }
          if($row1['q3']=='D'){ $n=2; echo ",".$n; }
          if($row1['q3']=='B'){ $n=1; echo ",".$n; }
                       } 
                       $count++;
      if($count==26){ break; } 
  }
?>],
    backgroundColor: [ '#FF7000',],
    borderColor: ['white',],
    borderWidth: 2
  },
  {
    label: "QUARTER 4",
    data: [<?php

include('../connect.php');
$id = $_GET['id'];
$sqlget = "SELECT * FROM progress_report where lrn = $id and progress_index=1";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
$count=1;
while ($row1 = mysqli_fetch_assoc($sqldata)) {

      if($count==14){
          if($row1['q4']=='P'){ echo 4; }
          if($row1['q4']=='AP'){ echo 3;  }
          if($row1['q4']=='D'){ echo 2; }
          if($row1['q3']=='B'){ echo 1; } 
      }
      else if($count > 14){
          if($row1['q4']=='P'){ $n=4; echo ",".$n; }
          if($row1['q4']=='A'){ $n=3; echo ",".$n; }
          if($row1['q4']=='D'){ $n=2; echo ",".$n; }
          if($row1['q4']=='B'){ $n=1; echo ",".$n; }
      }

      $count++;
  if($count==26){ break; } 
                                            }
?>],
    backgroundColor: [
      '#FFBF00',
    ],
    borderColor: [
      'white',
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
</div>







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