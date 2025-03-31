<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /* if __invoke and only I function inside the controller, it doesn't need to call the function on routes */
    public function __invoke()
    {
        $products = Product::paginate();

        return response()->json($products);
    }
}
