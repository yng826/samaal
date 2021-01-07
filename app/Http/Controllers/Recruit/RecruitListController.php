<?php

namespace App\Http\Controllers\Recruit;

use App\Http\Controllers\Controller;
use App\Models\Work\Recruit;
use App\Models\Work\RecruitKeyword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecruitListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $search = request()->all();
        // $keyword = request()->input('keyword');
        $keyword = request()->input('keyword');

        $recruit_ids = DB::table('recruits')
            ->leftJoin('recruit_keywords', 'recruits.id', '=', 'recruit_keywords.recruit_id')
            ->select('recruits.*', DB::raw('GROUP_CONCAT(CONCAT("#",recruit_keywords.keyword) SEPARATOR  " ") AS keyword'))
            // ->where('end_date','>=', DB::raw('now()'))
            ->where('recruit_status', '=', 'open')
            ->when($keyword, function($query) use ($keyword) {
                $query->where('recruit_keywords.keyword', 'like', '%'.$keyword.'%');
            })
            ->groupBy('recruits.id', 'title', 'career',  'job_type', 'start_date', 'end_date',  'description',  'created_at', 'updated_at')
            ->orderBy('id', 'desc')
            ->get();
        /** */
        $recruits = Recruit::with('keywords')
            ->whereIn('id', $recruit_ids->pluck('id'))
            ->orderBy('end_date', 'desc')
            ->get();
        // dd($recruits);
        /**/
        /*
        $recruits = DB::table('recruits')
            ->leftJoin('recruit_keywords', 'recruits.id', '=', 'recruit_keywords.recruit_id')
            ->select('recruits.*', DB::raw('GROUP_CONCAT(CONCAT("#",recruit_keywords.keyword) SEPARATOR  " ") AS keyword'))
            // ->where('end_date','>=', DB::raw('now()'))
            ->groupBy('recruits.id', 'title', 'career',  'job_type', 'start_date', 'end_date',  'description',  'created_at', 'updated_at')
            ->orderBy('id', 'desc')
            ->get();
        /***/

        return view('workWithUs.recruit.list', [
            'keyword' => $keyword,
            'recruits' => $recruits,
            'pageClass' => 'work-apply',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search($id)
    {
        $recruits = DB::table('recruits')
            ->leftJoin('recruit_keywords', 'recruits.id', '=', 'recruit_keywords.recruit_id')
            ->select('recruits.*', DB::raw('GROUP_CONCAT(CONCAT("#",recruit_keywords.keyword) SEPARATOR  " ") AS keyword'))
            ->where('recruit_keywords.keyword','like', '%'.$id.'%')
            ->where('end_date','>=', DB::raw('now()'))
            ->groupBy('recruits.id', 'title', 'career',  'job_type', 'start_date', 'end_date',  'description',  'created_at', 'updated_at')
            ->orderBy('id', 'desc')
            ->get();

        debug($recruits);
        return view('recruit.recruit_list', [
            'recruits' => $recruits,
            'pageClass' => 'work-apply',
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Recruit $recruit, $id)
    {
        $recruit = DB::table('recruits')->where('id', $id)->first();
        $keywords = DB::table('recruit_keywords')->where('recruit_id', $id)->get();

        if ( !$recruit ) {
            abort(404);
        }

        debug($recruit);
        debug($keywords);

        // return json_encode($recruit);
        return view('workWithUs.recruit.show', [
            'recruit'=> $recruit,
            'keywords' => $keywords,
        ]);
    }

    public function join($id)
    {
        $recruit = DB::table('recruits')->where('id', $id)->first();

        if ( !$recruit ) {
            abort(404);
        }
        return view('workWithUs.job.create', [
            'recruit_id' => $recruit->id,
            'pageClass' => 'work-apply',
        ]);
    }

    public function edit($id)
    {
        $recruit = DB::table('recruits')->where('id', $id)->first();

        if ( !$recruit ) {
            abort(404);
        }
        return view('workWithUs.job.edit', [
            'recruit_id' => $recruit->id,
            'pageClass' => 'work-apply',
        ]);
    }
}
