<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class PosController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $users = Auth::User();
        return view('orders.POS', compact('products', 'users'));
    }

    public function store(Request $request)
{
    try {
        $validated = $request->validate([
            'products' => 'required|array',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
            'payment_method' => 'required|in:cash,midtrans,qris',
        ]);

        $order = DB::transaction(function () use ($validated) {
            $total = 0;

            $order = Orders::create([
                'payment_method' => $validated['payment_method'],
                'total_price' => 0
            ]);

            foreach ($validated['products'] as $item) {
                $product = Product::findOrFail($item['product_id']);

                if ($product->stock < $item['quantity']) {
                    throw new \Exception("Stok {$product->name} tidak cukup.");
                }

                $product->decrement('stock', $item['quantity']);

                $itemTotal = $product->price * $item['quantity'];
                $total += $itemTotal;

                $order->items()->create([
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'price' => $product->price,
                ]);
            }

            $order->update(['total_price' => $total]);

            return $order;
        });

        return redirect()->route('orders.pos.index')->with('success', '✅ Order berhasil dibuat! Nomor Order: ' . $order->id);

    } catch (\Exception $e) {
        Log::error('Order creation failed: ' . $e->getMessage());
        return redirect()->back()->with('error', '❌ Gagal membuat order: ' . $e->getMessage());
    }
}

}
