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

?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kram foot | panier </title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/ball-football.png" />
  <link rel="stylesheet" href="assets/css/styles.min.css" />
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
  <link rel="stylesheet" href="assets/css/cart.css">
  

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
      <!--  Header End -->
      <div class="container-fluid">
      <div class="container px-3 my-5 clearfix">
  <!-- Shopping cart table -->
  <div class="card">
    <div class="card-header">
      <h2>Shopping Cart</h2>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered m-0">
          <thead>
            <tr>
              <th class="text-center py-3 px-4" style="min-width: 400px;">Product Name &amp; Details</th>
              <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
              <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
              <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
              <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#" class="shop-tooltip float-none text-light" title="Clear cart"><i class="ion-md-trash"></i></a></th>
            </tr>
          </thead>
          <tbody>
        <?php
$userId = $user['id_user']; // Assuming userId is stored in the session

// Fetch the cart from the cookie
$cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
$userCart = isset($cart[$userId]) ? $cart[$userId] : [];
$totalPrice = 0;

if (!empty($userCart)) {
    $placeholders = rtrim(str_repeat('?,', count($userCart)), ',');
    $sql = "SELECT * FROM produit WHERE id_produit IN ($placeholders)";
    $stmt = $bdd->prepare($sql);
    $stmt->execute(array_keys($userCart));
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($products as $product) {
        $quantity = $userCart[$product['id_produit']];
        $total = $product['prix_produit'] * $quantity;
        $totalPrice += $total;

        echo "<tr data-product-id='" . $product['id_produit'] . "'>
                <td class='p-4'>
                  <div class='media align-items-center'>
                    <img src='data:image/jpeg;base64," . base64_encode($product['image']) . "' class='d-block ui-w-40 ui-bordered mr-4' alt='" . $product['nom_produit'] . "'>
                    <div class='media-body'>
                      <a href='#' class='d-block text-dark'>" . $product['nom_produit'] . "</a>";

        // Add specific options based on product type
        if ($product['id_categorie'] === 1) {
            echo "<small>
                    <span class='text-muted'>Size:</span>
                    <select class='form-control product-size' data-product-id='" . $product['id_produit'] . "'>
                      <option value='S'>S</option>
                      <option value='M'>M</option>
                      <option value='L'>L</option>
                      <option value='XL'>XL</option>
                    </select>
                  </small>";
        } elseif ($product['id_categorie'] === 3) {
            echo "<small>
                    <span class='text-muted'>Size:</span>
                    <select class='form-control product-size' data-product-id='" . $product['id_produit'] . "'>
                      <option value='36'>36</option>
                      <option value='37'>37</option>
                      <option value='38'>38</option>
                      <option value='39'>39</option>
                      <option value='40'>40</option>
                      <option value='41'>41</option>
                      <option value='42'>42</option>
                      <option value='43'>43</option>
                      <option value='44'>44</option>
                      <option value='45'>45</option>
                    </select>
                  </small>";
        }

        // Hidden input for selected size
        echo "<input type='hidden' name='product_sizes[" . $product['id_produit'] . "]' class='product-size-input' data-product-id='" . $product['id_produit'] . "'>";

        echo "  </div>
                </div>
              </td>
              <td class='text-right font-weight-semibold align-middle p-4'>" . $product['prix_produit'] . "DNT</td>
              <td class='align-middle p-4'><input type='number' class='form-control text-center quantity' value='" . $quantity . "' min='1' max='" . $product['quantite'] . "'></td>
              <td class='text-right font-weight-semibold align-middle p-4 total'>" . $total . "DNT</td>
              <td class='text-center align-middle px-0'><a href='#' class='shop-tooltip close float-none text-danger' title='Remove' onclick='removeFromCart(" . $product['id_produit'] . ", \"" . $userId . "\")'>×</a></td>
            </tr>";
    }
} else {
    echo "<tr><td colspan='5' class='text-center'>Your cart is empty</td></tr>";
}
?>

          </tbody>
        </table>
      </div>
     
     

      <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
    <div class="mt-4">
        <label class="text-muted font-weight-normal">Promocode</label>
        <input type="text" id="coupon_code" name="coupon_code" placeholder="ABC" class="form-control">
    </div>
    <?php
    $discount = 0;
    $totalPriceAfterDiscount = $totalPrice;
    ?>
    <div class="d-flex">
        <div class="text-right mt-4" style="margin-right:5%">
            <label class="text-muted font-weight-normal m-0">Discount</label>
            <div class="text-large"><strong id="discount">0 DNT</strong></div>
        </div>
        <div class="text-right mt-4">
            <label class="text-muted font-weight-normal m-0">Total price after discount</label>
            <div class="text-large"><strong id="total_price_after_discount"><?php echo $totalPrice; ?> DNT</strong></div>
        </div>
    </div>
    
</div>

      <div class="float-right">
        <button type="button" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3" onclick="location.href='boutique.php'">Back to shopping</button>
        <button type="button" class="btn btn-lg btn-warning mt-2" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">Checkout</button>
      </div>
    </div>
  </div>
</div>


<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Checkout</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <form id="checkout-form">
      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address" required>
      </div>
      <div class="mb-3">
        <label for="payment-type" class="form-label">Payment Type</label>
        <select class="form-select" id="payment-type" name="payment-type" required>
          <option value="">Select payment type</option>
          <option value="delivery">Delivery</option>
          <option value="online">Online Payment</option>
        </select>
      </div>
      <button type="submit" class="btn btn-warning">Submit</button>
    </form>
  </div>
</div>

      
  </div>
</div>

<!-- Add Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>

        
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
  <script src="assets/js/cart.js"></script>
  <script>
    function updateTotalWithCoupon() {
        var couponCode = document.getElementById('coupon_code').value;
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var coupon = JSON.parse(xhr.responseText);
                    if (coupon) {
                        // Utiliser les bonnes variables pour le discount et le total après la remise
                        var discount = <?php echo $totalPrice; ?> * (coupon.remise / 100);
                        var totalPriceAfterDiscount = <?php echo $totalPrice; ?> - discount;
                        document.getElementById('discount').textContent = discount + ' DNT';
                        document.getElementById('total_price_after_discount').textContent = totalPriceAfterDiscount + ' DNT';
                    } else {
                        document.getElementById('discount').textContent = '0 DNT';
                        document.getElementById('total_price_after_discount').textContent = '<?php echo $totalPrice; ?> DNT';
                    }
                }
            }
        };
        xhr.open('GET', 'check_coupon.php?coupon_code=' + encodeURIComponent(couponCode), true);
        xhr.send();
    }

    // Ajouter un gestionnaire d'événement pour détecter les changements dans l'entrée du code promo
    document.getElementById('coupon_code').addEventListener('input', updateTotalWithCoupon);
</script>

  
<script>
   document.getElementById('checkout-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Empêcher le comportement par défaut du formulaire

    // Remplir les champs cachés avec les tailles sélectionnées
    document.querySelectorAll('.product-size').forEach(function(select) {
        var productId = select.getAttribute('data-product-id');
        var selectedSize = select.value;
        document.querySelector("input.product-size-input[data-product-id='" + productId + "']").value = selectedSize;
    });

    var formData = new FormData(this);

    // Ajoutez les données couponCode, discount et totalPriceAfterDiscount
    formData.append('coupon_code', document.getElementById('coupon_code').value);
    formData.append('discount', <?php echo $discount; ?>);
    formData.append('total_price_after_discount', <?php echo $totalPriceAfterDiscount; ?>);

    fetch('checkout.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        document.body.innerHTML = data; // Afficher la réponse du serveur
    })
    .catch(error => console.error('Error:', error));
});


</script>

<script>
    document.querySelectorAll('.product-size').forEach(function(select) {
    select.addEventListener('change', function() {
        var productId = select.getAttribute('data-product-id');
        var selectedSize = select.value;
        document.querySelector("input.product-size-input[data-product-id='" + productId + "']").value = selectedSize;
    });
});


document.querySelector('form').addEventListener('submit', function(event) {
    var productIds = [];
    var productSizes = {};

    document.querySelectorAll('.product-size-input').forEach(function(input) {
        var productId = input.getAttribute('data-product-id');
        var size = input.value;
        productIds.push(productId);
        productSizes[productId] = size;
    });

    document.getElementById('product_ids').value = JSON.stringify(productIds);
    document.getElementById('product_sizes').value = JSON.stringify(productSizes);
});
</script>
</body>

</html>