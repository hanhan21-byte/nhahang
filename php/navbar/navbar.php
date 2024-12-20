<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Header</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
    }

    .header {
      display: flex;
      justify-content: center; /* Căn giữa toàn bộ header */
      align-items: center;
      background-color: #18181b; /* Zinc-900 for dark theme */
      color: white;
      padding: 20px 0; /* Tăng padding cho header */
    }

    .nav {
      display: flex;
      justify-content: center; /* Căn giữa các mục trong nav */
      list-style: none;
      margin: 0;
      padding: 0;
    }

    .nav li {
      margin: 0 30px; /* Tăng khoảng cách giữa các mục */
    }

    .nav a {
      text-decoration: none;
      color: white;
      font-size: 18px; /* Tăng kích thước chữ */
      font-weight: bold; /* Làm đậm chữ */
      transition: color 0.3s;
    }

    .nav a:hover {
      color: #d4d4d8; /* Zinc-300 for hover effect */
    }

    @media (max-width: 768px) {
      .header {
        flex-direction: column;
        align-items: center;
      }

      .nav {
        flex-direction: column;
        width: 100%;
        margin-top: 10px;
      }

      .nav li {
        margin: 10px 0;
      }
    }
  </style>
</head>
<body>
  <div class="header">
    <ul class="nav">
      <li><a href="../menu/menu.php">Thực đơn</a></li>
      <li><a href="../order/orders.php">Đơn Hàng</a></li>
      <li><a href="../employees/employees.php">Nhân Viên</a></li>
      <li><a href="../feedback/feedback.php">Ý Kiến</a></li>
      <li><a href="../revenue/revenue.php">Doanh thu</a></li>
    </ul>
  </div>
</body>
</html>
