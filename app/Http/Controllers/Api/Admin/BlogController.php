<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all('title','description');
        if($blogs){
            $result = [
                'success' => true,
                'data' => $blogs,
                'message' => 'Blogs retrieved successfully.'
            ];
        }
        else{
            $result = [
                'success' => false,
                'message' => 'Blogs not found.'

            ];
        }
        return response()->json($result);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
      //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator= Validator::make($request->all(), [
            'title' => 'required|unique:blogs|max:255',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }


        Blog::create($validator->validated());

        return response()->json(['success' => true]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $validator= Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);

        }
        $blog->update( $validator->validated());

        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
