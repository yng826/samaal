<?php

namespace App\Models\Work;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $table = 'job_applications_language';
    protected $appends = ['level_ko'];

    public function job()
    {
        return $this->belongsTo('App\Models\Work\Job');
    }

    public function getLevelKoAttribute()
    {
        switch( $this->language_level ) {
            case 'low':
                return '하';
                break;
            case 'normal':
                return '중';
                break;
            case 'high':
                return '상';
                break;
            default:
                # code...
                break;
        }
    }
}
