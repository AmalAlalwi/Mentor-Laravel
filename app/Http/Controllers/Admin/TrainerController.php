<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;

class TrainerController extends Controller
{

    /*   public function index(){
           //get all teachers without social media
           // $teachers = Teacher::all();//ORM
           // $teachers = DB::table('teachers')->get(); // Query Builder


           //get all teachers with social media
           //Query Builder
           // $teachers = DB::table('teachers')
           //     ->join('social_media', 'teachers.id', '=', 'social_media.user_id')
           //     ->select('teachers.*', 'social_media.*')
           //     ->get();

           //ORM




          // dd($teachers);
           return view('dashboard.courses.create',compact('teachers'));

       }*/
    public function CountFemaleAndMale(){
        $female = Teacher::where('gender','F')->count();
        $male=Teacher::where('gender','M')->count();
        //  $teachersWithCourses = User::withCount('courses')->get();
        $topTeachers = Teacher::withCount('courses')
            ->orderByDesc('courses_count')
            ->limit(5)
            ->get();
        return view('dashboard.charts',compact('female','male','topTeachers'));
    }

}
