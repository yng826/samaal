<?php

namespace App\Models;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class UserInfo extends Model
{
    use HasFactory;

    // protected $hidden = ['phone_encrypt'];
    protected $appends = ['phone_decrypt'];

    public function getPhoneDecryptAttribute()
    {
        $decrypted = $this->phone_encrypt;
        try {
            $decrypted = Crypt::decryptString( $this->phone_encrypt );
        } catch (DecryptException $e) {
            //
        }
        return $decrypted;
    }


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
