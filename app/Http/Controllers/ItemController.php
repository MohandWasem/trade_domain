<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function show()
    {
        return view('items.add');
    }

    public function create(Request $request)
    {
        Item::create([
            'description'=>$request->input('description'),
            'quantity'=>$request->input('quantity'),
            'price'=>$request->input('price'),
            'currency'=>$request->input('currency'),
            'conversion_rate'=>$request->input('conversion_rate'),
            'total_price'=>$request->input('total_price'),
        ]);
        return redirect()->route('offers');
    }

    public function edit($id)
    {
        $Items=Item::findOrfail($id);
        return view('items.edit',compact('Items'));
    }

    public function update(Request $request , $id)
    {
        $Items=Item::findOrfail($id);

        $Items->update([
            'description'=>$request->input('description'),
            'quantity'=>$request->input('quantity'),
            'price'=>$request->input('price'),
            'currency'=>$request->input('currency'),
            'conversion_rate'=>$request->input('conversion_rate'),
            'total_price'=>$request->input('total_price'),
        ]);
        return redirect()->route('offers');
    }

    public function delete($id)
    {
        Item::where('id',$id)->delete();
        return redirect()->back();
    }
}
