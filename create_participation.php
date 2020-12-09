<?php
session_start();
if(isset($_GET['id']))
{
    $db_username = 'root';
    $db_password = '';
    $db_name = 'khalil';
    $db_host = 'localhost';
  
    $db = mysqli_connect($db_host,$db_username,$db_password,$db_name) or die('Could not connect To database');
    $query = 'INSERT into participations (id_user,id_event,etat) values ('.$_SESSION['id'].','.$_GET['id'].',0)';
    $exec = mysqli_query($db,$query);
    
    if($exec)
    header('Location:events.php?created=true');
    else
    echo "Query Error";
}
else
{
    header('Location:events.php');
}
?>