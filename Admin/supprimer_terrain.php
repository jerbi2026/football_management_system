<?php
include('php_fonctions/connexion.php'); // Inclure le fichier de connexion

if (isset($_GET['id'])) {
    $id_terrain = $_GET['id'];

    // Préparer la requête de suppression
    $query = "DELETE FROM terrain WHERE id_terrain = :id_terrain";
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(':id_terrain', $id_terrain);

    if ($stmt->execute()) {
        echo "Terrain supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression du terrain.";
    }

    // Rediriger vers la page d'accueil ou la liste des terrains après suppression
    header("Location: terrains.php"); // Remplacez 'terrains.php' par la page appropriée
    exit;
}
?>
