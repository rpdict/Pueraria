<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = DB::table('roles')->get();
        return view('functions.roles', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createRole(Request $request)
    {
        $name               = $request->input('rolename');
        $description        = $request->input('description');
        $role = new Role();
        $role->name         = $name;
        $role->display_name = 'Project '.$name; // optional
        $role->description  = $description; // optional
        $role->save();
        return back()->withInput();
    }

    /**
     * 创建角色的权限
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function rolePermissions(Request $request, $id)
    {
        return var_dump($request->get('DS'.$id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function editRole(Request $request, $id)
    {
        $name = $request->input('rolename');
        $description = $request->input('description');
        DB::table('roles')
            ->where('id', $id)
            ->update(['name' => $name, 'description' => $description]);
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function removeRole($id)
    {
        DB::table('roles')->where('id', '=', $id)->delete();
        return back()->withInput();
    }
}
