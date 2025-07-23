<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assets = Asset::with(['periode', 'category'])->get();
        $categories = Category::all();
        return view('pages.asset.index', compact('assets', 'categories'));
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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required',
            'purchase_date' => 'required',
            'quantity' => 'required',
            'purchase_price' => 'required',
            'umur_ekonomis' => 'required|string|max:255',
            'penyusutan' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);


        try {
            Asset::create($validated);
            Alert::success('Success', 'Asset created successfully.');
            return redirect()->route('assets.index')->with('success', 'Asset created successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to create asset: ' . $e->getMessage());
            Alert::error('Error', 'Gagal membuat asset. Silakan coba lagi.');
            return redirect()->back()->with('error', 'Failed to create asset: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Asset $asset)
    {
        $categories = Category::all();
        return view('pages.asset.show', compact('asset', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asset $asset)
    {
        $categories = Category::all();
        return view('pages.asset.edit', compact('asset', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asset $asset)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required',
            'purchase_date' => 'required',
            'umur_ekonomis' => 'required|string|max:255',
            'penyusutan' => 'required|string|max:255',
            'quantity' => 'required|min:1',
            'purchase_price' => 'required|min:0',
            'location' => 'string|max:255',
            'status' => 'in:active,inactive',
        ]);

        try {
            $asset->update($validated);
            Alert::success('Success', 'Asset updated successfully.');
            return redirect()->route('assets.index')->with('success', 'Asset updated successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to update asset: ' . $e->getMessage());
            Alert::error('Error', 'Gagal memperbarui asset. Silakan coba lagi');
            return redirect()->back()->with('error', 'Failed to update asset: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asset $asset)
    {
        try {
            $asset->delete();
            Alert::success('Success', 'Asset deleted successfully.');
            return redirect()->route('assets.index')->with('success', 'Asset deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete asset: ' . $e->getMessage());
        }
    }
}
