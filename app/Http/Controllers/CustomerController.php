<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->name) {
            $customers = Customer::where('name', 'like', '%' . $request->name .'%')->paginate();
        }else {
            $customers = Customer::paginate();
        }
        return view('dashboard.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => ['required' , 'string', 'unique:customers'],
            'phone' => ['required' , 'string', 'unique:customers'],
            'address' => ['required' , 'string']
        ]);

        $data = $request->all();
        
        $data['company_id'] = auth()->user()->delegate ? auth()->user()->delegate->company_id : null;

        Customer::create($data);

        return back()->with('success', 'تمت العملية');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('dashboard.customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name'      => ['required' , 'string', 'unique:customers,name,'.$customer->id],
            'phone'     => ['required' , 'string', 'unique:customers,phone,'.$customer->id],
            'address'   => ['required' , 'string']
        ]);

        $customer->update($request->all());

        return back()->with('success', 'تمت العملية');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }

    public function search($name)
    {
        $customers = Customer::where('name', 'like', '%'. $name .'%')->limit(5)->get();
        return response()->json($customers);
    }
}
