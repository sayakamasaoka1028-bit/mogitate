<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // 商品とのリレーション（多対多）
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}

