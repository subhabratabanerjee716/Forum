<?php

 session_start();
 
    

    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/FORUM">iForum</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/FORUM">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categories
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="http://localhost/FORUM/threads.php?catid=1">Java</a></li>
              <li><a class="dropdown-item" href="http://localhost/FORUM/threads.php?catid=2">C++</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="side" class="nav-item">
            <a class="nav-link" href="contacts.php">Contacts</a>
          </li>
          
        </ul>';
        if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){

         echo' <form  class="d-flex" action="search.php" method="GET">

          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit" name="search">Search</button>
         <P class="text-light my-0 mx-2"> Welcome <br> '.$_SESSION['useremail'].'</p>
         <a href="partials/_logout.php" class="btn btn-outline-success ml-2">Logout</a>
        </form>
        
        
        </div>
        </div>
      </nav>';
          //.$SESSION['useremail'].

        }else{

          echo'
          <form  class="d-flex" action="search.php" method="GET">
          <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success"   type="submit">Search</button>
          
          </form>;
          <div  class="mx-2">
          <button class="btn btn-success mx-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
          <button class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#signupModal">signup</button>;
 
       </div>
     </div>
   </nav>';


        }
        
      
  include 'partials/loginmodal.php';
  include 'partials/signupmodal.php';


  if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){

    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Success!</strong> You can now login
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>';

  }

?>