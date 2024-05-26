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
        $userId = $user['id_user'];
        $requete->closeCursor();
    } catch (PDOException $e) {
        die("Erreur lors de la récupération de l'utilisateur : " . $e->getMessage());
    }
} else {
    echo "Cookie d'identifiant non trouvé.";
    header("Location : ../login/login.php ");
}
$current_user_id=$user['id_user'];

$query = "
    SELECT messages.id_message, messages.id_user, messages.contenu_message, messages.date_message, user.username ,user.image
    FROM messages 
    JOIN user ON messages.id_user = user.id_user 
    ORDER BY messages.date_message ASC";

$stmt = $bdd->prepare($query);
$stmt->execute();

$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($messages as $message) {
    $is_current_user = $message['id_user'] == $current_user_id;
    $chat_position = $is_current_user ? 'chat-right' : 'chat-left';
    if ($message['image']) {
        $avatar_data = base64_encode($message['image']);
        $chat_avatar = "data:image/png;base64,{$avatar_data}";
    } else {
        $chat_avatar = $is_current_user ? "https://www.bootdey.com/img/Content/avatar/avatar4.png" : "https://www.bootdey.com/img/Content/avatar/avatar3.png";
    } 
    $chat_name = htmlspecialchars($message['username']);
    $chat_text = htmlspecialchars($message['contenu_message']);
    $chat_hour = date('H:i', strtotime($message['date_message']));
    if($chat_position == 'chat-right'){
        echo "
    <li class=\"$chat_position\">
        <div class=\"chat-text\">$chat_text</div>
        
        <div class=\"chat-avatar\">
            <img src=\"$chat_avatar\" alt=\"User Avatar\">
            <div class=\"chat-name\">$chat_name</div>
        </div>
        <div class=\"chat-hour\">$chat_hour <span class=\"fa fa-check-circle\"></span></div>
        
    </li>
    ";

    }
    else{
        echo "
        <li class=\"$chat_position\">
            
        <div class=\"chat-hour\">$chat_hour <span class=\"fa fa-check-circle\"></span></div>
            <div class=\"chat-avatar\">
                <img src=\"$chat_avatar\" alt=\"User Avatar\">
                <div class=\"chat-name\">$chat_name</div>
            </div>
            <div class=\"chat-text\">$chat_text</div>
            
            
        </li>
        ";
    
        
    }
    
}
?>
