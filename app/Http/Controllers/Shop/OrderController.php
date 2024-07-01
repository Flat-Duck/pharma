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
        $orders = Order::latest()
                ->paginate(5)
                ->withQueryString();

        return view('shop.orders.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Order $order): View
    {
        $this->authorize('view', $order);

        return view('shop.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Order $order): View
    {
        $this->authorize('update', $order);

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
        $this->authorize('update', $order);

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
        $this->authorize('delete', $order);

        $order->delete();

        return redirect()
            ->route('orders.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
