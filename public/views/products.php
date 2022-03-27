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
                            
                            <label class="btn btn-sm btn-outline-success" for="add-cart" tabindex="0">Add to Cart</label>                                
                        </div>
                        <form action="../../func/add_to_cart.php" method="POST">
                            <input type="hidden" name="quantity" value="1" required>
                            <input type="hidden" name="productID" value="<?= htmlspecialchars($product['productID']) ?>">
                            <input type="hidden" name="price" value="<?= htmlspecialchars($product['price']) ?>">
                            <input type="submit" class="d-none" id="add-cart">
                        </form>
                        
                        <small class="text-muted">$<?php echo $product['price']?></small>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div> <!--class="row align-items-start"-->

<?php require '../../includes/footer.php' ?>