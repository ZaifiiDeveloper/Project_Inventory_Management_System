<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\Product;
use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $currencies = [
        'USD',
        'GBP',
        'PKR',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.order.index', [
            'orders' => Order::with(['vendor', 'product'])->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.order.create', [
            'vendors' => Vendor::all(),
            'products' => Product::all(),
            'currencies' => $this->currencies,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'vendor_id' => ['required'],
            'product_id' => ['required'],
            'order_date' => ['required'],
            'quantity' => ['required'],
            'currency' => ['required'],
            'price' => ['required'],
            'discount' => ['required'],
        ]);

        $data = [
            'vendor_id' => $request->vendor_id,
            'product_id' => $request->product_id,
            'order_date' => $request->order_date,
            'quantity' => $request->quantity,
            'currency' => $request->currency,
            'price' => $request->price,
            'discount' => $request->discount,
        ];

        $is_created = Order::create($data);

        if ($is_created) {
            $is_already_exists = Inventory::where('product_id', $request->product_id)->first();
            if ($is_already_exists) {
                $data = [
                    'total_quantity' => $is_already_exists->total_quantity + $request->quantity,
                    'current_quantity' => $is_already_exists->current_quantity + $request->quantity,
                ];

                $is_updated = $is_already_exists->update($data);

                $message = $is_updated ? ['success' => 'Magic has been spelled'] : ['failure' => 'Magic has become a shopper!'];

                return back()->with($message);
            } else {

                $data = [
                    'product_id' => $request->product_id,
                    'total_quantity' => $request->quantity,
                    'current_quantity' => $request->quantity,
                ];

                $is_created = Inventory::create($data);

                $message = $is_created ? ['success' => 'Magic has been spelled'] : ['failure' => 'Magic has become a shopper!'];

                return back()->with($message);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('admin.order.show', [
            'order' => $order,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('admin.order.edit', [
            'order' => $order,
            'vendors' => Vendor::all(),
            'products' => Product::all(),
            'currencies' => $this->currencies,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'vendor_id' => ['required'],
            'product_id' => ['required'],
            'order_date' => ['required'],
            'quantity' => ['required'],
            'currency' => ['required'],
            'price' => ['required'],
            'discount' => ['required'],
        ]);

        $data = [
            'vendor_id' => $request->vendor_id,
            'product_id' => $request->product_id,
            'order_date' => $request->order_date,
            'quantity' => $request->quantity,
            'currency' => $request->currency,
            'price' => $request->price,
            'discount' => $request->discount,
        ];

        $is_updated = $order->update($data);

        $message = $is_updated ? ['success' => 'Magic has been spelled!'] : ['failure' => 'Magic has become a shopper!'];

        return back()->with($message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $is_deleted = $order->delete();

        $is_deleted ? $message = ['success' => 'Magic has been spelled!'] : $message = ['failure' => 'Magic has become shopper!'];

        return back()->with($message);
    }
}
