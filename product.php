<?php

require 'includes/init.php';

$conn = require 'includes/db.php';

$products = new Product;

$product = $products->getProduct($conn, $_GET['id']);

$remove = $products->removeProduct($conn);

?>

<?php require 'includes/header.php' ?>

<h4>Product Page</h4>

<div class="container">
    <p>Name: <?php echo $product->productName; ?></p>
    <p>Description: <?php echo $product->description; ?></p>
    <p>Price: $<?php echo $product->price; ?></p>
    <p>Amount available:<?php echo $product->stock; ?></p>
</div>

<a class="delete" href="remove_product.php?id=<?= $product->productID; ?>">Delete</a>

<?php require 'includes/footer.php' ?>
