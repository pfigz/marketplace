<?php 

require '../../includes/init.php';

$auth = new Auth;
$auth->requireLogin();

$product = new Product();

$url = new Url;

$conn = require '../../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // ***The code below only works with local persistant storage. I am leaving it here because I was really pumped to get this working.
    // Create custom directory and path for image based on product name 
    // $image_folder = mkdir("app/public/assets/images/" . str_replace(' ', '', $_POST['productName']) . "/");
    // $image_dir = "app/public/assets/images/" . str_replace(' ', '', $_POST['productName']) . "/";
    // $image_path = $image_dir . basename($_FILES['image']['name']);
    // $image = "app/public/assets/images/" . str_replace(' ', '', $_POST['productName']) . "/" . basename($_FILES['image']['name']); 

    // Identify the uploaded image file
    // $temp_file  = $_FILES['image']['tmp_name'];

    // require '../../func/s3_upload.php';

    $product->productName = $_POST['productName'];
    $product->stock       = $_POST['stock'];
    $product->price       = $_POST['price'];
    $product->details     = $_POST['details'];
    $product->image       = $image;

    $product->addProduct($conn);

    // Send uploaded image to custom directory from above
    // move_uploaded_file($temp_file, $image_path);

    $url->redirect("/public/views/product.php?productID=$product->productID");
      
}

?>

<?php require '../../includes/header.php' ?>

<?php require 'product_form.php' ?>

<?php require '../../includes/footer.php' ?>