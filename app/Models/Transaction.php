<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'periode_id',
        'name',
        'type',
        'transaction_date',
        'amount',
        'description',
    ];

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
