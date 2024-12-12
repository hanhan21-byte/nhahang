<?php
// Kết nối cơ sở dữ liệu
include __DIR__ . '/../connect.php'; // Đường dẫn đến file connect.php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Lấy dữ liệu từ form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kiểm tra thông tin đăng nhập
    $query = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $query->bind_param("s", $username);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        // Kiểm tra mật khẩu (nếu đã mã hóa mật khẩu, sử dụng password_verify thay vì so sánh trực tiếp)
        if ($password === $user['password']) {
            // Đăng nhập thành công
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            echo "<script>alert('Đăng nhập thành công!'); window.location.href = '../homepage/homepage.php';</script>";
        } else {
            echo "<script>alert('Sai mật khẩu. Vui lòng thử lại!');</script>";
        }
    } else {
        echo "<script>alert('Tên đăng nhập không tồn tại.');</script>";
    }

    // Đóng kết nối
    $query->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
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

    .login-container {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      width: 400px;
    }

    .login-form h2 {
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

    .login-button {
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }

    .login-button:hover {
      background-color: #0056b3;
    }

    .register-link {
      text-align: center;
      margin-top: 15px;
      font-size: 14px;
      color: #555555;
    }

    .register-link a {
      color: #007bff;
      text-decoration: none;
      font-weight: bold;
    }

    .register-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <form class="login-form" method="POST" action="login.php">
      <h2>Login</h2>
      <div class="form-group">
        <label for="username">Tên đăng nhập</label>
        <input type="text" id="username" name="username" placeholder="Nhập tên đăng nhập" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
      </div>
      <button type="submit" class="login-button">Đăng nhập</button>
      <div class="register-link">
        Chưa có tài khoản? <a href="../register/register.php">Đăng ký ngay</a>.
      </div>
    </form>
  </div>
</body>
</html>
