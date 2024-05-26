<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abonnement</title>
    <link rel="stylesheet" href="form.css">
	<link rel="stylesheet" href="dialog.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>
<div class="form-container">
	    <p class="title">Choisir le type d'abonnement</p>
	    <form class="form" method="post">
		    <div class="input-group" style="margin-bottom:5%">
			    
                <select name="type" id="type" class="form-control" placeholder="">
                    <option value="premuim">Premuim 15dt/mois</option>
                    <option value="free">Free</option>
                </select>
			   
		    </div>
            
		    <button class="sign">Choisir</button>
	    </form>
	<div class="social-message">
		<div class="line"></div>
		<p class="message">Arena Sport</p>
		<div class="line"></div>
	</div>
	
	
</div>


<?php
include("fonctions/connexion.php");
session_start();
if(isset($_POST['type']) && isset($_GET['email'])){
	$encrypted_mail = $_GET['email'];
	$decrypted_email = openssl_decrypt($encrypted_mail, "AES-128-ECB", "uiop5258");
	$type = $_POST['type'];
	$req1 = $bdd->prepare('insert into type_user (id_type,type) values(?,?)');
	$req1->execute(array($user['id_user'], $type ));
	$req = $bdd->prepare('UPDATE user SET id_type = ? WHERE email = ?');
	$req->execute(array($user['id_user'], $decrypted_email));
	echo"<div class='dialog-box bg-white' id='dialog' style='display:block'>
				<h2>Abonnement choisi✅</h2>
				<p>Vous avez choisi l'abonnement $type</p>
				<button aria-label='close' class='x' onclick='close_dialog()'>❌</button>
		</div>";
	session_unset();
	
	
}
echo "
<script>
    function close_dialog(){
        document.getElementById('dialog').style.display = 'none';
		window.location.href='login.php';
    }
</script>"
?>
    
</body>
</html>