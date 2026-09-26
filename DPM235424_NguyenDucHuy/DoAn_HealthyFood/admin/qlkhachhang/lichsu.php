<?php include("../inc/top.php"); ?>
<div class="container-fluid py-4">
    <div class="mb-4">
        <a href="index.php" class="text-decoration-none text-muted small"><i class="fa-solid fa-arrow-left"></i> Quay
            lại</a>
        <h3 class="fw-bold">Lịch Sử Mua Hàng: <?php echo $kh_info["hoten"]; ?></h3>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">MÃ ĐƠN</th>
                        <th>NGÀY ĐẶT</th>
                        <th>TỔNG TIỀN</th>
                        <th>TRẠNG THÁI</th>
                        <th class="text-end pe-4">CHI TIẾT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($ds_donhang) > 0): ?>
                        <?php foreach ($ds_donhang as $d): ?>

                            <tr <?php echo ($d["trangthai"] == 3) ? 'style="background-color: #fff5f5; opacity: 0.8;"' : ''; ?>>

                                <td class="ps-4 fw-bold">#DH<?php echo $d["id"]; ?></td>

                                <td>
                                    <i class="fa-regular fa-calendar me-1 text-muted"></i>
                                    <?php echo date("d/m/Y H:i", strtotime($d["ngaydat"])); ?>
                                </td>

                                <td class="fw-bold"><?php echo number_format($d["tongtien"]); ?>đ</td>

                                <td>
                                    <?php
                                    $tt = (int) $d["trangthai"];
                                    if ($tt === 3)
                                        echo '<span class="badge bg-danger">Đã hủy</span>';
                                    elseif ($tt === 0)
                                        echo '<span class="badge bg-warning text-dark px-3 py-2 rounded-pill">Mới nhận</span>';
                                    elseif ($tt === 1)
                                        echo '<span class="badge bg-info text-dark px-3 py-2 rounded-pill">Đang giao</span>';
                                    elseif ($tt === 2)
                                        echo '<span class="badge bg-success text-white px-3 py-2 rounded-pill">Hoàn tất</span>';

                                    ?>
                                </td>

                                <td class="text-end pe-4">
                                    <a href="../qldonhang/index.php?action=detail&id=<?php echo $d['id']; ?>"
                                        class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                        Chi tiết
                                    </a>
                                </td>
                            </tr> <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">Khách hàng chưa có đơn hàng nào.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include("../inc/bottom.php"); ?>