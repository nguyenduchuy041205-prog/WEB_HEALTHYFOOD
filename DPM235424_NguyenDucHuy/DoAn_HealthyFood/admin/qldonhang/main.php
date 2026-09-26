<?php include("../inc/top.php"); ?>

<div class="container-fluid p-0">
    <div class="mb-4">
        <h3 class="fw-bold text-dark">Quản Lý Đơn Hàng</h3>
        <p class="text-muted">Theo dõi và xử lý các yêu cầu đặt hàng Healthy Food.</p>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4 py-3 text-muted small fw-bold">MÃ ĐƠN</th>
                            <th class="py-3 text-muted small fw-bold">KHÁCH HÀNG</th>
                            <th class="py-3 text-muted small fw-bold">NGÀY ĐẶT</th>
                            <th class="py-3 text-muted small fw-bold">TỔNG TIỀN</th>
                            <th class="py-3 text-muted small fw-bold">TRẠNG THÁI</th>
                            <th class="text-end pe-4 py-3 text-muted small fw-bold">THAO TÁC</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ds_donhang as $d): ?>
                            <tr>
                                <td class="ps-4 fw-bold text-green">#DH<?php echo $d["id"]; ?></td>

                                <td>
                                    <div class="fw-bold"><?php echo $d["tennguoinhan"]; ?></div>
                                    <small class="text-muted"><i class="fa-solid fa-phone fa-xs"></i>
                                        <?php echo $d["sodienthoainhan"]; ?></small>
                                </td>

                                <td><i class="fa-regular fa-calendar-days me-1 text-muted"></i>
                                    <?php echo date("d/m/Y", strtotime($d["ngaydat"])); ?></td>

                                <td class="fw-bold text-danger"><?php echo number_format($d["tongtien"]); ?>đ</td>

                                <td>
                                    <?php
                                    $trangthai = (isset($d["trangthai"]) && $d["trangthai"] !== "") ? (int) $d["trangthai"] : 0;

                                    if ($trangthai === 0) {
                                        echo '<span class="badge bg-warning text-dark px-3 py-2 rounded-pill"><i class="fa-solid fa-clock me-1"></i>Mới nhận</span>';
                                    } elseif ($trangthai === 1) {
                                        echo '<span class="badge bg-info text-dark px-3 py-2 rounded-pill"><i class="fa-solid fa-truck me-1"></i>Đang giao</span>';
                                    } elseif ($trangthai === 2) {
                                        echo '<span class="badge bg-success text-white px-3 py-2 rounded-pill"><i class="fa-solid fa-circle-check me-1"></i>Hoàn tất</span>';
                                    } else {
                                        echo '<span class="badge bg-secondary text-white px-3 py-2 rounded-pill">Đã hủy</span>';
                                    }
                                    ?>
                                </td>

                                <td class="text-end pe-4">
                                    <a href="index.php?action=detail&id=<?php echo $d['id']; ?>"
                                        class="btn btn-sm btn-outline-primary rounded-circle me-1" title="Xem chi tiết">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>

                                    <a href="index.php?action=sua&id=<?php echo $d['id']; ?>"
                                        class="btn btn-sm btn-outline-info rounded-circle me-1" title="Cập nhật trạng thái">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="index.php?action=inhoadon&id=<?php echo $d['id']; ?>"
                                        class="btn btn-sm btn-outline-info" target="_blank" title="In hóa đơn">
                                        <i class="fa-solid fa-print"></i>
                                    </a>
                                    <a href="index.php?action=xoa&id=<?php echo $d['id']; ?>"
                                        class="btn btn-sm btn-outline-danger rounded-circle" title="Xóa đơn hàng"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?')">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include("../inc/bottom.php"); ?>