<div class="container d-flex justify-content-center pt-5">
    <div class="card center-block" style="background-color: #eeeeee;">
        <div class="d-flex justify-content-center mt-2">
            <?php if ( $product->productID == NULL ) : ?> 
                <h3>Add Product Form</h3>                    
            <?php else : ?>
                <h3>Edit Product Form</h3>
            <?php endif; ?>
        </div>
        <form autocomplete="off" method="POST" enctype="multipart/form-data" id="productForm">
            <div class="form-group mb-3">             
                <label for="productName" class="form-label">Product Name</label>
                <input type="text" class="form-control" name="productName" id="productName" placeholder="Product Name" value="<?= $product->productName; ?>">
            </div>

            <div class="form-group row mb-3">
                <div class="col">
                    <input type="text" class="form-control" name="stock" id="stock" placeholder="Stock Amount" value="<?= $product->stock; ?>">
                </div>

                <div class="input-group col">
                    <span class="input-group-text">$</span>
                    <input type="text" class="form-control" name="price" id="price" placeholder="Price" value="<?= $product->price; ?>">
                </div>
            </div>
            
            <div class="form-group mb-3">
                <label for="details" class="form-label">Product details</label>
                <div class="input-group">
                    <textarea class="form-control" name="details" id="details" placeholder="Type product details here" aria-label="Product details"><?= $product->details; ?></textarea>
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
</div>