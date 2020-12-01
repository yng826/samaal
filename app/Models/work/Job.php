<?php

namespace App\Models\Work;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class Job extends Model
{
    use HasFactory;

    protected $table = 'job_applications';

    // 새 속성
    protected $appends = ['phone_decrypt', 'status_ko'];
    protected $hidden = ['email_encrypt','phone_encrypt'];
    protected $ko_status = [
        'saved' => '저장',
        'submit' => '제출',
        'pending' => '처리중',
        'expired' => '종료',
    ];

    public function getPhoneDecryptAttribute()
    {
        $decrypted = '';
        try {
            $decrypted = Crypt::decryptString( $this->phone_encrypt );
        } catch (DecryptException $e) {
            //
        }
        return $decrypted;
    }

    public function getStatusKOAttribute()
    {
        return $this->ko_status[$this->status];
    }

    public function educations()
    {
        return $this->hasMany('App\Models\Work\Education');
    }

    public function careers()
    {
        return $this->hasMany('App\Models\Work\Career');
    }

    public function military()
    {
        return $this->hasOne('App\Models\Work\Military');
    }

    public function awards()
    {
        return $this->hasMany('App\Models\Work\Award');
    }

    public function certificates()
    {
        return $this->hasMany('App\Models\Work\Certificate');
    }

    public function languages()
    {
        return $this->hasMany('App\Models\Work\Language');
    }

    public function oas()
    {
        return $this->hasMany('App\Models\Work\Oa');
    }

    public function overseasStudys()
    {
        return $this->hasMany('App\Models\Work\OverseasStudy');
    }

    public function recruit()
    {
        return $this->belongsTo('App\Models\Work\Recruit');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function userInfo()
    {
        return $this->belongsTo('App\Models\UserInfo', 'user_id', 'id');
    }
}
