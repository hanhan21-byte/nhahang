<?php
// Kết nối cơ sở dữ liệu
include __DIR__ . '/../connect.php'; // Đường dẫn đến file connect.php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Lấy dữ liệu từ form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kiểm tra nếu username đã tồn tại
    $checkQuery = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $checkQuery->bind_param("s", $username);
    $checkQuery->execute();
    $result = $checkQuery->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Tên đăng nhập đã tồn tại. Vui lòng chọn tên khác!');</script>";
    } else {
        // Thêm người dùng mới vào cơ sở dữ liệu (không mã hóa mật khẩu)
        $insertQuery = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $insertQuery->bind_param("ss", $username, $password);

        if ($insertQuery->execute()) {
            echo "<script>alert('Đăng ký thành công!'); window.location.href = '../login/login.php';</script>";
        } else {
            echo "<script>alert('Đăng ký thất bại. Vui lòng thử lại sau!');</script>";
        }
    }

    // Đóng kết nối
    $checkQuery->close();
    $insertQuery->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f0f4f8;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .register-container {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      width: 400px;
    }

    .register-form h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333333;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-size: 14px;
      color: #555555;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      border: 1px solid #cccccc;
      border-radius: 5px;
      font-size: 14px;
    }

    .register-button {
      width: 100%;
      padding: 10px;
      background-color: #28a745;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }

    .register-button:hover {
      background-color: #218838;
    }

    .login-link {
      text-align: center;
      margin-top: 15px;
      font-size: 14px;
      color: #555555;
    }

    .login-link a {
      color: #007bff;
      text-decoration: none;
      font-weight: bold;
    }

    .login-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="register-container">
    <form class="register-form" method="POST" action="register.php">
      <h2>Register</h2>
      <div class="form-group">
        <label for="username">Tên đăng nhập</label>
        <input type="text" id="username" name="username" placeholder="Mời nhập tên đăng nhập" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Mời nhập mật khẩu " required>
      </div>
      <button type="submit" class="register-button">Đăng kí </button>
      <div class="login-link">
        Đã có tài khoản? <a href="../login/login.php">Đăng nhập</a>.
      </div>
    </form>
  </div>
</body>
</html>
