<?php

namespace App\Models\Work;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'job_applications_education';
    protected $appends = ['edu_time_ko', 'edu_type_ko', 'graduation_ko', 'entrance_ko', 'location_ko'];

    public function job()
    {
        return $this->belongsTo('App\Models\Work\Job');
    }

    public function getEduTimeKoAttribute()
    {
        switch( $this->edu_time ) {
            case 'day':
                return '주간';
                break;
            case 'night':
                return '야간';
                break;
            default:
                # code...
                break;
        }
    }

    public function getEduTypeKoAttribute()
    {
        switch( $this->edu_type ) {
            case 'college':
                return '전문대';
                break;
            case 'university':
                return '대학교';
                break;
            case 'graduate':
                return '대학원';
                break;
            default:
                # code...
                break;
        }
    }

    public function getEntranceKoAttribute()
    {
        switch( $this->edu_entrance ) {
            case 'entrance':
                return '입학';
                break;
            case 'transfer':
                return '편입';
                break;
            default:
                # code...
                break;
        }
    }

    public function getGraduationKoAttribute()
    {
        switch( $this->edu_graduation ) {
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

    public function getLocationKoAttribute()
    {
        switch( $this->edu_location ) {
            case 'major':
                return '본교';
                break;
            case 'minor':
                return '분교';
                break;
            default:
                # code...
                break;
        }
    }
}
