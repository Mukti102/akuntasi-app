<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $fillable = [
        'periode_name',
        'saldo',
        'tahun',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
        'keterangan',
    ];

    /**
     * Get the formatted start date.
     */
    public function getFormattedStartDateAttribute()
    {
        return $this->tanggal_mulai->format('d-m-Y');
    }

    /**
     * Get the formatted end date.
     */
    public function getFormattedEndDateAttribute()
    {
        return $this->tanggal_selesai->format('d-m-Y');
    }
}
