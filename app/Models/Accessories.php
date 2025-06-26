<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessories extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'accessories';

    protected $fillable = [
        'title', 'status', 'category_id' // 👈 thêm ở đây
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id'); // 👈 hoặc 'belongstogame' nếu bạn dùng tên khác
    }
}
