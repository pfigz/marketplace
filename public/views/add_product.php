<?php 

require '../../includes/init.php';

$auth = new Auth;
$auth->requireLogin();

$product = new Product();

$url = new Url;

$conn = require '../../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $product->productName = $_POST['productName'];
    $product->stock       = $_POST['stock'];
    $product->price       = $_POST['price'];
    $product->details     = $_POST['details'];

    $product->addProduct($conn);

    $url->redirect("/marketplace/public/views/product.php?productID=$product->productID");
      
}

?>

<?php require '../../includes/header.php' ?>

<?php require 'product_form.php' ?>

<?php require '../../includes/footer.php' ?>