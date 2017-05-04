<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = array();
        $users = DB::table('users')->get();
        $roles = DB::table('roles')->get();
//        $role_users = Role::all();
        $role_users = User::all();
        foreach ($role_users as $role_user) {
            foreach ($role_user->roles as $role_usera) {
//                $a[] = $role_permissionr->pivot->role_id;
                $a[] = $role_usera;
            }
        }
        return view('functions.users',
            [
                'users' => $users,
                'roles' => $roles,
                'role_users' => json_encode($a)
            ]
        );
    }

    public function userRoles(Request $request, $id)
    {
        $roles = $request->get('already_values');
        $rolesId = array();
        DB::table('role_user')->where('user_id', '=', $id)->delete();
        if ($roles){
            $temp = DB::table('roles')->whereIn('id', $roles)->get();
            foreach ($temp as $tmp) {
                $rolesId[] = $tmp->id;
            }
            $user = User::where('id', '=', $id)->first();
            $user->attachRoles($rolesId);
        }
        return back()->withInput();
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
        User::withTrashed()
            ->where('id', $id)
            ->restore();
        return back()->withInput();
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
        $user = User::find($id);
        $user->delete();
        if($user->trashed()){
            echo '禁止用户成功！';
        }else{
            echo '禁止用户失败！';
        }
        return back()->withInput();
    }
}
