<?php
session_start();

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="/forum">Smart Agro</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/forum">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Top Categories
        </a>
        <ul class="dropdown-menu">

          <li><a class="dropdown-item" href="">Soil temperature</a></li>
          <li><a class="dropdown-item" href="#">Humidity</a></li>
          <li><a class="dropdown-item" href="#">Nutritions</a></li>
          <li><hr class="dropdown-divider"></li>
          
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="contact.php" >Contact</a>
      </li>
    </ul>
    <div class="mx-2">';

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] ==true){
     echo' <form class="d-flex" role="search">
    
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
        <p class="text-light my-0 mx-2">Welcome '. $_SESSION['useremail']. ' </p>
        <a href="partials/_logout.php" class="btn btn-success">Logout</a>
      </form>';
    }else{

    

        echo '<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>
    </div>
    <form class="d-flex" role="search">
    
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
        
      </form>';

    }
      
echo' </div>
</div>
</nav>';

include 'partials/_loginModal.php';
include 'partials/_signupModal.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success! </strong> You can now login
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>