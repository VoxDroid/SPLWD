<?php
include('../connect.php');
        if (isset($_POST['signup'])) {
            $email = $_POST['email'];

            $sql = "SELECT * FROM teachers WHERE email = '$email'";

            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
           
            if ($row) {

                header('Location:signup.php?fname='.$_POST['fname'].'&lname='.$_POST['lname'].'&mname='.$_POST['mname'].'&address='.$_POST['address'].'&teacher_id='.$_POST['teacher_id'].'&contact_no='.$_POST['contact_no'].'&bdate='.$_POST['bdate'].'&error=1');
				?>
				
			<?php
			if($result){
               
		
			}
              
            } 
            
            else {

                $pass=$_POST['password'];
	            $hashed_pass=password_hash($pass,PASSWORD_DEFAULT);

                $date = date('Y-m-d');
	
		
                $sql="INSERT INTO `teachers` (`id`, `teacher_id`, `fname`, `lname`, `mname`, `birth_date`, `address`, `gender`, `contact_no`, `email`, `password`, `img`, `status`, `category`, `school`, `date`) VALUES (NULL, '".$_POST['teacher_id']."', '".$_POST['fname']."', '".$_POST['lname']."', '".$_POST['mname']."', '".$_POST['bdate']."', '".$_POST['address']."', '".$_POST['gender']."', '".$_POST['contact_no']."', '".$_POST['email']."', '".$hashed_pass."', '', 'approved', '".$_POST['category']."', '".$_POST['school']."','".$date."');";
                if ($conn->query($sql) === TRUE) 
                {
    
                    header('Location:add_user.php?approve=1');
                
                
            } 
				?>
			
			<?php
            }
        }
        ?>