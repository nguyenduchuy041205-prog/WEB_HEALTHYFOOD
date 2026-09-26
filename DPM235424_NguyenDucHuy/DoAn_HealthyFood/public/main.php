<?php include("inc/top.php"); ?>

<?php if (!isset($_GET["action"]) || $_GET["action"] == "null"): ?>
    <?php include("inc/carousel.php"); ?>

    <div class="container mt-5">
        <div class="row mb-5">
            <div class="col-12">
                <div class="p-4 p-md-5 text-white rounded-4 shadow-lg"
                    style="background: linear-gradient(135deg, #4CAF50 0%, #2E7D32 100%); position: relative; overflow: hidden;">
                    <div class="col-md-7 px-0 position-relative" style="z-index: 2;">
                        <span class="badge bg-warning text-dark rounded-pill px-3 py-2 mb-3 fw-bold">ƯU ĐÃI THÁNG 4</span>
                        <h1 class="display-5 fw-bold">Giảm 20% cho Đơn hàng đầu tiên!</h1>
                        <p class="lead my-3">Bắt đầu hành trình sống khỏe cùng FIT'N NGON. Nhập mã
                            <strong>HEALTHY20</strong> khi thanh toán.
                        </p>
                        <p class="mb-0 fw-bold">* Áp dụng cho đơn hàng từ 200.000đ trở lên.</p>
                    </div>
                    <div class="d-none d-lg-block position-absolute"
                        style="right: -50px; top: -50px; opacity: 0.2; transform: rotate(-15deg);">
                        <i class="fa-solid fa-leaf" style="font-size: 300px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="container my-5">
    <div class="row mb-4 align-items-end" id="menu">
        <div class="col-md-8">
            <h2 class="text-green fw-bold mb-0">
                <i class="fa-solid fa-utensils me-2"></i>
                <?php echo isset($tieude) ? $tieude : "Thực Đơn Healthy Hôm Nay"; ?>
            </h2>
            <p class="text-muted mt-2 mb-0">Lựa chọn bữa ăn đủ chất, kiểm soát calo cho vóc dáng cân đối.</p>
        </div>
    </div>

    <div class="row g-4 mb-5">
        <?php if (count($mathang) > 0): ?>
            <?php foreach ($mathang as $m): ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card product-card h-100 shadow-sm border-0 rounded-3 overflow-hidden position-relative">

                        <?php if (isset($m["giamgia"]) && $m["giamgia"] > 0): ?>
                            <span class="badge bg-danger position-absolute top-0 start-0 m-2 shadow-sm"
                                style="z-index: 10; border-radius: 10px; font-weight: bold; padding: 5px 10px;">
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

                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <small class="text-muted">
                                    Protein: <strong class="text-green"><?php echo $m["protein"]; ?>g</strong>
                                </small>
                                <small class="text-muted shadow-sm px-2 py-1 rounded-pill bg-light" style="font-size: 0.75rem;">
                                    <i class="fa-solid fa-eye text-secondary me-1"></i>
                                    <?php echo number_format($m["luotxem"]); ?>
                                </small>
                            </div>

                            <p class="card-text text-muted small mb-3 text-clamp">
                                <?php echo $m["mota"]; ?>
                            </p>

                            <div class="mt-auto d-flex justify-content-between align-items-center border-top pt-3">
                                <div class="d-flex flex-column justify-content-center">
                                    <?php if (isset($m["giamgia"]) && $m["giamgia"] > 0): ?>
                                        <?php $gia_moi = $m["gia"] * (1 - $m["giamgia"] / 100); ?>

                                        <small class="text-muted text-decoration-line-through mb-0"
                                            style="font-size: 0.75rem; line-height: 1;">
                                            <?php echo number_format($m["gia"]); ?>đ
                                        </small>

                                        <span class="text-danger fw-bold fs-5 lh-1">
                                            <?php echo number_format($gia_moi); ?>đ
                                        </span>

                                    <?php else: ?>
                                        <span class="text-danger fw-bold fs-5 lh-1">
                                            <?php echo number_format($m["gia"]); ?>đ
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <a href="?action=chovaogio&id=<?php echo $m["id"]; ?>"
                                    class="btn btn-green rounded-pill px-3 fw-bold shadow-sm d-flex align-items-center"
                                    style="height: fit-content; padding-top: 6px; padding-bottom: 6px;">
                                    <i class="fa-solid fa-cart-plus me-1"></i> Mua
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center py-5">
                <p class="text-muted">Không tìm thấy món ăn nào phù hợp.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include("inc/bottom.php"); ?>

<style>
    body {
        background-color: #f8f9fa;
    }

    .text-green {
        color: #4CAF50;
    }

    .btn-green {
        background-color: #4CAF50;
        color: white;
        border: none;
    }

    .btn-green:hover {
        background-color: #2E7D32;
        transition: 0.3s;
        color: white;
    }

    .product-card {
        transition: transform 0.3s ease;
    }

    .product-card:hover {
        transform: translateY(-5px);
    }

    .text-clamp {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .text-orange {
        color: #ff9800;
    }
</style>