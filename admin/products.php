<?php
    include_once 'includes/admin-header.php';
?>

<!-- Page Header -->
<div class="page-header">
    <div>
        <h1 class="page-title">Product Catalog</h1>
        <p class="page-subtitle">Manage, view, and organize products, sizes, prices, and inventory</p>
    </div>
    <div class="d-flex gap-2">
        <a href="add-product.php" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Add New Product
        </a>
    </div>
</div>

<!-- Filters Bar -->
<div class="admin-card mb-4">
    <div class="admin-card-body py-3">
        <div class="row g-3 align-items-center">
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                    <input type="text" id="searchProductInput" class="form-control" placeholder="Search by name, SKU..." onkeyup="filterProducts()">
                </div>
            </div>
            <div class="col-md-3">
                <select class="form-select" id="filterCategorySelect" onchange="filterProducts()">
                    <option value="">All Categories</option>
                    <option value="Electronics & Audio">Electronics & Audio</option>
                    <option value="Men's Fashion">Men's Fashion</option>
                    <option value="Footwear & Shoes">Footwear & Shoes</option>
                    <option value="Watches & Gadgets">Watches & Gadgets</option>
                    <option value="Accessories">Accessories</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select" id="filterStockSelect" onchange="filterProducts()">
                    <option value="">All Stock Status</option>
                    <option value="In Stock">In Stock</option>
                    <option value="Low Stock">Low Stock</option>
                    <option value="Out of Stock">Out of Stock</option>
                </select>
            </div>
            <div class="col-md-2 text-md-end">
                <span class="text-muted small" id="totalCountBadge">Showing 6 products</span>
            </div>
        </div>
    </div>
</div>

<!-- Products Table Card -->
<div class="admin-card">
    <div class="table-responsive">
        <table class="table admin-table" id="productsTable">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Quantity (Stock)</th>
                    <th>Available Sizes</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Product 1 -->
                <tr>
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=100&q=80" alt="Headphones" class="product-table-thumb">
                            <div>
                                <h6 class="mb-0 fw-semibold text-dark">Noise-Cancelling Wireless Headphones</h6>
                                <small class="text-muted">SKU: ELT-AUD-01</small>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border">Electronics & Audio</span></td>
                    <td>
                        <span class="fw-bold text-dark">$89.99</span>
                        <small class="text-muted d-block text-decoration-line-through">$119.99</small>
                    </td>
                    <td>
                        <span class="fw-bold">45</span> <small class="text-muted">units</small>
                        <div class="badge-stock badge-in-stock mt-1 d-inline-block">In Stock</div>
                    </td>
                    <td>
                        <span class="badge bg-secondary-subtle text-secondary border me-1">One Size</span>
                    </td>
                    <td><span class="badge bg-success">Active</span></td>
                    <td class="text-end">
                        <a href="add-product.php" class="btn btn-sm btn-light border me-1" title="Edit"><i class="bi bi-pencil"></i></a>
                        <button class="btn btn-sm btn-outline-danger" title="Delete" onclick="deleteProduct(this)"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>

                <!-- Product 2 -->
                <tr>
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <img src="https://images.unsplash.com/photo-1591047139829-d91aecb6caea?auto=format&fit=crop&w=100&q=80" alt="Jacket" class="product-table-thumb">
                            <div>
                                <h6 class="mb-0 fw-semibold text-dark">Thermal Bomber Winter Jacket</h6>
                                <small class="text-muted">SKU: ELT-APP-14</small>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border">Men's Fashion</span></td>
                    <td>
                        <span class="fw-bold text-dark">$98.00</span>
                        <small class="text-muted d-block text-decoration-line-through">$140.00</small>
                    </td>
                    <td>
                        <span class="fw-bold">18</span> <small class="text-muted">units</small>
                        <div class="badge-stock badge-in-stock mt-1 d-inline-block">In Stock</div>
                    </td>
                    <td>
                        <span class="badge bg-light text-dark border me-1">S</span>
                        <span class="badge bg-light text-dark border me-1">M</span>
                        <span class="badge bg-light text-dark border me-1">L</span>
                        <span class="badge bg-light text-dark border">XL</span>
                    </td>
                    <td><span class="badge bg-success">Active</span></td>
                    <td class="text-end">
                        <a href="add-product.php" class="btn btn-sm btn-light border me-1" title="Edit"><i class="bi bi-pencil"></i></a>
                        <button class="btn btn-sm btn-outline-danger" title="Delete" onclick="deleteProduct(this)"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>

                <!-- Product 3 -->
                <tr>
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=100&q=80" alt="Shoes" class="product-table-thumb">
                            <div>
                                <h6 class="mb-0 fw-semibold text-dark">Performance Lightweight Runners</h6>
                                <small class="text-muted">SKU: ELT-FTW-08</small>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border">Footwear & Shoes</span></td>
                    <td>
                        <span class="fw-bold text-dark">$75.50</span>
                        <small class="text-muted d-block text-decoration-line-through">$99.00</small>
                    </td>
                    <td>
                        <span class="fw-bold text-danger">3</span> <small class="text-muted">units</small>
                        <div class="badge-stock badge-low-stock mt-1 d-inline-block">Low Stock</div>
                    </td>
                    <td>
                        <span class="badge bg-light text-dark border me-1">40</span>
                        <span class="badge bg-light text-dark border me-1">41</span>
                        <span class="badge bg-light text-dark border me-1">42</span>
                        <span class="badge bg-light text-dark border">43</span>
                    </td>
                    <td><span class="badge bg-success">Active</span></td>
                    <td class="text-end">
                        <a href="add-product.php" class="btn btn-sm btn-light border me-1" title="Edit"><i class="bi bi-pencil"></i></a>
                        <button class="btn btn-sm btn-outline-danger" title="Delete" onclick="deleteProduct(this)"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>

                <!-- Product 4 -->
                <tr>
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=100&q=80" alt="Watch" class="product-table-thumb">
                            <div>
                                <h6 class="mb-0 fw-semibold text-dark">Smart Fitness Watch Pro</h6>
                                <small class="text-muted">SKU: ELT-WCH-03</small>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border">Watches & Gadgets</span></td>
                    <td>
                        <span class="fw-bold text-dark">$129.00</span>
                        <small class="text-muted d-block text-decoration-line-through">$159.00</small>
                    </td>
                    <td>
                        <span class="fw-bold">62</span> <small class="text-muted">units</small>
                        <div class="badge-stock badge-in-stock mt-1 d-inline-block">In Stock</div>
                    </td>
                    <td>
                        <span class="badge bg-secondary-subtle text-secondary border me-1">42mm</span>
                        <span class="badge bg-secondary-subtle text-secondary border">46mm</span>
                    </td>
                    <td><span class="badge bg-success">Active</span></td>
                    <td class="text-end">
                        <a href="add-product.php" class="btn btn-sm btn-light border me-1" title="Edit"><i class="bi bi-pencil"></i></a>
                        <button class="btn btn-sm btn-outline-danger" title="Delete" onclick="deleteProduct(this)"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>

                <!-- Product 5 -->
                <tr>
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <img src="https://images.unsplash.com/photo-1553062407-98eeb64c6a62?auto=format&fit=crop&w=100&q=80" alt="Backpack" class="product-table-thumb">
                            <div>
                                <h6 class="mb-0 fw-semibold text-dark">Classic Urban Leather Backpack</h6>
                                <small class="text-muted">SKU: ELT-ACC-22</small>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border">Accessories</span></td>
                    <td>
                        <span class="fw-bold text-dark">$54.00</span>
                        <small class="text-muted d-block text-decoration-line-through">$65.00</small>
                    </td>
                    <td>
                        <span class="fw-bold">25</span> <small class="text-muted">units</small>
                        <div class="badge-stock badge-in-stock mt-1 d-inline-block">In Stock</div>
                    </td>
                    <td>
                        <span class="badge bg-secondary-subtle text-secondary border me-1">20 Liters</span>
                    </td>
                    <td><span class="badge bg-success">Active</span></td>
                    <td class="text-end">
                        <a href="add-product.php" class="btn btn-sm btn-light border me-1" title="Edit"><i class="bi bi-pencil"></i></a>
                        <button class="btn btn-sm btn-outline-danger" title="Delete" onclick="deleteProduct(this)"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>

                <!-- Product 6 -->
                <tr>
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <img src="https://images.unsplash.com/photo-1583394838336-acd977736f90?auto=format&fit=crop&w=100&q=80" alt="Earphones" class="product-table-thumb">
                            <div>
                                <h6 class="mb-0 fw-semibold text-dark">BassBoost Pro In-Ear Earphones</h6>
                                <small class="text-muted">SKU: ELT-AUD-09</small>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border">Electronics & Audio</span></td>
                    <td>
                        <span class="fw-bold text-dark">$45.00</span>
                        <small class="text-muted d-block text-decoration-line-through">$60.00</small>
                    </td>
                    <td>
                        <span class="fw-bold text-danger">0</span> <small class="text-muted">units</small>
                        <div class="badge-stock badge-out-of-stock mt-1 d-inline-block">Out of Stock</div>
                    </td>
                    <td>
                        <span class="badge bg-secondary-subtle text-secondary border me-1">Universal</span>
                    </td>
                    <td><span class="badge bg-secondary">Draft</span></td>
                    <td class="text-end">
                        <a href="add-product.php" class="btn btn-sm btn-light border me-1" title="Edit"><i class="bi bi-pencil"></i></a>
                        <button class="btn btn-sm btn-outline-danger" title="Delete" onclick="deleteProduct(this)"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    function filterProducts() {
        const search = document.getElementById('searchProductInput').value.toLowerCase();
        const cat = document.getElementById('filterCategorySelect').value.toLowerCase();
        const stock = document.getElementById('filterStockSelect').value.toLowerCase();
        const rows = document.querySelectorAll('#productsTable tbody tr');

        let visibleCount = 0;
        rows.forEach(row => {
            const text = row.innerText.toLowerCase();
            const matchesSearch = text.includes(search);
            const matchesCat = !cat || text.includes(cat);
            const matchesStock = !stock || text.includes(stock);

            if (matchesSearch && matchesCat && matchesStock) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        document.getElementById('totalCountBadge').innerText = `Showing ${visibleCount} products`;
    }

    function deleteProduct(btn) {
        if (confirm("Are you sure you want to delete this product?")) {
            btn.closest('tr').remove();
            filterProducts();
        }
    }
</script>

<?php
    include_once 'includes/admin-footer.php';
?>
