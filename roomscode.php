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
  $req = 'select id_ch,title,code_chambre from chambre   ';
  $exec = mysqli_query($db,$req);
    $exec2 = mysqli_query($db,$req);
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

      

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          events
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="view_ev_admin.php">view/delete</a>
          <a class="dropdown-item" href="add_ev.php">add</a>
      </li>
        <li class="nav-item active">
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
<h3 class="text-center font-weight-bolder text-primary" style="font-family:monospace;font-size:27px">Modifier code</h3>
<br>
<form action="actionChangeCode.php" method="post">
<div class="row">
<div class="col">
    <div class="form-group">
        <label for="chambreList">chambre</label>

  
        <select class="form-control" id="exampleFormControlSelect1" name="chambre">
        <?php
        while($ch = mysqli_fetch_array($exec2))
        {
    ?>
                    <option value="<?=$ch['id_ch']; ?>"><?=$ch['title'];?></option>
                
        <?php }?>
        </select>
    </div>
    </div>

<div class="col">
    <div class="form-group">
        <label for="code">new code</label>
        <input type="text" class="form-control" name="code_chambre">
    </div>
</div>

        


</div>
<button class="btn btn-outline-primary" name="submit">change</button>
</form>

</div>
<hr>
<div class="container mt-5">
<h3 class="text-center font-weight-bolder text-primary" style="font-family:monospace;font-size:27px">code list</h3>
<br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">title</th>
      <th scope="col">code</th>

      
    </tr>
  </thead>
  <tbody>
    <?php
        while($ch = mysqli_fetch_array($exec))
        {
    ?>
    <tr>
            <th scope="row"><?= $ch['id_ch']; ?></th>
            <td> <?= $ch['title']; ?> </td>
            <td class="text-primary"><?= $ch['code_chambre']; ?></td>


    </tr>

        <?php }  ?>
  </tbody>
</table>
</div>


</body>
</html>





























<?php } ?>