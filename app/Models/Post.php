<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Multicaret\Acquaintances\Traits\CanBeLiked;
use Multicaret\Acquaintances\Traits\CanBeFavorited;

class Post extends Model
{

    use CanBeLiked, CanBeFavorited;

    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'subject',
        'user_id',
        'tags',
        'logo'
    ];

    public function scopeFilter($query, array $filters) {
        if($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }
    }
}
