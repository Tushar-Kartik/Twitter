 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Write Tweet</title>
    <link rel="stylesheet" href="tweet-writing-box.css">
 </head>
 <body>
    <div class="main">
        <!-- content to be replicated -->
        <div class="tweet-box">
            
                <div class="row image-title">
                    <!-- to show the user profile photo -->
                    <?php
                        include '../dbconn.php';
                        $userid=$_GET['userid'];
                        $query2="SELECT `profile_img` FROM `user_images` WHERE userid='$userid' ";
                        $result2=mysqli_query($conn,$query2);
                        if($result2){
                            $row=mysqli_fetch_assoc($result2);
                            echo "<img src='".$row['profile_img']."' alt='Profile Image' class='profile-image'> ";
                        }


                    ?>
                    
                    <h2 class="disp-name"><?php echo $_GET['name'];?></h2>
                </div>

                <form action="" method="POST">
                    <div class="row input-field">
                    
                        <input type="text" placeholder="What's in your mind?" name="tweet_text" class="mind-input">
                    </div>
                    <div class="row actions">
                        <!-- <button class="like-btn">Like</button>
                        <button class="comment-btn">Comment</button> -->
                        <button class="blu-btn">Post</button>
                    </div>
                </form>
        </div>
    </div>

 </body>
 </html>


 <!-- php to submit the tweet in tweets data base   -->
 <?php
    // Enable error reporting
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include '../dbconn.php';

    // Check if the userid is set in the URL
    if(isset($_GET['userid'])){
        $userid = mysqli_real_escape_string($conn, $_GET['userid']);
    } else {
        echo "No user ID set";
        exit(); // Exit if no user ID is set
    }

    // Check if tweet_text is set in the POST request
    if(isset($_POST['tweet_text'])){
        $tweet_text = mysqli_real_escape_string($conn, $_POST['tweet_text']);
    } else {
        // echo "No tweet text provided";
        exit(); // Exit if no tweet text is provided
    }

    // Update query
    $query = "INSERT INTO `tweets`(`userid`, `tweet_txt`, `tweet_like`, `tweet_cmt`) VALUES ('$userid','$tweet_text','','')";

    // Execute the query
    $result = mysqli_query($conn, $query);

    if($result){
        $name=$_GET['name'];
        echo "Tweet text added";
        header("Location: ../mainpage.php?userid=$userid&name=$name");
    } else {
        echo "Problem adding tweet text: " . mysqli_error($conn);
    }
?>
