<?php

session_start();
include "requete.php";

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
    <form action="" method="POST" enctype="multipart/form-data">

        <label for="">Entrer le titre</label>
        <input type="text" name="title">
        
        <label for="">Entrer votre histoire</label>
        <textarea name="history" id="history" cols="60" rows="20"></textarea>

        <label for="">Ajouter une image pour une lecteure immersive</label>
        <input type="file" name="img">

        <input type="submit" value="Envoyer votre histoire" name="sub">

        <form action="" method="post">
    <input type="submit" value="deco" name="deco">
    </form>
    <?php
        var_dump($_POST);
        if(isset($_POST['deco'])){
            deconnexion();
        }
    ?>
    </form>
    <?php
        var_dump($_POST);
        ?>
        <br><br><br>
        
        <?php
        var_dump($_SESSION);
        ?>
        <br><br><br>
        <?php
        var_dump($_FILES);
       if($_POST){
            if($_FILES['img']['size'] >0){
                $dossier = "../img-users/";

                $file = $_FILES['img'];

                $pseudo = $_SESSION['users']['pseudo_user'];

                $file['name'] = str_replace(" ","_",$file['name']);

                $format = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION)); 

                $titleimg = ucfirst(strtolower($_POST['title']));

                $fichiercible = $dossier."_".$titleimg."_".$pseudo.".".$format;

                move_uploaded_file($file['tmp_name'], $fichiercible);

                $imagename= $titleimg."_".$pseudo.".".$format;

                $contenu = $_POST['history'];

                add_article($contenu, "1", $imagename,$pseudo);
                
            }else{
                echo 'pas ok';
            }
       }

    ?>
</body>
</html>