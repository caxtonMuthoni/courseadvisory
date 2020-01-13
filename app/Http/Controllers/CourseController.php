<?php

namespace App\Http\Controllers;

use App\Course;
use App\University;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.courses')->with('courses',$courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $universities = University::all();
        return view('admin.courses.addCourse')->with("universities",$universities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation
        $this->validate($request,[
            'name'=>"required",
            'cluster'=>"required | integer | max:70",
            'subjects'=>"required",
            'universities'=>"required",
        ]);
        $course = new Course;
        $course->name = $request->name;
        $course->cluster = $request->cluster;
        $course ->subjects =   $request->subjects;
        $course->universities = $request->input('universities');
        $status = $course->save();
        if($status){
            return redirect()->back()->with("success","Course added successifully !!!");
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //Validation
         $this->validate($request,[
            'name'=>"required",
            'cluster'=>"required | integer | max:70",
            'subjects'=>"required",
            'universities'=>"required",
        ]);
        $course = Course;
        $course->name = $request->name;
        $course->cluster = $request->cluster;
        $course ->subjects =   $request->subjects;
        $course->universities = $request->input('universities');
        $status = $course->save();
        if($status){
            return redirect()->back()->with("success","Course added successifully !!!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
