<?php 

require '../../includes/init.php';

require '../../func/view_cart.php';

?>

<?php require '../../includes/header.php' ?>

<?php if (empty($products)): ?>
        <p>Your shopping cart is empty</p>
<?php else: ?>
    <div class="container-fluid mt-5">
        <div class="row">
            <aside class="col-lg-9">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-borderless table-shopping-cart">
                            <thead class="text-muted">
                                <tr class="small text-uppercase">
                                    <th scope="col">Product</th>
                                    <th scope="col" width="120">Quantity</th>
                                    <th scope="col" width="120">Price</th>
                                    <th scope="col" class="text-right d-none d-md-block" width="200"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $p): ?>
                                    <tr>
                                        <td>
                                            <figure class="itemside align-items-center">
                                                <div class="aside">
                                                    <a href="/public/views/product.php?productID=<?= $p['productID'] ?>"><img src="https://picsum.photos/id/<?= $p['productID']; ?>/150" class="img-sm"></a>       
                                                </div>
                                                <figcaption class="info"> 
                                                    <a href="/public/views/product.php?productID=<?= $p['productID'] ?>" class="title text-dark" data-abc="true">
                                                        <?php echo $p['productName']; ?>
                                                    </a>
                                                </figcaption>
                                            </figure>
                                        </td>
                                        <td>
                                            <input type="number" name="quantity" class="quantity" id="quantity" min="0" value="<?= htmlspecialchars($cart_qty[$p['productID']]); ?>" max="<?= $p['stock'] ?>" onchange="updateCart();"></input></td>
                                        </td>
                                        <td>
                                            <div class="price-wrap">
                                                <var>$</var>
                                                <var class="prices" value="<?= htmlspecialchars($p['price']); ?>">
                                                    <?= htmlspecialchars($p['price']); ?>
                                                </var>
                                            </div>
                                        </td>
                                        <td class="text-right d-none d-md-block">
                                            <a href="../../func/remove_from_cart.php?productID=<?= $p['productID'] ?>" class="btn btn-light" data-abc="true">Remove</a>
                                        </td>
                                        <input type="hidden" name="productID" class="productID" id="productID" value="<?= htmlspecialchars($p['productID']); ?>"></input>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </aside>
            <aside class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <dl class="dlist-align">
                            <dt class="me-1">Total:</dt>
                            <dd class="text-right text-dark b ml-3"><strong>$</strong><strong id="subtotal"><?= htmlspecialchars($subtotal) ?></strong></dd>
                        </dl>
                        <hr>
                        <a href="checkout.php" class="btn btn-out btn-success btn-square btn-main" data-abc="true">
                            Proceed to Checkout
                        </a> 
                        <a href="../views/products.php" class="btn btn-out btn-primary btn-square btn-main mt-2" data-abc="true">
                            Continue Shopping
                        </a>
                    </div>
                </div>
            </aside>
        </div>
    </div>
<?php endif; ?>

<?php require '../../includes/footer.php' ?>