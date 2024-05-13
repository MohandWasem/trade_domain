<?php

namespace App\Http\Controllers\Setup;

use App\Models\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CurrencyController extends Controller
{
    public function index()
    {
        $Currencies = Currency::get();
        return view('Currency.show',compact('Currencies'));
    }

    public function add()
    {
        return view('Currency.add');
    }

    public function create(Request $request)
    {
        Currency::create([
            'currency_name'=>$request->input('currency_name'),
        ]);
        return redirect()->route('currencies')->with("success","Currency has been added successfully");
    }

    public function edit($id)
    {
        $Currencies = Currency::findOrfail($id);
        return view('Currency.edit',compact('Currencies'));
    }

    public function update(Request $request , $id)
    {
        $Currencies = Currency::findOrfail($id);
        $Currencies->update([
            'currency_name'=>$request->input('currency_name'),
        ]);
        return redirect()->route('currencies');
    }

    public function delete($id)
    {
        $Currencies = Currency::where('id',$id)->delete();
        return redirect()->route('currencies');
    }
}
