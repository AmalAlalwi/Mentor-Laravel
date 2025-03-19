@extends('dashboard.layouts.master')

@section('title','Edit Course')

@section('main-content')
    <div id="product">
        <div class="container">
            <div class="row my-5 mx-2">
                <form class="row g-3 needs-validation" method="POST" action="{{route('Courses.update',$course->id)}}" enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="col-md-8 col-12">
                        <label for="product-name" class="form-label">Title</label>
                        <input
                            type="text"
                            name="title"
                            value="{{ $course->title }}"
                            class="form-control @error('title') is-invalid @enderror"
                            id="inputTitle"
                            placeholder="Title">
                        @error('title')
                        <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <label for="product-price" class="form-label">Alice Name</label>
                            <input type="text" class="form-control" id="product-price" name="AliceName" value="{{$course->AliceName}}" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                                Please choose a price.
                            </div>
                        </div>

                    <div class="col-12">
                        <label for="product-desc" class="form-label">Description</label>
                        <input type="text" class="form-control" id="product-desc" name="description" value="{{$course->Description}}" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <label for="product-name" class="form-label">Price</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">$</span>
                            <input type="text" class="form-control" id="product-price" value="{{$course->Price}}" name="price" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                                Please choose a price.
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4 col-12">
                        <label for="product-name" class="form-label">Teacher Name</label>
                        <select name="teacher_id" id="" class="form-select">
                            @foreach($teachers as $teach)
                            <option value="{{$teach->id}}">{{$teach->name.' '.$teach->lastname}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">select teacher</div>
                    </div>
                    <div class="col-md-8 col-12">
                        <input type="file" class="form-control" name="img" value="{{$course->Image}}" aria-label="file example">
                        <div class="invalid-feedback">invalid form image </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
                {{-- show validation errors --}}
                <section class="mt-3">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </section>
            </div>
        </div>
    </div>
@endsection
