<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Profile Photo</title>
    <link rel="stylesheet" href="upload_dp.css">
</head>
<body>

    <div class="container">
        <div class="upload-container">
            <h2>Upload Profile Image</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="file" id="fileInput" name="uploadfile" accept="image/*">
                <label for="fileInput">Choose File</label>
                <img id="preview" src="#" alt="Image Preview" style="display: none;">
                <input type="submit" name="submit" value="Upload File" class="up-file-btn">
            </form>
        </div>
    </div>

    <?php
    // Enable error reporting
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include '../dbconn.php';

    // Check if the form is submitted
    if (isset($_POST['submit'])) {

        // Check if the userid is set in the URL
        if(isset($_GET['userid'])){
            $userid = mysqli_real_escape_string($conn, $_GET['userid']);
            echo "<h1>".$userid."</h1>";
        } else {
            echo "No user ID set";
            exit(); // Exit if no user ID is set
        }

        // Handle the file upload
        $filename = $_FILES['uploadfile']['name'];
        $tempname = $_FILES['uploadfile']['tmp_name'];
        $folder_dp = "../images/" . $filename;

        // Check if file was uploaded without errors
        if ($_FILES['uploadfile']['error'] == 0) {
            // Move the uploaded file to the target directory
            if (move_uploaded_file($tempname, $folder_dp)) {
                echo "Image has been uploaded to folder";

                // Insert the image details into the database
                $query = "UPDATE `user_images` SET `profile_img`='$folder_dp' WHERE userid='$userid'";
                $result = mysqli_query($conn, $query);

                $name=$_GET['name'];
                if($result){
                    echo "Image uploaded in DB";
                    header("Location: ../mainpage.php?userid=$userid&name=$name");
                    exit();
                } else {
                    echo "Problem uploading image in DB: " . mysqli_error($conn);
                }
            } else {
                echo "Failed to move uploaded file.";
            }
        } else {
            echo "Error uploading file: " . $_FILES['uploadfile']['error'];
        }
    }
    ?>

    <script>
        document.getElementById('fileInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('preview');
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>
