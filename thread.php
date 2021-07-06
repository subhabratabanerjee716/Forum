<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <style>
        #ques{
            min-height: 653px;
        }
        .side{

            padding-right=200px;
            margin-right=200px
        }
    </style>
    <title>Welcome to iDiscuss - Coding Forums</title>
</head>

<body>
<?php include 'partials/header.php';?>
<?php include 'partials/dbconnect.php';?>

        <?php
        $id=$_GET['thread_id'];
        $sql = "SELECT * FROM `threads` WHERE thread_id=$id";
        $result=mysqli_query($conn,$sql);
        
        if($result){

            while($row=mysqli_fetch_assoc($result)){
                
                $title=$row['thread_title'];
                $desc=$row['thread_desc'];
            
            }
        }
                
        ?>

        <?php
            $showAlert=false;
            $method=$_SERVER['REQUEST_METHOD'];

            if($method=='POST'){

                //Insert into comments db

                $comment=$_POST['comment'];
               

                $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_time`) VALUES ('$comment', '$id', current_timestamp());";
                $result=mysqli_query($conn,$sql);
                if($result){

                    $showAlert=true;

                }else{

                        echo "Error in sequal";

                }

                if($showAlert){

                    echo '<div class="alert alert-success" role="alert">
                    Your Comment has been  added .
                  </div>';
                
                }
                
            }


        ?>

    <!-- Category container starts here -->
    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4"><?php echo $title;?></h1>
            <p class="lead">  <?php echo $desc;?></p>
            <hr class="my-2">
            <p>This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do not post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post questions. Remain respectful of other members at all times.</p>
            <p class="my-0">Posted by: <em><?php //echo $posted_by; ?></em></p>
        </div>
    </div>


        <div class="container">
            <h4>Comments:-</h5>
        <?php

            $id=$_GET['thread_id'];

            $sql="SELECT * FROM `comments` WHERE thread_id=$id";
            $result=mysqli_query($conn,$sql);
            $noresult=true;
            $commentset=true;
            while($row=mysqli_fetch_assoc($result)){
                $noresult=false;
                 
                 $content=$row['comment_content'];
                 $comment_time=$row['comment_time'];
                 $id=$row['comment_id'];
                 echo   '<div class="d-flex my-4 mx-2">
                 <div class="flex-shrink-0 ">
                     <img src="img/user.jpg" width="45px"  alt="...">
                 </div>
                 <div class="flex-grow-1 ms-3 mx-3">
                 <p class="font-weight-bold my-0">Aninymous User at '.$comment_time.'</p>
                     '.$content.'
                 </div>
                 </div>';

             }


        ?>
            
            <form action="<?php echo $_SERVER['REQUEST_URI']?>" method="post">
           
            <div class="form-group">
                <label for="exampleInputEmail1">Type your comment:-</label>
                <textarea type="text" class="form-control" class="form-text text-muted" id="comment" name="comment" aria-describedby="emailHelp" placeholder="Text"></textarea>
                <small id="emailHelp" class="form-text text-muted">Keep it as short as possible.</small>
            </div>
            
        
            <button type="submit" class="btn btn-success">PostComment</button>
            </form>
                        

        </div>

        <div class="container" id="ques">
        
            <h1>Discussions:-</h1>

            <?php
            $id=$_GET['thread_id'];
            $sql = "SELECT * FROM `threads` WHERE thread_id=$id";
            $result=mysqli_query($conn,$sql);
            $noresult=true;
             if($result){

                while($row=mysqli_fetch_assoc($result)){
                    $noresult=false;
                     $title=$row['thread_title'];
                     $desc=$row['thread_desc'];
                     $id=$row['thread_id'];
                     echo   '<div class="d-flex my-4 mx-2">
                     <div class="flex-shrink-0 ">
                         <img src="img/user.jpg" width="45px"  alt="...">
                     </div>
                     <div class="flex-grow-1 ms-3 mx-3">
                         <h5><a class="text-dark"href="thread.php">'.$title.'</a></h5>
                         '.$desc.'
                     </div>
                     </div>';

                 }

                 if($noresult){


                        
                    echo '<br><h1>Browse Questions :-</h1><br><div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h4 class="display-4">No Threads Found</h4>
                        <p class="lead">Be the first person to ask the question.</p>
                    </div>
                    </div>';


                 }

              }

                
        ?>


        </div>
        
    <?php include 'partials/footer.php';?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>