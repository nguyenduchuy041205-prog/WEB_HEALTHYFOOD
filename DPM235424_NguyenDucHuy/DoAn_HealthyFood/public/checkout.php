<?php include("inc/top.php"); ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 p-sm-5">
                    <h3 class="fw-bold text-success mb-4 text-center">
                        <i class="fa-solid fa-truck-ramp-box me-2"></i>Thông tin giao hàng
                    </h3>

                    <form action="index.php" method="post">
                        <input type="hidden" name="action" value="hoantatthanhtoan">

                        <div class="mb-3">
                            <label class="form-label fw-bold text-muted small">Họ tên người nhận</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i
                                        class="fa-solid fa-user text-muted"></i></span>
                                <input type="text" class="form-control bg-light border-start-0" name="txthoten"
                                    value="<?php echo isset($_SESSION["khachhang"]) ? $_SESSION["khachhang"]["hoten"] : ""; ?>"
                                    placeholder="Nhập họ tên người nhận..." required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold text-muted small">Số điện thoại</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i
                                        class="fa-solid fa-phone text-muted"></i></span>
                                <input type="text" class="form-control bg-light border-start-0" name="txtsdt"
                                    value="<?php echo isset($_SESSION["khachhang"]) ? $_SESSION["khachhang"]["sodienthoai"] : ""; ?>"
                                    placeholder="Nhập số điện thoại..." required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted small">Địa chỉ giao hàng</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i
                                        class="fa-solid fa-location-dot text-muted"></i></span>
                                <textarea class="form-control bg-light border-start-0" name="txtdiachi" rows="3"
                                    placeholder="Số nhà, tên đường, phường/xã..."
                                    required><?php echo isset($_SESSION["khachhang"]) ? $_SESSION["khachhang"]["diachi"] : ""; ?></textarea>
                            </div>
                        </div>

                        <div class="alert alert-info border-0 rounded-3 small mb-4">
                            <i class="fa-solid fa-circle-info me-2"></i>
                            Tổng thanh toán: <strong><?php echo number_format(tinhtiengiohang()); ?>đ</strong>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success btn-lg rounded-pill fw-bold shadow-sm">
                                XÁC NHẬN ĐẶT HÀNG
                            </button>
                            <a href="index.php?action=giohang"
                                class="btn btn-link text-muted text-decoration-none small">Quay lại giỏ hàng</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("inc/bottom.php"); ?>