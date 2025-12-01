<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlists';

    protected $fillable = [
        'item_name',
        'target_amount',
        'saved_amount',
        'target_date',
        'status',
        'note',
    ];
}
