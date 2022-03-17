<?php

/**
 * Product
 * 
 * An item for sale/purchase on the marketplace
 */
class Product
{
    /**
     * The product id number
     *
     * @var integer
     */
    public $productID;

    /**
     * The category id number
     *
     * @var integer
     */
    public $categoryID;

    /**
     * The product name
     *
     * @var string
     */
    public $productName;

    /**
     * The number of products in stock
     *
     * @var integer
     */
    public $stock;

    /**
     * The product price
     *
     * @var integer
     */
    public $price;

    /**
     * The product details
     *
     * @var string
     */
    public $details;

    /**
     * The date the product was added to the marketplace
     *
     * @var integer
     */
    public $creationDate;

    /**
     * The product image location stored in the database
     *
     * @var string
     */
    public $image;

    /**
     * An array of errors
     *
     * @var array
     */
    public $errors = [];


    /**
     * Get all the products
     *
     * @param object $conn Connection to the database
     * 
     * @return array
     */
    public function getAll($conn)
    {
        $sql = "SELECT *
                FROM product
                ORDER BY productID";

        $results = $conn->query($sql);

        return $results->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get an individual product from the database
     *
     * @param object $conn    Connection to the database
     * @param int $productID  The product id number
     * @param string $columns Optional list of columns for the selection, defaults to '*'
     * 
     * @return mixed          An object of this class, or null if not found
     */
    public static function getProduct($conn, $productID, $columns = '*')
    {
        $sql = "SELECT $columns
                FROM product
                WHERE productID = :productID";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':productID', $productID, PDO::PARAM_INT);

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');

        if ($stmt->execute()) {

            return $stmt->fetch();

        }  
    }

    /**
     * Undocumented function
     *
     * @param object $conn A connection to the database
     * 
     * @return void
     */
    public function addProduct($conn)
    {
        $sql = "INSERT INTO product (productName, stock, price, details, productImage)
                VALUES (:productName, :stock, :price, :details, :image)";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':productName', $this->productName, PDO::PARAM_STR);
        $stmt->bindValue(':stock',       $this->stock,       PDO::PARAM_INT);
        $stmt->bindValue(':price',       $this->price,       PDO::PARAM_INT);
        $stmt->bindValue(':details',     $this->details,     PDO::PARAM_STR);
        $stmt->bindValue(':image',       $this->image,       PDO::PARAM_STR);

        if ($stmt->execute()) {

            $this->productID = $conn->lastInsertID();
            
        }
    }

    /**
     * Update a product with new property values
     *
     * @param object $conn A connection to the database
     * 
     * @return void
     */
    public function update($conn)
    {
        $sql = "UPDATE product
                SET productName = :productName,
                    stock       = :stock,
                    price       = :price,
                    details     = :details
                WHERE productID = :productID";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':productID',   $this->productID,   PDO::PARAM_INT);
        $stmt->bindValue(':productName', $this->productName, PDO::PARAM_STR);
        $stmt->bindValue(':stock',       $this->stock,       PDO::PARAM_INT);
        $stmt->bindValue(':price',       $this->price,       PDO::PARAM_INT);
        $stmt->bindValue(':details',     $this->details,     PDO::PARAM_STR);

        return $stmt->execute();
    }

    /**
     * Delete a product from the database
     *
     * @param object $conn A connection to the database
     * 
     * @return void
     */
    public function removeProduct($conn)
    {
        $sql = "DELETE FROM product
                WHERE productID = :productID";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':productID', $this->productID, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function getRemainingStock($conn, $cartQuantity)
    {
        $sql = "SELECT stock
                FROM product
                WHERE productID = :productID";
        
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':productID', $cartQuantity, PDO::PARAM_INT);

        $stock = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $stock;
    }

    public function addImage($conn, $image)
    {
        $this->productID = $conn->lastInsertID();
        $target_dir = "../public/assets/images";
        $image_path = $target_dir . basename($image);


        $sql = "INSERT INTO product (productImage)
                VALUE $image_path
                WHERE 'productID' = $this->productID";

        $stmt = $conn->prepare($sql);
        
        $stmt->execute();
       
    }
    
}