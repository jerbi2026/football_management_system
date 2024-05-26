
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifier votre mail</title>
    <link rel="stylesheet" href="form.css">
	<link rel="stylesheet" href="dialog.css">

</head>
<body>
<div class="form-container">
    <p class="title">Vérifier votre mail</p>
    <form class="form" method="post">
        <div class="input-group" style="margin-bottom:5%">
            <label for="code">Code</label>
            <input type="text" name="code" id="code" placeholder="" required>
        </div>
        <button class="sign" type="submit">Vérifier</button>
    </form>
    <div class="social-message">
        <div class="line"></div>
        <p class="message">Kram Sport</p>
        <div class="line"></div>
    </div>
    <p class="signup">Vous n'avez pas reçu le code?
        <a href="sign_up.php">Inscrivez-vous</a>
    </p>
</div>

<?php
include("fonctions/connexion.php");


if(isset($_POST['code']) && isset($_GET['email'])){
	$encrypted_mail = $_GET['email'];
	$decrypted_email = openssl_decrypt($encrypted_mail, "AES-128-ECB", "uiop5258");
    $req = $bdd->prepare('SELECT * FROM temp_users WHERE email = ?');
    $req->execute(array($decrypted_email));
	
    $user = $req->fetch();


    if($user !== false){
        $code = $_POST['code'];
        if($code == $user['verification_code']){
            $deleteStatement = $bdd->prepare("DELETE FROM temp_users WHERE email = :email");
            $deleteStatement->bindParam(':email', $user['email']);
            $deleteStatement->execute();

            $hashedPassword = password_hash($user['password'], PASSWORD_DEFAULT); 
            $insertStatement = $bdd->prepare("INSERT INTO user (username, email, password, date_creation) VALUES (:username, :email, :password, NOW())");
            $insertStatement->bindParam(':username', $user['username']);
            $insertStatement->bindParam(':email', $user['email']);
            $insertStatement->bindParam(':password', $hashedPassword);
            $insertStatement->execute();
			echo"<div class='dialog-box bg-white' id='dialog' style='display:block'>
            		<h2>Code Valide✅</h2>
            		<p>Congrulations vous avez crée votre compte</p>
            		<button aria-label='close' class='x' onclick='close_dialog()'>❌</button>
        		</div>";
			$encrypted_chaine = openssl_encrypt($user['email'], "AES-128-ECB" ,"uiop5258");
			$encoded_email = urlencode($encrypted_chaine);
			header("Location: type_user.php?email=$encoded_email");
        } else {
			echo"<div class='dialog-box bg-white' id='dialog' style='display:block'>
            		<h2>Code incorrect⛔</h2>
            		<p>Veuillez verifier votre code</p>
            		<button aria-label='close' class='x' onclick='close_dialog()'>❌</button>
        		</div>";
        }
    } else {
        echo "Utilisateur non trouvé";
		header("Location: sign_up.php");
    }
}
echo "
<script>
    function close_dialog(){
        document.getElementById('dialog').style.display = 'none';
    }
</script>"
?>

<div class='dialog-box bg-white' id='dialog' style="display:block">
<h2>Mail Envoyé📨📩</h2>
<p>Verifier votre boite mail pour avoir le code.</p>
<button aria-label='close' class='x' onclick='close_dialog()'>❌</button>
</div>
    
</body>
</html>