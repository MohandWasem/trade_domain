<?php

namespace App\Models;

use App\Models\Item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Offer extends Model
{
    use HasFactory;

    protected $fillable= [
        'client','date','sales_man','attention','subject','terms'

    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    protected $appends = ['serial_offer'];

    public function getSerialOfferAttribute()
    {
        return $Serial_Offer= ('q'.'-'.'2400'. + $this->id);

    }

    
}
