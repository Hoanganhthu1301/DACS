<?php include 'app/views/shares/header.php'; ?>
<h1 class="text-center text-danger">🍅 Giỏ hàng của bạn 🍅</h1>

<?php if (!empty($cart)): ?>
<div class="container">
    <ul class="list-group">
        <?php 
        $total = 0; // Biến lưu tổng tiền
        foreach ($cart as $id => $item): 
            $itemTotal = $item['price'] * $item['quantity'];
            $total += $itemTotal;
        ?>
        <li class="list-group-item d-flex justify-content-between align-items-center cart-item">
            <div class="d-flex align-items-center">
                <?php if ($item['image']): ?>
                    <img src="/webbanhang/<?php echo $item['image']; ?>" 
                        alt="Hình sản phẩm" 
                        class="product-image">
                <?php else: ?>
                    <img src="https://via.placeholder.com/100" 
                        alt="Hình sản phẩm" 
                        class="product-image">
                <?php endif; ?>
                <div class="ml-3">
                    <h2 class="text-danger"><?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?></h2>
                    <p><strong>🍅 Giá:</strong> <?php echo htmlspecialchars($item['price'], ENT_QUOTES, 'UTF-8'); ?> VND</p>

                    <!-- Form cập nhật số lượng -->
                    <form method="POST" action="/webbanhang/Product/updateQuantity/<?php echo $id; ?>" class="update-form">
                        <label for="quantity-<?php echo $id; ?>"><strong>🍅 Số lượng:</strong></label>
                        <input type="number" id="quantity-<?php echo $id; ?>" 
                               name="quantity" 
                               value="<?php echo htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8'); ?>" 
                               min="1" 
                               class="quantity-input">
                        <button type="submit" class="btn btn-success btn-sm">Cập nhật</button>
                    </form>

                    <p><strong>🍅 Thành tiền:</strong> <?php echo number_format($itemTotal, 0, ',', '.'); ?> VND</p>
                </div>
            </div>
            <a href="/webbanhang/Product/removeFromCart/<?php echo $id; ?>" class="btn btn-danger btn-sm">Xóa</a>
        </li>
        <?php endforeach; ?>
    </ul>

    <!-- Hiển thị tổng tiền -->
    <div class="total-price text-right mt-3">
        <h3><strong>🍅 Tổng tiền: <?php echo number_format($total, 0, ',', '.'); ?> VND</strong></h3>
    </div>
</div>
<?php else: ?>
    <p class="text-center text-danger">🍅 Giỏ hàng của bạn đang trống. 🍅</p>
<?php endif; ?>

<div class="d-flex justify-content-center mt-3 cart-buttons">
    <a href="/webbanhang/Product" class="btn btn-green mr-2">🛒 Tiếp tục mua sắm</a>
    <a href="/webbanhang/Product/checkout" class="btn btn-danger">💳 Thanh toán</a>
</div>

<?php include 'app/views/shares/footer.php'; ?>

<style>
/* Nền trang */
body {
    background-color: #fff5f5; /* Nền hồng pastel nhạt */
    color: #333;
    font-family: 'Comic Sans MS', cursive, sans-serif;
}

/* Header */
header {
    background-color: #ff4d4d; /* Đỏ cà chua đậm */
    color: #fff;
    padding: 10px;
    text-align: center;
    border-bottom: 5px solid #e74c3c;
}

/* Tiêu đề chính */
h1 {
    color: #e74c3c;
    font-weight: bold;
    font-size: 36px;
    margin-bottom: 20px;
    text-shadow: 2px 2px 4px #ff9999;
}

/* Sản phẩm trong giỏ hàng */
.cart-item {
    background-color: #ffccd5;  /* Nền hồng pastel */
    border: 3px solid #e74c3c;  /* Viền đỏ cà chua */
    border-radius: 15px;
    padding: 15px;
    margin-bottom: 10px;
    box-shadow: 0 4px 8px rgba(231, 76, 60, 0.3);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.cart-item:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 12px rgba(231, 76, 60, 0.5);
}

/* Hình ảnh sản phẩm */
.product-image {
    width: 100px;
    height: 100px;
    border: 3px solid #e74c3c;  /* Viền đỏ cà chua */
    border-radius: 50%;
    object-fit: cover;
}

/* Ô nhập số lượng */
.quantity-input {
    width: 60px;
    border: 2px solid #27ae60;
    border-radius: 8px;
    text-align: center;
    background-color: #eafaf1;
    margin-right: 5px;
}

/* Nút cập nhật */
.btn-success {
    background-color: #27ae60; /* Xanh lá */
    border: 2px solid #239b56;
}

.btn-success:hover {
    background-color: #2ecc71;
}

/* Nút xóa sản phẩm */
.btn-danger {
    background-color: #e74c3c; /* Đỏ cà chua */
    border: 2px solid #c0392b;
}

.btn-danger:hover {
    background-color: #c0392b;
}

/* Dòng thông tin sản phẩm */
.cart-item p {
    margin: 5px 0;
}

/* Tổng tiền */
.total-price {
    background-color: #ffebee;  /* Nền hồng nhạt */
    border: 3px solid #e74c3c;  /* Viền đỏ cà chua */
    border-radius: 12px;
    padding: 15px;
    box-shadow: 0 4px 8px rgba(231, 76, 60, 0.3);
}

.total-price h3 {
    color: #e74c3c;
    font-weight: bold;
}

/* Nút điều hướng */
.cart-buttons a {
    text-decoration: none;
    color: white;
    padding: 10px 15px;
    margin: 5px;
    border-radius: 20px;
    transition: background-color 0.3s;
}

/* Nút 'Tiếp tục mua sắm' */
.btn-green {
    background-color: #27ae60; /* Xanh lá tươi */
    border: 2px solid #239b56;
}

.btn-green:hover {
    background-color: #2ecc71;
}

/* Footer */
footer {
    background-color: #ff4d4d;
    color: #fff;
    text-align: center;
    padding: 10px;
    position: fixed;
    width: 100%;
    bottom: 0;
    border-top: 5px solid #e74c3c;
}

