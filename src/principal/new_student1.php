<?php include('../session.php');?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add new Student</title>

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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    
                    <div class=" ">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                              

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
    <form action="upnew_student.php" method="post" enctype="multipart/form-data">
  <table align="left" class="table table-bordered table-sm">
    <tr>
      <td>LRN:</td>
      <td><input type="number" name="lrn" class="form-control" placeholder="Student LRN"></td>
    </tr>
    <tr>
      <td>Student code:</td>
      <td><input type="text" name="student_code" class="form-control" placeholder="Student Code"></td>
    </tr>
    <tr>
      <td>Birth Date:</td>
      <td><input type="date" name="birth_date" class="form-control" placeholder="Student Birth date"></td>
    </tr>
    <tr>
      <td>Birth Place:</td>
      <td><input type="text" name="birth_place" class="form-control" placeholder="Student Birth Place"></td>
    </tr>
    <tr>
      <td>Gender:</td>
      <td><select class="form-control" name="gender" id="">
        <option value="">Gender</option>
        <option value="Female">Female</option>
        <option value="Male">Male</option>
        
      </select></td>
    </tr>

    <tr>
      <td>Address:</td>
      <td><select name="address" id="" class="form-control">
        <option value="">Select Baranggay</option>
        <option value="Alipit">Alipit</option>
        <option value="Bagumbayan">Bagumbayan</option>
        <option value="Poblacion I">Poblacion I</option>
        <option value="Poblacion II">Poblacion II</option>
        <option value="Poblacion III">Poblacion III</option>
        <option value="Poblacion IV">Poblacion IV</option>
        <option value="Poblacion V">Poblacion V</option>
        <option value="Bubukal">Bubukal</option>
        <option value="Calios">Calios</option>
        <option value="Duhat">Duhat</option>
        <option value="Gatid">Gatid</option>
        <option value="Jasaan">Jasaan</option>
        <option value="Labuin">Labuin</option>
        <option value="Malinao">Malinao</option>
        <option value="Oogong">Oogong</option>
        <option value="Pagsawitan">Pagsawitan</option>
        <option value="Palasan">Palasan</option>
        <option value="Patimbao">Patimbao</option>
        <option value="San Jose">San Jose</option>
        <option value="San Juan">San Juan</option>
        <option value="San Pablo Norte">San Pablo Norte</option>
        <option value="San Pablo Sur">San Pablo Sur</option>
        <option value="Santisima Cruz">Santisima Cruz</option>
        <option value="Santo Angel Central">Santo Angel Central</option>
        <option value="Santo Angel Norte">Santo Angel Norte</option>
        <option value="Santo Angel Sur">Santo Angel Sur</option>
      
      </select>
       
    </tr>

  
<tr>
  <td>School:</td>
  <td><select class="form-control" name="school" id="">
        <option value="">School</option>
        <option value="BES">BES</option>
        <option value="GES">GES</option>
        <option value="SCES">SCES</option>
        
      </select></td>
</tr>
    <tr>
      <td>Teacher:</td>
      <td><select class="form-control" name="teacher" id="">
        <option value="">Teacher</option>
        <?php
           include('../connect.php');
           $id = $_SESSION['logged_id'];
$sqlget = "SELECT * FROM teachers where email != 'admin'";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());

while ($row = mysqli_fetch_assoc($sqldata)) { ?>

<option value="<?php echo $row['fname']." ".$row['lname'];?>"><?php echo $row['fname']." ".$row['lname'];?></option>

<?php }?>
        
      </select></td></td>

      <tr>
      <td>Guardian Contact:</td>
      <td><input type="text" name="guardian_contact" class="form-control" placeholder="Guardian Contact"></td>
    </tr>
    
    
  </table>
  </div>
  </div>
  </div>
  <!--information tab-->

    <!--Assessent tab-->
    <div class="tab-pane fade" id="progress" role="tabpanel" aria-labelledby="progress-tab">
        <label for="">SELECT YEAR OF THE PROGRESS REPORT</label>
        <select name="progress_year" id="">
          <?php
          $count=2010;
          $date=date('Y');
          while($count<= $date){?>
          <option value="<?php echo $count;?>"><?php echo $count;?></option>

          <?php $count++;
        }?>
        </select>
   

        <div class="container-fluid" >
            <div class="row">
                <!--first-->
                <div class="col-md-4">
              
                <table class="table table-bordered ">
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
                   <tr><td>Expresses need to eat drink through non-verbal and or verbal means </td><input type="hidden" name="11" value="Expresses need to eat drink through non-verbal and or verbal means">
                   <td>
                    <select class="selectList" name="11q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="11q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="11q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="11q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>

                   <tr>
                    <td>Chews and swallows different kinds of foods</td><input type="hidden" name="12" value="Chews and swallows different kinds of foods">
                    <td>
                    <select class="selectList" name="12q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="12q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="12q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="12q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr>
                    <td>Swallows liquid like soup</td><input type="hidden" name="13" value="Swallows liquid like soup">
                    <td>
                    <select class="selectList" name="13q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="13q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="13q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="13q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr>
                    <td>Picks up food with fingers or scoops with spoon</td><input type="hidden" name="14" value="Picks up food with fingers or scoops with spoon">
                    <td>
                    <select class="selectList" name="14q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="14q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="14q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="14q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr>
                    <td>Picks up and eats finger food</td><input type="hidden" name="15" value="Picks up and eats finger food">
                    <td>
                    <select class="selectList" name="15q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="15q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="15q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="15q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr>
                    <td>Sips and drinks liquid</td><input type="hidden" name="16" value="Sips and drinks liquid">
                    <td>
                    <select class="selectList" name="16q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="16q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="16q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="16q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr>
                    <td>Eats with spoon and fork</td><input type="hidden" name="17" value="Eats with spoon and fork">
                    <td>
                    <select class="selectList" name="17q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="17q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="17q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="17q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr>
                    <td>Uses the table knife for spreading</td><input type="hidden" name="18" value="Uses the table knife for spreading">
                    <td>
                    <select class="selectList" name="18q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="18q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="18q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="18q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr>
                    <td>Cuts food using the table knife</td><input type="hidden" name="19" value="Cuts food using the table knife">
                    <td>
                    <select class="selectList" name="19q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="19q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="19q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="19q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr>
                    <td>Distinguishes edible and non-edible foods & substances</td><input type="hidden" name="110" value="Distinguishes edible and non-edible foods & substances">
                    <td>
                    <select class="selectList" name="110q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="110q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="110q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="110q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr>
                    <td>Peels / unwraps food</td><input type="hidden" name="111" value="Peels / unwraps food">
                    <td>
                    <select class="selectList" name="111q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="111q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="111q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="111q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr>
                    <td>Uses table napkins</td><input type="hidden" name="112" value="Uses table napkins">
                    <td>
                    <select class="selectList" name="112q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="112q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="112q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="112q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr>
                    <td>Exhibits table settings skills</td><input type="hidden" name="113" value="Exhibits table settings skills">
                    <td>
                    <select class="selectList" name="113q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="113q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="113q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="113q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr><th>Toileting</th></tr>
                   <tr>
                    <td>Uses comfort room/toilet bowl to urinate or defecate</td><input type="hidden" name="114" value="Uses comfort room/toilet bowl to urinate or defecate">
                    <td>
                    <select class="selectList" name="114q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="114q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="114q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="114q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr><td>Uses toilet paper to clean-up and disposes it properly</td><input type="hidden" name="115" value="Uses toilet paper to clean-up and disposes it properly">
                   <td>
                    <select class="selectList" name="115q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="115q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="115q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="115q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                    </tr>
                   <tr>
                    <td>Uses dipper properly</td><input type="hidden" name="116" value="Uses dipper properly">
                    <td>
                    <select class="selectList" name="116q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="116q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="116q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="116q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr>
                    <td>Cleans self with soap & water after toileting</td><input type="hidden" name="117" value="Cleans self with soap & water after toileting">
                    <td>
                    <select class="selectList" name="117q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="117q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="117q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="117q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr><th>Dressing</th></tr>

                   <tr>
                    <td>Removes / puts on socks</td><input type="hidden" name="118" value="Removes / puts on socks">
                    <td>
                    <select class="selectList" name="118q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="118q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="118q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="118q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                <tr>
                    <td>Removes / puts on shoes or slippers</td><input type="hidden" name="119" value="Removes / puts on shoes or slippers">
                    <td>
                    <select class="selectList" name="119q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="119q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="119q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="119q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr>
                    <td>Removes / puts on clothes</td><input type="hidden" name="120" value="Removes / puts on clothes">
                    <td>
                    <select class="selectList" name="120q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="120q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="120q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="120q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr>
                    <td>Open & closes dressing implements (zip/unzip, button/unbutton</td><input type="hidden" name="121" value="Open & closes dressing implements (zip/unzip, button/unbutton">
                    <td>
                    <select class="selectList" name="121q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="121q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="121q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="121q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr>
                    <th>Grooming hygiene</th>

                </tr>
                   <tr>
                    <td>Washes and dries hands properly </td><input type="hidden" name="122" value="Washes and dries hands properly">
                    <td>
                    <select class="selectList" name="122q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="122q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="122q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="122q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr>
                    <td>Cleans own face </td><input type="hidden" name="123" value="Cleans own face">
                    <td>
                    <select class="selectList" name="123q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="123q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="123q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="123q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr>
                    <td>Brushes teeth</td><input type="hidden" name="124" value="Brushes teeth">
                    <td>
                    <select class="selectList" name="124q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="124q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="124q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="124q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>
                   <tr>
                    <td>Combs / brushes hair</td><input type="hidden" name="125" value="Combs / brushes hair">
                    <td>
                    <select class="selectList" name="125q1" id="">
                        <option value=""><i class="bi bi-caret-down-fill"></i></option>
                        <option value="P">P</option>
                        <option value="AP">AP</option>
                        <option value="D">D</option>
                        <option value="B">B</option>
                        <option value="NO/NA">NO/NA</option>
                    </select></td>
                    <td >
                        <select  class="selectList" name="125q2" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>

                     <td>
                        <select  class="selectList" name="125q3" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                     <td >
                        <select  class="selectList" name="125q4" id="">
                            <option value=""><i class="bi bi-caret-down-fill"></i></option>
                            <option value="P">P</option>
                            <option value="AP">AP</option>
                            <option value="D">D</option>
                            <option value="B">B</option>
                            <option value="NO/NA">NO/NA</option>
                        </select>
                     </td>
                </tr>

                </table>
                </div>
                 <!--first-->

                           <!--SECOND-->
                <div class="col-md-4">
              
              <table class="table table-bordered table-sm">
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
              
                 <tr><td>Uses courteous expressions appropriately</td><input type="hidden" name="21" value="Uses courteous expressions appropriately">
                 <td>
                  <select class="selectList" name="21q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="21q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="21q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="21q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>

                 <tr>
                  <td>Asks an apology when necessary </td><input type="hidden" name="22" value="Asks an apology when necessary">
                  <td>
                  <select class="selectList" name="22q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="22q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="22q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="22q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Pays attention to someone talking</td><input type="hidden" name="23" value="Pays attention to someone talking">
                  <td>
                  <select class="selectList" name="23q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="23q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="23q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="23q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Plays with peers</td><input type="hidden" name="24" value="Plays with peers">
                  <td>
                  <select class="selectList" name="24q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="24q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="24q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="24q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Makes friends easy</td><input type="hidden" name="25" value="Makes friends easy">
                  <td>
                  <select class="selectList" name="25q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="25q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="25q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="25q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Follows rules and regulations</td><input type="hidden" name="26" value="Follows rules and regulations">
                  <td>
                  <select class="selectList" name="26q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="26q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="26q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="26q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Seeks / Accepts help</td><input type="hidden" name="27" value="Seeks / Accepts help">
                  <td>
                  <select class="selectList" name="27q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="27q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="27q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="27q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Expresses / shows appropriate emotions</td><input type="hidden" name="28" value="Expresses / shows appropriate emotions">
                  <td>
                  <select class="selectList" name="28q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="28q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="28q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="28q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Waits for one’s turn</td><input type="hidden" name="29" value="Waits for one’s turn">
                  <td>
                  <select class="selectList" name="29q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="29q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="29q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="29q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Asks permission to use things owned by others</td><input type="hidden" name="210" value="Asks permission to use things owned by others">
                  <td>
                  <select class="selectList" name="210q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="210q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="210q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="210q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Seeks help from other friends</td><input type="hidden" name="211" value="Seeks help from other friends">
                  <td>
                  <select class="selectList" name="211q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="211q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="211q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="211q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Imitates adult activities</td><input type="hidden" name="212" value="Imitates adult activities">
                  <td>
                  <select class="selectList" name="212q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="212q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="212q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="212q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Displays sense of humor</td><input type="hidden" name="213" value="Displays sense of humor">
                  <td>
                  <select class="selectList" name="213q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="213q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="213q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="213q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
            
                 <tr>
                  <td>Identifies self as member of family / cultural group</td><input type="hidden" name="214" value="Identifies self as member of family / cultural group">
                  <td>
                  <select class="selectList" name="214q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="214q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="214q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="214q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr><td>Identifies personal belongings</td><input type="hidden" name="215" value="Identifies personal belongings">
                 <td>
                  <select class="selectList" name="215q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="215q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="215q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="215q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                  </tr>
                 <tr>
                  <td>Displays sensitivity to the feelings of others</td><input type="hidden" name="216" value="Displays sensitivity to the feelings of others">
                  <td>
                  <select class="selectList" name="216q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="216q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="216q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="216q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Shows sportsmanship</td><input type="hidden" name="217" value="Shows sportsmanship">
                  <td>
                  <select class="selectList" name="217q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="217q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="217q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="217q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
               

                 <tr>
                  <td>Show initiatives to work on tasks</td><input type="hidden" name="218" value="Show initiatives to work on tasks">
                  <td>
                  <select class="selectList" name="218q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="218q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="218q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="218q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Works independently</td><input type="hidden" name="219" value="Works independently">
                  <td>
                  <select class="selectList" name="219q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="219q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="219q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="219q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Shows self-control</td><input type="hidden" name="220" value="Shows self-control">
                  <td>
                  <select class="selectList" name="220q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="220q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="220q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="220q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                
                 

              </table>
              </div>
               <!--SECOND-->
               
                 <!--THIRD-->
                 <div class="col-md-4">
              
              <table class="table table-bordered table-sm">
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
                 <tr><td>Follows simple direction</td><input type="hidden" name="31" value="Follows simple direction">
                 <td>
                  <select class="selectList" name="31q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="31q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="31q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="31q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>

                 <tr>
                  <td>Distinguishes different types of sound </td><input type="hidden" name="32" value="Distinguishes different types of sound">
                  <td>
                  <select class="selectList" name="32q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="32q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="32q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="32q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Comprehends simple familiar stories</td><input type="hidden" name="33" value="Comprehends simple familiar stories">
                  <td>
                  <select class="selectList" name="33q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="33q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="33q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="33q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Listens attentively to stories, poems, and rhymes</td><input type="hidden" name="34" value="Listens attentively to stories, poems, and rhymes">
                  <td>
                  <select class="selectList" name="34q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="34q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="34q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="34q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
              <tr><th>SPEAKING</th></tr>   
              <tr>
                   
                  <td>Increases vocabulary to describe things </td><input type="hidden" name="35" value="Increases vocabulary to describe things ">
                  <td>
                  <select class="selectList" name="35q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="35q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="35q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="35q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Increases vocabulary to express one’s feelings</td><input type="hidden" name="36" value="Increases vocabulary to express one’s feelings">
                  <td>
                  <select class="selectList" name="36q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="36q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="36q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="36q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Increases vocabulary to share information</td><input type="hidden" name="37" value="Increases vocabulary to share information">
                  <td>
                  <select class="selectList" name="37q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="37q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="37q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="37q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Answers and responds to questions accordingly</td><input type="hidden" name="38" value="Answers and responds to questions accordingly">
                  <td>
                  <select class="selectList" name="38q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="38q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="38q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="38q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
              <tr><th>READING</th></tr>   
              <tr>
                  <td>Discriminates similarities & differences between pictures and objects</td><input type="hidden" name="39" value="Discriminates similarities & differences between pictures and objects">
                  <td>
                  <select class="selectList" name="39q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="39q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="39q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="39q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Classifies objects according to function Notes details in pictures </td><input type="hidden" name="310" value="Classifies objects according to function Notes details in pictures">
                  <td>
                  <select class="selectList" name="310q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="310q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="310q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="310q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>

              <tr>
                  <td>Notes details in pictures </td><input type="hidden" name="311" value="Notes details in pictures ">
                  <td>
                  <select class="selectList" name="311q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="311q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="311q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="311q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Visualizes objects and pictures from memory</td><input type="hidden" name="312" value="Visualizes objects and pictures from memory ">
                  <td>
                  <select class="selectList" name="312q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="312q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="312q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="312q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Comprehends picture stories</td><input type="hidden" name="313" value="Comprehends picture stories">
                  <td>
                  <select class="selectList" name="313q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="313q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="313q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="313q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
              <tr><th>WRITING</th></tr>   
              <tr>
                  <td>Holds / grips pencil properly</td><input type="hidden" name="314" value="Holds / grips pencil properly">
                  <td>
                  <select class="selectList" name="314q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="314q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="314q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="314q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
            
                 <tr>
                  <td>Traces lines and shapes</td><input type="hidden" name="315" value="Traces lines and shapes">
                  <td>
                  <select class="selectList" name="315q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="315q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="315q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="315q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr><td>Traces letters, numbers and one’s names properly</td><input type="hidden" name="316" value="Traces letters, numbers and one’s names properly">
                 <td>
                  <select class="selectList" name="316q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="316q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="316q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="316q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                  </tr>
                 <tr>
                  <td>Draws basic figures</td><input type="hidden" name="317" value="Draws basic figures">
                  <td>
                  <select class="selectList" name="317q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="317q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="317q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="317q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Uses basic strokes correctly</td><input type="hidden" name="318" value="Uses basic strokes correctly">
                  <td>
                  <select class="selectList" name="318q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="318q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="318q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="318q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
               

                
                
                 

              </table>
              </div>
               <!--THIRD-->
               <hr>

                 <!--FOURTH-->
                 <div class="col-md-4">
              
              <table class="table table-bordered table-sm">
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
                 <tr><th>BASIC MOVEMENT</th></tr>
              
                 <tr><td>Sits, stand and walks with good posture</td><input type="hidden" name="41" value="Sits, stand and walks with good posture">
                 <td>
                  <select class="selectList" name="41q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="41q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="41q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="41q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>

                 <tr>
                  <td>Runs and jogs gradually in increasing distance</td><input type="hidden" name="42" value="Runs and jogs gradually in increasing distance">
                  <td>
                  <select class="selectList" name="42q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="42q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="42q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="42q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Jumps & performs other exercises with or w/o music</td><input type="hidden" name="43" value="Jumps & performs other exercises with or w/o music">
                  <td>
                  <select class="selectList" name="43q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="43q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="43q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="43q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Lifts increasing heavy weights</td><input type="hidden" name="44" value="Lifts increasing heavy weights">
                  <td>
                  <select class="selectList" name="44q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="44q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="44q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="44q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Balances in one foot for gradually increasing period of time </td><input type="hidden" name="45" value="Balances in one foot for gradually increasing period of time">
                  <td>
                  <select class="selectList" name="45q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="45q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="45q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="45q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Imitates motor movements of people & animals</td><input type="hidden" name="46" value="Imitates motor movements of people & animals">
                  <td>
                  <select class="selectList" name="46q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="46q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="46q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="46q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Bends & strengthens knees properly while feet flat on the floor </td><input type="hidden" name="47" value="Bends & strengthens knees properly while feet flat on the floor ">
                  <td>
                  <select class="selectList" name="47q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="47q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="47q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="47q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Goes up and down the stairs</td><input type="hidden" name="48" value="Goes up and down the stairs">
                  <td>
                  <select class="selectList" name="48q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="48q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="48q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="48q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
              <tr><th>PERCEPTUAL MOTOR SKILLS</th></tr>   
              <tr>
                  <td>Uses clay to make simple but increasingly meaningful shapes & objects</td><input type="hidden" name="49" value="GUses clay to make simple but increasingly meaningful shapes & objects">
                  <td>
                  <select class="selectList" name="49q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="49q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="49q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="49q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
              <tr>
                  <td>Uses crayon to color</td><input type="hidden" name="410" value="Uses crayon to color">
                  <td>
                  <select class="selectList" name="410q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="410q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="410q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="410q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
              <tr><th>GROSS MOTOR SKILLS</th></tr>  

              <tr>
                  <td>Walks while carrying objects </td><input type="hidden" name="411" value="Walks while carrying objects ">
                  <td>
                  <select class="selectList" name="411q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="411q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="411q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="411q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Jumps toward aim without falling</td><input type="hidden" name="412" value="Jumps toward aim without falling">
                  <td>
                  <select class="selectList" name="412q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="412q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="412q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="412q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
              
              <tr>
                  <td>Throws and catches objects  </td><input type="hidden" name="413" value="Throws and catches objects">
                  <td>
                  <select class="selectList" name="413q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="413q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="413q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="413q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Kicks ball without losing balance</td><input type="hidden" name="414" value="Kicks ball without losing balance">
                  <td>
                  <select class="selectList" name="414q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="414q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="414q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="414q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Hops alternately without falling</td><input type="hidden" name="415" value="Hops alternately without falling">
                  <td>
                  <select class="selectList" name="415q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="415q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="415q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="415q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
            <tr><th>FINE MOTOR SKIILLS</th></tr>
            <tr>
                  <td>Makes an object out of clay</td><input type="hidden" name="416" value="Makes an object out of clay">
                  <td>
                  <select class="selectList" name="416q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="416q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="416q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="416q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
              <tr>
                  <td>Squeezes soft rubber ball of convenient size</td><input type="hidden" name="417" value="Squeezes soft rubber ball of convenient size">
                  <td>
                  <select class="selectList" name="417q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="417q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="417q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="417q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Folds divides & tears paper into halves / pieces</td><input type="hidden" name="418" value="Folds divides & tears paper into halves / pieces">
                  <td>
                  <select class="selectList" name="418q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="418q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="418q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="418q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr><td>Cuts out shapes, outline & objects</td><input type="hidden" name="419" value="FCuts out shapes, outline & objects">
                 <td>
                  <select class="selectList" name="419q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="419q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="419q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="419q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                  </tr>
                 <tr>
                  <td>Pastes paper properly</td><input type="hidden" name="420" value="Pastes paper properly">
                  <td>
                  <select class="selectList" name="420q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="420q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="420q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="420q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Strings and threads beads</td><input type="hidden" name="421" value="Strings and threads beads">
                  <td>
                  <select class="selectList" name="421q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="421q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="421q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="421q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
               

                 <tr>
                  <td>Turns doorknob with forearm rotation</td><input type="hidden" name="422" value="Turns doorknob with forearm rotation">
                  <td>
                  <select class="selectList" name="422q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="422q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="422q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="422q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Removes bottle cap</td><input type="hidden" name="423" value="Removes bottle cap">
                  <td>
                  <select class="selectList" name="423q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="423q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="423q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="423q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                
                
              </table>
              </div>
               <!--FOURTH-->

                     <!--FIFTH-->
                     <div class="col-md-4">
              
              <table class="table table-bordered table-sm">
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
        
                 <tr><td>Identifies colors</td><input type="hidden" name="51" value="Identifies colors">
                 <td>
                  <select class="selectList" name="51q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="51q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="51q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="51q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>

                 <tr>
                  <td>Identifies shapes</td><input type="hidden" name="52" value="Identifies shapes">
                  <td>
                  <select class="selectList" name="52q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="52q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="52q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="52q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Identifies letters of the alphabet</td><input type="hidden" name="53" value="Identifies letters of the alphabet">
                  <td>
                  <select class="selectList" name="53q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="53q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="53q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="53q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Identifies sizes (long, short, big, small, tall, short)</td><input type="hidden" name="54" value="Identifies sizes (long, short, big, small, tall, short)">
                  <td>
                  <select class="selectList" name="54q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="54q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="54q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="54q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Sorts objects according to color</td><input type="hidden" name="55" value="Sorts objects according to color">
                  <td>
                  <select class="selectList" name="55q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="55q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="55q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="55q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Sorts objects according to size</td><input type="hidden" name="56" value="Sorts objects according to size">
                  <td>
                  <select class="selectList" name="56q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="56q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="56q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="56q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Sorts objects according to shape</td><input type="hidden" name="57" value="Sorts objects according to shape">
                  <td>
                  <select class="selectList" name="57q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="57q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="57q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="57q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Tells the size of an object</td><input type="hidden" name="58" value="Tells the size of an object">
                  <td>
                  <select class="selectList" name="58q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="58q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="58q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="58q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
             
              <tr>
                  <td>Identifies numbers up to _______________</td><input type="hidden" name="59" value="Identifies numbers up to _______________">
                  <td>
                  <select class="selectList" name="59q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="59q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="59q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="59q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Counts numbers up to __________________</td><input type="hidden" name="510" value="Counts numbers up to __________________">
                  <td>
                  <select class="selectList" name="510q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="510q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="510q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="510q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
           
              <tr>
                  <td>Follows one to three steps direction </td><input type="hidden" name="511" value="Follows one to three steps direction ">
                  <td>
                  <select class="selectList" name="511q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="511q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="511q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="511q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Identifies the body parts</td><input type="hidden" name="512" value="Identifies the body parts">
                  <td>
                  <select class="selectList" name="512q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="512q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="512q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="512q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Identifies the five senses & their function</td><input type="hidden" name="513" value="Identifies the five senses & their function">
                  <td>
                  <select class="selectList" name="513q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="513q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="513q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="513q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
         
                 <tr>
                  <td>Sequences / Arranges picture in the story</td><input type="hidden" name="514" value="Sequences / Arranges picture in the story">
                  <td>
                  <select class="selectList" name="514q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="514q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="514q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="514q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                <tr>
                  <td>Identifies / Reads simple words with pictures</td><input type="hidden" name="515" value="Identifies / Reads simple words with pictures">
                  <td>
                  <select class="selectList" name="515q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="515q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="515q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="515q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Identifies / Reads simple phrases with pictures</td><input type="hidden" name="516" value="Identifies / Reads simple phrases with pictures">
                  <td>
                  <select class="selectList" name="516q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="516q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="516q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="516q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
               

                 <tr>
                  <td>Identifies / Reads simple sentences with pictures</td><input type="hidden" name="517" value="Identifies / Reads simple sentences with pictures">
                  <td>
                  <select class="selectList" name="517q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="517q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="517q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="517q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 
              <tr>
                  <td>Identifies days of the week</td><input type="hidden" name="518" value="Identifies days of the week">
                  <td>
                  <select class="selectList" name="518q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="518q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="518q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="518q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
              <tr>
                  <td>Identifies month in the year</td><input type="hidden" name="519" value="Identifies month in the year">
                  <td>
                  <select class="selectList" name="519q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="519q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="519q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="519q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
              
              <tr>
                  <td>Identifies one self</td><input type="hidden" name="520" value="Identifies one self">
                  <td>
                  <select class="selectList" name="520q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="520q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="520q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="520q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>

              <tr>
                  <td>Identifies members of the family</td><input type="hidden" name="521" value="Identifies members of the family">
                  <td>
                  <select class="selectList" name="521q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="521q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="521q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="521q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>

              <tr>
                  <td>Identifies different community helpers in school and / or in the community </td><input type="hidden" name="522" value="Identifies different community helpers in school and / or in the community">
                  <td>
                  <select class="selectList" name="522q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="522q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="522q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="522q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>

              <tr>
                  <td>Identifies objects / pictures being presented</td><input type="hidden" name="523" value="Identifies objects / pictures being presented">
                  <td>
                  <select class="selectList" name="523q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="523q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="523q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="523q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>

             


                
                
              </table>
              </div>
               <!--FIFTH-->

                            <!--SIX-->
                            <div class="col-md-4">
              
              <table class="table table-bordered table-sm">
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
        
                 <tr><td>Uses appropriate verbal communication for social interaction </td><input type="hidden" name="61" value="Uses appropriate verbal communication for social interaction">
                 <td>
                  <select class="selectList" name="61q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="61q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="61q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="61q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>

                 <tr>
                  <td>Learns how to speak in lower tone</td><input type="hidden" name="62" value="Learns how to speak in lower tone">
                  <td>
                  <select class="selectList" name="62q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="62q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="62q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="62q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Familiarizes with and takes routed direction</td><input type="hidden" name="63" value="Familiarizes with and takes routed direction">
                  <td>
                  <select class="selectList" name="63q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="63q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="63q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="63q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Follows “Quieting Down” instruction</td><input type="hidden" name="64" value="Follows “Quieting Down” instruction">
                  <td>
                  <select class="selectList" name="64q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="64q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="64q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="64q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Performs simple tasks (e.g. throwing of trash in the bin, etc.)</td><input type="hidden" name="65" value="Performs simple tasks (e.g. throwing of trash in the bin, etc.)">
                  <td>
                  <select class="selectList" name="65q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="65q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="65q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="65q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Puts back materials used like pencil in its proper place</td><input type="hidden" name="66" value="Puts back materials used like pencil in its proper place">
                  <td>
                  <select class="selectList" name="66q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="66q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="66q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="66q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Accepts consequences of behavior</td><input type="hidden" name="67" value="Accepts consequences of behavior">
                  <td>
                  <select class="selectList" name="67q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="67q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="67q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="67q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Follows teacher’s command instruction</td><input type="hidden" name="68" value="Follows teacher’s command instruction">
                  <td>
                  <select class="selectList" name="68q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="68q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="68q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="68q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
             
              <tr>
                  <td>Participates well in lesson being executed by the teacher</td><input type="hidden" name="69" value="Participates well in lesson being executed by the teacher">
                  <td>
                  <select class="selectList" name="69q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="69q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="69q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="69q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Responds to questions, activities given to him / her</td><input type="hidden" name="610" value="Responds to questions, activities given to him / her">
                  <td>
                  <select class="selectList" name="610q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="610q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="610q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="610q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
           
              <tr>
                  <td>Attends to tasks without getting out from the chair </td><input type="hidden" name="611" value="Attends to tasks without getting out from the chair">
                  <td>
                  <select class="selectList" name="611q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="611q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="611q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="611q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Watches / Listens to videos / music for 5 minutes or more</td><input type="hidden" name="612" value="Watches / Listens to videos / music for 5 minutes or more">
                  <td>
                  <select class="selectList" name="612q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="612q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="612q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="612q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Responds positively to behavior management procedures</td><input type="hidden" name="613" value="Responds positively to behavior management procedures">
                  <td>
                  <select class="selectList" name="613q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="613q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="613q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="613q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>

              <tr>
                  <td>Reduces / Eliminates in appropriate and aggressive behavior during session</td><input type="hidden" name="614" value="Reduces / Eliminates in appropriate and aggressive behavior during session">
                  <td>
                  <select class="selectList" name="614q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="614q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="614q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="614q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>

              <tr>
                  <td>Reduces / Eliminates tantrums during the session </td><input type="hidden" name="615" value="Reduces / Eliminates tantrums during the session">
                  <td>
                  <select class="selectList" name="615q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="615q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="615q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="615q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
         
                 <tr>
                  <td>Plays with other children</td><input type="hidden" name="616" value="Plays with other children">
                  <td>
                  <select class="selectList" name="616q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="616q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="616q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="616q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr><td>Takes turn in game activity</td><input type="hidden" name="617" value="Takes turn in game activity">
                 <td>
                  <select class="selectList" name="617q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="617q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="617q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="617q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                  </tr>
                 <tr>
                  <td>Takes turn games / knows how to wait when playing time</td><input type="hidden" name="618" value="Takes turn games / knows how to wait when playing time">
                  <td>
                  <select class="selectList" name="618q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="618q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="618q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="618q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Shares things / food without teacher’s prompt</td><input type="hidden" name="619" value="Shares things / food without teacher’s prompt">
                  <td>
                  <select class="selectList" name="619q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="619q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="619q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="619q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
               

                 <tr>
                  <td>Develops longer attention span to complete the task</td><input type="hidden" name="620" value="Develops longer attention span to complete the task">
                  <td>
                  <select class="selectList" name="620q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="620q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="620q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="620q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>
                 <tr>
                  <td>Completes task on time</td><input type="hidden" name="621" value="Completes task on time">
                  <td>
                  <select class="selectList" name="621q1" id="">
                      <option value=""><i class="bi bi-caret-down-fill"></i></option>
                      <option value="P">P</option>
                      <option value="AP">AP</option>
                      <option value="D">D</option>
                      <option value="B">B</option>
                      <option value="NO/NA">NO/NA</option>
                  </select></td>
                  <td >
                      <select  class="selectList" name="621q2" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>

                   <td>
                      <select  class="selectList" name="621q3" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
                   <td >
                      <select  class="selectList" name="621q4" id="">
                          <option value=""><i class="bi bi-caret-down-fill"></i></option>
                          <option value="P">P</option>
                          <option value="AP">AP</option>
                          <option value="D">D</option>
                          <option value="B">B</option>
                          <option value="NO/NA">NO/NA</option>
                      </select>
                   </td>
              </tr>

             

             


                
                
              </table>
              </div>
               <!--SIXTH-->
<hr>
               <!--teacher remarks-->
               <div class="col-md-4">
TEACHERS REMARK
               <table class="table table-bordered table-sm">
                <tr>
                    <th>QUATER</th>
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
    <tr><td colspan="3"> <input type="submit" value="ADD STUDENT" class="btn btn-primary float-right" name="submit"></td></tr>
  </table>

 

  </div>
<!--Assessment tab-->



</form>




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
 

                        </div>
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

</body>

</html>