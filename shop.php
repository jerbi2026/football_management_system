<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="file.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="css/tiny-slider.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<title>Arena </title>
	</head>

	<body>

		<!-- Start Header/Navigation -->
		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<a class="navbar-brand" href="index.html">Arena<span>.</span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
				<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li class="nav-item  " >
							<a class="nav-link" href="index.php">Acceuil</a>
						</li>
						<li class="active"><a class="nav-link" href="shop.php">Boutique</a></li>
						<li ><a class="nav-link" href="stade.php">Nos stades</a></li>
						<li ><a class="nav-link" href="about.html">A propos</a></li>
						<li><a class="nav-link" href="contact.html">Nous contacter</a></li>
					</ul>

					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
						<li><a class="nav-link" href="login/login.php"><img src="images/user.svg"></a></li>
					</ul>
				</div>
			</div>
				
		</nav>
		<!-- End Header/Navigation -->

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Boutique</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		

		<div class="untree_co-section product-section before-footer-section">
		    <div class="container">
			<div class="row">
    <?php
      include('php_fonctions/connexion.php');
      try {
        // Récupère les trois premiers produits
        $requete = $bdd->query("SELECT * FROM produit");

        while ($produit = $requete->fetch()) {
          $encrypted_id_produit = openssl_encrypt($produit['id_produit'], "AES-128-ECB", "uiop5258");

          echo "<div class='col-12 col-md-4 col-lg-3 mb-5'>
                  <a class='product-item' href='produitdetails.php?id=" . $encrypted_id_produit . "'>
                    <img src='data:image/jpeg;base64," . base64_encode($produit['image']) . "' class='img-fluid product-thumbnail' alt='" . $produit['nom_produit'] . "'>
                    <h3 class='product-title'>" . $produit['nom_produit'] . "</h3>
                    <strong class='product-price'>" . $produit['prix_produit'] . " Dt</strong>
                    <span class='icon-cross'>
                      <a href='supprimer_produit.php?id=" . $encrypted_id_produit . "' onclick='return confirm(\"Voulez-vous vraiment supprimer ce produit ?\");'>
                        <img src='images/cross.svg' class='img-fluid'>
                      </a>
                    </span>
                  </a>
                </div>";
        }

        $requete->closeCursor();
      } catch (PDOException $e) {
        die("Erreur lors de la récupération des produits : " . $e->getMessage());
      }
    ?>
  </div>
		    </div>
		</div>


		<!-- Start Footer Section -->
		<footer class="footer-section">
			<div class="container relative">

				

				<div class="row">
					<div class="col-lg-8">
						<div class="subscription-form">
							<h3 class="d-flex align-items-center"><span class="me-1"><img src="images/envelope-outline.svg" alt="Image" class="img-fluid"></span><span>S'abonner à la newsletter</span></h3>

							<form action="#" class="row g-3">
								<div class="col-auto">
									<input type="text" class="form-control" placeholder="Votre nom ici">
								</div>
								<div class="col-auto">
									<input type="email" class="form-control" placeholder="Votre email ici">
								</div>
								<div class="col-auto">
									<button class="btn btn-primary">
										<span class="fa fa-paper-plane"></span>
									</button>
								</div>
							</form>

						</div>
					</div>
				</div>

				<div class="row g-5 mb-5">
					<div class="col-lg-4">
						<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Arena<span>.</span></a></div>
						<p class="mb-4">Rendez vos événements sportifs mémorables en louant nos stades de football de qualité supérieure et en découvrant notre sélection de maillots de collection. Notre engagement envers l'excellence et notre service client exceptionnel font de nous le choix idéal pour tous vos besoins en matière d'organisation d'événements sportifs. Faites confiance à notre expertise pour une expérience inoubliable sur et en dehors du terrain</p>

						<ul class="list-unstyled custom-social">
							<li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
						</ul>
					</div>

					<div class="col-lg-8">
						<div class="row links-wrap">
							

							

							

							
						</div>
					</div>

				</div>

				<div class="border-top copyright">
					<div class="row pt-4">
						<div class="col-lg-6">
							<p class="mb-2 text-center text-lg-start">Copyright Happy House Company &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed  by <a href="https://github.com/azizmhiri">Ahmed Aziz Mhiri</a>  Distributed By <a href="https://github.com/jerbi2026">Ahmed Jerbi</a> <!-- License information: https://untree.co/license/ -->
            </p>
						</div>

						

					</div>
				</div>

			</div>
		</footer>
		<!-- End Footer Section -->	


		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
		
		
	
	</body>

</html>
