    <!-- Main Footer -->
    <footer class="main-footer" id="contact">
        <div class="container">
            <div class="row g-4 pb-4">
                <!-- Company Info -->
                <div class="col-lg-4 col-md-6">
                    <a href="index.php" class="footer-brand">
                        <i class="bi bi-bag-heart-fill me-2 text-danger"></i><span>Elite</span>Store
                    </a>
                    <p class="footer-desc pe-lg-4">
                        Discover the ultimate online shopping destination. We provide high-quality curated fashion, electronics, and home essentials with guaranteed customer satisfaction and fast worldwide delivery.
                    </p>
                    <div class="social-links mt-3">
                        <a href="#" title="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" title="Instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" title="Twitter"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" title="YouTube"><i class="bi bi-youtube"></i></a>
                        <a href="#" title="LinkedIn"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-lg-2 col-md-6 col-6">
                    <h5 class="footer-heading">Quick Links</h5>
                    <ul class="footer-links">
                        <li><a href="index.php"><i class="bi bi-chevron-right"></i> Home</a></li>
                        <li><a href="index.php#products"><i class="bi bi-chevron-right"></i> Shop Products</a></li>
                        <li><a href="index.php#deals"><i class="bi bi-chevron-right"></i> Daily Deals</a></li>
                        <li><a href="index.php#reviews"><i class="bi bi-chevron-right"></i> Customer Reviews</a></li>
                        <li><a href="admin/index.php" target="_blank"><i class="bi bi-chevron-right"></i> Admin Panel</a></li>
                    </ul>
                </div>

                <!-- Customer Care -->
                <div class="col-lg-3 col-md-6 col-6">
                    <h5 class="footer-heading">Customer Care</h5>
                    <ul class="footer-links">
                        <?php if (isset($isLoggedIn) && $isLoggedIn): ?>
                            <li><a href="profile.php"><i class="bi bi-chevron-right"></i> My Account & Profile</a></li>
                            <li><a href="profile.php#update"><i class="bi bi-chevron-right"></i> Update Details</a></li>
                            <li><a href="logout.php"><i class="bi bi-chevron-right"></i> Sign Out</a></li>
                        <?php else: ?>
                            <li><a href="login.php" data-bs-toggle="modal" data-bs-target="#authModal"><i class="bi bi-chevron-right"></i> Sign In / Login</a></li>
                            <li><a href="register.php"><i class="bi bi-chevron-right"></i> Create Account</a></li>
                        <?php endif; ?>
                        <li><a href="#terms"><i class="bi bi-chevron-right"></i> Privacy & Policy</a></li>
                        <li><a href="#returns"><i class="bi bi-chevron-right"></i> Return & Refund</a></li>
                    </ul>
                </div>

                <!-- Store Contact -->
                <div class="col-lg-3 col-md-6">
                    <h5 class="footer-heading">Store Info</h5>
                    <ul class="list-unstyled footer-contact">
                        <li>
                            <i class="bi bi-geo-alt-fill"></i>
                            <span>123 Innovation Boulevard, Tech District, NY 10001, United States</span>
                        </li>
                        <li>
                            <i class="bi bi-telephone-fill"></i>
                            <span>+1 (800) 555-0199 / +91 98765 43210</span>
                        </li>
                        <li>
                            <i class="bi bi-envelope-fill"></i>
                            <span>support@elitestore.com</span>
                        </li>
                        <li>
                            <i class="bi bi-clock-fill"></i>
                            <span>Mon - Sat: 9:00 AM - 8:00 PM</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="row align-items-center">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <p class="mb-0">&copy; 2026 EliteStore. All Rights Reserved. Crafted with passion.</p>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <span class="me-2 text-secondary">Secured Payment Gateways:</span>
                        <i class="bi bi-credit-card-2-front-fill fs-5 text-light mx-1"></i>
                        <i class="bi bi-paypal fs-5 text-light mx-1"></i>
                        <i class="bi bi-shield-lock-fill fs-5 text-light mx-1"></i>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- ========================================== -->
    <!-- AUTH MODAL (LOGIN & REGISTRATION FORMS) -->
    <!-- ========================================== -->
    <div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="modal-header border-0 bg-light pb-0">
                    <ul class="nav nav-pills w-100 nav-justified auth-nav-pills" id="authTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active fw-bold py-3" id="login-tab" data-bs-toggle="tab" data-bs-target="#login-tab-pane" type="button" role="tab" aria-controls="login-tab-pane" aria-selected="true">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-bold py-3" id="register-tab" data-bs-toggle="tab" data-bs-target="#register-tab-pane" type="button" role="tab" aria-controls="register-tab-pane" aria-selected="false">
                                <i class="bi bi-person-plus me-2"></i>Create Account
                            </button>
                        </li>
                    </ul>
                    <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-4 p-md-5">
                    <div class="tab-content" id="authTabContent">
                        
                        <!-- TAB 1: LOGIN FORM -->
                        <div class="tab-pane fade show active" id="login-tab-pane" role="tabpanel" aria-labelledby="login-tab" tabindex="0">
                            <div class="text-center mb-4">
                                <h4 class="fw-bold text-dark">Welcome to EliteStore</h4>
                                <p class="text-muted small">Sign in to access your orders and update your account details</p>
                            </div>

                            <form action="core/login.php" method="POST">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Email Address <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-envelope text-muted"></i></span>
                                        <input type="email" class="form-control" name="email" placeholder="name@example.com" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label class="form-label fw-semibold mb-0">Password <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="input-group mt-1">
                                        <span class="input-group-text bg-light"><i class="bi bi-lock text-muted"></i></span>
                                        <input type="password" class="form-control" name="password" placeholder="••••••••" required>
                                    </div>
                                </div>

                                <div class="mb-4 form-check">
                                    <input type="checkbox" class="form-check-input" id="modalRememberMe">
                                    <label class="form-check-label text-muted small" for="modalRememberMe">Keep me logged in</label>
                                </div>

                                <button type="submit" name="login_submit" class="btn btn-primary-custom w-100 py-2 fw-semibold">
                                    Sign In <i class="bi bi-arrow-right ms-2"></i>
                                </button>
                            </form>

                            <div class="text-center mt-4">
                                <p class="text-muted small mb-0">
                                    New here? 
                                    <a href="javascript:void(0)" onclick="bootstrap.Tab.getOrCreateInstance(document.getElementById('register-tab')).show();" class="text-primary fw-bold text-decoration-none">
                                        Create a free account
                                    </a>
                                </p>
                            </div>
                        </div>

                        <!-- TAB 2: REGISTRATION FORM -->
                        <div class="tab-pane fade" id="register-tab-pane" role="tabpanel" aria-labelledby="register-tab" tabindex="0">
                            <div class="text-center mb-4">
                                <h4 class="fw-bold text-dark">Create Your Account</h4>
                                <p class="text-muted small">Sign up to manage and update your profile details anytime</p>
                            </div>

                            <form action="core/insert.php" method="POST">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light"><i class="bi bi-person text-muted"></i></span>
                                            <input type="text" class="form-control" name="name" placeholder="John Doe" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Email Address <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light"><i class="bi bi-envelope text-muted"></i></span>
                                            <input type="email" class="form-control" name="email" placeholder="name@example.com" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Phone Number</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light"><i class="bi bi-telephone text-muted"></i></span>
                                            <input type="tel" class="form-control" name="phone" placeholder="+1 (555) 000-0000">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">City</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light"><i class="bi bi-building text-muted"></i></span>
                                            <input type="text" class="form-control" name="city" placeholder="e.g. New York">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fw-semibold">Street Address</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light"><i class="bi bi-geo-alt text-muted"></i></span>
                                            <input type="text" class="form-control" name="address" placeholder="123 Street Name, Apartment, Suite">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Password <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light"><i class="bi bi-lock text-muted"></i></span>
                                            <input type="password" class="form-control" name="password" placeholder="Min 6 characters" minlength="6" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Confirm Password <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light"><i class="bi bi-shield-check text-muted"></i></span>
                                            <input type="password" class="form-control" name="confirm_password" placeholder="Re-enter password" minlength="6" required>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" name="register_submit" class="btn btn-primary-custom w-100 py-2 fw-semibold mt-4">
                                    Register Account <i class="bi bi-check-circle ms-2"></i>
                                </button>
                            </form>

                            <div class="text-center mt-4">
                                <p class="text-muted small mb-0">
                                    Already have an account? 
                                    <a href="javascript:void(0)" onclick="bootstrap.Tab.getOrCreateInstance(document.getElementById('login-tab')).show();" class="text-primary fw-bold text-decoration-none">
                                        Sign In
                                    </a>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if (isset($isLoggedIn) && $isLoggedIn && isset($currentUser) && $currentUser): ?>
    <!-- ========================================== -->
    <!-- QUICK PROFILE UPDATE MODAL (LOGGED IN) -->
    <!-- ========================================== -->
    <div class="modal fade" id="quickUpdateModal" tabindex="-1" aria-labelledby="quickUpdateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="modal-header border-bottom bg-light">
                    <h5 class="modal-title fw-bold text-dark" id="quickUpdateModalLabel">
                        <i class="bi bi-person-gear text-primary me-2"></i>Update Profile Details
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div id="quickUpdateAlert" class="d-none alert mb-3" role="alert"></div>

                    <form id="quickUpdateDetailsForm" action="core/update.php" method="POST">
                        <input type="hidden" name="ajax" value="1">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-person"></i></span>
                                    <input type="text" class="form-control" name="name" id="quickName" value="<?= htmlspecialchars($currentUser['name'] ?? '') ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Email Address <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-envelope"></i></span>
                                    <input type="email" class="form-control" name="email" id="quickEmail" value="<?= htmlspecialchars($currentUser['email'] ?? '') ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Phone Number</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-telephone"></i></span>
                                    <input type="tel" class="form-control" name="phone" id="quickPhone" value="<?= htmlspecialchars($currentUser['phone'] ?? '') ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">City</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-building"></i></span>
                                    <input type="text" class="form-control" name="city" id="quickCity" value="<?= htmlspecialchars($currentUser['city'] ?? '') ?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Delivery Address</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-geo-alt"></i></span>
                                    <textarea class="form-control" name="address" id="quickAddress" rows="2"><?= htmlspecialchars($currentUser['address'] ?? '') ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">New Password <small class="text-muted fw-normal">(optional)</small></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-lock"></i></span>
                                    <input type="password" class="form-control" name="password" placeholder="Leave blank to keep current">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Confirm Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-shield-check"></i></span>
                                    <input type="password" class="form-control" name="confirm_password" placeholder="Re-type new password">
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer border-0 px-0 pb-0 mt-4 d-flex justify-content-between">
                            <a href="profile.php" class="btn btn-outline-secondary">
                                <i class="bi bi-box-arrow-up-right me-1"></i> Full Profile Page
                            </a>
                            <button type="submit" id="quickUpdateBtn" class="btn btn-primary-custom px-4">
                                <i class="bi bi-check2-circle me-1"></i> Update Details Now
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    // AJAX update for quick update modal
    document.getElementById('quickUpdateDetailsForm')?.addEventListener('submit', function(e) {
        e.preventDefault();
        const form = this;
        const btn = document.getElementById('quickUpdateBtn');
        const alertBox = document.getElementById('quickUpdateAlert');
        const originalBtnHtml = btn.innerHTML;

        btn.disabled = true;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Updating...';
        alertBox.className = 'd-none alert';

        const formData = new FormData(form);

        fetch('core/update.php', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(res => res.json())
        .then(data => {
            btn.disabled = false;
            btn.innerHTML = originalBtnHtml;

            if (data.status) {
                alertBox.className = 'alert alert-success d-flex align-items-center';
                alertBox.innerHTML = '<i class="bi bi-check-circle-fill me-2 fs-5"></i><div>' + data.message + '</div>';
                
                setTimeout(() => {
                    window.location.reload();
                }, 1200);
            } else {
                alertBox.className = 'alert alert-danger d-flex align-items-center';
                alertBox.innerHTML = '<i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i><div>' + data.message + '</div>';
            }
        })
        .catch(err => {
            btn.disabled = false;
            btn.innerHTML = originalBtnHtml;
            alertBox.className = 'alert alert-danger d-flex align-items-center';
            alertBox.innerHTML = '<i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i><div>An error occurred while updating details. Please try again.</div>';
        });
    });
    </script>
    <?php endif; ?>

    <!-- Bootstrap 5 Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
