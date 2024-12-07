<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Side Nav with Form</title>
    <link rel="stylesheet" href="sidenav.css">
</head>
<body>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <form method="POST">
            <label for="name">Update Name:</label>
            <input type="text" id="name" name="name"><br><br>
            <label for="password">Update Password:</label>
            <input type="password" id="password" name="password"><br><br>
            <input type="submit" value="Update Profile">
        </form>
    </div>
    <button class="edit" onclick="openNav()">Edit profile</button>

    <script src='side-nav-script.js'></script>

    <!-- script to update users database  -->
    <?php
        include 'dbconn.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userid = $_GET['userid'];

            $new_user_name = mysqli_real_escape_string($conn, $_POST['name']);
            $new_password = mysqli_real_escape_string($conn, $_POST['password']);

            $new_hashed_password =password_hash($new_password,PASSWORD_DEFAULT);

            $query = "UPDATE `users` SET `username`='$new_user_name', `password`='$new_hashed_password' WHERE `userid`='$userid'";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "Updated name and password";

                // when we update user name in users tabel
                //  we also have to update it in tweets table
                // as well as in user_images table


                // update in user_images table
                $query_update_userimages="UPDATE `user_images` SET `username`='$new_user_name' WHERE userid='$userid'";
                $result2=mysqli_query($conn,$query_update_userimages);
                if($result2){
                    echo "Changes made in user_images table";
                }else{
                    echo "error making changes in user_images table";
                }

                //update in tweets table
                $query_update_tweets = "UPDATE `tweets` SET `username`='$new_user_name' WHERE `userid`='$userid'";
                $result3=mysqli_query($conn,$query_update_tweets);
                if($result3){
                    echo "Changes made in tweets table";
                }else{
                    echo "error making changes in tweets table";
                }


                header('location:mainpage.php?name='.$new_user_name.'&userid='.$userid.'');
            } else {
                echo "Something went wrong with updating username and password";
            }
        }
    ?>
</body>
</html>
