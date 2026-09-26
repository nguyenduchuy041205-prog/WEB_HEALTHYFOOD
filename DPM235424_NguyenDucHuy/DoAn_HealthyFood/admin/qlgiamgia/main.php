<?php include("../inc/top.php"); ?>
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 class="fw-bold text-dark"><i class="fa-solid fa-tags text-danger me-2"></i>Quản Lý & Xem Trước Giảm Giá</h3>
        <a href="index.php?action=xoa_tatca" class="btn btn-outline-secondary rounded-pill btn-sm"
            onclick="return confirm('Khôi phục toàn bộ về giá gốc?')">
            <i class="fa-solid fa-rotate-left"></i> Xóa tất cả giảm giá
        </a>
    </div>
    <?php if (isset($_SESSION["thongbao"])): ?>
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-4 mb-4" role="alert">
            <div class="d-flex align-items-center">
                <i class="fa-solid fa-circle-check fs-4 me-3"></i>
                <div>
                    <strong>Thành công!</strong> <?php echo $_SESSION["thongbao"]; ?>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <?php unset($_SESSION["thongbao"]); ?>
    <?php endif; ?>
    <div class="card border-0 shadow-sm rounded-4 mb-5">
        <div class="card-body p-4">
            <form action="index.php?action=xuly_giamgia" method="post">
                <div class="row g-3 align-items-end">
                    <div class="col-md-3">
                        <label class="form-label fw-bold small text-muted text-uppercase">Hình thức</label>
                        <select class="form-select rounded-3" name="kieugiam" id="kieugiam" onchange="toggleSelect()">
                            <option value="mon">Giảm từng món lẻ</option>
                            <option value="danhmuc">Giảm theo danh mục</option>
                        </select>
                    </div>

                    <div class="col-md-4" id="vung_mon">
                        <label class="form-label fw-bold small text-muted text-uppercase">Chọn món ăn</label>
                        <select class="form-select rounded-3" name="mathang_id">
                            <?php foreach ($mathang as $m): ?>
                                <option value="<?php echo $m['id']; ?>"><?php echo $m['tenmathang']; ?>
                                    (<?php echo number_format($m['gia']); ?>đ)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-4 d-none" id="vung_danhmuc">
                        <label class="form-label fw-bold small text-muted text-uppercase">Chọn danh mục</label>
                        <select class="form-select rounded-3" name="danhmuc_id">
                            <?php foreach ($danhmuc as $dm): ?>
                                <option value="<?php echo $dm['id']; ?>"><?php echo $dm['tendanhmuc']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label fw-bold small text-muted text-uppercase">% Giảm</label>
                        <div class="input-group">
                            <input type="number" name="phantram" class="form-control rounded-3" min="0" max="100"
                                required placeholder="0">
                            <span class="input-group-text bg-light border-start-0">%</span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <button type="submit" class="btn btn-danger w-100 rounded-3 fw-bold py-2">ÁP DỤNG</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-header bg-white py-3 border-0">
            <h6 class="mb-0 fw-bold"><i class="fa-solid fa-list me-2"></i>Bảng tính giá thực tế sau giảm</h6>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">Sản phẩm</th>
                            <th>Giá gốc</th>
                            <th>Đang giảm</th>
                            <th class="text-danger">Giá bán thực tế</th>
                            <th class="text-end pe-4">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mathang as $m): ?>
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <img src="../../images/products/<?php echo $m['hinhanh']; ?>" class="rounded-2 me-3"
                                            style="width: 40px; height: 40px; object-fit: cover;">
                                        <span class="fw-bold"><?php echo $m['tenmathang']; ?></span>
                                    </div>
                                </td>
                                <td><?php echo number_format($m['gia']); ?>đ</td>
                                <td>
                                    <span
                                        class="badge <?php echo ($m['giamgia'] > 0) ? 'bg-danger' : 'bg-secondary'; ?> rounded-pill">
                                        <?php echo $m['giamgia']; ?>%
                                    </span>
                                </td>
                                <td class="fw-bold fs-5 text-danger">
                                    <?php
                                    $gia_thuc_te = $m['gia'] - ($m['gia'] * $m['giamgia'] / 100);
                                    echo number_format($gia_thuc_te);
                                    ?>đ
                                </td>
                                <td class="text-end pe-4">
                                    <?php if ($m['giamgia'] > 0): ?>
                                        <span class="text-success small"><i class="fa-solid fa-check-circle"></i> Đang ưu
                                            đãi</span>
                                    <?php else: ?>
                                        <span class="text-muted small">Giá thường</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleSelect() {
        let kieu = document.getElementById('kieugiam').value;
        document.getElementById('vung_mon').classList.toggle('d-none', kieu !== 'mon');
        document.getElementById('vung_danhmuc').classList.toggle('d-none', kieu !== 'danhmuc');
    }
</script>
<script>
    window.setTimeout(function () {
        const alert = document.querySelector(".alert");
        if (alert) {
            alert.classList.remove('show');

            setTimeout(() => {
                alert.remove();
            }, 150);
        }
    }, 500);
</script>
<?php include("../inc/bottom.php"); ?>