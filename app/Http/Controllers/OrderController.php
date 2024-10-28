<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminUpdateOrderRequest;
use App\Models\Order;
use App\Models\Status;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'check-isAdmin']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $orders = Order::with('product')->get();
        return view('admin.order.list_orders',[
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
        return view('admin.order.show_order',[
            'order' =>$order,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
        $statuses = Status::all();
        return view('admin.order.edit_order',[
            'order' => $order,
            'statuses' => $statuses,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminUpdateOrderRequest $request, Order $order)
    {
        //
        $order->update([
            'status_id' => $request->status,
        ]);

        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
