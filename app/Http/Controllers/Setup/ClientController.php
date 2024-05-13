<?php

namespace App\Http\Controllers\Setup;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function index()
    {
        $Clients = Client::get();
        return view("clients.show",compact('Clients'));
    }

    public function add()
    {
        return view("clients.add");
    }

    public function create(Request $request)
    {
        Client::create([
            'client_name'=>$request->input('client_name'),
            'contact_person'=>$request->input('contact_person'),
            'email'=>$request->input('email'),
            'telephone'=>$request->input('telephone'),
            'mobile'=>$request->input('mobile'),
            'address'=>$request->input('address'),
            'tax_id'=>$request->input('tax_id'),
            'notes'=>$request->input('notes'),
        ]);

        return redirect()->route('clients')->with("success","Client has been added successfully");
    }

    public function edit($id)
    {
        $Clients = Client::findOrfail($id);
        return view("clients.edit",compact('Clients'));
    }

    public function update(Request $request , $id)
    {
        $Clients = Client::findOrfail($id);
        $Clients->update([
            'client_name'=>$request->input('client_name'),
            'contact_person'=>$request->input('contact_person'),
            'email'=>$request->input('email'),
            'telephone'=>$request->input('telephone'),
            'mobile'=>$request->input('mobile'),
            'address'=>$request->input('address'),
            'tax_id'=>$request->input('tax_id'),
            'notes'=>$request->input('notes'),
        ]);
        return redirect()->route('clients');
    }

    public function delete($id)
    {
        $Clients = Client::where('id',$id)->delete();
        return redirect()->route('clients');
    }
}
