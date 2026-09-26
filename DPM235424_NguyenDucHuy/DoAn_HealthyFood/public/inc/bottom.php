<?php if (isset($monnoibat) && isset($monbanchay)): ?>
    <div class="container mb-5 mt-5 pt-5">
        <div class="bg-white p-4 rounded-4 shadow-sm border">
            <div class="row">
                <div class="col-lg-4 d-none d-lg-block">
                    <div class="sticky-top" style="top: 20px; z-index: 5;">
                        <div id="sideCarouselBottom" class="carousel slide shadow-sm rounded-4 overflow-hidden"
                            data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="../images/banners/side_banner1.jpg" class="d-block w-100"
                                        style="object-fit: cover; height: 500px;"
                                        onerror="this.src='https://placehold.co/400x600?text=Fit+N+Ngon+1'">
                                </div>
                                <div class="carousel-item">
                                    <img src="../images/banners/side_banner2.jpg" class="d-block w-100"
                                        style="object-fit: cover; height: 500px;"
                                        onerror="this.src='https://placehold.co/400x600?text=Fit+N+Ngon+2'">
                                </div>
                            </div>
                        </div>

                        <div id="product-hover-details"
                            class="card border-0 shadow-sm rounded-4 overflow-hidden d-none animate__animated animate__fadeIn"
                            style="min-height: 500px;">
                            <img id="prev-img" src="" class="card-img-top" style="height: 280px; object-fit: cover;">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h4 id="prev-name" class="fw-bold text-dark mb-0"></h4>
                                    <span id="prev-calo"
                                        class="badge bg-light text-green border border-success rounded-pill px-3 py-2"></span>
                                </div>
                                <p id="prev-mota" class="text-muted small mb-4"
                                    style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                </p>
                                <div class="row g-0 bg-light p-3 rounded-3 text-center border">
                                    <div class="col-6 border-end">
                                        <small class="text-muted d-block fw-bold">PROTEIN</small>
                                        <strong id="prev-pro" class="text-green fs-5"></strong>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted d-block fw-bold">GIÁ BÁN</small>
                                        <strong id="prev-price" class="text-danger fs-5"></strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-2">
                        <h5 class="fw-bold text-green mb-0" style="border-left: 5px solid #4CAF50; padding-left: 15px;">MÓN
                            NỔI BẬT</h5>
                    </div>
                    <div class="row g-3 mb-4">
                        <?php foreach ($monnoibat as $m):
                            $gia_ban = $m["gia"] * (1 - $m["giamgia"] / 100);
                            ?>
                            <div class="col-4">
                                <div class="card h-100 border-0 shadow-none text-center product-card-sm hover-trigger"
                                    data-name="<?php echo $m['tenmathang']; ?>"
                                    data-price="<?php echo number_format($gia_ban); ?>đ"
                                    data-img="../images/products/<?php echo $m['hinhanh']; ?>"
                                    data-mota="<?php echo $m['mota']; ?>" data-calo="<?php echo $m['calo']; ?> kcal"
                                    data-pro="<?php echo $m['protein']; ?>g">
                                    <a href="?action=detail&id=<?php echo $m["id"]; ?>" class="text-decoration-none">
                                        <img src="../images/products/<?php echo $m["hinhanh"]; ?>"
                                            class="rounded-3 mb-2 w-100 shadow-sm" style="height: 120px; object-fit: cover;">
                                        <h6 class="text-dark small fw-bold text-truncate mb-1"><?php echo $m["tenmathang"]; ?>
                                        </h6>
                                        <div class="d-flex flex-column align-items-center">
                                            <p class="text-danger small fw-bold mb-0"><?php echo number_format($gia_ban); ?>đ
                                            </p>
                                            <?php if ($m["giamgia"] > 0): ?>
                                                <del class="text-muted"
                                                    style="font-size: 0.65rem;"><?php echo number_format($m["gia"]); ?>đ</del>
                                            <?php endif; ?>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-2">
                        <h5 class="fw-bold text-green mb-0" style="border-left: 5px solid #4CAF50; padding-left: 15px;">MÓN
                            BÁN CHẠY</h5>
                    </div>
                    <div class="row g-3">
                        <?php foreach ($monbanchay as $m):
                            $gia_ban = $m["gia"] * (1 - $m["giamgia"] / 100);
                            ?>
                            <div class="col-4">
                                <div class="card h-100 border-0 shadow-none text-center product-card-sm hover-trigger"
                                    data-name="<?php echo $m['tenmathang']; ?>"
                                    data-price="<?php echo number_format($gia_ban); ?>đ"
                                    data-img="../images/products/<?php echo $m['hinhanh']; ?>"
                                    data-mota="<?php echo $m['mota']; ?>" data-calo="<?php echo $m['calo']; ?> kcal"
                                    data-pro="<?php echo $m['protein']; ?>g">
                                    <a href="?action=detail&id=<?php echo $m["id"]; ?>" class="text-decoration-none">
                                        <img src="../images/products/<?php echo $m["hinhanh"]; ?>"
                                            class="rounded-3 mb-2 w-100 shadow-sm" style="height: 120px; object-fit: cover;">
                                        <h6 class="text-dark small fw-bold text-truncate mb-1"><?php echo $m["tenmathang"]; ?>
                                        </h6>
                                        <div class="d-flex flex-column align-items-center">
                                            <p class="text-danger small fw-bold mb-0"><?php echo number_format($gia_ban); ?>đ
                                            </p>
                                            <span class="text-success fw-bold" style="font-size: 0.7rem;">
                                                <i class="fa-solid fa-cart-shopping"></i> <?php echo $m["luotban"]; ?>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<footer class="bg-green text-white pt-5 pb-3 mt-auto">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3">
                <h5 class="fw-bold"><i class="fa-solid fa-leaf"></i> Fit'n Ngon</h5>
                <p class="small mt-3">Chúng tôi cung cấp các bữa ăn healthy, đủ chất, kiểm soát calo giúp bạn duy trì
                    vóc dáng và sức khỏe tuyệt vời mỗi ngày.</p>
            </div>
            <div class="col-md-4 mb-3">
                <h5 class="fw-bold">Liên hệ</h5>
                <ul class="list-unstyled small mt-3">
                    <li class="mb-2"><i class="fa-solid fa-location-dot me-2"></i> Ung Văn Khiêm, Long Xuyên, An Giang
                    </li>
                    <li class="mb-2"><i class="fa-solid fa-phone me-2"></i> 1900 1234</li>
                    <li><i class="fa-solid fa-envelope me-2"></i> cskh@fitnngon.vn</li>
                </ul>
            </div>
            <div class="col-md-4 mb-3">
                <h5 class="fw-bold">Kết nối với chúng tôi</h5>
                <div class="mt-3">
                    <a href="#" class="text-white me-3 fs-4"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="text-white me-3 fs-4"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="text-white fs-4"><i class="fa-brands fa-tiktok"></i></a>
                </div>
            </div>
        </div>
        <hr class="mt-4 mb-3" style="border-color: rgba(255,255,255,0.2);">
        <p class="text-center small mb-0">&copy; 2026 Fit'n Ngon Healthy Food. Được thiết kế cho đồ án Web.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const triggers = document.querySelectorAll('.hover-trigger');
        const defaultBanner = document.getElementById('sideCarouselBottom');
        const detailPane = document.getElementById('product-hover-details');

        const prevImg = document.getElementById('prev-img');
        const prevName = document.getElementById('prev-name');
        const prevMota = document.getElementById('prev-mota');
        const prevCalo = document.getElementById('prev-calo');
        const prevPro = document.getElementById('prev-pro');
        const prevPrice = document.getElementById('prev-price');

        triggers.forEach(item => {
            item.addEventListener('mouseenter', function () {
                const data = this.dataset;
                prevImg.src = data.img;
                prevName.textContent = data.name;
                prevMota.textContent = data.mota;
                prevCalo.innerHTML =
                    `<i class="fa-solid fa-fire text-orange me-1"></i> ${data.calo}`;
                prevPro.textContent = data.pro;
                prevPrice.textContent = data.price;

                defaultBanner.classList.add('d-none');
                detailPane.classList.remove('d-none');
            });

            item.addEventListener('mouseleave', function () {
                defaultBanner.classList.remove('d-none');
                detailPane.classList.add('d-none');
            });
        });
    });

    <?php if (isset($_SESSION["thongbao"])): ?>
        Swal.fire({
            title: '<?php echo ($_SESSION["loai_thongbao"] == "success") ? "Thành công!" : "Thông báo"; ?>',
            text: '<?php echo $_SESSION["thongbao"]; ?>',
            icon: '<?php echo $_SESSION["loai_thongbao"]; ?>',
            confirmButtonColor: '#4CAF50',
            timer: 3000,
            timerProgressBar: true
        });
        <?php
        unset($_SESSION["thongbao"]);
        unset($_SESSION["loai_thongbao"]);
        ?>
    <?php endif; ?>
</script>

<style>
    .product-card-sm {
        transition: all 0.3s ease;
    }

    .product-card-sm:hover {
        transform: translateY(-5px);
        cursor: pointer;
    }

    .text-green {
        color: #4CAF50;
    }

    .bg-green {
        background-color: #4CAF50;
    }

    .text-orange {
        color: #ff9800;
    }

    .animate__animated {
        animation-duration: 0.4s;
    }
</style>