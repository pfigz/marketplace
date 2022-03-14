<?php 

require "../../includes/init.php";

$auth = new Auth;

$conn = require "../../includes/db.php";

$products = new Product;

$list_products = $products->getAll($conn);
?>

<?php require '../../includes/header.php' ?>

<div class="row">
    <?php foreach ($list_products as $product) : ?>

            <div class="col-sm-4 d-flex justify-content-center mb-4">
                <div class="card h-100" style="width: 18rem">
                    <a href="/public/views/product.php?productID=<?= $product['productID'] ?>">
                        <?php if ( empty($product['productImage'])) : ?>
                            <img src="https://picsum.photos/id/<?= $product['productID']; ?>/500" class="card-img-top img-fluid" alt="<?php echo $product['productName']; ?>">
                        <?php else : ?>
                            <img src="<?= $product['productImage']; ?>" height="286" width="286" class="card-img-top"  alt="<?= $product['productName']; ?>">
                        <?php endif; ?>
                    </a>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['productName']?></h5>
                        <p>$<?php echo $product['price']?></p>
                        <p class="card-text"><?php echo (strlen($product['details']) >= 35) ? substr($product['details'], 0, 35) . "..." : $product['details']; ?></p>                   
                    </div> <!-- card-body -->
                </div> <!-- card -->
            </div> <!-- col -->

    <?php endforeach; ?>
</div> <!--class="row align-items-start"-->

<?php require '../../includes/footer.php' ?>