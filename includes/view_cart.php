<?php
// Database connection
$conn = require 'db.php';

$cart = new Cart;
// Set product ids in Session to a variable
$cart_ids = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
// Associative array of products in the cart
$products = $cart->viewCart($conn, $_SESSION['cart']);
// The subtotal of items in the cart
$subtotal = $cart->subtotal($_SESSION['cart'], $_SESSION['price']);


