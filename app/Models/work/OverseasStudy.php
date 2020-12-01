<?php

namespace App\Models\Work;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OverseasStudy extends Model
{
    use HasFactory;

    protected $table = 'job_applications_overseas_study';

    public function job()
    {
        return $this->belongsTo('App\Models\Work\Job');
    }
}
