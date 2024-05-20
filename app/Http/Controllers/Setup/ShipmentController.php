<?php

namespace App\Http\Controllers\Setup;

use App\Models\Client;
use App\Models\Shipment;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\ShipmentProduct;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\ShipmentProductSale;
use App\Http\Controllers\Controller;

class ShipmentController extends Controller
{
    public function index()
    {
        $Shipments=Shipment::with('clients','suppliers')->get();
        $ShipmentProducts=ShipmentProduct::with('products','shipment','currencies')->get();
        $ShipmentProductSales=ShipmentProductSale::with('products')->get();
        return view("shipment.show",compact('Shipments','ShipmentProducts','ShipmentProductSales'));
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

    public function invoicepdf($id)
    {
        $Shipments = Shipment::findOrfail($id);
        $shipmentproduct = $Shipments->shipmentproduct;
        $Expenses = $Shipments->expenses;
        $Products = ShipmentProduct::findOrfail($id);
        $Sales = $Products->sales;
        
        //    ------------ AllTotalPrice---------  //
        $totalProductCost = $shipmentproduct->sum('total_price');
        $totalExpenseCost = $Expenses->sum('expense_cost');
        $totalSales = $Sales->sum('total_sales_price');
        $totalShipmentCosts = $totalProductCost + $totalExpenseCost + $totalSales;
        $SubtractTotalCost = $totalShipmentCosts - $totalExpenseCost;
        $data = [
            'title'=>'Overseas Egypt',
            'date'=>date('m/d/Y'),
            'shipmentproduct'=>$shipmentproduct,
            'Shipments'=>$Shipments,
            'Sales'=>$Sales,
            'Expenses'=>$Expenses,
            'totalShipmentCosts'=>$totalShipmentCosts,
            'SubtractTotalCost'=>$SubtractTotalCost,
        ];
        $pdf = Pdf::loadView('shipment.pdf',$data);
        return $pdf->download('invoice.pdf');
    }
}
