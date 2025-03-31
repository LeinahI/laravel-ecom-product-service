<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cart\StoreRequest;
use App\Http\Requests\Cart\UpdateRequest;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = request()->user();

        $cart = Cart::with('product')->whereUserId($user->id)->get();

        return response()->json($cart);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $validatedRequest = $request->validated();
        Log::info($validatedRequest);

        $cart = Cart::whereUserId($validatedRequest['user_id'])
            ->whereProductId($validatedRequest['product_id'])
            ->first();

        if ($cart) {
            $cart->update([
                'quantity' => $cart->quantity + $validatedRequest['quantity'],
            ]);
        } else {
            $cart = Cart::create($validatedRequest);
        }

        return response()->noContent();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Cart $cart)
    {
        $validatedRequest = $request->validated();

        $cart->update($validatedRequest);

        return response()->noContent();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return response()->noContent();
    }
}
