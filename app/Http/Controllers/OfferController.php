<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    public function index()
    {
        $Offers=Offer::get();
        return view("offers.show",compact('Offers'));
    }

    public function show()
    {
        return view("offers.add");
    }

    public function create(Request $request)
    {
        Offer::create([
        'client'=>$request->client,
        'date'=>$request->date,
        'sales_man'=>$request->sales_man,
        ]);
        return redirect()->route('offers')->with("success","Offer has been added successfully");
    }

    public function edit($id)
    {
        $Offers=Offer::findOrfail($id);
        return view("offers.edit",compact('Offers'));
    }

    public function update(Request $request , $id)
    {
        $Offers=Offer::findOrfail($id);
        $Offers->update([
            'client'=>$request->client,
            'date'=>$request->date,
            'sales_man'=>$request->sales_man,
        ]);
        return redirect()->route('offers');
    }

    public function delete($id)
    {
        Offer::where('id',$id)->delete();
        return redirect()->back();
    }


    public function logout()
    {
        Auth::guard("web")->logout();
        return redirect()->route("login");
    }
}
