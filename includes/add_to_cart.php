<?php

$conn = require 'db.php';

$cart = new Cart;

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $product = $cart->addToCart($conn, $_POST['productID']);

    if (isset($_POST['productID'], $_POST['quantity'], $_POST['price']) && is_numeric($_POST['productID']) && is_numeric($_POST['price'])) {

        $productID = (int)$_POST['productID'];
        $quantity = (int)$_POST['quantity'];
        $price = (float)$_POST['price'];

        if ($product && $quantity > 0) {
                    
            if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        
                if (array_key_exists($productID, $_SESSION['cart'])) {
                    $_SESSION['cart'][$productID] += $quantity;
                } else {
                    $_SESSION['cart'][$productID] = $quantity;
                    $_SESSION['price'][$productID] = $price;
                }
        
            } else {
                $_SESSION['cart'] = array($productID => $quantity);
                $_SESSION['price'] = array($productID => $price); 
            }
        } 
    }
}

