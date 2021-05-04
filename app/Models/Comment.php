<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment_id',
        'post_id' ,
        'user_id' ,
        'body' ,
        'sender_name' ,
    ];

    public function replies(){
        return $this->hasMany(Comment::class , 'comment_id');
    }
}

