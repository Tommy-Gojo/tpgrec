<?php

function connexion_BD()
{
    try 
    {
        $db = new PDO("mysql:host=localhost;dbname=exogrec;charset=utf8", "root", "");
        return $db;
    } 
    catch (Exception $e) 
    {
        //die() est l'équivalent de "exit;", il arrête le script et affiche un message
        die($e->getMessage());
    }
}