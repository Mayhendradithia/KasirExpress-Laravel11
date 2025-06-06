<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class PosController extends Controller
{
    public function create()
    {
        $products = Product::all();
        $users = Auth::User();
        return view('orders.POS', compact('products','users'));
    }

   public function store(Request $request)
{
    $product = Product::findOrFail($request->product_id);

    // Pastikan stok mencukupi
    if ($product->stock < $request->quantity) {
        return redirect()->back()->with('error', 'Stok tidak mencukupi!');
    }

    $total = $product->price * $request->quantity;

    // Buat order
    $order = Order::create([
        'product_id' => $product->id,
        'quantity' => $request->quantity,
        'total_price' => $total,
        'status' => 'processing',
        'payment_method' => $request->payment_method,
    ]);

    // Kurangi stok produk
    $product->stock -= $request->quantity;
    $product->save();

    return redirect()->back()->with('success', 'Order berhasil dibuat dan stok dikurangi!');
}


    public function edit($id)
    {
        $users = Auth::User();
        $order = Order::findOrFail($id);
        $products = Product::all();
        return view('orders.POS', compact('order', 'products','users'));
    }

    public function update(Request $request, $id)
    {
        $users = Auth::User();
        $order = Order::findOrFail($id);
        $order->update($request->all());

        return redirect()->back()->with('success', 'Order updated!');
    }

    public function destroy($id)
    {
        $users = Auth::User();
        Order::destroy($id);
        return redirect()->back()->with('success', 'Order deleted.');
    }
}
