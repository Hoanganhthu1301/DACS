<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-4">
    <h2 class="mb-4 text-center" style="font-family: 'Verdana', sans-serif; color: #ff6347;">🍅 Chi tiết sản phẩm 🍅</h2>

    <?php if (isset($product)) : ?>
        <div class="card shadow-sm" style="max-width: 600px; border-radius: 15px; background-color: #ffe4e1;">
            <div class="card-body">
                <p><strong>Tên sản phẩm:</strong> <?= htmlspecialchars($product->name) ?></p>
                <p><strong>Giá:</strong> <?= number_format($product->price, 0, ',', '.') ?> VND</p>
                <p><strong>Mô tả:</strong> <?= nl2br(htmlspecialchars($product->description)) ?></p>
                <p><strong>Danh mục (ID):</strong> <?= htmlspecialchars($product->category_id) ?></p>

                <?php if (!empty($product->image)) : ?>
                    <p><strong>Hình ảnh:</strong></p>
                    <img src="/webbanhang/<?= htmlspecialchars($product->image) ?>" 
                         class="img-thumbnail" 
                         alt="Hình sản phẩm" 
                         style="max-width: 300px; border-radius: 10px; box-shadow: 0 4px 12px rgba(255, 99, 71, 0.4);">
                <?php else: ?>
                    <p><em>Không có hình ảnh.</em></p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Form Bình luận -->
        <div class="mt-4">
            <h4 style="color: #ff6347; font-weight: bold;">🍅 Bình luận sản phẩm 🍅</h4>
            <form action="/webbanhang/Product/addComment/<?= $product->id ?>" method="POST">
                <div class="mb-3">
                    <label for="comment" class="form-label">Nhập bình luận của bạn:</label>
                    <textarea id="comment" name="comment" class="form-control" rows="4" style="border-radius: 10px; border: 1px solid #ff6347;" required></textarea>
                </div>
                <button type="submit" class="btn btn-outline-danger" style="border-radius: 25px;">Gửi bình luận</button>
            </form>
        </div>

        <!-- Danh sách bình luận -->
        <div class="mt-4">
            <h4 style="color: #ff6347; font-weight: bold;">🍅 Bình luận:</h4>
            <?php if (!empty($comments)): ?>
                <ul class="list-group" style="border-radius: 10px;">
                    <?php foreach ($comments as $comment): ?>
                        <li class="list-group-item" style="background-color: #ffe4e1; border-radius: 10px; margin-bottom: 10px;">
                            <strong><?= htmlspecialchars($comment->username) ?>:</strong>
                            <p><?= nl2br(htmlspecialchars($comment->content)) ?></p>
                            <small class="text-muted"><?= $comment->created_at ?></small>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Chưa có bình luận nào.</p>
            <?php endif; ?>
        </div>
    <?php else : ?>
        <div class="alert alert-warning">Không tìm thấy sản phẩm.</div>
    <?php endif; ?>

    <a href="/webbanhang/Product" class="btn btn-outline-secondary mt-3" style="border-radius: 25px; color: #ff6347; border: 1px solid #ff6347;">← Quay lại danh sách</a>
</div>

<?php include 'app/views/shares/footer.php'; ?>

<style>
/* app/css/style.css */

/* Background color */
body {
    background-color: #fef7f6;  /* Light pastel pink */
    color: #333;
    font-family: 'Verdana', sans-serif;
}

/* Card styling */
.card {
    background-color: #ffe4e1;  /* Light peach pink */
    border-radius: 15px;
    box-shadow: 0 4px 12px rgba(255, 99, 71, 0.4);
}

/* Button styling */
.btn-outline-danger {
    border-color: #ff6347;
    color: #ff6347;
    border-radius: 25px;
}

.btn-outline-danger:hover {
    background-color: #ff6347;
    color: #fff;
}

/* Button for returning */
.btn-outline-secondary {
    color: #ff6347;
    border-color: #ff6347;
    border-radius: 25px;
}

.btn-outline-secondary:hover {
    background-color: #ff6347;
    color: #fff;
}

/* Comment textarea */
textarea.form-control {
    border-radius: 10px;
    border: 1px solid #ff6347;
}

/* Comment list */
.list-group-item {
    background-color: #ffe4e1;
    border-radius: 10px;
    margin-bottom: 10px;
}

/* Heading styles */
h2, h4 {
    color: #ff6347;
    font-weight: bold;
    font-size: 1.5em;
}
</style>
