<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - EliteStore</title>
    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Admin Custom CSS -->
    <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>

<div class="admin-wrapper">
    <!-- Sidebar -->
    <?php include_once 'includes/admin-sidebar.php'; ?>

    <!-- Main Content Container -->
    <div class="admin-main">
        <!-- Top Navbar -->
        <header class="admin-navbar">
            <div class="d-flex align-items-center gap-3">
                <button class="toggle-sidebar-btn" id="sidebarToggle" title="Toggle Sidebar">
                    <i class="bi bi-list fs-4"></i>
                </button>
                <div class="admin-search d-none d-md-block">
                    <i class="bi bi-search"></i>
                    <input type="text" class="form-control" placeholder="Search orders, products, sku...">
                </div>
            </div>

            <!-- Navbar Actions -->
            <div class="d-flex align-items-center gap-3">
                <a href="../index.php" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3 d-none d-sm-inline-flex align-items-center gap-1">
                    <i class="bi bi-box-arrow-up-right"></i> Live Store
                </a>

                <!-- Notifications Dropdown -->
                <div class="dropdown">
                    <button class="btn btn-light position-relative rounded-circle p-2" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-bell fs-5"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.65rem;">
                            3
                        </span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow py-2" style="width: 280px;">
                        <li class="px-3 py-2 fw-bold border-bottom">Notifications</li>
                        <li><a class="dropdown-item py-2 small" href="#"><i class="bi bi-bag-check text-success me-2"></i>New order #1084 received</a></li>
                        <li><a class="dropdown-item py-2 small" href="#"><i class="bi bi-exclamation-triangle text-warning me-2"></i>Item "Earphones" low stock (Qty: 2)</a></li>
                        <li><a class="dropdown-item py-2 small" href="#"><i class="bi bi-person-plus text-primary me-2"></i>New customer registered</a></li>
                    </ul>
                </div>

                <!-- Admin Profile Dropdown -->
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle text-dark" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&q=80" alt="Admin" class="admin-profile-img me-2">
                        <div class="d-none d-md-block text-start lh-1">
                            <span class="fw-semibold d-block" style="font-size: 0.9rem;">Alex Morgan</span>
                            <small class="text-muted" style="font-size: 0.75rem;">Super Admin</small>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow py-2">
                        <li><a class="dropdown-item py-2" href="#"><i class="bi bi-person me-2"></i>Profile Settings</a></li>
                        <li><a class="dropdown-item py-2" href="#"><i class="bi bi-gear me-2"></i>Store Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item py-2 text-danger" href="#"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
        </header>

        <!-- Dynamic Page Content Starts Inside Individual Pages -->
        <main class="admin-content">
