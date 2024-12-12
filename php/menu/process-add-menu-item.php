<?php
// Kết nối cơ sở dữ liệu
include('../connect.php');

// Kiểm tra nếu có dữ liệu gửi lên từ form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = str_replace(',', '', $_POST['price']); // Loại bỏ dấu phẩy nếu có
    $category = $_POST['category'];

    // Kiểm tra xem dữ liệu có hợp lệ không
    if (!empty($name) && !empty($description) && !empty($price) && !empty($category)) {
        // Truy vấn SQL để thêm món mới vào cơ sở dữ liệu
        $sql = "INSERT INTO menu_items (name, description, price, category) 
                VALUES (?, ?, ?, ?)";

        // Chuẩn bị câu lệnh SQL
        if ($stmt = $conn->prepare($sql)) {
            // Liên kết các tham số với câu lệnh SQL
            $stmt->bind_param("ssss", $name, $description, $price, $category);

            // Thực thi câu lệnh SQL
            if ($stmt->execute()) {
                // Thêm thành công, chuyển hướng về menu.php
                echo "<script>alert('Thêm món thành công!'); window.location.href = 'menu.php';</script>";
            } else {
                echo "Lỗi khi thêm món vào cơ sở dữ liệu.";
            }

            // Đóng câu lệnh
            $stmt->close();
        } else {
            echo "Lỗi chuẩn bị câu lệnh SQL.";
        }
    } else {
        echo "Vui lòng điền đầy đủ thông tin.";
    }
}

// Đóng kết nối
$conn->close();
?>
