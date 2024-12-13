<?php
// Kết nối cơ sở dữ liệu
include('../connect.php');

// Truy vấn lấy danh sách các món ăn từ cơ sở dữ liệu
$sql = "SELECT * FROM menu_items";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thực Đơn</title>
    <style>
        /* General Styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f8fb;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Header */
        header {
            background: linear-gradient(135deg, #ff6f61, #ff8a65);
            color: white;
            padding: 20px 0;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        header h1 {
            margin: 0;
            font-size: 2.5em;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #ff6f61;
            color: white;
        }

        /* Buttons */
        .add-btn, .action-btn {
            display: inline-block;
            padding: 10px 15px;
            margin: 10px 0;
            border: none;
            border-radius: 4px;
            color: white;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .add-btn {
            background-color: #4CAF50;
        }

        .edit-btn {
            background-color: #2196F3;
        }

        .delete-btn {
            background-color: #f44336;
        }

        .add-btn:hover, .action-btn:hover {
            opacity: 0.9;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            table, th, td {
                font-size: 0.9em;
            }

            .action-btn {
                padding: 8px 12px;
                font-size: 0.8em;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Thực Đơn</h1>
    </header>

    <?php include '../navbar/navbar.php'; ?>

    <div class="container">
        <a href="add-menu-item.php" class="add-btn">Thêm món mới</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên món</th>
                    <th>Mô tả</th>
                    <th>Giá</th>
                    <th>Loại món</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $formatted_price = number_format($row['price'], 0, ',', '.');
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['description']}</td>
                                <td>{$formatted_price} VND</td>
                                <td>{$row['category']}</td>
                                <td>
                                    <a href='edit-menu-item.php?id={$row['id']}' class='action-btn edit-btn'>Sửa</a>
                                    <a href='delete-menu-item.php?id={$row['id']}' class='action-btn delete-btn' onclick='return confirm(\"Bạn có chắc muốn xóa món này không?\")'>Xóa</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Không có món ăn nào trong thực đơn.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>