<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khôi Phục Tài Khoản</title>
    
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
        }

        .container {
            max-width: 400px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 1.5rem;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        label {
            color: #333;
            font-weight: bold;
        }

        input {
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        .input-group {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .input-group select {
            width: 30%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .input-group input {
            width: 70%;
        }

        button {
            background-color: #3498db;
            color: white;
            padding: 0.8rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;
        }

        .back-link {
            text-align: center;
            margin-top: 1rem;
        }

        .back-link a {
            color: #3498db;
            text-decoration: none;
        }

        .reset-method {
            display: flex;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .reset-method label {
            margin: 0 1rem;
            display: flex;
            align-items: center;
        }

        .reset-method input[type="radio"] {
            margin-right: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Khôi Phục Tài Khoản</h1>
        <form action="xuly_quenmatkhau.php" method="POST">
            <div class="reset-method">
                <label>
                    <input type="radio" name="reset_method" value="email" checked>
                    Khôi Phục Qua Email
                </label>
                <label>
                    <input type="radio" name="reset_method" value="phone">
                    Khôi Phục Qua SĐT
                </label>
            </div>

            <div id="email-section">
                <label for="email">Email Đăng Ký:</label>
                <input type="email" id="email" name="email" 
                       placeholder="Nhập email của bạn">
            </div>

            <div id="phone-section" style="display:none;">
                <label>Số Điện Thoại:</label>
                <div class="input-group">
                    <select name="phone_code">
                        <option value="+84">+84 (VN)</option>
                        <option value="+1">+1 (US)</option>
                        <option value="+86">+86 (CN)</option>
                        <option value="+81">+81 (JP)</option>
                    </select>
                    <input type="tel" name="phone" 
                           placeholder="Nhập số điện thoại" 
                           pattern="[0-9]{9,11}"
                           title="Nhập 9-11 chữ số">
                </div>
            </div>
            
            <button type="submit">Khôi Phục Mật Khẩu</button>
        </form>

        <div class="back-link">
            <a href="login.php">Quay Lại Đăng Nhập</a>
        </div>
    </div>

    <script>
        // Xử lý chuyển đổi phương thức khôi phục
        const emailRadio = document.querySelector('input[value="email"]');
        const phoneRadio = document.querySelector('input[value="phone"]');
        const emailSection = document.getElementById('email-section');
        const phoneSection = document.getElementById('phone-section');

        // Nhập email
        emailRadio.addEventListener('change', () => {
            emailSection.style.display = 'block';
            phoneSection.style.display = 'none';
            // Loại bỏ yêu cầu bắt buộc ở trường không dùng
            document.querySelector('select[name="phone_code"]').removeAttribute('required');
            document.querySelector('input[name="phone"]').removeAttribute('required');
            document.querySelector('input[name="email"]').setAttribute('required', 'required');
        });

        // Nhập số điện thoại
        phoneRadio.addEventListener('change', () => {
            emailSection.style.display = 'none';
            phoneSection.style.display = 'block';
            // Loại bỏ yêu cầu bắt buộc ở trường không dùng
            document.querySelector('input[name="email"]').removeAttribute('required');
            document.querySelector('select[name="phone_code"]').setAttribute('required', 'required');
            document.querySelector('input[name="phone"]').setAttribute('required', 'required');
        });
    </script>
</body>
</html>