<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AgriDash - Farm Management Dashboard</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <!-- Google Font (Inter) -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f0f5ee;
            display: flex;
            min-height: 100vh;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: 260px;
            background: #1a3a2b;
            padding: 2rem 1.5rem;
            display: flex;
            flex-direction: column;
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
            flex-shrink: 0;
            box-shadow: 2px 0 20px rgba(0, 20, 10, 0.15);
        }

        .sidebar .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 2.5rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .sidebar .logo i {
            color: #7cb342;
            font-size: 1.8rem;
        }

        .sidebar nav {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
            flex: 1;
        }

        .sidebar nav a {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            border-radius: 10px;
            color: #a8c9b8;
            text-decoration: none;
            font-weight: 500;
            transition: 0.2s;
            font-size: 0.95rem;
        }

        .sidebar nav a i {
            width: 20px;
            font-size: 1.1rem;
            text-align: center;
        }

        .sidebar nav a:hover {
            background: rgba(124, 179, 66, 0.15);
            color: #ffffff;
        }

        .sidebar nav a.active {
            background: #7cb342;
            color: #ffffff;
            box-shadow: 0 4px 15px rgba(124, 179, 66, 0.3);
        }

        .sidebar .bottom-links {
            margin-top: auto;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding-top: 1rem;
        }

        .sidebar .bottom-links a {
            color: #a8c9b8;
        }

        /* ===== MAIN CONTENT ===== */
        .main {
            flex: 1;
            padding: 1.5rem 2rem 2rem 2rem;
            min-width: 0;
        }

        /* TOP BAR */
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .topbar h1 {
            font-size: 1.8rem;
            font-weight: 600;
            color: #1a3a2b;
        }

        .topbar h1 span {
            font-weight: 400;
            font-size: 0.9rem;
            color: #5a7a6a;
            margin-left: 0.5rem;
        }

        .topbar .right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .topbar .search-box {
            background: #fff;
            border-radius: 30px;
            padding: 0.4rem 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            border: 1px solid #dce8e0;
        }

        .topbar .search-box input {
            border: none;
            outline: none;
            padding: 0.4rem 0;
            font-size: 0.9rem;
            background: transparent;
            width: 160px;
        }

        .topbar .search-box i {
            color: #6a8a7a;
        }

        .topbar .weather-widget {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: #fff;
            padding: 0.3rem 1rem 0.3rem 0.8rem;
            border-radius: 30px;
            border: 1px solid #dce8e0;
            font-size: 0.9rem;
            font-weight: 500;
            color: #1a3a2b;
        }

        .topbar .weather-widget i {
            color: #f9a825;
            font-size: 1.2rem;
        }

        .topbar .avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: #7cb342;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 1.2rem;
            cursor: pointer;
        }

        /* ===== STATS CARDS ===== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2.5rem;
        }

        .stat-card {
            background: #fff;
            padding: 1.5rem 1.2rem;
            border-radius: 18px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.03);
            border: 1px solid #e4ede7;
            transition: 0.2s;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 28px -8px rgba(0, 40, 20, 0.08);
        }

        .stat-card .icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            margin-bottom: 0.8rem;
        }

        .stat-card .icon.green {
            background: #e8f5e9;
            color: #43a047;
        }

        .stat-card .icon.blue {
            background: #e3f0fc;
            color: #1a73e8;
        }

        .stat-card .icon.orange {
            background: #fff3e0;
            color: #ef6c00;
        }

        .stat-card .icon.purple {
            background: #f3e5f5;
            color: #7b1fa2;
        }

        .stat-card .label {
            color: #5a7a6a;
            font-weight: 500;
            font-size: 0.85rem;
            letter-spacing: 0.3px;
        }

        .stat-card .value {
            font-size: 1.8rem;
            font-weight: 700;
            color: #1a3a2b;
            margin-top: 0.2rem;
        }

        .stat-card .change {
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            font-size: 0.75rem;
            font-weight: 600;
            margin-top: 0.4rem;
            padding: 0.15rem 0.6rem;
            border-radius: 30px;
        }

        .stat-card .change.up {
            color: #2e7d32;
            background: #e8f5e9;
        }

        .stat-card .change.down {
            color: #c62828;
            background: #ffebee;
        }

        /* ===== CHARTS ROW ===== */
        .charts-row {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 1.5rem;
            margin-bottom: 2.5rem;
        }

        .chart-box {
            background: #fff;
            border-radius: 18px;
            padding: 1.5rem 1.5rem 1rem 1.5rem;
            border: 1px solid #e4ede7;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02);
        }

        .chart-box h3 {
            font-size: 0.95rem;
            font-weight: 600;
            color: #1a3a2b;
            margin-bottom: 0.75rem;
        }

        .chart-box h3 i {
            color: #7cb342;
            margin-right: 6px;
        }

        .chart-box canvas {
            width: 100% !important;
            height: auto !important;
            max-height: 200px;
        }

        /* ===== BOTTOM ROW ===== */
        .bottom-row {
            display: grid;
            grid-template-columns: 1.4fr 1fr;
            gap: 1.5rem;
        }

        /* ===== FIELD ACTIVITY TABLE ===== */
        .field-section {
            background: #fff;
            border-radius: 18px;
            padding: 1.5rem;
            border: 1px solid #e4ede7;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02);
        }

        .field-section .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            flex-wrap: wrap;
        }

        .field-section .header h3 {
            font-weight: 600;
            color: #1a3a2b;
            font-size: 1rem;
        }

        .field-section .header a {
            color: #7cb342;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.85rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.85rem;
        }

        table th {
            text-align: left;
            padding: 0.5rem 0.3rem 0.5rem 0;
            color: #5a7a6a;
            font-weight: 500;
            border-bottom: 1px solid #eef3ea;
        }

        table td {
            padding: 0.6rem 0.3rem 0.6rem 0;
            border-bottom: 1px solid #f3f7f2;
            color: #1a3a2b;
        }

        table tr:last-child td {
            border-bottom: none;
        }

        .badge {
            padding: 0.2rem 0.7rem;
            border-radius: 30px;
            font-size: 0.7rem;
            font-weight: 600;
            display: inline-block;
        }

        .badge.healthy {
            background: #e8f5e9;
            color: #2e7d32;
        }

        .badge.warning {
            background: #fff3e0;
            color: #e65100;
        }

        .badge.critical {
            background: #ffebee;
            color: #c62828;
        }

        .badge.good {
            background: #e3f2fd;
            color: #0d47a1;
        }

        /* ===== WEATHER / ALERTS ===== */
        .alerts-section {
            background: #fff;
            border-radius: 18px;
            padding: 1.5rem;
            border: 1px solid #e4ede7;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02);
        }

        .alerts-section h3 {
            font-weight: 600;
            color: #1a3a2b;
            font-size: 1rem;
            margin-bottom: 1rem;
        }

        .alerts-section h3 i {
            color: #f9a825;
            margin-right: 6px;
        }

        .alert-item {
            display: flex;
            align-items: flex-start;
            gap: 0.8rem;
            padding: 0.8rem 0;
            border-bottom: 1px solid #f3f7f2;
        }

        .alert-item:last-child {
            border-bottom: none;
        }

        .alert-item .alert-icon {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            flex-shrink: 0;
        }

        .alert-item .alert-icon.red {
            background: #ffebee;
            color: #c62828;
        }

        .alert-item .alert-icon.yellow {
            background: #fff8e1;
            color: #f57f17;
        }

        .alert-item .alert-icon.blue {
            background: #e3f2fd;
            color: #0d47a1;
        }

        .alert-item .alert-content {
            flex: 1;
        }

        .alert-item .alert-content .title {
            font-weight: 600;
            font-size: 0.9rem;
            color: #1a3a2b;
        }

        .alert-item .alert-content .desc {
            font-size: 0.8rem;
            color: #5a7a6a;
            margin-top: 0.1rem;
        }

        .alert-item .alert-content .time {
            font-size: 0.7rem;
            color: #8a9a8a;
            margin-top: 0.2rem;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 1024px) {
            .charts-row {
                grid-template-columns: 1fr;
            }

            .bottom-row {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 80px;
                padding: 1rem 0.5rem;
                align-items: center;
            }

            .sidebar .logo span {
                display: none;
            }

            .sidebar .logo {
                font-size: 1.6rem;
                justify-content: center;
            }

            .sidebar nav a span {
                display: none;
            }

            .sidebar nav a {
                justify-content: center;
                padding: 0.75rem;
            }

            .sidebar .bottom-links a span {
                display: none;
            }

            .topbar .search-box input {
                width: 100px;
            }

            .topbar h1 {
                font-size: 1.3rem;
            }

            .topbar .weather-widget span {
                display: none;
            }

            .stats-grid {
                grid-template-columns: 1fr 1fr;
            }

            .main {
                padding: 1rem;
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .topbar .search-box input {
                width: 80px;
            }
        }

        .sidebar::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: #3a6a4a;
            border-radius: 10px;
        }
    </style>
</head>

<body>

    <!-- ========== SIDEBAR ========== -->
    <aside class="sidebar">
        <div class="logo">
            <i class="fas fa-seedling"></i>
            <span>AgriDash</span>
        </div>
        <nav>
            <a href="/admin/dashboard" class="active"><i class="fas fa-th-large"></i><span>Dashboard</span></a>
            <a href="/admin/categories"><i class="fas fa-tractor"></i><span>Categories</span></a>
            <a href="/admin/crop"><i class="fas fa-chart-line"></i><span>Crop </span></a>
          <a href="#"><i class="fas fa-users"></i><span>Users</span></a>

            <a href="#"><i class="fas fa-cog"></i><span>Settings</span></a>
        </nav>
        <div class="bottom-links">

            <a href="/logout"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
        </div>
    </aside>

    <!-- ========== MAIN ========== -->
    @yield('admincontent')

    <!-- ===== CHARTS.JS ===== -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js">
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#cropTable').DataTable({
                responsive: true,
                pageLength: 10,
                ordering: true,
                searching: true,
                lengthMenu: [10, 25, 50, 100]
            });
        });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        // ===== BAR CHART: Yield by Field =====
        const yieldCtx = document.getElementById('yieldChart').getContext('2d');
        new Chart(yieldCtx, {
            type: 'bar',
            data: {
                labels: ['North', 'East', 'South', 'West', 'River'],
                datasets: [{
                    label: 'Estimated Yield (tons)',
                    data: [6.2, 4.8, 3.1, 5.4, 2.9],
                    backgroundColor: ['#66bb6a', '#81c784', '#a5d6a7', '#c8e6c9', '#e8f5e9'],
                    borderRadius: 6,
                    barPercentage: 0.7,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: 'rgba(0,0,0,0.04)' },
                        ticks: { callback: v => v + 't' }
                    },
                    x: {
                        grid: { display: false }
                    }
                }
            }
        });

        // ===== PIE CHART: Crop Distribution =====
        const pieCtx = document.getElementById('cropPieChart').getContext('2d');
        new Chart(pieCtx, {
            type: 'doughnut',
            data: {
                labels: ['Corn', 'Wheat', 'Soybeans', 'Alfalfa', 'Rice'],
                datasets: [{
                    data: [28, 22, 18, 20, 12],
                    backgroundColor: ['#66bb6a', '#81c784', '#a5d6a7', '#c8e6c9', '#e8f5e9'],
                    borderWidth: 2,
                    borderColor: '#ffffff',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                cutout: '68%',
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 10,
                            padding: 10,
                            font: { size: 10 },
                            color: '#1a3a2b'
                        }
                    }
                }
            }
        });
    </script>

</body>

</html>