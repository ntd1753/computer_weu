<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function detail($slug)
    {
        $product = Product::where('slug', $slug)->first();
        if ($product) {
            return view('content.product.detail', compact('product'));
        } else {
            return redirect()->route('home');
        }
    }
}
