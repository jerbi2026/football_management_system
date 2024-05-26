<?php
include('php_fonctions/connexion.php');
if(isset($_COOKIE['encrypted'])) {
    $encrypted_id = $_COOKIE['encrypted'];
    $decrypted_id = openssl_decrypt($encrypted_id, "AES-128-ECB", "uiop5258");

    try {
        $requete = $bdd->prepare("SELECT * FROM user WHERE id_user = ?");
        $requete->execute(array($decrypted_id));
        
        if($requete->rowCount() > 0) {
            $user = $requete->fetch();

           
            
            
            
        } else {
           header("Location : ../login/login.php ");
        }
        $requete->closeCursor();
    } catch (PDOException $e) {
        die("Erreur lors de la récupération de l'utilisateur : " . $e->getMessage());
    }
} else {
    echo "Cookie d'identifiant non trouvé.";
    header("Location : ../login/login.php ");
}

$current_user_id = $user['id_user'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $contenu_message = $_POST['message'];
    $date_message = date('Y-m-d H:i:s');

    $query = "INSERT INTO messages (id_user, contenu_message, date_message) VALUES (:id_user, :contenu_message, :date_message)";
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(':id_user', $current_user_id);
    $stmt->bindParam(':contenu_message', $contenu_message);
    $stmt->bindParam(':date_message', $date_message);
    $stmt->execute();

    echo json_encode(['status' => 'success']);
}
?>
