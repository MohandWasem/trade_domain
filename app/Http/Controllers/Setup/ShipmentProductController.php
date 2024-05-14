<?php

namespace App\Http\Controllers\Setup;

use App\Models\Product;
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
        return view('shipmentproduct.add',compact('shipment','products'));
    }

    public function create(Request $request)
    {
        ShipmentProduct::create([
            'product_id'=>$request->input('product_id'),
            'quantity'=>$request->input('quantity'),
            'price'=>$request->input('price'),
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
        return view('shipmentproduct.edit',compact('shipmentproducts','products','shipment'));
    }

    public function update(Request $request , $id)
    {
        $shipmentproducts = ShipmentProduct::findOrfail($id);
        $shipmentproducts->update([
            'product_id'=>$request->input('product_id'),
            'quantity'=>$request->input('quantity'),
            'price'=>$request->input('price'),
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
