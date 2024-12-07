<?php 
include 'dbconn.php';

if(isset($_POST['login'])){

        $username=$_POST['username'];
        $user_password=$_POST['user_password'];

        $query="SELECT  `userid`,`username`,`password` FROM `users` WHERE `username`='$username';";
        $result=mysqli_query($conn,$query);
        if($result){
            print_r($result);
            $row=mysqli_fetch_assoc($result);
            $hashed_password=$row['password'];
            $userid=$row['userid'];
            $username=$row['username'];

            if(password_verify($user_password,$hashed_password)){
                echo "password verified";
                header("Location: mainpage.php?name=" . urlencode($username)."&userid=" . urlencode($userid));
            
                // header("Location: test.php?name=" . urlencode($userid)."&userid=" . urlencode($userid));
            }else{
                echo "password not verify";
            }

        }
        else{
            echo "some error";

        }


}
else{
    echo "not loggedin" ;
}
?>