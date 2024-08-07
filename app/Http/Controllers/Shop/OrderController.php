<?php

namespace App\Http\Controllers\Shop;

use App\Models\User;
use App\Models\Order;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\OrderStoreRequest;
use App\Http\Requests\OrderUpdateRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $order = auth()->user()->orders()->where('is_delivered',false)->first();
        $orders = auth()->user()->orders()->latest()

                ->where('is_delivered', true)
                ->paginate(10)
                ->withQueryString();

        return view('shop.orders.index', compact('orders', 'order'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Order $order): View
    {
        

        return view('shop.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Order $order): View
    {
        

        $users = User::pluck('name', 'id');

        return view('app.orders.edit', compact('order', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        OrderUpdateRequest $request,
        Order $order
    ): RedirectResponse {
        

        $validated = $request->validated();

        $order->update($validated);

        return redirect()
            ->route('orders.edit', $order)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Order $order): RedirectResponse
    {
        

        $order->delete();

        return redirect()
            ->route('orders.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
