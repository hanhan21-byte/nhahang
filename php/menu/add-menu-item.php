<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Món Mới</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }

        .container {
            width: 90%;
            max-width: 600px;
            margin: 20px auto;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #007bff;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input,
        select,
        textarea {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            width: 100%;
        }

        button {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .back-btn {
            display: inline-block;
            margin-bottom: 15px;
            color: #007bff;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s;
        }

        .back-btn:hover {
            color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Thêm Món Mới</h1>
        <a href="menu.php" class="back-btn">&larr; Quay lại</a>
        <form action="process-add-menu-item.php" method="post">
            <label for="name">Tên món</label>
            <input type="text" id="name" name="name" placeholder="Nhập tên món" required>

            <label for="description">Mô tả</label>
            <textarea id="description" name="description" placeholder="Nhập mô tả món" rows="4" required></textarea>

            <label for="price">Giá</label>
            <input type="text" id="price" name="price" placeholder="Nhập giá món (VND)" required oninput="validatePrice()">
            <p id="price-error" style="color: red; font-size: 14px; display: none;">Vui lòng nhập giá hợp lệ (chỉ gồm số và ký tự `,`).</p>

            <script>
                function validatePrice() {
                    const priceInput = document.getElementById("price");
                    const errorElement = document.getElementById("price-error");
                    const regex = /^[0-9,]*$/; // Chỉ cho phép số và dấu phẩy

                    if (!regex.test(priceInput.value)) {
                        errorElement.style.display = "block";
                    } else {
                        errorElement.style.display = "none";
                    }
                }
            </script>

            <label for="category">Loại món</label>
            <select id="category" name="category" required>
                <option value="">-- Chọn loại món --</option>
                <option value="Món Chính">Món Chính</option>
                <option value="Món Khai Vị">Món Khai Vị</option>
                <option value="Món Tráng Miệng">Món Tráng Miệng</option>
                <option value="Món Hải Sản">Món Hải Sản</option>
            </select>

            <button type="submit">Thêm Món</button>
        </form>
    </div>
</body>

</html>
