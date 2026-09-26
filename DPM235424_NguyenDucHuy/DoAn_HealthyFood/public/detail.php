<?php include("inc/top.php"); ?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden position-relative">
                <?php if ($mhct["giamgia"] > 0): ?>
                    <span class="badge bg-danger position-absolute top-0 start-0 m-3 shadow-sm px-3 py-2"
                        style="z-index: 10; border-radius: 20px; font-size: 1rem;">
                        <i class="fa-solid fa-tags me-1"></i> GIẢM <?php echo $mhct["giamgia"]; ?>%
                    </span>
                <?php endif; ?>

                <img src="/DoAn_HealthyFood/images/products/<?php echo $mhct["hinhanh"]; ?>" class="img-fluid w-100"
                    style="object-fit: cover; min-height: 400px;">
            </div>
        </div>

        <div class="col-md-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none text-green">Trang
                            chủ</a></li>
                    <li class="breadcrumb-item active"><?php echo $tendm; ?></li>
                </ol>
            </nav>

            <h1 class="fw-bold text-dark mb-3"><?php echo $mhct["tenmathang"]; ?></h1>

            <div class="row g-2 mb-4">
                <div class="col-6 col-sm-4">
                    <div class="p-3 border rounded text-center bg-light">
                        <small class="text-muted d-block">Năng lượng</small>
                        <span class="fw-bold text-green"><?php echo $mhct["calo"]; ?> kcal</span>
                    </div>
                </div>
                <div class="col-6 col-sm-4">
                    <div class="p-3 border rounded text-center bg-light">
                        <small class="text-muted d-block">Protein</small>
                        <span class="fw-bold text-info"><?php echo $mhct["protein"]; ?>g</span>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <?php if ($mhct["giamgia"] > 0):
                    $gia_ban = $mhct["gia"] * (1 - $mhct["giamgia"] / 100);
                    ?>
                    <div class="d-flex align-items-center gap-3">
                        <h2 class="text-danger fw-bold mb-0"><?php echo number_format($gia_ban); ?>đ</h2>
                        <h5 class="text-muted text-decoration-line-through mb-0"><?php echo number_format($mhct["gia"]); ?>đ
                        </h5>
                    </div>
                <?php else: ?>
                    <h2 class="text-danger fw-bold"><?php echo number_format($mhct["gia"]); ?>đ</h2>
                <?php endif; ?>

                <div class="mt-2">
                    <span class="text-muted">
                        <i class="fa-solid fa-eye me-1"></i> <?php echo number_format($mhct["luotxem"]); ?> lượt xem
                    </span>
                    <span class="ms-3 text-muted">
                        <i class="fa-solid fa-fire-flame-curved text-orange me-1"></i> Đã bán:
                        <?php echo $mhct["luotban"]; ?>
                    </span>
                </div>

                <p class="text-muted mt-3"><?php echo $mhct["mota"]; ?></p>
            </div>

            <form action="index.php" method="get">
                <input type="hidden" name="action" value="chovaogio">
                <input type="hidden" name="id" value="<?php echo $mhct["id"]; ?>">
                <div class="d-flex gap-3">
                    <input type="number" name="soluong" value="1" min="1" class="form-control text-center rounded-pill"
                        style="width: 80px;">
                    <button type="submit"
                        class="btn btn-green btn-lg rounded-pill px-5 flex-grow-1 fw-bold text-white shadow-sm">
                        <i class="fa-solid fa-cart-shopping me-2"></i> THÊM VÀO GIỎ
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="mt-5 pt-5 border-top">
        <h4 class="fw-bold mb-4 text-green">Gợi ý món khác dành cho bạn</h4>
        <div class="row g-3">
            <?php foreach ($mathang as $m):
                if ($m["id"] != $mhct["id"]): ?>
                    <div class="col-6 col-md-3">
                        <div class="card product-card h-100 shadow-sm border-0 rounded-3 overflow-hidden position-relative">
                            <?php if ($m["giamgia"] > 0): ?>
                                <span class="badge bg-danger position-absolute top-0 start-0 m-2 shadow-sm"
                                    style="z-index: 10; border-radius: 20px; font-size: 0.65rem;">
                                    -<?php echo $m["giamgia"]; ?>%
                                </span>
                            <?php endif; ?>

                            <span class="calo-badge badge bg-white text-green position-absolute top-0 end-0 m-2 shadow-sm"
                                style="z-index: 10; border-radius: 20px; font-weight: bold; border: 1px solid #4CAF50; font-size: 0.65rem;">
                                <i class="fa-solid fa-fire text-orange"></i> <?php echo $m["calo"]; ?> kcal
                            </span>

                            <a href="index.php?action=detail&id=<?php echo $m["id"]; ?>">
                                <img src="../images/products/<?php echo $m["hinhanh"]; ?>" class="card-img-top"
                                    alt="<?php echo $m["tenmathang"]; ?>" style="height: 150px; object-fit: cover;">
                            </a>

                            <div class="card-body d-flex flex-column p-2">
                                <h6 class="card-title fw-bold text-dark mb-1 text-truncate"><?php echo $m["tenmathang"]; ?></h6>

                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <small class="text-muted" style="font-size: 0.7rem;">
                                        Protein: <strong class="text-green"><?php echo $m["protein"]; ?>g</strong>
                                    </small>
                                    <small class="text-muted shadow-sm px-2 py-0 rounded-pill bg-light"
                                        style="font-size: 0.65rem;">
                                        <i class="fa-solid fa-eye text-secondary"></i>
                                        <?php echo number_format($m["luotxem"]); ?>
                                    </small>
                                </div>

                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                    <div>
                                        <?php if ($m["giamgia"] > 0):
                                            $gia_goi_y = $m["gia"] * (1 - $m["giamgia"] / 100);
                                            ?>
                                            <span class="text-danger fw-bold d-block"
                                                style="font-size: 0.9rem;"><?php echo number_format($gia_goi_y); ?>đ</span>
                                            <small class="text-muted text-decoration-line-through"
                                                style="font-size: 0.75rem;"><?php echo number_format($m["gia"]); ?>đ</small>
                                        <?php else: ?>
                                            <span class="text-danger fw-bold"
                                                style="font-size: 0.9rem;"><?php echo number_format($m["gia"]); ?>đ</span>
                                        <?php endif; ?>
                                    </div>
                                    <a href="?action=chovaogio&id=<?php echo $m["id"]; ?>"
                                        class="btn btn-green btn-sm rounded-pill px-2 py-0" style="font-size: 0.75rem;">
                                        <i class="fa-solid fa-cart-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; endforeach; ?>
        </div>
    </div>
</div>

<?php include("inc/bottom.php"); ?>