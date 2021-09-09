<?php 

require 'includes/init.php';

$conn = require 'includes/db.php';

$url = new Url;

if (isset($_GET['id'])) {

    
    $product = Product::getProduct($conn, $_GET['id']);

    if ( ! $product) {

        die("product not found.");

    } 

} else {

    die("id not supplied, article not found");

}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($product->removeProduct($conn)) {

        $url->redirect("/marketplace/index.php");
    }
      
}

?>

<?php require 'includes/header.php' ?>

<h2>Delete Article</h2>

<form class="delete" method="post">

    <p>Are you sure?</p>

    <button type="submit" name="delete">Delete</button>
    <a href="product.php?id=<?= $product->productID; ?>">Cancel</a>

</form>

<?php require 'includes/footer.php' ?>
<!-- Make HTML code for delete page -> see PHP Beginners Course -->