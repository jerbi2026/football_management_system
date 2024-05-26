<?php
include('php_fonctions/connexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom_produit = $_POST['nom_produit'];
    $description = $_POST['description'];
    $prix_produit = $_POST['prix_produit'];
    $quantite = $_POST['quantite'];
    $id_categorie = $_POST['id_categorie'];

    $image = file_get_contents($_FILES['image']['tmp_name']);

    $query = "INSERT INTO produit (nom_produit, description, prix_produit, quantite, id_categorie, image) 
              VALUES (:nom_produit, :description, :prix_produit, :quantite, :id_categorie, :image)";
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(':nom_produit', $nom_produit);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':prix_produit', $prix_produit);
    $stmt->bindParam(':quantite', $quantite, PDO::PARAM_INT);
    $stmt->bindParam(':id_categorie', $id_categorie, PDO::PARAM_INT);
    $stmt->bindParam(':image', $image, PDO::PARAM_LOB);

    if ($stmt->execute()) {
        echo "Produit ajouté avec succès.";
        header("Location: home.php");
    } else {
        echo "Erreur lors de l'ajout du produit.";
    }
    exit;
}
?>
