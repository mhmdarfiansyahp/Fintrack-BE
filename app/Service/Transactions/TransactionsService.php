<?php

namespace App\Service\Transactions;

use App\Models\transactions;
use Illuminate\Http\Request;

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
}
