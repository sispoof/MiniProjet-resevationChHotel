<?php
if(isset($_POST['service']))
{
    $db_username = 'root';
    $db_password = '';
    $db_name = 'khalil';
    $db_host = 'localhost';
    $ser = $_POST['service'];

    //algorithme correction (') ki da5al caractére hedha ' fi req yjik ki el eurror 5ater yetsakkar ma3 el string so bech tsalla7ha fi blaset el ' yelzem \'
    $corr = explode("'",$ser);
    $service= implode("\'",$corr);

    //fin algorithme

    $db = mysqli_connect($db_host,$db_username,$db_password,$db_name) or die('Could not connect To database');
    $req = "insert into service (title) values ('$service') ";
    $exec = mysqli_query($db,$req);
  
    
    header('Location: services.php');

}
else
{
    echo 'error found! ';
?>
<a href="services.php">back</a>

<?php } 
?>