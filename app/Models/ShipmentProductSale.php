<?php

namespace App\Models;

use App\Models\ShipmentProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShipmentProductSale extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipmentproduct_id','sales_price','quantity_sale','total_sales_price'
    ];

    public function productsales()
    {
        return $this->belongsTo(ShipmentProduct::class,'shipmentproduct_id');
    }


    protected $appends = ['serial_shipmentproductsale'];

    public function getSerialShipmentProductSaleAttribute()
    {
        return $Serial_ShipmentProductSale= ('SPS'.'-'. + $this->id);

    }
}
