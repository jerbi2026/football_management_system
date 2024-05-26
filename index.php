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
						<li class="nav-item active " >
							<a class="nav-link" href="index.php">Acceuil</a>
						</li>
						<li><a class="nav-link" href="shop.php">Boutique</a></li>
						<li><a class="nav-link" href="stade.php">Nos stades</a></li>
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
								<h1>Stades d'exception <span clsas="d-block">moments inoubliables !</span></h1>
								<p class="mb-4">Découvrez nos stades d'exception, conçus pour offrir des expériences uniques et inoubliables. Que vous organisiez un événement sportif nos infrastructures de qualité vous garantissent un cadre idéal pour créer des souvenirs mémorable</p>
								<p><a href="shop.html" class="btn btn-secondary me-2">Acheter maintenant</a><a href="#shop" class="btn btn-white-outline">Explorer</a></p>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="hero-img-wrap">
								<img src="images/slider.png" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		<!-- Start Product Section -->
		<div class="product-section" id="shop">
			<div class="container">
			<div class="row">
    <?php
      include('php_fonctions/connexion.php');
      try {
        // Récupère les trois premiers produits
        $requete = $bdd->query("SELECT * FROM produit limit 4");

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
		<!-- End Product Section -->

		<!-- Start Why Choose Us Section -->
		<div class="why-choose-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-6">
						<h2 class="section-title">Raisonner pour notre sélection</h2>
						<p>Découvrez l'excellence à tous les niveaux avec notre site de location de stades de football. Nous offrons non seulement des installations de premier ordre pour vos événements sportifs, mais également une sélection exclusive de maillots de anciens joueurs de football. Nos stades sont conçus pour offrir une expérience incomparable, alliant confort, sécurité et performance</p>

						<div class="row my-5">
							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/icone/stade.png" alt="Image" class="imf-fluid">
									</div>
									<h3>Stades de qualité</h3>
									<p>Nos stades de football offrent des installations modernes et de haute qualité, garantissant une expérience sportive exceptionnelle pour tous les participants</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/icone/maillot.png" alt="Image" class="imf-fluid">
									</div>
									<h3>Maillots de collection</h3>
									<p>Explorez notre sélection exclusive de maillots de légende, témoins d'une histoire riche en exploits et en émotions, pour les passionnés de football et les collectionneurs les plus exigeants</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/icone/experience.png" alt="Image" class="imf-fluid">
									</div>
									<h3>Expérience unique</h3>
									<p>Vivez une expérience unique en louant nos stades de football et en découvrant nos maillots de collection, pour des moments inoubliables sur et en dehors du terrain</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/icone/support.png" alt="Image" class="imf-fluid">
									</div>
									<h3>Service client exceptionnel </h3>
									<p>Notre équipe dévouée est là pour vous offrir un service client exceptionnel, répondant à tous vos besoins et vous garantissant une expérience fluide et agréable</p>
								</div>
							</div>

						</div>
					</div>

					<div class="col-lg-5">
						<div class="img-wrap">
							<img src="images/cr7.jpg" alt="Image" class="img-fluid">
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- End Why Choose Us Section -->

		
		

		<!-- Start Popular Product -->
		<div class="popular-product">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
						<div class="product-item-sm d-flex">
							<div class="thumbnail">
								<img src="images/p4.png" alt="Image" class="img-fluid">
							</div>
							<div class="pt-3">
								<h3>Arsenal</h3>
								<p>76.00DT</p>
								<a href="shop.html"><p>Acheter maintenant</p></a>
								
							</div>
						</div>
					</div>

					<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
						<div class="product-item-sm d-flex">
							<div class="thumbnail">
								<img src="images/p5.png" alt="Image" class="img-fluid">
							</div>
							<div class="pt-3">
								<h3>Bayern Munich</h3>
								<p>80.00Dt</p>
								<a href="shop.html"><p>Acheter maintenant</p></a>
								
							</div>
						</div>
					</div>

					<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
						<div class="product-item-sm d-flex">
							<div class="thumbnail">
								<img src="images/p6.png" alt="Image" class="img-fluid">
							</div>
							<div class="pt-3">
								<h3>Borussia Dortmund</h3>
								<p>69.00Dt</p>
								<a href="shop.html"><p>Acheter maintenant</p></a>
								
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- End Popular Product -->

		<!-- Start Testimonial Slider -->
		<div class="testimonial-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 mx-auto text-center">
						<h2 class="section-title">
							Témoignages</h2>
					</div>
				</div>

				<div class="row justify-content-center">
					<div class="col-lg-12">
						<div class="testimonial-slider-wrap text-center">

							<div id="testimonial-nav">
								<span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
								<span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
							</div>

							<div class="testimonial-slider">
								
								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
												<blockquote class="mb-5">
													<p>&ldquo;En tant que collectionneur de maillots de football, j'ai été ravi de découvrir la sélection proposée par ce site. J'ai pu ajouter des pièces rares à ma collection, le tout dans une expérience de navigation simple et agréable.&rdquo;</p>
												</blockquote>

												<div class="author-info">
													<div class="author-pic">
														<img src="images/aziz.jpg" alt="Ahmed" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">Ahmed Aziz Mhiri</h3>
													
												</div>
											</div>

										</div>
									</div>
								</div> 
								<!-- END item -->

								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
												<blockquote class="mb-5">
													<p>&ldquo;"Le service client était exceptionnel. J'ai eu quelques questions sur la location du stade et j'ai été très bien conseillé. L'équipe était très réactive et professionnelle.&rdquo;</p>
												</blockquote>

												<div class="author-info">
													<div class="author-pic">
														<img src="images/jerbi.jpg" alt="jerbi" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">Ahmed Jerbi</h3>
													
												</div>
											</div>

										</div>
									</div>
								</div> 
								<!-- END item -->

								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
												<blockquote class="mb-5">
													<p>&ldquo;J'ai loué un stade pour organiser un tournoi de football amateur avec des amis. L'expérience a été incroyable, le stade était en parfait état et l'équipement fourni était de grande qualité. Nous avons également pu acheter des maillots de joueurs légendaires, ce qui a ajouté une touche spéciale à notre événement. Je recommande vivement ce site pour toutes vos activités sportives !&rdquo;</p>
												</blockquote>

												<div class="author-info">
													<div class="author-pic">
														<img src="images/rami.jpg" alt="Rami" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">Rami Zairi</h3>
													
												</div>
											</div>

										</div>
									</div>
								</div> 
								<!-- END item -->

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Testimonial Slider -->

		

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

					

				</div>

				<div class="border-top copyright">
					<div class="row pt-4">
						<div class="col-lg-6">
							<p class="mb-2 text-center text-lg-start">Copyright Happy House Company &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed by <a href="https://github.com/azizmhiri">Ahmed Aziz Mhiri</a> Distributed By <a href="https://github.com/jerbi2026">Ahmed Jerbi</a>  <!-- License information: https://untree.co/license/ -->
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
