<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;
use DB;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $class = DB::table('classes')->get();
        // return response()->json($class);
        return classes::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'class_name' => 'required|unique:classes|max:25',
        ]);

        $data = array();
        $data['class_name'] = $request->class_name;
        DB::table('classes')->insert($data);
        return response('data stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function show(Classes $classes, $id)
    {
        $show = DB::table('classes')->where('id', $id)->first();
        return response()->json($show);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    
    // public function edit(Classes $classes)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classes $classes, $id)
    {
        $validated = $request->validate([
            'class_name' => 'required|unique:classes|max:25',
        ]);
        $data = array();
        $data['class_name'] = $request->class_name;
        DB::table('classes')->where('id', $id)->update($data);
        return response('data updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classes $classes, $id)
    {
        DB::table('classes')->where('id', $id)->delete();
        return response('data deleted');
    }
}
