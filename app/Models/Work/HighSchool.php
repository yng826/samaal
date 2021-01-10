<?php

namespace App\Models\Work;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HighSchool extends Model
{
    use HasFactory;

    protected $table = 'job_applications_highschool';
    protected $appends = ['major_ko', 'graduation_ko'];

    public function job()
    {
        return $this->belongsTo('App\Models\Work\Job');
    }

    public function getMajorKoAttribute()
    {
        switch( $this->school_major ) {
            case 'science':
                return '이과';
                break;
            case 'liberal':
                return '문과';
                break;
            case 'special':
                return '전문계';
                break;
            default:
                # code...
                break;
        }
    }

    public function getGraduationKoAttribute()
    {
        switch( $this->school_graduation ) {
            case 'prospective':
                return '졸업예정';
                break;
            case 'graduation':
                return '졸업';
                break;
            case 'complete':
                return '수료';
                break;
            case 'in_school':
                return '재학';
                break;
            case 'dropout':
                return '중퇴';
                break;
            case 'degree':
                return '학위';
                break;

            default:
                # code...
                break;
        }
    }
}
