<?php include("../inc/top.php"); ?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white py-3">
                <h5 class="fw-bold text-warning mb-0"><i class="fa-solid fa-pen-to-square me-2"></i>CHỈNH SỬA MÓN ĂN
                </h5>
            </div>
            <div class="card-body p-4">
                <form action="index.php" method="post" enctype="multipart/form-data"
                    onsubmit="return showLoading('btnCapNhat');">
                    <input type="hidden" name="action" value="xulysua">
                    <input type="hidden" name="txtid" value="<?php echo $m["id"]; ?>">

                    <input type="hidden" name="txtanhcu" value="<?php echo $m["hinhanh"]; ?>">

                    <div class="mb-3">
                        <label class="form-label fw-bold">Tên món ăn</label>
                        <input type="text" class="form-control rounded-3" name="txtten"
                            value="<?php echo $m["tenmathang"]; ?>" required>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Giá bán (đ)</label>
                            <input type="number" class="form-control rounded-3" name="txtgia"
                                value="<?php echo $m["gia"]; ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Danh mục</label>
                            <select class="form-select rounded-3" name="txtdanhmuc">
                                <?php foreach ($danhmuc as $d): ?>
                                    <option value="<?php echo $d["id"]; ?>" <?php echo ($d["id"] == $m["danhmuc_id"]) ? "selected" : ""; ?>>
                                        <?php echo $d["tendanhmuc"]; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3 p-3 bg-light rounded-3 mx-0 border-start border-warning border-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-success">Lượng Calo (kcal)</label>
                            <input type="number" class="form-control" name="txtcalo" value="<?php echo $m["calo"]; ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-info">Lượng Protein (g)</label>
                            <input type="number" step="0.1" class="form-control" name="txtprotein"
                                value="<?php echo $m["protein"]; ?>">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Mô tả</label>
                        <textarea class="form-control rounded-3" name="txtmota"
                            rows="3"><?php echo $m["mota"]; ?></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Hình ảnh sản phẩm</label><br>
                        <div id="imagePreviewContainer">
                            <img id="imgPreview" src="../../images/products/<?php echo $m["hinhanh"]; ?>" width="120"
                                class="mb-2 rounded shadow-sm border">
                        </div>
                        <label class="form-label small text-muted">Chọn ảnh khác nếu muốn thay đổi:</label>
                        <input type="file" class="form-control" name="fhinhanh" accept="image/*"
                            onchange="previewImage(this)">
                    </div>

                    <div class="text-end border-top pt-3">
                        <a href="index.php" class="btn btn-outline-secondary rounded-pill px-4 me-2">Quay lại</a>
                        <button type="submit" id="btnCapNhat"
                            class="btn btn-warning rounded-pill px-5 fw-bold text-white">
                            <i class="fa-solid fa-save me-2"></i>CẬP NHẬT THAY ĐỔI
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(input) {
        const preview = document.getElementById('imgPreview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function showLoading(btnId) {
        const btn = document.getElementById(btnId);
        if (btn) {
            btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Đang lưu...';
            btn.classList.add('disabled');
            return true;
        }
    }
</script>

<?php include("../inc/bottom.php"); ?>