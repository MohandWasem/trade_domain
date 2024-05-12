<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Offer;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ItemController extends Controller
{

    public function index()
    {
        $items=Item::with('offer')->get();
        return view('items.show',compact('items'));
    }
    public function show($offer_id)
    {
        $offer = Offer::findOrfail($offer_id);
        return view('items.add',compact('offer'));
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
            'offer_id'=>$request->input('offer_id'),
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
        return redirect()->route('items');
    }

    public function delete($id)
    {
        Item::where('id',$id)->delete();
        return redirect()->back();
    }

    public function downloadpdf($id)
    {
        // return $items=Offer::findOrfail($id)->with('items')->get();
         $offer = Offer::findOrfail($id);
          $items = $offer->items;

        $data = [
            'title'=>'Overseas Egypt',
            'date'=>date('m/d/Y'),
            'items'=>$items,
        ];
        $pdf = Pdf::loadView('items.pdf',$data);
        return $pdf->download('offer.pdf');
    }
}
