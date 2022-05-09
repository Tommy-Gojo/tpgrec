<?php

    session_start() ;
    // if($_SESSION['user']['role_user'] !== 'admin'){
    //     header ('location: ../users/signup.php');
    // }
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
    <form action="" method="post">
    <input type="submit" value="deco" name="deco">
    </form>
    <?php
        var_dump($_POST);
        if(isset($_POST['deco'])){
            deconnexion();
        }
    ?>
    <h1>Vous souhaitez ajouter un article?</h1>
    <a href="article.php">Cree mon article</a>
</body>
</html>