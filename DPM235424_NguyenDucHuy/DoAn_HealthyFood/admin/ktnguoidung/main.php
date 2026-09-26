<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Đăng nhập hệ thống - Fit'n Ngon</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/DoAn_HealthyFood/admin/inc/css/admin-style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="login-body">
    <div class="container d-flex flex-column">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-5 col-lg-4">
                <div class="text-center mb-4">
                    <h2 class="fw-bold text-success"><i class="fa-solid fa-leaf me-2"></i>FIT'N NGON</h2>
                </div>

                <div class="card login-card border-0 shadow-lg rounded-4">
                    <div class="card-body p-4 p-sm-5">

                        <div class="text-center mb-4">
                            <h4 class="fw-bold text-dark">Đăng nhập</h4>
                        </div>

                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger alert-dismissible fade show rounded-3 small" role="alert">
                                <i class="fa-solid fa-circle-exclamation me-2"></i><?php echo $error; ?>
                            </div>
                        <?php endif; ?>

                        <form action="index.php" method="post">
                            <input type="hidden" name="action" value="xuly_dangnhap">

                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text border-end-0 bg-light"><i
                                            class="fa-solid fa-envelope text-muted"></i></span>
                                    <input class="form-control form-control-lg border-start-0 ps-0 bg-light"
                                        type="email" name="txtemail" placeholder="Nhập địa chỉ email..." required
                                        autofocus />
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label fw-bold small text-muted">Mật khẩu</label>
                                    <a href="index.php?action=quenmatkhau"
                                        class="small text-success text-decoration-none fw-bold">Quên mật khẩu?</a>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text border-end-0 bg-light"><i
                                            class="fa-solid fa-lock text-muted"></i></span>
                                    <input class="form-control form-control-lg border-start-0 ps-0 bg-light"
                                        type="password" name="txtmatkhau" placeholder="Nhập mật khẩu..." required />
                                </div>
                            </div>

                            <div class="d-grid gap-2 mb-4">
                                <button type="submit"
                                    class="btn btn-success btn-login btn-lg rounded-pill shadow-sm fw-bold">Đăng
                                    nhập</button>
                            </div>

                            <div class="text-center mt-4 pt-3 border-top">
                                <span class="text-muted small">Lần đầu đến với Fit'n Ngon? </span>
                                <a href="index.php?action=dangky" class="text-success fw-bold text-decoration-none">Tạo
                                    tài khoản mới</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-center mt-3 text-muted small">
                    &copy; 2026 Fit'n Ngon. All rights reserved.
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <?php include("../inc/thongbao.php"); ?>
</body>

</html>
<script>
    <?php if (isset($_SESSION["thongbao_thanhcong"])): ?>
        Swal.fire({
            icon: 'success',
            title: 'Thành công!',
            text: '<?php echo $_SESSION["thongbao_thanhcong"]; ?>',
            confirmButtonColor: '#4CAF50',
            timer: 3000
        });
        <?php unset($_SESSION["thongbao_thanhcong"]); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION["thongbao_loi"])): ?>
        Swal.fire({
            icon: 'error',
            title: 'Lỗi rồi!',
            text: '<?php echo $_SESSION["thongbao_loi"]; ?>',
            confirmButtonColor: '#d33'
        });
        <?php unset($_SESSION["thongbao_loi"]); ?>
    <?php endif; ?>
</script>

<style>
    .login-body {
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
            url('/DoAn_HealthyFood/images/banners/bg_login.jpg');

        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 100vh;
        width: 100%;
        display: flex;
        align-items: center;
    }

    .login-card {
        background: rgba(255, 255, 255, 0.9) !important;
        backdrop-filter: blur(8px);
        border: none;
    }
</style>