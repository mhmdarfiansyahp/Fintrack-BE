<?php

namespace App\Service\Debts;

use App\Models\Debts;
use Illuminate\Http\Request;

class DebtsService
{

    public function save(Debts $debts, Request $request): void
    {
        $debts->person_name = $request->input('person_name');
        $debts->type = $request->input('type');
        $debts->amount = $request->input('amount');
        $debts->due_date = $request->input('due_date');
        $debts->status = $request->input('status');
        $debts->note = $request->input('note');
        $debts->save();
    }

    public function delete(Debts $debts): void
    {
        $debts->delete();
    }

    public function getTopDebtsForDashboard(int $limit = 5)
    {
        return Debts::where('type', 'debt')
            ->where('status', 'pending')
            ->orderByDesc('amount')
            ->limit($limit)
            ->get();
    }
}
