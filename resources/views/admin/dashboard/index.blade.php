<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />

    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="{{ asset('template/css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        .dashboard-stat {
            transition: all 0.3s ease-in-out;
        }

        .dashboard-stat:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
        }

        .icon-circle {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>

</head>

<body>
    <div class="wrapper">

        @include('partials.admin.sidebar')

        <div class="main">

            @include('partials.admin.topbar')

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-4 fw-bold">Admin Dashboard</h1>

                    <!-- ✅ Dashboard Summary Cards - Row 1 -->
                    <div class="row mb-4">
                        <!-- Total Brands -->
                        <div class="col-md-4">
                            <div class="card text-white bg-primary mb-3 shadow-sm">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="card-title mb-1">Total Brands</h5>
                                            <h3 class="card-text">{{ $brandsCount }}</h3>
                                        </div>
                                        <div class="display-4"><i class="bi bi-tags"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Vendors -->
                        <div class="col-md-4">
                            <div class="card text-white bg-warning mb-3 shadow-sm">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="card-title mb-1">Total Vendors</h5>
                                            <h3 class="card-text">{{ $vendorsCount }}</h3>
                                        </div>
                                        <div class="display-4"><i class="bi bi-truck"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Products -->
                        <div class="col-md-4">
                            <div class="card text-white bg-success mb-3 shadow-sm">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="card-title mb-1">Total Products</h5>
                                            <h3 class="card-text">{{ $productsCount }}</h3>
                                        </div>
                                        <div class="display-4"><i class="bi bi-box-seam"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ✅ Dashboard Summary Cards - Row 2 -->
                    <div class="row mb-4">
                        <!-- Total Orders -->
                        <div class="col-md-4">
                            <div class="card text-white bg-info mb-3 shadow-sm">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="card-title mb-1">Total Orders</h5>
                                            <h3 class="card-text">{{ $ordersCount }}</h3>
                                        </div>
                                        <div class="display-4"><i class="bi bi-receipt"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Customers -->
                        <div class="col-md-4">
                            <div class="card text-white bg-secondary mb-3 shadow-sm">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="card-title mb-1">Total Customers</h5>
                                            <h3 class="card-text">{{ $customersCount }}</h3>
                                        </div>
                                        <div class="display-4"><i class="bi bi-people"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ✅ Recent Orders - Full Width -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="card glass-card shadow">
                                <div
                                    class="card-header bg-transparent d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0 text-primary">
                                        <i class="fas fa-clipboard-list me-2"></i>Recent Orders
                                    </h5>
                                    <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
                                </div>
                                <div class="card-body table-responsive">
                                    <table class="table table-hover align-middle mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Vendor</th>
                                                <th>Product</th>
                                                <th>Quantity</th>
                                                <th>Total Price</th>
                                                <th>Order Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($recentOrders as $order)
                                                <tr>
                                                    <td>#{{ $order->id }}</td>
                                                    <td>{{ $order->vendor->vendor_id ?? 'N/A' }}</td>
                                                    <td>{{ $order->product->name ?? 'N/A' }}</td>
                                                    <td>{{ $order->quantity }}</td>
                                                    <td>Rs.
                                                        {{ number_format($order->price * $order->quantity, 0) }}
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($order->order_date)->format('d M, Y') }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ✅ Monthly Sales Chart - Full Width -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="card glass-card shadow">
                                <div class="card-header bg-transparent">
                                    <h5 class="mb-0 text-primary">
                                        <i class="fas fa-chart-line me-2"></i>Monthly Sales
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <canvas id="monthlySalesChart" height="100"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

            </main>

            @include('partials.admin.footer')
        </div>
    </div>

    <script src="{{ asset('template/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('monthlySalesChart').getContext('2d');
        const monthlySalesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($monthlySales['months']) !!},
                datasets: [{
                    label: 'Sales (Rs.)',
                    data: {!! json_encode($monthlySales['sales']) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderRadius: 10,
                    borderSkipped: false
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return 'Rs. ' + context.formattedValue;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return 'Rs. ' + value;
                            }
                        }
                    }
                }
            }
        });
    </script>

</body>

</html>
