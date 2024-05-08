<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable= [
        'client','date','sales_man'

    ];

    protected $appends = ['serial_offer'];

    public function getSerialOfferAttribute()
    {
        return $Serial_Offer= ('q'.'-'.'2400'. + $this->id);

    }

    
}
