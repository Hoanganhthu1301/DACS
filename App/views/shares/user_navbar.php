<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= strpos($_SERVER['REQUEST_URI'], '/DACS/Product/userList') !== false ? 'fw-bold text-primary' : '' ?>" href="/DACS/Product/userList">Danh sách sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= strpos($_SERVER['REQUEST_URI'], '/DACS/Product/cart') !== false ? 'fw-bold text-primary' : '' ?>" href="/DACS/Product/cart">Giỏ hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= strpos($_SERVER['REQUEST_URI'], '/DACS/Product/history') !== false ? 'fw-bold text-primary' : '' ?>" href="/DACS/Product/history">Lịch sử</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <?php if (isset($_SESSION['user'])): ?>
                        <a class="nav-link text-black" href="/DACS/account/profile">Xin chào, <?= $_SESSION['user']['username']; ?></a>
                    <?php endif; ?>
                </li>
                <li class="nav-item">
                    <?php if (isset($_SESSION['user'])): ?>
                        <a class="nav-link" href="/DACS/account/logout">Đăng xuất</a>
                    <?php else: ?>
                        <a class="nav-link" href="/DACS/account/login">Đăng nhập</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>