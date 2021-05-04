<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Like;
use App\Models\Post;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'sender_name' ,
        'description' ,
        'userStatus' ,
        'mediaType' ,
        'poster' ,
        'post' ,
        'region' ,
    ];

    public function likes()
    {
        return $this->hasMany( Like::class );
    }

    // public function likedBy(){
    //     return $this->likes->contains('user_id', auth()->user()->id);
    // }

    public function user(){
        return $this->belongsTo(user::class);
    }

}
