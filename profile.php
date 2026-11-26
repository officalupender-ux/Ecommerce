<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/config/database.php';

// If not logged in, redirect to login page
if (empty($_SESSION['user_id'])) {
    $_SESSION['flash_error'] = 'Please sign in to view and update your profile details.';
    header('Location: login.php?redirect=profile.php');
    exit;
}

$userId = (int)$_SESSION['user_id'];
$user = null;

$stmt = $conn->prepare("SELECT id, name, email, phone, city, address, role, created_at, updated_at FROM `users` WHERE `id` = ? LIMIT 1");
if ($stmt) {
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $res = $stmt->get_result();
    $user = $res->fetch_assoc();
    $stmt->close();
}

if (!$user) {
    // Session user id no longer exists in DB
    $_SESSION = [];
    session_destroy();
    header('Location: login.php');
    exit;
}

$flashSuccess = $_SESSION['flash_success'] ?? '';
$flashError = $_SESSION['flash_error'] ?? '';
unset($_SESSION['flash_success'], $_SESSION['flash_error']);

// Include Header
include_once 'includes/header.php';
?>

<!-- Profile Hero / Breadcrumb -->
<section class="bg-light py-4 border-bottom">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-center">
            <div>
                <h1 class="h3 fw-bold mb-1">My Account & Profile</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 small">
                        <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
                    </ol>
                </nav>
            </div>
            <div class="d-flex gap-2 mt-2 mt-sm-0">
                <a href="index.php" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-cart me-1"></i> Continue Shopping
                </a>
                <a href="logout.php" class="btn btn-outline-danger btn-sm">
                    <i class="bi bi-box-arrow-right me-1"></i> Logout
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Profile Content Section -->
<section class="py-5 bg-white">
    <div class="container">

        <!-- Flash Notifications -->
        <?php if (!empty($flashSuccess)): ?>
            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center shadow-sm" role="alert">
                <i class="bi bi-check-circle-fill fs-4 me-3 text-success"></i>
                <div>
                    <h6 class="mb-0 fw-bold">Success!</h6>
                    <span><?= htmlspecialchars($flashSuccess) ?></span>
                </div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if (!empty($flashError)): ?>
            <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center shadow-sm" role="alert">
                <i class="bi bi-exclamation-triangle-fill fs-4 me-3 text-danger"></i>
                <div>
                    <h6 class="mb-0 fw-bold">Update Failed</h6>
                    <span><?= htmlspecialchars($flashError) ?></span>
                </div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="row g-4">
            <!-- Left Sidebar: Profile Summary Card -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 text-center profile-sidebar-card mb-4">
                    <div class="profile-avatar-circle mx-auto mb-3 position-relative">
                        <span class="avatar-initials"><?= strtoupper(substr($user['name'] ?? 'U', 0, 1)) ?></span>
                        <span class="badge bg-success rounded-circle position-absolute bottom-0 end-0 p-2 border border-2 border-white" title="Active Customer">
                            <span class="visually-hidden">Active</span>
                        </span>
                    </div>

                    <h4 class="fw-bold mb-1 text-dark"><?= htmlspecialchars($user['name'] ?? '') ?></h4>
                    <p class="text-muted small mb-3"><?= htmlspecialchars($user['email'] ?? '') ?></p>

                    <div class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 rounded-pill mb-3">
                        <i class="bi bi-shield-check me-1"></i> <?= ucfirst(htmlspecialchars($user['role'] ?? 'Customer')) ?>
                    </div>

                    <hr class="my-3">

                    <!-- User Quick Details List -->
                    <div class="text-start small">
                        <div class="d-flex justify-content-between py-2 border-bottom">
                            <span class="text-muted"><i class="bi bi-telephone me-2"></i>Phone:</span>
                            <span class="fw-semibold text-dark"><?= !empty($user['phone']) ? htmlspecialchars($user['phone']) : '<span class="text-muted fst-italic">Not provided</span>' ?></span>
                        </div>
                        <div class="d-flex justify-content-between py-2 border-bottom">
                            <span class="text-muted"><i class="bi bi-geo-alt me-2"></i>City:</span>
                            <span class="fw-semibold text-dark"><?= !empty($user['city']) ? htmlspecialchars($user['city']) : '<span class="text-muted fst-italic">Not provided</span>' ?></span>
                        </div>
                        <div class="d-flex justify-content-between py-2 border-bottom">
                            <span class="text-muted"><i class="bi bi-calendar3 me-2"></i>Member Since:</span>
                            <span class="fw-semibold text-dark"><?= !empty($user['created_at']) ? date('M d, Y', strtotime($user['created_at'])) : 'Recent' ?></span>
                        </div>
                        <div class="d-flex justify-content-between py-2">
                            <span class="text-muted"><i class="bi bi-clock-history me-2"></i>Last Updated:</span>
                            <span class="fw-semibold text-dark"><?= !empty($user['updated_at']) ? date('M d, Y H:i', strtotime($user['updated_at'])) : 'N/A' ?></span>
                        </div>
                    </div>

                    <div class="mt-4 pt-2">
                        <a href="logout.php" class="btn btn-outline-danger w-100 rounded-pill btn-sm">
                            <i class="bi bi-box-arrow-right me-1"></i> Sign Out
                        </a>
                    </div>
                </div>

                <!-- Fast Order Assistance Box -->
                <div class="card border-0 shadow-sm rounded-4 p-3 bg-light">
                    <div class="d-flex align-items-center">
                        <div class="p-3 bg-white rounded-3 shadow-sm text-primary me-3">
                            <i class="bi bi-headset fs-3"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Need Shopping Help?</h6>
                            <p class="text-muted small mb-0">Our 24/7 support is ready to assist with any questions.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Update Details Form -->
            <div class="col-lg-8" id="update">
                <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">
                    <div class="d-flex justify-content-between align-items-center pb-3 mb-4 border-bottom">
                        <div>
                            <h3 class="fw-bold mb-1 text-dark">
                                <i class="bi bi-person-gear text-primary me-2"></i>Update Personal Details
                            </h3>
                            <p class="text-muted small mb-0">Edit your name, contact phone, shipping address or change password</p>
                        </div>
                        <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill d-none d-sm-inline-block">
                            User ID #<?= htmlspecialchars($user['id'] ?? '') ?>
                        </span>
                    </div>

                    <!-- Profile Update Form -->
                    <form action="core/update.php" method="POST" id="profileUpdateForm">
                        <div class="row g-3">
                            <!-- Full Name -->
                            <div class="col-md-6">
                                <label for="updateName" class="form-label fw-semibold">
                                    Full Name <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-person text-muted"></i></span>
                                    <input type="text" class="form-control" id="updateName" name="name" value="<?= htmlspecialchars($user['name'] ?? '') ?>" required>
                                </div>
                            </div>

                            <!-- Email Address -->
                            <div class="col-md-6">
                                <label for="updateEmail" class="form-label fw-semibold">
                                    Email Address <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-envelope text-muted"></i></span>
                                    <input type="email" class="form-control" id="updateEmail" name="email" value="<?= htmlspecialchars($user['email'] ?? '') ?>" required>
                                </div>
                            </div>

                            <!-- Phone Number -->
                            <div class="col-md-6">
                                <label for="updatePhone" class="form-label fw-semibold">
                                    Phone Number
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-telephone text-muted"></i></span>
                                    <input type="tel" class="form-control" id="updatePhone" name="phone" placeholder="+1 (555) 234-5678" value="<?= htmlspecialchars($user['phone'] ?? '') ?>">
                                </div>
                                <div class="form-text">Used for shipping updates and order SMS alerts.</div>
                            </div>

                            <!-- City -->
                            <div class="col-md-6">
                                <label for="updateCity" class="form-label fw-semibold">
                                    City / Municipality
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-building text-muted"></i></span>
                                    <input type="text" class="form-control" id="updateCity" name="city" placeholder="e.g. San Francisco" value="<?= htmlspecialchars($user['city'] ?? '') ?>">
                                </div>
                            </div>

                            <!-- Street Address -->
                            <div class="col-12">
                                <label for="updateAddress" class="form-label fw-semibold">
                                    Delivery / Shipping Address
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-geo-alt text-muted"></i></span>
                                    <textarea class="form-control" id="updateAddress" name="address" rows="3" placeholder="Apartment, suite, street name, postal code..."><?= htmlspecialchars($user['address'] ?? '') ?></textarea>
                                </div>
                                <div class="form-text">Your default address will be automatically populated at checkout.</div>
                            </div>

                            <!-- Change Password Sub-section -->
                            <div class="col-12 mt-4 pt-3 border-top">
                                <h5 class="fw-bold text-dark mb-1">
                                    <i class="bi bi-key text-warning me-2"></i>Change Password
                                </h5>
                                <p class="text-muted small">Leave blank if you want to keep your current password</p>
                            </div>

                            <div class="col-md-6">
                                <label for="updatePassword" class="form-label fw-semibold">New Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-lock text-muted"></i></span>
                                    <input type="password" class="form-control" id="updatePassword" name="password" placeholder="Minimum 6 characters" minlength="6">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="updateConfirmPassword" class="form-label fw-semibold">Confirm New Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-shield-check text-muted"></i></span>
                                    <input type="password" class="form-control" id="updateConfirmPassword" name="confirm_password" placeholder="Re-enter new password" minlength="6">
                                </div>
                            </div>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="mt-4 pt-3 d-flex flex-wrap gap-2 justify-content-between align-items-center">
                            <span class="text-muted small">
                                <i class="bi bi-shield-lock-fill text-success me-1"></i> Your personal details are stored securely.
                            </span>
                            <button type="submit" class="btn btn-primary-custom px-4 py-2">
                                <i class="bi bi-check2-circle me-2"></i> Save & Update Details
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include_once 'includes/footer.php';
?>
