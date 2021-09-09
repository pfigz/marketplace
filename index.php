<?php 

require 'includes/init.php';

$conn = require 'includes/db.php';

$products = new Product;

// $id = $products->getByID($conn, $_GET['productID']);

$list_products = $products->getAll($conn);


?>

<?php require 'includes/header.php' ?>

    <?php foreach ($list_products as $product) : ?>

        <form method="POST">
            <ul>
                <p><?php echo $product['productName']?></p>
                <p><?php echo $product['description']?></p>
                <a href="product.php?id=<?= $product['productID'] ?>">View Product</a>
            </ul>
        </form>

    <?php endforeach; ?>

<?php require 'includes/footer.php' ?>