<?php session_start();
 if(isset($_SESSION['username']))
 header('Location: index.php');
?>
<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
    </head>
    <body>
        <div id="container">
            <!-- zone de connexion -->
            
            <form action="includes/insertUser.php" method="POST">
                <h1>Register</h1>
                
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
                <?php
                    if(isset($_GET['eur_username']))
                    {
                ?>
                <p style="color:red">required field is empty!</p>

                <?php 
                    }
                    ?>

                <?php
                    if(isset($_GET['eur_user_exist']))
                    {
                ?>
                <p style="color:red">username already exist !</p>

                <?php 
                    }
                    ?>
                    

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <?php 
                    if(isset($_GET['eur_pass_notFilled']))
                    {
                ?>
                    <p style="color:red"> required field is empty !</p>
                    <?php } ?>
                <label><b>confirmer Le Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="repeat_password" required>
                        
                <?php 
                    if(isset($_GET['eur_pass_match']))
                    {
                ?>
                    <p style="color:red"> password repeat not match !</p>
                    <?php } ?>

                <input type="submit" id='submit' name="submit" value='LOGIN' >
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
            </form>
        </div>
    </body>
</html>
