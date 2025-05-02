<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Tài Khoản</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #ff6347, #ffe4b5); /* Tomato gradient background */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            border: none;
        }

        .card-header {
            background-color: #ff6347; /* Tomato color */
            border-radius: 12px 12px 0 0;
            text-align: center;
        }

        .card-header h4 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .btn-success {
            background-color: #ff6347;
            border-color: #ff6347;
            color: white;
        }

        .btn-success:hover {
            background-color: #e55347;
            border-color: #e55347;
        }

        .btn-secondary {
            background-color: #ffb6b6; /* Light tomato color */
            border-color: #ffb6b6;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #ff9999;
            border-color: #ff9999;
        }

        .form-control {
            border-radius: 12px;
        }

        .alert-success {
            background-color: #ffebcd;
            color: #2e8b57;
            border-radius: 12px;
        }

        .form-group label {
            font-weight: bold;
        }

        .hr {
            border: 1px solid #ff6347;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow border-0">
                    <div class="card-header text-white">
                        <h4 class="mb-0">🍅 Thông tin tài khoản</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="/webbanhang/account/updateProfile">
                            <div class="form-group mb-3">
                                <label><strong>Họ và tên:</strong></label>
                                <input type="text" name="fullname" class="form-control" 
                                       value="<?= htmlspecialchars($_SESSION['user']['fullname']) ?>" required>
                            </div>

                            <hr class="hr">
                            <h5 class="text-secondary mb-3">🔒 Đổi mật khẩu (không bắt buộc)</h5>

                            <div class="form-group mb-3">
                                <label>Mật khẩu hiện tại:</label>
                                <input type="password" name="current_password" class="form-control" placeholder="Nhập mật khẩu hiện tại">
                            </div>

                            <div class="form-group mb-3">
                                <label>Mật khẩu mới:</label>
                                <input type="password" name="new_password" class="form-control" placeholder="Nhập mật khẩu mới">
                            </div>

                            <div class="form-group mb-3">
                                <label>Nhập lại mật khẩu mới:</label>
                                <input type="password" name="confirm_password" class="form-control" placeholder="Nhập lại mật khẩu mới">
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success">💾 Cập nhật</button>
                            </div>
                        </form>

                        <!-- Nút quay lại danh sách tài khoản -->
                        <div class="d-flex justify-content-start mt-3">
                            <a href="/webbanhang" class="btn btn-secondary">🔙 Quay lại danh sách</a>
                        </div>
                    </div>
                </div>

                <!-- Thông báo session nếu cần -->
                <?php if (isset($_SESSION['success_message'])): ?>
                    <div class="alert alert-success mt-3">
                        <?= $_SESSION['success_message'] ?>
                    </div>
                    <?php unset($_SESSION['success_message']); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
