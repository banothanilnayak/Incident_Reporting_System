<?php
session_start();
if ($_SESSION['role'] !== 'Admin') {
    echo "<div class='alert alert-danger text-center m-5'>Access Denied</div>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Incident Charts</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        canvas {
            max-width: 100%;
            height: auto;
        }

        #incidentsChart {
            width: 200px !important;
            height: 200px !important;
        }

        #categoryChart {
            width: 300px !important;
            height: 300px !important;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Incident Dashboard</h2>

        <!-- Incident Status Pie Chart -->
        <div class="card mb-4">
            <div class="card-header">
                <h5>Incident Status</h5>
            </div>
            <div class="card-body text-center">
                <canvas id="incidentsChart" width="200px" height="200px"></canvas>
            </div>
        </div>

        <!-- Incident Category Bar Chart -->
        <div class="card mb-4">
            <div class="card-header">
                <h5>Incident Categories</h5>
            </div>
            <div class="card-body text-center">
                <canvas id="categoryChart" width="200" height="200"></canvas>
            </div>
        </div>
    </div>

    <!-- Custom JS to render charts -->
    <script src="dashboard_charts.js"></script>
</body>

</html>