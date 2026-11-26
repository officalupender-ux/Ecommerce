<!-- Sidebar Navigation -->
<aside class="admin-sidebar" id="adminSidebar">
    <!-- Brand Logo -->
    <a href="index.php" class="sidebar-brand">
        <i class="bi bi-shield-lock-fill"></i>
        <span>Elite<strong>Admin</strong></span>
    </a>

    <!-- Menu Links -->
    <ul class="sidebar-menu">
        <li class="menu-header">Overview</li>
        <li>
            <a href="index.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>">
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="menu-header">Inventory & Catalog</li>
        <li>
            <a href="products.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'products.php') ? 'active' : ''; ?>">
                <i class="bi bi-box-seam-fill"></i>
                <span>All Products</span>
            </a>
        </li>
        <li>
            <a href="add-product.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'add-product.php') ? 'active' : ''; ?>">
                <i class="bi bi-plus-circle-fill"></i>
                <span>Add Product</span>
            </a>
        </li>
        <li>
            <a href="categories.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'categories.php') ? 'active' : ''; ?>">
                <i class="bi bi-tags-fill"></i>
                <span>Categories</span>
            </a>
        </li>

        <li class="menu-header">Sales & Users</li>
        <li>
            <a href="#orders">
                <i class="bi bi-cart-check-fill"></i>
                <span>Orders</span>
                <span class="badge bg-danger rounded-pill ms-auto">New</span>
            </a>
        </li>
        <li>
            <a href="#customers">
                <i class="bi bi-people-fill"></i>
                <span>Customers</span>
            </a>
        </li>
        <li>
            <a href="#reviews">
                <i class="bi bi-chat-left-heart-fill"></i>
                <span>Reviews</span>
            </a>
        </li>

        <li class="menu-header">System</li>
        <li>
            <a href="#settings">
                <i class="bi bi-gear-fill"></i>
                <span>Settings</span>
            </a>
        </li>
    </ul>

    <!-- Bottom Store Link -->
    <div class="sidebar-footer">
        <a href="../index.php" target="_blank" class="view-store-btn">
            <i class="bi bi-shop"></i>
            <span>Visit Storefront</span>
        </a>
    </div>
</aside>
