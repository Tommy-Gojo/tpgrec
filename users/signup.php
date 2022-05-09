<?php
session_start() ;
include '../php/requete.php';

if(isset($_POST['submit'])){
    $pseudo = $_POST['pseudo'];
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];
    $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);
    requete_createuser($pseudo, $mail, $mdp_hash);
    
    header ("location: login.php");
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
        <input type="text" name="mail">
        <input type="submit" value="submit" name="submit">
        <a href="login.php">Deja un compte ?</a>
    </form>
</body>
</html>