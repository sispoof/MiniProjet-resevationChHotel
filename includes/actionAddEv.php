<?php
session_start();
if(!isset($_SESSION['adminUsername']))
{
    header('Location:../admin.php');
}
else
{

    if(isset($_FILES['userfile']) && isset($_POST['title']) && isset($_POST['description']) && isset($_POST['date_eve']) )
    {
        
        $direction = 'img/events/';
        $file = basename($_FILES['userfile']['name']);
        $addTime = explode(".",$file);

        $extentions = array("jpg","png");
        if(!in_array($addTime[1],$extentions))
        {
            header('Location: ../add_ev.php?extension=true');
        }
        else{
            
             $filename = $addTime[0] . time() . '.' . $addTime[1];
             $upload = $direction . $filename;
             //uploadina el fichier
             move_uploaded_file($_FILES['userfile']['tmp_name'],'../'.$upload);


             //ninseriou les donné fel base da dannée
             $db_username = 'root';
             $db_password = '';
             $db_name = 'khalil';
             $db_host = 'localhost';
           
            $db = mysqli_connect($db_host,$db_username,$db_password,$db_name) or die('Could not connect To database');
            $title =mysqli_real_escape_string($db,htmlspecialchars($_POST['title']));
      
            $description =mysqli_real_escape_string($db,htmlspecialchars($_POST['description']));
            $date_eve = $_POST['date_eve'];
    
            $req = "INSERT into events (Title,description,img,date_eve) values ('$title','$description','$upload','$date_eve')";
            var_dump($req);
            $exec = mysqli_query($db,$req);
            if($exec)
            header('Location: ../view_ev_admin.php');
            else
           var_dump($exec);
        }

       
    }
    else
    {
        header('Location: ../add_ev.php?empty=true');
    }



}
?>
