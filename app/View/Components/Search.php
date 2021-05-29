<?php

namespace App\View\Components;

use App\Models\Customer;
use App\Models\Delegate;
use App\Models\Order;
use Illuminate\View\Component;

class Search extends Component
{

    public $types;
    public $status;
    public $customers;
    public $delegates;
    public $date;
    public function __construct($types = null , $status = null , $customers = null , $delegates = null , $date = null)
    {
        if($types)      {$this->types = Order::TYPES;}
        if($status)     {$this->status = Order::STATUS;}
        if($customers)  {$this->customers = Customer::all();}
        if($delegates)  {$this->delegates = Delegate::all();}
        if($date)       {$this->date = "date";}
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.search');
    }
}
