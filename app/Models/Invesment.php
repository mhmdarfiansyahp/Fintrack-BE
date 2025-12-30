<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invesment extends Model
{
    protected $table = 'invesments';

    protected $fillable = [
        'type',
        'name',
        'amount_invested',
        'current_value',
        'units',
        'purchase_date',
        'note',
    ];
}
