<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    protected $hidden = ['phone_encrypt'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
