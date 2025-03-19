@extends('dashboard.layouts.master')

@section('title','New Course')

@section('main-content')
    <div id="product">
        <div class="container">
            <div class="row my-5 mx-2">
                <form class="row g-3 needs-validation" method="POST" action="{{route('Courses.store')}}" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="col-md-8 col-12">
                        <label for="product-name" class="form-label">Title</label>
                        <input type="text" class="form-control" id="product-name" name="title" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <label for="product-name" class="form-label">Alice Name</label>

                            <input type="text" class="form-control" id="product-price" name="AliceName" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                                Please choose a price.
                            </div>
                    </div>
                    <div class="col-12">
                        <label for="product-desc" class="form-label">Description</label>
                        <input type="text" class="form-control" id="product-desc" name="description" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <label for="product-name" class="form-label">Price</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">$</span>
                            <input type="text" class="form-control" id="product-price" name="price" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                                Please choose a price.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <label for="product-name" class="form-label">Teacher Name</label>
                        <select name="teacher_id" id="" class="form-select">
                        @foreach($teachers as $teacher)

                            <option value="{{$teacher->id}}">{{$teacher->name.' '.$teacher->lastname}}</option>

                        @endforeach
                        </select>
                        <div class="invalid-feedback">select teacher</div>
                    </div>
                    <div class="col-md-8 col-12">
                        <input type="file" class="form-control" name="img" aria-label="file example">
                        <div class="invalid-feedback">invalid form image </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Add</button>
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
