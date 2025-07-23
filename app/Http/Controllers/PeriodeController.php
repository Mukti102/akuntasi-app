<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $periodes = Periode::all();
        return view('pages.periode.index', compact('periodes'));
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
            'periode_name' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'status' => 'nullable',
            'saldo' => 'required|min:0', // Ensure saldo is required and a positive number
            'keterangan' => 'nullable|string|max:500',
        ]);
        try {
            $periode = Periode::create($validated);

            $periodes = Periode::all();
            if ($periode->status == 1) {
                foreach ($periodes as $p) {
                    if ($p->id !== $periode->id) {
                        $p->status = 0; // Set other periodes to inactive
                        $p->save();
                    }
                }
            }


            Alert::success('Success', 'Periode created successfully.');
            return redirect()->back()->with('success', 'Periode created successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to create periode: ' . $e->getMessage());
            Alert::error('Error', 'Gagal membuat periode. Silakan coba lagi.');
            return redirect()->back()->with('error', 'Failed to create periode: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Periode $periode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Periode $periode)
    {
        return view('pages.periode.edit', compact('periode'));
    }

    public function print($id)
    {
        $periode = Periode::findOrFail($id);
        $transactions = Transaction::where('periode_id', $id)->get();

        $pdf = Pdf::loadView('pages.transaksi.print', [
            'periode' => $periode,
            'transactions' => $transactions,
        ]);

        return $pdf->stream('laporan-transaksi.pdf');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Periode $periode)
    {

        $validated = $request->validate([
            'periode_name' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'tanggal_mulai' => 'required',
            'saldo' => 'required|min:0', // Ensure saldo is required and a positive number
            'tanggal_selesai' => 'required',
            'status' => 'nullable',
            'keterangan' => 'nullable|string|max:500',
        ]);

        if ($request->has('status')) {
            $validated['status'] = $request->input('status') === 'on' ? 1 : 0;
        } else {
            $validated['status'] = 0; // Default to inactive if not set
        }



        try {
            $periode->update($validated);

            if ($periode->status == 1) {
                $otherPeriodes = Periode::where('id', '!=', $periode->id)->get();
                foreach ($otherPeriodes as $p) {
                    $p->status = 0; // Set other periodes to inactive
                    $p->save();
                }
            }

            Alert::success('Success', 'Periode updated successfully.');
            return redirect()->route('periodes.index')->with('success', 'Periode updated successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to update periode: ' . $e->getMessage());
            Alert::error('Error', 'Gagal update periode. Silakan coba lagi.');
            return redirect()->back()->with('error', 'Failed to update periode: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Periode $periode)
    {
        try {
            $periode->delete();
            Alert::success('Success', 'Periode deleted successfully.');
            return redirect()->back()->with('success', 'Periode deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to delete periode: ' . $e->getMessage());
            Alert::error('Error', 'Gagal menghapus periode. Silakan coba lagi.');
            return redirect()->back()->with('error', 'Failed to delete periode: ' . $e->getMessage());
        }
    }
}
