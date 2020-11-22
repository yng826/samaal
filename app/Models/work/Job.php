<?php

namespace App\Models\work;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Job extends Model
{
    use HasFactory;

    protected $table = 'job_applications';

    public static function get($args)
    {
        $email = isset($args['email']) ? $args['email']: null;
        $id = isset($args['id']) ? $args['id']: null;
        return DB::table('job_applications as job')
            ->join('recruits', 'job.recruit_id', '=', 'recruits.id')
            ->when($id, function ($query, $id) {
                $query->where('job.id', '=', $id);
            })
            ->when(isset($args['email']), function ($query, $args) {
                $query->where('email', '=', $args['email']);
            })
            ->get();
    }
}
