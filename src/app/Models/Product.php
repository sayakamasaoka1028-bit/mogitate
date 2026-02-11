<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'image',
        'description',
    ];

    // 季節とのリレーション（多対多）
    public function seasons()
    {
        return $this->belongsToMany(Season::class);
    }
}

