@extends('realestate.layouts.master')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Dashboard
                </h3>
            </div>
            <div class="row grid-margin">
                <div class="col-12">
                    <div class="card card-statistics">
                        <div class="card-body">
                            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                                <div class="statistics-item">
                                    <p>
                                        <i class="icon-sm fa fa-user mr-2"></i>
                                        Total users
                                    </p>
                                    <h2>{{ $totalcustomer }}</h2>
                                </div>
                                <div class="statistics-item">
                                    <p>
                                        <i class="icon-sm fas fa fa-phone mr-2" aria-hidden="true"></i>
                                        <!-- <i class="icon-sm fas fa-hourglass-half mr-2"></i> -->
                                        total Calls
                                    </p>
                                    <h2>{{ $totalcall }}</h2>
                                </div>
                                <div class="statistics-item">
                                    <p>
                                        <i class="icon-sm fas fa-briefcase mr-2" aria-hidden="true"></i>
                                        <!-- <i class="icon-sm fas fa-cloud-download-alt mr-2"></i> -->
                                        Meetings
                                    </p>
                                    <h2>{{ $totalmeeting }}</h2>
                                </div>
                                <div class="statistics-item">
                                    <p>
                                        <i class="icon-sm fas fa-clipboard mr-2"></i>
                                        Followup
                                    </p>
                                    <h2>{{ $totalfollowup }}</h2>
                                </div>
                                <div class="statistics-item">
                                    <p>
                                        <i class="icon-sm fas fa-circle-notch mr-2"></i>
                                        All Leads
                                    </p>
                                    <h2>{{ $totalleads }}</h2>
                                </div>

                                <div class="statistics-item">
                                    <p>
                                        <i class="icon-sm fas fa-chart-line mr-2"></i>
                                        Cheques
                                    </p>
                                    <h2>{{ $totalcomplete }}</h2>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg=12">
                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <i class="fas fa-gift"></i>
                                    Orders
                                </h4>
                                <canvas id="orders-chart"></canvas>
                                <div id="orders-chart-legend" class="orders-chart-legend"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body d-flex flex-column">
                                <h4 class="card-title">
                                    <i class="fas fa-chart-pie"></i>
                                    Sales status
                                </h4>
                                <div class="flex-grow-1 d-flex flex-column justify-content-between">
                                    <canvas id="sales-status-chart" class="mt-3"></canvas>
                                    <div class="pt-4">
                                        <div id="sales-status-chart-legend" class="sales-status-chart-legend"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @php
            
        @endphp
        <!-- main-panel ends -->
    @endsection

    <script>
        var todaysell = <?php echo $todaysell; ?>;
        console.log(todaysell);
        (function($) {
            'use strict';
            $(function() {
                if ($("#orders-chart").length) {
                    var currentChartCanvas = $("#orders-chart").get(0).getContext("2d");
                    var currentChart = new Chart(currentChartCanvas, {
                        type: 'bar',
                        data: {
                            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep",
                                "Oct", "Nov", "Dec"
                            ],
                            datasets: [{
                                    label: 'Delivered',
                                    data: [260, 380, 230, 400, 780, 530, 340, 200, 400, 650, 780,
                                        500
                                    ],
                                    backgroundColor: '#392c70'
                                },
                                {
                                    label: 'Estimated',
                                    data: [480, 600, 510, 600, 1000, 570, 500, 350, 450, 710, 820,
                                        650
                                    ],
                                    backgroundColor: '#d1cede'
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: true,
                            layout: {
                                padding: {
                                    left: 0,
                                    right: 0,
                                    top: 20,
                                    bottom: 0
                                }
                            },
                            scales: {
                                yAxes: [{
                                    gridLines: {
                                        drawBorder: false,
                                    },
                                    ticks: {
                                        stepSize: 250,
                                        fontColor: "#686868"
                                    }
                                }],
                                xAxes: [{
                                    stacked: true,
                                    ticks: {
                                        beginAtZero: true,
                                        fontColor: "#686868"
                                    },
                                    gridLines: {
                                        display: false,
                                    },
                                    barPercentage: 0.4
                                }]
                            },
                            legend: {
                                display: false
                            },
                            elements: {
                                point: {
                                    radius: 0
                                }
                            },
                            legendCallback: function(chart) {
                                var text = [];
                                text.push('<ul class="legend' + chart.id + '">');
                                for (var i = 0; i < chart.data.datasets.length; i++) {
                                    text.push(
                                        '<li><span class="legend-label" style="background-color:' +
                                        chart.data.datasets[i].backgroundColor + '"></span>');
                                    if (chart.data.datasets[i].label) {
                                        text.push(chart.data.datasets[i].label);
                                    }
                                    text.push('</li>');
                                }
                                text.push('</ul>');
                                return text.join("");
                            },
                        }
                    });
                    document.getElementById('orders-chart-legend').innerHTML = currentChart.generateLegend();
                }

                if ($("#daily-sales-chart").length) {
                    var dailySalesChartData = {
                        datasets: [{
                            data: [todaysell],
                            backgroundColor: [
                                '#392c70',
                                '#04b76b',
                                '#e9e8ef',
                                '#ff5e6d'
                            ],
                            borderWidth: 0
                        }],

                        // These labels appear in the legend and in the tooltips when hovering different arcs
                        labels: [
                            'Todays Sale',
                        ]
                    };
                    var dailySalesChartOptions = {
                        responsive: true,
                        maintainAspectRatio: true,
                        animation: {
                            animateScale: true,
                            animateRotate: true
                        },
                        legend: {
                            display: false
                        },
                        legendCallback: function(chart) {
                            var text = [];
                            text.push('<ul class="legend' + chart.id + '">');
                            for (var i = 0; i < chart.data.datasets[0].data.length; i++) {
                                text.push('<li><span class="legend-label" style="background-color:' +
                                    chart.data.datasets[0].backgroundColor[i] + '"></span>');
                                if (chart.data.labels[i]) {
                                    text.push(chart.data.labels[i]);
                                }
                                text.push('</li>');
                            }
                            text.push('</ul>');
                            return text.join("");
                        },
                        cutoutPercentage: 70
                    };
                    var dailySalesChartCanvas = $("#daily-sales-chart").get(0).getContext("2d");
                    var dailySalesChart = new Chart(dailySalesChartCanvas, {
                        type: 'doughnut',
                        data: dailySalesChartData,
                        options: dailySalesChartOptions
                    });
                    document.getElementById('daily-sales-chart-legend').innerHTML = dailySalesChart
                        .generateLegend();
                }
                if ($("#sales-status-chart").length) {
                    var pieChartCanvas = $("#sales-status-chart").get(0).getContext("2d");
                    var pieChart = new Chart(pieChartCanvas, {
                        type: 'pie',
                        data: {
                            datasets: [{
                                data: [75, 25, 15, 10],
                                backgroundColor: [
                                    '#392c70',
                                    '#04b76b',
                                    '#ff5e6d',
                                    '#eeeeee'
                                ],
                                borderColor: [
                                    '#392c70',
                                    '#04b76b',
                                    '#ff5e6d',
                                    '#eeeeee'
                                ],
                            }],

                            // These labels appear in the legend and in the tooltips when hovering different arcs
                            labels: [
                                'Active users',
                                'Subscribers',
                                'New visitors',
                                'Others'
                            ]
                        },
                        options: {
                            responsive: true,
                            animation: {
                                animateScale: true,
                                animateRotate: true
                            },
                            legend: {
                                display: false
                            },
                            legendCallback: function(chart) {
                                var text = [];
                                text.push('<ul class="legend' + chart.id + '">');
                                for (var i = 0; i < chart.data.datasets[0].data.length; i++) {
                                    text.push(
                                        '<li><span class="legend-label" style="background-color:' +
                                        chart.data.datasets[0].backgroundColor[i] + '"></span>');
                                    if (chart.data.labels[i]) {
                                        text.push(chart.data.labels[i]);
                                    }
                                    text.push(
                                        '<label class="badge badge-light badge-pill legend-percentage ml-auto">' +
                                        chart.data.datasets[0].data[i] + '%</label>');
                                    text.push('</li>');
                                }
                                text.push('</ul>');
                                return text.join("");
                            }
                        }
                    });
                    document.getElementById('sales-status-chart-legend').innerHTML = pieChart.generateLegend();
                }

            });
        })(jQuery);
    </script>
