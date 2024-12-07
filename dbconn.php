<?php 
    $servername="localhost";
    $username="root";
    $password="";
    $database="twitter";

    $conn=mysqli_connect($servername,$username,$password,$database);

    if($conn){
        // echo "connection successful";
    }
    else{
        echo "connection error" . mysqli_connect_error() ;
    }

?>