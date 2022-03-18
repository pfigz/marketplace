<?php

require '../../includes/init.php';

$conn = require '../../includes/db.php';

$auth = new Auth;

$url = new Url;

$products = new Product;

$product = $products->getProduct($conn, $_GET['productID']);

$comment = new Comment;

$comments = $comment->getComments($conn, $_GET['productID']);

// var_dump($product);
// exit;


?>

<?php require '../../includes/header.php' ?>

<div class="container">
    <div class="row">
        <div class="col-6 col-md">
            <!-- If no product image uploaded, insert dummy image from Picsum according to product id -->
            <?php if (empty($product->productImage)): ?>          
                <img src="https://picsum.photos/id/<?= $product->productID; ?>/300" alt="<?php echo $product->productName; ?>">
            <?php else: ?>
                <img src="<?= $product->productImage; ?>" height="300" width="300" alt="<?php echo $product->productName; ?>">
            <?php endif; ?>
            <div>
                <a class="edit" href="edit_product.php?id=<?= $product->productID; ?>">Edit Product</a>
                <a class="delete" href="remove_product.php?productID=<?= $product->productID; ?>">Delete Product</a>
            </div>
        </div>
        <div class="col-6 d-flex align-items-center">
            <div class="row">
                <div class="col">
                    <h4><?= $product->productName; ?></h4>
                    <h5>$<?php echo $product->price; ?></h5>                   
                    Description: <?php echo $product->details; ?>
                    <br>
                    Amount available: <?php echo $product->stock; ?>
                    <form action="/../../func/add_to_cart.php" method="POST">

                        <div class="d-grid gap-1">Quantity:<input type="number" name="quantity" value="1" min="1" max="<?= $product->stock ?>" required></div>
                        <input type="hidden" name="productID" value="<?= $product->productID ?>">
                        <input type="hidden" name="price" value="<?= $product->price ?>">
                        <br>
                        <div class="d-grid">                   
                            <input class="btn-secondary mt-1" type="submit" value="Add to Cart">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<button class="btn btn-primary mt-5" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">View Comments</button>

<div class="accordion mt-5">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                Would you like to submit a comment?
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne">
            <div class="accordion-body">
                <div class="container">
                    <form action="../../func/comment.php" class="comment" method="POST">
                        <input type="hidden" name="productID" value="<?= $product->productID ?>">
                        <input type="hidden" name="username" value="<?php (!isset($_SESSION['username'])) ? '' : $_SESSION['username'] ?>">
                        <label for="rating">Rating</label>
                        <div class="input-group">
                            <input type="number" name="rating" value=" " min=" " max="5">
                        </div>
                        <label for="comment">Subject</label>
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" class="form-control" name="comment" id="comment" placeholder="What's the subject of your review?">
                        </div>
                        <label for="comment">Review</label>
                        <div class="input-group mb-3">
                            <textarea class="form-control" name="comment" id="comment"></textarea>
                        </div>
                        <input type="submit" value="Submit">
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
  <div class="row">
    <?php foreach ($comments as $c): ?>
        <div>Username: <?php echo $c['username'] ?></div>
        <div>Rating: <?php echo $c['rating'] ?></div>
        <div>Comment: <?php echo $c['comment'] ?></div>
    <?php endforeach; ?>
</div>
  </div>
</div>

<!-- Display comments on page -->
<!-- <div class="row">
    <?php foreach ($comments as $c): ?>
        <div>Username: <?php echo $c['username'] ?></div>
        <div>Rating: <?php echo $c['rating'] ?></div>
        <div>Comment: <?php echo $c['comment'] ?></div>
    <?php endforeach; ?>
</div> -->

<?php require '../../includes/footer.php' ?>
