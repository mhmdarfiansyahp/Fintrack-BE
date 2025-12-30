<?php

namespace App\Http\Controllers\Invesments;

use App\Http\Controllers\Controller;
use App\Models\Invesment;
use App\Service\Invesments\InvesmentsService;
use App\Utils\General\ApiResponse;
use Illuminate\Http\Request;

class InvesmentController extends Controller
{
 public function __construct(private readonly InvesmentsService $invesmentsService) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invesments = Invesment::all();

        return ApiResponse::statusOk($invesments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->invesmentsService->save(new Invesment(), $request);

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
        $invesment = Invesment::findOrFail($id);
        $this->invesmentsService->save($invesment, $request);

        return ApiResponse::statusOk();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $invesment = Invesment::findOrFail($id);
        $this->invesmentsService->delete($invesment);

        return ApiResponse::statusDeleted();
    }
}
