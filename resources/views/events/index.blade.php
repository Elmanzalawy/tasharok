@extends('layouts.app')
@section('content')

<style>
        #main-footer {
            position: static !important;
        }
    .row .card{
      margin-bottom: 2rem;
    }

    </style>
<div class="container">
    <div class="jumbotron " style="margin-bottom:3rem !important;">
        <h1 style="" class="center">الدورات</h1>
        @if(!Auth::guest())
        @if(Auth::user()->privilege == "admin")
        <a class="btn btn-lg btn-primary my-4" href="{{ url('/events/create') }}">اضافة دورة</a>
        @endif
        @endif

        {{-- @if(count($events ?? '') > 0)
            <div class="row">
            @foreach($events ?? '' as $event)
            <div class="col-sm-6 col-md-6">
                    <div class="card">
                            <img  class='card-img-top' style="width:100%;"
                            src="../storage/event_images/{{$event->cover_image ?? 'placeholder-image.png'}}" alt="">

                    </div>
                </div>
            @endforeach
        </div>
        @else
            <p>لا توجد دورات.</p>
        @endif --}}
    
        <div id="carouselExampleCaptions" class="carousel slide primary-color mb-4" data-ride="carousel">

                <div class="carousel-inner">
    
                  @foreach ($events as $event)
                  @if($loop->first)
                    <div class="carousel-item active">
                        @else
                        <div class="carousel-item">
                    @endif
                    <img  src="../storage/event_images/{{$event->cover_image}}" class="d-block w-100" alt="...">
                            {{-- <div class="carousel-caption d-none d-md-block">
                            <h5>{{$news->title}}</h5>
                                <p>{{$news->description}}</p>
                            </div> --}}
                    </div>
                  @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
    
    
    
    
    </div>
    </div>
</div>
<style>
        #main-footer {
            position: static !important;
        }
    .row .card{
      margin-bottom: 2rem;
    }
    body{
        padding-bottom: 4rem;
    }
    .carousel{
      margin-bottom: 3rem !important;
    }
    </style>
@endsection
