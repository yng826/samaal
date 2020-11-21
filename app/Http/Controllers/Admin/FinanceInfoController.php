<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FinanceInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $infos = DB::table('finance_infos')->orderBy('info_year', 'desc')->get();
        return view('admin.finance_info.list', [
            'infos' => $infos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $new_info_year = date("Y");
        //echo 'show:'. $new_info_year;
        $action = '/admin/finance_info';
        return view('admin.finance_info.create', [
            'action' => $action,
            'new_info_year' => $new_info_year,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $saved = DB::table('finance_infos')->updateOrInsert(
            ['info_year'=> $request->info_year],
            ['info_year'=> $request->info_year,
            'connect_sales'=> $request->connect_sales ?? 0,
            'connect_operating_income'=> $request->connect_operating_income ?? 0,
            'connect_net_income'=> $request->connect_net_income ?? 0,
            'connect_assets'=> $request->connect_assets ?? 0,
            'connect_liability'=> $request->connect_liability ?? 0,
            'separate_sales'=> $request->separate_sales ?? 0,
            'separate_operating_income'=> $request->separate_operating_income ?? 0,
            'separate_net_income'=> $request->separate_net_income ?? 0,
            'separate_assets'=> $request->separate_assets ?? 0,
            'separate_liability'=> $request->separate_liability ?? 0,
            'created_at' => now()]
        );
        return redirect('/admin/finance_info');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $info_year
     * @return \Illuminate\Http\Response
     */
   /* public function show($info_year)
    {
        echo 'info_year :'. $info_year;
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $info_year
     * @return \Illuminate\Http\Response
     */
    public function edit($info_year)
    {
        $info = DB::table('finance_infos')->where('info_year', $info_year)->first();
        $action = "/admin/finance_info/{$info_year}";

        return view('admin.finance_info.create', [
            'info'=> $info,
            'action'=> $action,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $info_year
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $info_year)
    {
        $affected = DB::table('finance_infos')
        ->where('info_year', $info_year)
        ->update([
            'info_year'=> $request->info_year,
            'connect_sales'=> $request->connect_sales ?? 0,
            'connect_operating_income'=> $request->connect_operating_income ?? 0,
            'connect_net_income'=> $request->connect_net_income ?? 0,
            'connect_assets'=> $request->connect_assets ?? 0,
            'connect_liability'=> $request->connect_liability ?? 0,
            'separate_sales'=> $request->separate_sales ?? 0,
            'separate_operating_income'=> $request->separate_operating_income ?? 0,
            'separate_net_income'=> $request->separate_net_income ?? 0,
            'separate_assets'=> $request->separate_assets ?? 0,
            'separate_liability'=> $request->separate_liability ?? 0,
            'updated_at' => now()
          ]);
        return redirect('/admin/finance_info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $info_year
     * @return \Illuminate\Http\Response
     */
    /*public function destroy($info_year)
    {
        $affected = DB::table('finance_infos')
        ->where('info_year', $info_year)
        ->delete();
        return redirect('/admin/finance_info');
    } */
}
