<?php
// Kết nối cơ sở dữ liệu
include('../connect.php');

// Kiểm tra nếu có ID món ăn cần sửa
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Truy vấn SQL để lấy thông tin món ăn cần sửa
    $sql = "SELECT * FROM menu_items WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        // Liên kết tham số
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Kiểm tra xem món ăn có tồn tại không
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $description = $row['description'];
            $price = $row['price'];
            $category = $row['category'];
        } else {
            echo "Món ăn không tồn tại.";
            exit;
        }

        // Đóng câu lệnh
        $stmt->close();
    } else {
        echo "Lỗi chuẩn bị câu lệnh SQL.";
        exit;
    } // <-- Dấu ngoặc đóng thiếu ở đây
}


// Xử lý khi người dùng gửi form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = str_replace(',', '', $_POST['price']); // Loại bỏ dấu phẩy
    $category = $_POST['category'];

    // Kiểm tra dữ liệu
    if (!empty($name) && !empty($description) && !empty($price) && !empty($category)) {
        // Truy vấn SQL để cập nhật món ăn
        $sql = "UPDATE menu_items SET name = ?, description = ?, price = ?, category = ? WHERE id = ?";
        if ($stmt = $conn->prepare($sql)) {
            // Liên kết tham số
            $stmt->bind_param("ssssi", $name, $description, $price, $category, $id);

            // Thực thi câu lệnh
            if ($stmt->execute()) {
                echo "<script>alert('Cập nhật món thành công!'); window.location.href = 'menu.php';</script>";
            } else {
                echo "Lỗi khi cập nhật món.";
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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sửa Món</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      color: #333;
    }

    .container {
      width: 50%;
      margin: 20px auto;
      background-color: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      color: #007bff;
    }

    input[type="text"], input[type="number"], select {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    button {
      background-color: #007bff;
      color: white;
      padding: 10px 15px;
      border-radius: 4px;
      cursor: pointer;
      width: 100%;
      border: none;
    }

    button:hover {
      background-color: #0056b3;
    }

    .error {
      color: red;
      font-size: 14px;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>

<div class="container">
  <h1>Sửa Món Ăn</h1>
  <?php
  // Hiển thị lỗi nếu có
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && (empty($name) || empty($description) || empty($price) || empty($category))) {
      echo "<div class='error'>Vui lòng điền đầy đủ thông tin.</div>";
  }
  ?>
  
  <form action="edit-menu-item.php?id=<?php echo $id; ?>" method="POST">
    <label for="name">Tên Món:</label>
    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>

    <label for="description">Mô Tả:</label>
    <input type="text" id="description" name="description" value="<?php echo htmlspecialchars($description); ?>" required>

    <label for="price">Giá (VND):</label>
    <input type="number" id="price" name="price" value="<?php echo $price; ?>" required>

    <label for="category">Loại Món:</label>
    <select id="category" name="category" required>
      <option value="Món Chính" <?php echo $category == 'Món Chính' ? 'selected' : ''; ?>>Món Chính</option>
      <option value="Món Tráng Miệng" <?php echo $category == 'Món Tráng Miệng' ? 'selected' : ''; ?>>Món Tráng Miệng</option>
      <option value="Món Hải Sản" <?php echo $category == 'Món Hải Sản' ? 'selected' : ''; ?>>Món Hải Sản</option>
    </select>

    <button type="submit">Cập Nhật</button>
  </form>
</div>

</body>
</html>
