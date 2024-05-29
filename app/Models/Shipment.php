<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Expense;
use App\Models\Supplier;
use App\Models\ShipmentProduct;
use App\Models\ShipmentProductSale;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = [
    'is_selected','client_id','supplier_id','shipping_agent'
    ];

    public function shipmentproduct()
    {
        return $this->hasMany(ShipmentProduct::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    public function clients()
    {
        return $this->belongsTo(Client::class,'client_id');
    }

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class,'supplier_id');
    }

    public function sales()
    {
        return $this->hasManyThrough(ShipmentProductSale::class, ShipmentProduct::class);
    }

    protected $appends = ['serial_shipment'];

    public function getSerialShipmentAttribute()
    {
        return $Serial_Shipment= ('ST'.'-'. + $this->id);

    }
}
