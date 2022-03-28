<?php

require '../../includes/init.php';

$conn = require '../../includes/db.php';

$auth = new Auth;

$url = new Url;


$products = new Product;

$product = $products->getProduct($conn, $_GET['productID']);

$comment = new Comment;

$comments = $comment->getComments($conn, $_GET['productID']);

?>

<?php require '../../includes/header.php' ?>

 <section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6">                       
                <?php if (empty($product->productImage)): ?>
                    <img src="https://picsum.photos/id/<?= $product->productID; ?>/300" width="100%" height="100%" alt="<?php echo htmlspecialchars($product->productName); ?>">
                <?php else: ?>
                    <img src="<?= $product->productImage; ?>" height="100%" width="100%" alt="<?php echo htmlspecialchars($product->productName); ?>">
                <?php endif; ?>
                

                <div class="d-flex justify-content-between">
                    <a href="edit_product.php?productID=<?= $product->productID; ?>">Edit Product</a>
                    <a href="remove_product.php?productID=<?= $product->productID; ?>">Delete Product</a>
                </div>              
            </div>
            <div class="col-md-6">
                <h1 class="display-5 fw-bolder"><?= htmlspecialchars($product->productName); ?></h1>

                <div class="fs-5 mb-5">
                    <span>$<?php echo htmlspecialchars($product->price); ?></span>
                </div>

                <p class="lead"><?php echo htmlspecialchars($product->details); ?></p>

                <div class="d-flex">
                    <form action="../../func/add_to_cart.php" method="post">
                        <input class="form-control text-center me-3 mb-1" type="number" name="quantity" value="1" min="1" max="<?= $product->stock ?>" required style="max-width: 4rem"/>

                        <input type="hidden" name="productID" value="<?= $product->productID ?>">
                        
                        <input type="hidden" name="price" value="<?= htmlspecialchars($product->price) ?>">
                        <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Add to cart
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require '../../includes/footer.php' ?>