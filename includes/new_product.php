<?php 

require 'includes/init.php';

$conn = require 'includes/db.php';

$products = new Product($conn);



// $products = $products->getAll($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $products->productName = $_REQUEST["productName"];
    $products->stock = $_REQUEST["stock"];
    $products->price = $_REQUEST["price"];
    $products->description = $_REQUEST["description"];

    $products = $products->createProduct($conn);
    
}

?>

<?php require 'includes/header.php' ?>

    <div class="create_product">
        <form method="POST">
            <div>
                <label for="productName">Create Product</label>
                <input type="text" name="productName" id="productName" placeholder="Product Name">
            </div>

            <div>
                <label for="stock">Product Stock</label>
                <input type="text" name="stock" id="stock" placeholder="Stock Amount">
            </div>

            <div>
                <label for="price">Product Price</label>
                <input type="text" name="price" id="price" placeholder="Price">
            </div>

            <div>
                <label for="Description">Product Description</label>
                <input type="text" name="description" id="description" placeholder="Type description here">
            </div>

            <div>
                <button>Submit</button>
            </div>

        </form>
    </div>

<?php require 'includes/footer.php' ?>