<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Shipment;
use App\Models\ShipmentProductSale;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShipmentProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id','quantity','price','total_price','shipment_id'
    ];

    public function shipment()
    {
        return $this->belongsTo(Shipment::class,'shipment_id');
    }

    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function productsales()
    {
        return $this->hasMany(ShipmentProductSale::class);
    }

    protected $appends = ['serial_shipmentproduct'];

    public function getSerialShipmentProductAttribute()
    {
        return $Serial_ShipmentProduct= ('SP'.'-'. + $this->id);

    }
}
