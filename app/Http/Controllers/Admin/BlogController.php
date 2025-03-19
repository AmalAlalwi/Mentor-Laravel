<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{


    public function index()
	{
    		$blogs = Blog::all();

    		return view('dashboard.blogs.index', compact('blogs'))
                	->with('i', (request()->input('page', 1) - 1) * 5);
	}

	public function create()
	{
    		return view('dashboard.blogs.create');
	}

	public function store(Request $request)
	{
        $validator= Validator::make($request->all(), [
            'title' => 'required|unique:blogs|max:255',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return  redirect()->route('blogs.create')
                        ->withErrors($validator)
                        ->withInput();
        }


    	Blog::create($validator->validated());

    		return redirect()->route('blogs.index')
                     	->with('success', 'Blog created successfully.');
	}


	public function show(Blog $blog)
	{
    		return view('dashboard.blogs.show',compact('blog'));
	}

	public function edit(Blog $blog)
	{
    		return view('dashboard.blogs.edit',compact('blog'));
	}

	public function update(Request $request, Blog $blog)
	{
       $validator= Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return  redirect()->route('blogs.edit')
                ->withErrors($validator)
                ->withInput();
        }
        $blog->update( $validator->validated());

        return redirect()->route('blogs.index')
            ->with('success', 'Blog created successfully.');
	}

	public function destroy(Blog $blog)
	{
    		$blog->delete();

    		return redirect()->route('blogs.index')
                    	->with('success','Blog deleted successfully');
	}
}
