<?php include('../session.php');  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Students</title>


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



</style>
<body>

<?php include('nav1.php');  ?>

<div class="container">
    <div class="row">
      <div class="col-md-1"></div>
        <div class="col-md-10 bg-light mt-5 border">
          <div class="row">
            <div class="card p-5 col-md-5" style="width: 20rem;" >
              <img src="../img/banner2.jfif" alt="" class="rounded-circle img-thumbnail" width="400">
                <div class="card-body">
                 
                 
                </div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-5 p-5">
                                      <form action="student_folder.php" method="GET">
                            <div class="form-group">
                              
                              <input type="number" class="form-control mt-5" id="exampleInputEmail1" name="lrn" aria-describedby="emailHelp" placeholder="Student LRN" >
                              
                            </div>
                           

                          <button type="submit" class="button btn-secondary float-right">Search Student</button>
                            
                            
                          </form>
            </div>
          </div>
        </div>

    </div>


</div>
</div>

</body>
</html>