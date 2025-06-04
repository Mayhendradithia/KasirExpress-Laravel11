<?php

namespace App\Http\Controllers\vendor;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        $users = Auth::User();
        return view('vendor.index', compact('product', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = Product::all();
        $users = Auth::User();
        return view('vendor.create', compact('product', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        Product::create($request->only(['name', 'description', 'price', 'stock']));

        return redirect()->route('vendor.index')->with('success', 'Product created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)

    {

        $product = Product::all();
        $users = Auth::User();
        return view('vendor.show', compact('product', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id); // hanya ambil 1 product
        $users = Auth::user();
        return view('vendor.edit', compact('product', 'users'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $product = Product::findOrFail($id); 
        $product->update($request->only(['name', 'description', 'price', 'stock']));

        return redirect()->route('vendor.index')->with('success', 'Product updated!');
    }


    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {

        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('vendor.index')->with('success', 'Berhasil hapus!');
    }
}
