<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductToCartRequest;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(AddProductToCartRequest $request)
    {

        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity', 1);
        $product = Product::find($product_id);
        if ($product->quantity < $quantity) {
            return response()->json(['message' => 'Số lượng'. $product->name .' không đủ'], 400);
        }
        if (auth()->check()) {
            $cartItem = Cart::where('user_id', auth()->id())
                ->where('product_id', $product_id)
                ->first();

            if ($cartItem) {
                $cartItem->update(['quantity' => $quantity]);
            } else {
                Cart::create([
                    'user_id' => auth()->id(),
                    'product_id' => $product_id,
                    'quantity' => $quantity,
                ]);
            }
            $cartTotal = Cart::where('user_id', auth()->id())->count();

        } else {
            $cart = session()->get('cart', []);
            $cart[$product_id] = $quantity;
            session()->put('cart', $cart);
            $cartTotal = count($cart);
        }
        return response()->json(['message' => 'Sản phẩm đã được thêm vào giỏ hàng', 'cart_total' =>$cartTotal], 200);
    }
    public function removeFromCart(Request $request){
        $product_id = $request->input('product_id');

        if (auth()->check()) {
            Cart::where('user_id', auth()->id())
                ->where('product_id', $product_id)
                ->delete();
            $CartTotal = Cart::where('user_id', auth()->id())->count();
        } else {
            $cart = session()->get('cart', []);
            if (isset($cart[$product_id])) {
                unset($cart[$product_id]);
            }
            session()->put('cart', $cart);
            $CartTotal = count($cart);
        }
        return response()->json(['message' => 'Sản phẩm đã được xóa khỏi giỏ hàng','cart_total' =>$CartTotal], 200);
    }
    public function showCart()
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

        return view('content.cart.index', compact('cartItems'));
    }
}
