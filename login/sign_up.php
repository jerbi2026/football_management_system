<?php
function generateRandomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet" href="dialog.css">
    <link rel="stylesheet" href="loader.css">

    
</head>
<body>
<div class="form-container">
	    <p class="title">Sign Up</p>
	    <form class="form" action="sign_up.php" method="post">
		    <div class="input-group">
			    <label for="username">Username</label>
			    <input type="text" name="username" id="username" placeholder="" required>
		    </div>
            <div class="input-group">
			    <label for="email">Email</label>
			    <input type="email" name="email" id="email" placeholder="" required>
		    </div>
		    <div class="input-group">
		    	<label for="password">Password</label>
			    <input type="password" name="password" id="password" placeholder="" required>
                
		    </div>
            <div class="input-group" style="margin-bottom:5%">
                <label for="repeat_password">Repeat Password</label>
		    	<input type="password" name="repeat_password" id="repeat_password" placeholder="" required>
            </div>
            
		    <button class="sign">Sign up</button>
	    </form>
	<div class="social-message">
		<div class="line"></div>
		<p class="message">Kram Sport</p>
		<div class="line"></div>
	</div>
	
	<p class="signup"> have an account?
		<a rel="noopener noreferrer" href="login.php" class="">Log in</a>
	</p>
</div>



<div class="socket" id="loader">
			<div class="gel center-gel">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c1 r1">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c2 r1">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c3 r1">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c4 r1">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c5 r1">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c6 r1">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			
			<div class="gel c7 r2">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			
			<div class="gel c8 r2">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c9 r2">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c10 r2">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c11 r2">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c12 r2">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c13 r2">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c14 r2">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c15 r2">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c16 r2">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c17 r2">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c18 r2">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c19 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c20 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c21 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c22 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c23 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c24 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c25 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c26 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c28 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c29 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c30 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c31 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c32 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c33 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c34 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c35 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c36 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c37 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			
		</div>
	

        <?php
include("fonctions/connexion.php");

if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['repeat_password'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];
    
    if($password == $repeat_password && strlen($password) >= 8 && strlen($password) <= 20){
        $req_check_email = $bdd->prepare("SELECT * FROM user WHERE email = ?");
        $req_check_email->execute(array($email));
        $email_exists = $req_check_email->rowCount();
        
        if($email_exists == 0) {
            $verification_code = generateRandomString();
            
          

            $req_temp_user = $bdd->prepare("INSERT INTO temp_users (username, email, password, verification_code) VALUES (?, ?, ?, ?)");
            $req_temp_user->execute(array($username, $email, $password, $verification_code));
            $encrypted_chaine = openssl_encrypt($email, "AES-128-ECB" ,"uiop5258");
            $encoded_email = urlencode($encrypted_chaine);
            echo "<script type='text/javascript'
            src='https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js'>
        </script>
        <script type='text/javascript'>
            (function(){
                emailjs.init({
                    publicKey: 'iQPAvdMoj37X1rb-t',
                });
            })();
    </script>";
            echo "<script>
            var verification_code = '$verification_code';
            var email = '$email'; 

            var templateParams = {
                destination: email,
                message: verification_code,
            };
            document.getElementById('loader').style.display = 'block';
            emailjs.send('service_7c8j1b9', 'template_84bvm6b', templateParams)
                .then((response) => {
                    console.log('SUCCESS!', response.status, response.text);
                    setTimeout(() => {
                        document.getElementById('loader').style.display = 'none';
                        window.location.href = 'verif_mail.php?email=$encoded_email';
                    }, 1000);
                })
                .catch((error) => {
                    console.error('Erreur lors de l\'envoi de l\'email:', error);
                });
            
        </script>";

            

            //header("Location: verif_mail.php?email=$encoded_email");
            exit();
        } else {
         
            echo"<div class='dialog-box bg-white' id='dialog' style='display:block'>
            <h2>Erreur⛔</h2>
            <p>Cet email est déjà associé à un compte. Veuillez en choisir un autre.</p>
            <button aria-label='close' class='x' onclick='close_dialog()'>❌</button>
        </div>";
        }
    } else {
       
        echo"<div class='dialog-box' id='dialog' style='display:block'>
        <h2>Erreur⛔</h2>
        <p>Verifier les mots de passes, il faut qu'ils soient solides et identiques</p>
        <button aria-label='close' class='x' onclick='close_dialog()'>❌</button>
    </div>";
    }
}
else{
    echo"<div class='dialog-box' id='dialog' style='display:block'>
    <h2>Warning⛔</h2>
    <p>Veuillez remplir tous les champs</p>
    <button aria-label='close' class='x' onclick='close_dialog()'>❌</button>
</div>";

}
echo "
<script>
    function close_dialog(){
        document.getElementById('dialog').style.display = 'none';
    }
</script>"
?>


  
</body>

</html>
