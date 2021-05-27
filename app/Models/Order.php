<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // constant types 
    const TYPE_PRICES = "عرض اسعار";
    const TYPE_RUN = "تنفيذ";
    const TYPE_INITIAL = "فاتورة مبدئية";

    const TYPES = [
        self::TYPE_PRICES,
        self::TYPE_RUN,
        self::TYPE_INITIAL
    ];


    // constant status 
    const STATUS_DONE = "تم الاتفاق";
    const STATUS_CANCEL = "تم الالغاء";

    const STATUS = [
        self::STATUS_DONE,
        self::STATUS_CANCEL
    ];

    protected $fillable = ['customer_id', 'delegate_id', 'type', 'status', 'notes'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function delegate()
    {
        return $this->belongsTo(Delegate::class);
    }
}
