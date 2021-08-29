<?php

// Connexion à la base de données

function connexion(&$conn)
{
    $servername = 'localhost';
    $dbname = 'mycavefinal';
    $username = 'root';
    $dbpwd = '';

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $dbpwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch (PDOException $e) {
        echo "Erreur:" . $e->getMessage();
        die();
    }
}
