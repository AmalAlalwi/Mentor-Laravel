@extends('dashboard.layouts.master')

@section('title','Courses')

@section('main-content')
    <div id="products">
        <div class="container">
            <div class="row  my-5 mx-2">
                <div class="col-12">
                    <a class="btn btn-primary" href="{{route('Courses.create')}}"> <i class="fa fa-plus"></i> New
                        Course</a>
                </div>
            </div>
            <div class="row my-5 mx-2">
                <div class="col-12">
                    <table class="table table-striped table-hover table-responsive text-center">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">AliceName</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Name Teacher</th>
                            <th scope="col">operation</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($courses as $key => $course)
                            <tr>
                                <td scope="col">{{($key+1)}}</td>
                                <td scope="col">
                                    @if ($course->Image)
                                        <img src="{{asset('images/Courses/'.$course->Image)}}" width="100" height="100"
                                             alt="Course image">
                                    @else
                                        <img src="{{asset('images/nike.png')}}" width="100" height="100"
                                             alt="Course image">
                                    @endif
                                </td>
                                <td scope="col">{{$course->title}}</td>
                                <td scope="col">{{$course->AliceName}}</td>
                                <td scope="col">{{$course->Description}}</td>
                                <td scope="col">{{$course->price}}$</td>
                                <td scope="col">{{$course->teacher->name.' '.$course->teacher->lastname}}</td>
                                <td scope="col">
                                    <a href="{{route('Courses.edit',$course->id)}}"
                                       class="btn btn-outline-warning mx-1"><i class="fa fa-cogs"></i></a>
                                    <form class="d-inline-block"
                                          action="{{route('Courses.destroy',$course->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">
                                    <i>No Courses yet!</i>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
