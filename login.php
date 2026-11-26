<?php
// Include Header
include_once 'includes/header.php';

?>

<div class="auth-page-wrapper py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 col-sm-11">
                <div class="auth-card shadow-sm border-0 rounded-4 bg-white p-4 p-md-5">
                    <div class="text-center mb-4">
                        <div class="auth-icon-circle mx-auto mb-3">
                            <i class="bi bi-box-arrow-in-right text-primary fs-2"></i>
                        </div>
                        <h2 class="auth-title fw-bold text-dark">Welcome Back</h2>
                        <p class="text-muted small">Log in to manage your account and view your profile details</p>
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

                    <!-- Form submits cleanly to core/login.php -->
                    <form action="core/login.php" method="POST">
                        <div class="mb-3">
                            <label for="loginEmail" class="form-label fw-semibold">Email Address <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-envelope text-muted"></i></span>
                                <input type="email" class="form-control border-start-0" id="loginEmail" name="email" placeholder="name@example.com" required autofocus>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <label for="loginPassword" class="form-label fw-semibold mb-0">Password <span class="text-danger">*</span></label>
                                <a href="javascript:void(0)" onclick="alert('Please contact support or register a new account.')" class="small text-decoration-none text-primary">Forgot Password?</a>
                            </div>
                            <div class="input-group mt-1">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-lock text-muted"></i></span>
                                <input type="password" class="form-control border-start-0" id="loginPassword" name="password" placeholder="••••••••" required>
                                <button class="btn btn-light border border-start-0 text-muted" type="button" onclick="togglePasswordVisibility('loginPassword', this)">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mb-4 form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe">
                            <label class="form-check-label text-muted small" for="rememberMe">Remember me on this browser</label>
                        </div>

                        <button type="submit" name="login_submit" class="btn btn-primary-custom w-100 py-2 fw-semibold fs-6">
                            Sign In to Account <i class="bi bi-arrow-right ms-2"></i>
                        </button>
                    </form>

                    <div class="text-center mt-4 pt-3 border-top">
                        <p class="text-muted small mb-0">
                            Don't have an account yet? 
                            <a href="register.php" class="text-primary fw-bold text-decoration-none">Create an Account</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function togglePasswordVisibility(inputId, btn) {
    const input = document.getElementById(inputId);
    const icon = btn.querySelector('i');
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
    }
}
</script>

<?php
include_once 'includes/footer.php';
?>
