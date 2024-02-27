<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function post() {
        return $this->belongsTo(Post::class); // Een comment heeft 1 post. 
    }
}
