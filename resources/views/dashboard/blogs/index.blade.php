
@extends('dashboard.layouts.master')

@section('main-content')
    <div id="products">
        <div class="container">
            <div class="row  my-5 mx-2">
                <div class="col-12">
                    <a class="btn btn-primary" href="{{route('blogs.create')}}"> <i class="fa fa-plus"></i> New Event</a>
                </div>
            </div>
            <div class="row my-5 mx-2">
                <div class="col-12">
                    <table class="table table-striped table-hover table-responsive text-center">
                        <thead>
            	<tr>
                	<th width="80px">No</th>
                	<th>Title</th>
                	<th>Description</th>
                	<th width="250px">Action</th>
            	</tr>
        	</thead>

        	<tbody>
        	@foreach ($blogs as $blog)
            	<tr>
                	<td>{{ ++$i }}</td>
                	<td>{{ $blog->title }}</td>
                	<td>{{ $blog->description }}</td>
                	<td>
                    	<form action="{{ route('blogs.destroy',$blog->id) }}" method="POST">

                        	<a class="btn btn-info btn-sm" href="{{ route('blogs.show',$blog->id) }}"><i class="fa-solid fa-list"></i> Show</a>

                        	<a class="btn btn-primary btn-sm" href="{{ route('blogs.edit',$blog->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>

                        	@csrf
                        	@method('DELETE')

                        	<button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                    	</form>
                	</td>
            	</tr>

        	@endforeach
        	</tbody>

    	</table>



  </div>
</div>
@endsection
