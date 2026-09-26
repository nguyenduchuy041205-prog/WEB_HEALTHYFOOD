<?php include("../inc/top.php"); ?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white py-3">
                <h5 class="fw-bold text-success mb-0"><i class="fa-solid fa-utensils me-2"></i>THÊM MÓN ĂN MỚI</h5>
            </div>
            <div class="card-body p-4">
                <form action="index.php" method="post" enctype="multipart/form-data"
                    onsubmit="return showLoading('btnLuuMon');">
                    <input type="hidden" name="action" value="xulythem">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Tên món ăn</label>
                        <input type="text" class="form-control rounded-3" name="txtten" placeholder="Nhập tên món..."
                            required>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Giá bán (đ)</label>
                            <input type="number" class="form-control rounded-3" name="txtgia" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Danh mục</label>
                            <select class="form-select rounded-3" name="txtdanhmuc" required>
                                <option value="" selected disabled>-- Chọn danh mục --</option>
                                <?php foreach ($danhmuc as $d): ?>
                                    <option value="<?php echo $d["id"]; ?>"><?php echo $d["tendanhmuc"]; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3 p-3 bg-light rounded-3 mx-0 border-start border-success border-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-success">Calo (kcal)</label>
                            <input type="number" class="form-control" name="txtcalo" value="0">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-info">Protein (g)</label>
                            <input type="number" step="0.1" class="form-control" name="txtprotein" value="0">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Mô tả</label>
                        <textarea class="form-control rounded-3" name="txtmota" rows="3"></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">Hình ảnh</label>
                        <input type="file" class="form-control mb-2" name="fhinhanh" accept="image/*" required
                            onchange="previewImage(this)">
                        <div id="imagePreviewContainer" class="text-center d-none">
                            <img id="imgPreview" src="#" class="img-thumbnail mt-2 shadow-sm"
                                style="max-height: 180px;">
                        </div>
                    </div>
                    <div class="text-end border-top pt-3">
                        <a href="index.php" class="btn btn-outline-secondary rounded-pill px-4 me-2">Hủy</a>
                        <button type="submit" id="btnLuuMon" class="btn btn-success rounded-pill px-5 fw-bold">LƯU MÓN
                            ĂN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function previewImage(input) {
        const container = document.getElementById('imagePreviewContainer');
        const preview = document.getElementById('imgPreview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = (e) => {
                preview.src = e.target.result;
                container.classList.remove('d-none');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function showLoading(btnId) {
        const btn = document.getElementById(btnId);
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Đang xử lý...';
        btn.classList.add('disabled');
        return true;
    }
</script>
<?php include("../inc/bottom.php"); ?>