<?php

$showerror="false";
    if($_SERVER['REQUEST_METHOD']=="POST"){

        include 'dbconnect.php';
       // echo $_SERVER['REQUEST_METHOD'];
        $user_email = $_POST['signupEmail'];
        $pass = $_POST['signupPassword'];
        $cpass = $_POST['signupcPassword'];

        //echo $user_email;
        //echo $pass;
        // echo $cpass;
        //check whether this email already exists

        $existsql="select * from `users` where user_email='$user_email'";

        $result = mysqli_query($conn,$existsql);
        
        $numrows=mysqli_num_rows($result);

        if($numrows>0){

            $showerror="Email already in use";

            echo $showerror;

        }else{


            if($pass==$cpass){
                
                $hash = password_hash($pass, PASSWORD_DEFAULT);
              
                $sql="INSERT INTO `users` (`user_email`, `user_password`) VALUES ('$user_email', '$pass');";
                
                $result1 = mysqli_query($conn, $sql);
               
                
                if($result1){

                    $showAlert=true;

                    header("location:/forum/index.php?signupsuccess=true");
                    exit();

                }else{

                    $showerror="Query didnt run";
                    
                    
                }

            }else{

                $showerror="passwords do not match";
                

            }


        }
        header("location:/forum/index.php?signupsuccess=false&error=$showerror");

    }

?>