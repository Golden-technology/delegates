<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Delegate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DelegateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $delegates = Delegate::paginate();
        return view('dashboard.delegates.index', compact('delegates'));
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
            'name'      => ['required' , 'string', 'unique:delegates'],
            'phone'     => ['required' , 'string', 'unique:delegates'],
            'address'   => ['required' , 'string'],
        ]);

        return DB::transaction(function () use($request) {
            $delegate = Delegate::create($request->all());
    
            $user = User::create([
                'name'      => $delegate->name,
                'phone'     => $delegate->phone,
                'delegate_id' => $delegate->id,
                'password'  => Hash::make(123456),
            ]);

            return back()->with('success', 'تمت العملية');
        });

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Delegate  $delegate
     * @return \Illuminate\Http\Response
     */
    public function show(Delegate $delegate)
    {
        return view('dashboard.delegates.show', compact('delegate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Delegate  $delegate
     * @return \Illuminate\Http\Response
     */
    public function edit(Delegate $delegate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Delegate  $delegate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Delegate $delegate)
    {
        $request->validate([
            'name'      => ['required' , 'string', 'unique:delegates,name,'.$delegate->id],
            'phone'     => ['required' , 'string', 'unique:delegates,phone,'.$delegate->id],
            'address'   => ['required' , 'string']
        ]);

        $delegate->update($request->all());

        if($delegate->user) {
            $delegate->user->update([
                'phone' => $delegate->phone
            ]);
        }

        return back()->with('success', 'تمت العملية');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Delegate  $delegate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delegate $delegate)
    {
        //
    }
}
