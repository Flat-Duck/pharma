<?php

namespace App\Http\Controllers;

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
        $this->authorize('view-any', Order::class);

        $search = $request->get('search', '');

        $orders = Order::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.orders.index', compact('orders', 'search'));
    }
        /**
     * Display a listing of the resource.
     */
    public function sales(Request $request): View
    {
        $this->authorize('view-any', Order::class);



        $orders = Order::where('is_delivered',true)
            ->latest()
            ->paginate(500)
            ->withQueryString();

        return view('app.orders.sales', compact('orders'));
    }
    public function followup(Request $request): View
    {
        $this->authorize('view-any', Order::class);

        $search = $request->get('search', '');

        $orders = Order::search($search)
            ->notCompleted()
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.orders.followup', compact('orders', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Order::class);

        $users = User::pluck('name', 'id');

        return view('app.orders.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Order::class);

        $validated = $request->validated();

        $order = Order::create($validated);

        return redirect()
            ->route('orders.edit', $order)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Order $order): View
    {
        $this->authorize('view', $order);

        return view('app.orders.show', compact('order'));
    }

    /**
     * Display the specified resource.
     */
    public function print(Request $request, Order $order): View
    {
        

        return view('app.orders.print', compact('order'));
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
    public function update_order_status_one(Request $request, Order $order)
    {
       $order->status = 'طلبك قيد الاعداد';
       $order->save();

        return redirect()->route('orders.print',$order);
    }
    public function update_order_status_two(Request $request, Order $order)
    {
       $order->status = 'طلبك قيد التوصيل';
       $order->save();

        return redirect()->back();
    }
    public function update_order_status_three(Request $request, Order $order)
    {
       $order->status = 'تم التسليم';
       $order->is_delivered = true;
       $order->save();
       $this->finalizeOrder($order);

        return redirect()->back();
    }
    private function finalizeOrder($order)
    {
        foreach ($order->products as  $product) {
            $product->decrement('quantity', $product->ordered->quantity);
        }
        
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
