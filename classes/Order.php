<?php
/**
 * Order
 * 
 * The final selection of items for purchase
 */
class Order
{
    public function submitOrder() 
    {
        unset($_SESSION['cart'][$_GET['productID']]);
        unset($_SESSION['price'][$_GET['productID']]);
    }

    function createOrder($conn, $sessionCart)
    {
        // Get Session info
        // Iterate over session to extract: username, product ids, quantities, prices
        // insert username, product

    } 
}

