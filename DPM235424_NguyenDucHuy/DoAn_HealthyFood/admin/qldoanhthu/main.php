<?php include("../inc/top.php"); ?>

<?php
$nam_hien_tai = date("Y");
$nam_chon = isset($_GET['txtnam']) ? $_GET['txtnam'] : $nam_hien_tai;
?>

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold text-dark mb-0">
                <i class="fa-solid fa-chart-line text-success me-2"></i>Báo Cáo Doanh Thu
            </h3>
            <p class="text-muted small mb-0">Thống kê doanh thu theo từng tháng của năm được chọn</p>
        </div>

        <div class="bg-white p-2 rounded-3 shadow-sm border">
            <form action="index.php" method="get" id="formFilter" class="d-flex align-items-center gap-2">
                <input type="hidden" name="action" value="list">
                <label class="small fw-bold text-muted ps-2">XEM NĂM:</label>
                <select name="txtnam" class="form-select border-0 fw-bold text-success"
                    style="width: 120px; cursor: pointer;" onchange="this.form.submit()">
                    <?php
                    for ($i = $nam_hien_tai; $i >= $nam_hien_tai - 5; $i--):
                        ?>
                        <option value="<?php echo $i; ?>" <?php echo ($i == $nam_chon) ? 'selected' : ''; ?>>
                            <?php echo $i; ?>
                        </option>
                    <?php endfor; ?>
                </select>
            </form>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 p-4">
                <h6 class="fw-bold mb-4 text-muted text-uppercase small">
                    Biểu đồ xu hướng doanh thu năm <?php echo $nam_chon; ?>
                </h6>
                <div style="height: 350px;">
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-success text-white mb-4">
                <div class="d-flex justify-content-between">
                    <div>
                        <small class="opacity-75">Tổng doanh thu năm <?php echo $nam_chon; ?></small>
                        <h2 class="fw-bold mt-1"><?php echo number_format(array_sum($values)); ?>đ</h2>
                    </div>
                    <i class="fa-solid fa-money-bill-trend-up fs-1 opacity-25"></i>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-header bg-white py-3 border-0">
                    <h6 class="mb-0 fw-bold text-dark">Chi tiết theo tháng</h6>
                </div>
                <div class="table-responsive" style="max-height: 320px;">
                    <table class="table table-hover align-middle mb-0">
                        <tbody class="small">
                            <?php for ($i = 1; $i <= 12; $i++): ?>
                                <tr>
                                    <td class="ps-3 text-muted">Tháng <?php echo $i; ?></td>
                                    <td
                                        class="text-end pe-3 fw-bold <?php echo (isset($values[$i]) && $values[$i] > 0) ? 'text-success' : 'text-muted'; ?>">
                                        <?php echo number_format($values[$i] ?? 0); ?>đ
                                    </td>
                                </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('revenueChart').getContext('2d');

    let gradient = ctx.createLinearGradient(0, 0, 0, 400);
    gradient.addColorStop(0, 'rgba(76, 175, 80, 0.3)');
    gradient.addColorStop(1, 'rgba(76, 175, 80, 0)');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Tháng 1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12'],
            datasets: [{
                label: 'Doanh thu năm <?php echo $nam_chon; ?>',
                data: <?php echo json_encode(array_values($values)); ?>,
                borderColor: '#4CAF50',
                backgroundColor: gradient,
                borderWidth: 3,
                tension: 0.4,
                fill: true,
                pointBackgroundColor: '#fff',
                pointBorderColor: '#4CAF50',
                pointRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        borderDash: [5, 5]
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
</script>

<?php include("../inc/bottom.php"); ?>