<div class="container">
    <form method="POST">
        <div class="mb-3">
            <div>
                <label for="productName" class="form-label">Create Product</label>
                <input type="text" class="form-control" name="productName" id="productName" placeholder="Product Name" value="<?= htmlspecialchars($product->productName); ?>">
            </div>
        </div>

        <div class="mb-3">
            <div>
                <label for="stock" class="form-label">Product Stock</label>
                <input type="text" class="form-control" name="stock" id="stock" placeholder="Stock Amount" value="<?= htmlspecialchars($product->stock); ?>">
            </div>
        </div>

        <div class="mb-3">
            <div>
                <label for="price" class="form-label">Product Price</label>
                <input type="text" class="form-control" name="price" id="price" placeholder="Price" value="<?= htmlspecialchars($product->price); ?>">
            </div>
        </div>

        <div class="mb-3">
            <div>
                <label for="details" class="form-label">Product details</label>
                <input type="text" class="form-control" name="details" id="details" placeholder="Type product details here" value="<?= htmlspecialchars($product->details); ?>">
            </div>
        </div>

        <div>
            <button type="submit">Submit</button>
        </div>

    </form>
</div>