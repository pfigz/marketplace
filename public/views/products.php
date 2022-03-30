<?php 

require "../../includes/init.php";

$auth = new Auth;

$conn = require "../../includes/db.php";

$products = new Product;

$list_products = $products->getAll($conn);
?>

<?php require '../../includes/header.php' ?>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    <?php if (empty($list_products)) : ?>
        <h3>There are no products. Please <a href="sign_up.php">signup</a> and add a product.</h3>
    <?php else : ?>        
        <?php foreach ($list_products as $product) : ?>
            <div class="col">
                <div class="card shadow-sm">
                    <a href="/public/views/product.php?productID=<?= htmlspecialchars($product['productID']) ?>">
                        <?php if ( empty($product['productImage'])) : ?>
                            <img src="https://picsum.photos/id/<?= $product['productID']; ?>/900" height="225" width="100%" class="bd-placeholder-img card-img-top" alt="<?php echo $product['productName']; ?>">
                        <?php else : ?>
                            <img src="<?= $product['productImage']; ?>" height="225" width="100%" class="card-img-top"  alt="<?= $product['productName']; ?>">
                        <?php endif; ?>
                    </a>

                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['productName']?></h5>
                        <p class="card-text"><?php echo (strlen($product['details']) >= 35) ? substr(htmlspecialchars($product['details']), 0, 35) . "..." : htmlspecialchars($product['details']); ?></p>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group"> 
                                <form action="product.php?productID=<?= $product['productID']; ?>" method="POST">
                                    <button type="submit" class="btn btn-sm btn-outline-secondary">View</button>
                                </form>                                        
                                
                                <form action="../../func/add_to_cart.php" method="POST">
                                    <input type="hidden" name="quantity" value="1" required>
                                    <input type="hidden" name="productID" value="<?= htmlspecialchars($product['productID']) ?>">
                                    <input type="hidden" name="price" value="<?= htmlspecialchars($product['price']) ?>">
                                    <button class="btn btn-sm btn-outline-success" type="submit">Add to Cart</label>
                                </form>                               
                            </div>
                                                       
                            <small class="text-muted">
                                $<?php echo $product['price']?>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div> <!--class="row align-items-start"-->

<?php require '../../includes/footer.php' ?>
