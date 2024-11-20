<?php

namespace App\Http\Controllers;

use App\Models\CourseClass;
use App\Models\Enroll;
use Illuminate\Http\Request;

class CourseClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = CourseClass::with('course')->get();
        $data = [
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => $classes,
        ];
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function enroll(Request $request)
    {
        $enroll = Enroll::create([
            'student_id' => $request->student_id,
            'course_class_id' => $request->course_class_id,
        ]);

        $data = [
            'status' => 'success',
            'message' => 'Enroll successfully',
            'data' => $enroll,
        ];

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function enrollList(Request $request)
    {
        $enrolls = Enroll::where('student_id',$request->student_id)->with('student','class')->get();
        $data = [
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => $enrolls,
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseClass  $courseClass
     * @return \Illuminate\Http\Response
     */
    public function show(CourseClass $courseClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseClass  $courseClass
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseClass $courseClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseClass  $courseClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseClass $courseClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseClass  $courseClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseClass $courseClass)
    {
        //
    }
}
