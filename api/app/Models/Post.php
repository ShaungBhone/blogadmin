<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Post;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        static::creating(function (Post $post) {
            $post->uuid = Str::uuid();

            if (!$post->slug) {
                $post->slug = $post->uuid;
            };
        });
    }
}
