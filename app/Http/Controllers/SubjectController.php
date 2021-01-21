<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Symfony\Component\Routing\Route;
use DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $subject = DB::table('subjects')->get();
        // return response()->json($subject);

        return Subject::all();

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
            'class_id' => 'required',
            'subject_name' => 'required|unique:subjects|max:255',
            'subject_code' => 'required|unique:subjects|max:255',

        ]);

        $subject = Subject::create($request->all());
        return response()->json($subject);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $show = Subject::findorfail($id);
        // return response()->json($show);

        $show = DB::table('subjects')->where('id', $id)->first();
        return response()->json($show);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */

    // public function edit(Subject $subject)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $validated = $request->validate([
        //     'class_id' => 'required',
        //     'subject_name' => 'required|unique:subjects,subject_name|max:255'.$this->route('id'),
        //     'subject_code' => 'required|unique:subjects,subject_code|max:255'.$this->route('id'),

        // ]);

        $subject = Subject::findorfail($id);
        $subject->update($request->all());
        return response('updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subject::where('id', $id)->delete();
        return response('data deleted');
    }
}
