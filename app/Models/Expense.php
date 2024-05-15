<?php

namespace App\Models;

use App\Models\Currency;
use App\Models\Shipment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipment_id','expense_name','currency_id','expense_cost'
    ];

    public function currencies()
    {
        return $this->belongsTo(Currency::class,'currency_id');
    }

    public function shipment()
    {
        return $this->belongsTo(Shipment::class,'shipment_id');
    }

    protected $appends = ['serial_expense'];

    public function getSerialExpenseAttribute()
    {
        return $Serial_Expense= ('EX'.'-'. + $this->id);

    }
}
