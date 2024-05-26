<?php
include("php_fonctions/connexion.php");
if (isset($_POST['id_reservation'])) {
    $id_reservation = $_POST['id_reservation'];

    try {
        $stmt = $bdd->prepare("DELETE FROM reservations WHERE id_reservation = ?");
        $stmt->execute(array($id_reservation));
        http_response_code(200);
        echo "La réservation a été supprimée avec succès.";
        
    } catch (PDOException $e) {
        http_response_code(500);
        echo "Erreur lors de la suppression de la réservation : " . $e->getMessage();
    }
} else {
    http_response_code(400);
    echo "L'ID de la réservation n'a pas été fourni.";
}
?>
