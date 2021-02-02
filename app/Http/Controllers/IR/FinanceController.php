<?php

namespace App\Http\Controllers\IR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $ir = []; // 그래프, 표
        if ($id == 'consolidated') {  // 연결재무제표

            $ir = DB::table('finance_infos')
                   ->select('info_year', 'info_quarter', 'connect_sales','connect_operating_income', 'connect_net_income', 'connect_assets', 'connect_liability', 'connect_total')
                   ->orderBy('info_year', 'desc')->take(3)->get();

            $sortedIR = $ir->sortBy('info_year');
            $sales = $sortedIR->pluck('connect_sales');
            $operating_income = $sortedIR->pluck('connect_operating_income');
            $net_income = $sortedIR->pluck('connect_net_income');
            $assets = $sortedIR->pluck('connect_assets');
            $liability = $sortedIR->pluck('connect_liability');
            $total = $sortedIR->pluck('connect_total');


            $info_year = $ir->sortBy('info_year')->pluck('info_year');
            $info_quarter = $ir->sortBy('info_quarter')->pluck('info_quarter');
            $labels = [];
            foreach ($info_year as $key => $year) {
                $labels[] = [$year, $info_quarter[$key] ?? ''];
            }
            $capital = $ir->sortBy('capital')->pluck('capital');

            return view('aboutUs.financial', [
                'irs'=> $ir->sortBy('info_year'),
                'info_year'=> $info_year,
                'labels'=> $labels,
                'sales'=> $sales,
                'operating_income'=> $operating_income,
                'net_income'=> $net_income,
                'assets'=> $assets,
                'liability'=> $liability,
                'total'=> $total,
                'id'=>$id
            ]);

        } else if ($id == 'separate'){ // 별도재무제표

            $ir = DB::table('finance_infos')
                   ->select('info_year', 'info_quarter', 'separate_sales','separate_operating_income', 'separate_net_income', 'separate_assets', 'separate_liability', 'separate_total')
                   ->orderBy('info_year', 'desc')->take(3)->get();

            $sortedIR = $ir->sortBy('info_year');
            $sales = $sortedIR->pluck('separate_sales');
            $operating_income = $sortedIR->pluck('separate_operating_income');
            $net_income = $sortedIR->pluck('separate_net_income');
            $assets = $sortedIR->pluck('separate_assets');
            $liability = $sortedIR->pluck('separate_liability');
            $total = $sortedIR->pluck('separate_total');


            $info_year = $ir->sortBy('info_year')->pluck('info_year');
            $info_quarter = $ir->sortBy('info_quarter')->pluck('info_quarter');
            $labels = [];
            foreach ($info_year as $key => $year) {
                $labels[] = [$year, $info_quarter[$key] ?? ''];
            }

            return view('aboutUs.financial', [
                'irs'=> $ir->sortBy('info_year'),
                'info_year'=> $info_year,
                'labels'=> $labels,
                'sales'=> $sales,
                'operating_income'=> $operating_income,
                'net_income'=> $net_income,
                'assets'=> $assets,
                'liability'=> $liability,
                'total'=> $total,
                'id'=> $id
            ]);
        } else { // 전자공고

            $ir_boards = DB::table('ir_boards')->orderBy('id', 'desc')->paginate(10);
            $cnt = DB::table('ir_boards')->orderBy('id', 'desc')->count();

            $cnt = (int)ceil($cnt/10);

            return view('aboutUs.ir_board.list', [
                'ir_boards' => $ir_boards,
                'cnt' => $cnt,
                'id'=>$id
            ]);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ir_board = DB::table('ir_boards')->where('id',$id)->first();
            return view('aboutUs.ir_board.show', [
                'ir_board'=> $ir_board,
                'id'=>'board'
            ]);
    }
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ir_board_info($id)
    {
        $board = DB::table('ir_boards')->where('id',$id)->first();

        return redirect($board)->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function fileDownload(Request $request)
    {
        $ir_boards = DB::table('ir_boards')->where('id', $request->id)->first();

        $file_path = 'storage/'.$ir_boards->pdf_file_path;

        return response()->download($file_path, $ir_boards->pdf_file_name);
    }
}
