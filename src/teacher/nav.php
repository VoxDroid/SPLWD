    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav <?php if(isset($_GET['color'])){ $_SESSION['color']= $_GET['color'];
        echo $_SESSION['color'];} 
        else{echo $_SESSION['color'];}?> sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
     
            <a class="sidebar-brand d-flex align-items-center justify-content-center mt-3" href="index.html">
                <div class="sidebar-brand-icon">
                    <img class="img-fluid rounded-circle" src="../img/sc22.jpg" alt="">
                </div>
                <div class="sidebar-brand-text mx-3">SC District<br>Student Profiling</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0 mt-5">
          

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a id = "haha" class="nav-link" href="profile.php">
                    <i class="fas fa-fw fa-user-alt"></i>
                    <span style="font-size: 18px;">Profile</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div style="font-size: 15px;" class="sidebar-heading">
                Student
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a  class="nav-link" href="folders.php">
                    <i class="fas fa-fw fa-address-card"></i>
                    <span style="font-size: 18px;">Student Folders</span></a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
            <a  class="nav-link" href="new_student.php">
                    <i class="fas fa-fw fa-user-plus"></i>
                    <span style="font-size: 18px;">Add Student</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <div style="font-size: 15px;" class="sidebar-heading">
                File Management
            </div>
            <li class="nav-item">
                <a  class="nav-link" href="log.php">
                    <i class="fas fa-fw fa-history"></i>
                    <span style="font-size: 18px;">Log History</span></a>
            </li>
            <li class="nav-item">
                <a  class="nav-link" href="archive.php">
                    <i class="fas fa-fw fa-archive"></i>
                    <span style="font-size: 18px;">Archive</span></a>
            </li>
          

   

     

       

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
        

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
              

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                       

                       
                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <?php
                                include('../connect.php');

                                $school = $_SESSION['school'];

                                $tt_id = $_SESSION['teacher_id'];
                                $sql = "SELECT * FROM new_student where enroll_status = 'Transferred' and school = '$school' and teacher_id = $tt_id ";

if ($result = mysqli_query($conn, $sql)) {

    // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result );
    
    if($rowcount != 0){

        echo "<span class='badge badge-danger badge-counter'>".$rowcount."+</span>";
        }
        else{
    
        }
 }?>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Transffered Student
                                </h6>

                                
                    <?php
	include('../connect.php');
	
    
    $school = $_SESSION['school'];

    $tt_id = $_SESSION['teacher_id'];
 
$sqlget1 = "SELECT * FROM new_student where enroll_status = 'Transferred' and school = '$school' and teacher_id = $tt_id";
$sqldata1 = mysqli_query($conn, $sqlget1) or die('Error Displaying Data'. mysqli_connect_error());

while ($row2 = mysqli_fetch_assoc($sqldata1)) {


		
?>


                                <a class="dropdown-item d-flex align-items-center" href="folder_transfer.php">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-user text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                   
                                        <span class="font-weight-bold justify-content-evenly"><?php echo $row2['fname']." ".$row2['lname'];?></span>
                                    </div>
                                </a>

                                <?php }?>
                               
                                
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->

                      
                       

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline  small" style="color:black;"><?php echo $_SESSION['school']." ";?> | <?php echo " ".$_SESSION['logged_in'];?></span>
                                <img class="img-profile rounded-circle"
                                    src="../img/<?php echo $_SESSION['img'];?>" onerror=this.src="../img/th.jfif">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="log.php">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>
                  

                </nav>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
 $(function () {
  // this will get the full URL at the address bar
  var url = window.location.href;


  $(".navbar-nav .nav-link").each(function () {
    // checks if its the same on the address bar
    if (url == (this.href)) {
        
      $(this).closest("li").addClass("active");
      //for making parent of submenu active
      $(this).closest("li").parent().parent().addClass("active");
    }
  });
});
</script>

                   <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>