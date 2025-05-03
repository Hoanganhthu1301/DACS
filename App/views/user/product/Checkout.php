<?php include 'app/views/shares/header.php'; ?>
<h1 class="text-center text-danger">🍅 Thanh toán 🍅</h1>

<form method="POST" action="/DACS/Product/processCheckout" class="checkout-form">
    <div class="form-group">
        <label for="name" class="text-success">🍅 Họ tên:</label>
        <input type="text" id="name" name="name" class="form-control input-custom" required>
    </div>

    <div class="form-group">
        <label for="phone" class="text-success">🍅 Số điện thoại:</label>
        <input type="text" id="phone" name="phone" class="form-control input-custom" required>
    </div>

    <div class="form-group">
        <label for="address" class="text-success">🍅 Địa chỉ:</label>
        <textarea id="address" name="address" class="form-control input-custom" required></textarea>
    </div>

    <button type="submit" class="btn btn-danger btn-custom">💳 Thanh toán ngay</button>
</form>

<div class="d-flex justify-content-center mt-3">
    <a href="/DACS/Product/cart" class="btn btn-green">🔙 Quay lại giỏ hàng</a>
</div>

<?php include 'app/views/shares/footer.php'; ?>
<style>
/* Nền trang */
body {
    background-color: #ffe6e6;  /* Nền hồng pastel */
    color: #333;
    font-family: Arial, sans-serif;
}

/* Header */
header {
    background-color: #ff4d4d;  /* Đỏ cà chua đậm */
    color: #fff;
    padding: 10px;
    text-align: center;
}

/* Tiêu đề chính */
h1 {
    color: #e74c3c; 
    font-weight: bold;
    font-size: 32px;
    margin-bottom: 20px;
}

/* Form thanh toán */
.checkout-form {
    background-color: #ffccd5;  /* Nền hồng pastel */
    border: 3px solid #e74c3c;  /* Viền đỏ cà chua */
    border-radius: 12px;
    padding: 20px;
    max-width: 400px;
    margin: 0 auto;
    box-shadow: 0 4px 8px rgba(231, 76, 60, 0.3);
}

/* Nhãn trong form */
label {
    font-weight: bold;
}

/* Ô nhập liệu */
.input-custom {
    background-color: #f8f9fa;  /* Màu nền sáng */
    border: 2px solid #27ae60;  /* Viền xanh lá */
    border-radius: 8px;
    padding: 8px 10px;
}

/* Nút thanh toán */
.btn-custom {
    background-color: #e74c3c;  /* Đỏ cà chua */
    border: 2px solid #c0392b;
    color: #fff;
    width: 100%;
    margin-top: 15px;
    border-radius: 20px;
}

.btn-custom:hover {
    background-color: #c0392b;
}

/* Nút quay lại giỏ hàng */
.btn-green {
    background-color: #27ae60;  /* Xanh lá */
    border: 2px solid #239b56;
    color: #fff;
    border-radius: 20px;
    padding: 10px 20px;
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
}
