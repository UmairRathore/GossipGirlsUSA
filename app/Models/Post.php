<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = [
        'user_id',
        'title',
        'zipcode',
        'description',
        'post_image',
        'status',
    ] ;

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
}
