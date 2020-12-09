<?php
session_start();
if(!isset($_SESSION['adminUsername']))
{
    header('Location:admin.php');
}
else
{
    header('Content-Type: text/html; charset=UTF-8');
    $db_username = 'root';
    $db_password = '';
    $db_name = 'khalil';
    $db_host = 'localhost';
  
    $db = mysqli_connect($db_host,$db_username,$db_password,$db_name) or die('Could not connect To database');
    $req = 'select * from events ';
    $exec = mysqli_query($db,$req);


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
  
  


      <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          chambre
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="view_ch_admin.php">view/delete</a>
          <a class="dropdown-item " href="add_ch.php">add</a>
      </li>

      

      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          events
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item active" href="view_ev_admin.php">view/delete</a>
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

<div class="container mt-5">
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">title</th>
      <th scope="col">description</th>
      <th scope="col">date event</th>
      <th scope="col">img</th>
      <th>delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
        while($ev = mysqli_fetch_array($exec))
        {
    ?>
    <tr>
            <th scope="row"><?= $ev['id_event']; ?></th>
            <td> <?= $ev['Title']; ?> </td>
            <td><?= $ev['description']; ?></td>
            <td><?= $ev['date_eve']; ?></td>
            <td> <img src="<?= $ev['img']; ?>" width="50px" height="40px" alt=""> </td>
            <td> <a href="includes/actionDeleteEvent.php?id=<?= $ev['id_event']; ?>" class="btn btn-outline-danger">delete</a> </td>
    </tr>

        <?php }  ?>
  </tbody>
</table>
</div>


</body>
</html>


















<?php

}
?>