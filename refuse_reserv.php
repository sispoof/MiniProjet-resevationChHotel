<?php

    if(!isset($_GET['id']))
    {
        header('Location: dashboard.php');
    }
    $db_username = 'root';  
    $db_password = '';
    $db_name = 'khalil';
    $db_host = 'localhost';
  
    $id = $_GET['id'];
    $db = mysqli_connect($db_host,$db_username,$db_password,$db_name) or die('Could not connect To database');
    $req = "delete from reservations where id_reservation='$id' ";
    
    $exec = mysqli_query($db,$req);
    header('Location: dashboard.php');

?>