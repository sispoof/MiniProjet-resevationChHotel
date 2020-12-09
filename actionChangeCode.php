<?php 

if(!isset($_POST['chambre']) && !isset($_POST['code_chambre']))
{
    header('Location: roomscode.php');
}
else
{
    $id = $_POST['chambre'];
    $code = $_POST['code_chambre'];

    $db_username = 'root';
    $db_password = '';
    $db_name = 'khalil';
    $db_host = 'localhost';
  
    $db = mysqli_connect($db_host,$db_username,$db_password,$db_name) or die('Could not connect To database');
    $req = "UPDATE chambre set code_chambre = '$code' where id_ch = '$id' ";
    $exec = mysqli_query($db,$req);
    header('Location: roomscode.php');

}


?>