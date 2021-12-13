<?php

require 'includes/init.php';

$conn = require 'includes/db.php';

$auth = new Auth;

$url = new Url;

$cart = new Cart;

if (isset($_GET['productID']) && is_numeric($_GET['productID']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['productID']])) {
    
    $cart->remove();

    $url->redirect('/marketplace/public/views/cart.php');

}






