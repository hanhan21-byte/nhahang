
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh Sửa Nhân Viên</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Chỉnh Sửa Nhân Viên</h1>
</header>

<?php include '../navbar/navbar.php'; ?>

<div class="container">
    <form action="update_employee.php" method="POST">
        <input type="hidden" name="employee_id" value="<?php echo $employee['id']; ?>">

        <label for="employeeName">Tên Nhân Viên:</label>
        <input type="text" id="employeeName" name="employeeName" value="<?php echo $employee['full_name']; ?>" required>

        <label for="position">Chức Vụ:</label>
        <input type="text" id="position" name="position" value="<?php echo $employee['position']; ?>" required>

        <label for="phone">Số Điện Thoại:</label>
        <input type="text" id="phone" name="phone" value="<?php echo $employee['phone']; ?>" required>

        <button type="submit">Cập Nhật</button>
        <button type="button" onclick="window.location.href='employees.php'">Hủy</button>
    </form>
</div>

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
