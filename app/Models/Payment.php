<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Shipment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipment_id','amount_paid','amount_due','client_id'
    ];

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
