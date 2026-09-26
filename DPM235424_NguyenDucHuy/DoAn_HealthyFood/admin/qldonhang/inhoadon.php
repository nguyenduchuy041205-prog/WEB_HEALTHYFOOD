<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <title>Hóa đơn #<?php echo $donhang["id"]; ?> - Fit'n Ngon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .invoice-box {
            max-width: 800px;
            margin: 30px auto;
            padding: 30px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .text-green {
            color: #4CAF50;
        }

        @media print {
            .no-print {
                display: none !important;
            }

            .invoice-box {
                box-shadow: none;
                margin: 0;
                width: 100%;
                max-width: 100%;
            }

            body {
                background: #fff;
            }
        }
    </style>
</head>

<body>

    <div class="container no-print mt-4 text-center">
        <button onclick="window.print()" class="btn btn-success rounded-pill px-4">
            <i class="fa-solid fa-print"></i> Xác nhận in hóa đơn
        </button>
        <a href="index.php?action=list" class="btn btn-light rounded-pill px-4">Quay lại</a>
    </div>

    <div class="invoice-box">
        <div class="row mb-4">
            <div class="col-6">
                <h2 class="fw-bold text-green">FIT'N NGON</h2>
                <p class="small text-muted mb-0">Ăn ngon - Sống khỏe - Đủ chất</p>
            </div>
            <div class="col-6 text-end">
                <h4 class="fw-bold">HÓA ĐƠN BÁN HÀNG</h4>
                <p class="mb-0">Mã đơn: <strong>#<?php echo $donhang["id"]; ?></strong></p>
                <p>Ngày đặt: <?php echo date("d/m/Y H:i", strtotime($donhang["ngaydat"])); ?></p>
            </div>
        </div>

        <hr>

        <div class="row mb-4">
            <div class="col-6">
                <h6 class="text-uppercase fw-bold text-muted small">Khách hàng:</h6>
                <p class="fw-bold mb-1"><?php echo $donhang["tennguoinhan"] ?? 'N/A'; ?></p>
                <p class="small mb-1">SĐT: <?php echo $donhang["sodienthoainhan"] ?? 'N/A'; ?></p>
                <p class="small">Địa chỉ: <?php echo $donhang["diachinhan"] ?? 'N/A'; ?></p>
            </div>
        </div>

        <table class="table table-bordered border-light-subtle">
            <thead class="table-light">
                <tr>
                    <th>Sản phẩm</th>
                    <th class="text-center">SL</th>
                    <th class="text-end">Đơn giá</th>
                    <th class="text-end">Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($chitiet as $item): ?>
                    <tr>
                        <td><?php echo $item["tenmathang"]; ?></td>
                        <td class="text-center"><?php echo $item["soluong"]; ?></td>
                        <td class="text-end"><?php echo number_format($item["gia"] ?? $item["dongia"] ?? 0); ?>đ</td>
                        <td class="text-end fw-bold">
                            <?php
                            $price = $item["gia"] ?? $item["dongia"] ?? 0;
                            echo number_format($price * $item["soluong"]);
                            ?>đ
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-end fw-bold">Tổng cộng:</td>
                    <td class="text-end text-danger fw-bold fs-5"><?php echo number_format($donhang["tongtien"]); ?>đ
                    </td>
                </tr>
            </tfoot>
        </table>

        <div class="mt-5 row text-center">
            <div class="col-6">
                <p class="small mb-5">Khách hàng</p>
                <p class="mt-5">..........................</p>
            </div>
            <div class="col-6">
                <p class="small mb-5">Người lập phiếu</p>
                <p class="mt-5 fw-bold"><?php echo $_SESSION["nguoidung"]["hoten"]; ?></p>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>

</html>