<?php

namespace App\Http\Controllers\Transactions;

use App\Http\Controllers\Controller;
use App\Models\transactions;
use App\Service\Transactions\TransactionsService;
use App\Utils\General\ApiResponse;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function __construct(private readonly TransactionsService $transactionsService) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaction = transactions::all();

        return ApiResponse::statusOk($transaction);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->transactionsService->save(new transactions(), $request);

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
        $transaction = transactions::findOrFail($id);
        $this->transactionsService->save($transaction, $request);

        return ApiResponse::statusOk();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaction = transactions::findOrFail($id);
        $this->transactionsService->delete($transaction);

        return ApiResponse::statusDeleted();
    }

    public function weekly()
    {
        return response()->json(
            $this->transactionsService->weekly()
        );
    }
    
    public function expenseCategories()
    {
        return $this->transactionsService->expenseCategories();
    }
}
