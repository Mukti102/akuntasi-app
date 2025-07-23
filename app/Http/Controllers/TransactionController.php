<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with(['periode', 'user'])->get();
        return view('pages.transaksi.index', compact('transactions'));
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
            'type' => 'required|in:income,expense',
            'transaction_date' => 'required',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:500',
        ]);


        $periode = Periode::where('status', '1')->first();
        if (!$periode) {
            Alert::error('Error', 'Tidak ada periode aktif. Silakan buat periode terlebih dahulu.');
            return redirect()->back()->with('error', 'Tidak ada periode aktif. Silakan buat periode terlebih dahulu.');
        }

        $validated['periode_id'] = $periode->id;

        try {
            Transaction::create($validated);
            Alert::success('Success', 'Transaction created successfully.');
            return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to create transaction: ' . $e->getMessage());
            Alert::error('Error', 'Gagal membuat transaksi. Silakan coba lagi.');
            return redirect()->back()->with('error', 'Failed to create transaction: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        return view('pages.transaksi.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        return view('pages.transaksi.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:income,expense',
            'transaction_date' => 'required',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:500',
        ]);

        try {
            $transaction->update($validated);
            Alert::success('Success', 'Transaction updated successfully.');
            return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to update transaction: ' . $e->getMessage());
            Alert::error('Error', 'Gagal memperbarui transaksi. Silakan coba lagi.');
            return redirect()->back()->with('error', 'Failed to update transaction: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
