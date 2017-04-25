<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uploads = DB::table('uploads')->where('author_id', Auth::id())->get();
        return view('functions.upload', ['uploads' => $uploads]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $name = $request->input('name');
        $path = $request->file('file')->store('public');
        $size = Storage::size($path);
        $description = $request->input('description');

        $upload = new Upload();
        $upload->name = $name;
        $upload->size = $size;
        $upload->path = $path;
        $upload->description = $description;
        $upload->author_id = Auth::id();
        $upload->save();

        return back()->withInput()->with('success', '上传成功');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        DB::table('uploads')
            ->where('id', $id)
            ->update(['name' => $name, 'description' => $description]);
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $path = DB::table('uploads')->where('id', '=', $id)->value('path');
        Storage::delete($path);
        DB::table('uploads')->where('id', '=', $id)->delete();
        return back()->withInput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }




}
