<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        <?php if (isset($_SESSION["thongbao"])): ?>
            Swal.fire({
                icon: '<?php echo $_SESSION["loai_thongbao"]; ?>',
                title: 'Thông báo',
                text: '<?php echo addslashes($_SESSION["thongbao"]); ?>',
                confirmButtonColor: '#28a745',
                timer: 3500,
                timerProgressBar: true,
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            });
            <?php
            unset($_SESSION["thongbao"]);
            unset($_SESSION["loai_thongbao"]);
            ?>
        <?php endif; ?>
    });
</script>