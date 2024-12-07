<?php

include 'dbconn.php';

// to get the user id
if(isset($_GET['userid'])){
    $get_userid=$_GET['userid'];
}
$filename= $_FILES["uploadfile"]["name"];
// echo "<img src='$folder_dp' height=100px width=100px />" ;
echo $filename;
               
// upload file only when submit is clicked
if(isset($_POST['submit'])){

    $filename= $_FILES["uploadfile"]["name"];
    $tempname=$_FILES["uploadfile"]["tmp_name"];
    $folder_dp="images/".$filename;

    move_uploaded_file($tempname,$folder_dp);

    echo "<img src='$folder_dp' height=100px width=100px />" ;


        $query="INSERT INTO `user_images`(`userid`, `profile_img`, `banner_img`) VALUES ('$get_userid','$folder_dp','')";
        $result=mysqli_query($conn,$query);
        if($result){
            echo "image has been uploaded";
            // header("Location:mainpage.php");
            
        }else{
            echo "problem uploading image";
        }
    
}
?>