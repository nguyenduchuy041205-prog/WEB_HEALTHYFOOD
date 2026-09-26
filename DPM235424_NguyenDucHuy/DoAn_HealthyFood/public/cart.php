<?php include("inc/top.php"); ?>

<div class="container my-5">
    <?php if (demhangtronggio() == 0) { ?>
        <div class="text-center py-5">
            <i class="fa-solid fa-cart-shopping fs-1 text-muted mb-3"></i>
            <h3 class="text-secondary">Giỏ hàng của bạn đang trống!</h3>
            <p class="text-muted">Hãy chọn cho mình những món ăn healthy để bắt đầu một ngày mới nhé.</p>
            <a href="index.php" class="btn btn-green rounded-pill px-4 mt-3">Quay lại thực đơn</a>
        </div>
    <?php } else { ?>
        <h3 class="text-green fw-bold mb-4"><i class="fa-solid fa-basket-shopping"></i> GIỎ HÀNG CỦA BẠN</h3>

        <form action="index.php" method="post">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4">Sản phẩm</th>
                                <th>Đơn giá</th>
                                <th style="width: 150px;">Số lượng</th>
                                <th>Thành tiền</th>
                                <th class="text-center">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($giohang as $id => $mh): ?>
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-3 me-3" width="70" height="70"
                                                src="../images/products/<?php echo $mh["hinhanh"]; ?>"
                                                style="object-fit: cover;">
                                            <span class="fw-bold text-dark"><?php echo $mh["tenmathang"]; ?></span>
                                        </div>
                                    </td>
                                    <td><?php echo number_format($mh["gia"]); ?>đ</td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm text-center rounded-pill"
                                            name="mh[<?php echo $id; ?>]" value="<?php echo $mh["soluong"]; ?>" min="0">
                                    </td>
                                    <td class="fw-bold text-green"><?php echo number_format($mh["thanhtien"]); ?>đ</td>
                                    <td class="text-center">
                                        <a href="index.php?action=capnhatgio&mh[<?php echo $id; ?>]=0" class="text-danger">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot class="bg-light">
                            <tr>
                                <td colspan="3" class="text-end fw-bold ps-4">Tổng cộng:</td>
                                <td colspan="2" class="text-danger fw-bold fs-5">
                                    <?php echo number_format(tinhtiengiohang()); ?>đ
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-md-6">
                    <a href="index.php" class="text-green text-decoration-none fw-bold small">
                        <i class="fa-solid fa-arrow-left me-1"></i> Tiếp tục mua hàng
                    </a>
                    <span class="mx-2 text-muted">|</span>
                    <a href="index.php?action=xoagiohang" class="text-muted text-decoration-none small"
                        onclick="return confirm('Bạn có chắc muốn xóa toàn bộ giỏ hàng?')">
                        Xóa tất cả giỏ hàng
                    </a>
                </div>
                <div class="col-md-6 text-end mt-3 mt-md-0">
                    <input type="hidden" name="action" value="capnhatgio">
                    <button type="submit" class="btn btn-outline-success rounded-pill px-4 me-2">Cập nhật giỏ</button>
                    <a href="index.php?action=thanhtoan" class="btn btn-green rounded-pill px-5 fw-bold shadow-sm">THANH
                        TOÁN <i class="fa-solid fa-chevron-right ms-1"></i></a>
                </div>
            </div>
        </form>
    <?php } ?>
</div>

<?php include("inc/bottom.php"); ?>