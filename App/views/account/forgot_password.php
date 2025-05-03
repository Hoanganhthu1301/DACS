<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên Mật Khẩu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #ffccd5, #ff8b94); /* Hồng đậm pha hồng nhạt */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(233, 30, 99, 0.2);
            background-color: #fff5f8; /* Nền hồng nhạt dễ thương */
            border: 3px solid #ff8b94;
        }

        .card-body {
            padding: 30px;
        }

        .card h3 {
            color: #e91e63; /* Màu hồng đậm */
            font-weight: bold;
        }

        .btn-custom {
            background-color: #e91e63;
            border-color: #e91e63;
            color: white;
            border-radius: 25px;
            padding: 12px 30px;
            transition: background 0.3s, transform 0.2s;
        }

        .btn-custom:hover {
            background-color: #ff4b5c;
            border-color: #ff4b5c;
            transform: translateY(-2px);
        }

        .form-label {
            font-weight: bold;
            color: #e91e63;
        }

        .form-control {
            background-color: #ffe6f0; /* Màu nền hồng nhạt */
            border: 2px solid #ff8b94;
            border-radius: 15px;
            padding: 10px;
        }

        .form-control:focus {
            border-color: #4caf50; /* Viền xanh lá khi nhập liệu */
            box-shadow: 0 0 8px rgba(76, 175, 80, 0.5);
        }

        .text-muted {
            color: #ff8b94 !important;
        }

        .text-center {
            text-align: center;
        }

        .tomato-icon {
            font-size: 40px;
            color: #e91e63;
            margin-bottom: 20px;
        }

        .text-center a {
            font-weight: bold;
            text-decoration: none;
        }

        .text-center a:hover {
            color: #ff4b5c;
        }

        /* Hiệu ứng dễ thương */
        @keyframes pulse {
            0% { transform: scale(1); }
            100% { transform: scale(1.1); }
        }

        .tomato-icon:hover {
            animation: pulse 0.6s ease-in-out infinite alternate;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card bg-light">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <div class="tomato-icon">🍅</div>
                            <h3 class="text-center mb-4">Quên Mật Khẩu</h3>
                        </div>
                        <form action="/DACS/account/process-forgot-password.php" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Nhập email của bạn</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-custom">Gửi yêu cầu</button>
                            </div>
                        </form>
                        <div class="text-center mt-3">
                            <a href="/DACS/account/login" class="text-muted">Quay lại Đăng Nhập</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
