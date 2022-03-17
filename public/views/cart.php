<?php

require '../../includes/init.php';

$conn = require '../../includes/db.php';

require '../../func/view_cart.php';

require '../../func/update_quantity.php';


if (! isset($_SESSION)) {
    $_SESSION['quantity'] = [];
    $_SESSION['price'] = [];
}

?>

<?php require '../../includes/header.php' ?>

    <div class="card">            
        <h3>Subtotal: $<span id="subtotal"><?= htmlspecialchars($subtotal) ?></span></h3>  
    </div>
        
    <?php if (empty($products)): ?>
        <p>Your shopping cart is empty</p>
    <?php else: ?>
        <a href="checkout.php">
            <button class="mt-5">
                Checkout
            </button>
        </a>
        <table class="table align-middle">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                </tr>
            </thead>
            <?php foreach ($products as $p): ?>

                <tbody>
                    <th scope="row">
                        <?php if (empty($p['productImage'])) : ?>

                            <a href="/public/views/product.php?productID=<?= $p['productID'] ?>">
                                <img src="https://picsum.photos/id/<?= $p['productID']; ?>/150" class="img-thumbnail" alt="<?php echo $p['productName']; ?>">
                            </a>
                            
                        <?php else : ?>

                            <img src="<?= $p['productImage']; ?>" class="img-thumbnail" height="150" width="150" alt="<?php echo $p['productName']; ?>">

                        <?php endif; ?>
                        
                        <a href="../../func/remove_from_cart.php?productID=<?= $p['productID'] ?>">Remove from cart</a>
                    </th>

                    <!--Product Name-->
                    <td><?php echo $p['productName']; ?></td>

                    <!--Price-->
                    <td >$<span class="price" id="price" value="<?= htmlspecialchars($p['price']); ?>"><?= htmlspecialchars($p['price']); ?></span></td>

                    <!--Quantity-->                   
                        <td>Qty: <input type="number" name="quantity" class="quantity" id="quantity" min="0" value="<?= htmlspecialchars($cart_ids[$p['productID']]); ?>" max="<?= $p['stock'] ?>" onchange="updateCart();"></input></td>

                </tbody>                
        
            <?php endforeach; ?>
        </table> 
    <?php endif; ?>

<?php require '../../includes/footer.php' ?>
