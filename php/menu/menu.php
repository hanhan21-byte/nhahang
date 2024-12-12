<?php
// Kết nối cơ sở dữ liệu
include('../connect.php');

// Truy vấn lấy danh sách các món ăn từ cơ sở dữ liệu
$sql = "SELECT * FROM menu_items";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thực Đơn</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      color: #333;
    }

    .container {
      width: 90%;
      max-width: 1200px;
      margin: 20px auto;
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }

    h1 {
      background-color: #007bff;
      color: white;
      padding: 20px;
      margin: 0;
      font-size: 24px;
      text-align: center;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin: 20px 0;
    }

    table thead {
      background-color: #007bff;
      color: white;
    }

    table th, table td {
      padding: 15px;
      text-align: left;
      border: 1px solid #ddd;
    }

    table tbody tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .add-btn {
      display: inline-block;
      background-color: #28a745;
      color: white;
      padding: 10px 15px;
      border-radius: 4px;
      text-decoration: none;
      margin: 20px;
      transition: background-color 0.3s;
    }

    .add-btn:hover {
      background-color: #218838;
    }

    .action-btn {
      padding: 5px 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      color: white;
    }

    .edit-btn {
      background-color: #ffc107;
    }

    .edit-btn:hover {
      background-color: #e0a800;
    }

    .delete-btn {
      background-color: #dc3545;
    }

    .delete-btn:hover {
      background-color: #c82333;
    }
  </style>
</head>
<body>
<?php include '../navbar/navbar.php'; ?>

  <div class="container">
    <h1>Thực Đơn</h1>
    <a href="add-menu-item.php" class="add-btn">Thêm món mới</a>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Tên món</th>
          <th>Mô tả</th>
          <th>Giá</th>
          <th>Loại món</th>
          <th>Hành động</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Kiểm tra nếu có dữ liệu trả về từ cơ sở dữ liệu
        if ($result->num_rows > 0) {
          // Hiển thị từng món ăn
          while ($row = $result->fetch_assoc()) {
            // Định dạng giá trị tiền
            $formatted_price = number_format($row['price'], 0, ',', '.');
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['description']}</td>
                    <td>{$formatted_price} VND</td>
                    <td>{$row['category']}</td>
                    <td>
                      <a href='edit-menu-item.php?id={$row['id']}' class='action-btn edit-btn'>Sửa</a>
                      <a href='delete-menu-item.php?id={$row['id']}' class='action-btn delete-btn' onclick='return confirm(\"Bạn có chắc muốn xóa món này không?\")'>Xóa</a>
                    </td>
                  </tr>";
          }
        } else {
          echo "<tr><td colspan='6'>Không có món ăn nào trong thực đơn.</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

</body>
</html>

<?php
// Đóng kết nối
$conn->close();
?>
