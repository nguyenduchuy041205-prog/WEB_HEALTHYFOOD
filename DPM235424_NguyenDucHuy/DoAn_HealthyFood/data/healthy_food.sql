-- 1. Tạo cơ sở dữ liệu nếu chưa có
CREATE DATABASE IF NOT EXISTS `healthy_food` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- 2. Chỉ định sử dụng cơ sở dữ liệu này
USE `healthy_food`;

-- 3. Tắt kiểm tra khóa ngoại để dọn dẹp bảng cũ (nếu có)
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `chitietdonhang`;
DROP TABLE IF EXISTS `donhang`;
DROP TABLE IF EXISTS `nguoidung`;
DROP TABLE IF EXISTS `mathang`;
DROP TABLE IF EXISTS `danhmuc`;
SET FOREIGN_KEY_CHECKS = 1;

-- --------------------------------------------------------
-- TẠO BẢNG DANH MỤC
-- --------------------------------------------------------
CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tendanhmuc` varchar(255) NOT NULL,
  `trangthai` TINYINT(1) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `danhmuc` (`id`, `tendanhmuc`, `trangthai`) VALUES
(1, 'Salad Eat Clean', 1),
(2, 'Cơm Gạo Lứt', 1),
(3, 'Nước Ép Detox', 1),
(4, 'Bún', 1);

-- --------------------------------------------------------
-- TẠO BẢNG MẶT HÀNG
-- --------------------------------------------------------
CREATE TABLE `mathang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tenmathang` varchar(255) NOT NULL,
  `mota` text,
  `gia` int(11) NOT NULL DEFAULT '0',
  `hinhanh` varchar(255) DEFAULT NULL,
  `danhmuc_id` int(11) NOT NULL,
  `calo` int(11) DEFAULT '0',       
  `protein` float DEFAULT '0',      
  `luotxem` int(11) DEFAULT '0',
  `luotban` int(11) DEFAULT '0',   -- <--- THÊM CỘT NÀY Ở ĐÂY
  `soluong` int(11) DEFAULT '100',
  `trangthai` tinyint(1) DEFAULT '1',
  `giamgia` INT DEFAULT 0,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_mathang_danhmuc` FOREIGN KEY (`danhmuc_id`) REFERENCES `danhmuc`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Thêm dữ liệu mẫu có cả lượt xem và lượt bán để test trang chủ
INSERT INTO `mathang` (`id`, `tenmathang`, `mota`, `gia`, `hinhanh`, `danhmuc_id`, `calo`, `protein`, `luotxem`, `luotban`) VALUES
(1, 'Salad Ức Gà Nướng', 'Salad mix, ức gà áp chảo, cà chua bi, sốt mè rang.', 65000, 'salad_ucga_nuong.jpg', 1, 350, 32.5, 150, 45),
(2, 'Cơm Lứt Cá Hồi', 'Cơm gạo lứt dẻo, cá hồi Nauy áp chảo, măng tây.', 95000, 'FRAME-08.jpg', 2, 420, 28.0, 210, 30),
(3, 'Nước Ép Cần Tây', 'Cần tay, táo xanh, thơm, gừng tươi.', 45000, 'nuoc-ep-can-tay-1756177131.jpg', 3, 120, 1.5, 95, 60),
(4, 'Salad Bơ Trứng', 'Xà lách, quả bơ, trứng luộc, sốt dầu giấm.', 55000, 'salad-bo-1.jpg', 1, 310, 12.0, 120, 25),
(5, 'Gỏi bò sốt Thái + bánh đa gạo lứt', 'Xoài thái, dưa chuột, cà rốt, thịt bò tươi sốt Thái chua cay kèm bánh đa gạo lứt.', 125000, 'goi_bo_thai.jpg', 1, 246, 22.5, 80, 20),
(6, 'Ceasar salad - Salad lườn gà nướng', 'Xà lách Roman, trứng gà, lườn gà áp chảo, phô mai bột và sốt Ceasar.', 125000, 'ceasar_salad.jpg', 1, 320, 25.0, 95, 35),
(7, 'Grilled salmon salad - salad cá hồi nướng tảng', 'Cá hồi Nauy nướng tảng, xà lách, hành tây tím, cà chua bi và sốt mù tạt hạt.', 199000, 'salmon_salad.jpg', 1, 439, 28.5, 120, 15),
(8, 'Cơm Cá Saba Sốt Me', 'Cơm gạo lứt đen, cá saba áp chảo sốt me, rau củ theo mùa.', 99000, 'com_ca_saba.jpg', 2, 460, 24.0, 60, 12),
(9, 'Cơm Chiên Dương Châu Heo Xíu', 'Cơm gạo lứt chiên, thịt heo xá xíu, đậu Hà Lan, bắp ngọt và cà rốt.', 95000, 'com_duong_chau.jpg', 2, 450, 21.0, 75, 28),
(10, 'Cơm gà xốt me', 'Đùi gà nướng xốt me, cơm gạo lứt đen, bông cải xanh và cà rốt.', 93000, 'com_ga_me.jpg', 2, 381, 26.5, 90, 40),

(11, 'VKombucha vị me 250ml', 'Trà bất tử lên men vị me tươi, hỗ trợ tiêu hóa và giải nhiệt.', 47000, 'kombucha_me.jpg', 3, 50, 0.5, 40, 50),
(12, 'VKombucha vị chanh tươi mật ong 250ml', 'Trà lên men vị chanh tươi và mật ong rừng, tăng cường sức đề kháng.', 47000, 'kombucha_chanh_mo.jpg', 3, 45, 0.5, 30, 25),
(13, 'VKombucha vị chanh leo 250ml', 'Trà lên men vị chanh leo thơm mát, giàu Vitamin C.', 47000, 'kombucha_chanh_leo.jpg', 3, 55, 0.5, 35, 32),
(14, 'Kombucha Ba Lành Vị Quả Mơ Dại 500ml', 'Nước uống lên men thủ công từ trà và quả mơ dại vùng cao.', 68000, 'kombucha_mo_500ml.jpg', 3, 110, 1.0, 55, 18),
(15, 'Mỳ ý cà chua lườn gà', 'Mỳ Spaghetti, lườn gà nướng sốt cà chua tươi và phô mai.', 114000, 'my_y_ca_chua.jpg', 4, 390, 23.5, 85, 22),
(16, 'Mỳ lứt heo cốt lết', 'Mỳ gạo lứt đen, thịt heo cốt lết nướng, rau xà lách và lạc rang.', 114000, 'my_lut_heo.jpg', 4, 370, 22.0, 70, 19),
(17, 'Bún bò Nam Bộ', 'Bún gạo lứt, thịt bò xào mềm, dưa chuột, giá đỗ và nước mắm chua ngọt.', 104000, 'bun_bo_nambo.jpg', 4, 354, 21.0, 110, 45),
(18, 'Bún chả cá Hà Nội', 'Bún gạo lứt đen, chả cá lăng nướng, rau mầm và nước dùng thanh ngọt.', 104000, 'bun_cha_ca.jpg', 4, 438, 24.5, 95, 38);
-- --------------------------------------------------------
-- TẠO BẢNG NGƯỜI DÙNG
-- --------------------------------------------------------
CREATE TABLE `nguoidung` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `sodienthoai` varchar(20) DEFAULT NULL,
  `diachi` text DEFAULT NULL,
  `loai` tinyint(1) DEFAULT '0',
  `trangthai` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `nguoidung` (`id`, `email`, `matkhau`, `hoten`, `loai`) VALUES
(1, 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'ADMIN', 1),
(2, 'kh1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Chị D', 0);
-- mk : 123456

-- --------------------------------------------------------
-- TẠO BẢNG ĐƠN HÀNG
-- --------------------------------------------------------
CREATE TABLE `donhang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nguoidung_id` int(11) DEFAULT NULL,
  `ngaydat` datetime DEFAULT CURRENT_TIMESTAMP,
  `tongtien` int(11) NOT NULL DEFAULT '0',
  `tennguoinhan` varchar(255) NOT NULL,
  `sodienthoainhan` varchar(20) NOT NULL,
  `diachinhan` text NOT NULL,
  `trangthai` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_donhang_nguoidung` FOREIGN KEY (`nguoidung_id`) REFERENCES `nguoidung`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `donhang` (`nguoidung_id`, `tongtien`, `tennguoinhan`, `sodienthoainhan`, `diachinhan`, `trangthai`) 
VALUES 
(2, 150000, 'Chị D', '0901234567', 'Vĩnh Long', 2),
(2, 250000, 'Chị D', '0901234567', 'Cần Thơ', 2);
-- --------------------------------------------------------
-- TẠO BẢNG CHI TIẾT ĐƠN HÀNG
-- --------------------------------------------------------
CREATE TABLE `chitietdonhang` (
  `donhang_id` int(11) NOT NULL,
  `mathang_id` int(11) NOT NULL,
  `dongia` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `thanhtien` int(11) NOT NULL,
  PRIMARY KEY (`donhang_id`,`mathang_id`),
  CONSTRAINT `fk_ct_donhang` FOREIGN KEY (`donhang_id`) REFERENCES `donhang`(`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_ct_mathang` FOREIGN KEY (`mathang_id`) REFERENCES `mathang`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;