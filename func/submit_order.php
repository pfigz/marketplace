<?php

require '../includes/init.php';

$conn = require '../includes/db.php';
$auth = new Auth;
$order = new Order;
$cart = new Cart;

$products = $cart->viewCart($conn, $_SESSION['quantity']);

if (isset($_SESSION['quantity'])  && !empty($_SESSION['quantity'])) {
    
    $order->submitOrder();
   
}

?>

<?php require '../includes/header.php' ?>

<?php echo "Your order has been placed"; ?>

<?php require '../includes/footer.php' ?>