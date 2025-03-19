@extends('visitors.layouts.master')
@section('title','Trainers')
@section('content')
  <main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Trainers</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Trainers Section ======= -->
    <section id="trainers" class="trainers">

      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">

            <div class="member">
                @foreach($teachers as $teacher )
              <img src="{{asset('img/trainers/trainer-1.jpg')}}" class="img-fluid" alt="">
              <div class="member-content">
                <h4>{{$teacher->name.' '.$teacher->lastname}}</h4>
                <span>{{$teacher->specialization}}</span>
                <p>{{$teacher->description}}</p>
                 {{-- <div class="social">
                    @foreach($teacher->social_media as  $url)
                        <a href="{{$url->url}}"><i class="bi bi-{{$url->type}}"></i></a>
                      @endforeach

                </div>--}}
                  @endforeach
              </div>
            </div>

          </div>



    </section><!-- End Trainers Section -->

  </main><!-- End #main -->
@endsection
