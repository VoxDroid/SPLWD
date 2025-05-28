<?php
include('../connect.php');
include('../session.php');
$target_dir = "../img/";
$target_file = $target_dir . basename($_FILES["fileToUpload1"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload1"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists


// Check file size
if ($_FILES["fileToUpload1"]["size"] > 5000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    $id=$_SESSION['logged_id'];
    $img=htmlspecialchars( basename( $_FILES["fileToUpload1"]["name"]));
    $sql = "UPDATE `teachers` SET `img` = '".$img."' WHERE `teachers`.`id` = $id;";

if ($conn->query($sql) === TRUE) {
    if (move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload1"]["name"])). " has been uploaded.";
      

            header('location:profile.php?update_image=1');
       
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();

}
?>