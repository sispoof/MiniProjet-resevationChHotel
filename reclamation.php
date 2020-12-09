<?php  
session_start();
if(!isset($_SESSION['codeCh']))
{
    header('Location:view_reservation.php');
}
else{

    if(isset($_POST['subService']))
    {
        $db_username = 'root';
        $db_password = '';
        $db_name = 'khalil';
        $db_host = 'localhost';

        $db = mysqli_connect($db_host,$db_username,$db_password,$db_name) or die('Could not connect To database');
        $idch=$_SESSION['idCh'];
        $service = $_POST['service'];
        $req = "insert into reclamation(id_ch,id_service) values ('$idch','$service') ";
        $res=mysqli_query($db,$req);
        header('Location: view_reservation.php?done=true');
    }

$db_username = 'root';
$db_password = '';
$db_name = 'khalil';
$db_host = 'localhost';

$db = mysqli_connect($db_host,$db_username,$db_password,$db_name) or die('Could not connect To database');
$req = "select * from service ";
$res = mysqli_query($db,$req);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reclamation</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/all.min.js"></script>
    <script src="js/util.js"></script>
    <link rel="stylesheet" href="css/main.css">

    <style>
    
    .child {

            margin-top:37%

        }
    </style>

</head>
<body>
    <div class="container">
      <div class="child">
        <form action="reclamation.php" method="post">
            <div class="form-group">
                <label for="">service</label>
                <select name="service" class="form-control" >
                    <?php while($ser = mysqli_fetch_array($res))
                    {

                    ?>
                        <option value="<?= $ser['id_service'] ?>"> <?= $ser['title']; ?> </option>

                       <?php } ?>

                </select>
            </div>

            <div class="form-group">
                        <button class="btn btn-outline-primary" name="subService">submit</button>
            </div>
        </form>
</div>
    </div>
</body>
</html>




                    <?php }?>