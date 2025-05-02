<?php include 'app/views/shares/header.php'; ?>

<style>
    .tomato-theme {
        font-family: 'Comic Sans MS', cursive, sans-serif;
        color: #e74c3c;
    }
    .card-tomato {
        border: 3px solid #ff6f61;
        border-radius: 20px;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s;
        background-color: #fff3e3; /* Màu nền nhẹ nhàng */
    }
    .card-tomato:hover {
        transform: scale(1.05);
        box-shadow: 0px 4px 15px rgba(255, 99, 71, 0.7);
    }
    .tomato-btn {
        background-color: #ff6f61;
        border: none;
        color: white;
        font-weight: bold;
        border-radius: 25px;
        padding: 12px 30px;
        transition: background 0.3s;
    }
    .tomato-btn:hover {
        background-color: #e74c3c;
        transform: scale(1.1);
    }
    .tomato-img {
        border-radius: 15px;
        border: 4px solid #ff6f61;
        transition: transform 0.3s;
    }
    .tomato-img:hover {
        transform: scale(1.1);
    }
    .card-header {
        background-color: #ffe4b5; /* Màu vàng nhạt */
        color: #e74c3c;
    }
    .card-body {
        color: #333;
    }
    .text-danger {
        color: #ff6f61 !important;
    }
</style>

<div class="container mt-4 tomato-theme">
    <h5 class="text-center fw-bold">
        🍅 Kết quả tìm kiếm cho: <strong><?= htmlspecialchars($_GET['keyword']) ?></strong>
    </h5>

    <div class="row">
        <?php if (empty($products)): ?>
            <div class="col-12 text-center">
                <p class="text-danger fs-4">😭 Không tìm thấy sản phẩm nào... 🍅</p>
            </div>
        <?php else: ?>
            <?php foreach ($products as $product): ?>
                <div class="col-md-4 mb-4">
                    <div class="card card-tomato p-3">
                        <div class="card-header text-center fw-bold">
                            🍅 <?= htmlspecialchars($product->name) ?>
                        </div>
                        <div class="card-body text-center">
                            <?php if ($product->image): ?>
                                <img src="/webbanhang/<?= $product->image ?>" class="img-fluid mb-2 tomato-img">
                            <?php endif; ?>
                            <p class="fs-5 fw-bold"><?= number_format($product->price, 0, ',', '.') ?> VND</p>
                            <a href="/webbanhang/Product/show/<?= $product->id ?>" class="btn tomato-btn px-4 py-2">
                                Xem ngay 🍅
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
