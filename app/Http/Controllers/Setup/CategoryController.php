<?php

namespace App\Http\Controllers\Setup;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $Categories = Category::get();
        return view("category.show",compact('Categories'));
    }

    public function add()
    {
        return view("category.add");
    }

    public function create(Request $request)
    {
        Category::create([
            'category_name'=>$request->input('category_name'),
        ]);
        return redirect()->route('categories')->with("success","Category has been added successfully");
    }

    public function edit($id)
    {
        $Categories = Category::findOrfail($id);
        return view("category.edit",compact('Categories'));

    }

    public function update(Request $request , $id)
    {
        $Categories = Category::findOrfail($id);
        $Categories->update([
            'category_name'=>$request->input('category_name'),
        ]);
        return redirect()->route('categories');
    }

    public function delete($id)
    {
        $Categories = Category::where('id',$id)->delete();
        return redirect()->route('categories');
    }
}
