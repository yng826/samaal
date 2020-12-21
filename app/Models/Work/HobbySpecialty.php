<?php

namespace App\Models\Work;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HobbySpecialty extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'job_applications_hobby_specialty';

    public function job()
    {
        return $this->belongsTo('App\Models\Work\Job');
    }
}
