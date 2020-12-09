<?php
session_start();
if (isset($_SESSION['id']))
{
  header('Content-Type: text/html; charset=UTF-8');
  $db_username = 'root';
  $db_password = '';
  $db_name = 'khalil';
  $db_host = 'localhost';

  $db = mysqli_connect($db_host,$db_username,$db_password,$db_name) or die('Could not connect To database');
  $req = 'SELECT id_ch,title,description,prix,path from chambre where id_ch NOT IN( select id_ch from reservations where id_user ='.$_SESSION['id'].')';
  $exec = mysqli_query($db,$req);

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
    <title>Rooms</title>
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
                          <a class="dropdown-item" href="chambre.php">View</a>
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


      <br><br><br><br>
      


      <section class="viewEvents container">
      <?php
  if(isset($_GET['created']))
   {
?>
<h5 class="alert alert-primary">Reservation request has been added successfully! check your participations list : <a href="view_reservation.php">here</a></h5>
   <?php } ?>
  <?php
        
        while ($chamber = mysqli_fetch_array($exec))
        {
          ?>
             <div class="details shadow mb-4 p-4">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-xs-12">
                <img src="<?= $chamber['path']; ?>" alt="" >
              </div>

              <div class="col">
                <h5><?= $chamber['title']."  ".$chamber['prix']." DT"; ?></h5>
                <hr>
                <p class="text-dark"> <?= $chamber['description']; ?> </p>
                <hr>
              </div>
              <div class="col-auto align-self-end">
                <form action="reservation.php?id=<?=$chamber['id_ch'];?>" method="POST">
                    <button class="btn btn-outline-primary">Réserver</button>
              </form>
              </div>
            </div>
          </div>

        <?php } ?>



</div>






<script>

  $(document).ready(function(){
  var zindex = 10;
  
  $("div.card").click(function(e){
    e.preventDefault();

    var isShowing = false;

    if ($(this).hasClass("show")) {
      isShowing = true
    }

    if ($("div.cards").hasClass("showing")) {
      // a card is already in view
      $("div.card.show")
        .removeClass("show");

      if (isShowing) {
        // this card was showing - reset the grid
        $("div.cards")
          .removeClass("showing");
      } else {
        // this card isn't showing - get in with it
        $(this)
          .css({zIndex: zindex})
          .addClass("show");

      }

      zindex++;

    } else {
      // no cards in view
      $("div.cards")
        .addClass("showing");
      $(this)
        .css({zIndex:zindex})
        .addClass("show");

      zindex++;
    }
    
  });
}); 

</script>
</body>
</html>

        <?php }
            else
            {
                header('Location:login.php');
            }
        ?>





