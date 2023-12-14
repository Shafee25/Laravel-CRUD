<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\extension;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::latest()->paginate(5);
        return view('products.index',['products'=>$products]);
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
        // dd($request);

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'mrp' => 'required | numeric',
            'price' => 'required | numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
        ]);

        $imageName = time() . "." . $request->image->extension();
        $request->image->move(public_path('products'), $imageName);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->mrp = $request->mrp;
        $product->price = $request->price;
        $product->image = $imageName;

        $product->save(); // to save the data in database
        return back()->withSuccess('Product Added Successfully');
    }

    public function show($id){
        // $product = Product::find($id);
        // return view('products.show',['product'=>$product]);

        $product = Product::where('id',$id)->first();
        return view('products.show',['product'=>$product]);
    }

    public function edit($id){
        // $product = Product::find($id);
        // return view('products.show',['product'=>$product]);

        $product = Product::where('id',$id)->first();
        return view('products.edit',['product'=>$product]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'mrp' => 'required | numeric',
            'price' => 'required | numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
        ]);

        $product = new Product();

        $product = Product::where('id',$id)->first();

        if(isset($request->image)){
            $imageName = time() . "." . $request->image->extension();
            $request->image->move(public_path('products'), $imageName);
            $product->image = $imageName;
        }
        $product->name = $request->name;
        $product->description = $request->description;
        $product->mrp = $request->mrp;
        $product->price = $request->price;

        $product->save(); // to save the data in database
        return back()->withSuccess('Product Updated Successfully');
    }

    public function destroy($id){
        $product = Product::where('id',$id)->first();
        $product->delete();
        return back()->withSuccess('Product Deleted Successfully');
    }
}
