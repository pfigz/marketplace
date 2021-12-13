<?php
require 'includes/init.php';

$conn = require 'includes/db.php';

$auth = new Auth;

$cart = new Cart;

$sessionCart = $_SESSION['cart'];

$products = $cart->viewCart($conn, $sessionCart);

// var_dump($_SESSION['cart']);

$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
        
        if ($products_in_cart) {

            $placeholders = implode(',', array_fill(0, count($products_in_cart), '?'));

            $sql = "SELECT * 
                    FROM product
                    WHERE productID IN  ('$placeholders')";

            $stmt = $conn->prepare($sql);

            $stmt->execute(array_keys($products_in_cart));

           $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return var_dump($res);

            // foreach ($products as $product) {

            //     $subtotal += $product['price'] * $products_in_cart[$product['productID']];
    
            //     // return $subtotal;
    
            // }
        }
