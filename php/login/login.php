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
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        background: linear-gradient(120deg, #3498db, #8e44ad);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    header {
        text-align: center;
        margin-bottom: 2rem;
    }

    header h1 {
        color: white;
        font-size: 2rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }

    .container {
        width: 100%;
        max-width: 400px;
        background: white;
        border-radius: 10px;
        padding: 2rem;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    label {
        font-weight: bold;
        color: #333;
    }

    input {
        width: 100%;
        padding: 0.8rem;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 1rem;
        transition: border-color 0.3s ease;
    }

    input:focus {
        outline: none;
        border-color: #3498db;
        box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
    }

    button {
        background-color: #3498db;
        color: white;
        padding: 0.8rem;
        border: none;
        border-radius: 4px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #2980b9;
    }

    p {
        text-align: center;
        margin-top: 1rem;
        font-size: 0.9rem;
    }

    p a {
        color: #3498db;
        text-decoration: none;
    }

    p a:hover {
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
    </form>
    </form>
    <p>Quên mật khẩu? <a href="../login/xuly-quenmatkhau.php">Quên tên đăng nhập hoặc mật khẩu</a></p>
  </div>
</body>
</html>
