<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankTransferDonation extends Model
{
    protected $fillable = [
        'donor_name',
        'amount',
        'currency',
        'bank_name',
        'receipt_path',
        'receipt_name',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
        ];
    }
}
