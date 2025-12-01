<?php

namespace App\Service\Wishlist;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistService
{

    public function save(Wishlist $wishlist, Request $request): void
    {
        $wishlist->item_name = $request->input('item_name');
        $wishlist->target_amount = $request->input('target_amount');
        $wishlist->saved_amount = $request->input('saved_amount');
        $wishlist->target_date = $request->input('target_date');
        $wishlist->status = $request->input('status');
        $wishlist->note = $request->input('note');
        $wishlist->save();
    }

    public function delete(Wishlist $wishlist): void
    {
        $wishlist->delete();
    }
}