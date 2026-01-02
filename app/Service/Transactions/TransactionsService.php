<?php

namespace App\Service\Transactions;

use App\Models\transactions;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TransactionsService
{

    public function save(transactions $transactions, Request $request): void
    {
        $transactions->category_id = $request->input('category_id');
        $transactions->amount = $request->input('amount');
        $transactions->date = $request->input('date');
        $transactions->note = $request->input('note');
        $transactions->save();
    }

    public function delete(transactions $transactions): void
    {
        $transactions->delete();
    }

    public function weekly()
    {
        $now = Carbon::now();

        $start = $now->copy()->startOfWeek()->startOfDay();
        $end   = $now->copy()->endOfWeek()->endOfDay();

        $data = DB::table('transactions')
            ->join('categories', 'transactions.category_id', '=', 'categories.id')
            ->selectRaw("
            DATE(transactions.date) as date,
            SUM(
                CASE 
                    WHEN categories.type = 'income' 
                    THEN transactions.amount 
                    ELSE 0 
                END
            ) as income,
            SUM(
                CASE 
                    WHEN categories.type = 'expense' 
                    THEN transactions.amount 
                    ELSE 0 
                END
            ) as expense
        ")
            ->whereBetween('transactions.date', [$start, $end])
            ->whereMonth('transactions.date', $now->month)
            ->whereYear('transactions.date', $now->year)
            ->groupBy(DB::raw('DATE(transactions.date)'))
            ->orderBy('date')
            ->get();

        return response()->json($data);
    }

    public function expenseCategories()
    {
        $now = Carbon::now('Asia/Jakarta');

        return DB::table('transactions')
            ->join('categories', 'transactions.category_id', '=', 'categories.id')
            ->selectRaw('
                categories.name as name,
                SUM(transactions.amount) as value
            ')
            ->where('categories.type', 'expense')
            ->whereMonth('transactions.date', $now->month)
            ->whereYear('transactions.date', $now->year)
            ->groupBy('categories.name')
            ->orderByDesc('value')
            ->get();
    }
}
