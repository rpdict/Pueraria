<?php

namespace App\Http\Controllers;

use App\Events\QRLoginedEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;

class QRLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $QRkey = $id;
        $key = md5(uniqid());
        return view('adminlte::auth.QRlogin', ['QRkey' => $QRkey, 'key' => $key]);
    }

    public function attemptLogin(Request $request, $key)
    {
        if (Auth::once(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            $id = base64_encode(Auth::id());
            $message = json_encode([
                'QRkey' => $key,
                'event' => 'success',
                'id' => $id
                ]);
//            Redis::lpush('QRLogin', $message);
            Redis::publish('login-channel', $message);
            return view('functions.partials.success');
        } else {
            return view('functions.partials.fail');
        }
    }

    public function login($id){
        $id = base64_decode($id);
        Auth::loginUsingId($id);
        return redirect('/home');
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
}
