<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Đơn Hàng</title>
    <style>
        /* General Styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f9fbfd;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container {
            max-width: 900px;
            margin: 20px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* Header */
        header {
            width: 100%;
            background: linear-gradient(135deg, #3f51b5, #5c6bc0);
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

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        table th {
            background-color: #3f51b5;
            color: white;
            font-weight: bold;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Button Styles */
        button {
            padding: 8px 12px;
            margin: 0 5px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        button:hover {
            opacity: 0.8;
        }

        .edit-btn {
            background-color:rgba(36, 255, 7, 0.77);
            color: #333;
        }

        .delete-btn {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>

    <header>
        <h1>Quản Lý Đơn Hàng</h1>
    </header>
    <?php include '../navbar/navbar.php'; ?>

    <div class="container">
        <h2>Danh Sách Đơn Hàng</h2>
        <table>
            <thead>
                <tr>
                    <th>Mã Đơn Hàng</th>
                    <th>Ngày đặt hàng</th>
                    <th>Tổng Tiền</th>
                    <th>Trạng thái</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#001</td>
                    <td>2024-12-13</td>
                    <td>1,000,000 VND</td>
                    <td>Chờ xử lý</td>
                    <td>
                        <button class="edit-btn" onclick="editOrder(1)">Chỉnh sửa</button>
                        <button class="delete-btn" onclick="confirmDelete(1)">Xóa</button>
                    </td>
                </tr>
                <tr>
                    <td>#002</td>
                    <td>2024-12-12</td>
                    <td>2,000,000 VND</td>
                    <td>Hoàn thành</td>
                    <td>
                        <button class="edit-btn" onclick="editOrder(2)">Chỉnh sửa</button>
                        <button class="delete-btn" onclick="confirmDelete(2)">Xóa</button>
                    </td>
                </tr>
                <tr>
                    <td>#003</td>
                    <td>2024-12-10</td>
                    <td>500,000 VND</td>
                    <td>Đã hủy</td>
                    <td>
                        <button class="edit-btn" onclick="editOrder(3)">Chỉnh sửa</button>
                        <button class="delete-btn" onclick="confirmDelete(3)">Xóa</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        function editOrder(id) {
            alert('Chỉnh sửa đơn hàng #' + id);
            // Implement edit functionality here
        }

        function confirmDelete(id) {
            if (confirm("Bạn có chắc chắn muốn xóa đơn hàng #" + id + " không?")) {
                alert("Đơn hàng #" + id + " đã được xóa!");
                // Implement delete functionality here
            }
        }
    </script>
</body>
</html> 