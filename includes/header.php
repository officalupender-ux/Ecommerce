<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../config/database.php';

$isLoggedIn = !empty($_SESSION['user_id']);
$currentUser = null;

if ($isLoggedIn) {
    $currentUserId = (int)$_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT id, name, email, phone, city, address, role FROM `users` WHERE id = ? LIMIT 1");
    if ($stmt) {
        $stmt->bind_param("i", $currentUserId);
        $stmt->execute();
        $userRes = $stmt->get_result();
        if ($userRow = $userRes->fetch_assoc()) {
            $currentUser = $userRow;
        }
        $stmt->close();
    }
    // Fallback to session values if query didn't return
    if (!$currentUser) {
        $currentUser = [
            'id' => $_SESSION['user_id'],
            'name' => $_SESSION['user_name'] ?? 'User',
            'email' => $_SESSION['user_email'] ?? '',
            'phone' => '',
            'city' => '',
            'address' => '',
            'role' => 'customer'
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EliteStore - Modern E-Commerce Platform</title>
    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <!-- Top Info Bar -->
    <div class="top-bar d-none d-md-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <span><i class="bi bi-truck me-2 text-warning"></i>Free Express Shipping on Orders Over $75!</span>
                </div>
                <div class="col-md-6 text-end">
                    <span class="me-3"><i class="bi bi-telephone me-1"></i> +1 (800) 555-0199</span>
                    <?php if ($isLoggedIn && !empty($currentUser)): ?>
                        <a href="profile.php" class="me-3">
                            <i class="bi bi-person-circle me-1 text-warning"></i> 
                            Hi, <?= htmlspecialchars(explode(' ', $currentUser['name'] ?? 'User')[0]) ?>
                        </a>
                        <a href="logout.php"><i class="bi bi-box-arrow-right me-1"></i> Logout</a>
                    <?php else: ?>
                        <a href="login.php" class="me-3" data-bs-toggle="modal" data-bs-target="#authModal">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Sign In
                        </a>
                        <a href="register.php"><i class="bi bi-person-plus me-1"></i> Register</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm py-3">
        <div class="container">
            <!-- Brand Logo -->
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <i class="bi bi-bag-heart-fill me-2 text-danger fs-3"></i>
                <span>Elite</span>Store
            </a>

            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Links & Search -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu border-0 shadow-sm" aria-labelledby="categoriesDropdown">
                            <li><a class="dropdown-item py-2" href="index.php#products"><i class="bi bi-laptop me-2"></i>Electronics</a></li>
                            <li><a class="dropdown-item py-2" href="index.php#products"><i class="bi bi-gender-male me-2"></i>Men's Fashion</a></li>
                            <li><a class="dropdown-item py-2" href="index.php#products"><i class="bi bi-gender-female me-2"></i>Women's Wear</a></li>
                            <li><a class="dropdown-item py-2" href="index.php#products"><i class="bi bi-house me-2"></i>Home & Living</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item py-2" href="index.php#products"><i class="bi bi-grid me-2"></i>All Collections</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#featured">Featured</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#deals">Special Deals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#reviews">Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#contact">Contact</a>
                    </li>
                </ul>

                <!-- Search Input Bar -->
                <form class="d-flex me-3 my-2 my-lg-0" role="search" onsubmit="event.preventDefault();">
                    <div class="input-group">
                        <input class="form-control search-bar-input" type="search" placeholder="Search products..." aria-label="Search">
                        <button class="btn search-bar-btn px-3" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>

                <!-- Action Icons: Wishlist, Cart, User Profile/Account -->
                <div class="d-flex align-items-center gap-2 mt-3 mt-lg-0">
                    <a href="#wishlist" class="btn btn-light rounded-circle position-relative p-2" title="Wishlist">
                        <i class="bi bi-heart fs-5"></i>
                        <span class="badge-cart">3</span>
                    </a>
                    <a href="#cart" class="btn btn-light rounded-circle position-relative p-2" title="Cart">
                        <i class="bi bi-cart3 fs-5"></i>
                        <span class="badge-cart">2</span>
                    </a>

                    <!-- Profile / Account Button -->
                    <?php if ($isLoggedIn && !empty($currentUser)): ?>
                        <div class="dropdown">
                            <button class="btn btn-light rounded-pill px-3 py-2 d-flex align-items-center gap-2 border dropdown-toggle shadow-sm" type="button" id="userAccountMenu" data-bs-toggle="dropdown" aria-expanded="false" title="My Account">
                                <span class="badge rounded-circle bg-danger text-white d-inline-flex align-items-center justify-content-center" style="width: 26px; height: 26px; font-size: 0.8rem; font-weight: 700;">
                                    <?= strtoupper(substr($currentUser['name'] ?? 'U', 0, 1)) ?>
                                </span>
                                <span class="d-none d-sm-inline fw-semibold small text-truncate" style="max-width: 100px;">
                                    <?= htmlspecialchars(explode(' ', $currentUser['name'] ?? 'User')[0]) ?>
                                </span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg py-2 mt-2" aria-labelledby="userAccountMenu" style="min-width: 240px; border-radius: 12px;">
                                <li class="px-3 py-2 bg-light border-bottom">
                                    <div class="fw-bold text-dark text-truncate"><?= htmlspecialchars($currentUser['name'] ?? '') ?></div>
                                    <div class="small text-muted text-truncate"><?= htmlspecialchars($currentUser['email'] ?? '') ?></div>
                                </li>
                                <li>
                                    <a class="dropdown-item py-2" href="profile.php">
                                        <i class="bi bi-person-gear text-primary me-2"></i>My Profile & Details
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item py-2" href="profile.php#update">
                                        <i class="bi bi-pencil-square text-success me-2"></i>Update Personal Details
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item py-2" href="#" data-bs-toggle="modal" data-bs-target="#quickUpdateModal">
                                        <i class="bi bi-lightning-charge text-warning me-2"></i>Quick Update Modal
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider my-1"></li>
                                <li>
                                    <a class="dropdown-item py-2 text-danger" href="logout.php">
                                        <i class="bi bi-box-arrow-right me-2"></i>Sign Out
                                    </a>
                                </li>
                            </ul>
                        </div>
                    <?php else: ?>
                        <!-- When Not Logged In: clicking the profile icon opens the Login/Register Modal -->
                        <button type="button" class="btn btn-light rounded-circle p-2 ms-1 shadow-sm" data-bs-toggle="modal" data-bs-target="#authModal" title="Sign In or Register">
                            <i class="bi bi-person-circle fs-5 text-dark"></i>
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
