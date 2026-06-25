<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Dashboard</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet" />
    <style>
        /* ----- Reset & Base ----- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f4f6fb;
            color: #1e293b;
            display: flex;
            min-height: 100vh;
        }

        /* ----- Scrollbar ----- */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #e9edf4;
        }
        ::-webkit-scrollbar-thumb {
            background: #b0c0d4;
            border-radius: 8px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #8fa0b8;
        }

        /* ----- Sidebar ----- */
        .sidebar {
            width: 260px;
            background: #ffffff;
            border-right: 1px solid #e9edf4;
            padding: 28px 20px;
            display: flex;
            flex-direction: column;
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
            flex-shrink: 0;
            transition: transform 0.3s ease;
            z-index: 100;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 40px;
            padding-left: 4px;
        }

        .sidebar-brand .logo-icon {
            width: 42px;
            height: 42px;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 20px;
            font-weight: 700;
        }

        .sidebar-brand h1 {
            font-size: 20px;
            font-weight: 700;
            letter-spacing: -0.4px;
            color: #0f172a;
        }
        .sidebar-brand h1 span {
            color: #6366f1;
        }

        .sidebar-nav {
            display: flex;
            flex-direction: column;
            gap: 6px;
            flex: 1;
        }

        .sidebar-nav .nav-label {
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            color: #94a3b8;
            margin-top: 16px;
            margin-bottom: 6px;
            padding-left: 12px;
        }

        .sidebar-nav a {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 12px 16px;
            border-radius: 12px;
            color: #475569;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            transition: all 0.2s;
        }

        .sidebar-nav a i {
            width: 20px;
            font-size: 16px;
            text-align: center;
            color: #94a3b8;
            transition: color 0.2s;
        }

        .sidebar-nav a:hover {
            background: #f1f5f9;
            color: #0f172a;
        }
        .sidebar-nav a:hover i {
            color: #6366f1;
        }

        .sidebar-nav a.active {
            background: #eef2ff;
            color: #4f46e5;
            font-weight: 600;
        }
        .sidebar-nav a.active i {
            color: #4f46e5;
        }

        .sidebar-nav a .badge {
            margin-left: auto;
            background: #6366f1;
            color: #fff;
            font-size: 11px;
            font-weight: 600;
            padding: 2px 10px;
            border-radius: 20px;
        }

        .sidebar-footer {
            margin-top: auto;
            padding-top: 20px;
            border-top: 1px solid #e9edf4;
        }

        .sidebar-footer .user-card {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 4px;
            border-radius: 12px;
            cursor: pointer;
            transition: background 0.2s;
        }
        .sidebar-footer .user-card:hover {
            background: #f1f5f9;
        }

        .sidebar-footer .user-card .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #6366f1, #a78bfa);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 600;
            font-size: 16px;
            flex-shrink: 0;
        }

        .sidebar-footer .user-card .user-info {
            flex: 1;
        }
        .sidebar-footer .user-card .user-info .name {
            font-size: 14px;
            font-weight: 600;
            color: #0f172a;
        }
        .sidebar-footer .user-card .user-info .role {
            font-size: 12px;
            color: #94a3b8;
        }

        /* ----- Main Content ----- */
        .main {
            flex: 1;
            padding: 28px 32px 40px;
            min-width: 0;
        }

        /* ----- Top Bar ----- */
        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 32px;
            flex-wrap: wrap;
            gap: 16px;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .topbar-left .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 22px;
            color: #1e293b;
            cursor: pointer;
            padding: 4px;
        }

        .topbar-left h2 {
            font-size: 22px;
            font-weight: 700;
            letter-spacing: -0.3px;
        }
        .topbar-left h2 span {
            color: #6366f1;
        }
        .topbar-left p {
            font-size: 14px;
            color: #64748b;
            margin-top: 2px;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .topbar-right .search-box {
            display: flex;
            align-items: center;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 40px;
            padding: 6px 16px 6px 18px;
            gap: 10px;
            transition: border 0.2s, box-shadow 0.2s;
        }
        .topbar-right .search-box:focus-within {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.12);
        }
        .topbar-right .search-box i {
            color: #94a3b8;
            font-size: 14px;
        }
        .topbar-right .search-box input {
            border: none;
            outline: none;
            background: transparent;
            font-size: 14px;
            padding: 8px 0;
            width: 180px;
            font-family: 'Inter', sans-serif;
            color: #1e293b;
        }
        .topbar-right .search-box input::placeholder {
            color: #94a3b8;
        }

        .topbar-right .icon-btn {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #475569;
            font-size: 17px;
            cursor: pointer;
            transition: all 0.2s;
            position: relative;
        }
        .topbar-right .icon-btn:hover {
            background: #f1f5f9;
            border-color: #cbd5e1;
        }
        .topbar-right .icon-btn .dot {
            width: 8px;
            height: 8px;
            background: #ef4444;
            border-radius: 50%;
            position: absolute;
            top: 8px;
            right: 8px;
            border: 2px solid #fff;
        }

        /* ----- Stats Grid ----- */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 20px 22px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
            border: 1px solid #e9edf4;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
        }

        .stat-card .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 8px;
        }
        .stat-card .stat-top .stat-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }
        .stat-card .stat-top .stat-icon.blue {
            background: #eef2ff;
            color: #4f46e5;
        }
        .stat-card .stat-top .stat-icon.green {
            background: #dcfce7;
            color: #16a34a;
        }
        .stat-card .stat-top .stat-icon.purple {
            background: #f3e8ff;
            color: #9333ea;
        }
        .stat-card .stat-top .stat-icon.orange {
            background: #ffedd5;
            color: #ea580c;
        }

        .stat-card .stat-change {
            font-size: 12px;
            font-weight: 600;
            padding: 2px 10px;
            border-radius: 20px;
            background: #dcfce7;
            color: #16a34a;
        }
        .stat-card .stat-change.down {
            background: #fee2e2;
            color: #dc2626;
        }

        .stat-card .stat-value {
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -0.5px;
            color: #0f172a;
        }
        .stat-card .stat-label {
            font-size: 14px;
            color: #64748b;
            margin-top: 2px;
        }

        /* ----- Charts Row ----- */
        .charts-row {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
            margin-bottom: 32px;
        }

        .chart-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 22px 24px;
            border: 1px solid #e9edf4;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
        }

        .chart-card .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }
        .chart-card .card-header h3 {
            font-size: 16px;
            font-weight: 600;
        }
        .chart-card .card-header .chart-tabs {
            display: flex;
            gap: 4px;
        }
        .chart-card .card-header .chart-tabs button {
            background: none;
            border: none;
            font-size: 12px;
            font-weight: 500;
            padding: 4px 12px;
            border-radius: 20px;
            color: #64748b;
            cursor: pointer;
            transition: all 0.2s;
            font-family: 'Inter', sans-serif;
        }
        .chart-card .card-header .chart-tabs button.active {
            background: #eef2ff;
            color: #4f46e5;
        }
        .chart-card .card-header .chart-tabs button:hover:not(.active) {
            background: #f1f5f9;
        }

        /* ----- Bar Chart (CSS) ----- */
        .bar-chart {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            height: 150px;
            gap: 8px;
            padding-top: 8px;
        }
        .bar-chart .bar-item {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
        }
        .bar-chart .bar-item .bar {
            width: 100%;
            max-width: 36px;
            border-radius: 6px 6px 2px 2px;
            background: linear-gradient(180deg, #818cf8, #6366f1);
            min-height: 8px;
            transition: height 0.4s ease;
            position: relative;
        }
        .bar-chart .bar-item .bar.blue {
            background: linear-gradient(180deg, #818cf8, #6366f1);
        }
        .bar-chart .bar-item .bar.green {
            background: linear-gradient(180deg, #6ee7b7, #34d399);
        }
        .bar-chart .bar-item .bar-label {
            font-size: 11px;
            color: #94a3b8;
            font-weight: 500;
        }

        /* ----- Donut (CSS) ----- */
        .donut-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 24px;
            flex-wrap: wrap;
            padding: 8px 0;
        }
        .donut {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: conic-gradient(#6366f1 0% 65%, #e2e8f0 65% 100%);
            position: relative;
            flex-shrink: 0;
        }
        .donut::after {
            content: '65%';
            position: absolute;
            inset: 18px;
            border-radius: 50%;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            font-weight: 700;
            color: #0f172a;
        }
        .donut-legend {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        .donut-legend .legend-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 13px;
            color: #334155;
        }
        .donut-legend .legend-item .dot {
            width: 12px;
            height: 12px;
            border-radius: 4px;
            flex-shrink: 0;
        }
        .donut-legend .legend-item .dot.purple {
            background: #6366f1;
        }
        .donut-legend .legend-item .dot.gray {
            background: #e2e8f0;
        }

        /* ----- Recent Activity & Tasks (two columns) ----- */
        .bottom-row {
            display: grid;
            grid-template-columns: 1.4fr 1fr;
            gap: 20px;
        }

        .activity-card,
        .tasks-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 22px 24px;
            border: 1px solid #e9edf4;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
        }

        .activity-card .card-header,
        .tasks-card .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }
        .activity-card .card-header h3,
        .tasks-card .card-header h3 {
            font-size: 16px;
            font-weight: 600;
        }
        .activity-card .card-header a,
        .tasks-card .card-header a {
            font-size: 13px;
            color: #6366f1;
            text-decoration: none;
            font-weight: 500;
        }
        .activity-card .card-header a:hover,
        .tasks-card .card-header a:hover {
            text-decoration: underline;
        }

        /* Activity list */
        .activity-list {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }
        .activity-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding-bottom: 14px;
            border-bottom: 1px solid #f1f5f9;
        }
        .activity-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }
        .activity-item .act-icon {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
        }
        .activity-item .act-icon.blue {
            background: #eef2ff;
            color: #4f46e5;
        }
        .activity-item .act-icon.green {
            background: #dcfce7;
            color: #16a34a;
        }
        .activity-item .act-icon.orange {
            background: #ffedd5;
            color: #ea580c;
        }
        .activity-item .act-icon.pink {
            background: #fce7f3;
            color: #db2777;
        }

        .activity-item .act-content {
            flex: 1;
        }
        .activity-item .act-content .act-text {
            font-size: 14px;
            font-weight: 500;
            color: #0f172a;
        }
        .activity-item .act-content .act-text span {
            font-weight: 400;
            color: #475569;
        }
        .activity-item .act-content .act-time {
            font-size: 12px;
            color: #94a3b8;
            margin-top: 2px;
        }

        /* Tasks */
        .task-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 0;
            border-bottom: 1px solid #f1f5f9;
        }
        .task-item:last-child {
            border-bottom: none;
        }
        .task-item input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: #6366f1;
            cursor: pointer;
            flex-shrink: 0;
        }
        .task-item .task-label {
            flex: 1;
            font-size: 14px;
            color: #1e293b;
            transition: color 0.2s;
        }
        .task-item .task-label.done {
            text-decoration: line-through;
            color: #94a3b8;
        }
        .task-item .task-priority {
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
            padding: 2px 10px;
            border-radius: 20px;
            letter-spacing: 0.3px;
        }
        .task-item .task-priority.high {
            background: #fee2e2;
            color: #dc2626;
        }
        .task-item .task-priority.medium {
            background: #fef3c7;
            color: #d97706;
        }
        .task-item .task-priority.low {
            background: #dcfce7;
            color: #16a34a;
        }

        /* ----- Overlay (mobile) ----- */
        .overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.3);
            z-index: 50;
            backdrop-filter: blur(2px);
        }

        /* ----- Responsive ----- */
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
                position: fixed;
                top: 0;
                left: 0;
                transform: translateX(-100%);
                width: 280px;
                height: 100vh;
                border-right: none;
                box-shadow: 0 0 40px rgba(0, 0, 0, 0.1);
                z-index: 100;
            }
            .sidebar.open {
                transform: translateX(0);
            }
            .overlay.active {
                display: block;
            }

            .topbar-left .menu-toggle {
                display: block;
            }

            .main {
                padding: 20px 16px 32px;
            }

            .topbar-right .search-box input {
                width: 120px;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;
            }
            .stat-card .stat-value {
                font-size: 22px;
            }

            .donut-wrapper {
                flex-direction: column;
                align-items: center;
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
            .topbar-right .search-box input {
                width: 100px;
            }
            .topbar-right .search-box {
                padding: 4px 12px 4px 14px;
            }
            .topbar-right .icon-btn {
                width: 36px;
                height: 36px;
                font-size: 14px;
            }
            .stat-card {
                padding: 16px 18px;
            }
            .chart-card,
            .activity-card,
            .tasks-card {
                padding: 16px;
            }
        }
    </style>
</head>
<body>

    <!-- Overlay (mobile) -->
    <div class="overlay" id="overlay"></div>

    <!-- ===== SIDEBAR ===== -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <div class="logo-icon">D</div>
            <h1>Dash<span>board</span></h1>
        </div>

        <nav class="sidebar-nav">
            <div class="nav-label">Main</div>
            <a href="#" class="active"><i class="fas fa-th-large"></i> Overview</a>
            <a href="#"><i class="fas fa-chart-line"></i> Analytics</a>
            <a href="#"><i class="fas fa-users"></i> Team</a>
            <a href="#"><i class="fas fa-file-alt"></i> Projects</a>

            <div class="nav-label" style="margin-top:20px;">Workspace</div>
            <a href="#"><i class="fas fa-calendar-alt"></i> Calendar</a>
            <a href="#"><i class="fas fa-inbox"></i> Inbox <span class="badge">12</span></a>
            <a href="#"><i class="fas fa-tasks"></i> Tasks</a>
            <a href="#"><i class="fas fa-cog"></i> Settings</a>
        </nav>

        <div class="sidebar-footer">
            <div class="user-card">
                <div class="avatar">JD</div>
                <div class="user-info">
                    <div class="name">Jessica Davis</div>
                    <div class="role">Product Designer</div>
                </div>
                <i class="fas fa-ellipsis-v" style="color:#94a3b8; font-size:14px;"></i>
            </div>
        </div>
    </aside>

    <!-- ===== MAIN ===== -->
    <main class="main">

        <!-- TOP BAR -->
        <header class="topbar">
            <div class="topbar-left">
                <button class="menu-toggle" id="menuToggle" aria-label="Toggle sidebar">
                    <i class="fas fa-bars"></i>
                </button>
                <div>
                    <h2>Welcome back, <span>Jessica</span> 👋</h2>
                    <p>Here's what's happening with your projects today.</p>
                </div>
            </div>
            <div class="topbar-right">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search..." />
                </div>
                <button class="icon-btn" aria-label="Notifications">
                    <i class="fas fa-bell"></i>
                    <span class="dot"></span>
                </button>
                <button class="icon-btn" aria-label="Messages">
                    <i class="fas fa-envelope"></i>
                </button>
            </div>
        </header>

        <!-- STATS -->
        <section class="stats-grid">
            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon blue"><i class="fas fa-dollar-sign"></i></div>
                    <span class="stat-change"><i class="fas fa-arrow-up"></i> 12.5%</span>
                </div>
                <div class="stat-value">$48,295</div>
                <div class="stat-label">Total Revenue</div>
            </div>
            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon green"><i class="fas fa-shopping-cart"></i></div>
                    <span class="stat-change"><i class="fas fa-arrow-up"></i> 8.2%</span>
                </div>
                <div class="stat-value">3,284</div>
                <div class="stat-label">Orders</div>
            </div>
            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon purple"><i class="fas fa-users"></i></div>
                    <span class="stat-change down"><i class="fas fa-arrow-down"></i> 1.2%</span>
                </div>
                <div class="stat-value">1,429</div>
                <div class="stat-label">Active Users</div>
            </div>
            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon orange"><i class="fas fa-star"></i></div>
                    <span class="stat-change"><i class="fas fa-arrow-up"></i> 4.8%</span>
                </div>
                <div class="stat-value">94%</div>
                <div class="stat-label">Satisfaction</div>
            </div>
        </section>

        <!-- CHARTS ROW -->
        <section class="charts-row">
            <!-- Bar Chart -->
            <div class="chart-card">
                <div class="card-header">
                    <h3>Weekly Activity</h3>
                    <div class="chart-tabs">
                        <button class="active">Week</button>
                        <button>Month</button>
                    </div>
                </div>
                <div class="bar-chart" id="barChart">
                    <!-- bars will be injected by JS -->
                </div>
            </div>

            <!-- Donut / Distribution -->
            <div class="chart-card">
                <div class="card-header">
                    <h3>Task Distribution</h3>
                    <span style="font-size:13px; color:#94a3b8;">Completed</span>
                </div>
                <div class="donut-wrapper">
                    <div class="donut"></div>
                    <div class="donut-legend">
                        <div class="legend-item"><span class="dot purple"></span> Completed (65%)</div>
                        <div class="legend-item"><span class="dot gray"></span> Remaining (35%)</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- BOTTOM ROW: Activity + Tasks -->
        <section class="bottom-row">
            <!-- Recent Activity -->
            <div class="activity-card">
                <div class="card-header">
                    <h3>Recent Activity</h3>
                    <a href="#">View All</a>
                </div>
                <div class="activity-list" id="activityList">
                    <!-- injected by JS -->
                </div>
            </div>

            <!-- Tasks -->
            <div class="tasks-card">
                <div class="card-header">
                    <h3>Today's Tasks</h3>
                    <a href="#">+ Add</a>
                </div>
                <div id="taskList">
                    <!-- injected by JS -->
                </div>
            </div>
        </section>

    </main>

    <script>
        // ============================================================
        //  1. SIDEBAR TOGGLE (mobile)
        // ============================================================
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const menuToggle = document.getElementById('menuToggle');

        function toggleSidebar() {
            sidebar.classList.toggle('open');
            overlay.classList.toggle('active');
        }

        menuToggle.addEventListener('click', toggleSidebar);
        overlay.addEventListener('click', toggleSidebar);

        // Close sidebar on escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && sidebar.classList.contains('open')) {
                toggleSidebar();
            }
        });

        // ============================================================
        //  2. BAR CHART
        // ============================================================
        const barData = [
            { label: 'Mon', value: 42 },
            { label: 'Tue', value: 68 },
            { label: 'Wed', value: 54 },
            { label: 'Thu', value: 87 },
            { label: 'Fri', value: 73 },
            { label: 'Sat', value: 48 },
            { label: 'Sun', value: 31 },
        ];

        const maxValue = Math.max(...barData.map(d => d.value));

        function renderBars() {
            const container = document.getElementById('barChart');
            container.innerHTML = '';
            barData.forEach((item) => {
                const pct = (item.value / maxValue) * 100;
                const height = Math.max(pct, 8); // min 8px for visibility
                const div = document.createElement('div');
                div.className = 'bar-item';
                div.innerHTML = `
              <div class="bar blue" style="height: ${height}%;"></div>
              <span class="bar-label">${item.label}</span>
            `;
                container.appendChild(div);
            });
        }
        renderBars();

        // (Optional) re-render on resize – not needed for CSS bars

        // ============================================================
        //  3. RECENT ACTIVITY
        // ============================================================
        const activities = [{
            icon: 'fa-upload',
            color: 'blue',
            text: 'Uploaded <span>Project_Final.pdf</span>',
            time: '2 min ago'
        }, {
            icon: 'fa-user-plus',
            color: 'green',
            text: 'Added <span>Marcus Chen</span> to the team',
            time: '18 min ago'
        }, {
            icon: 'fa-comment',
            color: 'orange',
            text: 'New comment on <span>#UI-Design</span>',
            time: '1 hour ago'
        }, {
            icon: 'fa-check-circle',
            color: 'pink',
            text: 'Completed task <span>Homepage v2</span>',
            time: '3 hours ago'
        }, ];

        function renderActivities() {
            const container = document.getElementById('activityList');
            container.innerHTML = '';
            activities.forEach((act) => {
                const div = document.createElement('div');
                div.className = 'activity-item';
                div.innerHTML = `
              <div class="act-icon ${act.color}"><i class="fas ${act.icon}"></i></div>
              <div class="act-content">
                <div class="act-text">${act.text}</div>
                <div class="act-time">${act.time}</div>
              </div>
            `;
                container.appendChild(div);
            });
        }
        renderActivities();

        // ============================================================
        //  4. TASKS with checkbox toggle
        // ============================================================
        const tasksData = [
            { id: 1, label: 'Review design mockups', priority: 'high', done: false },
            { id: 2, label: 'Update user documentation', priority: 'medium', done: true },
            { id: 3, label: 'Prepare Q2 presentation', priority: 'high', done: false },
            { id: 4, label: 'Fix navigation bug #42', priority: 'low', done: false },
        ];

        function renderTasks() {
            const container = document.getElementById('taskList');
            container.innerHTML = '';
            tasksData.forEach((task) => {
                const div = document.createElement('div');
                div.className = 'task-item';
                const checkedAttr = task.done ? 'checked' : '';
                const doneClass = task.done ? 'done' : '';
                div.innerHTML = `
              <input type="checkbox" ${checkedAttr} data-id="${task.id}" />
              <span class="task-label ${doneClass}">${task.label}</span>
              <span class="task-priority ${task.priority}">${task.priority}</span>
            `;
                container.appendChild(div);
            });

            // Attach change events
            container.querySelectorAll('input[type="checkbox"]').forEach((cb) => {
                cb.addEventListener('change', function() {
                    const id = parseInt(this.dataset.id);
                    const task = tasksData.find(t => t.id === id);
                    if (task) {
                        task.done = this.checked;
                        // update label style
                        const label = this.nextElementSibling;
                        if (label && label.classList.contains('task-label')) {
                            label.classList.toggle('done', this.checked);
                        }
                    }
                });
            });
        }
        renderTasks();

        // ============================================================
        //  5. CHART TABS (demo toggle)
        // ============================================================
        document.querySelectorAll('.chart-tabs button').forEach((btn) => {
            btn.addEventListener('click', function() {
                const parent = this.closest('.chart-tabs');
                parent.querySelectorAll('button').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                // For demo, just re-render bars with slight variation
                if (this.textContent.trim() === 'Month') {
                    // different data (just for show)
                    const monthData = [
                        { label: 'W1', value: 55 },
                        { label: 'W2', value: 72 },
                        { label: 'W3', value: 60 },
                        { label: 'W4', value: 89 },
                    ];
                    // quick hack: replace barData and re-render
                    // (we'll just adjust heights via a simple animation)
                    const bars = document.querySelectorAll('.bar-item .bar');
                    const values = [55, 72, 60, 89];
                    const max = Math.max(...values);
                    bars.forEach((bar, idx) => {
                        if (idx < values.length) {
                            const pct = (values[idx] / max) * 100;
                            bar.style.height = Math.max(pct, 8) + '%';
                        }
                    });
                    // update labels
                    const labels = document.querySelectorAll('.bar-item .bar-label');
                    const weekLabels = ['W1', 'W2', 'W3', 'W4'];
                    labels.forEach((lbl, idx) => {
                        if (idx < weekLabels.length) lbl.textContent = weekLabels[idx];
                    });
                } else {
                    // back to week
                    renderBars();
                }
            });
        });

        // ============================================================
        //  6. SIDEBAR NAV ACTIVE STATE
        // ============================================================
        document.querySelectorAll('.sidebar-nav a').forEach((link) => {
            link.addEventListener('click', function(e) {
                // only if it's not a # link that we want to keep
                if (this.getAttribute('href') === '#') {
                    e.preventDefault();
                }
                document.querySelectorAll('.sidebar-nav a').forEach(l => l.classList.remove('active'));
                this.classList.add('active');
                // close sidebar on mobile after nav click
                if (window.innerWidth <= 768) {
                    sidebar.classList.remove('open');
                    overlay.classList.remove('active');
                }
            });
        });

        // ============================================================
        //  7. SEARCH (placeholder)
        // ============================================================
        document.querySelector('.search-box input').addEventListener('keydown', (e) => {
            if (e.key === 'Enter') {
                const val = e.target.value.trim();
                if (val) {
                    alert(`Searching for: "${val}" (demo)`);
                }
            }
        });

        // ============================================================
        //  8. NOTIFICATION / ICON BUTTONS (demo)
        // ============================================================
        document.querySelectorAll('.icon-btn').forEach((btn) => {
            btn.addEventListener('click', function() {
                const icon = this.querySelector('i');
                if (icon) {
                    // simple feedback
                    this.style.transform = 'scale(0.92)';
                    setTimeout(() => { this.style.transform = ''; }, 150);
                }
                if (this.querySelector('.dot')) {
                    // toggle dot as demo
                    const dot = this.querySelector('.dot');
                    dot.style.display = dot.style.display === 'none' ? 'block' : 'none';
                }
            });
        });

        console.log('✅ User Dashboard ready!');
    </script>

</body>
</html>