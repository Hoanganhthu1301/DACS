<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-4">
    <h1 class="text-center mb-4">🍅 Danh sách sản phẩm 🍅</h1>

    <!-- Button to add new product -->
    <div class="d-flex justify-content-between flex-wrap mb-3">
    <a href="/webbanhang/Product/add" class="btn btn-success mb-2">🍅 Thêm sản phẩm mới 🍅</a>

    <div class="d-flex flex-wrap gap-2">
        <!-- Tìm kiếm -->
        <form action="/webbanhang/Product/search" method="GET" class="d-flex mb-4">
    <input type="text" name="keyword" class="form-control me-2" placeholder="🔍 Tìm sản phẩm..." required>
    <button type="submit" class="btn btn-primary">Tìm</button>
</form>

        <?php if (!empty($_GET['keyword'])): ?>
    <p>Kết quả tìm kiếm cho: <strong><?= htmlspecialchars($_GET['keyword']) ?></strong></p>
<?php endif; ?>
        <!-- Sắp xếp -->
        <div class="d-flex justify-content-end mb-3">
    <form method="GET" action="/webbanhang/Product/sort" class="form-inline">
        <label class="me-2">Sắp xếp theo giá:</label>
        <select name="order" class="form-control me-2" onchange="this.form.submit()">
            <option value="asc" <?= ($_GET['order'] ?? '') == 'asc' ? 'selected' : '' ?>>Tăng dần</option>
            <option value="desc" <?= ($_GET['order'] ?? '') == 'desc' ? 'selected' : '' ?>>Giảm dần</option>
        </select>
    </form>
</div>
    </div>
    
</div>

<?php if (!empty($_GET['keyword'])): ?>
    <p>Kết quả tìm kiếm cho: <strong><?= htmlspecialchars($_GET['keyword']) ?></strong></p>
<?php endif; ?>
    <!-- Product list -->
    <div class="row">
        <?php foreach ($products as $product): ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <?php if ($product->image): ?>
                        <img src="/webbanhang/<?php echo $product->image; ?>" class="card-img-top" alt="Product Image" style="height: 200px; object-fit: cover;">
                    <?php else: ?>
                        <img src="https://via.placeholder.com/300" class="card-img-top" alt="Product Image" style="height: 200px; object-fit: cover;">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="/webbanhang/Product/show/<?php echo $product->id; ?>" class="text-decoration-none text-light">
                                <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                            </a>
                        </h5>
                        <p class="card-text"><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>
                        <p class="card-text"><strong>Giá:</strong> <?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?> VND</p>
                        <p class="card-text"><strong>Danh mục:</strong> <?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?></p>
                        <div class="d-flex justify-content-between">
                            <a href="/webbanhang/Product/edit/<?php echo $product->id; ?>" class="btn btn-warning btn-sm">Sửa</a>
                            <a href="/webbanhang/Product/delete/<?php echo $product->id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</a>
                            <a href="/webbanhang/Product/addToCart/<?php echo $product->id; ?>" class="btn btn-primary btn-sm">Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>


<?php include 'app/views/shares/footer.php'; ?>
<style>
 /* app/css/style.css */

/* Cấu hình chung cho toàn bộ body */
/* Cấu hình chung cho toàn bộ body */
body {
    background-color: #ffebee;
    color: #333;
    font-family: 'Comic Sans MS', cursive, sans-serif;
}

/* Header */
header {
    background-color: #e74c3c;
    color: #fff;
    padding: 15px;
    text-align: center;
    font-weight: bold;
    font-size: 24px;
    border-bottom: 4px solid #c0392b;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px; /* Khoảng cách giữa icon và chữ */
}

header::before {
    content: "🍅";  /* Icon trái cà chua */
    font-size: 28px;
}

/* Card styling */
.card {
    background-color: #ffccd5;
    border: 2px solid #e74c3c;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(231, 76, 60, 0.3);
    color: #333;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 12px rgba(231, 76, 60, 0.5);
}

/* Card title and link styling */
.card-title a {
    color: #e74c3c;
    text-decoration: none;
    font-weight: bold;
}

.card-title a:hover {
    color: #c0392b;
}

/* Icon trái cà chua cho tiêu đề sản phẩm */
.card-title::before {
    content: "🍅";
    margin-right: 5px;
}

/* Button styling */
.btn {
    color: #fff;
    border-radius: 20px;
    transition: background-color 0.3s;
}

/* Button color for primary button (Add to Cart) */
.btn-primary {
    background-color: #e74c3c;
    border-color: #e74c3c;
}

.btn-primary:hover {
    background-color: #c0392b;
    border-color: #c0392b;
}

/* Button color for warning button (Edit) */
.btn-warning {
    background-color: #f39c12;
    border-color: #f39c12;
}

.btn-warning:hover {
    background-color: #f1c40f;
    border-color: #f1c40f;
}

/* Button color for danger button (Delete) */
.btn-danger {
    background-color: #e74c3c;
    border-color: #e74c3c;
}

.btn-danger:hover {
    background-color: #c0392b;
    border-color: #c0392b;
}

/* Form input và search button */
.form-control {
    background-color: #fff;
    border-color: #e74c3c;
    color: #333;
    border-radius: 20px;
}

.form-control:focus {
    background-color: #fff;
    border-color: #c0392b;
    color: #333;
}

/* Footer */
footer {
    background-color: #e74c3c;
    color: #fff;
    text-align: center;
    padding: 10px;
    position: fixed;
    width: 100%;
    bottom: 0;
    border-top: 4px solid #c0392b;
}

/* Styling for cart and buttons */
.cart-item {
    background-color: #ffccd5;
    border: 2px solid #e74c3c;
    padding: 15px;
    margin-bottom: 10px;
    border-radius: 12px;
}

.cart-item img {
    max-width: 100px;
    margin-right: 15px;
    border-radius: 50%;
    border: 2px solid #e74c3c;
}

.cart-item p {
    margin: 5px 0;
}

/* Icon trái cà chua trong giỏ hàng */
.cart-item::before {
    content: "🍅";
    margin-right: 5px;
}

/* Button Styling in Cart */
.cart-buttons a {
    text-decoration: none;
    color: white;
    padding: 10px 15px;
    margin: 5px;
    border-radius: 20px;
    transition: background-color 0.3s;
}

.cart-buttons .btn-secondary {
    background-color: #7f8c8d;
}

.cart-buttons .btn-secondary:hover {
    background-color: #95a5a6;
}

.cart-buttons .btn-danger {
    background-color: #e74c3c;
}

.cart-buttons .btn-danger:hover {
    background-color: #c0392b;
}
