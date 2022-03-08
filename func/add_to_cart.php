<?php

$conn = require '../../includes/db.php';

$cart = new Cart;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // var_dump($_POST);
    // exit;

    $product = $cart->addToCart($conn, $_POST['productID']);

    if (isset($_POST['quantity'], $_POST['productID'], $_POST['price']) && is_numeric($_POST['productID']) && is_numeric($_POST['price'])) {

        $productID = (int)$_POST['productID'];
        $quantity = (int)$_POST['quantity'];
        $price = (float)$_POST['price'];

        if ($product && $quantity > 0) {
                    
            if (isset($_SESSION['quantity']) && is_array($_SESSION['quantity'])) {
        
                if (array_key_exists($productID, $_SESSION['quantity'])) {
                    $_SESSION['quantity'][$productID] += $quantity;
                } else {
                    $_SESSION['quantity'][$productID] = $quantity;
                    $_SESSION['price'][$productID] = $price;
                }
        
            } else {
                $_SESSION['quantity'] = array($productID => $quantity);
                $_SESSION['price'] = array($productID => $price); 
            }
        }
        // var_dump($_SESSION);
        // exit; 
    }

    header('location: cart.php');
    exit;
}

