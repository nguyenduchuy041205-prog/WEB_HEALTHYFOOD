<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Đăng nhập hệ thống - Fit'n Ngon</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="/DoAn_HealthyFood/admin/inc/css/app.css" rel="stylesheet">
    <link href="/DoAn_HealthyFood/admin/inc/css/admin-style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="login-body">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="text-center mb-4">
                    <h2 class="fw-bold text-success"><i class="fa-solid fa-leaf me-2"></i>FIT'N NGON</h2>
                </div>
                <div class="card border-0 shadow-lg rounded-4">
                    <div class="card-body p-4 p-sm-5">
                        <h4 class="fw-bold text-dark text-center mb-4">Tạo tài khoản mới</h4>

                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger rounded-3 small"><?php echo $error; ?></div>
                        <?php endif; ?>

                        <form action="index.php" method="post">
                            <input type="hidden" name="action" value="xuly_dangky">

                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted">Họ và tên</label>
                                <input class="form-control bg-light" type="text" name="txthoten"
                                    placeholder="Nguyễn Văn A" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted">Email (Dùng để đăng nhập)</label>
                                <input class="form-control bg-light" type="email" name="txtemail"
                                    placeholder="email@example.com" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold small text-muted">Mật khẩu</label>
                                    <input class="form-control bg-light" type="password" name="txtmatkhau"
                                        placeholder="******" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold small text-muted">Số điện thoại</label>
                                    <input class="form-control bg-light" type="text" name="txtsdt" placeholder="090..."
                                        required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold small text-muted">Địa chỉ mặc định</label>
                                <textarea class="form-control bg-light" name="txtdiachi" rows="2"
                                    placeholder="Số nhà, tên đường..."></textarea>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success btn-lg rounded-pill fw-bold shadow-sm">Đăng
                                    ký ngay</button>
                            </div>

                            <div class="text-center mt-4 pt-3 border-top">
                                <span class="text-muted small">Đã có tài khoản? </span>
                                <a href="index.php" class="text-success fw-bold text-decoration-none">Đăng nhập tại
                                    đây</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>