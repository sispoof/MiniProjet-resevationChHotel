<?php session_start();
 if(isset($_SESSION['adminUsername']))
 header('Location: dashboard.php');
?>
<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
    </head>
    <body class="adminPanel">  

    <div class="title">
        <div class="wrapper">
            <h1 style="text-align:center">AdminPanel</h1>
        </div>
    </div>
        

        <div id="container">
            <!-- zone de connexion -->
            
            <form action="includes/adminVerif.php" method="POST">
                <h1>Connexion</h1>
                
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" id='submit' value='LOGIN' >
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