<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        $data = [
            'status' => 'success',
            'message' => 'Data retrieved successfully',
            'data' => $students,
        ];

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required',
            'password' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        $check = Student::where('email', $fields['email'])->orWhere('phone', $fields['phone'])->first();
        if ($check) {
            return response()->json([
                'error' => 'Bad Request',
                'message' => 'Student Already Exists'
            ], 400);
        }

        $student = Student::create([
            'name' => $fields['name'],
            'password' => Hash::make($fields['password']),
            'email' => $fields['email'],
            'phone' => $fields['phone'],
        ]);

        $data = [
            'status' => 'success',
            'message' => 'Student Registered successfully',
            'data' => $student,
        ];

        return response()->json($data);
    }

    public function login()
    {
        $fields = $request->validate([
            'password' => 'required',
            'email' => 'required',
        ]);

        $check = Student::where('email', $fields['email'])->first();
        if(!$check){
            return response()->json([
                'error' => 'Bad Request',
                'message' => 'Username or Password Wrong'
            ], 400);
        }

        if(Hash::check($fields['password'], $check->password)){
            $data = [
                'status' => 'success',
                'message' => 'Log In Success',
                'data' => $check,
            ];
        }
        else{
            return response()->json([
                'error' => 'Bad Request',
                'message' => 'Username or Password Wrong'
            ], 400);
        }
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
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
