@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="center">
        <h1 class="my-4 text-center" style="margin-top:5rem !important; font-family:Amiri; font-size:72px !important;">تَشارُك</h1>
    </div>

    <div id="carouselExampleCaptions" class="carousel slide primary-color mb-4" data-ride="carousel">

            <div class="carousel-inner">

              @foreach ($newsArray as $news)
              @if($loop->first)
                <div class="carousel-item active">
                    @else
                    <div class="carousel-item">
                @endif
                <img src="storage/news_images/{{$news->image}}" class="d-block w-100" alt="...">
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
