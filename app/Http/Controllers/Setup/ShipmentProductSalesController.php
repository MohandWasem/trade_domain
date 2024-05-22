<?php

namespace App\Http\Controllers\Setup;

use App\Models\Currency;
use Illuminate\Http\Request;
use App\Models\ShipmentProduct;
use App\Models\ShipmentProductSale;
use App\Http\Controllers\Controller;

class ShipmentProductSalesController extends Controller
{
    public function add($shipmentsales_id)
    {
        $ShipmentSales = ShipmentProduct::findOrfail($shipmentsales_id);
        $currencies = Currency::get();
        return view("shipmentproductsale.add",compact('ShipmentSales','currencies'));
    }

    public function create(Request $request)
    {
        ShipmentProductSale::create([
            'sales_price'=>$request->input('sales_price'),
            'quantity_sale'=>$request->input('quantity_sale'),
            'total_sales_price'=>$request->input('total_sales_price'),
            'shipment_product_id'=>$request->input('shipmentproduct_id'),
            'currency_id'=>$request->input('currency_id'),
        ]);
        
        return redirect()->route('shipments');
    }

    public function edit($id)
    {
        $ShipmentProductSale = ShipmentProductSale::findOrfail($id);
        $ShipmentSales = ShipmentProduct::findOrfail($id);
        $currencies = Currency::get();
        return view('shipmentproductsale.edit',compact('ShipmentProductSale','ShipmentSales','currencies'));
    }

    public function update(Request $request , $id)
    {
        $ShipmentProductSale = ShipmentProductSale::findOrfail($id);
        $ShipmentProductSale->update([
            'sales_price'=>$request->input('sales_price'),
            'quantity_sale'=>$request->input('quantity_sale'),
            'total_sales_price'=>$request->input('total_sales_price'),
            'shipment_product_id'=>$request->input('shipmentproduct_id'),
            'currency_id'=>$request->input('currency_id'),
        ]);
        return redirect()->route('shipments');
    }

    public function delete($id)
    {
        $ShipmentProductSale = ShipmentProductSale::where('id',$id)->delete();
        return redirect()->route('shipments');
    }
}
