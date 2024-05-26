<?php
include('php_fonctions/connexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom_tournoi = $_POST['nom_tournoi'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $description = $_POST['description'];
    $id_terrain = $_POST['id_terrain'];
    $nb_equipe = $_POST['nb_equipe'];
    $prix = $_POST['prix'];

    $query = "INSERT INTO tournois (nom_tournoi, date_debut, date_fin, description, id_terrain, nb_equipe, prix) 
              VALUES (:nom_tournoi, :date_debut, :date_fin, :description, :id_terrain, :nb_equipe, :prix)";
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(':nom_tournoi', $nom_tournoi);
    $stmt->bindParam(':date_debut', $date_debut);
    $stmt->bindParam(':date_fin', $date_fin);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':id_terrain', $id_terrain, PDO::PARAM_INT);
    $stmt->bindParam(':nb_equipe', $nb_equipe, PDO::PARAM_INT);
    $stmt->bindParam(':prix', $prix);

    if ($stmt->execute()) {
        echo "Tournoi ajouté avec succès.";
        header("Location: home.php");
    } else {
        echo "Erreur lors de l'ajout du tournoi.";
    }
    exit;
}
?>
