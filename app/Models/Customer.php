<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'address', 'company_id', 'status'];

    public function orders()
    {
        return $this->hasMany(Order::class)->orderBy('created_at' , 'DESC');
    }
}
