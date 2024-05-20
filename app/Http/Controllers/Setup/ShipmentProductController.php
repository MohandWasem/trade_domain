<?php

namespace App\Http\Controllers\Setup;

use App\Models\Product;
use App\Models\Currency;
use App\Models\Shipment;
use Illuminate\Http\Request;
use App\Models\ShipmentProduct;
use App\Http\Controllers\Controller;

class ShipmentProductController extends Controller
{

    public function add($shipment_id)
    {
        $shipment = Shipment::findOrfail($shipment_id);
        $products = Product::get();
        $currencies = Currency::get();
        return view('shipmentproduct.add',compact('shipment','products','currencies'));
    }

    public function create(Request $request)
    {
        ShipmentProduct::create([
            'product_id'=>$request->input('product_id'),
            'quantity'=>$request->input('quantity'),
            'price'=>$request->input('price'),
            'currency_id'=>$request->input('currency_id'),
            'total_price'=>$request->input('total_price'),
            'shipment_id'=>$request->input('shipment_id'),
        ]);
        return redirect()->route('shipments');
    }

    public function edit($id)
    {
        $shipmentproducts = ShipmentProduct::findOrfail($id);
        $shipment = Shipment::get();
        $products = Product::get();
        $currencies = Currency::get();
        return view('shipmentproduct.edit',compact('shipmentproducts','products','shipment','currencies'));
    }

    public function update(Request $request , $id)
    {
        $shipmentproducts = ShipmentProduct::findOrfail($id);
        $shipmentproducts->update([
            'product_id'=>$request->input('product_id'),
            'quantity'=>$request->input('quantity'),
            'price'=>$request->input('price'),
            'currency_id'=>$request->input('currency_id'),
            'total_price'=>$request->input('total_price'),
            'shipment_id'=>$request->input('shipment_id'),
        ]);
        return redirect()->route('shipments');
    }

    public function delete($id)
    {
        $shipmentproducts = ShipmentProduct::where('id',$id)->delete();
        return redirect()->route('shipments');
    }
}
