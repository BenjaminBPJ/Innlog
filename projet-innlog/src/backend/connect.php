<?php
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=innlog;charset=utf8', 'root', '0000');
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
     }

