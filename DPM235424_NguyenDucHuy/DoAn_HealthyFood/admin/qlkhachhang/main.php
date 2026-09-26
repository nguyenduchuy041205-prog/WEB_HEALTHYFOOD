<?php include("../inc/top.php"); ?>

<div class="container-fluid p-0">
    <div class="mb-4">
        <h3 class="fw-bold text-dark">Quản Lý Khách Hàng</h3>
        <p class="text-muted">Theo dõi thông tin, tổng chi tiêu và lịch sử mua hàng của khách Fit'n Ngon.</p>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-header bg-white py-3 border-bottom-0">
            <h5 class="fw-bold mb-0 text-success"><i class="fa-solid fa-users me-2"></i>Tổng số khách hàng:
                <?php echo count($khachhang); ?>
            </h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4 py-3 text-muted small fw-bold">KHÁCH HÀNG</th>
                            <th class="py-3 text-muted small fw-bold">THÔNG TIN LIÊN HỆ</th>
                            <th class="py-3 text-muted small fw-bold text-end">TỔNG CHI TIÊU</th>
                            <th class="py-3 text-muted small fw-bold text-center">TRẠNG THÁI</th>
                            <th class="text-end pe-4 py-3 text-muted small fw-bold">HÀNH ĐỘNG</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($khachhang) > 0): ?>
                            <?php foreach ($khachhang as $kh): ?>
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            <img src="../../images/users/<?php echo $kh["hinhanh"] ?? 'user.png'; ?>"
                                                class="rounded-circle me-3 border shadow-sm" width="45" height="45"
                                                style="object-fit: cover;">
                                            <div>
                                                <div class="fw-bold text-dark"><?php echo $kh["hoten"]; ?></div>
                                                <small class="text-muted">ID: #USER<?php echo $kh["id"]; ?></small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="small"><i
                                                class="fa-solid fa-envelope me-2 text-muted"></i><?php echo $kh["email"]; ?>
                                        </div>
                                        <div class="small"><i
                                                class="fa-solid fa-phone me-2 text-muted"></i><?php echo $kh["sodienthoai"]; ?>
                                        </div>
                                    </td>

                                    <td class="text-end">
                                        <div class="fw-bold text-danger"><?php echo number_format($kh["tong_chi_tra"] ?? 0); ?>đ
                                        </div>
                                        <small class="text-muted"><?php echo $kh["so_don_hang"] ?? 0; ?> đơn hàng</small>
                                    </td>

                                    <td class="text-center">
                                        <?php if ($kh["trangthai"] == 1): ?>
                                            <span class="badge bg-soft-success text-success rounded-pill px-3">Đang hoạt động</span>
                                        <?php else: ?>
                                            <span class="badge bg-soft-danger text-danger rounded-pill px-3">Đã khóa</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-end pe-4">
                                        <div class="d-flex justify-content-end gap-2">
                                            <a href="index.php?action=lichsu&id=<?php echo $kh["id"]; ?>"
                                                class="btn btn-sm btn-outline-info rounded-pill px-3 shadow-sm"
                                                title="Lịch sử mua hàng">
                                                <i class="fa-solid fa-clock-rotate-left"></i> Lịch sử
                                            </a>

                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted italic">Chưa có khách hàng nào đăng ký.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-soft-success {
        background-color: #e8f5e9;
    }

    .bg-soft-danger {
        background-color: #ffebee;
    }

    .table thead th {
        border-bottom: 0;
    }

    .btn-outline-info:hover {
        color: white !important;
    }
</style>

<?php include("../inc/bottom.php"); ?>