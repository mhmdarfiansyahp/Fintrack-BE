<?php

namespace App\Http\Controllers\Wishlist;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use App\Service\Wishlist\WishlistService;
use App\Utils\General\ApiResponse;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function __construct(private readonly WishlistService $wishlistService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wishlist = Wishlist::all();

        return ApiResponse::statusOk($wishlist);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->wishlistService->save(new Wishlist(), $request);

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
        $wishlist = Wishlist::findOrFail($id);
        $this->wishlistService->save($wishlist, $request);

        return ApiResponse::statusOk();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $wishlist = Wishlist::findOrFail($id);
        $this->wishlistService->delete($wishlist);

        return ApiResponse::statusOk();
    }
}
