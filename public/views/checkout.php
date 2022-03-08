<?php 

require '../../includes/init.php';

$conn = require '../../includes/db.php';

require '../../func/view_cart.php';

$auth = new Auth;

?>


<?php require '../../includes/header.php' ?>



<form action="../../func/submit_order.php">
    <div class="container">
        <div class="row" id="address">
            <div class="address">
                    <label for="address" class="form-label">Shipping Address</label>
                    <input type="text" class="form-control mb-1" name="address" id="address" placeholder="House Number and Street">
                    <input type="text" class="form-control mb-1" name="address" id="address" placeholder="State">
                    <input type="text" class="form-control mb-2" name="address" id="address" placeholder="Zipcode">
            </div>
    
        </div>
    
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#paymentOptions">
            Select Payment Method
        </button>
    
        <div class="modal fade" id="paymentOptions" tabindex="-1" aria-labelledby="paymentOptionsLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentOptionsLabel">Choose Payment Method</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul>
                        <li class="list-group-item">Bank Account</li>
                        <li class="list-group-item">Credit/Debit Card</li>
                        <li class="list-group-item">PayPal</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                </div>
            </div>
        </div>
        </div>
    
        <div class="row" id="review">
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
                            <td>
                                <?php if (empty($p['productImage'])) : ?>
                                    <a href="/marketplace/public/views/product.php?productID=<?= $p['productID'] ?>">
                                        <img src="https://picsum.photos/id/<?= $p['productID']; ?>/150" class="img-thumbnail" alt="<?php echo $p['productName']; ?>">
                                    </a>
                                <?php else : ?>
                                    <img src="<?= $p['productImage']; ?>" class="img-thumbnail" height="150" width="150" alt="<?php echo $p['productName']; ?>">
                                <?php endif; ?>
    
                            </td>
    
                            <!--Product Name-->
                            <td><?php echo $p['productName']; ?></td>
    
                            <!--Price-->
                            <td >$<span class="price" id="price" value="<?= htmlspecialchars($p['price']); ?>"><?= htmlspecialchars($p['price']); ?></span></td>
    
                            <!--Quantity-->
                            <td>Qty: <?= htmlspecialchars($cart_ids[$p['productID']]); ?></td>
                        </tbody>
                    <?php endforeach; ?>
            </table>
        </div>
    
        <div class="" id="submit">
            <input type="submit" value="Submit Order">
        </div>
    </div>
</form>

<?php require '../../includes/footer.php' ?>