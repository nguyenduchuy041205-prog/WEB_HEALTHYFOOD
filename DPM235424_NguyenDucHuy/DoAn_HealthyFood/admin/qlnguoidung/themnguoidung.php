<?php include("../inc/top.php"); ?>

<div class="container-fluid p-0">
    <div class="mb-4">
        <h3 class="fw-bold">Thêm Người Dùng Mới</h3>
        <p class="text-muted">Nhập thông tin để khởi tạo tài khoản thành viên mới.</p>
    </div>

    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <form action="index.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="xulythem">

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Họ tên</label>
                                <input type="text" class="form-control rounded-3" name="txthoten"
                                    placeholder="Nhập họ và tên" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">Email</label>
                                <input type="email" class="form-control rounded-3" name="txtemail"
                                    placeholder="Địa chỉ email" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">Số điện thoại</label>
                                <input type="text" class="form-control rounded-3" name="txtsdt"
                                    placeholder="Số điện thoại liên lạc" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">Mật khẩu</label>
                                <input type="password" class="form-control rounded-3" name="txtmatkhau"
                                    placeholder="Thiết lập mật khẩu" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Vai trò</label>
                                <select class="form-select rounded-3" name="optloai">
                                    <option value="0" selected>Khách hàng</option>
                                    <option value="1">Quản trị viên</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Địa chỉ</label>
                                <textarea class="form-control rounded-3" name="txtdiachi" rows="2"
                                    placeholder="Nhập địa chỉ cư trú"></textarea>
                            </div>

                            <div class="col-12 mt-4 text-end">
                                <a href="index.php" class="btn btn-light rounded-pill px-4 me-2">Hủy bỏ</a>
                                <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm">
                                    <i class="fa-solid fa-save me-2"></i>Lưu tài khoản
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("../inc/bottom.php"); ?>