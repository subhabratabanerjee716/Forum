<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        #ques{
            min-height: 833px;
        }
       
    </style>
    <title>iForum-Coding Forums</title>
  </head>
  <body>
    <?php include 'partials/dbconnect.php';?>
    <?php include 'partials/header.php';?>
  
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <!-- Sliders -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/forum.jpg" class="d-block w-100" alt="Gonna add image later">
    </div>
    <div class="carousel-item">
      <img src="img/forum.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/forum.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    <div class="container my-3" id="ques">
    
    <h3 class="text-center">iForum- Browse Categories</h3>
    <div class="row">
    <!--Fetch all the categories -->

    <?php 
    
    
        $sql = "SELECT * FROM `categories`";
        $result=mysqli_query($conn,$sql);
        if($result){

            while($row=mysqli_fetch_assoc($result)){

               // <!--use a for loop to iterate through Categories -->
                // echo $row['category_id']."<br>";
                // echo $row['category_name'];
                $id=$row['category_id'];    
                $cat=$row['category_name'];
                $desc=$row['category_description'];
             echo '<div class="col-md my-3">
                    <div class="card" style="width: 18rem;">
                    <img src="img/forum.jpg" class="card-img-top" alt="...">
                            <div class="card-body ">
                                <h5 class="card-title"><a href="threads.php?catid='.$id.'">'.$cat.'</a></h5>
                                <p class="card-text">'.substr($desc,0,20).'</p>
                                <a href="threads.php?catid='.$id.'" class="btn btn-primary">View Threads</a>
                            </div>
                    </div>
                  </div>';
    
            }

        }else{

            echo "sql error";

        }
        

    
    ?>
   
    </div>
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