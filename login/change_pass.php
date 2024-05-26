<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changer password</title>
    <link rel="stylesheet" href="form.css">
	<link rel="stylesheet" href="dialog.css">
</head>
<body>
<div class="form-container">
	    <p class="title">Changer Passowrd</p>
	    <form class="form" method="post">
            <div class="input-group" >
			    <label for="pass">Password</label>
			    <input type="password" name="pass" id="pass" placeholder="" required>
		    </div>
		    <div class="input-group" style="margin-bottom:5%">
			    <label for="pass2">Repeat Password</label>
			    <input type="password" name="pass2" id="pass2" placeholder="" required>
		    </div>
            
		    <button class="sign">Changer</button>
	    </form>
	<div class="social-message">
		<div class="line"></div>
		<p class="message">Kram Sport</p>
		<div class="line"></div>
	</div>
	
	
</div>

<?php
include("fonctions/connexion.php");
if(isset($_POST['pass']) && isset($_POST['pass2']) && isset($_GET['email'])){
	$encrypted_mail = $_GET['email'];
	$decrypted_email = openssl_decrypt($encrypted_mail, "AES-128-ECB", "uiop5258");
	$pass = $_POST['pass'];
	$pass2 = $_POST['pass2'];
	if($pass == $pass2){
		$hashedPassword = password_hash($pass, PASSWORD_DEFAULT); 
		$req = $bdd->prepare('UPDATE user SET password = ? WHERE email = ?');
		$req->execute(array($hashedPassword, $decrypted_email));
		echo"<div class='dialog-box bg-white' id='dialog' style='display:block'>
				<h2>Password changé✅</h2>
				<p>Votre password a été changé avec succés</p>
				<button aria-label='close' class='x' onclick='close_dialog()'>❌</button>
			   </div>";
	}else{
		echo"<div class='dialog-box bg-white' id='dialog' style='display:block'>
				<h2>Password non identique❌</h2>
				<p>Les deux passwords ne sont pas identiques</p>
				<button aria-label='close' class='x' onclick='close_dialog()'>❌</button>
			   </div>";
	
	}
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