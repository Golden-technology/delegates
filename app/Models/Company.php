<?php

namespace App\Models;

use App\Models\Customer;
use App\Models\Delegate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address'];

    public function delegates()
    {
        return $this->hasMany(Delegate::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
