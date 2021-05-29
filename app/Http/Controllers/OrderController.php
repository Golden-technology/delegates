<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $from = Carbon::parse($request->from)->startOfDay() ?? now()->subDay(2)->startOfDay();
        $to = Carbon::parse($request->to)->endOfDay() ?? now()->endOfDay();

        $orders = Order::
        when($request->type != null , function($q) use($request) { if($request->type != "all"){ return $q->where('type' , $request->type); }else{return $q;}})
        ->when($request->status != null , function($q) use($request) { if($request->status != "all"){return $q->where('status' , $request->status);}else{return $q;} })
        ->when($request->customer != null , function($q) use($request) {if($request->customer != "all"){$q->where('customer_id' , $request->customer);}else{return $q;}})
        ->when($request->delegate != null , function($q) use($request) {if($request->customer != "all"){return $q->where('delegate_id' , $request->delegate);}else{return $q;}})
        ->whereBetween('created_at' , [$from , $to])
        ->paginate();
        return view('dashboard.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        $types = Order::TYPES;
        $status = Order::STATUS;
        return view('dashboard.orders.create', compact('customers', 'types', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['delegate_id'] = auth()->user()->delegate_id ?? null;
        $order = Order::create($data);
        return redirect()->route('orders.show' , $order->id)->with('success' , 'تمت العملية بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('dashboard.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $customers = Customer::all();
        $types = Order::TYPES;
        $status = Order::STATUS;
        return view('dashboard.orders.edit', compact('order' , 'customers' , 'types', 'status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->update($request->all());
        return redirect()->route('orders.show' , $order->id)->with('success' , 'تمت العملية بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
