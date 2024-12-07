<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hello</title>
    <link rel="stylesheet" href="mainpage.css">
   

</head>
<body>

    <div class="navbar">
        <div class="navbar-left">
            <ul>
                <li>
                    <img src="assets/home.png" alt="">
                    Home
                </li>
                <li>
                    <img src="assets/flash.png" alt="">
                    Moments
                </li>
                <li>
                    <img src="assets/bell.png" alt="">
                    Notification
                </li>
                <li>
                    <img src="assets/email.png" alt="">
                    Messages
                </li>
            </ul>
        </div>

        <div class="navbar-center">
            <img class="logo" src="assets/logo.png" alt="bird">
        </div>

        <div class="navbar-right">

            <div class="navbar-right-container">
                <input type="text" placeholder="Search..." class="">
                

                <!-- place the image here -->
                <?php
                include 'dbconn.php';
                if(isset($_GET['userid'])){
                    $get_userid=$_GET['userid'];
                }
                $query="SELECT profile_img
                        FROM user_images
                        WHERE userid = '$get_userid';";

                $result=mysqli_query($conn,$query);
                if($result){
                    $row=mysqli_fetch_assoc($result);
                    $got_dp_name=$row['profile_img'];
                    $useable_dp_img = basename(dirname($got_dp_name)) . '/' . basename($got_dp_name);
                    

                    echo "<img src='".$useable_dp_img."'>";
                    // echo "<img  class='dp-img' src=".$row['profile_img']." alt='profile image' style=border-radius: 50px;>";
                }
             ?>
                 

                <!-- <img src="assets/profile.png" alt=""> -->

              
                <a href="pages/tweet-writing-box.php?userid=<?php echo $_GET['userid']; ?>&name=<?php echo $_GET['name']; ?>">
                <button class="tweet">Tweet</button>
                </a>
            </div>
        </div>
    </div>


    <a href="pages/upload.php?userid=<?php echo $_GET['userid']; ?>&name=<?php echo $_GET['name']; ?>">
    <div class="banner-container">

         <?php 
            include 'dbconn.php';

            $get_userid= $_GET['userid'];

            try {
                // code to get the image from database 
                if(isset($_GET['userid'])){
                    $query="SELECT `banner_img` FROM `user_images` WHERE userid='$get_userid'";
                    $result=mysqli_query($conn,$query);
                    if($result){
                        $row=mysqli_fetch_assoc($result);
                        try{
                        $banner_img_name=$row['banner_img'];
                        }catch( Exception $e){

                        }
                        
                        $useable_banner_img = basename(dirname($banner_img_name)) . '/' . basename($banner_img_name);
                        // echo $useable_banner_img; // Outputs: images/kiet.png

                        echo "<img src='".$useable_banner_img."' class='banner-img'  alt='banner image is hre'>";
                    }else{

                    }
                }else{

                }
            // __________________________________
                
            } catch (Exception $e) {
                
            }
            
         ?>

         

            <div class="banner-container-over">
                <h2 class="banner-container-over-text">UPLOAD BANNER IMAGE</h2>
            </div>
        
     </div>
     </a>



    <div class="menu">
        <div class="menu-items-cont">
            <ul class="menu-ul">

                <li>
                    Tweets
                        <?php
               
                        // include 'dbconn.php';
        
                        // if (mysqli_connect_errno()) {
                        //     echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        //     exit();
                        // }

                        // $sql = "SELECT * FROM tweets";
                        // $result = mysqli_query($conn, $sql);
                        // $rowcount = mysqli_num_rows($result);
                        // // echo "Total rows in this table: " . $rowcount;
                        
                        // echo "<h3>".$rowcount."</h3>";
                    
                        // mysqli_free_result($result);

                        // mysqli_close($conn);
                        // 
                        ?>

                        <!-- experiment to show correct no of tweets -->
                         <?php
                            include 'dbconn.php';
                            if (mysqli_connect_errno()) {
                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                exit();
                            }
                            $sql="SELECT `tweet_txt` from tweets";
                            $result=mysqli_query($conn,$sql);
                            $no_of_tweets=0;
                            if($result){
                                
                                $row_count=mysqli_num_rows($result);
                                // echo "row count is : ".$row_count;

                                
                                while ($row = mysqli_fetch_assoc($result)) {
                                    
                                    if($row['tweet_txt']!="NULL"){
                                            $no_of_tweets=$no_of_tweets+1;
                                            // echo "number of tweets:".$no_of_tweets;
                                            
                                        }
                                }
                                echo "<h3>".$no_of_tweets."</h3>";

                               
                            }


                         ?>

                    
                </li>
                <li>
                    Lists
                    <h3>0</h3>
                </li>
                <li>
                    Moments
                    <h3>0</h3>
                </li>
            </ul>
        </div>
        <div class="menu-button">
            <a href="index.php">
            <button class="edit">Log Out</button>
            </a>
            
            <?php include 'side-nav.php';?>
        </div>
        <div class="dp">
            <h6 class="dp-text">none</h6>
            <!-- img with width 100% height 100% of the parent -->

            <!-- to show dp of the current user -->
             <?php
                include 'dbconn.php';
                if(isset($_GET['userid'])){
                    $get_userid=$_GET['userid'];
                }
                $query="SELECT profile_img
                        FROM user_images
                        WHERE userid = '$get_userid';";

                $result=mysqli_query($conn,$query);
                if($result){
                    $row=mysqli_fetch_assoc($result);
                    $got_dp_name=$row['profile_img'];
                    $useable_dp_img = basename(dirname($got_dp_name)) . '/' . basename($got_dp_name);
                    
                    // echo "<img  class='dp-img' src=".$row['profile_img']." alt='profile image' style=border-radius: 50px;>";
                }
             ?>
             <!--  -->

            <img  class="dp-img" src="<?php echo $useable_dp_img ?>"  style="border-radius:100px" alt="">


            <a href="pages/upload_dp.php?userid=<?php echo $_GET['userid']; ?>&name=<?php echo $_GET['name']; ?>">
                <div class="dpover">Upload Profile photo</div>
            </a>
            
            
            
        </div>
    </div>
    
    <div class="bottom">
        <div class="bottom-left box">
            <div class="bottom-left-info box">
                <!-- it will display name and date joined -->
                <?php
                if(isset($_GET['userid'])){
                    $got_user_id=$_GET['userid'];
                    // $display_name=strtoupper($get_name);
                    // echo "<h3>".$display_name ."</h3><br>" ;

                    include 'dbconn.php';
                    $query = "SELECT `username`,`date` FROM `users` where userid='$got_user_id'";
                    $result=mysqli_query($conn,$query);
                    if($result){
                        $row=mysqli_fetch_array($result);
                        $date_joinded=$row['date'];
                        $name_to_display=$row['username'];
                        echo "<h3>".$name_to_display ."</h3><br>";
                        echo "<h4 style='color:#7f7f7f;'>Date Joined: ".$date_joinded."</h4>";
                        
                    }

                }
                ?>
                <!--  -->
         
            </div>
            
        </div>
        <div class="bottom-center box">
            
            

            <!-- this is my content box , the tweeted data will appear here  -->
            <?php
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);

                include './dbconn.php';

                // Query to select all rows from the table
                $query = "SELECT * FROM `tweets` ORDER BY id  DESC";
                $result = mysqli_query($conn, $query);

                // Check if the query was successful
                if ($result) {
                    // Fetch rows one by one
                    while ($row = mysqli_fetch_assoc($result)) 
                    {
                        // getting tweet text from =>tweets table
                        $tweet_txt=$row['tweet_txt'];

                        if($tweet_txt!="NULL"){
                            

                            // if tweet text is not null then i want to fetch imagge from the user_images table
                            $userid=$_GET['userid'];
                            $fetch_img_of=$row['userid'];

                            $query_fetch_img="SELECT `profile_img` FROM `user_images` WHERE userid='$fetch_img_of' ";
                            $result_img=mysqli_query($conn,$query_fetch_img);
                            if($result){
                                    $row_img=mysqli_fetch_assoc($result_img);
                                    
                                    $tweet_image=$row_img['profile_img'];
                                    $useable_tweet_image=basename(dirname($tweet_image)) . '/' . basename($tweet_image);
                                    
                            }else{
                                echo "error fetching image for tweet dp";
                            }
                            // _________________________________________________the above code got the user profile image by using userid from row[...fetch assoc]




                            // using $row[userid] to get the name od the user from users database
                            $find_name_of = $row['userid'];
                            $query_findingname = "SELECT `username` FROM `users` WHERE `userid` = '$find_name_of'";
                            $result_of_finding_name = mysqli_query($conn, $query_findingname);
                            
                            if ($result_of_finding_name) {
                                if (mysqli_num_rows($result_of_finding_name) > 0) {
                                    $row_name = mysqli_fetch_assoc($result_of_finding_name);
                                    $name_of_user = $row_name['username'];
                                } else {
                                    echo "No user found with the given userid.".$find_name_of ;
                                }
                            } else {
                                echo "Problem in finding name: " . mysqli_error($conn);
                            }

                            // ____________________________________________________
                                
                            echo "
                            <div class='content-box'>
                                <div class='content-box-upper'>
                                    <img src='".$useable_tweet_image."' class='content-box-dp' alt=''>
                                    <h5>" .$name_of_user. "</h5>
                                </div>
                                <div class='tweet_text_display_box'>
                                    <p>". $row['tweet_txt'] ."</p>
                                </div>
                                <div class='like_cmt_area'>
                            
                                    <button class='forlike'>
                                        <h4></h4>
                                        <img src='assets/heart.png' alt=''>
                                    </button>
                                    <button class='forcmt'>
                                        <h4></h4>
                                        <img src='assets/chat.png' alt=''>
                                    </button>
                                    <img src='assets/retweet.png' alt=''>
                                </div>
                                
                                <div class='black-bird'>
                                    <img src='assets/black-bird.png' alt='black-bird'>
                                </div>

                            </div>

                        ";
                        }

                        
                    }
                } else {
                    echo "Error: " . mysqli_error($conn);
                }

    
                mysqli_close($conn);
            ?>

            
             
        </div>
        <div class="bottom-right box">
            <div class="comunity-box">
                <h3>Who to Follow</h3>
               
                <!-- to get user image and user name   -->
                <?php
                   
                    ini_set('display_errors', 1);
                    ini_set('display_startup_errors', 1);
                    error_reporting(E_ALL);

                    include './dbconn.php';

                    // on basis of user id fetch profile image from user images

                    $query = "SELECT username, profile_img FROM user_images";
                    $result = mysqli_query($conn, $query);

                    // Check if the query was successful
                    if ($result) {
                        // Loop through each row in the result set
                        while ($row = mysqli_fetch_assoc($result)) {

                            $comunity_image=$row['profile_img'];
                            $useable_community_image=basename(dirname($comunity_image)) . '/' . basename($comunity_image);
                            $display_user_name=$row['username'];
                            echo "
                            <div class='comunity-box-row'>
                                <img src='" . $useable_community_image . "' class='comunity-box-row-img' alt='Profile Image'>
                                <h4>" .$display_user_name. "</h4>
                                <button class='follow'>Follow</button>
                            </div>
                            ";
                            echo "<hr>";
                        }
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }

                    // Close the database connection
                    mysqli_close($conn);
                ?>
                

                <br>
                
            </div>
            
        </div>
    </div>



    <!-- <script src="side-nav-script.js"></script> -->


</body>
</html>