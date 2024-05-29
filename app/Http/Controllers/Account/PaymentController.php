<?php

namespace App\Http\Controllers\Account;

use App\Models\Payment;
use App\Models\Shipment;
use Illuminate\Http\Request;
use App\Models\ShipmentProduct;
use App\Models\ShipmentProductSale;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{

    public function index()
    {
        $Payments = Payment::with('shipment')->get();
        return view("Payment.show",compact('Payments'));
    }

    public function add($id)
    {
        // $ShipmentProduct = ShipmentProduct::findOrfail($id);
        $shipment = Shipment::with('clients','shipmentproduct','sales')->find($id);
        return view("Payment.add",compact('shipment'));
    }

    public function create(Request $request , $id)
    {
         $shipment = Shipment::find($id);

        Payment::create([
            'shipment_id' =>$request->input('shipment_id'),
            'client_id' =>$shipment->client_id,
            'amount_paid'=>$request->input('amount_paid'),
            'amount_due'=>$request->input('amount_due'),
        ]);

        ShipmentProductSale::whereIn('shipment_product_id', $shipment->shipmentproduct->pluck('id'))->delete();
        ShipmentProduct::where('shipment_id', $id)->delete();
        // $shipment->delete();

        return redirect()->route('shipments');
    }
}
