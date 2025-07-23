<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = [
        'name',
        'periode_id',
        'category_id',
        'purchase_date',
        'umur_ekonomis',
        'penyusutan',
        'quantity',
        'purchase_price',
        'location',
        'status',
    ];

    protected static function booted()
    {
        static::creating(function ($asset) {
            if (empty($asset->periode_id)) {
                $asset->periode_id = Periode::where('status', 1)->value('id');
            }
        });
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
