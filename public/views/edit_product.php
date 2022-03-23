<?php 

require '../../includes/init.php';

$conn = require '../../includes/db.php';

$product = new Product($conn);

$url = new Url;

$auth = new Auth;

if (isset($_GET['productID'])) {

    $product = Product::getProduct($conn, $_GET['productID']);

    if ( ! $product) {

        die ("Product not found");
    }

} else {

    die("Id not supplied, product not found");

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    // $image_folder = mkdir("/public/assets/images/" . str_replace(' ', '', $_POST['productName']) . "/");
    // $image_dir = "/public/assets/images/" . str_replace(' ', '', $_POST['productName']) . "/";
    // $image_path = $image_dir . basename($_FILES['image']['name']);
    // $image = "/public/assets/images/" . str_replace(' ', '', $_POST['productName']) . "/" . basename($_FILES['image']['name']); 

    // $temp_file  = $_FILES['image']['tmp_name'];

    $product->productName = $_POST['productName'];
    $product->stock       = $_POST['stock'];
    $product->price       = $_POST['price'];
    $product->details     = $_POST['details'];
    // $product->image       = $image;

    $product->update($conn);

    // move_uploaded_file($temp_file, $image_path);

    $url->redirect("/public/views/product.php?productID={$product->productID}");
   
}

?>

<?php require '../../includes/header.php' ?>

<?php require 'product_form.php' ?>

<?php require '../../includes/footer.php' ?>