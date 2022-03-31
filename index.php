<?php 

require 'includes/init.php';

require 'includes/set_session.php';

$conn = require 'includes/db.php';

$auth = new Auth;

?>

<?php require 'includes/header.php' ?>

<?php if (!$auth->isLoggedIn()): ?>

    <div class="container d-flex justify-content-center">
        <h2>Welcome to The Market Place</h2>
    </div> 

    <div class="position-absolute top-50 start-50 translate-middle">
        <div class="container d-flex justify-content-center mb-5">  
            <img src="public/assets/images/site/online-shopping.png" alt="An online shopping icon">
        </div> 
            <h4>Please <a href="public/views/sign_up.php">signup</a> or <a href="/public/views/login.php">login</a> to add products and submit comments</h4>      
    </div>
    
<?php endif; ?>

<?php if ($auth->isLoggedIn()): ?>

    <div class="container d-flex justify-content-center">
        <h2>Welcome to the Market Place <?= htmlspecialchars($_SESSION['username']); ?></h2>
    </div>

    <div class="position-absolute top-50 start-50 translate-middle">
        <div class="container d-flex justify-content-center mb-5">  
            <a href="public/views/products.php"><img src="/public/assets/images/site/online-shopping.png" alt="An online shopping icon"></a>
        </div> 
            <h5>Thanks for signing in! Click the icon to view products, or click Add Product above to add your own!</h5>      
    </div>

<?php endif; ?>

<?php require 'includes/footer.php' ?>