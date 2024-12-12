<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Header</title>
  <style>
    /* CSS giữ nguyên như bạn đã cung cấp */
    body {
      margin: 0;
      font-family: Arial, sans-serif;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #007bff; /* Xanh dương */
      color: white;
      padding: 10px 20px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .logo {
      font-size: 24px;
      font-weight: bold;
    }

    .nav {
      display: flex;
      list-style: none;
      margin: 0;
      padding: 0;
    }

    .nav li {
      margin-left: 20px;
    }

    .nav a {
      text-decoration: none;
      color: white;
      font-size: 16px;
      transition: color 0.3s;
    }

    .nav a:hover {
      color: #ffd700; /* Màu vàng */
    }

    .user-options {
      display: flex;
      align-items: center;
    }

    .user-profile {
      position: relative;
      margin-right: 20px;
      cursor: pointer;
    }

    .profile-dropdown {
      position: absolute;
      top: 40px;
      right: 0;
      background-color: white;
      color: #333;
      border-radius: 4px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      display: none;
      flex-direction: column;
      min-width: 150px;
    }

    .profile-dropdown a {
      text-decoration: none;
      color: #333;
      padding: 10px;
      border-bottom: 1px solid #ddd;
      transition: background-color 0.3s;
    }

    .profile-dropdown a:hover {
      background-color: #f0f0f0;
    }

    .user-profile:hover .profile-dropdown {
      display: flex;
    }

    .logout-btn {
      background-color: #ff4d4f;
      color: white;
      border: none;
      padding: 8px 15px;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .logout-btn:hover {
      background-color: #e63946;
    }
  </style>
</head>
<body>
  <div class="header">
    <div class="logo">Nhà Hàng</div>
    <ul class="nav">
      <li><a href="../homepage/homepage.php">Trang Chủ</a></li>
      <li><a href="../menu/menu.php">Thực đơn</a></li>
      <li><a href="../order/orders.php">Đơn Hàng</a></li>
      <li><a href="../employees/employees.php">Nhân Viên</a></li>
      <li><a href="../feedback/feedback.php">Ý Kiến Khách Hàng</a></li>
      <li><a href="../revenue/revenue.php">Doanh Thu</a></li>
    </ul>
    <div class="user-options">
      <div class="user-profile">
        Hồ sơ cá nhân
        <div class="profile-dropdown">
          <a href="profile.php">Thông tin cá nhân</a>
          <a href="update-account.php">Cập nhật tài khoản</a>
        </div>
      </div>
      <button class="logout-btn" onclick="window.location.href='../logout/logout.php';">Đăng xuất</button>
    </div>
  </div>
</body>
</html>
