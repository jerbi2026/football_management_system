<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="form.css">
	<link rel="stylesheet" href="dialog.css">
</head>
<body>
    <div class="form-container">
	    <p class="title">Login</p>
	    <form class="form" method="post">
		    <div class="input-group">
			    <label for="username">Username</label>
			    <input type="text" name="username" id="username" placeholder="">
		    </div>
		    <div class="input-group">
		    	<label for="password">Password</label>
			    <input type="password" name="password" id="password" placeholder="">
			    <div class="forgot">
				    <a rel="noopener noreferrer" href="find_mail.php">Forgot Password ?</a>
			    </div>
		    </div>
		    <button class="sign">Sign in</button>
	    </form>
	<div class="social-message">
		<div class="line"></div>
		<p class="message">Arena</p>
		<div class="line"></div>
	</div>
	
	<p class="signup">Don't have an account?
		<a rel="noopener noreferrer" href="sign_up.php" class="">Sign up</a>
	</p>
</div>

<?php
include("fonctions/connexion.php");
$session_duration = 900; 

session_set_cookie_params($session_duration);
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['email']) && isset($_SESSION['type'])) {
    if($_SESSION['type']=='admin'){
        header("Location: ../Admin/index.php");
    }
    if($_SESSION['type']=='freemuim'){
        header("Location: ../user_free/index.php");

    }
    if($_SESSION['type']=='premuim'){
        header("Location: ../user_premuim/index.php");

    }

   
    exit();
}

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $req = $bdd->prepare('SELECT u.*,tu.* FROM user u 
    inner join type_user tu
    on u.id_type = tu.id_type
     WHERE username = ?');
    $req->execute(array($username));
    $user = $req->fetch();
    if($user !== false){
        if(password_verify($password, $user['password'])){
            $encrypted_id = openssl_encrypt($user['id_user'], "AES-128-ECB" ,"uiop5258");
            setcookie('encrypted', $encrypted_id, time() + (86400 * 1), "/"); 
            
           
            $_SESSION['id'] = $encrypted_id;
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['type'] = $user['type'];
            if($user['type']=='freemuim'){
                echo"<div class='dialog-box bg-white' id='dialog' style='display:block'>
                <h2>Congrats✅ ! </h2>
                <p>You are now connected.</p>
                <button aria-label='close' class='x' onclick='close_dialog()'>❌</button>
               </div>";
			   header("Location: ../user_free/index.php");
            exit();

            }
            if($user['type']=='premuim'){
                echo"<div class='dialog-box bg-white' id='dialog' style='display:block'>
                <h2>Congrats✅ ! </h2>
                <p>You are now connected.</p>
                <button aria-label='close' class='x' onclick='close_dialog()'>❌</button>
               </div>";
			   header("Location: ../user_premuim/index.php");
            exit();

            }
            if($user['type']=='admin'){
                echo"<div class='dialog-box bg-white' id='dialog' style='display:block'>
                <h2>Congrats✅ ! </h2>
                <p>You are now connected.</p>
                <button aria-label='close' class='x' onclick='close_dialog()'>❌</button>
               </div>";
			   header("Location: ../Admin/index.php");
            exit();

            }
            
        } else {
            echo"<div class='dialog-box bg-white' id='dialog' style='display:block'>
                <h2>Erreur❌</h2>
                <p>Username ou password incorrect</p>
                <button aria-label='close' class='x' onclick='close_dialog()'>❌</button>
               </div>";
        }
    } else {
        echo"<div class='dialog-box bg-white' id='dialog' style='display:block'>
                <h2>Erreur❌</h2>
                <p>Username ou password incorrect</p>
                <button aria-label='close' class='x' onclick='close_dialog()'>❌</button>
               </div>";
    }
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