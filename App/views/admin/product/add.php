<?php include 'app/views/shares/header.php'; ?>
<style>
    body { background-color: #fff0f5; } /* Nền hồng nhạt dễ thương */
    h1 { color: #ff3d30; text-shadow: 2px 2px 4px rgba(255, 61, 48, 0.3); }
    .form-control { border: 2px solid #ff6f61; background-color: #ffe4e1; }
    .btn-primary { background-color: #ff6f61; border-color: #ff6f61; }
    .btn-primary:hover { background-color: #ff3d30; border-color: #ff3d30; }
    .btn-secondary { background-color: #4caf50; border-color: #4caf50; }
    .btn-secondary:hover { background-color: #388e3c; border-color: #388e3c; }
    .alert-danger { background-color: #ffccd5; color: #d32f2f; }
</style>

<h1 class="text-center">🍅 Thêm sản phẩm mới 🍅</h1>
<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="POST" action="/DACS/Product/save" enctype="multipart/form-data" onsubmit="return validateForm();">
    <div class="form-group">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description">Mô tả:</label>
        <textarea id="description" name="description" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <label for="price">Giá:</label>
        <input type="number" id="price" name="price" class="form-control" step="0.01" required>
    </div>

    <div class="form-group">
        <label for="category_id">Danh mục:</label>
        <select id="category_id" name="category_id" class="form-control" required>
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category->id; ?>">
                    <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="image">Hình ảnh:</label>
        <input type="file" id="image" name="image" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
</form>

<a href="/DACS/Product/index" class="btn btn-secondary mt-2">Quay lại danh sách sản phẩm</a>
<?php include 'app/views/shares/footer.php'; ?>
