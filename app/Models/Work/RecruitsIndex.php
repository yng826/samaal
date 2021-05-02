<?php

namespace App\Models\Work;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecruitsIndex extends Model
{
    use HasFactory;

    protected $table = 'recruits_index';

    public function recruit()
    {
        return $this->hasOne('App\Models\Work\Recruit', 'id', 'recruit_id');
    }

}
