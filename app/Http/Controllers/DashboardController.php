<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Periode;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        // Ambil data transaksi per bulan
        $monthlyData = Transaction::selectRaw('
            MONTH(transaction_date) as month,
            type,
            SUM(amount) as total
        ')
            ->groupBy('month', 'type')
            ->orderBy('month')
            ->get();

        // Inisialisasi array bulan dan pendapatan/pengeluaran
        $months = collect(range(1, 12))->map(function ($month) {
            return Carbon::create()->month($month)->format('M');
        });

        $income = [];
        $expense = [];

        foreach (range(1, 12) as $month) {
            $incomeAmount = $monthlyData->firstWhere('month', $month)?->type === 'income'
                ? $monthlyData->firstWhere('month', $month)?->total
                : 0;

            $expenseAmount = $monthlyData->firstWhere('month', $month)?->type === 'expense'
                ? $monthlyData->firstWhere('month', $month)?->total
                : 0;

            // Filter lebih akurat
            $income[] = $monthlyData->where('month', $month)->where('type', 'income')->sum('total');
            $expense[] = $monthlyData->where('month', $month)->where('type', 'expense')->sum('total');
        }

        $periodes = Periode::all();
        $transactions = Transaction::all();
        $assets = Asset::all();

        return view('pages.dashboard', compact('months', 'income', 'expense', 'periodes', 'transactions', 'assets'));
    }
}
