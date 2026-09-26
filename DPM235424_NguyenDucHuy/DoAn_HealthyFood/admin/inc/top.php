<!DOCTYPE html>
<html lang="vi">
<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4/bootstrap-4.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang Quản Trị - Fit'n Ngon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/DoAn_HealthyFood/admin/inc/css/admin-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>

<body>
    <div class="container-fluid p-0">
        <div class="row g-0">

            <div class="col-md-2 p-0 sidebar">
                <div class="sidebar-brand">
                    <a href="/DoAn_HealthyFood/admin/index.php" class="text-white text-decoration-none fs-4 fw-bold">
                        <i class="fa-solid fa-leaf text-success me-2"></i>FIT'N NGON
                    </a>
                </div>
                <hr class="text-secondary opacity-25 mx-3 mt-0">

                <?php
                $url = $_SERVER['REQUEST_URI'];
                ?>

                <ul class="list-unstyled flex-column mt-3">
                    <li class="sidebar-header">QUẢN LÝ CƠ BẢN</li>

                    <li>
                        <a class="nav-link <?php echo (strpos($url, 'admin/index.php') !== false && strpos($url, 'ql') === false) ? 'active' : ''; ?>"
                            href="/DoAn_HealthyFood/admin/index.php">
                            <i class="fa-solid fa-gauge"></i> Tổng quan
                        </a>
                    </li>
                    <li>
                        <a class="nav-link <?php echo (strpos($url, 'qldonhang') !== false) ? 'active' : ''; ?>"
                            href="/DoAn_HealthyFood/admin/qldonhang/index.php">
                            <i class="fa-solid fa-clipboard-list"></i> Đơn hàng
                        </a>
                    </li>
                    <li>
                        <a class="nav-link <?php echo (strpos($url, 'qlmathang') !== false) ? 'active' : ''; ?>"
                            href="/DoAn_HealthyFood/admin/qlmathang/index.php">
                            <i class="fa-solid fa-utensils"></i> Món ăn
                        </a>
                    </li>
                    <li>
                        <a class="nav-link <?php echo (strpos($url, 'qldanhmuc') !== false) ? 'active' : ''; ?>"
                            href="/DoAn_HealthyFood/admin/qldanhmuc/index.php">
                            <i class="fa-solid fa-list"></i> Danh mục
                        </a>
                    </li>
                    <li>
                        <a class="nav-link <?php echo (strpos($url, 'qlgiamgia') !== false) ? 'active' : ''; ?>"
                            href="/DoAn_HealthyFood/admin/qlgiamgia/index.php">
                            <i class="fa-solid fa-tags"></i> Giảm giá
                        </a>
                    </li>
                    <li>
                        <a class="nav-link <?php echo (strpos($url, 'qldoanhthu') !== false) ? 'active' : ''; ?>"
                            href="/DoAn_HealthyFood/admin/qldoanhthu/index.php">
                            <i class="fa-solid fa-chart-line"></i> Doanh thu
                        </a>
                    </li>
                    <li class="sidebar-header">HỆ THỐNG</li>

                    <li>
                        <a class="nav-link <?php echo (strpos($url, 'qlkhachhang') !== false) ? 'active' : ''; ?>"
                            href="/DoAn_HealthyFood/admin/qlkhachhang/index.php">
                            <i class="fa-solid fa-address-book"></i> Khách hàng
                        </a>
                    </li>
                    <li>
                        <a class="nav-link <?php echo (strpos($url, 'qlnguoidung') !== false) ? 'active' : ''; ?>"
                            href="/DoAn_HealthyFood/admin/qlnguoidung/index.php">
                            <i class="fa-solid fa-user-shield"></i> Người dùng
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-md-10 p-0">
                <nav class="navbar navbar-expand-lg navbar-light admin-header">
                    <div class="container-fluid">
                        <span class="navbar-brand mb-0 h4 fw-bold text-secondary">BẢNG ĐIỀU KHIỂN</span>

                        <div class="d-flex align-items-center ms-auto">
                            <a href="/DoAn_HealthyFood/public/index.php"
                                class="btn btn-sm btn-outline-success rounded-pill px-3 me-3" target="_blank">
                                <i class="fa-solid fa-globe"></i> Xem trang web
                            </a>

                            <?php if (isset($_SESSION["nguoidung"])): ?>
                                <div class="dropdown">
                                    <a class="nav-link dropdown-toggle fw-bold text-dark" href="#"
                                        data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-user-circle me-1 text-success fs-5"></i>
                                        <?php echo $_SESSION["nguoidung"]["hoten"]; ?>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow">
                                        <li><a class="dropdown-item"
                                                href="/DoAn_HealthyFood/admin/ktnguoidung/index.php?action=hoso"><i
                                                    class="fa-solid fa-user-gear me-2"></i>Hồ sơ</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item text-danger"
                                                href="/DoAn_HealthyFood/admin/ktnguoidung/index.php?action=dangxuat"><i
                                                    class="fa-solid fa-power-off me-2"></i>Đăng xuất</a></li>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </nav>

                <div class="main-content">