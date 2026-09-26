<?php include("inc/top.php"); ?>

<div class="container my-5">
    <div class="row mb-4">
        <div class="col-md-12">
            <h2 class="text-green fw-bold">
                <i class="fa-solid fa-layer-group me-2"></i>
                Danh mục: <?php echo $tendanhmuc; ?>
            </h2>
            <p class="text-muted">Khám phá các món ăn thuộc nhóm này để có bữa ăn phù hợp nhất.</p>
            <hr>
        </div>
    </div>

    <div class="row g-4">
        <?php if (count($mathang) > 0): ?>
            <?php foreach ($mathang as $m): ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card product-card h-100 shadow-sm border-0 rounded-4 overflow-hidden position-relative">
                        <?php if ($m["giamgia"] > 0): ?>
                            <span class="badge bg-danger position-absolute top-0 start-0 m-2 shadow-sm"
                                style="z-index: 10; border-radius: 20px; font-weight: bold;">
                                -<?php echo $m["giamgia"]; ?>%
                            </span>
                        <?php endif; ?>

                        <span class="calo-badge badge bg-white text-green position-absolute top-0 end-0 m-2 shadow-sm"
                            style="z-index: 10; border-radius: 20px; font-weight: bold; border: 1px solid #4CAF50;">
                            <i class="fa-solid fa-fire text-orange"></i> <?php echo $m["calo"]; ?> kcal
                        </span>

                        <a href="?action=detail&id=<?php echo $m["id"]; ?>">
                            <img src="../images/products/<?php echo $m["hinhanh"]; ?>" class="card-img-top"
                                alt="<?php echo $m["tenmathang"]; ?>" style="height: 200px; object-fit: cover;">
                        </a>

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-dark mb-1"><?php echo $m["tenmathang"]; ?></h5>
                            <div class="mb-2">
                                <small class="text-muted">Protein: <strong
                                        class="text-green"><?php echo $m["protein"]; ?>g</strong></small>
                            </div>

                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <div>
                                    <?php if ($m["giamgia"] > 0):
                                        $gia_ban = $m["gia"] * (1 - $m["giamgia"] / 100);
                                        ?>
                                        <span class="text-danger fw-bold fs-5"><?php echo number_format($gia_ban); ?>đ</span>
                                        <br>
                                        <small
                                            class="text-muted text-decoration-line-through"><?php echo number_format($m["gia"]); ?>đ</small>
                                    <?php else: ?>
                                        <span class="text-danger fw-bold fs-5"><?php echo number_format($m["gia"]); ?>đ</span>
                                    <?php endif; ?>
                                </div>

                                <a href="?action=chovaogio&id=<?php echo $m["id"]; ?>"
                                    class="btn btn-green btn-sm rounded-pill px-3">
                                    <i class="fa-solid fa-cart-plus"></i> Mua
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center py-5">
                <i class="fa-solid fa-utensils fs-1 text-muted mb-3"></i>
                <h4 class="text-muted">Hiện chưa có món ăn nào trong danh mục này.</h4>
                <a href="index.php" class="btn btn-green rounded-pill mt-3">Quay lại trang chủ</a>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include("inc/bottom.php"); ?>