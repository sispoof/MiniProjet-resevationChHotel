<?php 
session_start();
if(isset($_POST['submit']))
{
     // connexion à la base de données
     $db_username = 'root';
     $db_password = '';
     $db_name     = 'khalil';
     $db_host     = 'localhost';
     $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
            or die('could not connect to database');
     
     // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
     // pour éliminer toute attaque de type injection SQL et XSS
     $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
     $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
     $repeat_password = mysqli_real_escape_string($db,htmlspecialchars($_POST['repeat_password']));

     if($username == '')
     {
         header('Location: ../register.php?eur_username=true');
         exit();
     }
            $reqTest = "SELECT username from users";
            $exec = mysqli_query($db,$reqTest);
            $usersList = mysqli_fetch_array($exec);

    if(in_array($username,$usersList))
    {
        header('Location: ../register.php?eur_user_exist=true');
        exit();
    }


     if($password == '' || $repeat_password == '')
     {
         header('Location: ../register.php?eur_pass_notFilled=true');
         exit();
     }

     if($password != $repeat_password)
     {
         header('Location: ../register.php?eur_pass_match=true');
         exit();
     }

   


     $reqadd = 'INSERT into users (username,pwd) values ("'.$username.'","'.$password.'")';;
     $s= mysqli_query($db,$reqadd);
     $req2 = "SELECT max(id) as maxid from users";
     $execResult = mysqli_query($db,$req2);
     $user = mysqli_fetch_array($execResult);

     $_SESSION['id'] = $user['maxid'];
     $_SESSION['username'] = $username;

    header('Location: ../events.php');

}
else
{
    header('Location: ../register.php');
}


?>