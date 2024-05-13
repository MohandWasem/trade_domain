<?php

namespace App\Http\Controllers\Setup;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $Products = Product::with('categories')->get();
        return view('products.show',compact('Products'));
    }

    public function add()
    {
        $Categories = Category::get();
        return view('products.add',compact('Categories'));
    }

    public function create(Request $request)
    {
        Product::create([
            'product_name'=>$request->input('product_name'),
            'product_arabic_name'=>$request->input('product_arabic_name'),
            'product_description'=>$request->input('product_description'),
            'product_arabic_description'=>$request->input('product_arabic_description'),
            'category_id'=>$request->input('category_id'),
            'part_number'=>$request->input('part_number'),
            'hs_code'=>$request->input('hs_code'),
        ]);
        return redirect()->route('products')->with("success","Product has been added successfully");
    }

    public function edit($id)
    {
        $Products = Product::findOrfail($id);
        $Categories = Category::get();
        return view('products.edit',compact('Categories','Products'));
    }

    public function update(Request $request , $id)
    {
        $Products = Product::findOrfail($id);
        $Products->update([
            'product_name'=>$request->input('product_name'),
            'product_arabic_name'=>$request->input('product_arabic_name'),
            'product_description'=>$request->input('product_description'),
            'product_arabic_description'=>$request->input('product_arabic_description'),
            'category_id'=>$request->input('category_id'),
            'part_number'=>$request->input('part_number'),
            'hs_code'=>$request->input('hs_code'),
        ]);
        return redirect()->route('products');
    }

    public function delete($id)
    {
        $Products = Product::where('id',$id)->delete();
        return redirect()->route('products');
    }
}
