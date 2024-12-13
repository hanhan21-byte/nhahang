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
      justify-content: space-between;
      align-items: center;
      background-color: #18181b; /* Zinc-900 for dark theme */
      color: white;
      padding: 10px 20px;
    }

    .logo {
      font-size: 18px;
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
      font-size: 14px;
      transition: color 0.3s;
    }

    .nav a:hover {
      color: #d4d4d8; /* Zinc-300 for hover effect */
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
      background-color: #27272a; /* Zinc-800 for dropdown */
      color: white;
      border-radius: 4px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      display: none;
      flex-direction: column;
      min-width: 150px;
    }

    .profile-dropdown a {
      text-decoration: none;
      color: white;
      padding: 10px;
      border-bottom: 1px solid #3f3f46; /* Zinc-700 for separator */
      transition: background-color 0.3s;
    }

    .profile-dropdown a:hover {
      background-color: #3f3f46; /* Zinc-700 for hover */
    }

    .user-profile:hover .profile-dropdown {
      display: flex;
    }

    .logout-btn {
      background-color: transparent;
      color: white;
      border: none;
      padding: 8px 15px;
      font-size: 14px;
      cursor: pointer;
      transition: color 0.3s;
    }

    .logout-btn:hover {
      color: #d4d4d8; /* Zinc-300 for hover effect */
    }

    @media (max-width: 768px) {
      .header {
        flex-direction: column;
        align-items: flex-start;
      }

      .nav {
        flex-direction: column;
        width: 100%;
        margin-top: 10px;
      }

      .nav li {
        margin-left: 0;
        margin-bottom: 10px;
      }

      .user-options {
        width: 100%;
        justify-content: space-between;
        margin-top: 10px;
      }
    }
  </style>
</head>
<body>
  <div class="header">
    <div class="logo">Nhà Hàng</div>
    <ul class="nav">
      <li><a href="../menu/menu.php">Thực đơn</a></li>
      <li><a href="../order/orders.php">Đơn Hàng</a></li>
      <li><a href="../employees/employees.php">Nhân Viên</a></li>
      <li><a href="../feedback/feedback.php">Ý Kiến</a></li>
      <li><a href="../revenue/revenue.php">Doanh Thu</a></li>
    </ul>
    <div class="user-options">
      <div class="user-profile">
        Hồ sơ
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