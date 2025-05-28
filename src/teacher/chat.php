<?php include('../session.php');?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Folders</title>

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
<style>
body {
  background-color: #F3F5F9;
}
</style>

    <style>

.gradient-custom {
/* fallback for old browsers */
background: #fccb90;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to bottom right, rgba(252, 203, 144, 1), rgba(213, 126, 235, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background:  #f5f5f5
}

.mask-custom {
background: rgba(24, 24, 16, .2);
border-radius: 2em;
backdrop-filter: blur(15px);
border: 2px solid rgba(255, 255, 255, 0.05);
background-clip: padding-box;
box-shadow: 10px 10px 10px rgba(46, 54, 68, 0.03);
}
      </style> 

<style>
body{margin-top:20px;}

.chat-online {
    color: #34ce57
}

.chat-offline {
    color: #e4606d
}

.chat-messages {
    display: flex;
    flex-direction: column;
    max-height: 800px;
    overflow-y: scroll
}

.chat-message-left,
.chat-message-right {
    display: flex;
    flex-shrink: 0
}

.chat-message-left {
    margin-right: auto
}

.chat-message-right {
    flex-direction: row-reverse;
    margin-left: auto
}
.py-3 {
    padding-top: 1rem!important;
    padding-bottom: 1rem!important;
}
.px-4 {
    padding-right: 1.5rem!important;
    padding-left: 1.5rem!important;
}
.flex-grow-0 {
    flex-grow: 0!important;
}
.border-top {
    border-top: 1px solid #dee2e6!important;
}
</style>


<body id="page-top" class="bg-dark">

<?php include('nav.php');?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                      <!-- Page Heading -->
                      <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Archive Files</h1>
          
                    </div>

    
					<div class="card">
			<div class="row g-0">
				<div class="col-12 col-lg-5 col-xl-3 border-right">

					<div class="px-4 d-none d-md-block">
						<div class="d-flex align-items-center">
							<div class="flex-grow-1">
								<input type="text" class="form-control my-3" placeholder="Search...">
							</div>
						</div>
					</div>
  

                    
            <?php
                        include('../connect.php');
                       
                            $sqlget = "SELECT * FROM teachers";
                            $sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
                            while ($row = mysqli_fetch_assoc($sqldata)){
                         
   
                        ?>

					<a href="chat.php?id=<?php echo $row['id'];?>" class="list-group-item list-group-item-action border-0">
					
						<div class="d-flex align-items-start">
							<img src="../img/<?php echo $row['img'];?>" class="rounded-circle mr-1"  onerror="this.onerror=null;this.src='https://placeimg.com/200/300/animals';" alt="Vanessa Tucker" width="40" height="40">
							<div class="flex-grow-1 ml-3">
								<?php echo $row['fname']." ".$row['lname'];?>
								<div class="small"><span class="fas fa-circle chat-online"></span> Online</div>
							</div>
						</div>
					</a>

                    <?php }?>
					
				
				
				
				
					

					<hr class="d-block d-lg-none mt-1 mb-0">
				</div>
				<div class="col-12 col-lg-7 col-xl-9">
					<div class="py-2 px-4 border-bottom d-none d-lg-block">
						<div class="d-flex align-items-center py-1">
							<div class="position-relative">
								<img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
							</div>
							<div class="flex-grow-1 pl-3">
								<strong>                <?php 
        include("../connect.php");
         $id=$_GET['id'];

         $sqlget = "SELECT * FROM teachers where id =$id ";
         $sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
     
       while ($row = mysqli_fetch_assoc($sqldata)) {

		echo $row['fname']." ".$row['lname'];
	   }
		
		?>

	
		
		
		
		
		
		</strong>
								
							</div>
							<div>
								<button class="btn btn-primary btn-lg mr-1 px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone feather-lg"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg></button>
								<button class="btn btn-info btn-lg mr-1 px-3 d-none d-md-inline-block"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-video feather-lg"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg></button>
								<button class="btn btn-light border btn-lg px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal feather-lg"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg></button>
							</div>
						</div>
					</div>

					<div class="position-relative">
						<div class="chat-messages p-4">

                        <?php 
        include("../connect.php");
         $id=$_GET['id'];

         $sqlget = "SELECT * FROM teachers where id =$id ";
         $sqldata = mysqli_query($conn, $sqlget) or die('Error Displaying Data'. mysqli_connect_error());
     
       while ($row = mysqli_fetch_assoc($sqldata)) {
     

       $send=$_SESSION['logged_in'];
       $sqlget1 = "SELECT * FROM message";
       $sqldata1 = mysqli_query($conn, $sqlget1) or die('Error Displaying Data'. mysqli_connect_error());

       while ($row1 = mysqli_fetch_assoc($sqldata1)) {
        if ($row1['sender']==$_SESSION['logged_id'] &&  $row1['receiver']==$id){
          
       
       ?>

							<div class="chat-message-right pb-4">
								<div>
									<img src="../profile_pic/<?php echo $_SESSION['img'];?>" onerror="this.onerror=null;this.src='https://placeimg.com/200/300/animals';" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
									<div class="text-muted small text-nowrap mt-2">2:33 am</div>
								</div>
								<div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
									<div class="font-weight-bold mb-1">You</div>
									<?php echo $row1['message'];?>
								</div>
							</div>

                            <?php }

else if ($row1['sender']==$id &&  $row1['receiver']==$_SESSION['logged_id']){ ?>

							<div class="chat-message-left pb-4">
								<div>
									<img src="../img/<?php echo $row['img'];?>" onerror="this.onerror=null;this.src='https://placeimg.com/200/300/animals';" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
									<div class="text-muted small text-nowrap mt-2">2:34 am</div>
								</div>
								<div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
									<div class="font-weight-bold mb-1"><?php echo $row['fname']." ".$row['lname'];?></div>
									<?php echo $row1['message'];?>
								</div>
							</div>

							
							

                            <?php
}

        }
        }?>			



						</div>
					</div>

                    <form class="col-md-12" method="POST" action="sent.php?id=<?php echo $id;?>">

					<div class="flex-grow-0 py-3 px-4 border-top">
						<div class="input-group">
							<input type="text" name="msg" class="form-control" placeholder="Type your message">
							<button type="submit" name="send" class="btn btn-primary">Send</button>
						</div>
					</div>

    </form>

				</div>
			</div>
		</div>
	</div>
</main>


</div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>