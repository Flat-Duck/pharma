<?php

namespace App\Http\Controllers\Shop;

use App\Models\Cart;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CartStoreRequest;
use App\Http\Requests\CartUpdateRequest;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Cart::class);
        return view('shop.cart');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Cart::class);

        $users = User::pluck('name', 'id');

        return view('app.carts.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CartStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Cart::class);

        $validated = $request->validated();

        $cart = Cart::create($validated);

        return redirect()
            ->route('carts.edit', $cart)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Cart $cart): View
    {
        $this->authorize('view', $cart);

        return view('app.carts.show', compact('cart'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Cart $cart): View
    {
        $this->authorize('update', $cart);

        $users = User::pluck('name', 'id');

        return view('app.carts.edit', compact('cart', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        CartUpdateRequest $request,
        Cart $cart
    ): RedirectResponse {
        $this->authorize('update', $cart);

        $validated = $request->validated();

        $cart->update($validated);

        return redirect()
            ->route('carts.edit', $cart)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Cart $cart): RedirectResponse
    {
        $this->authorize('delete', $cart);

        $cart->delete();

        return redirect()
            ->route('carts.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
