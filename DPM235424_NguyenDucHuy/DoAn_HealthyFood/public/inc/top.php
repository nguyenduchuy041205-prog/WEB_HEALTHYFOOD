<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fit'n Ngon - Healthy Food</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="/DoAn_HealthyFood/public/inc/css/main-style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="d-flex flex-column h-100">
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand fw-bold text-green fs-3" href="/DoAn_HealthyFood/public/index.php">
                <i class="fa-solid fa-leaf"></i> FIT'N NGON
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link fw-bold text-dark" href="/DoAn_HealthyFood/public/index.php">TRANG CHỦ</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-bold text-dark" href="#" id="folderDM" role="button"
                            data-bs-toggle="dropdown">
                            DANH MỤC MÓN ĂN
                        </a>
                        <ul class="dropdown-menu border-0 shadow">
                            <li>
                                <a class="dropdown-item py-2 fw-bold text-success"
                                    href="/DoAn_HealthyFood/public/index.php?action=tatca">
                                    <i class="fa-solid fa-layer-group me-2"></i>TẤT CẢ MÓN ĂN
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li> <?php if (isset($danhmuc) && is_array($danhmuc)): ?>
                                <?php foreach ($danhmuc as $d): ?>
                                    <li>
                                        <a class="dropdown-item py-2"
                                            href="/DoAn_HealthyFood/public/index.php?action=group&id=<?php echo $d["id"]; ?>">
                                            <i
                                                class="fa-solid fa-chevron-right me-2 small text-green"></i><?php echo $d["tendanhmuc"]; ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </li>
                </ul>

                <form class="d-flex me-lg-4" action="index.php" method="get">
                    <input type="hidden" name="action" value="search">
                    <div class="input-group">
                        <input class="form-control border-end-0 rounded-start-pill bg-light ps-3" type="search"
                            name="txtsearch" placeholder="Tìm món..." required>
                        <button class="btn btn-outline-success border-start-0 rounded-end-pill pe-3" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>

                <div class="d-flex align-items-center">

                    <a href="/DoAn_HealthyFood/public/index.php?action=giohang"
                        class="btn position-relative me-3 p-0 border-0">
                        <i class="fa-solid fa-cart-shopping fs-4 text-green"></i>
                        <?php
                        $sl = (isset($_SESSION["giohang"])) ? count($_SESSION["giohang"]) : 0;
                        ?>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                            style="font-size: 0.65rem;">
                            <?php echo $sl; ?>
                        </span>
                    </a>

                    <?php if (isset($_SESSION["khachhang"]["hoten"])): ?>
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle text-green fw-bold" href="#" data-bs-toggle="dropdown">
                                <i class="fa-solid fa-circle-user fs-4 me-1"></i>
                                <?php echo $_SESSION["khachhang"]["hoten"]; ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end border-0 shadow">
                                <li><a class="dropdown-item"
                                        href="/DoAn_HealthyFood/admin/ktnguoidung/index.php?action=hoso"><i
                                            class="fa-solid fa-id-card me-2"></i>Hồ sơ</a></li>
                                <li><a class="dropdown-item"
                                        href="/DoAn_HealthyFood/public/index.php?action=lichsudonhang"><i
                                            class="fa-solid fa-clock-rotate-left me-2"></i>Đơn hàng</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-danger"
                                        href="/DoAn_HealthyFood/admin/ktnguoidung/index.php?action=dangxuat"><i
                                            class="fa-solid fa-right-from-bracket me-2"></i>Đăng xuất</a></li>
                            </ul>
                        </div>

                    <?php elseif (isset($_SESSION["nguoidung"]["hoten"])): ?>
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle text-primary fw-bold" href="#" data-bs-toggle="dropdown">
                                <i class="fa-solid fa-user-shield me-1"></i>
                                Admin: <?php echo $_SESSION["nguoidung"]["hoten"]; ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end border-0 shadow">
                                <li><a class="dropdown-item fw-bold text-primary"
                                        href="/DoAn_HealthyFood/admin/index.php"><i
                                            class="fa-solid fa-gauge-high me-2"></i>Quản trị</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-danger"
                                        href="/DoAn_HealthyFood/admin/ktnguoidung/index.php?action=dangxuat"><i
                                            class="fa-solid fa-power-off me-2"></i>Đăng xuất</a></li>
                            </ul>
                        </div>

                    <?php else: ?>
                        <a href="/DoAn_HealthyFood/admin/ktnguoidung/index.php"
                            class="btn btn-green rounded-pill px-4 fw-bold shadow-sm">
                            <i class="fa-solid fa-right-to-bracket me-1"></i> Đăng nhập
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-shrink-0">

        <style>
            .text-green {
                color: #4CAF50 !important;
            }

            .btn-green {
                background-color: #4CAF50;
                color: white;
                border: none;
            }

            .btn-green:hover {
                background-color: #2E7D32;
                color: white;
            }

            .nav-link:hover {
                color: #4CAF50 !important;
            }
        </style>