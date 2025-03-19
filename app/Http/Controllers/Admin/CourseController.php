<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with('teacher')->get();
        return view('dashboard.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view('dashboard.courses.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator= Validator::make($request->all(), [
            'title' => 'required|unique:courses|max:25',
            'AliceName'=> 'required|unique:courses|max:125',
            'description' => 'required',
            'price' => 'required|numeric|min:0|integer',
            'teacher_id' => 'required|integer',
            'img' => 'nullable|mimes:jpeg,png,jpg,svg|max:2048',
        ]);
        if ($validator->fails()) {
            return  redirect()->route('Courses.create')
                ->withErrors($validator)
                ->withInput();
        }
        if($data = $validator->validated()) {
            // dd($data);
            if ($image = $request->file('img')) {
                $destinationPath = 'images/Courses';
                $courseImage = 'courses_' . date('YmdHis') . "." . $image->getClientOriginalExtension();

                $image->move(public_path($destinationPath), $courseImage);

                $data['Image'] = "$courseImage";

            }
         Course::create($data);
        }
        return redirect()->route('Courses.index')
            ->with('success', 'Cource created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course=Course::where('id', $id)->with('teacher')->first();
     $teachers = Teacher::all();
        return view('dashboard.courses.edit', compact('course', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator= Validator::make($request->all(), [
            'title' => 'required|max:25',
            'AliceName'=> 'required|max:125',
            'description' => 'required',
            'price' => 'required|numeric|min:0|integer',
            'teacher_id' => 'required|integer',
            'img' => 'nullable|mimes:jpeg,png,jpg,svg|max:2048',
        ]);
        if ($validator->fails()) {
            return  redirect()->route('Courses.create')
                ->withErrors($validator)
                ->withInput();
        }
        $course=Course::findorFail($id);
        if ($image = $request->file('img')) {
            $destinationPath = 'images/Courses';
            $courseImage = 'courses_' . date('YmdHis') . "." . $image->getClientOriginalExtension();

            $image->move(public_path($destinationPath), $courseImage);

            $course['Image'] = "$courseImage";
        }

        $course->update($request->all());


        return redirect()->route('Courses.index')
            ->with('success', 'Cource Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course=Course::find($id)->delete();
        return redirect()->route('Courses.index');
    }
}
