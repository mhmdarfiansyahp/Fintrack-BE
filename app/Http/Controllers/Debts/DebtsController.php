<?php

namespace App\Http\Controllers\Debts;

use App\Http\Controllers\Controller;
use App\Models\Debts;
use App\Service\Debts\DebtsService;
use App\Utils\General\ApiResponse;
use Illuminate\Http\Request;

class DebtsController extends Controller
{
    public function __construct(private readonly DebtsService $debtsService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $debts = Debts::all();

        return ApiResponse::statusOk($debts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->debtsService->save(new Debts(), $request);

        return ApiResponse::statusCreated();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $debts = Debts::findOrFail($id);
        $this->debtsService->save($debts, $request);

        return ApiResponse::statusOk();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $debts = Debts::findOrFail($id);
        $this->debtsService->delete($debts);

        return ApiResponse::statusOk();
    }
}
