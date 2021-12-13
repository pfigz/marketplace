<?php
require '../../includes/init.php';
$auth = new Auth;
$order = new Order;

$products = $cart->viewCart($conn, $_SESSION['cart']);

if (isset($_SESSION['cart'])  && !empty($_SESSION['cart'])) {
    
    $order->createOrder($conn, $products);
   
}

?>

<?php require '../../includes/header.php' ?>

<?php echo "Your order has been placed"; ?>

<?php require '../../includes/footer.php' ?>