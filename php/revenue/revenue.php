<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doanh Thu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Doanh Thu</h1>
</header>

<?php include '../navbar/navbar.php'; ?>

<div class="container">
    <h2>Thống Kê Doanh Thu</h2>
    
    <!-- Bộ lọc thời gian -->
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
        
        <button onclick="filterRevenue()" style="background-color: #4CAF50;">Lọc</button>
    </div>

    <!-- Tổng quan doanh thu -->
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

    <!-- Bảng chi tiết doanh thu -->
    <table>
        <tr>
            <th>Ngày</th>
            <th>Số Đơn Hàng</th>
            <th>Doanh Thu</th>
            <th>Chi Phí</th>
            <th>Lợi Nhuận</th>
            <th>Thao Tác</th>
        </tr>
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
    </table>
</div>

<style>
   body {
    margin: 0;
    font-family: 'Roboto', sans-serif;
    background-color: #f7f9fc;
    color: #333;
}

header {
    background-color: #007bff;
    color: white;
    text-align: center;
    padding: 20px 0;
}

h1 {
    margin: 0;
    font-size: 30px;
    font-weight: 500;
}

.container {
    padding: 20px;
}

h2 {
    font-size: 24px;
    color: #007bff;
    margin-bottom: 20px;
    border-bottom: 2px solid #007bff;
    padding-bottom: 10px;
}

.filter-section {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

.filter-section label {
    margin-right: 10px;
    font-size: 16px;
}

.filter-section select, .filter-section input {
    padding: 10px;
    margin: 5px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.filter-section button {
    padding: 10px 15px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.filter-section button:hover {
    background-color: #45a049;
}

.revenue-summary {
    display: flex;
    justify-content: space-between;
    margin-bottom: 30px;
}

.summary-card {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 32%;
    text-align: center;
}

.summary-card h3 {
    font-size: 20px;
    margin-bottom: 10px;
    color: #007bff;
}

.summary-card p {
    font-size: 18px;
    font-weight: bold;
    color: #333;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 30px;
}

table th, table td {
    padding: 15px;
    text-align: left;
    border: 1px solid #ddd;
}

table thead {
    background-color: #007bff;
    color: white;
}

table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tbody tr:hover {
    background-color: #f1f1f1;
}

table th {
    font-size: 16px;
}

table td {
    font-size: 14px;
}

button {
    padding: 8px 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin: 5px;
}

button:hover {
    opacity: 0.9;
}

button.view-btn {
    background-color: #ffc107;
    color: white;
}

button.view-btn:hover {
    background-color: #e0a800;
}

button.export-btn {
    background-color: #28a745;
    color: white;
}

button.export-btn:hover {
    background-color: #218838;
}

footer {
    background-color: #007bff;
    color: white;
    text-align: center;
    padding: 20px;
    position: absolute;
    width: 100%;
    bottom: 0;
}

footer p {
    margin: 0;
    font-size: 14px;
}


  </style>

<script>
function filterRevenue() {
    const timeFilter = document.getElementById('timeFilter').value;
    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;
    
    // Xử lý lọc doanh thu theo thời gian
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