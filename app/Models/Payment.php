<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'transaction_id',
        'amount_paid',
        'previous_balance',
        'remaining_balance',
        'status',
        'payment_date'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $casts = [
        'amount_paid' => 'integer',
        'previous_balance' => 'integer',
        'remaining_balance' => 'integer',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
