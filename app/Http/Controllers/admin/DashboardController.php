<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Order;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $brandsCount = Brand::count();
        $vendorsCount = Vendor::count();
        $productsCount = Product::count();
        $ordersCount = Order::count();
        $customersCount = Customer::count();

        // Recent Orders (limit 5)
        $recentOrders = Order::latest('order_date')->take(5)->with('product')->get();

        // Monthly Sales Chart
        $monthlySalesRaw = DB::table('sale_orders')
            ->select(
                DB::raw("DATE_FORMAT(order_date, '%Y-%m') as month_key"),
                DB::raw("DATE_FORMAT(order_date, '%M %Y') as month"),
                DB::raw('SUM(price * quantity) as total_sales')
            )
            ->groupBy('month_key', 'month')
            ->orderBy('month_key', 'desc')
            ->take(6)
            ->get()
            ->reverse();

        // Prepare array for chart.js
        $monthlySales = [
            'months' => $monthlySalesRaw->pluck('month')->toArray(),
            'sales' => $monthlySalesRaw->pluck('total_sales')->toArray(),
        ];


        return view('admin.dashboard.index', compact(
            'brandsCount',
            'vendorsCount',
            'productsCount',
            'ordersCount',
            'customersCount',
            'recentOrders',
            'monthlySales'
        ));
    }
}
