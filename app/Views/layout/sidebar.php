<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="/">
            <span class="ms-1 font-weight-bold text-white"><i class="fa-solid fa-store fa-2x"></i> myPOS</span> <br>
            <span style="margin-left: 40px;"> Point Of Sale</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link <?= menu_dashboard($title) ?> " href="/home">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-gauge-high"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= menu_supplier($title) ?>" href=" /supplier">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-truck-droplet"></i>
                    </div>
                    <span class="nav-link-text ms-1">Supplier</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= menu_customer($title) ?>" href="/customer">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-users-line"></i>
                    </div>
                    <span class="nav-link-text ms-1">Customer</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Data Master | <i class="fa-solid fa-magnifying-glass-chart"></i></h6>
            </li>
            <li class="nav-item">
                <a class="nav-link  text-white p-1 mx-5 <?= menu_produk($title) ?>" href="/produk">
                    <span class=" nav-link-text ms-1">Produk</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white p-1 mx-5 <?= menu_kategori($title) ?>" href="/kategori">
                    <span class="nav-link-text ms-1">Kategori</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white p-1 mx-5 <?= menu_satuan($title) ?>" href="/satuan">
                    <span class="nav-link-text ms-1">Satuan</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Transaksi | <i class="fa-solid fa-cash-register"></i></h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white p-1 mx-5" href="">
                    <span class="nav-link-text ms-1">Penjualan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white p-1 mx-5" href="">
                    <span class="nav-link-text ms-1">Stok Masuk</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white p-1 mx-5" href="">
                    <span class="nav-link-text ms-1">Stok Keluar</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Laporan | <i class="fa-solid fa-flag"></i></h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white p-1 mx-5" href="">
                    <span class="nav-link-text ms-1">Penjualan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white p-1 mx-5" href="">
                    <span class="nav-link-text ms-1">Stok</span>
                </a>
            </li>
            <?php if (session()->get('level') == 1) : ?>
                <li class="nav-item">
                    <a class="nav-link <?= menu_user($title) ?>" href=" /user">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-user-large"></i>
                        </div>
                        <span class="nav-link-text ms-1">User</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</aside>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">