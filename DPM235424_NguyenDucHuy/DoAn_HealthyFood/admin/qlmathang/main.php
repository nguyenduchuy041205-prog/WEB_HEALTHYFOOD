<?php include("../inc/top.php"); ?>
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="fw-bold text-success mb-0"><i class="fa-solid fa-list me-2"></i> DANH SÁCH THỰC ĐƠN</h5>
        <a href="index.php?action=add" class="btn btn-success rounded-pill px-4">
            <i class="fa-solid fa-plus me-1"></i> Thêm món mới
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Hình ảnh</th>
                        <th>Tên món</th>
                        <th>Giá bán</th>
                        <th>Dinh dưỡng</th>
                        <th>Danh mục</th>
                        <th class="text-end pe-4">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($mathang)):
                        foreach ($mathang as $m): ?>
                            <tr>
                                <td class="ps-4">
                                    <img src="../../images/products/<?php echo $m["hinhanh"]; ?>"
                                        class="rounded shadow-sm border" width="80" height="60" style="object-fit: cover;">
                                </td>
                                <td>
                                    <div class="fw-bold text-dark"><?php echo $m["tenmathang"]; ?></div>
                                    <small class="text-muted">#<?php echo $m["id"]; ?></small>
                                </td>
                                <td><span class="text-danger fw-bold"><?php echo number_format($m["gia"]); ?>đ</span></td>
                                <td>
                                    <span class="badge bg-light text-success border">🔥 <?php echo $m["calo"]; ?>
                                        kcal</span><br>
                                    <span class="badge bg-light text-info border mt-1">💪 <?php echo $m["protein"]; ?>g
                                        Đạm</span>
                                </td>
                                <td>
                                    <?php foreach ($danhmuc as $d) {
                                        if ($d["id"] == $m["danhmuc_id"]) {
                                            echo '<span class="badge bg-secondary-subtle text-secondary border px-2">' . $d["tendanhmuc"] . '</span>';
                                            break;
                                        }
                                    } ?>
                                </td>
                                <td class="text-end pe-4">
                                    <a href="index.php?action=update&id=<?php echo $m["id"]; ?>"
                                        class="btn btn-sm btn-outline-warning rounded-circle me-1"><i
                                            class="fa-solid fa-edit"></i></a>
                                    <a href="javascript:void(0);"
                                        onclick="confirmDelete(<?php echo $m['id']; ?>, '<?php echo addslashes($m['tenmathang']); ?>')"
                                        class="btn btn-sm btn-outline-danger rounded-circle shadow-sm" title="Xóa món ăn">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; else: ?>
                        <tr>
                            <td colspan="6" class="text-center py-4">Chưa có dữ liệu.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function confirmDelete(id, ten) {
        Swal.fire({
            title: 'Xác nhận xóa?',
            html: `Bạn có chắc muốn xóa món <b class="text-danger">${ten}</b> không?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6e7881',
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "index.php?action=delete&id=" + id;
            }
        })
    }
</script>
<?php include("../inc/bottom.php"); ?>