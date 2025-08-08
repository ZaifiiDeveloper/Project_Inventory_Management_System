<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class VendorController extends Controller
{
    private $titles = [
        'Mr.',
        'Mrs.',
        'Ms.',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.vendor.index', [
            'vendors' => Vendor::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.vendor.create', [
            'titles' => $this->titles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'vendor_name' => ['required', 'unique:vendors,vendor_name,'],
            'title' => ['required'],
            'first_name' => ['required'],
            'email' => ['required', 'unique:vendors,email,'],
            'address' => ['required'],
            'phone_number' => ['required', 'unique:vendors,phone_number,'],
        ]);

        $data = [
            'vendor_name' => $request->vendor_name,
            'title' => $request->title,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'website' => $request->website,
        ];

        $is_created = Vendor::create($data);

        $is_created ? $message = ['success' => 'Magic has been spelled!'] : $message = ['failure' => 'Magic has become shopper!'];

        return back()->with($message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendor $vendor)
    {
        return view('admin.vendor.show', [
            'vendor' => $vendor,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendor $vendor)
    {
        return view('admin.vendor.edit', [
            'vendor' => $vendor,
            'titles' => $this->titles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vendor $vendor)
    {
        $request->validate([
            'vendor_name' => ['required', 'unique:vendors,vendor_name,' . $vendor->id . 'id'],
            'title' => ['required'],
            'first_name' => ['required'],
            'email' => ['required', 'unique:vendors,email,' . $vendor->id . 'id'],
            'address' => ['required'],
            'phone_number' => ['required', 'unique:vendors,phone_number,' . $vendor->id . 'id'],
        ]);

        $data = [
            'vendor_name' => $request->vendor_name,
            'title' => $request->title,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'website' => $request->website,
        ];

        $is_updated = $vendor->update($data);

        $is_updated ? $message = ['success' => 'Magic has been spelled!'] : $message = ['failure' => 'Magic has become shopper!'];

        return back()->with($message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendor $vendor)
    {
        $is_deleted = $vendor->delete();

        $is_deleted ? $message = ['success' => 'Magic has been spelled!'] : $message = ['failure' => 'Magic has become shopper!'];

        return back()->with($message);
    }
}
