<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include './dbconn.php';

if (isset($_GET['userid'])) {
    $userid = mysqli_real_escape_string($conn, $_GET['userid']);

    // Update the tweet_like count
    $query = "UPDATE `tweets` SET `tweet_like` = `tweet_like` + 1 WHERE `userid` = '$userid'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redirect back to the previous page or a confirmation page
        header('Location: previous_page.php'); // Replace 'previous_page.php' with the actual page you want to redirect to
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }
} else {
    echo 'No user ID provided';
}
?>
