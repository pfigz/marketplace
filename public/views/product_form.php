<div class="container d-flex justify-content-center">
    <form autocomplete="off" method="POST" enctype="multipart/form-data" id="productForm">
        <div class="form-group mb-3">
            <div>
                <label for="productName" class="form-label">Product Name</label>
                <input type="text" class="form-control" name="productName" id="productName" placeholder="Product Name" value="<?= $product->productName; ?>">
            </div>
        </div>

        <div class="form-group mb-3">
            <div>
                <label for="stock" class="form-label">Product Stock</label>
                <input type="text" class="form-control" name="stock" id="stock" placeholder="Stock Amount" value="<?= $product->stock; ?>">
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="price" class="form-label">Product Price</label>
            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input type="text" class="form-control" name="price" id="price" placeholder="Price" value="<?= $product->price; ?>">
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="details" class="form-label">Product details</label>
            <div class="input-group">
                <textarea class="form-control" name="details" id="details" placeholder="Type product details here" aria-label="Product details" value="<?= $product->details; ?>"></textarea>
            </div>
        </div>

        
        <div class="form-group mb-3">
            <div>
                <small>Image uploads currently disabled</small>
                <!-- <label for="image" class="form-label">Product Image</label> -->
                <input type="file" class="form-control" name="image" id="image" disabled>
            </div>
        </div>

        <div class="form-group d-flex justify-content-center">
            <button class="btn btn-dark" type="submit">Submit</button>
        </div>
    </form>
</div>