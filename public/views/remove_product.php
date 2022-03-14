<?php 

require '../../includes/init.php';

$conn = require '../../includes/db.php';

$auth = new Auth;

$url = new Url;

if (isset($_GET['productID'])) {
    
    $product = Product::getProduct($conn, $_GET['productID']);

    if ( ! $product) {

        die("product not found.");

    } 

} else {

    die("id not supplied, product not found");

}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($product->removeProduct($conn)) {

        $url->redirect("/marketplace/public/views/products.php");
    }     
}

?>

<?php require '../../includes/header.php' ?>

<h2>Delete Article</h2>

<form class="delete" method="post">

    <p>Are you sure?</p>

    <button type="submit" name="delete">Delete</button>
    <a href="product.php?productID=<?= $product->productID; ?>">Cancel</a>

</form>

<?php require '../../includes/footer.php' ?>