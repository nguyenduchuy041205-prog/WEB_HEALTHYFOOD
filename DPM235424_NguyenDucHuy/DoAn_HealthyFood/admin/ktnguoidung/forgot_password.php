<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fit'n Ngon - Quên mật khẩu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        :root {
            --primary-color: #28a745;
            --overlay-dark: rgba(0, 0, 0, 0.5);
        }

        body {
            background: linear-gradient(var(--overlay-dark), var(--overlay-dark)),
                url('/DoAn_HealthyFood/images/banners/bg_login.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 100vh;
            display: flex;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .forgot-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .forgot-card:hover {
            transform: translateY(-5px);
        }

        .btn-success {
            background-color: var(--primary-color);
            border: none;
            padding: 10px 20px;
            transition: all 0.3s;
        }

        .btn-success:hover {
            background-color: #218838;
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
        }

        .form-control {
            border: 1px solid #eee;
            background: #fdfdfd;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(40, 167, 69, 0.1);
            border-color: var(--primary-color);
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                <div class="card forgot-card p-4">
                    <div class="text-center mb-4">
                        <div class="bg-success d-inline-block p-3 rounded-circle mb-3 shadow-sm">
                            <i class="fa-solid fa-key text-white fa-2x"></i>
                        </div>
                        <h3 class="fw-bold text-dark">Quên mật khẩu?</h3>
                        <p class="text-muted small">Xác thực thông tin để bảo mật tài khoản Fit'n Ngon</p>
                    </div>

                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger border-0 small py-2 mb-3">
                            <i class="fa-solid fa-triangle-exclamation me-2"></i><?php echo $error; ?>
                        </div>
                    <?php endif; ?>

                    <form action="index.php" method="post">
                        <input type="hidden" name="action" value="xuly_quenmatkhau">

                        <div class="mb-3">
                            <label class="form-label small fw-bold text-secondary">Email đăng ký</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 rounded-start-pill"><i
                                        class="fa-solid fa-envelope text-muted"></i></span>
                                <input type="email" name="txtemail" class="form-control rounded-end-pill border-start-0"
                                    required placeholder="name@example.com">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold text-secondary">Số điện thoại</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 rounded-start-pill"><i
                                        class="fa-solid fa-phone text-muted"></i></span>
                                <input type="text" name="txtsdt" class="form-control rounded-end-pill border-start-0"
                                    required placeholder="Nhập SĐT xác minh">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold text-secondary">Mật khẩu mới</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 rounded-start-pill"><i
                                        class="fa-solid fa-lock text-muted"></i></span>
                                <input type="password" name="txtmatkhaumoi"
                                    class="form-control rounded-end-pill border-start-0" required
                                    placeholder="Nhập mật khẩu mới">
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success rounded-pill fw-bold shadow-sm">
                                <i class="fa-solid fa-arrows-rotate me-2"></i>Cập nhật ngay
                            </button>
                            <a href="index.php" class="btn btn-link btn-sm text-decoration-none text-muted">
                                <i class="fa-solid fa-arrow-left me-1"></i> Quay lại đăng nhập
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?php include("../inc/thongbao.php"); ?>
</body>

</html>