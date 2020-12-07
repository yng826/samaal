<?php

namespace App\Models\Work;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $table = 'job_applications_certificate';

    public function job()
    {
        return $this->belongsTo('App\Models\Work\Job');
    }
}
