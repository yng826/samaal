<?php

namespace App\Models\Work;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecruitKeyword extends Model
{
    use HasFactory;
    public $timestamps = false;
    // protected $table = 'recruit_keywords';

    public function recruit()
    {
        return $this->belongsTo('App\Models\Work\Recruit');
    }
}
