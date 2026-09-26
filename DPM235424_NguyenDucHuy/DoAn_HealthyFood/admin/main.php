<div class="container-fluid p-0">
    <div class="row mb-3">
        <div class="col-12">
            <h3 class="fw-bold text-dark">Bảng điều khiển hệ thống</h3>
            <p class="text-muted">Chào mừng trở lại, quản trị viên Fit'n Ngon.</p>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 text-center">
                    <div class="stat-icon bg-soft-success text-success mb-3 mx-auto d-flex align-items-center justify-content-center"
                        style="width: 50px; height: 50px; border-radius: 12px;">
                        <i class="fa-solid fa-coins fs-4"></i>
                    </div>
                    <h6 class="text-muted small text-uppercase fw-bold">Doanh thu (Xong)</h6>
                    <h3 class="fw-bold mb-0"><?php echo number_format($tong_doanhthu); ?>đ</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 text-center">
                    <div class="stat-icon bg-soft-info text-info mb-3 mx-auto d-flex align-items-center justify-content-center"
                        style="width: 50px; height: 50px; border-radius: 12px;">
                        <i class="fa-solid fa-cart-shopping fs-4"></i>
                    </div>
                    <h6 class="text-muted small text-uppercase fw-bold">Tổng đơn hàng</h6>
                    <h3 class="fw-bold mb-0"><?php echo $soluong_dh; ?></h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 text-center">
                    <div class="stat-icon bg-soft-warning text-warning mb-3 mx-auto d-flex align-items-center justify-content-center"
                        style="width: 50px; height: 50px; border-radius: 12px;">
                        <i class="fa-solid fa-utensils fs-4"></i>
                    </div>
                    <h6 class="text-muted small text-uppercase fw-bold">Món ăn</h6>
                    <h3 class="fw-bold mb-0"><?php echo $soluong_mh; ?></h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 text-center">
                    <div class="stat-icon bg-soft-primary text-primary mb-3 mx-auto d-flex align-items-center justify-content-center"
                        style="width: 50px; height: 50px; border-radius: 12px;">
                        <i class="fa-solid fa-user-group fs-4"></i>
                    </div>
                    <h6 class="text-muted small text-uppercase fw-bold">Thành viên</h6>
                    <h3 class="fw-bold mb-0"><?php echo $soluong_nd; ?></h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-header bg-white py-3 border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0 text-dark"><i
                                class="fa-solid fa-clock-rotate-left me-2 text-success"></i>Đơn hàng mới nhận</h5>
                        <a href="qldonhang/index.php" class="btn btn-sm btn-outline-success rounded-pill px-3">Xem tất
                            cả</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">Mã đơn</th>
                                    <th>Khách hàng</th>
                                    <th>Ngày đặt</th>
                                    <th>Tổng tiền</th>
                                    <th class="text-end pe-4">Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 0;
                                foreach ($ds_donhang as $d):
                                    if ($count >= 5)
                                        break;
                                    ?>
                                    <tr>
                                        <td class="ps-4 fw-bold text-success">#DH<?php echo $d["id"]; ?></td>
                                        <td>
                                            <div class="fw-bold"><?php echo $d["tennguoinhan"]; ?></div>
                                            <small class="text-muted"><?php echo $d["sodienthoainhan"]; ?></small>
                                        </td>
                                        <td><?php echo date("d/m/Y", strtotime($d["ngaydat"])); ?></td>
                                        <td class="fw-bold text-dark"><?php echo number_format($d["tongtien"]); ?>đ</td>
                                        <td class="text-end pe-4">
                                            <?php
                                            $trangthai = (int) $d["trangthai"];
                                            if ($trangthai === 0)
                                                echo '<span class="badge bg-warning text-dark px-3 py-2 rounded-pill">Mới nhận</span>';
                                            elseif ($trangthai === 1)
                                                echo '<span class="badge bg-info text-dark px-3 py-2 rounded-pill">Đang giao</span>';
                                            elseif ($trangthai === 2)
                                                echo '<span class="badge bg-success text-white px-3 py-2 rounded-pill">Hoàn tất</span>';
                                            elseif ($trangthai === 3)
                                                echo '<span class="badge bg-secondary text-white px-3 py-2 rounded-pill">Đã hủy</span>';
                                            else
                                                echo '<span class="badge bg-secondary text-white px-3 py-2 rounded-pill">Không xác định</span>';
                                            ?>
                                        </td>
                                    </tr>
                                    <?php $count++; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>