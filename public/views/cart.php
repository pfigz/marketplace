<?php

require '../../includes/init.php';

$conn = require '../../includes/db.php';

require '../../includes/add_to_cart.php';

require '../../includes/view_cart.php';

$auth = new Auth;

?>

<?php require '../../includes/header.php' ?>
        
    <?php if (empty($products)): ?>
        <p>Your shopping cart is empty</p>
    <?php else: ?>
        <table class="table">
            <?php foreach ($products as $p): ?>
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                    </tr>
                </thead>

                <tbody>
                    <th scope="row">
                        <img src="https://picsum.photos/id/<?= $p['productID']; ?>/100" class="img-thumbnail" alt="<?php echo $p['productName']; ?>">
                        <a href="/marketplace/remove_from_cart.php?productID=<?= $p['productID'] ?>">Remove from cart</a>
                    </th>
                    <td><?php echo $p['productName']; ?></td>
                    <td>$<?php echo $p['price']; ?></td>
                    <td>Quantity: <input type="number" name="update" id="update" value="<?= $cart_ids[$p['productID']] ?>"></input></td>
                </tbody>                
        
            <?php endforeach; ?>

            <div class="card" id="subtotal" name="subtotal">             
                    <h3>Subtotal: $<?= $subtotal ?></h3>  
            </div>
    
            <a href="submit_order.php">
                <button>
                    Submit Order
                </button>
            </a>
        <?php endif; ?>
    </table>   


<?php require '../../includes/footer.php' ?>
