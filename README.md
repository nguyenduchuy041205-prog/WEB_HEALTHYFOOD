# 🥗 Fit'n Ngon - Website Thương mại Điện tử Bán Đồ Ăn Healthy

## 📝 Giới thiệu
**Fit'n Ngon** là một dự án website thương mại điện tử được phát triển cá nhân, chuyên cung cấp các sản phẩm đồ ăn lành mạnh, tốt cho sức khỏe. Dự án được thiết kế với mục tiêu mang lại trải nghiệm mua sắm mượt mà, tiện lợi cho người dùng, đồng thời cung cấp hệ thống quản lý cơ bản cho cửa hàng. 

Dự án được xây dựng toàn bộ từ khâu thiết kế cơ sở dữ liệu (Back-end) đến phát triển giao diện người dùng (Front-end).

## 🚀 Chức năng nổi bật
* **Dành cho Khách hàng:**
  * Xem danh sách sản phẩm, phân loại theo danh mục (đồ ăn kiêng, nước ép, salad...).
  * Thêm vào giỏ hàng, cập nhật số lượng và xóa sản phẩm khỏi giỏ.
  * Đặt hàng và điền thông tin thanh toán/giao hàng.
  * Giao diện tương thích trên cả máy tính (PC) và thiết bị di động (Mobile Responsive).
* **Dành cho Quản trị viên (Admin):**
  * Quản lý danh mục và thông tin sản phẩm (Thêm, sửa, xóa).
  * Theo dõi và quản lý trạng thái đơn hàng.
<img width="1907" height="908" alt="image" src="https://github.com/user-attachments/assets/ebfc8561-4170-4db1-a961-a3a1472eba69" />
<img width="1902" height="901" alt="image" src="https://github.com/user-attachments/assets/e8f5667f-94bc-4113-a798-4f31ca5e04df" />

## 💻 Công nghệ và Môi trường sử dụng
* **Ngôn ngữ Back-end:** PHP 8.x
* **Cơ sở dữ liệu:** MySQL
* **Giao diện Front-end:** HTML5, CSS3, JavaScript, Bootstrap 5
* **Môi trường phát triển:** XAMPP (Apache Server), Visual Studio Code

## ⚙️ Hướng dẫn cài đặt (Localhost)

Để chạy dự án này trên máy tính cá nhân, bạn cần cài đặt **XAMPP** (hoặc phần mềm tương đương có hỗ trợ PHP và MySQL).

**Bước 1: Tải mã nguồn**
Clone repository này về thư mục `htdocs` của XAMPP (thường nằm ở `C:\xampp\htdocs`):
```bash
git clone [https://github.com/nguyenduchuy041205-prog/WEB_HEALTHYFOOD.git](https://github.com/nguyenduchuy041205-prog/WEB_HEALTHYFOOD.git)

Bước 2: Cài đặt Cơ sở dữ liệu
Mở XAMPP Control Panel, khởi động Apache và MySQL.
Truy cập vào phpMyAdmin qua đường dẫn: http://localhost/phpmyadmin
Tạo một Database mới với tên là [tên_database_của_bạn_ví_dụ_fitn_ngon].
Chọn tab Import (Nhập), tải lên file script SQL của dự án (nằm trong thư mục [Tên_thư_mục_chứa_file_sql]/[tên_file].sql) và nhấn thực thi để tạo bảng và dữ liệu mẫu.

Bước 3: Cấu hình kết nối
Mở file [tên_file_kết_nối_ví_dụ_config.php_hoặc_db.php] trong source code và kiểm tra lại các thông số kết nối sao cho khớp với môi trường localhost của bạn:
PHP
$servername = "localhost";
$username = "root"; // Username mặc định của XAMPP
$password = "";     // Password mặc định thường để trống
$dbname = "[tên_database_vừa_tạo_ở_bước_2]";

Bước 4: Khởi chạy website
Mở trình duyệt web và truy cập vào đường dẫn:
http://localhost/WEB_HEALTHYFOOD

----Tài khoản đăng nhập mẫu--
- Admin:
  tk:admin@gmail.com
  mk:123456
-Khách hàng:
  tk:kh1@gmail.com
  mk:123456
