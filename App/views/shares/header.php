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

<?php
if (!isset($_SESSION['user'])) {
    include 'guest_navbar.php';
} elseif ($_SESSION['user']['role'] === 'admin') {
    include 'admin_navbar.php';
} else {
    include 'user_navbar.php';
}
?>

<div class="container mt-4">
