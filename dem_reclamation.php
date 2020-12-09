<?php
session_start();
if(!isset($_SESSION['adminUsername']))
{
    header('Location:admin.php');
}

if(isset($_POST['alerte']))
{
    $db_username = 'root';
    $db_password = '';
    $db_name = 'khalil';
    $db_host = 'localhost';
    $db = mysqli_connect($db_host,$db_username,$db_password,$db_name) or die('Could not connect To database');
    $id= $_POST['id'];
    $req = "delete from reclamation where id = '$id' " ;
    $res = mysqli_query($db,$req);     
}


$db_username = 'root';
$db_password = '';
$db_name = 'khalil';
$db_host = 'localhost';
$db = mysqli_connect($db_host,$db_username,$db_password,$db_name) or die('Could not connect To database');
$req = "select r.id,c.id_ch,c.title as chambreTitle,s.title as serviceTitle from  reclamation r join service s on s.id_service = r.id_service join chambre c on c.id_ch = r.id_ch";
$res = mysqli_query($db,$req);
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
          <a class="dropdown-item " href="dashboard.php">reservation</a>
          <a class="dropdown-item" href="dem_participation.php">participation</a>
          <a class="dropdown-item active" href="dem_reclamation.php">reclamation</a>
      </li>
  
  


      <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          chambre
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="view_ch_admin.php">view/delete</a>
          <a class="dropdown-item " href="add_ch.php">add</a>
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


<div class="container mt-5">

<?php while($rec = mysqli_fetch_array($res))
{
?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong> <?=$rec['chambreTitle']; ?> (<?=$rec['id_ch']; ?>) !</strong> <?=$rec['serviceTitle'];  ?>

  <form action="dem_reclamation.php" method="post">
  <input type="text" name="id" value="<?=$rec['id']; ?>" hidden>
  <button type="submit" class="close" name="alerte" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </form>
</div>

<?php } ?>

</div>


</body>
</html>