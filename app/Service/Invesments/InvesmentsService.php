<?php

namespace App\Service\Invesments;

use App\Models\Invesment;
use Illuminate\Http\Request;

class InvesmentsService
{

    public function save(Invesment $invesment, Request $request): void
    {
        $invesment->type = $request->input('type');
        $invesment->name = $request->input('name');
        $invesment->amount_invested = $request->input('amount_invested');
        $invesment->current_value = $request->input('current_value');
        $invesment->units = $request->input('units');
        $invesment->purchase_date = $request->input('purchase_date');
        $invesment->note = $request->input('note');
        $invesment->save();
    }

    public function delete(Invesment $invesment): void
    {
        $invesment->delete();
    }
}
