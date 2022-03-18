<?php

$conn = require '../../includes/db.php';

$cart = new Cart;

$auth = new Auth;

if (! isset($_SESSION['quantity']) && ! isset($_SESSION['price'])) {
    
    $_SESSION['quantity'] = [];
    $_SESSION['price'] = [];

} else {

    // Set product ids in Session to a variable 
    $cart_ids = isset($_SESSION['quantity']) ? $_SESSION['quantity'] : array();

    // Associative array of products in the cart
    $products = $cart->viewCart($conn, $_SESSION['quantity']);

    // The subtotal of items in the cart
    $subtotal = $cart->subtotal($_SESSION['quantity'], $_SESSION['price']);
}