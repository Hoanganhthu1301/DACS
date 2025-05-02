<?php include 'app/views/shares/header.php'; ?>

<?php


if (isset($errors)) {

echo "<ul>";

foreach ($errors as $err) {

echo "<li class='text-danger'>$err</li>";

}

echo "</ul>";

}


?>


<div class="card-body p-5 text-center">

<form class="user" action="/webbanhang/account/save" method="post">

<div class="form-group row">

<div class="col-sm-6 mb-3 mb-sm-0">

<input type="text" class="form-control form-control-user" id="username" name="username" placeholder="username">

</div>

<div class="col-sm-6">

<input type="text" class="form-control form-control-user" id="fullname" name="fullname" placeholder="fullname">

</div>

</div>

<div class="form-group row">

<div class="col-sm-6 mb-3 mb-sm-0">

<input type="password" class="form-control form-control-user" id="password" name="password" placeholder="password">

</div>

<div class="col-sm-6">

<input type="password" class="form-control form-control-user" id="confirmpassword" name="confirmpassword" placeholder="confirmpassword">

</div>

</div>

<div class="form-group text-center">

<button class="btn btn-primary btn-icon-split p-3">

Register

</button>

</div>

</form>


</div>

<?php include 'app/views/shares/footer.php'; ?>
<style>
    body {
    background-color: #ffe6eb; /* Nền hồng nhạt ngọt ngào */
    font-family: 'Comic Sans MS', cursive; /* Phông chữ dễ thương */
}

/* Khung đăng ký */
.card-body {
    background-color: #fff5f7; /* Nền hồng trắng dịu dàng */
    border: 6px solid #e91e63; /* Viền hồng đậm */
    border-radius: 40px;
    box-shadow: 0 12px 30px rgba(233, 30, 99, 0.5);
    padding: 50px 40px;
    position: relative;
}

/* Trang trí trái cà chua */
.card-body::before {
    content: "🍅🍅🍅";
    position: absolute;
    top: -30px;
    left: 20px;
    font-size: 40px;
}

.card-body::after {
    content: "🍅🍅🍅";
    position: absolute;
    bottom: -30px;
    right: 20px;
    font-size: 40px;
}

/* Tiêu đề */
h2 {
    color: #e91e63; /* Hồng đậm nổi bật */
    font-weight: bold;
    font-size: 32px;
    text-shadow: 3px 3px 7px rgba(233, 30, 99, 0.5);
    margin-bottom: 25px;
    animation: nhayNhay 1.5s infinite alternate;
}

/* Hiệu ứng tiêu đề nảy lên */
@keyframes nhayNhay {
    from { transform: translateY(0); }
    to { transform: translateY(-5px); }
}

/* Ô nhập liệu */
.form-control {
    background-color: #ffe6eb;  /* Hồng nhạt dễ thương */
    border: 4px solid #e91e63; 
    border-radius: 25px;
    color: #d81b60; /* Hồng đậm */
    padding: 12px 15px;
    font-size: 16px;
    transition: all 0.3s;
}

.form-control:focus {
    transform: scale(1.05) rotate(-2deg);
    box-shadow: 0 0 15px rgba(233, 30, 99, 0.6);
}

/* Nút đăng ký */
.btn-primary {
    background-color: #d81b60; /* Hồng đậm */
    border: 4px solid #c2185b; 
    color: #fff;
    border-radius: 40px;
    padding: 12px 50px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    transition: background-color 0.3s, transform 0.3s;
}

.btn-primary:hover {
    background-color: #f06292;
    transform: scale(1.1) rotate(-3deg); /* Xoay nhẹ dễ thương */
    box-shadow: 0 0 20px rgba(240, 98, 146, 0.6);
}

/* Placeholder dễ thương */
.form-control-user::placeholder {
    color: #d81b60;
    opacity: 0.9;
    font-style: italic;
    font-weight: bold;
}

/* Link chuyển trang */
p a {
    color: #d81b60;
    text-decoration: none;
    font-weight: bold;
    background: linear-gradient(135deg, #f06292, #d81b60);
    border-radius: 15px;
    padding: 3px 10px;
    transition: background 0.3s, transform 0.2s;
}

p a:hover {
    background: linear-gradient(135deg, #d81b60, #f06292);
    transform: scale(1.1);
}

/* Hộp lỗi */
.text-danger {
    background-color: #ffe6eb; /* Hồng nhạt cảnh báo */
    color: #d81b60;
    border: 3px dashed #d81b60;
    border-radius: 20px;
    padding: 12px;
    margin-top: 12px;
}
