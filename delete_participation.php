<?php 
session_start();
if(isset($_GET['id']))
{
    $db_username = 'root';
    $db_password = '';
    $db_name = 'khalil';
    $db_host = 'localhost';
  
    $db = mysqli_connect($db_host,$db_username,$db_password,$db_name) or die('Could not connect To database');
    $query = "DELETE from participations where id_participation = ".$_GET['id']."";
    $exec = mysqli_query($db,$query);
    if($exec)
    header('Location:view_participation.php?deleted=true');
    else
    echo "Query Error";
}
else
{
    header('Location:events.php');
}


?>