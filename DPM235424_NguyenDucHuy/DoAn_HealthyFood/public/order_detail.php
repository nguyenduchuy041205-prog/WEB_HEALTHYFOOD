<?php include("inc/top.php"); ?>
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">
            Chi tiết đơn hàng #DH<?php echo $dh_info["id"]; ?>
            <?php
            $status_classes = [
                0 => 'bg-warning text-dark',
                1 => 'bg-info text-dark',
                2 => 'bg-success text-white',
                3 => 'bg-secondary text-white'
            ];
            $status_names = [0 => 'Chờ duyệt', 1 => 'Đang giao', 2 => 'Hoàn tất', 3 => 'Đã hủy'];
            ?>
            <span class="badge <?php echo $status_classes[$dh_info['trangthai']]; ?> fs-6 rounded-pill ms-2">
                <?php echo $status_names[$dh_info['trangthai']]; ?>
            </span>
        </h3>
        <a href="index.php?action=lichsudonhang" class="btn btn-outline-secondary btn-sm rounded-pill">Quay lại</a>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body">
                    <h5 class="fw-bold border-bottom pb-2 mb-3">Thông tin giao hàng</h5>
                    <p><strong>Người nhận:</strong> <?php echo $dh_info["tennguoinhan"]; ?></p>
                    <p><strong>Điện thoại:</strong> <?php echo $dh_info["sodienthoainhan"]; ?></p>
                    <p><strong>Địa chỉ:</strong> <?php echo $dh_info["diachinhan"]; ?></p>
                    <p><strong>Ngày đặt:</strong> <?php echo date("d/m/Y H:i", strtotime($dh_info["ngaydat"])); ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body">
                    <h5 class="fw-bold border-bottom pb-2 mb-3">Sản phẩm đã chọn</h5>
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th>Món ăn</th>
                                    <th>Giá</th>
                                    <th>SL</th>
                                    <th class="text-end">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ct_donhang as $ct): ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="/DoAn_HealthyFood/images/products/<?php echo $ct['hinhanh']; ?>"
                                                    width="50" class="rounded me-2">
                                                <span class="small fw-bold"><?php echo $ct["tenmathang"]; ?></span>
                                            </div>
                                        </td>
                                        <td><?php echo number_format($ct["dongia"]); ?>đ</td>
                                        <td><?php echo $ct["soluong"]; ?></td>
                                        <td class="text-end fw-bold"><?php echo number_format($ct["thanhtien"]); ?>đ</td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-end fw-bold">Tổng cộng:</td>
                                    <td class="text-end text-danger fw-bold fs-5">
                                        <?php echo number_format($dh_info["tongtien"]); ?>đ
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="mt-4 pt-3 border-top text-end">
                        <?php if ($dh_info["trangthai"] == 0): ?>
                            <p class="text-muted small mb-2">
                                <i class="fa-solid fa-circle-info me-1 text-warning"></i>
                                Đơn hàng chưa được giao, bạn có thể thay đổi ý định.
                            </p>
                            <button type="button" class="btn btn-warning rounded-pill px-4 fw-bold shadow-sm"
                                onclick="xacNhanHuyDon(<?php echo $dh_info['id']; ?>)">
                                <i class="fa-solid fa-ban me-2"></i>Hủy đơn hàng
                            </button>

                        <?php elseif ($dh_info["trangthai"] == 3): ?>
                            <p class="text-muted small mb-2">
                                <i class="fa-solid fa-trash-can me-1 text-danger"></i>
                                Đơn hàng đã được hủy, bạn có thể dọn dẹp lịch sử.
                            </p>
                            <button type="button" class="btn btn-danger rounded-pill px-4 fw-bold shadow-sm"
                                onclick="xacNhanXoaDon(<?php echo $dh_info['id']; ?>)">
                                <i class="fa-solid fa-trash-arrow-up me-2"></i>Xóa đơn hàng
                            </button>

                        <?php elseif ($dh_info["trangthai"] == 1 || $dh_info["trangthai"] == 2): ?>
                            <div class="alert alert-light border-0 rounded-4 d-inline-block shadow-sm">
                                <p class="text-success small mb-0 fw-bold">
                                    <i class="fa-solid fa-truck-fast me-2"></i>
                                    Đơn hàng đang giao hoặc đã hoàn tất, Fit'n Ngon cảm ơn bạn!
                                </p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function xacNhanXoaDon(id) {
        Swal.fire({
            title: 'Xóa vĩnh viễn?',
            text: "Bạn có chắc muốn xóa đơn hàng #DH" + id + " không?",
            icon: 'error',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            confirmButtonText: 'Đồng ý xóa',
            cancelButtonText: 'Quay lại'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "index.php?action=xoadonhang&id=" + id;
            }
        });
    }

    function xacNhanHuyDon(id) {
        console.log("Đang gọi hàm hủy cho đơn hàng ID: " + id);

        if (typeof Swal === 'undefined') {
            alert("Lỗi: Chưa nạp thư viện SweetAlert2!");
            return;
        }

        Swal.fire({
            title: 'Xác nhận hủy?',
            text: "Bạn có chắc muốn hủy đơn hàng #DH" + id + " không?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ffc107',
            cancelButtonColor: '#6e7881',
            confirmButtonText: 'Đồng ý hủy',
            cancelButtonText: 'Quay lại',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "index.php?action=huydon&id=" + id;
            }
        });
    }
</script>
<?php include("inc/bottom.php"); ?>