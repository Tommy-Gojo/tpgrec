<?php
include "pdo.php";

function requete_createuser($pseudo, $mail, $mdp){
    $db = connexion_BD();
    $sql = "INSERT INTO users (pseudo_user, mail_user, mdp_user) VALUES (:pseudo, :mail, :mdp)";
    $req = $db->prepare($sql);
    $req->execute([
        ":pseudo" => $pseudo,
        ":mail" => $mail,
        ":mdp" => $mdp
    ]);
}
function requete_deletearticle($article) {
    $db = connexion_BD();
    $sql = "DELETE FROM users WHERE id_users = :id";
    $req = $db->prepare($sql);
    $req->execute([
        ":id" => $id
    ]);
}

function requete_findUser($id) {
    $db = connexion_BD();
    $sql = "SELECT * FROM users WHERE id_users = :id";
    $req = $db->prepare($sql);
    $req->execute([
        ":id" => $id
    ]);
    $data = $req->fetch(PDO::FETCH_OBJ);
    return $data;
}

function deconnexion(){
    session_unset();
    session_destroy();
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

function connexion(string $username, string $password ){
    $db = connexion_BD();
    $sql = "SELECT * FROM users WHERE pseudo_user = :username";
    $req = $db->prepare($sql);
    $req->execute(['username' => $username]);
    $response = $req->fetch(PDO::FETCH_OBJ);
    // var_dump($response->mdp_user);
    if($response && password_verify($password, $response->mdp_user)){
        new_session($response->id_users, $response->pseudo_user, $response->role_user);

        return true;
    }else{
        return false;
    }
}

function new_session($id_users, $pseudo_user, $role_user){
    $_SESSION['user']['id_users']=$id_users;
    $_SESSION['user']['pseudo_user']=$pseudo_user;
    $_SESSION['user']['role_user']=$role_user;
}

function add_article($contenu, $auteur, $titre, $url_img){
    $db = connexion_BD();
    $sql = "INSERT INTO article (contenu,  titre, url_img, id_auteur) VALUES (:contenu, :titre, :url_img, ;id_auteur)";
    var_dump($sql);
    $req = $db->prepare($sql);
    $req->execute([
        ":contenu" => $contenu,
        ":titre" => $titre,
        ":url_img" => $url_img,
        ":id_auteur" => $auteur
    ]);
}



