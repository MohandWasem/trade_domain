<?php

namespace App\Http\Controllers\Setup;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupplierController extends Controller
{
    public function index()
    {
        $Suppliers = Supplier::get();
        return view("suppliers.show",compact('Suppliers'));
    }

    public function add()
    {
        return view("suppliers.add");
    }

    public function create(Request $request)
    {
        Supplier::create([
            'supplier_name'=>$request->input('supplier_name'),
            'contact_person'=>$request->input('contact_person'),
            'email'=>$request->input('email'),
            'telephone'=>$request->input('telephone'),
            'mobile'=>$request->input('mobile'),
            'address'=>$request->input('address'),
            'tax_id'=>$request->input('tax_id'),
            'notes'=>$request->input('notes'),
        ]);
        return redirect()->route('suppliers')->with("success","Suppliers has been added successfully");
    }

    public function edit($id)
    {
        $Suppliers = Supplier::findOrfail($id);
        return view("suppliers.edit",compact('Suppliers'));
    }

    public function update(Request $request ,$id)
    {
        $Suppliers = Supplier::findOrfail($id);
        $Suppliers->update([
            'supplier_name'=>$request->input('supplier_name'),
            'contact_person'=>$request->input('contact_person'),
            'email'=>$request->input('email'),
            'telephone'=>$request->input('telephone'),
            'mobile'=>$request->input('mobile'),
            'address'=>$request->input('address'),
            'tax_id'=>$request->input('tax_id'),
            'notes'=>$request->input('notes'),
        ]);
        return redirect()->route('suppliers');
    }

    public function delete($id)
    {
        $Suppliers = Supplier::where('id',$id)->delete();
        return redirect()->route('suppliers');
    }
}
