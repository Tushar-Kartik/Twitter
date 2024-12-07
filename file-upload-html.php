<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="file-upload-html-css.css">
</head>
<body>
    
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="file" class="chosefile"  name="uploadfile" ><br><br>

            <!-- <label style="width: 100%; height: 100%; background-color: white; border: 2px solid #39a5e3; padding: 10px; cursor: pointer; display: inline-block; position: relative; overflow: hidden;">
                Choose File
                <input type="file" name="uploadfile" style="position: absolute; top: 0; right: 0; margin: 0; padding: 0; font-size: 20px; cursor: pointer; opacity: 0; filter: alpha(opacity=0);">
            </label> -->

            <button type="submit" class="upload-file-button" 
            style="width:100px; height:50px; background-color:#39a5e3;; color:white; font-family:Arial, Helvetica,sans-serif; border:none;"
            name="submit" value="Upload File">
            Upload file
            </button>
        </form>
    </div>



</body>
</html>





