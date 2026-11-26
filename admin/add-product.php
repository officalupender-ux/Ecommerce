<?php
    include_once 'includes/admin-header.php';
?>

<!-- Page Header -->
<div class="page-header">
    <div>
        <h1 class="page-title">Add New Product</h1>
        <p class="page-subtitle">Create and configure a new product in your store catalog</p>
    </div>
    <div class="d-flex gap-2">
        <a href="products.php" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to Products
        </a>
    </div>
</div>

<!-- Product Add Form -->
<form id="addProductForm" action="products.php" method="POST" enctype="multipart/form-data" onsubmit="event.preventDefault(); showSuccessNotification();">
    <div class="row g-4">
        <!-- Left Column: Core Details, Pricing, Variations -->
        <div class="col-lg-8">
            <!-- 1. Basic Product Info -->
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5 class="admin-card-title"><i class="bi bi-info-circle text-primary me-2"></i>Product Information</h5>
                </div>
                <div class="admin-card-body">
                    <div class="mb-3">
                        <label for="productTitle" class="form-label">Product Name / Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="productTitle" placeholder="e.g. Classic Cotton Slim-Fit Shirt" required>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="productCategory" class="form-label">Category <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <select class="form-select" id="productCategory" required>
                                    <option value="" selected disabled>Select Category</option>
                                    <option value="Men's Fashion">Men's Fashion</option>
                                    <option value="Women's Wear">Women's Wear</option>
                                    <option value="Electronics & Audio">Electronics & Audio</option>
                                    <option value="Footwear & Shoes">Footwear & Shoes</option>
                                    <option value="Watches & Gadgets">Watches & Gadgets</option>
                                    <option value="Home & Living">Home & Living</option>
                                </select>
                                <a href="categories.php" class="btn btn-outline-primary" title="Add new category">
                                    <i class="bi bi-plus"></i> New
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="productSKU" class="form-label">SKU (Stock Keeping Unit)</label>
                            <input type="text" class="form-control" id="productSKU" placeholder="e.g. ELT-2026-SHRT">
                        </div>
                    </div>

                    <div class="mb-0">
                        <label for="productDesc" class="form-label">Full Description</label>
                        <textarea class="form-control" id="productDesc" rows="4" placeholder="Enter high-converting product description, materials, specifications..."></textarea>
                    </div>
                </div>
            </div>

            <!-- 2. Pricing & Quantity / Stock -->
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5 class="admin-card-title"><i class="bi bi-cash-stack text-success me-2"></i>Pricing & Quantity (Inventory)</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="productPrice" class="form-label">Regular Price ($) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" step="0.01" class="form-control" id="productPrice" placeholder="0.00" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="salePrice" class="form-label">Sale / Discount Price ($)</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" step="0.01" class="form-control" id="salePrice" placeholder="0.00">
                            </div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="productQuantity" class="form-label">Stock Quantity (Quenty) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-boxes"></i></span>
                                <input type="number" min="0" class="form-control" id="productQuantity" placeholder="e.g. 50" required>
                            </div>
                            <small class="text-muted">Total units available for purchase</small>
                        </div>
                        <div class="col-md-6">
                            <label for="stockStatus" class="form-label">Stock Status</label>
                            <select class="form-select" id="stockStatus">
                                <option value="In Stock" selected>In Stock</option>
                                <option value="Low Stock">Low Stock</option>
                                <option value="Out of Stock">Out of Stock</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3. Size Variations -->
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5 class="admin-card-title"><i class="bi bi-aspect-ratio text-warning me-2"></i>Product Size Selection</h5>
                </div>
                <div class="admin-card-body">
                    <p class="text-muted small mb-3">Choose the available sizes for this item (click to select/unselect multiple):</p>
                    
                    <div class="size-selector-group mb-3">
                        <!-- XS -->
                        <input type="checkbox" id="size-xs" class="size-pill-checkbox" name="sizes[]" value="XS">
                        <label for="size-xs" class="size-pill-label">XS</label>

                        <!-- S -->
                        <input type="checkbox" id="size-s" class="size-pill-checkbox" name="sizes[]" value="S" checked>
                        <label for="size-s" class="size-pill-label">S</label>

                        <!-- M -->
                        <input type="checkbox" id="size-m" class="size-pill-checkbox" name="sizes[]" value="M" checked>
                        <label for="size-m" class="size-pill-label">M</label>

                        <!-- L -->
                        <input type="checkbox" id="size-l" class="size-pill-checkbox" name="sizes[]" value="L" checked>
                        <label for="size-l" class="size-pill-label">L</label>

                        <!-- XL -->
                        <input type="checkbox" id="size-xl" class="size-pill-checkbox" name="sizes[]" value="XL">
                        <label for="size-xl" class="size-pill-label">XL</label>

                        <!-- XXL -->
                        <input type="checkbox" id="size-xxl" class="size-pill-checkbox" name="sizes[]" value="XXL">
                        <label for="size-xxl" class="size-pill-label">XXL</label>

                        <!-- Free Size -->
                        <input type="checkbox" id="size-free" class="size-pill-checkbox" name="sizes[]" value="Free Size">
                        <label for="size-free" class="size-pill-label">Free Size</label>
                    </div>

                    <!-- Custom Size / Numeric Sizes -->
                    <div class="mt-3">
                        <label for="customSizes" class="form-label">Custom / Numeric Sizes (Optional)</label>
                        <input type="text" class="form-control" id="customSizes" placeholder="e.g. 38, 40, 42, 44 (for shoes/pants)">
                        <small class="text-muted">Separate multiple sizes with commas.</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Media, Status, Organization -->
        <div class="col-lg-4">
            <!-- 1. Publish Status -->
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5 class="admin-card-title"><i class="bi bi-send-check text-primary me-2"></i>Publish</h5>
                </div>
                <div class="admin-card-body">
                    <div class="mb-3">
                        <label class="form-label">Product Status</label>
                        <select class="form-select" id="productPublishStatus">
                            <option value="Active" selected>Active / Visible</option>
                            <option value="Draft">Draft (Hidden)</option>
                            <option value="Archived">Archived</option>
                        </select>
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="featuredToggle" checked>
                        <label class="form-check-label" for="featuredToggle">Mark as Featured Product</label>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary py-2 fw-semibold">
                            <i class="bi bi-cloud-arrow-up-fill me-1"></i> Save & Publish Product
                        </button>
                        <button type="button" class="btn btn-light border py-2" onclick="alert('Saved as Draft!')">
                            Save as Draft
                        </button>
                    </div>
                </div>
            </div>

            <!-- 2. Product Image Upload -->
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5 class="admin-card-title"><i class="bi bi-image text-info me-2"></i>Product Image</h5>
                </div>
                <div class="admin-card-body">
                    <label for="productImageInput" class="w-100">
                        <div class="image-upload-box">
                            <i class="bi bi-cloud-arrow-up"></i>
                            <h6 class="fw-bold mb-1">Click to Upload Image</h6>
                            <p class="text-muted small mb-0">PNG, JPG, WebP up to 5MB</p>
                            <input type="file" id="productImageInput" accept="image/*" class="d-none">
                        </div>
                    </label>

                    <!-- Image Preview Area -->
                    <div class="image-preview-area text-center mt-3" id="imagePreviewArea">
                        <p class="small text-muted mb-2">Image Preview:</p>
                        <img src="" id="imagePreviewImg" alt="Preview Image" class="img-fluid">
                    </div>

                    <!-- Image URL Alternative -->
                    <div class="mt-3">
                        <label for="imageUrlInput" class="form-label">Or Image URL</label>
                        <input type="url" class="form-control" id="imageUrlInput" placeholder="https://example.com/image.jpg" onchange="previewUrl(this.value)">
                    </div>
                </div>
            </div>

            <!-- 3. Tags & Badges -->
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5 class="admin-card-title"><i class="bi bi-bookmark-star text-danger me-2"></i>Badge & Tags</h5>
                </div>
                <div class="admin-card-body">
                    <div class="mb-3">
                        <label for="productBadge" class="form-label">Display Badge</label>
                        <select class="form-select" id="productBadge">
                            <option value="">None</option>
                            <option value="Sale">Sale Badge</option>
                            <option value="New">New Arrival Badge</option>
                            <option value="Hot">Hot / Trending Badge</option>
                        </select>
                    </div>
                    <div>
                        <label for="productTags" class="form-label">Tags</label>
                        <input type="text" class="form-control" id="productTags" placeholder="e.g. casual, summer, stylish">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    function previewUrl(url) {
        if (url) {
            const previewContainer = document.getElementById('imagePreviewArea');
            const previewImg = document.getElementById('imagePreviewImg');
            previewImg.src = url;
            previewContainer.style.display = 'block';
        }
    }

    function showSuccessNotification() {
        const title = document.getElementById('productTitle').value;
        const category = document.getElementById('productCategory').value;
        const price = document.getElementById('productPrice').value;
        const qty = document.getElementById('productQuantity').value;
        
        // Collect checked sizes
        const sizesChecked = [];
        document.querySelectorAll('input[name="sizes[]"]:checked').forEach(cb => sizesChecked.push(cb.value));
        const custom = document.getElementById('customSizes').value;
        if(custom) sizesChecked.push(custom);

        alert(`Success! Product Created:\n\nName: ${title}\nCategory: ${category}\nPrice: $${price}\nQuantity: ${qty}\nSizes: ${sizesChecked.join(', ')}`);
        window.location.href = 'products.php';
    }
</script>

<?php
    include_once 'includes/admin-footer.php';
?>
