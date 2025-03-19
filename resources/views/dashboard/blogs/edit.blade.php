
@extends('dashboard.layouts.master')

@section('main-content')

<div class="card mt-5">
  <h2 class="card-header">Edit Blog</h2>
  <div class="card-body">

	<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    	<a class="btn btn-primary btn-sm" href="{{ route('blogs.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
	</div>

	<form action="{{ route('blogs.update',$blog->id) }}" method="POST">
    	@csrf
    	@method('PUT')

    	<div class="mb-3">
        	<label for="inputTitle" class="form-label"><strong>Title:</strong></label>
        	<input
            	type="text"
            	name="title"
            	value="{{ $blog->title }}"
            	class="form-control @error('title') is-invalid @enderror"
            	id="inputTitle"
            	placeholder="Title">
        	@error('title')
            	<div class="form-text text-danger">{{ $message }}</div>
        	@enderror
    	</div>

    	<div class="mb-3">
        	<label for="inputDescription" class="form-label"><strong>Description:</strong></label>
        	<textarea
            	class="form-control @error('description') is-invalid @enderror"
            	style="height:150px"
            	name="description"
            	id="inputDescription"
            	placeholder="Description">{{ $blog->description }}</textarea>
        	@error('description')
            	<div class="form-text text-danger">{{ $message }}</div>
        	@enderror
    	</div>
    	<button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Update</button>
	</form>

  </div>
</div>
@endsection
