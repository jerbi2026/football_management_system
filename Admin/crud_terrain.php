
<?php
include('php_fonctions/connexion.php'); // Inclure le fichier de connexion

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom_terrain = $_POST['nom_terrain'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];

    // Traitement de l'image
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = file_get_contents($_FILES['image']['tmp_name']);
    } else {
        $image = null;
    }

    // Préparer la requête d'insertion
    $query = "INSERT INTO terrain (nom_terrain, description, image, prix) VALUES (:nom_terrain, :description, :image, :prix)";
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(':nom_terrain', $nom_terrain);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':image', $image, PDO::PARAM_LOB);
    $stmt->bindParam(':prix', $prix);

    $query_notif = "INSERT INTO notification_global (notification , date_notification) VALUES (:notif, now())";
    $stmt_notif = $bdd->prepare($query);
    $notif = "new terrain is added";
    $stmt_notif->bindParam(':notif', $notif);
    $stmt_notif->execute();
    
    
    if ($stmt->execute()) {
        echo "<h1>Terrain ajouté avec succès.</h1>";
    } else {
        echo "Erreur lors de l'ajout du terrain.";
    }
    
}
?>

<a class="btn btn-primary" href="terrains.php">
 Return
</a>