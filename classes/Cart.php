<?php
/**
 * Cart
 * 
 * A selection of products for purchase by the customer/user
 */
Class Cart

{

    /**
     * The product ID
     *
     * @var int
     */
    public $productID;

    // /**
    //  * An array of the products in the shopping cart
    //  *
    //  * @var array
    //  */
    // public $products;

    /**
     * The quantity of a specific product in the shopping cart
     *
     * @var int
     */
    public $quantity;

    /**
     * The price of the product
     *
     * @var int
     */
    public $price;

    /**
     * The subtotal of the products in the shopping cart
     *
     * @var int
     */
    public $subtotal;

    /**
     * Select product to add to cart
     *
     * @param object    $conn         A connection to the database
     * @param int       $productID    The product ID number
     * @return array                  An associative array of the product attributes
     */
    public function addToCart($conn, $productID)
    {
        $sql = "SELECT * 
                FROM product
                WHERE productID = :productID";
        
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':productID', $productID, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    /**
     * Remove a product from the shopping cart
     *
     * @return void
     */
    public function remove()
    {
            unset($_SESSION['cart'][$_GET['productID']]);
            unset($_SESSION['price'][$_GET['productID']]);
    }

    /**
     * View items in the shopping cart session variable 
     *
     * @param object $conn  A connection to the database
     * @return array        An associative array of the products in the shopping cart
     */
    public function viewCart($conn, $sessionCart) 
    {
        $products_in_cart = isset($sessionCart) ? $sessionCart : array();
        
        if ($products_in_cart) {

            $placeholders = implode(',', array_fill(0, count($products_in_cart), '?'));

            $sql = "SELECT * 
                    FROM product
                    WHERE productID IN ($placeholders)";

            $stmt = $conn->prepare($sql);

            if ($stmt->execute(array_keys($products_in_cart))) {

                return $stmt->fetchAll(PDO::FETCH_ASSOC);

            }
        }
    }
    
    /**
     * Obtain the subtotal for current items in the cart
     *
     * @param array $quantity A Session array of the quantity of individual cart items
     * @param array $price    A Session array of the price for individual cart items     
     * @return integer The subtotal of items in the cart
     */
    public function subtotal($quantity, $price)
    {
        function subtotal($quantity, $price): float {
            return $quantity * $price;
        }

        $subtotal = array_sum(array_map('subtotal', $quantity, $price));

        return $subtotal;
    }

    public function quantity($sessionCart, $sessionPrice)
    {
        // get stock info
        // get session info
        // deduct session from stock
    }
}