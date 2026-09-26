<?php include("inc/top.php"); ?>

<div class="container py-5" style="min-height: 600px;">
    <h3 class="fw-bold mb-4 text-green">
        <i class="fa-solid fa-clock-rotate-left me-2"></i>Đơn hàng của tôi
    </h3>

    <?php if (empty($ds_donhang)): ?>
        <div class="alert alert-info rounded-4 border-0 shadow-sm">
            Bạn chưa có đơn hàng nào. <a href="index.php" class="fw-bold text-decoration-none">Mua ngay!</a>
        </div>
    <?php else: ?>
        <?php foreach ($ds_donhang as $d): ?>
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="fw-bold text-success">Mã đơn: #DH<?php echo $d["id"]; ?></span>
                        <span class="text-muted small"><?php echo date("d/m/Y H:i", strtotime($d["ngaydat"])); ?></span>
                    </div>

                    <?php if ($d["trangthai"] == 3): ?>
                        <div class="alert alert-secondary py-2 rounded-3 mb-4 border-0">
                            <i class="fa-solid fa-circle-xmark me-2"></i> Đơn hàng này đã bị hủy.
                        </div>
                    <?php else: ?>
                        <div class="row text-center position-relative mb-4">
                            <div class="col-4">
                                <i
                                    class="fa-solid fa-file-invoice fs-4 <?php echo ($d['trangthai'] >= 0) ? 'text-success' : 'text-muted'; ?>"></i>
                                <div class="small fw-bold mt-1">Đã đặt</div>
                            </div>
                            <div class="col-4">
                                <i
                                    class="fa-solid fa-truck-fast fs-4 <?php echo ($d['trangthai'] >= 1) ? 'text-success' : 'text-muted'; ?>"></i>
                                <div class="small fw-bold mt-1">Đang giao</div>
                            </div>
                            <div class="col-4">
                                <i
                                    class="fa-solid fa-check-double fs-4 <?php echo ($d['trangthai'] >= 2) ? 'text-success' : 'text-muted'; ?>"></i>
                                <div class="small fw-bold mt-1">Hoàn tất</div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="d-flex justify-content-between align-items-center border-top pt-3">
                        <div>
                            <span class="text-muted small">Tổng thanh toán:</span>
                            <span class="fw-bold text-danger fs-5 ms-1">
                                <?php echo number_format($d["tongtien"]); ?>đ
                            </span>
                        </div>
                        <a href="index.php?action=chitietdonhang&id=<?php echo $d["id"]; ?>"
                            class="btn btn-sm btn-green rounded-pill px-4 shadow-sm">
                            Xem chi tiết
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php include("inc/bottom.php"); ?>