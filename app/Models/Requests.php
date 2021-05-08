<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_provider_id',
        'request_user_id' ,
        'requestUserName',
        'conversation_id',
        'body' ,
        'new',
    ];

    public function requests(){
        return $this->belongsTo(Conversation::class);
    }
}
