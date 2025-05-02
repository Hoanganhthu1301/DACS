<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-image {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">🛒 Quản lý sản phẩm</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <!-- Menu trái -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/webbanhang/Product/">Danh sách sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/webbanhang/Product/add">Thêm sản phẩm</a>
                </li>
            </ul>

            <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <?php if (isset($_SESSION['user'])): ?>
                    <a class="nav-link text-black" href="/webbanhang/account/profile">Xin chào, <?= $_SESSION['user']['username']; ?></a>
                <?php endif; ?>
            
            <li class="nav-item">
                <?php if (isset($_SESSION['user'])): ?>
                    <a class="nav-link" href="/webbanhang/account/logout">Đăng xuất</a>
                <?php else: ?>
                    <a class="nav-link" href="/webbanhang/account/login">Đăng nhập</a>
                <?php endif; ?>
            </li>
        </ul>
    </div>
</nav>


<div class="container mt-4">
