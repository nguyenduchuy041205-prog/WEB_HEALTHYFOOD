<?php
if (isset($_SESSION["khachhang"])) {
    include("../../public/inc/top.php");
} else {
    include("../inc/top.php");
}
?>

<div class="container my-5">
    <div class="row g-4">
        <div class="col-lg-3">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="text-center p-4 bg-light border-bottom">
                    <div class="mb-3">
                        <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($user['hoten']); ?>&background=4CAF50&color=fff&size=100"
                            class="rounded-circle shadow-sm border border-3 border-white" alt="Avatar">
                    </div>
                    <h6 class="fw-bold mb-1"><?php echo $user['hoten']; ?></h6>
                    <small class="text-muted"><?php echo $user['email']; ?></small>
                </div>
                <div class="list-group list-group-flush">
                    <a href="index.php?action=hoso" class="list-group-item list-group-item-action border-0 py-3">
                        <i class="fa-solid fa-user-gear me-2 text-muted"></i> Thông tin tài khoản
                    </a>
                    <?php if (isset($_SESSION["khachhang"])): ?>
                        <a href="../../public/index.php?action=lichsudonhang"
                            class="list-group-item list-group-item-action border-0 py-3">
                            <i class="fa-solid fa-box-open me-2 text-muted"></i> Đơn hàng của tôi
                        </a>
                    <?php endif; ?>
                    <a href="index.php?action=doimatkhau"
                        class="list-group-item list-group-item-action active border-0 py-3">
                        <i class="fa-solid fa-lock me-2"></i> Đổi mật khẩu
                    </a>
                    <a href="index.php?action=dangxuat"
                        class="list-group-item list-group-item-action border-0 py-3 text-danger">
                        <i class="fa-solid fa-right-from-bracket me-2"></i> Đăng xuất
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 p-md-5">
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-warning-light p-3 rounded-3 me-3">
                            <i class="fa-solid fa-shield-halved text-warning fs-4"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold mb-0">Đổi mật khẩu</h4>
                            <p class="text-muted mb-0 small">Thiết lập mật khẩu mới để bảo vệ tài khoản của bạn</p>
                        </div>
                    </div>

                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger border-0 shadow-sm rounded-3 mb-4">
                            <i class="fa-solid fa-circle-exclamation me-2"></i><?php echo $error; ?>
                        </div>
                    <?php endif; ?>

                    <form action="index.php" method="post">
                        <input type="hidden" name="action" value="xulydoimatkhau">
                        <input type="hidden" name="txtid" value="<?php echo $user['id'] ?? ''; ?>">

                        <div class="row g-4">
                            <div class="col-12">
                                <label class="form-label fw-bold small text-uppercase">Mật khẩu hiện tại</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-0"><i
                                            class="fa-solid fa-key text-muted"></i></span>
                                    <input type="password" name="txtmatkhau_cu" class="form-control bg-light border-0"
                                        placeholder="Nhập mật khẩu đang dùng" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-uppercase">Mật khẩu mới</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-0"><i
                                            class="fa-solid fa-lock text-muted"></i></span>
                                    <input type="password" name="txtmatkhau_moi" class="form-control bg-light border-0"
                                        placeholder="Nhập mật khẩu mới" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-uppercase">Xác nhận mật khẩu</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-0"><i
                                            class="fa-solid fa-lock-open text-muted"></i></span>
                                    <input type="password" name="txtnhaplai_moi" class="form-control bg-light border-0"
                                        placeholder="Xác nhận mật khẩu mới" required>
                                </div>
                            </div>
                        </div>

                        <hr class="my-5 opacity-25">

                        <div class="d-flex gap-2 justify-content-end">
                            <a href="index.php?action=hoso" class="btn btn-light rounded-pill px-4">Hủy bỏ</a>
                            <button type="submit" class="btn btn-green rounded-pill px-4 shadow-sm">
                                <i class="fa-solid fa-save me-2"></i>Cập nhật mật khẩu
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-warning-light {
        background-color: #fff9c4;
    }

    .text-green {
        color: #4CAF50;
    }

    .btn-green {
        background-color: #4CAF50;
        color: white;
        border: none;
    }

    .btn-green:hover {
        background-color: #2E7D32;
        color: white;
        transition: 0.3s;
    }

    .list-group-item.active {
        background-color: #4CAF50;
        border-color: #4CAF50;
    }

    .form-control:focus {
        box-shadow: none;
        border: 1px solid #4CAF50 !important;
        background-color: #fff !important;
    }

    .input-group-text {
        min-width: 45px;
        justify-content: center;
    }
</style>

<?php
if (isset($_SESSION["khachhang"])) {
    include("../../public/inc/bottom.php");
} else {
    include("../inc/bottom.php");
}
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    <?php if (isset($_SESSION["thongbao_thanhcong"])): ?>
        Swal.fire({
            title: 'Thành công!',
            text: '<?php echo $_SESSION["thongbao_thanhcong"]; ?>',
            icon: 'success',
            confirmButtonColor: '#4CAF50',
            timer: 3000,
            timerProgressBar: true
        });
        <?php unset($_SESSION["thongbao_thanhcong"]); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION["thongbao_loi"])): ?>
        Swal.fire({
            title: 'Thất bại!',
            text: '<?php echo $_SESSION["thongbao_loi"]; ?>',
            icon: 'error',
            confirmButtonColor: '#d33'
        });
        <?php unset($_SESSION["thongbao_loi"]); ?>
    <?php endif; ?>
</script>