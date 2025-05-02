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
    .product-image { border-radius: 10px; border: 2px solid #ff6f61; padding: 5px; }
</style>

<h1 class="text-center">🍅 Sửa sản phẩm dễ thương 🍅</h1>
<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="POST" action="/webbanhang/Product/update" enctype="multipart/form-data" onsubmit="return validateForm();">
    <input type="hidden" name="id" value="<?php echo $product->id; ?>">

    <div class="form-group">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" id="name" name="name" class="form-control" value="<?php
        echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" required>
    </div>

    <div class="form-group">
        <label for="description">Mô tả:</label>
        <textarea id="description" name="description" class="form-control" required><?php 
        echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></textarea>
    </div>

    <div class="form-group">
        <label for="price">Giá:</label>
        <input type="number" id="price" name="price" class="form-control" step="0.01"
        value="<?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>" required>
    </div>

    <div class="form-group">
        <label for="category_id">Danh mục:</label>
        <select id="category_id" name="category_id" class="form-control" required>
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category->id; ?>" 
                <?php echo $category->id == $product->category_id ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="image">Hình ảnh:</label>
        <input type="file" id="image" name="image" class="form-control">
        <input type="hidden" name="existing_image" value="<?php echo $product->image; ?>">

        <?php if ($product->image): ?>
            <img src="/<?php echo $product->image; ?>" alt="Product Image" class="product-image" style="max-width: 100px;">
        <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
</form>

<a href="/webbanhang/Product/index" class="btn btn-secondary mt-2">Quay lại danh sách sản phẩm</a>
<?php include 'app/views/shares/footer.php'; ?>
