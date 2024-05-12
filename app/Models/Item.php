<?php

namespace App\Models;

use App\Models\Offer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $fillable=[
        'description','quantity','price','currency',
        'conversion_rate','total_price','offer_id'
    ];

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
}
