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
                
                <?php if ($auth->isLoggedIn()) : ?>
                    <div class="d-flex justify-content-between">
                        <a href="edit_product.php?productID=<?= $product->productID; ?>">Edit Product</a>
                        <a href="remove_product.php?productID=<?= $product->productID; ?>">Delete Product</a>
                    </div>
                <?php endif; ?>               
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

<!-- Comments Section -->
<div class="accordion mt-1">
    <div class="d-flex align-items-end mb-1 justify-content-start">                
        <button class="btn btn-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling"
        aria-controls="offcanvasScrolling">View Comments</button>
    </div> 

    <div class="accordion-item">
        <?php if (!isset($_SESSION['username'])) : ?>
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" disabled type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    You must login to submit a comment
                </button>
            </h2>
        <?php else : ?>
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    Would you like to submit a comment?
                </button>
            </h2>
        <?php endif; ?>

        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne">
            <div class="accordion-body">
                <div class="container">
                    <form action="../../func/comment.php" class="comment" method="POST">
                        <input type="hidden" name="productID" value="<?= $product->productID ?>">

                        <input type="hidden" name="username" value="<?php (!isset($_SESSION['username'])) ? '' : $_SESSION['username'] ?>">

                        <label for="rating">Rating</label>
                        <div class="input-group">
                            <input type="number" name="rating" value="" min="0" max="5">
                        </div>

                        <label for="comment">Subject</label>
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" class="form-control" name="comment" id="comment" placeholder="What's the topic of your comment?">
                        </div>

                        <label for="comment">Comment</label>
                        <div class="input-group mb-3">
                            <textarea class="form-control" name="comment" id="comment"></textarea>
                        </div>
                        
                        <button class="btn btn-outline-dark" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Display comments off canvas -->
<div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Comments</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    
    <div class="offcanvas-body">
        <?php foreach ($comments as $c): ?>
            <div class="row d-flex border border-light mb-3">
                <div>
                    <small class=""><?php echo $c['username'] ?></small>
                </div>
                <div>Rating: <?php echo $c['rating'] ?></div>
                <p><?php echo $c['comment'] ?></p>          
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require '../../includes/footer.php' ?>