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
        $_SESSION['quantity'] = [];
        $_SESSION['price'] = [];
    }

}

