<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transactions extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
        'category_id',
        'amount',
        'date',
        'note',
    ];
}
