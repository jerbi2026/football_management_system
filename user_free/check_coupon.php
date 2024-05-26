<?php
include('php_fonctions/connexion.php');
if(isset($_GET['coupon_code'])) {
    $couponCode = $_GET['coupon_code'];
    $sql = "SELECT * FROM coupon WHERE code_coupon = :couponCode";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':couponCode', $couponCode);
    $stmt->execute();
    $coupon = $stmt->fetch(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($coupon);
} else {
    header('HTTP/1.1 400 Bad Request');
    echo 'Code coupon non fourni';
}
?>