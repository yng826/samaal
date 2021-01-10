<?php

namespace App\Models\Work;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Military extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'job_applications_military';
    protected $appends = ['discharge_ko', 'affair_ko'];

    public function job()
    {
        return $this->belongsTo('App\Models\Work\Job');
    }

    public function getDischargeKoAttribute()
    {
        switch( $this->military_discharge ) {
            case 'discharge':
                return '필';
                break;
            case 'unfinished':
                return '미필';
                break;
            case 'exemption':
                return '면제';
                break;
            case 'etc':
                return '기타';
                break;
            default:
                # code...
                break;
        }
    }
    public function getAffairKoAttribute()
    {
        switch( $this->military_veterans_affair ) {
            case 'target':
                return '대상';
                break;
            case 'non_target':
                return '비대상';
                break;
            default:
                # code...
                break;
        }
    }
}
