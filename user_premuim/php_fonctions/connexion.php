<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=football;charset=utf8', 'root', '');
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

