<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Đơn Hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            background: white;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        table th {
            background-color: #007bff;
            color: white;
        }

        .status-pending {
            color: orange;
            font-weight: bold;
        }

        .status-completed {
            color: green;
            font-weight: bold;
        }

        .status-cancelled {
            color: red;
            font-weight: bold;
        }

        .actions button {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .actions .edit-btn {
            background-color: #ffc107;
            color: white;
        }

        .actions .delete-btn {
            background-color: #dc3545;
            color: white;
        }

        .actions button:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
<?php include '../navbar/navbar.php'; ?>
    <div class="container">
        <h1>Danh Sách Đơn Hàng</h1>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ngày đặt hàng</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>ID Khách Hàng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2024-12-13</td>
                    <td>1,000,000 VND</td>
                    <td><span class="status-pending">Chờ xử lý</span></td>
                    <td>101</td>
                    <td class="actions">
                        <button class="edit-btn" onclick="alert('Sửa đơn hàng 1')">Sửa</button>
                        <button class="delete-btn" onclick="alert('Xóa đơn hàng 1')">Xóa</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>2024-12-12</td>
                    <td>2,000,000 VND</td>
                    <td><span class="status-completed">Hoàn thành</span></td>
                    <td>102</td>
                    <td class="actions">
                        <button class="edit-btn" onclick="alert('Sửa đơn hàng 2')">Sửa</button>
                        <button class="delete-btn" onclick="alert('Xóa đơn hàng 2')">Xóa</button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>2024-12-10</td>
                    <td>500,000 VND</td>
                    <td><span class="status-cancelled">Đã hủy</span></td>
                    <td>103</td>
                    <td class="actions">
                        <button class="edit-btn" onclick="alert('Sửa đơn hàng 3')">Sửa</button>
                        <button class="delete-btn" onclick="alert('Xóa đơn hàng 3')">Xóa</button>
                    </td>
                </tr>
                <!-- Các đơn hàng khác có thể thêm vào ở đây -->
            </tbody>
        </table>
    </div>
</body>
</html>
