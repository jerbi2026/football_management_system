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

if(isset($_GET['id'])){
    $decrypted_tournois = openssl_decrypt($_GET['id'], "AES-128-ECB", "uiop5258");
    try {
        $requete = $bdd->prepare("SELECT * FROM tournois WHERE id_tournoi = ?");
        $requete->execute(array($decrypted_tournois));
        
        if($requete->rowCount() > 0) {
            $tournoi = $requete->fetch();
            
            
        } else {
           header("Location : ../login/login.php ");
        }
        $requete->closeCursor();
    } catch (PDOException $e) {
        die("Erreur lors de la récupération de l'utilisateur : " . $e->getMessage());
    }

}
else {
    echo "Url not found.";
    header("Location : ../login/login.php ");
}



?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kram foot | tournoi : <?php echo  $tournoi['nom_tournoi']  ?></title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/ball-football.png" />
  <link rel="stylesheet" href="assets/css/styles.min.css" />
  
</head>

<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <aside class="left-sidebar">
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="index.php" class="text-nowrap logo-img">
            <img src="../assets/images/logo2.png" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="index.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Home</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Nos services</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="terrains.php"  aria-expanded="false">
                <span>
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-building-stadium"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-8 0a8 2 0 1 0 16 0a8 2 0 1 0 -16 0" /><path d="M4 12v7c0 .94 2.51 1.785 6 2v-3h4v3c3.435 -.225 6 -1.07 6 -2v-7" /><path d="M15 6h4v-3h-4v7" /><path d="M7 6h4v-3h-4v7" /></svg>
                </span>
                <span class="hide-menu">Terrains</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link"  href="tournois_view.php" aria-expanded="false">
                <span>
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-tournament"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 4m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M20 10m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M4 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M4 20m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M6 12h3a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-3" /><path d="M6 4h7a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-2" /><path d="M14 10h4" /></svg>
                </span>
                <span class="hide-menu">Tournois</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="news.php" aria-expanded="false">
                <span>
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-news"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" /><path d="M8 8l4 0" /><path d="M8 12l4 0" /><path d="M8 16l4 0" /></svg>
                </span>
                <span class="hide-menu">News</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="boutique.php" aria-expanded="false">
                <span>
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-shirt-sport"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 4l6 2v5h-3v8a1 1 0 0 1 -1 1h-10a1 1 0 0 1 -1 -1v-8h-3v-5l6 -2a3 3 0 0 0 6 0" /><path d="M10.5 11h2.5l-1.5 5" /></svg>
                </span>
                <span class="hide-menu">Boutique</span>
              </a>
            </li>
            
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Application</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="reservations.php"  aria-expanded="false">
                <span>
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-pencil"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /></svg>
                </span>
                <span class="hide-menu">Reservations</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="chatroom.php" aria-expanded="false">
                <span>
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-messages"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M21 14l-3 -3h-7a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1h9a1 1 0 0 1 1 1v10" /><path d="M14 15v2a1 1 0 0 1 -1 1h-7l-3 3v-10a1 1 0 0 1 1 -1h2" /></svg>
                </span>
                <span class="hide-menu">Chatroom</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="notification.php" aria-expanded="false">
                <span>
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-bell"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
                </span>
                <span class="hide-menu">Notification</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="settings.php"  aria-expanded="false">
                <span>
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-settings"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" /><path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /></svg>
                </span>
                <span class="hide-menu">Settings</span>
              </a>
            </li>
            
            <li class="sidebar-item">
              <a class="sidebar-link" href="report.php" aria-expanded="false">
                <span>
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-report"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697" /><path d="M18 14v4h4" /><path d="M18 11v-4a2 2 0 0 0 -2 -2h-2" /><path d="M8 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M8 11h4" /><path d="M8 15h3" /></svg>
                </span>
                <span class="hide-menu">Report</span>
              </a>
            </li>
            
          </ul>
          
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="notification.php">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-warning rounded-circle"></div>
              </a>
            </li>
            <li class="nav-item">
              <a href="chatroom.php" class="nav-link nav-icon-hover" >
                <i class="ti ti-messages"></i>
                <div class="notification bg-warning rounded-circle"></div>
              </a>
            </li>
            <li class="nav-item">
              <a href="panier.php" class="nav-link nav-icon-hover" >
                <i class="ti ti-basket"></i>
                <div class="notification bg-warning rounded-circle"></div>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <?php
                     if (!is_null($user['image'])) {
                      echo "<img src='data:image/jpeg;base64," . base64_encode($user['image']) . "' alt='' width='35' height='35' class='rounded-circle'>";
                  } else {
                      echo "<img src='assets/images/profile/user-1.jpg' alt='' width='35' height='35' class='rounded-circle'>";
                  }
                  
                  ?>
                 
                 
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-report"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697" /><path d="M18 14v4h4" /><path d="M18 11v-4a2 2 0 0 0 -2 -2h-2" /><path d="M8 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M8 11h4" /><path d="M8 15h3" /></svg>
                      <p class="mb-0 fs-3">Report</p>
                    </a>
                    
                    <a class="btn btn-outline-warning mx-3 mt-2 d-block" href="../index.html">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h1><?php echo $tournoi['nom_tournoi'] ?></h1>
                <p><?php echo $tournoi['description'] ?></p>
                <p>Date debut : <?php echo $tournoi['date_debut'] ?></p>
                <p>Date fin : <?php echo $tournoi['date_fin'] ?></p>
                <p>Nombre d'équipes: <?php echo $tournoi['nb_equipe'] ?></p>
                <p>Nombre de places restantes: <?php echo $tournoi['nb_equipe_restant'] ?></p>
                <p>Frais de participations par équipe: <?php echo $tournoi['prix'] ?> DNT</p>
            </div>
            <div class="col" >
            <?php
$date_fin_tournoi = new DateTime($tournoi['date_fin']);

$date_actuelle = new DateTime();

$diff = $date_actuelle->diff($date_fin_tournoi)->days;

if ($diff <= 3 && $tournoi['nb_equipe_restant']>0) {
    ?>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nom_equipe" class="form-label">Nom d'équipe</label>
            <input type="text" class="form-control" id="nom_equipe" name="nom_equipe" aria-describedby="nomhelp" required>
            <div id="nomhelp" class="form-text">Veuillez choisir un nom pour votre équipe</div>
        </div>
        <div class="mb-3">
            <label for="Logo" class="form-label">Logo</label>
            <input type="file" class="form-control" id="Logo" name="Logo" required aria-describedby="logohelp">
            <div id="logohelp" class="form-text">Veuillez choisir un logo dont la taille est inférieure à 64ko</div>
        </div>

        <button type="submit" name="submit" class="btn btn-warning m-1">Participer</button>
    </form>
    <?php
} else {
    echo "<p>Le formulaire n'est pas disponible pour le moment.</p>";
}
?>

<?php

 if (isset($_FILES['Logo']) && $_FILES['Logo']['error'] === UPLOAD_ERR_OK && isset($_POST['nom_equipe'])) {
    $logo_data = file_get_contents($_FILES['Logo']['tmp_name']);
    if ($logo_data !== false) {
        $stmt_check = $bdd->prepare("SELECT id_participant FROM temp_participant WHERE id_participant = :participant and id_tournois = :id_tournoi");
        $stmt_check->bindParam(':participant', $user['id_user']);
        $stmt_check->bindParam(':id_tournoi',  $tournoi['id_tournoi']);
        $stmt_check->execute();
        $participant_exists = $stmt_check->fetchColumn();

        if ($participant_exists) {
            echo "<div class='alert alert-danger' role='alert'>Vous avez déjà participé à ce tournoi.</div>";
        } else {
        try {
            $stmt_insert = $bdd->prepare("INSERT INTO temp_participant (id_participant, nom_equipe, id_tournois, logo_equipe) VALUES (:participant, :nom_equipe, :tournois, :logo_blob)");
            $stmt_insert->bindParam(':participant', $user['id_user']);
            $stmt_insert->bindParam(':nom_equipe', $_POST['nom_equipe']);
            $stmt_insert->bindParam(':logo_blob', $logo_data, PDO::PARAM_LOB);
            $stmt_insert->bindParam(':tournois', $tournoi['id_tournoi']);
            $stmt_insert->execute();
            echo "<div class='alert alert-success' role='alert'>L'équipe \"" . $_POST['nom_equipe'] . "\" a été enregistrée avec succès, mais n'est pas encore validée.</div>";
            exit();
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger' role='alert'>Erreur lors de l'enregistrement de l'équipe : " . $e->getMessage() . "</div>";
            exit();
        }
    }
} else {
        echo "<div class='alert alert-danger' role='alert'>Une erreur s'est produite lors de la lecture du fichier de logo.</div>";
        exit();
}
}      

   
?>




           
                
            
        </div>


        </div>
        <div class="row">
            
            <p>Lieu :</p>
        <?php
             try {
                $requete = $bdd->prepare("SELECT * FROM terrain WHERE id_terrain = ?");
                $requete->execute(array($tournoi['id_terrain']));
                
                if($requete->rowCount() > 0) {
                    $terrain = $requete->fetch();
                    echo "<div class='col-sm-6 col-xl-3'>
              <div class='card overflow-hidden rounded-2'>
                <div class='position-relative'>
                  <a href='javascript:void(0)'><img src='data:image/jpeg;base64," . base64_encode($terrain['image']) . "' alt='" . $terrain['nom_terrain'] . "' /></a>
                </div>
                <div class='card-body pt-3 p-4'>
                  <h6 class='fw-semibold fs-4'>" . $terrain['nom_terrain'] . "</h6>
                  
                </div>
              </div>
            </div>";
                    
                    
                } 
                $requete->closeCursor();
            } catch (PDOException $e) {
                die("Erreur lors de la récupération de l'utilisateur : " . $e->getMessage());
            }
            
            ?>
            <div class="col">
              <?php
              try {
                $requete = $bdd->prepare("SELECT * FROM participant WHERE id_tournoi = ?");
                $requete->execute(array($tournoi['id_tournoi']));
                
                if($requete->rowCount() > 0) {
                  echo "<p>Participant : </p>";
                    $participant = $requete->fetch();
                    
                    echo " <table class='table table-striped table-dark'>
                    <thead>
                      <tr>
                        <th scope='col'>Logo equipe</th>
                        <th scope='col'>Nom equipe</th>
                      </tr>
                    </thead>
                    <tbody>";
            echo"<tr>
            <th scope='row'><img src='data:image/jpeg;base64," . base64_encode($participant['logo_equipe']) . "' alt='" . $participant['nom_equipe'] . "'class='rounded img-fluid' height='50' width='50' /></th>
            <td>" . $participant['nom_equipe'] . "</td>
            
          </tr>";

            echo "</tbody>
            </table>";
                    
                    
                } 
                $requete->closeCursor();
            } catch (PDOException $e) {
                die("Erreur lors de la récupération de l'utilisateur : " . $e->getMessage());
            }

               
               ?>

            </div>
           
   
            
        

        </div>
       
        
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Design and Developed by <a href="https://jerbi-portfolio.netlify.app/" target="_blank" class="pe-1 text-warning text-decoration-underline">Jerbi Ahmed</a></p>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/sidebarmenu.js"></script>
  <script src="assets/js/app.min.js"></script>

  <script src="assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="assets/js/dashboard.js"></script>
</body>

</html>