<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceOrderRequest;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
        } else {
            $cart = session()->get('cart', []);
            $cartItems = Product::whereIn('id', array_keys($cart))
                ->get()
                ->map(function ($product) use ($cart) {
                    $product->quantity = $cart[$product->id];
                    return $product;
                });
        }
        $paymentMethod = PaymentMethod::all();
        return view('content.order.index', compact('cartItems','paymentMethod'));
    }
    public function placeOrder(PlaceOrderRequest $request)
    {


        DB::beginTransaction();
        try {
            $cartItems = auth()->check()
                ? Cart::where('user_id', auth()->id())->get()
                : collect(session('cart', []));

            if ($cartItems->isEmpty()) {
                return response()->json(['message' => 'Giỏ hàng trống'], 400);
            }

            $totalPrice = 0;
            $order = Order::create([
                'user_id' => auth()->id(),
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'customer_phone' => $request->customer_phone,
                'customer_address' => $request->customer_address,
                'total_price' => 0, // Sẽ cập nhật lại sau
                'status' => 'pending',
            ]);

            foreach ($cartItems as $item) {
                $product = Product::find($item->product_id ?? $item['product_id']);
                if (!$product) continue;

                $price = $product->price;
                $quantity = $item->quantity ?? $item['quantity'];
                $totalPrice += $price * $quantity;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $price,
                ]);
            }

            $order->update(['total_price' => $totalPrice]);

            if (auth()->check()) {
                CartItem::where('user_id', auth()->id())->delete();
            } else {
                session()->forget('cart');
            }

            DB::commit();

            return response()->json(['message' => 'Đặt hàng thành công', 'order_id' => $order->id]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Đặt hàng thất bại', 'error' => $e->getMessage()], 500);
        }
    }
}
