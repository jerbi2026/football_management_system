<body style="display:flex; align-items:center ; justify-content: center; text-align: center;">
<?php
session_start();
include('php_fonctions/connexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_COOKIE['encrypted'])) {
        $encrypted_id = $_COOKIE['encrypted'];
        $decrypted_id = openssl_decrypt($encrypted_id, "AES-128-ECB", "uiop5258");

        try {
            $requete = $bdd->prepare("SELECT * FROM user WHERE id_user = ?");
            $requete->execute(array($decrypted_id));

            if ($requete->rowCount() > 0) {
                $user = $requete->fetch();
            } else {
                header("Location: ../login/login.php");
            }
            $userId = $user['id_user'];
            $requete->closeCursor();
        } catch (PDOException $e) {
            die("Erreur lors de la récupération de l'utilisateur : " . $e->getMessage());
        }
    } else {
        echo "Cookie d'identifiant non trouvé.";
        header("Location: ../login/login.php");
    }

    $address = $_POST['address'];
    $paymentType = $_POST['payment-type'];
    $couponCode = $_POST['coupon_code'];
    $discount = $_POST['discount'];
    $totalPriceAfterDiscount = $_POST['total_price_after_discount'];
    

    $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
    $userCart = isset($cart[$userId]) ? $cart[$userId] : [];

    if (!empty($userCart)) {
        try {
            $bdd->beginTransaction();

            $totalPrice = 0;
            $placeholders = rtrim(str_repeat('?,', count($userCart)), ',');
            $sql = "SELECT * FROM produit WHERE id_produit IN ($placeholders)";
            $stmt = $bdd->prepare($sql);
            $stmt->execute(array_keys($userCart));
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($products as $product) {
                $quantity = $userCart[$product['id_produit']];
                if ($quantity > $product['quantite']) {
                    throw new Exception('Not enough stock for product ' . $product['nom_produit']);
                }

                $total = $product['prix_produit'] * $quantity;
                $totalPrice += $total;

                $updateSql = "UPDATE produit SET quantite = quantite - ? WHERE id_produit = ?";
                $updateStmt = $bdd->prepare($updateSql);
                $updateStmt->execute([$quantity, $product['id_produit']]);
            }

            if ($couponCode) {
                $couponStmt = $bdd->prepare("SELECT * FROM coupon WHERE code_coupon = ?");
                $couponStmt->execute([$couponCode]);
                $coupon = $couponStmt->fetch(PDO::FETCH_ASSOC);

                if ($coupon) {
                    $discount = $totalPrice * ($coupon['remise'] / 100);
                    $totalPrice -= $discount;

                    $deleteCouponStmt = $bdd->prepare("DELETE FROM coupon WHERE code_coupon = ?");
                    $deleteCouponStmt->execute([$couponCode]);
                }
            }

            $orderStmt = $bdd->prepare("INSERT INTO commande (user_id, adresse, payment_type, total_price, discount, coupon_code) VALUES (?, ?, ?, ?, ?, ?)");
            $orderStmt->execute([$userId, $address, $paymentType, $totalPrice, $discount, $couponCode]);

            $orderId = $bdd->lastInsertId();

            $orderProductStmt = $bdd->prepare("INSERT INTO commande_produit (commande_id, produit_id, quantite) VALUES (?, ?, ?)");
            foreach ($products as $product) {
                $quantity = $userCart[$product['id_produit']];
                $orderProductStmt->execute([$orderId, $product['id_produit'], $quantity]);
            }
            $bdd->commit();

            unset($cart[$userId]);
            setcookie('cart', '', time() - 3600, '/');

            echo "<h2>Commande</h2>";
            echo "<p>Address: $address</p>";
            echo "<p>Payment Type: $paymentType</p>";
            echo "<p>Total Price: $totalPrice DNT</p>";
            echo "<p>Discount: $discount DNT</p>";
            echo "<p>Total Price After Discount: " . ($totalPrice - $discount) . " DNT</p>";

        } catch (Exception $e) {
            $bdd->rollBack();
            echo "Failed: " . $e->getMessage();
        }
    } else {
        echo "Your cart is empty";
    }
}

?>

<button type="button" class="btn btn-secondary" onclick="window.print()">Print</button>
<a href="index.php" class="btn btn-warning">Return to Shop</a>

</body>