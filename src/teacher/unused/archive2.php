<?php include('../session.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Student</title>

  <?php include('../links.php');  ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mammoth/1.4.18/mammoth.browser.min.js" integrity="sha512-Z8jpnlnXO9rena5GNKiX0EHQRNLLh0LobtlTESOc55UMcQPOdxBpSMrU9MMZI1b5Xoph9bPMFbNyi9s33Du0EA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

#loading {
  background-color: white;

  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  z-index: 9999999;
}
.center {
position: absolute;
left: 50%;
top: 50%;
transform: translate(-50%, -50%);

padding: 10px;
}



</style>
<body> 
<div id="loading">
	<div  class="center">
	<img src="../img/6.gif" width="300">
	</div>
</div>

<?php include('nav1.php');  ?>

<div class="container-fluid bg-light">

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
      aria-selected="true">Student Information</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
      aria-selected="false">Assessment</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
      aria-selected="false">ILP</a>
  </li>
</ul>
<div class="tab-content" align="center"id="myTabContent">
  <!--information tab-->
  <div class="tab-pane fade show active container" align="center" id="home" role="tabpanel" aria-labelledby="home-tab">
<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-7 bg-light p-3">
  <table align="left" class="table">
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
      <td><input type="text" name="address" class="form-control" placeholder="Student Address"></td>
    </tr>

    <tr>
      <td>Guardian Contact:</td>
      <td><input type="text" name="guardian_contact" class="form-control" placeholder="Guardian Contact"></td>
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
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  <input id="uploadPDF" type="file" name="file"/>&nbsp;
    <input type="button" value="Preview" onclick="PreviewImage();" />

    <div style="clear:both">
       <iframe id="viewer" frameborder="0" scrolling="no" width="600" height="800"></iframe>
    </div>
    <button type="submit" name="submit" class="btn btn-success btn-sm">
      <i class="fa fa-dot-circle-o"></i> Add
    </button>&emsp;


  </div>
<!--Assessment tab-->

<!--ilp tab-->
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
  <input id="uploadPDF" type="file" name="file"/>&nbsp;
    <input type="button" value="Preview" onclick="PreviewImage();" />

    <div style="clear:both">
       <iframe id="viewer" frameborder="0" scrolling="no" width="600" height="800"></iframe>
    </div>
    <button type="submit" name="submit" class="btn btn-success btn-sm">
      <i class="fa fa-dot-circle-o"></i> Add
    </button>&emsp;
  </div>
</div>
<!--ilp tab-->





</div>

</div>
</body>
<script src="../js/tab.js"></script>
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
</html>