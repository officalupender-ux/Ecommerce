<?php
// Include Header
include_once 'includes/header.php';

?>

<div class="auth-page-wrapper py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10">
                <div class="auth-card shadow-sm border-0 rounded-4 bg-white p-4 p-md-5">
                    <div class="text-center mb-4">
                        <div class="auth-icon-circle mx-auto mb-3">
                            <i class="bi bi-person-plus text-primary fs-2"></i>
                        </div>
                        <h2 class="auth-title fw-bold text-dark">Create Your Account</h2>
                        <p class="text-muted small">Join EliteStore to track orders, save shipping details, and manage your profile</p>
                    </div>

                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                            <div><?= htmlspecialchars($error) ?></div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($success)): ?>
                        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                            <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                            <div><?= htmlspecialchars($success) ?></div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <!-- Form submits cleanly to core/insert.php -->
                    <form action="core/insert.php" method="POST" id="registrationForm">
                        <div class="row g-3">
                            <!-- Full Name -->
                            <div class="col-md-6">
                                <label for="regName" class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-person text-muted"></i></span>
                                    <input type="text" class="form-control border-start-0" id="regName" name="name" placeholder="John Doe" required>
                                </div>
                            </div>

                            <!-- Email Address -->
                            <div class="col-md-6">
                                <label for="regEmail" class="form-label fw-semibold">Email Address <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-envelope text-muted"></i></span>
                                    <input type="email" class="form-control border-start-0" id="regEmail" name="email" placeholder="name@example.com" required>
                                </div>
                            </div>

                            <!-- Phone Number -->
                            <div class="col-md-6">
                                <label for="regPhone" class="form-label fw-semibold">Phone Number</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-telephone text-muted"></i></span>
                                    <input type="tel" class="form-control border-start-0" id="regPhone" name="phone" placeholder="+1 (555) 000-0000">
                                </div>
                            </div>

                            <!-- City -->
                            <div class="col-md-6">
                                <label for="regCity" class="form-label fw-semibold">City</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-building text-muted"></i></span>
                                    <input type="text" class="form-control border-start-0" id="regCity" name="city" placeholder="New York">
                                </div>
                            </div>

                            <!-- Street Address -->
                            <div class="col-12">
                                <label for="regAddress" class="form-label fw-semibold">Street Address / Landmark</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-geo-alt text-muted"></i></span>
                                    <input type="text" class="form-control border-start-0" id="regAddress" name="address" placeholder="123 Shopping Avenue, Apt 4B">
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="col-md-6">
                                <label for="regPassword" class="form-label fw-semibold">Password <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-lock text-muted"></i></span>
                                    <input type="password" class="form-control border-start-0" id="regPassword" name="password" placeholder="At least 6 characters" minlength="6" required>
                                </div>
                            </div>

                            <!-- Confirm Password -->
                            <div class="col-md-6">
                                <label for="regConfirmPassword" class="form-label fw-semibold">Confirm Password <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-shield-check text-muted"></i></span>
                                    <input type="password" class="form-control border-start-0" id="regConfirmPassword" name="confirm_password" placeholder="Re-type password" minlength="6" required>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 mb-4 form-check">
                            <input type="checkbox" class="form-check-input" id="termsAgree" required checked>
                            <label class="form-check-label text-muted small" for="termsAgree">
                                I agree to the <a href="#terms" class="text-primary text-decoration-none">Terms of Service</a> and <a href="#privacy" class="text-primary text-decoration-none">Privacy Policy</a>
                            </label>
                        </div>

                        <button type="submit" name="register_submit" class="btn btn-primary-custom w-100 py-2 fw-semibold fs-6">
                            Create Account <i class="bi bi-check-circle ms-2"></i>
                        </button>
                    </form>

                    <div class="text-center mt-4 pt-3 border-top">
                        <p class="text-muted small mb-0">
                            Already registered? 
                            <a href="login.php" class="text-primary fw-bold text-decoration-none">Sign In to Account</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'includes/footer.php';
?>
