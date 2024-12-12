<?php
// Thông tin kết nối
$servername = "localhost"; // Địa chỉ máy chủ MySQL
$username = "root";        // Tên đăng nhập MySQL
$password = "";            // Mật khẩu MySQL
$database = "nha_hang";    // Tên cơ sở dữ liệu

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    // Ngắt kết nối nếu có lỗi
    die("Lỗi kết nối cơ sở dữ liệu: " . $conn->connect_error);
}

// Thiết lập charset để hỗ trợ Tiếng Việt
$conn->set_charset("utf8");

?>
