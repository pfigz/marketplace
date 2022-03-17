<?php 

require 'includes/init.php';

$conn = require 'includes/db.php';

$auth = new Auth;

if (!$auth->isLoggedIn()) {
    $_SESSION['quantity'] = [];
    $_SESSION['price'] = [];
}

?>

<?php require 'includes/header.php' ?>

<?php if (!$auth->isLoggedIn()): ?>

    <div class="container d-flex justify-content-center">
        <h2>Welcome to The Market Place</h2>
    </div> 

    <div class="contaienr d-flex justify-content-center">
        <h3>Please <a href="public/views/sign_up.php">signup</a> or <a href="public/views/login.php">login</a> to add products</h3>
    </div>
    
<?php endif; ?>

<?php if ($auth->isLoggedIn()): ?>

    <div class="container d-flex justify-content-center align-items-center">
        <h2>Welcome to the Market Place <?= $_SESSION['username'] ?></h2>
    </div>

<?php endif; ?>

<?php require 'includes/footer.php' ?>