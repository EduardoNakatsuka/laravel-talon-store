<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class ProductController extends Controller
{
    public function search(Request $request)
    {
        $products = Product::where('name', $request->search)
            ->paginate(10)
            ->toArray();

        return view('products', [
            'products' => $products,
        ]);
    }

    public function addNewProduct(Request $request)
    {
        if (! Auth::user()) {
            return;
        }

        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|integer',
            'description' => 'sometimes|required',
        ]);

        $productData = $request->only('name', 'price', 'description');

        $product = Product::create($productData);

        return view('index', [
            'products' => Product::paginate(10)->toArray(),
        ]);
    }

    public function deleteProduct(Product $product)
    {
        if (! Auth::user()) {
            return;
        }

        $product->delete();

        return view('index', [
            'products' => Product::paginate(10)->toArray(),
        ]);
    }

    public function addToCart($productId)
    {
        $productsInCookie = Cookie::get('products');

        if ($productsInCookie != null) {
            Cookie::queue('products', (string) $productsInCookie . ', ' . $productId, 99999);
        } else {
            Cookie::queue('products', (string) $productId, 99999);
        }

        return view('index', [
            'products' => Product::paginate(10)->toArray(),
        ]);
    }

    public function removeFromCart($productToRemove)
    {
        $productsInCookie = array_map('intval', explode(', ', Cookie::get('products')));

        $finalProducts = array_filter($productsInCookie, function ($product) use ($productToRemove) {
            return $product != $productToRemove;
        });

        Cookie::queue('products', (string) implode(', ', $finalProducts), 99999);

        $products = Product::whereIn('id', $finalProducts)->get();

        return view('cart', [
            'products' => $products->toArray(),
        ]);
    }

    public function getCart()
    {
        $productsInCookie = array_map('intval', explode(', ', Cookie::get('products')));

        $products = Product::whereIn('id', $productsInCookie)->get();

        return view('cart', [
            'products' => $products->toArray(),
        ]);
    }

    public function checkout()
    {
        Cookie::queue('products', (string) '', 99999);

        // Cookie::forget('products');

        return view('index', [
            'products' => Product::paginate(10)->toArray(),
        ]);
    }
}
