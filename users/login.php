<?php
session_start();
include '../php/requete.php';

if(isset($_POST['submit'])){
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];
    var_dump (connexion($pseudo,$mdp));
    connexion($pseudo,$mdp);
    // if(connexion($pseudo,$mdp)){
    //     var_dump($_SESSION);
    // }
    header ("location: ../php/accueil.php");
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="pseudo">
        <input type="password" name="mdp">
        <input type="submit" value="submit" name="submit">
        <a href="signup.php">Pas de compte ?</a>
    </form>
</body>
</html>