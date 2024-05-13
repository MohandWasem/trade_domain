<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        'currency_name'
    ];


    protected $appends = ['serial_currency'];

    public function getSerialCurrencyAttribute()
    {
        return $Serial_Currency= ('CU'.'-'. + $this->id);

    }
}
