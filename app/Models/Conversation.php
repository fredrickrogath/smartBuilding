<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_provider_id',
        'request_user_id' ,
    ];

    public function requests(){
        return $this->hasMany(Requests::class);
    }
}
