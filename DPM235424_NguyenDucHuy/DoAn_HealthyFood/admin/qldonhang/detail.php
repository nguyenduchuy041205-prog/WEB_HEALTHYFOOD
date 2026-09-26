<?php include("../inc/top.php"); ?>

<div class="container-fluid py-4">
    <div class="mb-4">
        <a href="index.php" class="btn btn-link text-decoration-none p-0 text-muted mb-2">
            <i class="fa-solid fa-arrow-left"></i> Quay lại danh sách
        </a>
        <h3 class="fw-bold">Chi Tiết Đơn Hàng #DH<?php echo $dh["id"]; ?></h3>
    </div>

    <div class="row g-3 mb-4">
        <?php
        $tong_kcal = 0;
        $tong_protein = 0;
        foreach ($chitiet as $ct) {
            $tong_kcal += ($ct["calo"] * $ct["soluong"]);
            $tong_protein += ($ct["protein"] * $ct["soluong"]);
        }
        ?>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4 bg-soft-success">
                <div class="card-body p-4">
                    <h6 class="text-success fw-bold text-uppercase small">Tổng Kcal</h6>
                    <h3 class="fw-bold mb-0 text-success"><?php echo number_format($tong_kcal); ?> Kcal</h3>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4 bg-soft-info">
                <div class="card-body p-4">
                    <h6 class="text-info fw-bold text-uppercase small">Tổng Protein</h6>
                    <h3 class="fw-bold mb-0 text-info"><?php echo number_format($tong_protein); ?> g</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white py-3">
                    <h6 class="mb-0 fw-bold text-success"><i class="fa-solid fa-user-tag me-2"></i>Thông tin nhận hàng
                    </h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="text-muted small fw-bold text-uppercase">Tên khách hàng</label>
                        <p class="mb-0 fw-bold text-dark fs-5"><?php echo $dh["tennguoinhan"]; ?></p>
                    </div>
                    <div class="mb-3">
                        <label class="text-muted small fw-bold text-uppercase">Số điện thoại</label>
                        <p class="mb-0"><?php echo $dh["sodienthoainhan"]; ?></p>
                    </div>
                    <div class="mb-3">
                        <label class="text-muted small fw-bold text-uppercase">Địa chỉ giao hàng</label>
                        <p class="mb-0 text-muted"><?php echo $dh["diachinhan"]; ?></p>
                    </div>
                    <div class="mb-0">
                        <label class="text-muted small fw-bold text-uppercase">Ngày đặt hàng</label>
                        <p class="mb-0 small text-muted">
                            <?php echo date("d/m/Y H:i:s", strtotime($dh["ngaydat"])); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body">
                    <h6 class="fw-bold mb-3"><i class="fa-solid fa-basket-shopping me-2 text-success"></i>Sản phẩm đã
                        đặt</h6>
                    <table class="table align-middle">
                        <thead class="bg-light">
                            <tr>
                                <th>Hình</th>
                                <th>Món ăn</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th class="text-end">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tong_tien = 0;
                            foreach ($chitiet as $ct):
                                $tong_tien += $ct["thanhtien"];
                                ?>
                                <tr>
                                    <td><img src="../../images/products/<?php echo $ct["hinhanh"]; ?>" width="60"
                                            class="rounded shadow-sm"></td>
                                    <td class="fw-bold"><?php echo $ct["tenmathang"]; ?></td>
                                    <td><?php echo number_format($ct["dongia"]); ?>đ</td>
                                    <td class="text-center">x<?php echo $ct["soluong"]; ?></td>
                                    <td class="text-end fw-bold text-danger"><?php echo number_format($ct["thanhtien"]); ?>đ
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-end fw-bold fs-5 border-0">TỔNG CỘNG:</td>
                                <td class="text-end text-danger fw-bold fs-4 border-0">
                                    <?php echo number_format($tong_tien); ?>đ
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("../inc/bottom.php"); ?>