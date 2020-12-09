<?php
session_start();
if(!isset($_SESSION['adminUsername']))
{
    header('Location: admin.php');
}
else{
  header('Content-Type: text/html; charset=UTF-8');
  $db_username = 'root';
  $db_password = '';
  $db_name = 'khalil';
  $db_host = 'localhost';

  $db = mysqli_connect($db_host,$db_username,$db_password,$db_name) or die('Could not connect To database');
  $req = 'select r.id_reservation,u.id,c.id_ch,u.username, c.title,r.etat from reservations r join chambre c on r.id_ch=c.id_ch
  join users u on r.id_user = u.id  ';
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
    <li class="nav-item dropdown active ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          demandes
        </a>
        <div class="dropdown-menu " aria-labelledby="navbarDropdown">
          <a class="dropdown-item active" href="dashboard.php">reservation</a>
          <a class="dropdown-item" href="dem_participation.php">participation</a>
          <a class="dropdown-item" href="dem_reclamation.php">reclamation</a>
      </li>
  
  


      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          chambre
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="view_ch_admin.php">view/delete</a>
          <a class="dropdown-item" href="add_ch.php">add</a>
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
<!-- r.id_reservation,u.id,c.id_ch,u.username, c.title,r.etat  -->

<div class="container mt-5">
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">userId</th>
      <th scope="col">chambreId</th>
      <th scope="col">userName</th>
      <th scope="col">Title</th>
      <th>etat</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
        while($ch = mysqli_fetch_array($exec))
        {
    ?>
    <tr>
            <th scope="row"><?= $ch['id_reservation']; ?></th>
            <td> <?= $ch['id']; ?> </td>
            <td><?= $ch['id_ch']; ?></td>
            <td><?= $ch['username']; ?></td>
            <td><?= $ch['title']; ?></td>
            <td> 
              <?php 
                  if($ch['etat']==1)
                  {
              ?>
              <span class="badge badge-success">Accepted</span>
              <?php
                  }
               else 
               {
              ?>

                <a href="accept_reserv.php?id=<?=$ch['id_reservation']; ?>" class="btn btn-outline-success">Accept</a>
                <a href="refuse_reserv.php?id=<?=$ch['id_reservation']; ?>" class="btn btn-outline-danger">Refuse</a>

               <?php } ?>
            </td>

    </tr>

        <?php }  ?>
  </tbody>
</table>
</div>


</body>
</html>





























<?php } ?>