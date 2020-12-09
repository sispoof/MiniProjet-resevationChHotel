<?php
session_start();
if(!isset($_SESSION['adminUsername']))
{
    header('Location:admin.php');
}
else
{
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminPanel</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/all.min.js"></script>
    <script src="js/util.js"></script>
  
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">
  <a class="navbar-brand" href="dashboard.php">CPanel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown  ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          demandes
        </a>
        <div class="dropdown-menu " aria-labelledby="navbarDropdown">
          <a class="dropdown-item " href="dashboard.php">reservation</a>
          <a class="dropdown-item" href="dem_participation.php">participation</a>
          <a class="dropdown-item" href="dem_reclamation.php">reclamation</a>
      </li>
  
  


      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          chambre
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="view_ch_admin.php">view/delete</a>
          <a class="dropdown-item active" href="add_ch.php">add</a>
      </li>

      

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          events
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="view_ev_admin.php">view/delete</a>
          <a class="dropdown-item" href="add_ev.php">add</a>
      </li>
        <li class="nav-item">
            <a href="roomscode.php" class="nav-link">RoomsCode</a>
          </li>

          <li class="nav-item ">
            <a href="services.php" class="nav-link">services</a>
          </li>

      <li class="nav-item dropdown dropdown">
        <a class="nav-link dropdown-toggle ml-5 dropdown-toggle dropdown-toggle-split" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="far fa-user-circle fa-lg"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="navdrop dropdown-item">Welcome <?=$_SESSION['adminUsername'];?></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-center" href="includes/deconnectAdmin.php">logout</a>
        </div>
      </li>

  
   
    </ul>
   
  </div>
  </div>
</nav>


<div class="container mt-5 card p-4 shadow mb-5">
    <h5 class="card-title text-center text-primary">ADD CHAMBRE</h5>
    <hr>
    <form enctype="multipart/form-data" action="includes/actionAddCh.php" method="POST">

    <div class="form-group">
        <label for="title">title</label>
        <input type="text" name="title" class="form-control">
    </div>

    <div class="form-group">
        <label for="description">description</label>
        <textarea name="description" id="" cols="30" rows="15" class="form-control"></textarea>
    </div>

    
    <div class="form-group">
        <label for="prix">prix</label>
        <input type="number" name="prix" class="form-control">
    </div>

    <div class="form-group">
        <label for="exampleFormControlFile1">Image</label>
        <input type="file" name="userfile" class="form-control-file" id="exampleFormControlFile1">
    </div>
    <div class="form-group">
        <button class="btn btn-primary" name="submit">Submit</button>
    </div>
    
    </form>
</div>


</body>
</html>


















<?php

}
?>