<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nick extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'nicks';

    protected $fillable = [
        'title', 'description', 'image', 'status', 'category_id', 'ms', 'attribute', 'price'
    ];

    // Mỗi nick thuộc về 1 danh mục
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Mỗi nick có nhiều ảnh trong thư viện
    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'nick_id');
    }
}
