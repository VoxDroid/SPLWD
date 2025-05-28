<?php include('../session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Student</title>

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
  padding: 7px;
}


</style>
<body>

<?php include('nav1.php');  ?>


<div class="container">
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#page1" role="tab" aria-controls="home"
      aria-selected="true">Student Information</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#page2" role="tab" aria-controls="assessment"
      aria-selected="false">Assessment</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#page3" role="tab" aria-controls="contact"
      aria-selected="false">Evaluation</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab1" data-toggle="tab" href="#page4" role="tab" aria-controls="contact"
      aria-selected="false">IEP/ILP</a>
  </li>
</ul>
<form action="addstudent.php"  method="post" enctype="multipart/form-data">

    <div class="row">
   
      <div class="col-md-1"></div>
      <div class="tab-content" id="myTabContent">
         
              <!-- page1 -->
              

              <div class=" container tab-pane fade show active" id="page1" role="tabpanel" aria-labelledby="home-tab">
<div class="tab-pane fade show active" id="page1" role="tabpanel" aria-labelledby="home-tab">
                  <div class="col-md-10 bg-light mt-5 border">
                       <div class="row">
                           <div class="card p-5 col-md-5" style="width: 20rem;" >
                                <img src="../img/banner2.jafif" onerror=this.src="../img/profile.png" alt="" id="thumb" class="rounded-circle img-thumbnail" width="400">
                                <div class="card-body">
                                <div class="custom-file">
                                <div id="wrapper">
                                <label for="fileToUpload1" class="btn btn-primary ml-4">Select Image</label>
                                <input type="file"   style="visibility:hidden;" name="fileToUpload1" class="mb-3" id="fileToUpload1" onchange="preview()"> 
</div> 
                           </div>
                      </div>
                  </div>
            <div class="col-md-2 pt-5">
            
            </div>
            <div class="col-md-5 pb-5 pr-5 pt-5">

            <table>
              <tr>
                <td><b>LRN : </b></td>
                <td> <input type="number" class="form-control" id="exampleInputEmail1" name="lrn" value="" aria-describedby="emailHelp" placeholder="Learners Reference Number"></td>
              </tr>

              <tr>
                <td><b>First Name : </b></td>
                <td> <input type="text" class="form-control" id="exampleInputEmail1" name="fname" value="" aria-describedby="emailHelp" placeholder="First Name"></td>
              </tr>

              <tr>
                <td><b>Last Name : </b></td>
                <td> <input type="text" class="form-control" id="exampleInputEmail1" name="lname" value="" aria-describedby="emailHelp" placeholder="Last Name"></td>
              </tr>

              <tr>
                <td><b>Middle Name : </b></td>
                <td> <input type="text" class="form-control" id="exampleInputEmail1" name="mname" value="" aria-describedby="emailHelp" placeholder="Middle Name"></td>
              </tr>

              <tr>
                <td><b>Birth Date : </b></td>
                <td> <input type="date" class="form-control" id="exampleInputEmail1" name="birth_date" value="" aria-describedby="emailHelp" placeholder="Birth Date"></td>
              </tr>

              <tr>
                <td><b>Gender : </b></td>
                <td> 
                  <select name="gender" id="" class="form-control">
                          <option value="">Gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                  </select></td>
              </tr>

              <tr>
                <td><b>Guardian : </b></td>
                <td> <input type="text" class="form-control" id="exampleInputEmail1" name="guardian" value="" aria-describedby="emailHelp" placeholder="Guardian"></td>
              </tr>

              <tr>
                <td><b>Guardian Contact Number : </b></td>
                <td> <input type="number" class="form-control" id="exampleInputEmail1" name="contact_no" value="" aria-describedby="emailHelp" placeholder="Guardian Contact Number"></td>
              </tr>

              <tr>
                <td><b>Adviser Employee Number : </b></td>
                <td> <input type="number" class="form-control" id="exampleInputEmail1" name="teacher_id" value="" aria-describedby="emailHelp" placeholder="Adviser Employee Number"></td>
              </tr>

              <tr>
                <td><b>Address : </b></td>
                <td> <input type="text" class="form-control" id="exampleInputEmail1" name="address" value="" aria-describedby="emailHelp" placeholder="Address"></td>
              </tr>
            </table>
                                  
                          <input class="float-right button" type="button" value="Next" id="secondaryButton" 
       onclick="document.getElementById('profile-tab').click()" />
          
            </div>
          </div>
        </div>
</div>

</div>
   
 <!-- page1 -->

               <!-- page2 -->
               <div class=" container tab-pane fade" id="page2" role="tabpanel" aria-labelledby="home-tab">
                
<div class="tab-pane fade show active" id="page1" role="tabpanel" aria-labelledby="home-tab">

                  <div class="col-md-10 bg-light mt-5 border">
                       <div class="row">
                           <div class="card p-5 col-md-5" style="width: 20rem;" >
                                <img src="../img/banner2.jafif" onerror=this.src="../img/profile.png" alt="" class="rounded-circle img-thumbnail" width="400">
                                <div class="card-body">
                                <div class="custom-file">
                              
                           </div>
                      </div>
                  </div>
            <div class="col-md-1"></div>
            <div class="col-md-6 p-5">

            <h3 class="text-center">Student Assessment</h3>
            <table>
              <tr>
                <td><b>Type of Assessment : </b></td>
                <td><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="t_assessment" placeholder="Type of Assessment"></td>
              </tr>

              <tr>
                <td><b>Chronological Age : </b></td>
                <td><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="c_age" placeholder="Chronological Age"></td>
              </tr>

              <tr>
                <td><b>Result : </b></td>
                <td><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="result" placeholder="Result"></td>
              </tr>

              <tr>
                <td><b>Administrator : </b></td>
                <td><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="administrator" placeholder="Administrator"></td>
              </tr>

              <tr>
                <td><b>Strengths : </b></td>
                <td><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="strenght" placeholder="Strengths"></td>
              </tr>

              <tr>
                <td><b>Category : </b></td>
                <td>
                  <select class="form-control" name="category">
                    <option value="Category">Category</option>
                    <option value="Hearing Impaired">Hearing Impaired</option>
                    <option value="Non Graded">Non Graded</option>
                    <option value="Transition Class">Transition Class</option>

                    
                  </select>
                  </td>
              </tr>
            </table>

                          <input class="float-right button" type="button" value="Next" id="secondaryButton" 
       onclick="document.getElementById('contact-tab').click()" />
                            
                            
                        
            </div>
          </div>
        </div>
</div>

</div>
   
 <!-- page2 -->


              <!-- page3 -->
              <div class=" container-fluid tab-pane fade" id="page3" role="tabpanel" aria-labelledby="home-tab">
<div class="tab-pane fade show active" id="page1" role="tabpanel" aria-labelledby="home-tab">
                  <div class="col-md-12 bg-light mt-5 border">
                  <div class="col-md-12 ">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="grade1-tab" data-toggle="tab" href="#page-grade1" role="tab" aria-controls="grade1"
      aria-selected="true">GRADE-I</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="grade2-tab" data-toggle="tab" href="#page-grade2" role="tab" aria-controls="grade2"
      aria-selected="false">GRADE-II</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="grade3-tab" data-toggle="tab" href="#page-grade3" role="tab" aria-controls="grade3"
      aria-selected="false">GRADE-III</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="grade4-tab1" data-toggle="tab" href="#page-grade4" role="tab" aria-controls="grade4"
      aria-selected="false">GRADE-IV</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="grade5-tab" data-toggle="tab" href="#page-grade5" role="tab" aria-controls="grade5"
      aria-selected="false">GRADE-V</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="grade6-tab1" data-toggle="tab" href="#page-grade6" role="tab" aria-controls="grade6"
      aria-selected="false">GRADE-VI</a>
  </li>
</ul>

<div class="row p-2">
<div class="tab-content" id="myTabContent">

<div class=" container-fluid tab-pane fade show active" id="page-grade1" role="tabpanel" aria-labelledby="home-tab">
  <div class="row">


  <h1 class="text-align-center">Student Evaluation GRADE I</h1>
  <hr>
              
  <div class="col-md-6 border">
<h3>Quarter I</h3>
<h5>Teacher: <input type="text" name="11t_id" placeholder="teacher employee id"></h5>
<h5>Batch Year: <input type="date" name="11date1" ></h5>

<p><strong> DAILY LIVING SKILLS DOMAIN:</strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="11dlsds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="11dlsdn"></textarea>   </u></p>
<hr>

<p><strong> SOCIO - EMOTIONAL DOMAIN: </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="11seds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="11sedn"></textarea> </u></p>
<hr>

<p><strong> LANGUAGE DEVELOPMENT DOMAIN: : </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="11ldds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="11lddn"></textarea> </u></p>
<hr>
<p><strong> PSYCHOMOTOR DOMAIN:  </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="11pds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="11pdn"></textarea> </u></p>
<hr>
<p><strong> COGNITIVE DOMAIN:   </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="11cds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="11cdn"></textarea> </u></p>
<hr>
<p><strong> BEHAVIORAL DEVELOPMENT:    </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="11bds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="11bdn"></textarea> </u></p>


</div>

<div class="col-md-6 border">
<h3>Quarter II</h3>
<h5>Teacher: <input type="text" name="12t_id" placeholder="teacher employee id"></h5>
<h5>Batch Year: <input type="date" name="12date1" ></h5>

<p><strong> DAILY LIVING SKILLS DOMAIN:</strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="12dlsds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="12dlsdn"></textarea>   </u></p>
<hr>

<p><strong> SOCIO - EMOTIONAL DOMAIN: </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="12seds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="12sedn"></textarea> </u></p>
<hr>

<p><strong> LANGUAGE DEVELOPMENT DOMAIN: : </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="12ldds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="12lddn"></textarea> </u></p>
<hr>
<p><strong> PSYCHOMOTOR DOMAIN:  </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="12pds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="12pdn"></textarea> </u></p>
<hr>
<p><strong> COGNITIVE DOMAIN:   </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="12cds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="12cdn"></textarea> </u></p>
<hr>
<p><strong> BEHAVIORAL DEVELOPMENT:    </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="12bds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="12bdn"></textarea> </u></p>


</div>
<hr>
<div class="col-md-6 border">
<h3>Quarter III</h3>
<h5>Teacher: <input type="text" name="13t_id" placeholder="teacher employee id"></h5>
<h5>Batch Year: <input type="date" name="13date1" ></h5>

<p><strong> DAILY LIVING SKILLS DOMAIN:</strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="13dlsds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="13dlsdn"></textarea>   </u></p>
<hr>

<p><strong> SOCIO - EMOTIONAL DOMAIN: </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="13seds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="13sedn"></textarea> </u></p>
<hr>

<p><strong> LANGUAGE DEVELOPMENT DOMAIN: : </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="13ldds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="13lddn"></textarea> </u></p>
<hr>
<p><strong> PSYCHOMOTOR DOMAIN:  </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="13pds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="13pdn"></textarea> </u></p>
<hr>
<p><strong> COGNITIVE DOMAIN:   </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="13cds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="13cdn"></textarea> </u></p>
<hr>
<p><strong> BEHAVIORAL DEVELOPMENT:    </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="13bds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="13bdn"></textarea> </u></p>


</div>

<div class="col-md-6 border">
<h3>Quarter IV</h3>
<h5>Teacher: <input type="text" name="14t_id" placeholder="teacher employee id"></h5>
<h5>Batch Year: <input type="date" name="14date1" ></h5>

<p><strong> DAILY LIVING SKILLS DOMAIN:</strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="14dlsds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="14dlsdn"></textarea>   </u></p>
<hr>

<p><strong> SOCIO - EMOTIONAL DOMAIN: </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="14seds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="14sedn"></textarea> </u></p>
<hr>

<p><strong> LANGUAGE DEVELOPMENT DOMAIN: : </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="14ldds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="14lddn"></textarea> </u></p>
<hr>
<p><strong> PSYCHOMOTOR DOMAIN:  </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="14pds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="14pdn"></textarea> </u></p>
<hr>
<p><strong> COGNITIVE DOMAIN:   </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="14cds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="14cdn"></textarea> </u></p>
<hr>
<p><strong> BEHAVIORAL DEVELOPMENT:    </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="14bds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="14bdn"></textarea> </u></p>


</div>
</div>
                        
</div><!--closing grade1-->

<!--page-grade2-->

<div class=" container tab-pane fade" id="page-grade2" role="tabpanel" aria-labelledby="assessment-tab">

              

  <div class="row">


<h1 class="text-align-center">Student Evaluation GRADE II</h1>
<hr>
            
<div class="col-md-6 border">
<h3>Quarter I</h3>
<h5>Teacher: <input type="text" name="21t_id" placeholder="teacher employee id"></h5>
<h5>Batch Year: <input type="date" name="21date1" ></h5>

<p><strong> DAILY LIVING SKILLS DOMAIN:</strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="21dlsds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="21dlsdn"></textarea>   </u></p>
<hr>

<p><strong> SOCIO - EMOTIONAL DOMAIN: </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="21seds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="21sedn"></textarea> </u></p>
<hr>

<p><strong> LANGUAGE DEVELOPMENT DOMAIN: : </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="21ldds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="21lddn"></textarea> </u></p>
<hr>
<p><strong> PSYCHOMOTOR DOMAIN:  </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="21pds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="21pdn"></textarea> </u></p>
<hr>
<p><strong> COGNITIVE DOMAIN:   </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="21cds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="21cdn"></textarea> </u></p>
<hr>
<p><strong> BEHAVIORAL DEVELOPMENT:    </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="21bds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="21bdn"></textarea> </u></p>


</div>

<div class="col-md-6 border">
<h3>Quarter II</h3>
<h5>Teacher: <input type="text" name="22t_id" placeholder="teacher employee id"></h5>
<h5>Batch Year: <input type="date" name="22date1" ></h5>

<p><strong> DAILY LIVING SKILLS DOMAIN:</strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="22dlsds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="22dlsdn"></textarea>   </u></p>
<hr>

<p><strong> SOCIO - EMOTIONAL DOMAIN: </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="22seds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="22sedn"></textarea> </u></p>
<hr>

<p><strong> LANGUAGE DEVELOPMENT DOMAIN: : </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="22ldds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="22lddn"></textarea> </u></p>
<hr>
<p><strong> PSYCHOMOTOR DOMAIN:  </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="22pds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="22pdn"></textarea> </u></p>
<hr>
<p><strong> COGNITIVE DOMAIN:   </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="22cds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="22cdn"></textarea> </u></p>
<hr>
<p><strong> BEHAVIORAL DEVELOPMENT:    </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="22bds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="22bdn"></textarea> </u></p>


</div>
<hr>
<div class="col-md-6 border">
<h3>Quarter III</h3>
<h5>Teacher: <input type="text" name="23t_id" placeholder="teacher employee id"></h5>
<h5>Batch Year: <input type="date" name="23date1" ></h5>

<p><strong> DAILY LIVING SKILLS DOMAIN:</strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="23dlsds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="23dlsdn"></textarea>   </u></p>
<hr>

<p><strong> SOCIO - EMOTIONAL DOMAIN: </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="23seds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="23sedn"></textarea> </u></p>
<hr>

<p><strong> LANGUAGE DEVELOPMENT DOMAIN: : </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="23ldds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="23lddn"></textarea> </u></p>
<hr>
<p><strong> PSYCHOMOTOR DOMAIN:  </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="23pds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="23pdn"></textarea> </u></p>
<hr>
<p><strong> COGNITIVE DOMAIN:   </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="23cds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="23cdn"></textarea> </u></p>
<hr>
<p><strong> BEHAVIORAL DEVELOPMENT:    </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="23bds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="23bdn"></textarea> </u></p>


</div>

<div class="col-md-6 border">
<h3>Quarter IV</h3>
<h5>Teacher: <input type="text" name="24t_id" placeholder="teacher employee id"></h5>
<h5>Batch Year: <input type="date" name="24date1" ></h5>

<p><strong> DAILY LIVING SKILLS DOMAIN:</strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="24dlsds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="24dlsdn"></textarea>   </u></p>
<hr>

<p><strong> SOCIO - EMOTIONAL DOMAIN: </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="24seds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="24sedn"></textarea> </u></p>
<hr>

<p><strong> LANGUAGE DEVELOPMENT DOMAIN: : </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="24ldds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="24lddn"></textarea> </u></p>
<hr>
<p><strong> PSYCHOMOTOR DOMAIN:  </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="24pds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="24pdn"></textarea> </u></p>
<hr>
<p><strong> COGNITIVE DOMAIN:   </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="24cds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="24cdn"></textarea> </u></p>
<hr>
<p><strong> BEHAVIORAL DEVELOPMENT:    </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="24bds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="24bdn"></textarea> </u></p>


</div>
</div>



</div>
<!--closing grade2-->

<!--page-grade3-->

<div class=" container tab-pane fade" id="page-grade3" role="tabpanel" aria-labelledby="home-tab">
<div class="row">


<h1 class="text-align-center">Student Evaluation GRADE III</h1>
<hr>
            
<div class="col-md-6 border">
<h3>Quarter I</h3>
<h5>Teacher: <input type="text" name="31t_id" placeholder="teacher employee id"></h5>
<h5>Batch Year: <input type="date" name="31date1" ></h5>

<p><strong> DAILY LIVING SKILLS DOMAIN:</strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="31dlsds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="31dlsdn"></textarea>   </u></p>
<hr>

<p><strong> SOCIO - EMOTIONAL DOMAIN: </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="31seds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="31sedn"></textarea> </u></p>
<hr>

<p><strong> LANGUAGE DEVELOPMENT DOMAIN: : </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="31ldds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="31lddn"></textarea> </u></p>
<hr>
<p><strong> PSYCHOMOTOR DOMAIN:  </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="31pds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="31pdn"></textarea> </u></p>
<hr>
<p><strong> COGNITIVE DOMAIN:   </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="31cds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="31cdn"></textarea> </u></p>
<hr>
<p><strong> BEHAVIORAL DEVELOPMENT:    </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="31bds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="31bdn"></textarea> </u></p>


</div>

<div class="col-md-6 border">
<h3>Quarter II</h3>
<h5>Teacher: <input type="text" name="32t_id" placeholder="teacher employee id"></h5>
<h5>Batch Year: <input type="date" name="32date1" ></h5>

<p><strong> DAILY LIVING SKILLS DOMAIN:</strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="32dlsds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="32dlsdn"></textarea>   </u></p>
<hr>

<p><strong> SOCIO - EMOTIONAL DOMAIN: </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="32seds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="32sedn"></textarea> </u></p>
<hr>

<p><strong> LANGUAGE DEVELOPMENT DOMAIN: : </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="32ldds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="32lddn"></textarea> </u></p>
<hr>
<p><strong> PSYCHOMOTOR DOMAIN:  </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="32pds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="32pdn"></textarea> </u></p>
<hr>
<p><strong> COGNITIVE DOMAIN:   </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="32cds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="32cdn"></textarea> </u></p>
<hr>
<p><strong> BEHAVIORAL DEVELOPMENT:    </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="32bds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="32bdn"></textarea> </u></p>


</div>
<hr>
<div class="col-md-6 border">
<h3>Quarter III</h3>
<h5>Teacher: <input type="text" name="33t_id" placeholder="teacher employee id"></h5>
<h5>Batch Year: <input type="date" name="33date1" ></h5>

<p><strong> DAILY LIVING SKILLS DOMAIN:</strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="33dlsds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="33dlsdn"></textarea>   </u></p>
<hr>

<p><strong> SOCIO - EMOTIONAL DOMAIN: </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="33seds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="33sedn"></textarea> </u></p>
<hr>

<p><strong> LANGUAGE DEVELOPMENT DOMAIN: : </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="33ldds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="33lddn"></textarea> </u></p>
<hr>
<p><strong> PSYCHOMOTOR DOMAIN:  </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="33pds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="33pdn"></textarea> </u></p>
<hr>
<p><strong> COGNITIVE DOMAIN:   </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="33cds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="33cdn"></textarea> </u></p>
<hr>
<p><strong> BEHAVIORAL DEVELOPMENT:    </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="33bds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="33bdn"></textarea> </u></p>


</div>

<div class="col-md-6 border">
<h3>Quarter IV</h3>
<h5>Teacher: <input type="text" name="34t_id" placeholder="teacher employee id"></h5>
<h5>Batch Year: <input type="date" name="34date1" ></h5>

<p><strong> DAILY LIVING SKILLS DOMAIN:</strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="34dlsds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="34dlsdn"></textarea>   </u></p>
<hr>

<p><strong> SOCIO - EMOTIONAL DOMAIN: </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="34seds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="34sedn"></textarea> </u></p>
<hr>

<p><strong> LANGUAGE DEVELOPMENT DOMAIN: : </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="34ldds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="34lddn"></textarea> </u></p>
<hr>
<p><strong> PSYCHOMOTOR DOMAIN:  </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="34pds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="34pdn"></textarea> </u></p>
<hr>
<p><strong> COGNITIVE DOMAIN:   </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="34cds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="34cdn"></textarea> </u></p>
<hr>
<p><strong> BEHAVIORAL DEVELOPMENT:    </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="34bds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="34bdn"></textarea> </u></p>


</div>
</div>


                          


</div>
<!--closing grade3-->

<!--page-grade4-->

<div class=" container tab-pane fade" id="page-grade4" role="tabpanel" aria-labelledby="home-tab">
<div class="row">


<h1 class="text-align-center">Student Evaluation GRADE IV</h1>
<hr>
            
<div class="col-md-6 border">
<h3>Quarter I</h3>
<h5>Teacher: <input type="text" name="41t_id" placeholder="teacher employee id"></h5>
<h5>Batch Year: <input type="date" name="41date1" ></h5>

<p><strong> DAILY LIVING SKILLS DOMAIN:</strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="41dlsds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="41dlsdn"></textarea>   </u></p>
<hr>

<p><strong> SOCIO - EMOTIONAL DOMAIN: </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="41seds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="41sedn"></textarea> </u></p>
<hr>

<p><strong> LANGUAGE DEVELOPMENT DOMAIN: : </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="41ldds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="41lddn"></textarea> </u></p>
<hr>
<p><strong> PSYCHOMOTOR DOMAIN:  </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="41pds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="41pdn"></textarea> </u></p>
<hr>
<p><strong> COGNITIVE DOMAIN:   </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="41cds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="41cdn"></textarea> </u></p>
<hr>
<p><strong> BEHAVIORAL DEVELOPMENT:    </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="41bds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="41bdn"></textarea> </u></p>


</div>

<div class="col-md-6 border">
<h3>Quarter II</h3>
<h5>Teacher: <input type="text" name="42t_id" placeholder="teacher employee id"></h5>
<h5>Batch Year: <input type="date" name="42date1" ></h5>

<p><strong> DAILY LIVING SKILLS DOMAIN:</strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="42dlsds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="42dlsdn"></textarea>   </u></p>
<hr>

<p><strong> SOCIO - EMOTIONAL DOMAIN: </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="42seds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="42sedn"></textarea> </u></p>
<hr>

<p><strong> LANGUAGE DEVELOPMENT DOMAIN: : </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="42ldds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="42lddn"></textarea> </u></p>
<hr>
<p><strong> PSYCHOMOTOR DOMAIN:  </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="42pds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="42pdn"></textarea> </u></p>
<hr>
<p><strong> COGNITIVE DOMAIN:   </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="42cds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="42cdn"></textarea> </u></p>
<hr>
<p><strong> BEHAVIORAL DEVELOPMENT:    </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="42bds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="42bdn"></textarea> </u></p>


</div>
<hr>
<div class="col-md-6 border">
<h3>Quarter III</h3>
<h5>Teacher: <input type="text" name="43t_id" placeholder="teacher employee id"></h5>
<h5>Batch Year: <input type="date" name="43date1" ></h5>

<p><strong> DAILY LIVING SKILLS DOMAIN:</strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="43dlsds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="43dlsdn"></textarea>   </u></p>
<hr>

<p><strong> SOCIO - EMOTIONAL DOMAIN: </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="43seds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="43sedn"></textarea> </u></p>
<hr>

<p><strong> LANGUAGE DEVELOPMENT DOMAIN: : </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="43ldds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="43lddn"></textarea> </u></p>
<hr>
<p><strong> PSYCHOMOTOR DOMAIN:  </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="43pds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="43pdn"></textarea> </u></p>
<hr>
<p><strong> COGNITIVE DOMAIN:   </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="43cds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="43cdn"></textarea> </u></p>
<hr>
<p><strong> BEHAVIORAL DEVELOPMENT:    </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="43bds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="43bdn"></textarea> </u></p>


</div>

<div class="col-md-6 border">
<h3>Quarter IV</h3>
<h5>Teacher: <input type="text" name="44t_id" placeholder="teacher employee id"></h5>
<h5>Batch Year: <input type="date" name="44date1" ></h5>

<p><strong> DAILY LIVING SKILLS DOMAIN:</strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="44dlsds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="44dlsdn"></textarea>   </u></p>
<hr>

<p><strong> SOCIO - EMOTIONAL DOMAIN: </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="44seds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="44sedn"></textarea> </u></p>
<hr>

<p><strong> LANGUAGE DEVELOPMENT DOMAIN: : </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="44ldds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="44lddn"></textarea> </u></p>
<hr>
<p><strong> PSYCHOMOTOR DOMAIN:  </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="44pds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="44pdn"></textarea> </u></p>
<hr>
<p><strong> COGNITIVE DOMAIN:   </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="44cds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="44cdn"></textarea> </u></p>
<hr>
<p><strong> BEHAVIORAL DEVELOPMENT:    </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="44bds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="44bdn"></textarea> </u></p>


</div>
</div>


</div>
<!--closing grade4-->

<!--page-grade5-->

<div class=" container tab-pane fade" id="page-grade5" role="tabpanel" aria-labelledby="home-tab">
<div class="row">


<h1 class="text-align-center">Student Evaluation GRADE V</h1>
<hr>
            
<div class="col-md-6 border">
<h3>Quarter I</h3>
<h5>Teacher: <input type="text" name="51t_id" placeholder="teacher employee id"></h5>
<h5>Batch Year: <input type="date" name="51date1" ></h5>

<p><strong> DAILY LIVING SKILLS DOMAIN:</strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="51dlsds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="51dlsdn"></textarea>   </u></p>
<hr>

<p><strong> SOCIO - EMOTIONAL DOMAIN: </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="51seds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="51sedn"></textarea> </u></p>
<hr>

<p><strong> LANGUAGE DEVELOPMENT DOMAIN: : </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="51ldds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="51lddn"></textarea> </u></p>
<hr>
<p><strong> PSYCHOMOTOR DOMAIN:  </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="51pds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="51pdn"></textarea> </u></p>
<hr>
<p><strong> COGNITIVE DOMAIN:   </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="51cds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="51cdn"></textarea> </u></p>
<hr>
<p><strong> BEHAVIORAL DEVELOPMENT:    </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="51bds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="51bdn"></textarea> </u></p>


</div>

<div class="col-md-6 border">
<h3>Quarter II</h3>
<h5>Teacher: <input type="text" name="52t_id" placeholder="teacher employee id"></h5>
<h5>Batch Year: <input type="date" name="52date1" ></h5>

<p><strong> DAILY LIVING SKILLS DOMAIN:</strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="52dlsds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="52dlsdn"></textarea>   </u></p>
<hr>

<p><strong> SOCIO - EMOTIONAL DOMAIN: </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="52seds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="52sedn"></textarea> </u></p>
<hr>

<p><strong> LANGUAGE DEVELOPMENT DOMAIN: : </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="52ldds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="52lddn"></textarea> </u></p>
<hr>
<p><strong> PSYCHOMOTOR DOMAIN:  </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="52pds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="52pdn"></textarea> </u></p>
<hr>
<p><strong> COGNITIVE DOMAIN:   </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="52cds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="52cdn"></textarea> </u></p>
<hr>
<p><strong> BEHAVIORAL DEVELOPMENT:    </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="52bds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="52bdn"></textarea> </u></p>


</div>
<hr>
<div class="col-md-6 border">
<h3>Quarter III</h3>
<h5>Teacher: <input type="text" name="53t_id" placeholder="teacher employee id"></h5>
<h5>Batch Year: <input type="date" name="53date1" ></h5>

<p><strong> DAILY LIVING SKILLS DOMAIN:</strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="53dlsds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="53dlsdn"></textarea>   </u></p>
<hr>

<p><strong> SOCIO - EMOTIONAL DOMAIN: </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="53seds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="53sedn"></textarea> </u></p>
<hr>

<p><strong> LANGUAGE DEVELOPMENT DOMAIN: : </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="53ldds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="53lddn"></textarea> </u></p>
<hr>
<p><strong> PSYCHOMOTOR DOMAIN:  </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="53pds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="53pdn"></textarea> </u></p>
<hr>
<p><strong> COGNITIVE DOMAIN:   </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="53cds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="53cdn"></textarea> </u></p>
<hr>
<p><strong> BEHAVIORAL DEVELOPMENT:    </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="53bds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="53bdn"></textarea> </u></p>


</div>

<div class="col-md-6 border">
<h3>Quarter IV</h3>
<h5>Teacher: <input type="text" name="54t_id" placeholder="teacher employee id"></h5>
<h5>Batch Year: <input type="date" name="54date1" ></h5>

<p><strong> DAILY LIVING SKILLS DOMAIN:</strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="54dlsds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="54dlsdn"></textarea>   </u></p>
<hr>

<p><strong> SOCIO - EMOTIONAL DOMAIN: </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="54seds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="54sedn"></textarea> </u></p>
<hr>

<p><strong> LANGUAGE DEVELOPMENT DOMAIN: : </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="54ldds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="54lddn"></textarea> </u></p>
<hr>
<p><strong> PSYCHOMOTOR DOMAIN:  </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="54pds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="54pdn"></textarea> </u></p>
<hr>
<p><strong> COGNITIVE DOMAIN:   </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="54cds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="54cdn"></textarea> </u></p>
<hr>
<p><strong> BEHAVIORAL DEVELOPMENT:    </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="54bds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="54bdn"></textarea> </u></p>


</div>
</div>

</div>
<!--closing grade5-->

<!--page-grade6-->

<div class=" container tab-pane fade" id="page-grade6" role="tabpanel" aria-labelledby="home-tab">
<div class="row">


<h1 class="text-align-center">Student Evaluation GRADE VI</h1>
<hr>
            
<div class="col-md-6 border">
<h3>Quarter I</h3>
<h5>Teacher: <input type="text" name="61t_id" placeholder="teacher employee id"></h5>
<h5>Batch Year: <input type="date" name="61date1" ></h5>

<p><strong> DAILY LIVING SKILLS DOMAIN:</strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="61dlsds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="61dlsdn"></textarea>   </u></p>
<hr>

<p><strong> SOCIO - EMOTIONAL DOMAIN: </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="61seds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="61sedn"></textarea> </u></p>
<hr>

<p><strong> LANGUAGE DEVELOPMENT DOMAIN: : </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="61ldds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="61lddn"></textarea> </u></p>
<hr>
<p><strong> PSYCHOMOTOR DOMAIN:  </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="61pds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="61pdn"></textarea> </u></p>
<hr>
<p><strong> COGNITIVE DOMAIN:   </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="61cds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="61cdn"></textarea> </u></p>
<hr>
<p><strong> BEHAVIORAL DEVELOPMENT:    </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="61bds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="61bdn"></textarea> </u></p>


</div>

<div class="col-md-6 border">
<h3>Quarter II</h3>
<h5>Teacher: <input type="text" name="62t_id" placeholder="teacher employee id"></h5>
<h5>Batch Year: <input type="date" name="62date1" ></h5>

<p><strong> DAILY LIVING SKILLS DOMAIN:</strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="62dlsds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="62dlsdn"></textarea>   </u></p>
<hr>

<p><strong> SOCIO - EMOTIONAL DOMAIN: </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="62seds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="62sedn"></textarea> </u></p>
<hr>

<p><strong> LANGUAGE DEVELOPMENT DOMAIN: : </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="62ldds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="62lddn"></textarea> </u></p>
<hr>
<p><strong> PSYCHOMOTOR DOMAIN:  </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="62pds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="62pdn"></textarea> </u></p>
<hr>
<p><strong> COGNITIVE DOMAIN:   </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="62cds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="62cdn"></textarea> </u></p>
<hr>
<p><strong> BEHAVIORAL DEVELOPMENT:    </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="62bds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="62bdn"></textarea> </u></p>


</div>
<hr>
<div class="col-md-6 border">
<h3>Quarter III</h3>
<h5>Teacher: <input type="text" name="63t_id" placeholder="teacher employee id"></h5>
<h5>Batch Year: <input type="date" name="63date1" ></h5>

<p><strong> DAILY LIVING SKILLS DOMAIN:</strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="63dlsds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="63dlsdn"></textarea>   </u></p>
<hr>

<p><strong> SOCIO - EMOTIONAL DOMAIN: </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="63seds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="63sedn"></textarea> </u></p>
<hr>

<p><strong> LANGUAGE DEVELOPMENT DOMAIN: : </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="63ldds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="63lddn"></textarea> </u></p>
<hr>
<p><strong> PSYCHOMOTOR DOMAIN:  </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="63pds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="63pdn"></textarea> </u></p>
<hr>
<p><strong> COGNITIVE DOMAIN:   </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="63cds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="63cdn"></textarea> </u></p>
<hr>
<p><strong> BEHAVIORAL DEVELOPMENT:    </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="63bds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="63bdn"></textarea> </u></p>


</div>

<div class="col-md-6 border">
<h3>Quarter IV</h3>
<h5>Teacher: <input type="text" name="64t_id" placeholder="teacher employee id"></h5>
<h5>Batch Year: <input type="date" name="64date1" ></h5>

<p><strong> DAILY LIVING SKILLS DOMAIN:</strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="64dlsds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="64dlsdn"></textarea>   </u></p>
<hr>

<p><strong> SOCIO - EMOTIONAL DOMAIN: </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="64seds"></textarea>  </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="64sedn"></textarea> </u></p>
<hr>

<p><strong> LANGUAGE DEVELOPMENT DOMAIN: : </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="64ldds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="64lddn"></textarea> </u></p>
<hr>
<p><strong> PSYCHOMOTOR DOMAIN:  </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="64pds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="64pdn"></textarea> </u></p>
<hr>
<p><strong> COGNITIVE DOMAIN:   </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="64cds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="64cdn"></textarea> </u></p>
<hr>
<p><strong> BEHAVIORAL DEVELOPMENT:    </strong> </p>
<p><strong> Strength/s: </strong><u ><textarea class="form-control" type="text" name="64bds"></textarea> </u></p>
<p><strong> Need/s:</strong><u ><textarea class="form-control" type="text" name="64bdn"></textarea> </u></p>


</div>
</div>
</div>
<!--closing grade6-->

</div><!--closing tab-content-->


         
</div>

        
</div>
<div class="p-5"><input class="float-right button ml-3" type="button" value="Next" id="secondaryButton" onclick="document.getElementById('contact-tab1').click()" /></div>

</div>
</div>

</div>
   
 <!-- page3 -->



 
                <!-- page4 -->
                <div class=" container tab-pane fade" id="page4" role="tabpanel" aria-labelledby="home-tab">
<div class="tab-pane fade show active" id="page1" role="tabpanel" aria-labelledby="home-tab">
                  <div class="col-md-10 bg-light mt-5 border">
                       <div class="row">
                           <div class="card p-5 col-md-5" style="width: 20rem;" >
                                <img src="../img/banner2.jafif" onerror=this.src="../img/profile.png" alt="" class="rounded-circle img-thumbnail" width="400">
                                <div class="card-body">
                                <div class="custom-file">
                              
                           </div>
                      </div>
                  </div>
            <div class="col-md-2"></div>
            <div class="col-md-5 p-5">
          
                            <div class="form-group">
                              <h2 class="mb-5">Upload Student IEP/ILP</h2>
                              
                              <input type="file" name="fileToUpload" class="mb-3" id="fileToUpload">
                              <input type="date" class="form-control" name="dateilp" >
                              <input name="submit1" type="submit" value="Add Student" class="button btn-primary mt-5 float-right">
                            </div>
          
                         
            </div>
          </div>
        </div>
</div>

</div>
   
 <!-- page4 -->



 


</div>
</form>

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
  title: 'Add Student Successful!',
  text: 'Student profile successfully Added!',
  icon: 'success',
  button: 'OK',
});

</script>";
  # code...
}


?>
</html>