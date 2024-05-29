<?php

namespace App\Http\Controllers\Setup;

use App\Models\Client;
use App\Models\Expense;
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
        Expense::where('shipment_id', $id)->delete();
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

        //    ------------ AllTotalPriceCurrencyExpenses---------  //
        $totalExpenseGBP = $Expenses->where('currency_id', '2')->sum('expense_cost');
        $totalExpenseUSD = $Expenses->where('currency_id', '1')->sum('expense_cost');
        $totalExpenseEUR = $Expenses->where('currency_id', '3')->sum('expense_cost');

        //    ------------ AllTotalPriceCurrencyProducts---------  //
        $totalProductGBP = $shipmentproduct->where('currency_id', '2')->sum('total_price');
        $totalProductUSD = $shipmentproduct->where('currency_id', '1')->sum('total_price');
        $totalProductEUR = $shipmentproduct->where('currency_id', '3')->sum('total_price');

        //    ------------ AllTotalPriceCurrencySales---------  //
        $totalSaleGBP = $Sales->where('currency_id', '2')->sum('total_sales_price');
        $totalSaleUSD = $Sales->where('currency_id', '1')->sum('total_sales_price');
        $totalSaleEUR = $Sales->where('currency_id', '3')->sum('total_sales_price');

       //    ------------ AllTotalPriceCurrencyDiff---------  //
        $differenceGBP = $totalSaleGBP - $totalExpenseGBP - $totalProductGBP;
        $differenceUSD = $totalSaleUSD - $totalExpenseUSD - $totalProductUSD;
        $differenceEUR = $totalSaleEUR - $totalExpenseEUR - $totalProductEUR;

        //    ------------ AllTotalPriceCurrencyAdd---------  //
        $AddGBP = $totalProductGBP + $totalExpenseGBP + $totalSaleGBP;
        $AddUSD = $totalProductUSD + $totalExpenseUSD + $totalSaleUSD;
        $AddEUR = $totalProductEUR + $totalExpenseEUR + $totalSaleEUR;

        $data = [
            'title'=>'Overseas Egypt',
            'date'=>date('m/d/Y'),
            'shipmentproduct'=>$shipmentproduct,
            'Shipments'=>$Shipments,
            'Sales'=>$Sales,
            'Expenses'=>$Expenses,
            'totalShipmentCosts'=>$totalShipmentCosts,
            'SubtractTotalCost'=>$SubtractTotalCost,
            'differenceGBP'=>$differenceGBP,
            'differenceUSD'=>$differenceUSD,
            'differenceEUR'=>$differenceEUR,
            'AddGBP'=>$AddGBP,
            'AddUSD'=>$AddUSD,
            'AddEUR'=>$AddEUR,
        ];
        $pdf = Pdf::loadView('shipment.pdf',$data);
        return $pdf->download('invoice.pdf');
    }
}
