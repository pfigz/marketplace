<?php 

require 'includes/init.php';

require 'includes/set_session.php';

$conn = require 'includes/db.php';

$auth = new Auth;

?>

<?php require 'includes/header.php' ?>

<div class="container d-flex flex-column">
    <?php if (!$auth->isLoggedIn()): ?>
        <div class="d-flex justify-content-center mt-3">
            <h2 class="text-center">Welcome to The Market Place</h2>
        </div>
    <?php else : ?>
        <div class="container d-flex justify-content-center mt-3">
            <h2 class="text-center">Welcome to the Market Place <?= htmlspecialchars($_SESSION['username']); ?></h2>
        </div>
    <?php endif; ?>

        <div class="d-flex justify-content-center mb-5">
            <h6 class="text-center">**Not a live marketplace, for testing purposes only**</h6>
        </div>
            
        <div class="container d-flex justify-content-center mb-5">  
            <a href="/public/views/products.php"><img class="img-fluid" src="/public/assets/images/site/online-shopping.png" alt="An online shopping icon"></a>
        </div>
        
    <?php if (!$auth->isLoggedIn()): ?>
        <div class="d-flex  justify-content-center">
            <h4 class="text-center">Please <a href="/public/views/sign_up.php">signup</a> or <a href="/public/views/login.php">login</a> to add products and submit comments</h4>
        </div> 
    <?php else : ?>
        <div class="d-flex justify-content-center">
            <h5 class="text-center">Thanks for signing in! Click the icon to view products, or click Add Product above to add your own!</h5>
        </div>
    <?php endif; ?>
</div>

<?php require 'includes/footer.php' ?>