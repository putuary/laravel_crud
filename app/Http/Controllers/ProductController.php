<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function showLanding()
    {
        $products = Product::all();

        return view('landing', compact('products'));
    }

    public function index()
    {
        $products = Product::all();

        return view('dashboard', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image_url' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        Product::create([
            'name' => $request->name,
            'image_url' => $request->image_url,
            'price' => $request->price,
            'description' => $request->description
        ]);

        return redirect()->route('dashboard')->with('success', 'Product created successfully');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image_url' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
        $product = Product::where('id', $id)->update([
            'name' => $request->name,
            'image_url' => $request->image_url,
            'price' => $request->price,
            'description' => $request->description
        ]);
        
        return redirect()->route('dashboard')->with('success', 'Product updated successfully');
    }

    public function destroy($id)
    {
        Product::where('id', $id)->delete();
        return redirect()->route('dashboard')->with('success', 'Product deleted successfully');
    }
}
