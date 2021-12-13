<?php 

require '../../includes/init.php';

$conn = require '../../includes/db.php';

$product = new Product($conn);

$url = new Url;

$auth = new Auth;

if (isset($_GET['id'])) {

    $product = Product::getProduct($conn, $_GET['id']);

    if ( ! $product) {

        die ("Product not found");
    }

} else {

    die("Id not supplied, product not found");

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $product->productName = $_POST['productName'];
    $product->stock = $_POST['stock'];
    $product->price = $_POST['price'];
    $product->description = $_POST['details'];

    $product->update($conn);

    $url->redirect("/marketplace/public/views/product.php?id={$product->productID}");
   
}

?>

<?php require '../../includes/header.php' ?>

<?php require 'product_form.php' ?>

<?php require '../../includes/footer.php' ?>