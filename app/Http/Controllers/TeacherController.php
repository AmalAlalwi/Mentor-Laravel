<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{


    public function index(){
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
        $teachers = Teacher::with('socialMedia')->get();



        // dd($teachers);
        return view('visitors.trainers',compact('teachers'));

    }


}
