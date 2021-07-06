<?php

    // Script to connect to the database

    $servername="localhost";
    $username="root";
    $password="";
    $database="iforum";

    $conn=mysqli_connect($servername,$username,$password,$database);

    if(!$conn){
        echo "Could not connect to the db";
        exit();

    }else{

        //echo "connection done";

    }

?>