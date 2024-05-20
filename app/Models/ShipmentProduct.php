<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Currency;
use App\Models\Shipment;
use App\Models\ShipmentProductSale;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShipmentProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id','quantity','price','total_price','shipment_id','currency_id'
    ];

    public function shipment()
    {
        return $this->belongsTo(Shipment::class,'shipment_id');
    }

    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function currencies()
    {
        return $this->belongsTo(Currency::class,'currency_id');
    }

    public function sales()
    {
        return $this->hasMany(ShipmentProductSale::class);
    }

    protected $appends = ['serial_shipmentproduct'];

    public function getSerialShipmentProductAttribute()
    {
        return $Serial_ShipmentProduct= ('SP'.'-'. + $this->id);

    }
}
