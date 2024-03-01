<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function comments() {
        return $this->hasMany(Comment::class); //Een post heeft meerdere comments.
    }

    //QUERY SCOPE
    public function scopePublished ($query) {
        return $query->where('published', 1);
    }
}
