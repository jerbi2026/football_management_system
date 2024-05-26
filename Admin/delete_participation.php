<?php
if (isset($_POST['participant_id'])) {
    include ("php_fonctions/connexion.php");

    try {
        $stmt = $bdd->prepare("DELETE FROM temp_participant WHERE id_participation = ?");
        $stmt->bindParam(1, $_POST['participant_id'], PDO::PARAM_INT);
        $stmt->execute();
        http_response_code(200);
        echo "La participation a été supprimée avec succès.";
    } catch (PDOException $e) {
        http_response_code(500);
        echo "Erreur lors de la suppression de la participation : " . $e->getMessage();
    }
} else {
    http_response_code(400);
    echo "ID du participant non spécifié.";
}
?>
