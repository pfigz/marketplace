<?php

$conn = require '../../includes/db.php';

$cart = new Cart;

$auth = new Auth;

// Set product ids in Session to a variable 
$cart_ids = isset($_SESSION['quantity']) ? $_SESSION['quantity'] : array();

// Associative array of products in the cart
$products = $cart->viewCart($conn, $_SESSION['quantity']);

// The subtotal of items in the cart
$subtotal = $cart->subtotal($_SESSION['quantity'], $_SESSION['price']);
