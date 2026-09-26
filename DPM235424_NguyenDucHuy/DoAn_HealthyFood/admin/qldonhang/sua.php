<?php include("../inc/top.php"); ?>

<div class="container-fluid p-0">
    <div class="mb-4">
        <h3 class="fw-bold text-dark">Cập nhật đơn hàng</h3>
        <p class="text-muted">Thay đổi trạng thái cho đơn hàng #DH<?php echo $donhang_ht["id"]; ?></p>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <form method="post" action="index.php">
                        <input type="hidden" name="action" value="xuly_sua">
                        <input type="hidden" name="txtid" value="<?php echo $donhang_ht["id"]; ?>">

                        <div class="mb-3">
                            <label class="form-label fw-bold">Tên khách hàng</label>
                            <input class="form-control" type="text" value="<?php echo $donhang_ht["tennguoinhan"]; ?>"
                                readonly disabled>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Tổng tiền</label>
                            <input class="form-control text-danger fw-bold" type="text"
                                value="<?php echo number_format($donhang_ht["tongtien"]); ?>đ" readonly disabled>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-primary">Cập nhật Trạng thái</label>
                            <select class="form-select form-select-lg" name="optTrangthai">
                                <option value="0" <?php if ($donhang_ht["trangthai"] == 0)
                                    echo "selected"; ?>>Mới nhận
                                </option>
                                <option value="1" <?php if ($donhang_ht["trangthai"] == 1)
                                    echo "selected"; ?>>Đang giao
                                </option>
                                <option value="2" <?php if ($donhang_ht["trangthai"] == 2)
                                    echo "selected"; ?>>Hoàn tất
                                </option>
                            </select>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success px-4 py-2 rounded-pill fw-bold">Lưu thay
                                đổi</button>
                            <a href="index.php" class="btn btn-light px-4 py-2 rounded-pill border">Hủy</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("../inc/bottom.php"); ?>