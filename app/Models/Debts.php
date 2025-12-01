<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Debts extends Model
{
    protected $table = 'debts';

    protected $fillable = [
        'person_name',
        'type',
        'amount',
        'due_date',
        'status',
        'note',
    ];
}