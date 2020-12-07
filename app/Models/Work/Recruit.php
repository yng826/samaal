<?php

namespace App\Models\Work;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruit extends Model
{
    use HasFactory;

    public function keywords()
    {
        return $this->hasMany('App\Models\Work\RecruitKeyword');
    }
}
