<?php include("../inc/top.php"); ?>

<div class="container-fluid p-0">
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h3 class="fw-bold">Quản Lý Thành Viên</h3>
            <p class="text-muted mb-0">Quản lý tài khoản khách hàng và phân quyền hệ thống.</p>
        </div>
        <a href="index.php?action=them" class="btn btn-primary rounded-pill px-4 shadow-sm">
            <i class="fa-solid fa-user-plus me-2"></i> Thêm người dùng
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4 py-3 text-muted small fw-bold">NGƯỜI DÙNG</th>
                            <th class="py-3 text-muted small fw-bold">SỐ ĐIỆN THOẠI</th>
                            <th class="py-3 text-muted small fw-bold">VAI TRÒ</th>
                            <th class="py-3 text-muted small fw-bold">TRẠNG THÁI</th>
                            <th class="text-end pe-4 py-3 text-muted small fw-bold">THAO TÁC</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($nguoidung as $u): ?>
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <img src="../../images/users/<?php echo $u["hinhanh"] ?? 'user.png'; ?>"
                                            class="rounded-circle me-3 border" width="45" height="45">
                                        <div>
                                            <div class="fw-bold text-dark"><?php echo $u["hoten"]; ?></div>
                                            <div class="text-muted small"><?php echo $u["email"]; ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td><?php echo $u["sodienthoai"]; ?></td>
                                <td>
                                    <?php if ($u["loai"] == 1): ?>
                                        <span class="badge bg-danger rounded-pill">Quản trị viên</span>
                                    <?php else: ?>
                                        <span class="badge bg-info rounded-pill">Khách hàng</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($u["trangthai"] == 1): ?>
                                        <span class="badge bg-success rounded-pill">Đang hoạt động</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary rounded-pill">Đã khóa</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="d-flex justify-content-end gap-2">
                                        <?php if ($u["trangthai"] == 1): ?>
                                            <a href="index.php?action=doitrangthai&id=<?php echo $u["id"]; ?>&trangthai=0"
                                                class="btn btn-sm btn-outline-secondary rounded-pill px-3"
                                                title="Khóa tài khoản">
                                                <i class="fa-solid fa-lock"></i> Khóa
                                            </a>
                                        <?php else: ?>
                                            <a href="index.php?action=doitrangthai&id=<?php echo $u["id"]; ?>&trangthai=1"
                                                class="btn btn-sm btn-outline-success rounded-pill px-3" title="Mở khóa">
                                                <i class="fa-solid fa-lock-open"></i> Mở
                                            </a>
                                        <?php endif; ?>

                                        <?php if ($u["loai"] != 1): // Không cho xóa Admin chính ?>
                                            <a href="index.php?action=xoa&id=<?php echo $u["id"]; ?>"
                                                class="btn btn-sm btn-outline-danger rounded-circle"
                                                style="width:32px; height:32px; padding:0; line-height:32px;"
                                                onclick="return confirm('Xóa tài khoản này?')">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        <?php endif; ?>
                                    </div>
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