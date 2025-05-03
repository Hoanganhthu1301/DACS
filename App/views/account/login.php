<?php include 'app/views/shares/header.php'; ?>

<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card tomato-card text-black">
                    <div class="card-body p-5 text-center">

                        <!-- Thông báo lỗi dễ thương -->
                        <?php if (!empty($errors)): ?>
                            <div class="tomato-error-message">
                                🍅 Oops! Có lỗi xảy ra: 
                                <ul>
                                    <?php foreach ($errors as $error): ?>
                                        <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <form action="/DACS/account/checklogin" method="post">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">🍅 Đăng Nhập 🍅</h2>
                                <p class="text-black-50 mb-5">Vui lòng nhập tài khoản và mật khẩu của bạn nhé!</p>

                                <div class="form-outline form-black mb-4">
                                    <input type="text" name="username" class="form-control form-control-lg tomato-input" />
                                    <label class="form-label" for="typeEmailX">🍅 Tên đăng nhập</label>
                                </div>

                                <div class="form-outline form-black mb-4">
                                    <input type="password" name="password" class="form-control form-control-lg tomato-input" />
                                    <label class="form-label" for="typePasswordX">🍅 Mật khẩu</label>
                                </div>

                                <p class="small mb-5 pb-lg-2">
                                <a href="/DACS/app/views/account/forgot_password.php">Quên mật khẩu?</a>

                                </p>

                                <button class="btn tomato-btn btn-lg px-5" type="submit">Đăng nhập</button>

                                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                    <a href="#!" class="text-black"><i class="fab fa-facebook-f fa-lg"></i></a>
                                    <a href="#!" class="text-black"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                    <a href="#!" class="text-black"><i class="fab fa-google fa-lg"></i></a>
                                </div>
                            </div>

                            <div>
                                <p class="mb-0">
                                    Chưa có tài khoản? 
                                    <a href="/DACS/account/register" class="text-black-50 fw-bold">Đăng ký ngay!</a>
                                </p>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'app/views/shares/footer.php'; ?>

<style>
    .gradient-custom {
    background: linear-gradient(135deg, #ffccd5, #ff8b94); /* Hồng đậm pha hồng nhạt */
}

.tomato-card {
    background-color: #ffebf0; /* Nền hồng nhạt */
    border: 5px solid #e91e63; /* Viền hồng đậm */
    border-radius: 25px;
    box-shadow: 0 6px 15px rgba(233, 30, 99, 0.3);
    animation: lắcLư 0.5s ease-in-out alternate 2;
    color: #000; /* Chữ màu đen */
}

.tomato-btn {
    background-color: #e91e63;  /* Màu hồng đậm */
    border: none;
    border-radius: 30px;
    padding: 10px 40px;
    color: #fff;
    box-shadow: 0 4px 12px rgba(233, 30, 99, 0.3);
    transition: background 0.3s ease;
}

.tomato-btn:hover {
    background-color: #4caf50; /* Nút chuyển sang màu xanh lá khi rê chuột */
    box-shadow: 0 4px 12px rgba(76, 175, 80, 0.4);
}

.tomato-input {
    background-color: #fff5f8; /* Màu nền trắng hồng nhạt */
    border: 2px solid #ff8b94;
    border-radius: 15px;
    padding: 10px;
    color: #000; /* Chữ màu đen */
}

.tomato-input:focus {
    border-color: #4caf50;  /* Viền xanh lá khi được chọn */
    box-shadow: 0 0 8px rgba(76, 175, 80, 0.5);
}

/* Thêm khung xanh lá cho các thông báo lỗi */
.tomato-error {
    background-color: #f8d7da;  /* Hồng nhạt */
    border: 3px solid #4caf50;  /* Viền xanh lá */
    color: #d32f2f;  /* Chữ đỏ dễ thương */
    border-radius: 10px;
    padding: 10px;
    text-align: center;
}

/* Hiệu ứng rung lắc dễ thương */
@keyframes lắcLư {
    from { transform: rotate(-2deg); }
    to { transform: rotate(2deg); }
}

.tomato-error-message {
    background-color: #ffebf0;    /* Nền hồng nhạt */
    border: 3px solid #e91e63;    /* Viền hồng đậm */
    color: #e91e63;               /* Chữ hồng đậm */
    border-radius: 20px;          /* Bo góc mềm mại */
    padding: 15px 25px;           /* Cách lề trong rộng hơn */
    text-align: center;
    margin-bottom: 20px;
    box-shadow: 0 6px 12px rgba(233, 30, 99, 0.4); /* Đổ bóng dễ thương */
    animation: nhayNhay 0.5s ease-in-out alternate 3;
}

.tomato-error-message ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.tomato-error-message li::before {
    content: "🍅 ";
    font-weight: bold;
    color: #e91e63; /* Icon cũng màu hồng đậm */
}

@keyframes nhayNhay {
    0% { transform: scale(1); }
    100% { transform: scale(1.1); }
}
