<?php

namespace App\Http\Controllers\Setup;

use App\Models\Client;
use App\Models\Shipment;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\ShipmentProduct;
use App\Http\Controllers\Controller;

class ShipmentController extends Controller
{
    public function index()
    {
        $Shipments=Shipment::with('clients','suppliers')->get();
        $ShipmentProducts=ShipmentProduct::with('products','shipment')->get();
        return view("shipment.show",compact('Shipments','ShipmentProducts'));
    }

    public function add()
    {
        $Clients = Client::get();
        $Suppliers = Supplier::get();
        return view("shipment.add",compact('Clients','Suppliers'));
    }

    public function create(Request $request)
    {
        Shipment::create([
            'is_selected'=>$request->input('is_selected'),
            'client_id'=>$request->input('client_id'),
            'supplier_id'=>$request->input('supplier_id'),
            'shipping_agent'=>$request->input('shipping_agent'),
        ]);
        return redirect()->route('shipments')->with("success","Shipment has been added successfully");
    }

    public function edit($id)
    {
        $Shipments=Shipment::findOrfail($id);
        $Clients = Client::get();
        $Suppliers = Supplier::get();
        return view("shipment.edit",compact('Clients','Suppliers','Shipments'));
    }

    public function update(Request $request , $id)
    {
        $Shipments=Shipment::findOrfail($id);
        $Shipments->update([
            'is_selected'=>$request->input('is_selected'),
            'client_id'=>$request->input('client_id'),
            'supplier_id'=>$request->input('supplier_id'),
            'shipping_agent'=>$request->input('shipping_agent'),
        ]);
        return redirect()->route('shipments');
    }

    public function delete($id)
    {
        $Shipments=Shipment::where('id',$id)->delete();
        return redirect()->route('shipments');
    }
}