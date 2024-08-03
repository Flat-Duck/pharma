<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\AdStoreRequest;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AdUpdateRequest;
use Illuminate\Support\Facades\Storage;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Ad::class);

        $search = $request->get('search', '');

        $ads = Ad::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.ads.index', compact('ads', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Ad::class);

        $products = Product::pluck('name', 'id');

        return view('app.ads.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Ad::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('/uploads/ads');
            $file->move($destinationPath, $filename);
            $validated['image'] = 'uploads/ads/' . $filename;
        }

        $ad = Ad::create($validated);

        return redirect()
            ->route('ads.edit', $ad)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Ad $ad): View
    {
        $this->authorize('view', $ad);

        return view('app.ads.show', compact('ad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Ad $ad): View
    {
        $this->authorize('update', $ad);

        $products = Product::pluck('name', 'id');

        return view('app.ads.edit', compact('ad', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdUpdateRequest $request, Ad $ad): RedirectResponse
    {
        $this->authorize('update', $ad);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($ad->image) {
                Storage::delete($ad->image);
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('/uploads/ads');
            $file->move($destinationPath, $filename);
            $validated['image'] = 'uploads/ads/' . $filename;
        }

        $ad->update($validated);

        return redirect()
            ->route('ads.edit', $ad)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Ad $ad): RedirectResponse
    {
        $this->authorize('delete', $ad);

        if ($ad->image) {
            Storage::delete($ad->image);
        }

        $ad->delete();

        return redirect()
            ->route('ads.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
