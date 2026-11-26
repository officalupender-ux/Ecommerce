<?php
    include_once 'includes/admin-header.php';
?>

<!-- Page Header -->
<div class="page-header">
    <div>
        <h1 class="page-title">Category Management</h1>
        <p class="page-subtitle">Organize your inventory with departments and classifications</p>
    </div>
</div>

<div class="row g-4">
    <!-- Left Column: Add New Category Form -->
    <div class="col-lg-4">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5 class="admin-card-title"><i class="bi bi-folder-plus text-primary me-2"></i>Add New Category</h5>
            </div>
            <div class="admin-card-body">
                <form id="addCategoryForm" onsubmit="event.preventDefault(); handleAddCategory();">
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Category Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="categoryName" placeholder="e.g. Footwear & Shoes" required oninput="generateSlug(this.value)">
                    </div>

                    <div class="mb-3">
                        <label for="categorySlug" class="form-label">Slug / URL Key</label>
                        <input type="text" class="form-control" id="categorySlug" placeholder="e.g. footwear-shoes">
                        <small class="text-muted">Used in website URL routes</small>
                    </div>

                    <div class="mb-3">
                        <label for="parentCategory" class="form-label">Parent Category (Optional)</label>
                        <select class="form-select" id="parentCategory">
                            <option value="">None (Top Level Category)</option>
                            <option value="Men's Fashion">Men's Fashion</option>
                            <option value="Women's Wear">Women's Wear</option>
                            <option value="Electronics">Electronics</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="categoryDesc" class="form-label">Description</label>
                        <textarea class="form-control" id="categoryDesc" rows="3" placeholder="Brief description for category banner..."></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="categoryImage" class="form-label">Category Image URL</label>
                        <input type="url" class="form-control" id="categoryImage" placeholder="https://images.unsplash.com/...">
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">
                        <i class="bi bi-plus-circle me-1"></i> Add Category
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Right Column: Category List Table -->
    <div class="col-lg-8">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5 class="admin-card-title"><i class="bi bi-tags text-success me-2"></i>Existing Categories (6)</h5>
                <div class="input-group" style="max-width: 240px;">
                    <input type="text" class="form-control form-control-sm" placeholder="Filter category...">
                </div>
            </div>
            <div class="table-responsive">
                <table class="table admin-table" id="categoryTable">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Category Name</th>
                            <th>Slug</th>
                            <th>Products</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=100&q=80" alt="Electronics" class="product-table-thumb">
                            </td>
                            <td>
                                <strong class="d-block text-dark">Electronics & Audio</strong>
                                <small class="text-muted">Headphones, Gadgets & Speakers</small>
                            </td>
                            <td><code>electronics-audio</code></td>
                            <td><span class="badge bg-secondary rounded-pill">128 items</span></td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-light border me-1" title="Edit"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-sm btn-outline-danger" title="Delete" onclick="deleteCategory(this)"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <img src="https://images.unsplash.com/photo-1516762689617-e1cffcef479d?auto=format&fit=crop&w=100&q=80" alt="Fashion" class="product-table-thumb">
                            </td>
                            <td>
                                <strong class="d-block text-dark">Men's Fashion</strong>
                                <small class="text-muted">Shirts, Jackets & Trousers</small>
                            </td>
                            <td><code>mens-fashion</code></td>
                            <td><span class="badge bg-secondary rounded-pill">340 items</span></td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-light border me-1" title="Edit"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-sm btn-outline-danger" title="Delete" onclick="deleteCategory(this)"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?auto=format&fit=crop&w=100&q=80" alt="Women" class="product-table-thumb">
                            </td>
                            <td>
                                <strong class="d-block text-dark">Women's Wear</strong>
                                <small class="text-muted">Dresses, Tops & Accessories</small>
                            </td>
                            <td><code>womens-wear</code></td>
                            <td><span class="badge bg-secondary rounded-pill">215 items</span></td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-light border me-1" title="Edit"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-sm btn-outline-danger" title="Delete" onclick="deleteCategory(this)"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=100&q=80" alt="Shoes" class="product-table-thumb">
                            </td>
                            <td>
                                <strong class="d-block text-dark">Footwear & Shoes</strong>
                                <small class="text-muted">Sneakers, Boots & Casual</small>
                            </td>
                            <td><code>footwear-shoes</code></td>
                            <td><span class="badge bg-secondary rounded-pill">190 items</span></td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-light border me-1" title="Edit"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-sm btn-outline-danger" title="Delete" onclick="deleteCategory(this)"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=100&q=80" alt="Watches" class="product-table-thumb">
                            </td>
                            <td>
                                <strong class="d-block text-dark">Watches & Wearables</strong>
                                <small class="text-muted">Smartwatches & Luxury timepieces</small>
                            </td>
                            <td><code>watches-wearables</code></td>
                            <td><span class="badge bg-secondary rounded-pill">85 items</span></td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-light border me-1" title="Edit"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-sm btn-outline-danger" title="Delete" onclick="deleteCategory(this)"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <img src="https://images.unsplash.com/photo-1513519245088-0e12902e5a38?auto=format&fit=crop&w=100&q=80" alt="Home" class="product-table-thumb">
                            </td>
                            <td>
                                <strong class="d-block text-dark">Home & Living</strong>
                                <small class="text-muted">Decor, Lights & Essentials</small>
                            </td>
                            <td><code>home-living</code></td>
                            <td><span class="badge bg-secondary rounded-pill">64 items</span></td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-light border me-1" title="Edit"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-sm btn-outline-danger" title="Delete" onclick="deleteCategory(this)"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function generateSlug(text) {
        document.getElementById('categorySlug').value = text.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)+/g, '');
    }

    function handleAddCategory() {
        const name = document.getElementById('categoryName').value;
        const slug = document.getElementById('categorySlug').value;
        const imgUrl = document.getElementById('categoryImage').value || 'https://images.unsplash.com/photo-1472851294608-062f824d29cc?auto=format&fit=crop&w=100&q=80';

        const tbody = document.querySelector('#categoryTable tbody');
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>
                <img src="${imgUrl}" alt="${name}" class="product-table-thumb">
            </td>
            <td>
                <strong class="d-block text-dark">${name}</strong>
                <small class="text-muted">Newly added category</small>
            </td>
            <td><code>${slug}</code></td>
            <td><span class="badge bg-secondary rounded-pill">0 items</span></td>
            <td><span class="badge bg-success">Active</span></td>
            <td class="text-end">
                <button class="btn btn-sm btn-light border me-1" title="Edit"><i class="bi bi-pencil"></i></button>
                <button class="btn btn-sm btn-outline-danger" title="Delete" onclick="deleteCategory(this)"><i class="bi bi-trash"></i></button>
            </td>
        `;
        tbody.prepend(newRow);

        alert(`Category "${name}" successfully added!`);
        document.getElementById('addCategoryForm').reset();
    }

    function deleteCategory(btn) {
        if (confirm("Are you sure you want to delete this category?")) {
            btn.closest('tr').remove();
        }
    }
</script>

<?php
    include_once 'includes/admin-footer.php';
?>
