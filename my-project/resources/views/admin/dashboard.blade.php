@extends('admin.layouts.app')
@section('admincontent')


   <main class="main">

        <!-- TOP BAR -->
        <div class="topbar">
            <h1>
                <i class="fas fa-seedling" style="color:#7cb342; font-size:1.6rem; vertical-align:middle;"></i>
                Farm Overview
                <span>Spring Season 2026</span>
            </h1>
            <div class="right">
                <div class="weather-widget">
                    <i class="fas fa-sun"></i>
                    <span>72°F</span>
                    <span style="color:#5a7a6a; font-weight:400;">| Sunny</span>
                </div>
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search fields..." />
                </div>
                <div class="avatar">JD</div>
            </div>
        </div>

        <!-- STATS -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="icon green"><i class="fas fa-seedling"></i></div>
                <div class="label">Active Crops</div>
                <div class="value">24</div>
                <span class="change up"><i class="fas fa-arrow-up"></i> +3 this month</span>
            </div>
            <div class="stat-card">
                <div class="icon blue"><i class="fas fa-tractor"></i></div>
                <div class="label">Total Fields</div>
                <div class="value">18</div>
                <span class="change up"><i class="fas fa-arrow-up"></i> 1,240 acres</span>
            </div>
            <div class="stat-card">
                <div class="icon orange"><i class="fas fa-water"></i></div>
                <div class="label">Irrigation Status</div>
                <div class="value">87%</div>
                <span class="change up"><i class="fas fa-arrow-up"></i> Optimal</span>
            </div>
            <div class="stat-card">
                <div class="icon purple"><i class="fas fa-box"></i></div>
                <div class="label">Harvest (YTD)</div>
                <div class="value">42.8t</div>
                <span class="change up"><i class="fas fa-arrow-up"></i> +18.4%</span>
            </div>
        </div>

        <!-- CHARTS -->
        <div class="charts-row">
            <div class="chart-box">
                <h3><i class="fas fa-chart-bar"></i> Crop Yield by Field (tons)</h3>
                <canvas id="yieldChart" width="400" height="180"></canvas>
            </div>
            <div class="chart-box">
                <h3><i class="fas fa-chart-pie"></i> Crop Distribution</h3>
                <canvas id="cropPieChart" width="200" height="180"></canvas>
            </div>
        </div>

        <!-- BOTTOM ROW -->
        <div class="bottom-row">

            <!-- FIELD ACTIVITY TABLE -->
            <div class="field-section">
                <div class="header">
                    <h3><i class="fas fa-clipboard-list" style="color:#7cb342; margin-right:6px;"></i> Field Activity</h3>
                    <a href="#">View all <i class="fas fa-arrow-right"></i></a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Field</th>
                            <th>Crop</th>
                            <th>Status</th>
                            <th>Health</th>
                            <th>Yield (est.)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>North Field</strong></td>
                            <td>Corn</td>
                            <td>Flowering</td>
                            <td><span class="badge healthy">Excellent</span></td>
                            <td>6.2 t</td>
                        </tr>
                        <tr>
                            <td><strong>East Valley</strong></td>
                            <td>Wheat</td>
                            <td>Mature</td>
                            <td><span class="badge good">Good</span></td>
                            <td>4.8 t</td>
                        </tr>
                        <tr>
                            <td><strong>South Hills</strong></td>
                            <td>Soybeans</td>
                            <td>Vegetative</td>
                            <td><span class="badge warning">Moderate</span></td>
                            <td>3.1 t</td>
                        </tr>
                        <tr>
                            <td><strong>West Pasture</strong></td>
                            <td>Alfalfa</td>
                            <td>Harvesting</td>
                            <td><span class="badge healthy">Excellent</span></td>
                            <td>5.4 t</td>
                        </tr>
                        <tr>
                            <td><strong>River Bend</strong></td>
                            <td>Rice</td>
                            <td>Flooded</td>
                            <td><span class="badge critical">Attention</span></td>
                            <td>2.9 t</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- WEATHER ALERTS / TASKS -->
            <div class="alerts-section">
                <h3><i class="fas fa-bell"></i> Alerts &amp; Tasks</h3>

                <div class="alert-item">
                    <div class="alert-icon red"><i class="fas fa-exclamation-triangle"></i></div>
                    <div class="alert-content">
                        <div class="title">Drought Warning</div>
                        <div class="desc">East Valley needs irrigation within 48h.</div>
                        <div class="time"><i class="far fa-clock"></i> 2 hours ago</div>
                    </div>
                </div>

                <div class="alert-item">
                    <div class="alert-icon yellow"><i class="fas fa-bug"></i></div>
                    <div class="alert-content">
                        <div class="title">Pest Detection</div>
                        <div class="desc">Aphids spotted in South Hills soybeans.</div>
                        <div class="time"><i class="far fa-clock"></i> 5 hours ago</div>
                    </div>
                </div>

                <div class="alert-item">
                    <div class="alert-icon blue"><i class="fas fa-cloud-rain"></i></div>
                    <div class="alert-content">
                        <div class="title">Rain Forecast</div>
                        <div class="desc">Heavy rain expected tomorrow (1.2 in).</div>
                        <div class="time"><i class="far fa-clock"></i> 8 hours ago</div>
                    </div>
                </div>

                <div class="alert-item">
                    <div class="alert-icon green"><i class="fas fa-check-circle"></i></div>
                    <div class="alert-content">
                        <div class="title">Harvest Ready</div>
                        <div class="desc">North Field corn is ready to harvest.</div>
                        <div class="time"><i class="far fa-clock"></i> 1 day ago</div>
                    </div>
                </div>

                <div style="margin-top: 0.8rem; padding-top: 0.8rem; border-top: 1px solid #eef3ea;">
                    <a href="#" style="color:#7cb342; text-decoration:none; font-weight:500; font-size:0.9rem;">
                        <i class="fas fa-plus-circle"></i> Add new task
                    </a>
                </div>
            </div>

        </div>

    </main>

@endsection