<?php
session_start();
if (isset($_SESSION['id']))
{
  
    if(isset($_POST['submitCode']) && isset($_POST['id']) && isset($_POST['code']))
    {
        $db_username = 'root';
        $db_password = '';
        $db_name = 'khalil';
        $db_host = 'localhost';
    
        $id = $_POST['id'];
        $code = $_POST['code'];
        $db = mysqli_connect($db_host,$db_username,$db_password,$db_name) or die('Could not connect To database');
        $req = "select * from chambre where (id_ch = '$id') and (code_chambre = '$code')  ";
        $res = mysqli_query($db,$req);
        $data = mysqli_fetch_array($res);
        if(mysqli_num_rows($res) == 1 )
        {
            $_SESSION['idCh'] = $data['id_ch'];
            $_SESSION['codeCh'] = $data['code_chambre'];
            header('Location: reclamation.php');
        }
        else
        {
            header('Location:view_reservation.php?rec=false');
        }
    }
  
  if(isset($_SESSION['id_chambre']))
    {
        unset($_SESSION['idCh']);
        unset($_SESSION['codeCh']);
    }

    $db_username = 'root';
    $db_password = '';
    $db_name = 'khalil';
    $db_host = 'localhost';
  
    $db = mysqli_connect($db_host,$db_username,$db_password,$db_name) or die('Could not connect To database');
    //n5arjou el list ta3 el request non accepter
    $req1 ="SELECT r.id_reservation, c.title,c.id_ch,c.description,c.prix
     from chambre c join reservations r
     on c.id_ch = r.id_ch
    join users u on u.id = r.id_user 
    where r.etat = 0 AND r.id_user = ".$_SESSION['id']."";
    $res1 = mysqli_query($db,$req1);


    //n5arjou el list ta3 les request accepted
    $req2 = "SELECT r.id_reservation, c.title,c.id_ch,c.description,c.prix
    from chambre c join reservations r
    on r.id_ch = c.id_ch 
   join users u on u.id = r.id_user 
   where r.etat = 1 AND r.id_user = ".$_SESSION['id']."";

    $res2 = mysqli_query($db,$req2);

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/all.min.js"></script>
    <script src="js/util.js"></script>
    <link rel="stylesheet" href="css/main.css">

    <title>Events</title>
</head>
<body>
     <!-- Navbar -->
     <nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
        <div class="container">
          <a class="navbar-brand" href="index.php">Hôtel Khalil</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-list fa-sm"></i>&nbsp;Events
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="events.php">View</a>
                          <a class="dropdown-item" href="view_participation.php">Participations</a>
                        </div>
                     </li>
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-hotel fa-sm"></i>&nbsp;Rooms
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="chambres.php">View</a>
                          <a class="dropdown-item" href="view_reservation.php">Reservations</a>
                        </div>
                     </li>
    <!-- Hné 3mlana Test idha el client mahouch mlogini chyafichilek icon ta3 login thezzek lil page login sinon taffichilek 7aja o5ra  -->
        <?php if(!isset($_SESSION['username'])) { ?>
            <li class="nav-item">
                <a class="nav-link rounded js-scroll-trigger ml-5" title="LOGIN" href="login.php"><i class="fas fa-sign-in-alt fa-lg"></i></a>
              </li>
        <?php } else{ ?>
            <li class="nav-item dropdown dropdown">
        <a class="nav-link dropdown-toggle ml-5 dropdown-toggle dropdown-toggle-split" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="far fa-user-circle fa-lg"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="navdrop dropdown-item">Welcome <?=$_SESSION['username'];?></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-center" href="events.php">View Events</a>
          <a class="dropdown-item text-center" href="chambres.php">View Rooms</a>
          <a class="dropdown-item text-center" href="includes/deconnect.php">logout</a>
        </div>
      </li>
        <?php } ?>
            </ul>
          </div>
        </div>
      </nav>

<section class="viewpart">
    <?php
        if(isset($_GET['deleted']))
        {
    ?>
     <h6 class="container alert alert-danger text-center">participation deleted</h6>
        <?php } ?>
    <div class="row">
        <div class="col">
            <div class="container">
            <h5 class="mb-4">List of Participations not accepted yet  <span class="badge badge-pill badge-secondary float-right"> <?= mysqli_num_rows($res1); ?> </span> </h5>
                <div class="row">
                    <?php
                    if(mysqli_num_rows($res1) >0)
                    {
                        while($listNA = mysqli_fetch_array($res1))
                        {
                    ?>
                    <div class="col-6 mb-3">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $listNA['title']; ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted"> <?= $listNA['prix'];  ?>DT (ID:<?=$listNA['id_ch']; ?>) </h6>
                                   <br>
                                    <a href="delete_reservation.php?id=<?= $listNA['id_reservation']; ?>" class="card-link text-danger">delete Request</a>
                                </div>
                             </div>
                    </div>
                        <?php } 
                        }else
                        {
                        ?>
                        <p class="text-danger text-center">No request Found</p>
                        <?php } ?>

            
            
                    
                </div>
                             
            </div>
        </div>

        <div class="col ml-5">
            <div class="container">
                <h5 class="mb-4">List of Participations Accepted <span class="badge badge-pill badge-secondary float-right"> <?= mysqli_num_rows($res2); ?> </span> </h5>
            <div class="row">
                <?php 
                    if(mysqli_num_rows($res2) > 0)
                    {

                    while($listA = mysqli_fetch_array($res2))
                    {
                ?>
                    <div class="col-6">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title"> <?= $listA['title']; ?> </h5>
                                    <h6 class="card-subtitle mb-2 text-muted"><?= $listA['prix']; ?> DT (ID:<?=$listA['id_ch']; ?>)</h6>
                                    <br>
                                                <form action="view_reservation.php" method="post">
                                                        <input type="text" value="<?=$listA['id_ch'];?>" name="id" hidden>
                                                        <div class="row">
                                                        <div class="col-8">
                                                            <input type="text" class="form-control" placeholder="code reclamation" name="code">
                                                        </div>
                                                        <div class="col-3">
                                                            <button class="btn btn-light btn-sm" name="submitCode">submit</button>
                                                        </div>
                                                        </div>
                                                </form>
                                    <a href="delete_reservation.php?id=<?= $listA['id_reservation']; ?>" class="card-link text-danger">cancel reservation</a>
                                </div>
                             </div>
                    </div>

                    <?php }
                    }
                    else { ?>
                    <p class="text-center text-danger">No participation found!</p>
                    <?php } ?>
                </div>
                </div>
        </div>
    </div>
</section>

</body>
</html>

        <?php } 
            else
            {
                header('Location:login.php');
            }
        ?>