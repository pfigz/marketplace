<?php

$conn = require 'includes/db.php';

$cart = new Cart;

$cart_ids = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

$products = $cart->viewCart($conn, $_SESSION['cart']);

// Update product quantities in cart if the user clicks the "Update" button on the shopping cart page
if (isset($_GET['update']) && isset($_SESSION['cart'])) {
    // Loop through the post data so we can update the quantities for every product in cart
    foreach ($_POST as $k => $v) {
        if (strpos($k, 'quantity') !== false && is_numeric($v)) {
            $id = str_replace('quantity-', '', $k);
            $quantity = (int)$v;
            // Always do checks and validation
            if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
                // Update new quantity
                $_SESSION['cart'][$id] = $quantity;
            }
        }
    }
    // Prevent form resubmission...
}

// var_dump($_POST['update']);
// exit;