<?php
include('php_fonctions/connexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titre = $_POST['titre'];
    $texte = $_POST['texte'];
    $date = $_POST['date'];
    $id_admin = $_POST['id_admin'];

    $query = "INSERT INTO news (titre, texte, date) 
              VALUES (:titre, :texte, :date)";
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(':titre', $titre);
    $stmt->bindParam(':texte', $texte);
    $stmt->bindParam(':date', $date);
   

    if ($stmt->execute()) {
        echo "Actualité ajoutée avec succès.";
        header("Location: home.php");
    } else {
        echo "Erreur lors de l'ajout de l'actualité.";
    }
    exit;
}
?>
