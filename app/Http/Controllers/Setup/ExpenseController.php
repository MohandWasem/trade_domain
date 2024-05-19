<?php

namespace App\Http\Controllers\Setup;

use App\Models\Expense;
use App\Models\Currency;
use App\Models\Shipment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExpenseController extends Controller
{

    public function index()
    {
        $Expenses = Expense::with('currencies')->get();
        return view("expenses.show",compact('Expenses'));
    }

    public function add($shipment_id)
    {
        $shipment = Shipment::findOrfail($shipment_id);
        $currencies = Currency::get();
        return view("expenses.add",compact('shipment','currencies'));
    }

    public function create(Request $request)
    {
        Expense::create([
            'expense_name'=>$request->input('expense_name'),
            'currency_id'=>$request->input('currency_id'),
            'expense_cost'=>$request->input('expense_cost'),
            'shipment_id'=>$request->input('shipment_id'),
        ]);

        return redirect()->route('shipments');
    }

    public function edit($id)
    {
        $currencies = Currency::get();
        $Expenses = Expense::findOrfail($id);
        return view('expenses.edit',compact('currencies','Expenses'));
    }

    public function update(Request $request , $id)
    {
        $Expenses = Expense::findOrfail($id);
        $Expenses->update([
            'expense_name'=>$request->input('expense_name'),
            'currency_id'=>$request->input('currency_id'),
            'expense_cost'=>$request->input('expense_cost'),
            'shipment_id'=>$request->input('shipment_id'),
        ]);
        return redirect()->route('Expenses');
    }

    public function delete($id)
    {
        $Expenses = Expense::where('id',$id)->delete();
        return redirect()->route('Expenses');
    }
}
