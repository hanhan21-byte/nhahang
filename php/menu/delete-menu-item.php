<?php
// Kết nối cơ sở dữ liệu
include('../connect.php');

// Kiểm tra nếu có ID món ăn cần xóa
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Truy vấn SQL để xóa món ăn
    $sql = "DELETE FROM menu_items WHERE id = ?";

    // Chuẩn bị câu lệnh SQL
    if ($stmt = $conn->prepare($sql)) {
        // Liên kết tham số
        $stmt->bind_param("i", $id);

        // Thực thi câu lệnh SQL
        if ($stmt->execute()) {
            // Xóa thành công, chuyển hướng về trang menu
            echo "<script>alert('Xóa món thành công!'); window.location.href = 'menu.php';</script>";
        } else {
            echo "Lỗi khi xóa món.";
        }

        // Đóng câu lệnh
        $stmt->close();
    } else {
        echo "Lỗi chuẩn bị câu lệnh SQL.";
    }
} else {
    echo "Không có món ăn để xóa.";
}

// Đóng kết nối
$conn->close();
?>
