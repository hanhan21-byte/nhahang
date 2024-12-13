<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doanh Thu</title>
    <style>
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

        header {
            width: 100%;
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

        h2 {
            color: #ff6f61;
            margin-bottom: 20px;
        }

        .filter-section {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .filter-section label, .filter-section select, .filter-section input, .filter-section button {
            margin: 5px;
            padding: 8px;
        }

        .filter-section button {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .revenue-summary {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .summary-card {
            background: linear-gradient(135deg, #ff6f61, #ff8a65);
            color: white;
            padding: 20px;
            border-radius: 8px;
            width: 30%;
            text-align: center;
        }

        .summary-card h3 {
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #ff6f61;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        button {
            padding: 8px 12px;
            margin: 2px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: white;
        }

        .view-btn {
            background-color: #2196F3;
        }

        .export-btn {
            background-color: #4CAF50;
        }

        @media (max-width: 768px) {
            .revenue-summary {
                flex-direction: column;
            }

            .summary-card {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Doanh Thu</h1>
    </header>

    <?php include '../navbar/navbar.php'; ?>

    <div class="container">
        <h2>Thống Kê Doanh Thu</h2>
        
        <div class="filter-section">
            <label>Xem theo:</label>
            <select id="timeFilter">
                <option value="day">Hôm nay</option>
                <option value="week">Tuần này</option>
                <option value="month">Tháng này</option>
                <option value="year">Năm này</option>
            </select>
            
            <label>Từ ngày:</label>
            <input type="date" id="startDate">
            
            <label>Đến ngày:</label>
            <input type="date" id="endDate">
            
            <button onclick="filterRevenue()">Lọc</button>
        </div>

        <div class="revenue-summary">
            <div class="summary-card">
                <h3>Tổng Doanh Thu</h3>
                <p>15,000,000 VNĐ</p>
            </div>
            <div class="summary-card">
                <h3>Số Đơn Hàng</h3>
                <p>150</p>
            </div>
            <div class="summary-card">
                <h3>Trung Bình/Đơn</h3>
                <p>100,000 VNĐ</p>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Ngày</th>
                    <th>Số Đơn Hàng</th>
                    <th>Doanh Thu</th>
                    <th>Chi Phí</th>
                    <th>Lợi Nhuận</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>05/11/2024</td>
                    <td>45</td>
                    <td>4,500,000 VNĐ</td>
                    <td>2,000,000 VNĐ</td>
                    <td>2,500,000 VNĐ</td>
                    <td>
                        <button class="view-btn" onclick="viewDetails()">Chi tiết</button>
                        <button class="export-btn" onclick="exportReport()">Xuất báo cáo</button>
                    </td>
                </tr>
                <tr>
                    <td>04/11/2024</td>
                    <td>52</td>
                    <td>5,200,000 VNĐ</td>
                    <td>2,300,000 VNĐ</td>
                    <td>2,900,000 VNĐ</td>
                    <td>
                        <button class="view-btn" onclick="viewDetails()">Chi tiết</button>
                        <button class="export-btn" onclick="exportReport()">Xuất báo cáo</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
    function filterRevenue() {
        const timeFilter = document.getElementById('timeFilter').value;
        const startDate = document.getElementById('startDate').value;
        const endDate = document.getElementById('endDate').value;
        
        alert('Đang lọc doanh thu từ ' + startDate + ' đến ' + endDate);
    }

    function viewDetails() {
        alert('Xem chi tiết doanh thu');
    }

    function exportReport() {
        alert('Xuất báo cáo doanh thu');
    }
    </script>
</body>
</html>