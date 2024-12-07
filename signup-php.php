<?php
include 'dbconn.php';

if (isset($_POST['cacc'])) {
    $username = $_POST['user_name'];
    $useremail = $_POST['user_email'];
    $userpassword = $_POST['user_password'];

    $timestamp = time();

    // Check if the username contains '@'
    if (strpos($useremail, '@') !== false) {
        // Split the username at '@' and take the first part
        $username_parts = explode('@', $useremail);
        $username = $username_parts[0];
    }

    if ($username) {
        $user_id = $username . $timestamp;
    } else {
        $user_id = $useremail . $timestamp;
    }

    echo "Created user ID is: " . $user_id . "<br>";
    echo "Username is: " . $username . "<br>";
    echo "User email is: " . $useremail . "<br>";
    echo "User password is: " . $userpassword . "<br>";


    $hashed_password=password_hash($userpassword,PASSWORD_DEFAULT);

    //enter data in users table
    $query="INSERT INTO `users` (`userid`,`username`, `password`, `date`) VALUES ('$user_id','$username', '$hashed_password', DATE_FORMAT(CURDATE(), '%d %M %Y'))";
    $result=mysqli_query($conn,$query);
    if($result){
        echo "submitted";
        header("Location: mainpage.php?name=" . urlencode($username)."&userid=" . urlencode($user_id));
    }
    else{
        echo "someproblem" . mysqli_connect_error($conn);
    }

    //enter userid in tweets table
    $query2="INSERT INTO `tweets`(`userid`, `username`, `tweet_txt`, `tweet_like`, `tweet_cmt`) VALUES ('$user_id','$username','NULL','NULL','NULL')";
    $result2=mysqli_query($conn,$query2);
    if($result2){
        echo "user successfully added in tweets database";
    }else{
        echo "problem adding user to tweets db";
    }

    //setting default dp of the user when signup
    $query3="INSERT INTO `user_images`(`userid`, `username`,`profile_img`, `banner_img`) VALUES ('$user_id','$username','../images/default_dp.jpeg','../images/default_banner.png')";
    $result3=mysqli_query($conn,$query3);
    if($result3){
        echo "user default dp has been set ";
    }else{
        echo "problem setting user default dp has been set";
    }







}





?>
