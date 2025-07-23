<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    // Di dalam model Transaction.php
    protected static function booted()
    {
        static::creating(function ($category) {
            if (empty($category->periode_id)) {
                $category->periode_id = Periode::where('status', 1)->value('id');
            }
        });
    }


    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }
}
