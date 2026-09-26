<?php include("../inc/top.php"); ?>

<div class="container-fluid p-0">
    <div class="mb-4">
        <h3 class="fw-bold text-dark">Quản Lý Danh Mục</h3>
        <p class="text-muted">Phân loại thực đơn để khách hàng dễ dàng tìm kiếm món ăn healthy.</p>
    </div>

    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-header bg-white py-3 border-bottom-0">
                    <h5 class="fw-bold mb-0 <?php echo isset($dm_edit) ? 'text-primary' : 'text-success'; ?>">
                        <?php echo isset($dm_edit) ? '<i class="fa-solid fa-pen-to-square me-2"></i>Cập Nhật' : '<i class="fa-solid fa-plus-circle me-2"></i>Thêm Mới'; ?>
                    </h5>
                </div>
                <div class="card-body pt-0">
                    <?php if (isset($dm_edit)): ?>
                        <form action="index.php" method="post" onsubmit="return showLoading('btnCapNhat');">
                            <input type="hidden" name="action" value="xulysua">
                            <input type="hidden" name="txtid" value="<?php echo $dm_edit["id"]; ?>">
                            <div class="mb-4">
                                <label class="form-label small fw-bold text-muted">TÊN DANH MỤC</label>
                                <input type="text" class="form-control form-control-lg rounded-3 border-primary shadow-none"
                                    name="txtten" value="<?php echo $dm_edit["tendanhmuc"]; ?>" required autofocus>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" id="btnCapNhat"
                                    class="btn btn-primary btn-lg rounded-pill fw-bold">CẬP NHẬT</button>
                                <a href="index.php" class="btn btn-light btn-lg rounded-pill">Hủy bỏ</a>
                            </div>
                        </form>
                    <?php else: ?>
                        <form action="index.php" method="post" onsubmit="return showLoading('btnLuu');">
                            <input type="hidden" name="action" value="xulythem">
                            <div class="mb-4">
                                <label class="form-label small fw-bold text-muted">TÊN DANH MỤC MỚI</label>
                                <input type="text" class="form-control form-control-lg rounded-3 shadow-none" name="txtten"
                                    placeholder="Ví dụ: Salad, Detox..." required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" id="btnLuu"
                                    class="btn btn-success btn-lg rounded-pill fw-bold text-white shadow-sm">
                                    <i class="fa-solid fa-save me-2"></i>LƯU DANH MỤC
                                </button>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4">
                <div
                    class="card-header bg-white py-3 border-bottom-0 d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold text-dark mb-0">Tất Cả Danh Mục</h5>
                    <span class="badge bg-soft-success text-success rounded-pill px-3 py-2">
                        Tổng cộng: <?php echo count($danhmuc); ?>
                    </span>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4 py-3 text-muted small fw-bold" style="width: 100px;">MÃ SỐ</th>
                                    <th class="py-3 text-muted small fw-bold">TÊN DANH MỤC</th>
                                    <th class="py-3 text-muted small fw-bold text-center">TRẠNG THÁI</th>
                                    <th class="text-end pe-4 py-3 text-muted small fw-bold">HÀNH ĐỘNG</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($danhmuc as $d): ?>
                                    <tr
                                        class="<?php echo (isset($dm_edit) && $dm_edit['id'] == $d['id']) ? 'bg-light-primary' : ''; ?>">
                                        <td class="ps-4 text-muted">#<?php echo $d["id"]; ?></td>
                                        <td><span class="fw-bold text-dark"><?php echo $d["tendanhmuc"]; ?></span></td>

                                        <td class="text-center">
                                            <?php if ($d["trangthai"] == 1): ?>
                                                <a href="index.php?action=kichhoat&id=<?php echo $d['id']; ?>&trangthai=0"
                                                    class="badge bg-success text-decoration-none shadow-sm px-3 py-2 rounded-pill status-badge">
                                                    <i class="fa-solid fa-eye me-1"></i> Đang hiện
                                                </a>
                                            <?php else: ?>
                                                <a href="index.php?action=kichhoat&id=<?php echo $d['id']; ?>&trangthai=1"
                                                    class="badge bg-secondary text-decoration-none shadow-sm px-3 py-2 rounded-pill status-badge">
                                                    <i class="fa-solid fa-eye-slash me-1"></i> Đang ẩn
                                                </a>
                                            <?php endif; ?>
                                        </td>

                                        <td class="text-end pe-4">
                                            <div class="d-flex justify-content-end gap-2">
                                                <a href="index.php?action=edit&id=<?php echo $d["id"]; ?>"
                                                    class="btn btn-sm btn-outline-warning rounded-circle shadow-sm action-btn"
                                                    title="Chỉnh sửa">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a href="javascript:void(0);"
                                                    onclick="xacNhanXoaDanhMuc(<?php echo $d['id']; ?>, '<?php echo $d['tendanhmuc']; ?>')"
                                                    class="btn btn-sm btn-outline-danger rounded-circle shadow-sm action-btn"
                                                    title="Xóa danh mục">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
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
    </div>
</div>

<style>
    /* UI Nâng cấp */
    .bg-light-primary {
        background-color: #f0f7ff !important;
        border-left: 4px solid #0d6efd;
    }

    .bg-soft-success {
        background-color: #e8f5e9;
    }

    .action-btn {
        width: 34px;
        height: 34px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
    }

    .action-btn:hover {
        transform: scale(1.1);
    }

    .form-control:focus {
        border-color: #4CAF50;
        box-shadow: 0 0 0 0.25rem rgba(76, 175, 80, 0.1);
    }

    .btn-success {
        background-color: #4CAF50;
        border-color: #4CAF50;
    }

    .status-badge {
        font-size: 0.75rem;
        letter-spacing: 0.5px;
        transition: all 0.3s;
    }

    .status-badge:hover {
        transform: translateY(-2px);
        filter: brightness(1.1);
    }
</style>

<script>
    function showLoading(btnId) {
        const btn = document.getElementById(btnId);
        if (btn) {
            btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Đang xử lý...';
            btn.classList.add('disabled');
            return true;
        }
    }

    function xacNhanXoaDanhMuc(id, ten) {
        Swal.fire({
            title: 'Xóa danh mục?',
            html: `Bạn có chắc muốn xóa danh mục <b>${ten}</b>?<br><small class="text-danger">Cảnh báo: Các món ăn liên quan sẽ bị ảnh hưởng!</small>`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6e7881',
            confirmButtonText: 'Đúng, xóa nó!',
            cancelButtonText: 'Không, giữ lại',
            reverseButtons: true,
            showClass: {
                popup: 'animate__animated animate__headShake'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "index.php?action=xoa&id=" + id;
            }
        })
    }
</script>

<?php include("../inc/bottom.php"); ?>