<?php 

require 'includes/init.php';

$conn = require 'includes/db.php';

$products = new Product($conn);



// $products = $products->getAll($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $products->productName = $_REQUEST["productName"];
    $products->stock = $_REQUEST["stock"];
    $products->price = $_REQUEST["price"];
    $products->description = $_REQUEST["description"];

    $products = $products->createProduct($conn);
    
}

?>

<?php require 'includes/header.php' ?>

<?php require 'includes/product_form.php' ?>

<?php require 'includes/footer.php' ?>