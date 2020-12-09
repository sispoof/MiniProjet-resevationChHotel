<?php session_start();  
header('Content-Type: text/html; charset=UTF-8');
$db_username = 'root';
$db_password = '';
$db_name     = 'khalil';
$db_host     = 'localhost';
$db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
       or die('could not connect to database');
$req="Select * from chambre";
$exec = mysqli_query($db,$req);
// $chambres     = mysqli_fetch_assoc($exec);


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
    <title>Hotel</title>
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
              <li class="nav-item active">
                <a class="nav-link rounded js-scroll-trigger" href="#home"><i class="fas fa-home fa-sm"></i>&nbsp;Home
                      <span class="sr-only">(current)</span>
                    </a>
              </li>
              <li class="nav-item">
                <a class="nav-link rounded js-scroll-trigger" href="#serv"><i class="fas fa-list fa-sm"></i>&nbsp;SERVICES</a>
              </li>
              <li class="nav-item">
                <a class="nav-link rounded js-scroll-trigger" href="#chambre"><i class="fas fa-hotel fa-sm"></i>&nbsp;chambres</a>
              </li>
              <li class="nav-item">
                <a class="nav-link rounded js-scroll-trigger" href="#"><i class="far fa-images fa-sm"></i>&nbsp;gallery</a>
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
          <a class="dropdown-item text-center" href="events.php">View Rooms</a>
          <a class="dropdown-item text-center" href="includes/deconnect.php">logout</a>
        </div>
      </li>
        <?php } ?>
            </ul>
          </div>
        </div>
      </nav>

      <!-- header -->
      <header class="masthead" id="home">
        <div class="container h-100">
           
         <div class="row h-100 align-items-center">
             <div class="col-12 text-center ">
                 <h1 class="font-weight-bold" style="color:#fff">Welcome to Abdallah guich Groupe</h1>
                 <p class="lead" style="color:#fff">Relaxation, plaisirs culinaires,
                      romance sous les étoiles et jeux espiègles au soleil… 
                      Explorez nos offres spéciales conçues pour votre plus grand plaisir,
                      autant de raisons pour vous évader!.</p>
                
             </div>
         </div>

        </div>
      </header>
      
      <!-- services -->
      
      <section class="wrapper" id="serv">
       
          <h2 class="title text-center">SERVICES</h2>
    
          <hr class="divider mb-3">
          <div class="container">
             <div class="row">
                 
              <div class="col-xs-12 col-md-6">
                  <div class="service">
                    <span class="icon"><i class="fas fa-door-open fa-5x"></i></span>
                    <h3 class="text-center">Le Room service <hr></h3>
                    <p>Le room service est le premier service hôtelier à ne pas négliger. Il est directement lié à la chambre et permet au client de s'approvisionner de tout ce qui pourrait lui manquer, ainsi que de tout ce qu’il peut désirer depuis une chambre. Il est donc indispensable à tout hôtel qui se soucie de la qualité de sa prestation. De plus, il permet de générer de bons revenus additionnels, ce qui en fait le service le plus utilisé par les clients et qui rapporte le plus !</p>
                  </div>
              </div>

              <div class="col-md-6 col-xs-12">

                <div class="service">
                  <span class="icon"><i class="fas fa-car-alt fa-5x"></i></span>
                  <h3 class="serv-tit text-center mb-2">Les transports <hr></h3> 
                  <p>Un hôtel est un lieu de passage où l’on vient séjourner un moment, visiter les alentours et repartir aussi tôt. L'accès à l’hôtel et aux différents lieux phares (tel que les gares, musées, même aéroports ...) doivent être simples et prises en charge par l'hôtel. Il est donc bien vu de pouvoir proposer, entre autres, un service de taxi qui vient chercher le voyageur directement à l'hôtel, voire même un chauffeur qui suit ses clients tout au long d’une journée, voir du séjour.

                    Là aussi, le service simplifie le séjour du client tout en vous faisant profiter de nouvelles commissions.</p>
                </div>

            </div>


            <div class="col-md-6 col-xs-12">
                <div class="service">
                  <span class="icon"><i class="fas fa-tv fa-5x"></i></span>
                  <h3 class="serv-tit text-center mb-2">Loisir audiovisuel <hr></h3>
                  <p>Nous vivons dans un monde digital où une bonne partie des loisirs quotidiens se passent sur un écran à regarder des films, des séries ou des vidéos de toutes sortes.
                    C’est pourquoi une offre de chaine TV, une location de films ou bien un accès à un catalogue vidéo (Netflix  / YouTube) est indispensable dans l’offre hôtelière. Dans la même optique, il est bien agréable de pouvoir regarder  son émission préférée comme chez soi, le soir avant d’aller se coucher. Et là encore, ce sont souvent des programmes payant que l’hôtelier peut marger. Tout le monde y gagne ! Pour l’un en un certain confort, tandis que l’autre par des ventes additionnelles (et un client satisfait).
                </p>
                </div>
            </div>


             <div class="col-md-6 col-xs-12">
                  <div class="service">
                    <span class="icon"><i class="fas fa-hot-tub fa-5x"></i></span>
                    <h3 class="serv-tit text-center mb-2">Le Spa <hr></h3>
                    <p>Le spa est l’attraction la plus souvent recherchée afin de se relaxer dans un hôtel. Quoi de mieux que de se détendre dans un bon jacuzzi, se rafraichir dans la piscine et terminer par une petite session de sport pour se revitaliser ? Bien que souvent cher à mettre en place, ce service permet de surclasser son hôtel (possiblement le faire gagner une étoile), et donc de monter les prix tout en améliorant le bien-être de ses clients. Encore de quoi faire des heureux ! Sinon vous pouvez aussi avoir recours aux partenariats ... à moindre coût et tout aussi créateur d'une valeur ajoutée (même si moins pratique). De nombreux hôtels se sont laissés séduire par ce principe.</p>
                  </div>
              </div>
        
            </div> 
          </div>
      </section>

      <!-- section pour les chambre  -->
      <section class="chambre" id="chambre">
        <div class="container">
         
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <!-- preparé le nbr d'image -->
    <?php $nbr = mysqli_num_rows($exec);  ?>
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <?php
       for($i=1;$i<$nbr;$i++){
    ?>
    <li data-target="#carouselExampleIndicators" data-slide-to="<?=$i;?>" ></li>
       <?php }  ?>
  </ol>
  <div class="carousel-inner">
    <!-- fetch data (table chambre) -->
  <?php while($ch=mysqli_fetch_array($exec)){ //setLocale(LC_CTYPE, 'FR_fr.UTF-8');?>
    <div class="carousel-item ">
      <img class="d-block w-100"  src=<?php echo $ch['path'];  ?>  alt="First slide">
              <div class="carousel-caption d-none d-md-block">
            <h5><?= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $ch["title"]); ?></h5>
            <p><?=$ch["description"]; ?></p>
            <p><?=$ch["prix"]; ?> DT</p>
          </div>
    </div>
  <?php  }  ?>

  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
        </div>
      </section>








      <script>
        c = document.querySelectorAll(".carousel-item");
        c[0].classList.add("active");

      </script>
</body>
<?php mysqli_close($db);?>
</html>
