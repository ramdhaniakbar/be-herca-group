<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'marketing_id',
        'transaction_number',
        'date',
        'cargo_fee',
        'total_balance',
        'grand_total'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $casts = [
        'cargo_fee' => 'integer',
        'total_balance' => 'integer',
        'grand_total' => 'integer',
    ];
}
