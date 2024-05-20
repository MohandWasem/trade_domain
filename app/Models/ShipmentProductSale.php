<?php

namespace App\Models;

use App\Models\ShipmentProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShipmentProductSale extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipment_product_id','sales_price','quantity_sale','total_sales_price'
    ];

    public function products()
    {
        return $this->belongsTo(ShipmentProduct::class,'shipment_product_id');
    }


    protected $appends = ['serial_shipmentproductsale'];

    public function getSerialShipmentProductSaleAttribute()
    {
        return $Serial_ShipmentProductSale= ('SPS'.'-'. + $this->id);

    }
}
