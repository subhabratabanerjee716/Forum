<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        .container{
            min-height: 100vh;
        }
       
    </style>
    <title>iForum-Coding Forums</title>
  </head>
  <body>
    <?php include 'partials/dbconnect.php';?>
    <?php include 'partials/header.php';?>
    
    <!--Search Results -->

          <div class="container my-3 mx-190">
          
          <h1 class="py-3">Search results for "<?php echo $_GET["search"] ?>" :-</h1>

         
            <?php
                    $query =$_GET["search"];
                    $sql = " SELECT * FROM `threads` WHERE match (thread_title,thread_desc) against ('$query'); ";
                    $result=mysqli_query($conn,$sql);
                    $noresults=true;
                    
                      
                        while($row=mysqli_fetch_assoc($result)){
                            $noresults=false;
                            $title=$row['thread_title'];
                            $desc=$row['thread_desc'];
                            $thread_id=$row['thread_id'];
                            $url="thread.php?threadid=".$thread_id;
                        echo '<div class="result">
            
                        <h3> <a href="'.$url.'" class="text-dark"> '.$title.'</a> </h3>            
                        <p>'.$desc.'</p>
                        </div>'     ;
                        }
                   
                    
                    if($noresults){


                        echo '<div class="jumbotron jumbotron-fluid">
                                <div class="container">
                                <p class="display-4">No Results Found </p>
                                <p class="lead">Suggestions:<ul>
                                    <li>Make sure the words are spelled properly.</li>
                                    <li>Try different keywords.</li>
                                    <li>Try to make other search</li>
                                    </ul>
                                </p>
                                </div>
                                </div>';


                    }

                    


        ?>

     </div>   
  
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
    <?php include 'partials/footer.php';?>
  </body>
</html>