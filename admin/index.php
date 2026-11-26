<?php
    include_once 'includes/admin-header.php';
?>

<!-- Page Header -->
<div class="page-header">
    <div>
        <h1 class="page-title">Dashboard Overview</h1>
        <p class="page-subtitle">Welcome back, Alex! Here is what's happening with your store today.</p>
    </div>
    <div class="d-flex gap-2">
        <a href="add-product.php" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Add Product
        </a>
        <a href="categories.php" class="btn btn-outline-secondary">
            <i class="bi bi-tags me-1"></i> New Category
        </a>
    </div>
</div>

<!-- 4 Key Stat Cards -->
<div class="row g-4 mb-4">
    <div class="col-xl-3 col-sm-6">
        <div class="stat-card">
            <div class="stat-info">
                <h3>148</h3>
                <p>Total Products</p>
            </div>
            <div class="stat-icon primary">
                <i class="bi bi-box-seam"></i>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="stat-card">
            <div class="stat-info">
                <h3>6</h3>
                <p>Active Categories</p>
            </div>
            <div class="stat-icon success">
                <i class="bi bi-tags"></i>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="stat-card">
            <div class="stat-info">
                <h3>1,250</h3>
                <p>Total Stock (Qty)</p>
            </div>
            <div class="stat-icon warning">
                <i class="bi bi-boxes"></i>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="stat-card">
            <div class="stat-info">
                <h3>4</h3>
                <p>Low Stock Items</p>
            </div>
            <div class="stat-icon danger">
                <i class="bi bi-exclamation-octagon"></i>
            </div>
        </div>
    </div>
</div>

<!-- Recent Products & Quick Actions Row -->
<div class="row g-4">
    <!-- Products Table -->
    <div class="col-lg-8">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5 class="admin-card-title"><i class="bi bi-clock-history text-primary me-2"></i>Recently Added Products</h5>
                <a href="products.php" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="table-responsive">
                <table class="table admin-table mb-0">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock (Qty)</th>
                            <th>Sizes</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=80&q=80" alt="Headphones" class="product-table-thumb">
                                    <div>
                                        <div class="fw-semibold text-dark">Wireless Headphones</div>
                                        <small class="text-muted">ELT-AUD-01</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge bg-light text-dark border">Electronics</span></td>
                            <td><span class="fw-bold">$89.99</span></td>
                            <td><span class="badge-stock badge-in-stock">45 Qty</span></td>
                            <td><small class="text-muted">Universal</small></td>
                            <td class="text-end">
                                <a href="add-product.php" class="btn btn-sm btn-light border"><i class="bi bi-pencil"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="https://images.unsplash.com/photo-1591047139829-d91aecb6caea?auto=format&fit=crop&w=80&q=80" alt="Jacket" class="product-table-thumb">
                                    <div>
                                        <div class="fw-semibold text-dark">Thermal Bomber Jacket</div>
                                        <small class="text-muted">ELT-APP-14</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge bg-light text-dark border">Men's Fashion</span></td>
                            <td><span class="fw-bold">$98.00</span></td>
                            <td><span class="badge-stock badge-in-stock">18 Qty</span></td>
                            <td><span class="badge bg-light text-dark border">S, M, L, XL</span></td>
                            <td class="text-end">
                                <a href="add-product.php" class="btn btn-sm btn-light border"><i class="bi bi-pencil"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=80&q=80" alt="Shoes" class="product-table-thumb">
                                    <div>
                                        <div class="fw-semibold text-dark">Performance Runners</div>
                                        <small class="text-muted">ELT-FTW-08</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge bg-light text-dark border">Footwear</span></td>
                            <td><span class="fw-bold">$75.50</span></td>
                            <td><span class="badge-stock badge-low-stock">3 Qty</span></td>
                            <td><span class="badge bg-light text-dark border">40 - 43</span></td>
                            <td class="text-end">
                                <a href="add-product.php" class="btn btn-sm btn-light border"><i class="bi bi-pencil"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=80&q=80" alt="Watch" class="product-table-thumb">
                                    <div>
                                        <div class="fw-semibold text-dark">Fitness Tracker Watch</div>
                                        <small class="text-muted">ELT-WCH-03</small>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge bg-light text-dark border">Watches</span></td>
                            <td><span class="fw-bold">$129.00</span></td>
                            <td><span class="badge-stock badge-in-stock">62 Qty</span></td>
                            <td><small class="text-muted">42mm, 46mm</small></td>
                            <td class="text-end">
                                <a href="add-product.php" class="btn btn-sm btn-light border"><i class="bi bi-pencil"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Quick Shortcuts & Inventory Health -->
    <div class="col-lg-4">
        <!-- Quick Action Panel -->
        <div class="admin-card mb-4">
            <div class="admin-card-header">
                <h5 class="admin-card-title"><i class="bi bi-lightning-charge text-warning me-2"></i>Quick Tasks</h5>
            </div>
            <div class="admin-card-body d-flex flex-column gap-2">
                <a href="add-product.php" class="btn btn-outline-primary text-start d-flex align-items-center justify-content-between p-3">
                    <span><i class="bi bi-plus-circle me-2"></i> Create New Product</span>
                    <i class="bi bi-chevron-right"></i>
                </a>
                <a href="categories.php" class="btn btn-outline-secondary text-start d-flex align-items-center justify-content-between p-3">
                    <span><i class="bi bi-tags me-2"></i> Create New Category</span>
                    <i class="bi bi-chevron-right"></i>
                </a>
                <a href="products.php" class="btn btn-outline-dark text-start d-flex align-items-center justify-content-between p-3">
                    <span><i class="bi bi-boxes me-2"></i> Update Stock & Quantities</span>
                    <i class="bi bi-chevron-right"></i>
                </a>
            </div>
        </div>

        <!-- Inventory Status Summary -->
        <div class="admin-card">
            <div class="admin-card-header">
                <h5 class="admin-card-title"><i class="bi bi-pie-chart text-info me-2"></i>Inventory Breakdown</h5>
            </div>
            <div class="admin-card-body">
                <div class="mb-3">
                    <div class="d-flex justify-content-between small mb-1">
                        <span>In Stock Items</span>
                        <strong class="text-success">86%</strong>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar bg-success" style="width: 86%;"></div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="d-flex justify-content-between small mb-1">
                        <span>Low Stock Items (< 5 Qty)</span>
                        <strong class="text-warning">10%</strong>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar bg-warning" style="width: 10%;"></div>
                    </div>
                </div>

                <div>
                    <div class="d-flex justify-content-between small mb-1">
                        <span>Out of Stock Items</span>
                        <strong class="text-danger">4%</strong>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar bg-danger" style="width: 4%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include_once 'includes/admin-footer.php';
?>
