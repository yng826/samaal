<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->where('role','!=','user')->orderBy('id', 'desc')->paginate(10);
        return view('admin.user.list', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = '/eng/admin/user';
        $error="";
        return view('admin.user.create', [
            'action' => $action,
            'error'=>$error
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

        $error="";
        $email = DB::table('users')->select('email')->where('email',$request->email)->first();

        if($email != null || $email !=""){

            $error='이미 존재하는 이메일입니다.';
            $action = '/eng/admin/user';
            debug($error);
            return view('admin.user.create', [
                'action' => $action,
                'error'=>$error
            ]);


        }

        $hashed = $request->password;
        if (Hash::needsRehash($request->password)) {
           $hashed = Hash::make($request->password);
        }
        if($request->id > 0){
            $saved1 = DB::table('users')
                    ->where('id', $request->id)
                    ->update([
                        'name'=> $request->name,
                        'role'=> $request->role,
                        'email_verified_at'=> null,
                        'password'=> $hashed,
                        'remember_token'=> null,
                        'updated_at' => now(),
                    ]);

        }else{
            $saved1 = DB::table('users')
            ->insert([
                'name'=> $request->name,
                'email'=> $request->email,
                'role'=> $request->role,
                'email_verified_at'=> null,
                'password'=> $hashed,
                'remember_token'=> null,
                'created_at' => now()
            ]);
        }
        return redirect('/admin/user');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($request)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        $action = "/eng/admin/user/{$id}";

        return view('admin.user.create', [
            'user'=> $user,
            'action'=> $action,
        ]);
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

        $hashed = $request->password;
        if (Hash::needsRehash($request->password)) {
            $hashed = Hash::make($request->password);
        }
        $affected1 = DB::table('users')
        ->where('id', $id)
        ->update([
            'name'=> $request->name,
            'role'=> $request->role,
            'email_verified_at'=> null,
            'password'=> $hashed,
            'remember_token'=> null,
            'updated_at' => now(),
          ]);

        return redirect('/admin/user');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $affected = DB::table('users')
        ->where('id', $id)
        ->delete();
        return redirect('/admin/user');
    }
}
