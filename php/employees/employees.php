<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Nhân Viên</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Quản Lý Nhân Viên</h1>
</header>

<?php include '../navbar/navbar.php'; ?>

<div class="container">
    <h2>Danh Sách Nhân Viên</h2>
    
    <!-- Add Employee Form -->
    <h3>Thêm Nhân Viên Mới</h3>
    <form action="add_employee.php" method="POST">
        <label for="full_name">Họ và Tên:</label>
        <input type="text" id="full_name" name="full_name" required><br>

        <label for="gender">Giới Tính:</label>
        <select id="gender" name="gender" required>
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
            <option value="Khác">Khác</option>
        </select><br>

        <label for="birth_date">Ngày Tháng Năm Sinh:</label>
        <input type="date" id="birth_date" name="birth_date" required><br>

        <label for="hometown">Quê Quán:</label>
        <input type="text" id="hometown" name="hometown" required><br>

        <label for="position">Chức Vụ:</label>
        <input type="text" id="position" name="position" required><br>

        <label for="phone">Số Điện Thoại:</label>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required><br>

        <label for="cccd">CCCD:</label>
        <input type="text" id="cccd" name="cccd" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <button type="submit">Thêm Nhân Viên</button>
    </form>

    <h2>Danh Sách Nhân Viên</h2>
    <table>
        <tr>
            <th>Họ và Tên</th>
            <th>Giới Tính</th>
            <th>Ngày Tháng Năm Sinh</th>
            <th>Quê Quán</th>
            <th>Chức Vụ</th>
            <th>Số Điện Thoại</th>
            <th>CCCD</th>
            <th>Email</th>
            <th>Thao Tác</th>
        </tr>
        <!-- Ví dụ nhân viên -->
        <tr>
            <td>Trần Văn A</td>
            <td>Nam</td>
            <td>01/01/1990</td>
            <td>Hà Nội</td>
            <td>Quản lý</td>
            <td>0123456789</td>
            <td>123456789</td>
            <td>tranvana@example.com</td>
            <td>
            <button onclick="window.location.href='../employees/edit-employees.php?id=1'">Chỉnh sửa</button>
                <button onclick="confirmDelete()">Xóa</button>
            </td>
        </tr>
        <!-- Thêm các nhân viên khác ở đây -->
    </table>
</div>

<script>
function confirmDelete() {
    if (confirm("Bạn có chắc chắn muốn xóa nhân viên này không?")) {
        // Xử lý xóa nhân viên (có thể điều hướng đến một trang xóa)
        alert("Nhân viên đã được xóa!"); // Chỉ là thông báo mẫu, không xóa thực tế
    }
}
</script>

</body>
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
</html> 