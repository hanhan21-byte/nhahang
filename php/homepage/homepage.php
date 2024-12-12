<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang Chủ - Nhà Hàng</title>
  <style>
    body {
  margin: 0;
  font-family: 'Roboto', sans-serif;
  background-color: #f7f9fc;
  color: #333;
}

.banner {
  width: 100%;
  height: 450px;
  background-image: url('banner.jpg'); /* Đường dẫn ảnh banner */
  background-size: cover;
  background-position: center;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
  color: #fff;
  box-shadow: inset 0 0 0 2000px rgba(0, 0, 0, 0.5);
}

.banner h1 {
  font-size: 50px;
  font-weight: bold;
  margin: 0;
  text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
}

.banner p {
  font-size: 20px;
  margin: 15px 0 0;
  text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
}

.content {
  padding: 40px 20px;
}

.section {
  margin-bottom: 60px;
}

.section h2 {
  font-size: 28px;
  margin-bottom: 20px;
  border-bottom: 3px solid #007bff;
  display: inline-block;
  padding-bottom: 8px;
  color: #007bff;
}

.section p {
  font-size: 16px;
  line-height: 1.6;
}

.grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 30px;
}

.card {
  background-color: #fff;
  border-radius: 12px;
  box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  transition: all 0.3s ease;
}

.card img {
  width: 100%;
  height: 200px;
  object-fit: cover;
}

.card h3 {
  margin: 15px;
  font-size: 22px;
  color: #333;
}

.card p {
  margin: 15px;
  font-size: 14px;
  color: #666;
}

.card:hover {
  transform: scale(1.05);
  box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
}

footer {
  background-color: #007bff;
  color: #fff;
  text-align: center;
  padding: 20px;
}

footer p {
  margin: 0;
  font-size: 14px;
}

  </style>
</head>
<body>
  <!-- Header -->
  <div id="header"></div>

  <?php include '../navbar/navbar.php'; ?>


  <!-- Banner -->
  <div class="banner">
    <div>
      <h1>Chào mừng đến với Nhà Hàng!</h1>
      <p>Trải nghiệm ẩm thực tuyệt vời với chúng tôi</p>
    </div>
  </div>

  <!-- Nội dung chính -->
  <div class="content">
    <!-- Phần giới thiệu -->
    <div class="section">
      <h2>Giới Thiệu</h2>
      <p>Chúng tôi tự hào mang đến cho bạn những món ăn ngon nhất, phục vụ chuyên nghiệp và không gian ấm cúng. Nhà hàng chúng tôi luôn sẵn sàng phục vụ bạn và gia đình.</p>
    </div>

    <!-- Phần món ăn nổi bật -->
    <div class="section">
      <h2>Món Ăn Nổi Bật</h2>
      <div class="grid">
        <div class="card">
          <img src="mon1.jpg" alt="Món 1">
          <h3>Gà Nướng Mật Ong</h3>
          <p>Hương vị thơm ngon, hấp dẫn.</p>
        </div>
        <div class="card">
          <img src="mon2.jpg" alt="Món 2">
          <h3>Bò Bít Tết</h3>
          <p>Thịt bò mềm, đậm đà.</p>
        </div>
        <div class="card">
          <img src="mon3.jpg" alt="Món 3">
          <h3>Hải Sản Tổng Hợp</h3>
          <p>Tươi ngon từ biển cả.</p>
        </div>
      </div>
    </div>

    <!-- Phần liên hệ -->
    <div class="section">
      <h2>Liên Hệ</h2>
      <p>Địa chỉ: 123 Đường ABC, Thành phố XYZ</p>
      <p>Hotline: 0123 456 789</p>
      <p>Email: lienhe@nhahang.com</p>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    <p>&copy; 2024 Nhà Hàng. All rights reserved.</p>
  </footer>
</body>
</html>
