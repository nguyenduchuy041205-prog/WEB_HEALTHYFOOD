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
                    <a href="index.php?action=hoso" class="list-group-item list-group-item-action active border-0 py-3">
                        <i class="fa-solid fa-user-gear me-2"></i> Thông tin tài khoản
                    </a>
                    <?php if (isset($_SESSION["khachhang"])): ?>
                        <a href="../../public/index.php?action=lichsudonhang"
                            class="list-group-item list-group-item-action border-0 py-3">
                            <i class="fa-solid fa-box-open me-2"></i> Đơn hàng của tôi
                        </a>
                    <?php endif; ?>
                    <a href="index.php?action=doimatkhau" class="list-group-item list-group-item-action border-0 py-3">
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
                        <div class="bg-green-light p-3 rounded-3 me-3">
                            <i class="fa-solid fa-address-card text-green fs-4"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold mb-0">Hồ sơ cá nhân</h4>
                            <p class="text-muted mb-0 small">Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
                        </div>
                    </div>

                    <form action="index.php" method="post">
                        <input type="hidden" name="action" value="xulycapnhathoso">
                        <input type="hidden" name="txtid" value="<?php echo $user['id'] ?? ''; ?>">

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-uppercase">Họ và tên</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-0"><i
                                            class="fa-solid fa-user text-muted"></i></span>
                                    <input type="text" class="form-control bg-light border-0" name="txthoten"
                                        value="<?php echo $user['hoten'] ?? ''; ?>" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-uppercase">Số điện thoại</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-0"><i
                                            class="fa-solid fa-phone text-muted"></i></span>
                                    <input type="text" class="form-control bg-light border-0" name="txtsdt"
                                        value="<?php echo $user['sodienthoai'] ?? ''; ?>">
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-bold small text-uppercase">Địa chỉ Email</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-0"><i
                                            class="fa-solid fa-envelope text-muted"></i></span>
                                    <input type="email" class="form-control bg-light border-0"
                                        value="<?php echo $user['email'] ?? ''; ?>" readonly>
                                </div>
                                <div class="form-text mt-1">Email dùng để đăng nhập và không thể thay đổi.</div>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-bold small text-uppercase">Địa chỉ nhận hàng</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-0"><i
                                            class="fa-solid fa-location-dot text-muted"></i></span>
                                    <textarea class="form-control bg-light border-0" name="txtdiachi"
                                        rows="3"><?php echo $user['diachi'] ?? ''; ?></textarea>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4 opacity-25">

                        <div class="d-flex gap-2 justify-content-end">
                            <a href="../../public/index.php" class="btn btn-light rounded-pill px-4">Quay lại</a>
                            <button type="submit" class="btn btn-green rounded-pill px-4 shadow-sm">Lưu thay
                                đổi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-green-light {
        background-color: #e8f5e9;
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
</script>