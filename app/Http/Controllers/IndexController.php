<?php

namespace App\Http\Controllers;

use App\Product;

class IndexController extends Controller
{
    public function index()
    {
        return view('index', [
            'products' => Product::paginate(10)->toArray()
        ]);
    }
}
