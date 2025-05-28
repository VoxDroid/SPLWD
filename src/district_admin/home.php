<?php include('../session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>HOME</title>

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
th, td {
  padding: 15px;
}



</style>
<body>

<?php include('nav1.php');  ?>



<div class="container">
    <div class="row">
      <div class="col-md-1"></div>
        <div class="col-md-10 bg-light mt-5 border">
          <div class="row">
          <?php
            include('../connect.php');
            $id = $_SESSION['logged_id'];
$sqlget = "SELECT * FROM teachers where id=$id";
$sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());

while ($row = mysqli_fetch_assoc($sqldata)) {

?>
            <div class="card p-5 col-md-5" style="width: 20rem;" >
              <img src="../img/" onerror=this.src="../img/<?php echo $row['img'];?>" alt="" id="thumb" class="rounded-circle img-thumbnail" width="400">
                <div class="card-body">
                <form action="update_profile.php"  method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-8">

                <label for="fileToUpload1" class="btn btn-primary" style="font-size:13px; ">Select Image</label>
               
                <input type="file"   style="visibility:hidden;" name="fileToUpload1"  id="fileToUpload1" onchange="preview()"> 
                </div>

                <div class="col-md-4"> <input type="submit" value="update"></div>
                </div>
                </form>
                 <h5 class="card-title">Fullname: <?php echo $row['fname']." ".$row['lname'];?></h5>
                 <h5 class="card-title">Employee ID: <?php echo $row['teacher_id'];?></h5>
             
                
                 
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-6 p-5">
              <form>

          
  <table class="text-right">



    <tr>
      <td> <b>Email : </b> </td>
      <td><input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="<?php echo $row['email'];?>" readonly="readonly"></td>
    </tr>

    <tr>
      <td> <b>Contact : </b> </td>
      <td ><input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="contact_no" placeholder="<?php echo $row['contact_no'];?>" readonly="readonly"></td>
    </tr>

    <tr>
      <td> <b>Address : </b> </td>
      <td><input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="address" placeholder="<?php echo $row['address'];?>" readonly="readonly"></td>
    </tr>

  

    <tr>
      <td> <b>Birth Date : </b> </td>
      <td><input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="birt_date" placeholder="<?php echo $row['birth_date'];?>" readonly="readonly"></td>
    </tr>
  </table>
                                        
                     

                          <button class="button btn-secondary float-right" type="button"  data-toggle="modal" data-target="#myModal">Update Profile</button>
                            
                            
                          </form>
                          <div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Info</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="update_teacher.php" method="POST">
      <table class="text-right">
      <tr>
      <td> <b>First Name : </b> </td>
      <td><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="fname" value="<?php echo $row['fname'];?>" ></td>
    </tr>
    <tr>
      <td> <b>Last Name : </b> </td>
      <td><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="lname" value="<?php echo $row['lname'];?>" ></td>
    </tr>
    <tr>
      <td> <b>Middle Name : </b> </td>
      <td><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="mname" value="<?php echo $row['mname'];?>" ></td>
    </tr>
    <tr>
      <td> <b>Email : </b> </td>
      <td><input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?php echo $row['email'];?>" ></td>
    </tr>

    <tr>
      <td> <b>Contact : </b> </td>
      <td ><input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="contact_no" value="<?php echo $row['contact_no'];?>" ></td>
    </tr>

    <tr>
      <td> <b>Address : </b> </td>
      <td><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="address" value="<?php echo $row['address'];?>" ></td>
    </tr>

  

    <tr>
      <td> <b>Birth Date : </b> </td>
      <td><input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="birth_date" value="<?php echo $row['birth_date'];?>" ></td>
    </tr>
  </table>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-primary" >Update</button>
      </div>
      </form>

    </div>
  </div>
</div>

                          <?php } ?>
            </div>
          </div>
        </div>

    </div>


</div>



</body>
<script type="text/javascript">
function preview() {
   thumb.src=URL.createObjectURL(event.target.files[0]);
}
</script>
<?php 
if (isset($_GET['alert'])) {
  echo "
<script type='text/javascript'>
swal({
  title: 'Updated Successful!',
  text: 'information successfully updated!',
  icon: 'success',
  button: 'OK',
});

</script>";
  # code...
}


?>
</html>